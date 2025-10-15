<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Strings for component 'tool_catalogue', language 'es', version '4.5'.
 *
 * @package     tool_catalogue
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutthiscourse'] = 'Acerca de este curso';
$string['aboutthisprogram'] = 'Acerca de este programa';
$string['addrange'] = 'Agregar rango';
$string['all'] = 'Todos';
$string['allavailablecourses'] = 'Todos los cursos disponibles';
$string['allowhtmltags'] = 'Permitir etiquetas HTML';
$string['aria:courseactions'] = 'Acciones del curso';
$string['cachedef_filters'] = 'Filtros y resultados de búsqueda del catálogo de aprendizaje';
$string['catalogue'] = 'Catálogo';
$string['catalogue:config'] = 'Configurar catálogo de aprendizaje';
$string['catalogueisdisabled'] = 'El catálogo de aprendizaje está deshabilitado';
$string['cataloguesettings'] = 'Configuración del catálogo de mis programas y cursos';
$string['categories'] = 'Categorías';
$string['categoriesdepthlimit'] = 'Número máximo de niveles de categorías enlazadas';
$string['categoriesdepthlimit_desc'] = 'Número máximo de niveles de categorías enlazadas en el selector de categorías. Los cursos de los niveles inferiores seguirán apareciendo en los resultados la búsqueda.';
$string['categorieslimit'] = 'Número máximo de categorías del mismo nivel';
$string['categorieslimit_desc'] = 'Número máximo de categorías del mismo nivel en el selector de categorías. Las categorías se mostrarán en el mismo orden en que se hayan definido en la página de gestión del curso. Si hay más categorías en un nivel, las categorías no se mostrarán en el selector pero todos los cursos serán visibles en los resultados de la búsqueda.';
$string['certifications'] = 'Certificaciones';
$string['certificationstatuscertified'] = 'La certificación \'<strong>{$a->name}</strong>\' está completa';
$string['certificationstatuscertifiedwithdate'] = 'La certificación \'<strong>{$a->name}</strong>\' está completa. La misma vence el \'<strong>{$a->date}</strong>\'';
$string['certificationstatusexpired'] = 'La certificación \'<strong>{$a->name}</strong>\' venció el {$a->date}';
$string['certificationstatusopen'] = 'La certificación \'<strong>{$a->name}</strong>\' no tiene fecha de vencimiento';
$string['certificationstatusopenwithdate'] = 'Completar el programa \'<strong>{$a->date}</strong>\' para obtener la certificación \'<strong>{$a->name}</strong>\'';
$string['certificationstatusoverdue'] = 'La certificación \'<strong>{$a->name}</strong>\' venció el \'<strong>{$a->date}</strong>\'';
$string['clearall'] = 'Borrar todo';
$string['complete'] = 'Completo';
$string['completeatleast'] = 'Completar al menos {$a}';
$string['coursecoverhelp'] = 'Este curso es parte del programa \'{$a}\'';
$string['coursecoverhelpmultiprogram'] = 'Este curso es parte de algunos programas';
$string['coursecoverhelptext'] = '<ul><li>Este es solo un curso que forma parte de programas más grandes</li><li>Puede haber nuevos cursos disponibles después de completar este</li></ul>';
$string['coursedisplayduelimit'] = 'Mostrar días restantes de cursos';
$string['coursedisplayduelimit_desc'] = 'Cantidad de días a partir de los cuales los usuarios verán un pequeño recordatorio (quedan X días) junto al nombre del curso. Por ejemplo, si se establece en 14, el recordatorio será visible durante los 14 días anteriores a la fecha de finalización del curso. En el caso de muchas fechas de finalización diferentes, el sistema evaluará cuál es la siguiente más cercana. Dejarlo en 0 para deshabilitar esta funcionalidad.';
$string['coursefiles'] = 'Archivos de curso';
$string['courseimage_help'] = 'Imagen del curso.';
$string['coursenotavailable'] = 'Curso no disponible';
$string['courses'] = 'Cursos';
$string['coursesperpage_frontpage'] = 'Número de cursos por página, página principal del sitio';
$string['coursesperpage_frontpage_desc'] = 'Número de cursos a mostrar en la página principal cuando se incluye "Listado de cursos" en la configuración de ítems de la página del sitio.';
$string['coursesperpage_main'] = 'Número de cursos por página, página del catálogo principal';
$string['coursesperpage_main_desc'] = 'Número de cursos a mostrar en la página del catálogo principal antes de seleccionar una categoría o de solicitar una búsqueda y antes de aplicar filtros.';
$string['coursesperpage_search'] = 'Número de cursos por página, resultados de búsqueda';
$string['coursesperpage_search_desc'] = 'Número de cursos a mostrar en los resultados de búsqueda de curso o cuando se selecciona una categoría.';
$string['dates'] = 'Fechas';
$string['daysleft'] = 'Quedan {$a} días';
$string['defaultsortorder'] = 'Ordenamiento predeterminado';
$string['deleterange'] = 'Eliminar rango';
$string['display'] = 'Mostrar';
$string['displaycourseinfomodal'] = 'Mostrar información del curso modal';
$string['displayfieldlabel'] = 'Mostrar nombre del campo';
$string['displayfields_desc'] = 'Por favor, seleccione todos los campos que tengan que mostrarse como filtros y ordénelos en el orden adecuado. No todos los tipos de campos personalizados se pueden usar en filtros. <br>Los cambios en la tabla anterior se guardan automáticamente.';
$string['displayfields_list'] = 'Campos a mostrar en la vista de "lista" (detallada) del catálogo de aprendizaje';
$string['displayfields_tiles'] = 'Campos amostrar en la vista "títulos" (compacta) del catálogo de aprendizaje';
$string['displayfieldscard_desc'] = 'Seleccione todos los campos para mostrar en la tarjeta del curso y organícelos en el orden apropiado.<br>Los cambios en la tabla anterior se guardan automáticamente.';
$string['displayforeverybody'] = 'Mostrar a todos';
$string['displayfornotadmin'] = 'Mostrar sólo para usuarios que no sean administradores';
$string['displayforstudentsandguests'] = 'Mostrar sólo durante el acceso de invitados y para estudiantes';
$string['displaynever'] = 'No mostrar nunca';
$string['displayprogramcoverpage'] = 'Mostrar la portada del programa';
$string['displaysummaryasis'] = 'Mostrarlo como es';
$string['displaysummarynohtml'] = 'Mostrar sin HTML';
$string['displaysummarynone'] = 'No mostrar';
$string['displaywhenzeroprice'] = 'Mostrar cuando el precio es cero';
$string['displaywhenzeroprice_help'] = 'Cómo mostrar el precio cuando hay un complemento de autoinscripción disponible sin pago.

