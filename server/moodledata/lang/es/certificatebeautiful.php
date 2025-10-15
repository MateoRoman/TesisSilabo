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
 * Strings for component 'certificatebeautiful', language 'es', version '4.5'.
 *
 * @package     certificatebeautiful
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_new_model'] = 'Añadir nuevo modelo';
$string['add_new_page'] = 'Añadir una nueva página al certificado';
$string['best'] = 'El mejor';
$string['certdate'] = 'Fecha';
$string['certificate-appreciation'] = 'Certificado de Aprecio';
$string['certificate-details'] = 'Detalles del Certificado';
$string['certificate-elegant'] = 'Certificado Elegante';
$string['certificate-flat-modern'] = 'Certificado Plano Moderno';
$string['certificate-golden'] = 'Certificado Dorado';
$string['certificate-gradient-golden-luxury'] = 'Certificado Gradiente Dorado Lujoso';
$string['certificate-kids-animals'] = 'Para niños con animales';
$string['certificate-kids-child-medical'] = 'Certificado médico infantiloide';
$string['certificate-kids-gradient-modern'] = 'Plantilla de certificado moderno gradiente';
$string['certificate-kids-hand-drawn'] = 'Certificado kinder dibujado a mano';
$string['certificate-kids-pastel'] = 'Certificado educación pastel simpático';
$string['certificate-modern'] = 'Certificado Moderno';
$string['certificate-modern-2'] = 'Certificado Moderno 2';
$string['certificate-simple'] = 'Certificado Simple';
$string['certificate-vintage'] = 'Certificado Antiguo';
$string['certificate_description'] = 'Describa el certificado';
$string['certificate_description_help'] = 'Texto de descripción del certificado. Puede contener HTML simple como &lt;b&gt;, &lt;i&gt;, &lt;u&gt; y estilos de color, pero tenga cuidado, ya que el <a href="https://mpdf.github.io/" target="_blank">convertidor de PDF tiene limitaciones</a>.';
$string['certificatebeautiful-page_empty'] = 'Vacío';
$string['certificatebeautiful:addinstance'] = 'Añadir instancia';
$string['certificatebeautiful:delete'] = 'Eliminar instancia de certificado';
$string['certificatebeautiful:view'] = 'Permitirle al usuario vwer el Certificado hermoso';
$string['certificatebeautiful:viewreport'] = 'Ver reportes de Certificado hermoso';
$string['certpresented'] = 'Este certificado es orgullosamente presentado a';
$string['certsignature'] = 'Director';
$string['certtitle'] = 'Certificado';
$string['config_data_protect'] = 'Protección de datos personales';
$string['config_data_protect_admins_only'] = 'Visible solo para administradores';
$string['config_data_protect_desc'] = 'Marque para anonimizar los datos personales en el validador de certificados';
$string['config_data_protect_email_anonimized'] = 'Nombre visible y correo electrónico anonimizado';
$string['config_data_protect_hidden'] = 'Oculto para todos';
$string['config_data_protect_name_visible'] = 'Nombre visible solo';
$string['config_signature_color'] = 'Color de linea de firma';
$string['config_signature_color_desc'] = 'Seleccionar el color de la linea de escritura para la firma.';
$string['config_signature_enable'] = 'Habilitar firma dinámica';
$string['config_signature_enable_desc'] = 'Cuando se activa, Certificado Hermoso creará una firma personalizada basada en la escritura a mano elegida, el texto y el color especificados.';
$string['config_signature_heading'] = 'Configuraciones de Firma';
$string['config_signature_heading_desc'] = 'En este punto, usted debe decidir si desea crear un certificado personalizado desde las {$a}   caligrafías precargadas. Sus opciones incluyen:';
$string['config_signature_text'] = 'Texto de Firma';
$string['config_signature_text_desc'] = 'Para que el Certificado Hermoso genere automáticamente firmas, es necesario proporcionar una secuencia de hasta 10 caracteres. Asegúrese de que la secuencia no contenga espacios, números ni acentos. Cabe señalar que una secuencia compuesta por 5 a 7 caracteres dará como resultado una firma visualmente agradable.';
$string['config_signature_typography'] = 'Estilo de Texto de Firma';
$string['config_signature_typography_desc'] = 'De forma predeterminada, el Certificado Hermoso generará una firma usando el texto siguiente y empleará esta caligrafía para personalizar el contenido.';
$string['course'] = 'Curso';
$string['course_certificates'] = 'Certificados del curso';
$string['create_after_model'] = 'Primeramente guarde el modelo antes de añadir páginas al certificado';
$string['create_at_certificate'] = 'Certificado para {$a}';
$string['create_model'] = 'Crear modelo';
$string['default-description'] = 'Este certificado certifica que el estudiante <b>{$USER->fullname}</b> ha completado exitosamente el <b>{$course->fullname}</b> con honores, consolidando un conjunto exhaustivo de conocimiento y habilidades esenciales para sobresalir en entornos dinámicos.';
$string['delete-page'] = 'Eliminar página';
$string['download_my_certificate'] = 'Descargar mi certificado';
$string['edit_page'] = 'Editar página del certificado';
$string['edit_page_instruction'] = '<p>El certificado se crea utilizando <a target="_blank" href="https://github.com/GrapesJS/grapesjs">GrapesJS</a> como editor. El editor está configurado en <a target="_blank" href="https://github.com/GrapesJS/grapesjs/issues/1936">dragMode:\'absolute\'</a>, lo que le permite arrastrar y soltar componentes dentro del editor. Después de editar, haga clic en "<strong>Prueba PDF</strong>" para obtener una vista previa del resultado y, cuando haya terminado, utilice el botón "<strong>Guardar página de certificado</strong>" para guardar el certificado generado.</p><p>Debido a las limitaciones de <a target="_blank" href="https://mpdf.github.io/">mPDF</a>, solo los elementos en la raíz del certificado admiten el posicionamiento absoluto. Por lo tanto, se restringe el movimiento de otros componentes dentro del DIV raíz para evitar inconsistencias en el PDF final. mPDF solo admite el posicionamiento absoluto de los elementos <code>&lt;div&gt;</code>, por lo que cuando utilice un código personalizado para insertar nuevos componentes, comience siempre con <code>&lt;div&gt;</code>.</p><p>Después del editor, usted encontrará claves que se pueden agregar al certificado para personalizarlo. Con respecto al código QR, tenga en cuenta que la imagen <code>qr-code.svg</code> se reemplaza por el código QR generado por el plugin. Por lo tanto, si edita la imagen, la funcionalidad puede verse comprometida. En cuanto a la firma generada por el sistema, reemplazará la imagen <code>signature.png</code> en el proyecto. Si elige una imagen personalizada para el certificado, el plugin no realizará la modificación automáticamente.</p>';
$string['edit_signature_certificate'] = 'Personalizar aquí su firma del certificado';
$string['edit_this_page'] = 'Editar esta página del certificado';
$string['from_certificates'] = 'Certificados para estudiante{$a}';
$string['help_base_title'] = 'Claves disponibles para reemplazar en el certificado:';
$string['list_model'] = 'Lista de modelos';
$string['manage_models'] = 'Gestionar modelos de certificado';
$string['model_name'] = 'Nombre del modelo';
$string['model_name_missing'] = 'Nombre del modelo es necesario';
$string['model_orientation'] = 'Orientación';
$string['model_orientation_l'] = 'Horizontal';
$string['model_orientation_p'] = 'Vertical';
$string['model_page_name'] = 'Página: {$a}';
$string['modulename'] = 'Certificado hermoso';
$string['modulenameplural'] = 'Certificados hermosos';
$string['my_certificates'] = 'Mis certificados';
$string['new_model'] = 'Nuevo Modelo';
$string['only_format'] = 'Llevando solo el formato {$a}';
$string['pages_certificate'] = 'Páginas del certificado';
$string['pluginadministration'] = 'Administración del certificado del curso';
$string['pluginname'] = 'Certificado hermoso';
$string['preview_certificate'] = 'Vista previa del certificado';
$string['privacy:metadata:certificatebeautiful_issue'] = 'Información acerca de los certificados emitido a usuarios.';
$string['privacy:metadata:certificatebeautiful_issue:userid'] = 'Almacena la ID del usuario que recibió el certificado.';
$string['report'] = 'Ver certificados generados';
$string['report_code'] = 'Código del certificado';
$string['report_confirm_delete_certificate'] = '¿Está seguro de querer eliminar este certificado?';
$string['report_create_certificate'] = 'Crear certificado';
$string['report_delete_certificate'] = 'Eliminar';
$string['report_deleted_certificate'] = '¡Certificado eliminado exitosamente!';
$string['report_filename'] = 'Certificados generados por estudiantes';
$string['report_timecreated'] = 'Creado en';
$string['report_title'] = 'Reporte';
$string['report_useremail'] = 'Email del estudiante';
$string['report_usernome'] = 'Nombre del estudiante';
$string['report_view_certificate'] = 'Ver';
$string['save_model'] = 'Guardar modelo';
$string['select_a_model'] = 'Seleccionar un modelo';
$string['select_background_image'] = 'Seleccionar la nueva imagen de fondo para el certificado';
$string['select_background_image_info2'] = '<div class="alert alert-warning">
<p>Por favor, suba una nueva imagen para reemplazar el fondo del certificado.</p>
<p>El certificado está en formato <strong>{$a->orientation}</strong>, y la imagen debe tener dimensiones de <strong>{$a->size} píxeles</strong>, que corresponden a <strong>{$a->sizecm} cm</strong>. Asegúrese de mantener estas proporciones para evitar distorsión o pixelación.</p>
</div>';
$string['select_background_preview'] = 'Cambiar la imagen de fondo del certificado';
$string['select_model'] = 'Seleccionar modelo';
$string['select_model_preview'] = 'Seleccionar una plantilla pre-existente para actualizar el diseño de esta página';
$string['select_the_model'] = 'Seleccionar el modelo';
$string['subtititle'] = 'De finalización';
$string['sumary'] = 'Resumen';
$string['sumary-secound-page'] = 'Resumen del Certificado';
$string['sumary-secound-page2'] = 'Lista de secciones y módulos del curso';
$string['using_this_page'] = 'Usar esta página';
$string['validate_certificate_code'] = 'Código de autenticidad';
$string['validate_certificate_course'] = 'Curso del certificado';
$string['validate_certificate_date'] = 'Emitido en la fecha de';
$string['validate_certificate_name'] = 'Nombre del Certificado';
$string['validate_certificate_notfound'] = '¡Código de autenticidad no encontrado!';
$string['validate_certificate_submit'] = 'Validar código';
$string['validate_certificate_title'] = 'Verificar autenticidad de certificado';
$string['validate_certificate_user'] = 'Otorgado a';
$string['validate_certificate_validate'] = 'Validar';
$string['view_my_certificate'] = 'Ver mi certificado en una nueva pestaña';
