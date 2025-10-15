# Plugin Local Sílabo para Moodle

## Descripción

Plugin local para Moodle que permite a los profesores subir sílabos en formato PDF para sus cursos asignados. El sistema detecta automáticamente los cursos donde el usuario tiene rol de profesor, permite la subida de archivos PDF únicamente, extrae el contenido de texto automáticamente y lo guarda como respaldo.

## Características principales

- ✅ **Detección automática de cursos**: El sistema detecta los cursos donde el usuario tiene rol de profesor
- ✅ **Subida única por curso**: Evita duplicados y permite sobrescritura con confirmación
- ✅ **Solo archivos PDF**: Validación estricta de formato de archivo
- ✅ **Extracción de texto**: Convierte automáticamente el PDF a texto plano (.txt)
- ✅ **Integración con Moodle**: Usa el sistema de archivos nativo de Moodle
- ✅ **Interfaz intuitiva**: Navegación clara con selección de cursos
- ✅ **Detección de duplicados**: Validación por hash SHA1 del archivo
- ✅ **Pestaña en curso**: Se integra como una pestaña adicional en cada curso

## Estructura de archivos

```
local/silabo/
├── version.php              # Información de versión del plugin
├── settings.php             # Configuración del plugin
├── lib.php                  # Funciones principales
├── locallib.php             # Hooks de navegación
├── index.php                # Interfaz principal
├── upload.php               # Manejador de subida de archivos
├── lang/es/
│   └── local_silabo.php     # Cadenas de texto en español
└── db/
    ├── access.php           # Definición de permisos
    ├── install.xml          # Estructura de base de datos
    └── install.php          # Funciones de instalación
```

## Base de datos

### Tabla: `silabos`

| Campo         | Tipo          | Descripción                           |
|---------------|---------------|---------------------------------------|
| id            | int(10)       | Clave primaria                        |
| nombre_archivo| varchar(255)  | Nombre del archivo PDF subido         |
| contenido     | text          | Contenido extraído del PDF            |
| estado        | varchar(20)   | Estado: 'pendiente', 'procesado', 'error' |
| fecha_subida  | int(10)       | Timestamp de subida                   |
| curso_id      | int(10)       | ID del curso (FK a `course`)          |
| profesor_id   | int(10)       | ID del profesor (FK a `user`)         |
| archivo_txt   | varchar(255)  | Nombre del archivo .txt generado      |
| hash_archivo  | varchar(64)   | Hash SHA1 para detectar duplicados    |

## Instalación

1. **Copiar archivos**: Coloque la carpeta `silabo` en `/local/` de su instalación Moodle
2. **Ejecutar instalación**: Vaya a "Administración del sitio > Notificaciones"
3. **Configurar permisos**: Los permisos se asignan automáticamente
4. **Verificar configuración**: Vaya a "Administración del sitio > Plugins > Plugins locales > Sílabo"

## Configuración

El plugin incluye las siguientes configuraciones:

- **Habilitado**: Activar/desactivar el plugin
- **Tamaño máximo de archivo**: Límite de 20MB por defecto
- **Extensiones permitidas**: Solo PDF

## Uso

### Para profesores:

1. **Acceso**: Entre a cualquier curso donde tenga rol de profesor
2. **Navegación**: Busque la pestaña "Sílabo" en el menú del curso
3. **Selección**: Si no está en un curso específico, seleccione el curso de la lista
4. **Subida**: Use el formulario para subir su archivo PDF
5. **Confirmación**: El sistema mostrará confirmación y detalles del procesamiento

### Funcionalidades:

- **Vista general**: Lista todos los cursos con estado del sílabo
- **Subida segura**: Validación de formato y tamaño
- **Prevención de duplicados**: Alertas para archivos ya subidos
- **Sobrescritura controlada**: Opción para reemplazar sílabos existentes
- **Extracción automática**: Conversión de PDF a texto para respaldo

## Permisos

| Capacidad              | Descripción                    | Roles por defecto |
|-----------------------|--------------------------------|-------------------|
| local/silabo:view     | Ver sílabos                    | Estudiante, Profesor |
| local/silabo:edit     | Subir y editar sílabos         | Profesor |
| local/silabo:manage   | Gestión completa de sílabos    | Administrador |

## Requerimientos del sistema

- **Moodle**: Versión 4.0 o superior
- **PHP**: Versión 7.4 o superior
- **Espacio en disco**: Mínimo 100MB para archivos
- **Herramientas PDF** (opcional para mejor extracción):
  - `pdftotext` (poppler-utils)
  - Librería PDF Parser de PHP

## Extracción de texto

El plugin intenta extraer texto usando varios métodos:

1. **pdftotext**: Comando del sistema (recomendado)
2. **PDF Parser PHP**: Librería especializada
3. **Método básico**: Extracción simple como respaldo

## Archivos generados

- **PDFs originales**: Almacenados en el sistema de archivos de Moodle
- **Archivos .txt**: Guardados en `/moodledata/local_silabo/extracted_text/`
- **Logs**: Registros de actividad en los logs estándar de Moodle

## Solución de problemas

### Problemas comunes:

1. **"No se puede subir archivo"**: Verifique permisos de directorio
2. **"Error al extraer texto"**: Instale herramientas de PDF
3. **"Archivo demasiado grande"**: Ajuste límites en configuración
4. **"No aparece la pestaña"**: Verifique que tiene rol de profesor

### Verificaciones:

```bash
# Verificar permisos de directorio
ls -la /path/to/moodledata/local_silabo/

# Verificar herramientas PDF
which pdftotext
pdftotext -v
```

## Desarrollo y personalización

### Estructura de código:

- **Funciones principales**: `lib.php`
- **Interfaz de usuario**: `index.php`
- **Hooks de navegación**: `locallib.php`
- **Configuración**: `settings.php`

### Personalización:

El plugin está diseñado para ser fácilmente extensible. Puntos de personalización:

- Métodos de extracción de texto adicionales
- Validaciones personalizadas de archivos
- Integración con sistemas externos
- Reportes y estadísticas

## Soporte

Para reportar problemas o solicitar mejoras, contacte al desarrollador o cree un issue en el repositorio del proyecto.

## Licencia

GPL v3 - Compatible con Moodle
