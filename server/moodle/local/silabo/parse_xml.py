import sys
import os
import xml.etree.ElementTree as ET

def parse_xml_to_txt(xml_path, txt_path):
    parsed = []
    order = 0
    current_unit = None
    current_theme = None
    expect_theme = False
    start_parsing = False
    skip_unit = False

    # Palabras clave para filtrar basura
    skip_keywords = [
        "HORAS DE TRABAJO AUTÓNOMO", "COMPONENTES DE DOCENCIA", "PRÁCTICAS DE APLICACIÓN",
        "TOTAL HORAS", "ACTIVIDADES DE APRENDIZAJE", "FECHA ÚLTIMA REVISIÓN", "ACTIVIDADES DE APRE",
        "CÓDIGO:", "VERSIÓN:", "FIRMAS", "DIRECTOR", "DOCENTE", "ANGEL GEOVANNY",
        "SONIA", "LEGALIZACIÓN", "FIR", "ASPE", "PROGRAMA DE AS", "TOTA", "NIVEL",
        "3. PROYECCIÓN METODOLÓGICA", "6. TÉCNICAS Y PONDERACION", "7. BIBLIOGRAFÍA",
        "8. BIBLIOGRAFÍA", "9. LECTURAS"
    ]

    try:
        tree = ET.parse(xml_path)
        root = tree.getroot()

        for div in root.findall('.//div'):
            text = div.text.strip() if div.text else ""
            if not text:
                continue

            if "2. SISTEMA DE CONTENIDOS" in text:
                start_parsing = True
                continue
            if not start_parsing:
                continue

            # Detectar nueva unidad y limpiar nombre
            if text.startswith("Unidad") and "Horas" in text:
                import re
                match = re.match(r"(Unidad\s+\d+)", text)
                if match:
                    current_unit = match.group(1)
                    current_theme = None
                    expect_theme = True
                    skip_unit = False  # reiniciar exclusión de unidad
                continue

            if expect_theme:
                current_theme = text
                expect_theme = False
                continue

            # Salir si la unidad fue marcada como no relevante
            if not current_unit or not current_theme or skip_unit:
                continue

            # Si aparece ACTIVIDADES DE APRE o similar → ignorar lo que sigue de la unidad
            if "ACTIVIDADES DE APRE" in text.upper():
                skip_unit = True
                continue

            # Saltar si es basura por keyword
            if any(keyword.lower() in text.lower() for keyword in skip_keywords):
                continue

            # Omitir líneas demasiado cortas (probablemente ruido)
            if len(text.strip()) < 3:
                continue

            # Añadir subtema válido
            parsed.append({
                'orden': order + 1,
                'unidad': current_unit,
                'tema': current_theme,
                'subtema': text,
                'estado': 'pendiente'
            })
            order += 1

        # Guardar resultados
        os.makedirs(os.path.dirname(txt_path), exist_ok=True)
        with open(txt_path, 'w', encoding='utf-8') as f:
            for item in parsed:
                f.write(f"Orden: {item['orden']}, Unidad: {item['unidad']}, Tema: {item['tema']}, Subtema: {item['subtema']}, Estado: {item['estado']}\n")

    except Exception as e:
        import traceback
        print("❌ Error al procesar el archivo XML:")
        print(f"Tipo de error: {type(e).__name__}")
        print(f"Mensaje: {str(e)}")
        print("Traza de error completa:")
        traceback.print_exc()
        return 1


if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Uso: python parse_xml.py <ruta_xml> <ruta_txt_salida>")
        sys.exit(1)

    xml_path = sys.argv[1]
    txt_path = sys.argv[2]

    sys.exit(parse_xml_to_txt(xml_path, txt_path))
