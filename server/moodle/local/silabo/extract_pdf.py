import sys
import pdfplumber
import os

def extract_pdf_to_xml(pdf_path, output_xml):
    try:
        os.makedirs(os.path.dirname(output_xml), exist_ok=True)

        with open(output_xml, 'w', encoding='utf-8') as f:
            f.write('<root>\n')  # Contenedor raíz del XML
            with pdfplumber.open(pdf_path) as pdf:
                for page in pdf.pages:
                    # Definir bounding box para la columna izquierda (mitad izquierda de la página)
                    left_column = page.within_bbox((0, 0, page.width / 2, page.height))
                    text = left_column.extract_text()
                    if not text:
                        continue
                    for line in text.strip().split('\n'):
                        line = line.strip()
                        if line:  # Ignorar líneas vacías
                            f.write(f'  <div>{line}</div>\n')  # Encapsular cada línea en una etiqueta <div>
            f.write('</root>\n')  # Cerrar contenedor raíz

        print(f"Extracción completada. XML guardado en: {output_xml}")
        return 0

    except Exception as e:
        import traceback
        print("❌ Error al procesar el archivo PDF:")
        print(f"Tipo de error: {type(e).__name__}")
        print(f"Mensaje: {str(e)}")
        print("Traza de error completa:")
        traceback.print_exc()
        return 1


if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Uso: python extract_pdf.py <ruta_pdf> <ruta_xml_salida>")
        sys.exit(1)

    pdf_path = sys.argv[1]
    output_xml = sys.argv[2]

    if not os.path.exists(pdf_path):
        print("El archivo PDF no existe.")
        sys.exit(1)

    sys.exit(extract_pdf_to_xml(pdf_path, output_xml))
