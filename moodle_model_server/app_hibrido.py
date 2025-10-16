from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from sentence_transformers import SentenceTransformer, util
from openai import OpenAI
import torch
import logging
import csv
import os

app = FastAPI(title="Servicio Híbrido para Sílabo Moodle")

app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost"],  # Permite Moodle local
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Modelo BERT multilingual
bert_model = SentenceTransformer('distiluse-base-multilingual-cased-v2')

# Cliente Llama3
client = OpenAI(
    base_url="https://integrate.api.nvidia.com/v1",
    api_key="api_key"  # Tu clave
)

# Variables globales para temas del CSV y embeddings
temas_extraidos = []
tema_embeddings = None
dataset_path = "syllabus_dataset.csv"

logging.basicConfig(level=logging.INFO, force=True)

class InicializarRequest(BaseModel):
    temas: list[str]

class ComparacionRequest(BaseModel):
    actividad: str

def load_dataset():
    global temas_extraidos, tema_embeddings
    if not os.path.exists(dataset_path):
        raise HTTPException(status_code=400, detail="El archivo syllabus_dataset.csv no existe")
    
    temas_extraidos = []
    with open(dataset_path, 'r', encoding='utf-8') as file:
        reader = csv.DictReader(file)
        for row in reader:
            temas_extraidos.append(row['Contenido'])
    
    if not temas_extraidos:
        raise HTTPException(status_code=400, detail="No se encontraron temas en el dataset")
    
    tema_embeddings = bert_model.encode(temas_extraidos, convert_to_tensor=True)
    logging.info(f"Cargados {len(temas_extraidos)} temas/subtemas desde {dataset_path}")

@app.post("/inicializar")
async def inicializar(request: InicializarRequest):
    global temas_extraidos, tema_embeddings
    # Ignoramos los temas enviados por PHP y cargamos del CSV
    load_dataset()
    return {"mensaje": "Temas inicializados exitosamente desde CSV"}

def consultar_llama3(tema_mas_similar, actividad):
    prompt = f"""
    Eres un experto en gestión de proyectos de software. Evalúa si la actividad '{actividad}' está relacionada semánticamente con el tema '{tema_mas_similar}' en el contexto del sílabo.
    Considera conceptos, sinónimos y relaciones. Responde con 'Sí' o 'No' en la primera línea, seguido de explicación breve.
    """
    completion = client.chat.completions.create(
        model="meta/llama3-8b-instruct",
        messages=[{"role": "user", "content": prompt}],
        temperature=0.2,
        max_tokens=128
    )
    content = completion.choices[0].message.content.strip()
    lines = content.split('\n')
    decision = lines[0].strip() == 'Sí'
    explicacion = ' '.join(lines[1:]) if len(lines) > 1 else ""
    return decision, explicacion

@app.post("/comparar_hibrido")
async def comparar_hibrido(request: ComparacionRequest):
    global tema_embeddings, temas_extraidos
    if tema_embeddings is None:
        raise HTTPException(status_code=400, detail="Inicializa los temas primero")

    try:
        actividad_embedding = bert_model.encode([request.actividad], convert_to_tensor=True)
        similarities = util.pytorch_cos_sim(actividad_embedding, tema_embeddings)[0]
        max_similitud = similarities.max().item()
        index_max = similarities.argmax().item()
        tema_mas_similar = temas_extraidos[index_max]

        logging.info(f"Comparando actividad '{request.actividad}' con tema '{tema_mas_similar}' (similitud: {max_similitud:.2f})")

        if max_similitud >= 0.7:
            return {"relacionado": True, "tema_identificado": tema_mas_similar, "explicacion": f"BERT: Relacionado (similitud {max_similitud:.2f})"}
        elif max_similitud < 0.4:
            return {"relacionado": False, "tema_identificado": tema_mas_similar, "explicacion": f"BERT: No relacionado (similitud {max_similitud:.2f})"}
        else:
            decision, explicacion = consultar_llama3(tema_mas_similar, request.actividad)
            return {"relacionado": decision, "tema_identificado": tema_mas_similar, "explicacion": f"Híbrido: {explicacion} (BERT similitud {max_similitud:.2f})"}
    except Exception as e:
        logging.error(f"Error en comparación: {str(e)}")
        raise HTTPException(status_code=500, detail=f"Error al evaluar: {str(e)}")

@app.get("/")
async def raiz():
    return {"mensaje": "Servicio híbrido funcionando."}