Si se deja vacío, el campo de precio no se mostrará para los cursos gratuitos.';
$string['dontshowagain'] = 'No volver a mostrar este mensaje';
$string['duedate'] = 'Ordenar por fecha de completud';
$string['duedateinfo'] = 'Vence en un día';
$string['duedateinfodays'] = 'Vence en {$a} días';
$string['duedatex'] = '<strong>Fecha de vencimiento:</strong> {$a}';
$string['editfilterranges'] = 'Editar rangos de filtros';
$string['editlabel'] = 'Editar etiqueta';
$string['enablelearningcatalogue'] = 'Habilitar catálogo de aprendizaje';
$string['enablelearningcatalogue_desc'] = 'Habilitar esta configuración para dar a todos los usuarios acceso al "Catálogo" en la navegación principal. Esto les permite descubrir, filtrar e inscribirse fácilmente en cursos. El catálogo de Moodle Workplace reemplazará la página de cursos estándar para todos los usuarios.
<br><br>Para obtener más detalles, consulte la <a href="{$a}">página de documentación</a>.';
$string['enddate'] = 'Fecha de fin';
$string['enddatex'] = '<strong>Fecha de fin:</strong> {$a}';
$string['enrolmentplugin'] = 'Plugin de matriculación';
$string['errornopermissionviewcoursecover'] = 'Sin permisos para ver la portada del curso';
$string['errornopermissionviewprogram'] = 'Sin permisos para ver el programa';
$string['featuredcustomfield'] = 'Campo personalizado destacado';
$string['featuredcustomfield_desc'] = 'Si el campo personalizado seleccionado está "marcado" en un curso, ese curso aparecerá en la página principal del catálogo.';
$string['featuredlearning'] = 'Aprendizaje destacado';
$string['featuredlearningdisabled'] = 'La sección de aprendizaje destacado está deshabilitada';
$string['featuredlearningsectionsummary'] = 'Descripción de la sección destacada';
$string['featuredlearningsectionsummary_desc'] = 'Este texto se mostrará junto con los cursos destacados en la sección "Destacados" en la página principal del catálogo.';
$string['featuredlearningsectiontitle'] = 'Título de la sección destacada';
$string['featuredlearningsectiontitle_default'] = 'Destacado';
$string['featuredlearningsectiontitle_desc'] = 'Anula el título de la sección "Destacados" del catálogo. Si se deja en blanco, se mostrará el título predeterminado "Destacado".';
$string['fieldlabel'] = 'Campo de nombre';
$string['fieldonlyvisibleincatalogue'] = 'Este campo tiene visibilidad restringida en las páginas de información del curso y de inscripción; sin embargo, aún puede estar disponible en el catálogo de aprendizaje. Si se habilita aquí, el campo será visible para todos.';
$string['filterfields'] = 'Campos a mostrar en el filtro de catálogo de aprendizaje';
$string['formerror_maximumminimumempty'] = 'Proporcionar un valor mínimo o máximo o habilitar "Incluir valores vacíos"';
$string['formerror_minimumgreaterthanmaximum'] = 'El valor mínimo no puede ser mayor que el valor máximo';
$string['formerror_rangeempty'] = 'El filtro debe tener al menos un rango';
$string['free'] = 'Gratis';
$string['headerdisplaysettings'] = 'Formato de visualización';
$string['hiddenfromlearners'] = 'Oculto para los colaboradores';
$string['hidefieldname'] = 'Ocultar nombre del campo';
$string['htmltagsall'] = 'Permitir cualquier etiqueta HTML';
$string['htmltagsnone'] = 'Quitar todas las etiquetas HTML';
$string['htmltagssafe'] = 'Sólo etiquetas HTML seguras';
$string['includeemptyvalues'] = 'Incluye valores vacíos';
$string['incomplete'] = 'No concluído';
$string['information'] = 'Información';
$string['iunderstand'] = 'Entiendo';
$string['lastaccess'] = 'Ordenado por el último acceso';
$string['learningcataloguesettings'] = 'Configuración del catálogo de aprendizaje';
$string['maximumvalue'] = 'Valor máximo';
$string['maximumvalue_help'] = 'Especificar el valor más alto para este rango o dejarlo vacío para no tener límite.';
$string['minimumvalue'] = 'Valor mínimo';
$string['minimumvalue_help'] = 'Especificar el valor más bajo de este rango o dejarlo vacío para no definir límite.';
$string['moreinfo'] = 'Más información';
$string['mycourses'] = 'Mis cursos';
$string['name'] = 'Ordenar por nombre';
$string['noresultsfor'] = 'Sin resultados para \'{$a}\'';
$string['notavailableunless'] = 'No disponible a menos que \'{$a}\' esté disponible';
$string['notavailableuntil'] = 'No disponible hasta que \'{$a}\' esté completado';
$string['notnow'] = 'No ahora';
$string['notset'] = 'No ajustado';
$string['notspecified'] = 'Sin especificar';
$string['numberequalorgreaterthan'] = 'Mayor o igual';
$string['numberequalorlessthan'] = 'Menor o igual';
$string['numbergreaterthan'] = 'Mayor que';
$string['numberlessthan'] = 'Menor que';
$string['overdue'] = 'Vencido';
$string['overvalue'] = 'Más de {$a}';
$string['pagealastpage'] = 'Página {$a}, última página';
$string['pageamorepagesahead'] = 'Página {$a}, más páginas por delante';
$string['pagination'] = 'Paginación';
$string['pluginname'] = 'Catálogo de aprendizaje';
$string['price'] = 'Precios por plugin de matriculación';
$string['price_currency'] = 'Moneda';
$string['price_currency_help'] = 'Ingresar un código de moneda de 3 letras. Asegurarse de que este código coincida con el código de moneda utilizado en los métodos de inscripción disponibles para el curso.';
$string['price_enrolplugins'] = 'Plugin de matriculación';
$string['price_enrolplugins_help'] = '<p>Seleccionar los métodos de inscripción que se desean verificar entre aquellos que permiten a los estudiantes inscribirse por sí mismos en un curso. Si existe una instancia coincidente con la moneda especificada, el precio se extraerá automáticamente. Las instancias sin moneda (por ejemplo, \'Autoinscripción\') se considerará que tienen un precio de \'0\'.</p><p>Si existen múltiples instancias de métodos que permiten a los estudiantes inscribirse por sí mismos en un curso, se mostrará el precio más bajo.</p><p>Nota: Prueba exhaustivamente los complementos de inscripción adicionales antes de activarlos, ya que pueden almacenar datos de manera diferente, lo que afectaría la extracción del precio.</p>';
$string['privacy:metadata:preference:tool_catalogue_collapse_recently_accessed_courses'] = 'Si colapsar la sección "Cursos accedidos recientemente"';
$string['privacy:metadata:preference:tool_catalogue_hide_program_cover_help'] = 'Si mostrar la ayuda de la portada del programa';
$string['privacy:metadata:preference:tool_catalogue_my_courses_filter'] = 'Si filtrar los programas/cursos por todos/cursos/programas/completo/incompleto';
$string['privacy:metadata:preference:tool_catalogue_my_courses_sort'] = 'Si ordenar programas/cursos por nombre/fecha de vencimiento/último acceso';
$string['privacy:metadata:showprogramcoverhelp'] = 'Si mostrar la ayuda de la portada del programa';
$string['privacy:request:preference:set'] = 'El valor del ajuste \'{$a->name}\' fue \'{$a->value}\'';
$string['proceedtocourse'] = 'Ir al contenido del curso';
$string['proceedtoprogram'] = 'Ir al contenido del programa';
$string['program'] = 'Programa';
$string['programdisplayduelimit'] = 'Mostrar los días que faltan para el vencimiento del programa';
$string['programdisplayduelimit_desc'] = 'Cantidad de días a partir de los cuales los usuarios verán un pequeño recordatorio (Vence en X días) junto al nombre del programa. Por ejemplo, si se establece en 14, el recordatorio será visible durante los 14 días antes de que el programa llegue a su fecha de vencimiento. Establecerlo en 0 para deshabilitar esta funcionalidad.';
$string['programempty'] = 'No hay cursos en este programa';
$string['programhelptext'] = '<ul><li>Los programas pueden contener diferentes cursos</li><li>Completar los cursos para completar el programa</li></ul>';
$string['programhelptitle'] = '¿Qué es un programa?';
$string['programimage_help'] = 'La imagen del programa.';
$string['programlink'] = 'Ver "{$a}" detalles';
$string['programlinksingle'] = 'Ver detalles del programa';
$string['programs'] = 'Programas';
$string['programstructure'] = 'Estructura del programa';
$string['progress'] = '{$a}% completo';
$string['progresscompleted'] = '{$a->completed} de {$a->total} completos';
$string['rangename'] = 'Nombre del rango';
$string['rangename_help'] = '<p>Este nombre se mostrará a los usuarios en el panel de filtros. Si se deja vacío, el nombre del rango se creará automáticamente a partir de los límites del rango.</p>';
$string['rangevalue'] = '{$a->min} - {$a->max}';
$string['recentlyaccessedcourses'] = 'Cursos accedidos recientemente';
$string['reg_wpcatalogueashome'] = '<p>El catálogo está habilitado y se ha añadido a la página de inicio del sitio ({$a}).</p>';
$string['reg_wpcatalogueenabled'] = 'El catálogo está habilitado ({$a})';
$string['reg_wpcataloguefeatured'] = 'Si la sección de cursos destacados en el catálogo está habilitada ({$a})';
$string['reg_wpcataloguehighlighted'] = 'Si está habilitado el destacado de cursos ({$a})';
$string['reg_wpcataloguepublic'] = 'El catálogo está habilitado y disponible para los invitados ({$a})';
$string['reindextaskname'] = 'Reindexación periódica de cursos para el catálogo';
$string['resultsfor'] = '{$a->count} resultados para \'{$a->keywords}\'';
$string['safehtmltags'] = 'Etiquetas HTML seguras en resumen y campos de texto';
$string['safehtmltags_desc'] = 'Listado de etiquetas HTML que deberían mantenerse al mostrar el resumen de curso o campos personalizados de curso en el Catálogo de Aprendizaje. Todas las demás etiquetas se eliminarán para garantizar que los resúmenes de curso no rompan la disposición del catálogo. <br>Observe que para resúmenes de curso las etiquetas HTML puede que no funcionen bien juto al ajuste "Truncar".';
$string['searchfields'] = 'Campos para buscar palabras clave';
$string['searchfields_desc'] = 'Seleccionar todos los campos del curso donde debe buscarse la palabra clave y organizarlos en orden de prioridad.<br>Los cambios en la tabla anterior se guardan automáticamente.';
$string['searchmethod'] = 'Método de búsqueda de cursos';
$string['searchmethod_desc'] = 'Seleccionar el método de búsqueda de cursos. Algunos métodos pueden requerir una reindexación periódica o una configuración adicional.';
$string['searchmethod_extended'] = 'Búsqueda extendida';
$string['searchmethod_simple'] = 'Búsqueda simple';
$string['searchplaceholder'] = 'Buscar cursos o programas';
$string['selectenrolmentmethod'] = 'Seleccionar un método de matriculación';
$string['showcataloguecoursecategory'] = 'Mostrar categoría de cursos en tarjetas de cursos';
$string['showcataloguecoursecategory_desc'] = 'La categoría de curso será visible en cualquier tarjeta de curso encontrada en "Área personal", "Mis cursos" y algunos bloques.';
$string['showcoursedates'] = 'Mostrar las fechas del curso en el modal del curso';
$string['showcoursedates_desc'] = 'Las fechas del curso serán visibles en el modal del curso y en la pestaña de información del curso.';
$string['showfeaturedsection'] = '<p>Mostrar la sección destacada en el catálogo.</p>';
$string['showfeaturedsection_desc'] = '<p>Si está habilitado, los cursos destacados se mostrarán en una sección independiente en la parte superior de la página principal del catálogo.</p>';
$string['showfieldname'] = 'Mostrar campo de nombre';
$string['showmore'] = 'Mostrar {$a} más...';
$string['startdate'] = 'Fecha de inicio';
$string['startdatex'] = '<strong>Fecha de inicio:</strong> {$a}';
$string['todo'] = 'Pendiente:';
$string['trainers'] = 'Formadores';
$string['truncatesummary'] = 'Truncar resumen de curso';
$string['truncatesummary_desc'] = 'Número máximo de caracteres a mostrar en el resumen del curso. Ajustar a 0 para no truncar. <br>Este ajuste controla el texto que se envía desde el servidor al navegador. Usted también puede optar por truncar campos individualmente directamente en el navegador usando CSS personalizado.';
$string['trydifferentskeyword'] = '<p>Intenta usar diferentes palabras clave o configuración de filtros.</p>';
$string['undervalue'] = 'Menos de {$a}';
$string['xcourses'] = '{$a} cursos';
