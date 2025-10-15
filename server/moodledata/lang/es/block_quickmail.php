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
 * Strings for component 'block_quickmail', language 'es', version '4.5'.
 *
 * @package     block_quickmail
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['additional_emails'] = 'Correos adicionales';
$string['additional_emails_help'] = 'Otras direcciones a las que quiere que se le envíen los mensajes, separadas por coma o punto y coma. Ejemplo

 email1@example.com, email2@example.com';
$string['additionalemail'] = 'Permitir correos electrónicos a direcciones de correo electrónico externas';
$string['additionalemail_desc'] = 'Si esta opción está habilitada, el remitente tendrá la capacidad de enviar mensajes a correos electrónicos adicionales fuera de Moodle';
$string['all_in_course'] = 'Todos los del curso';
$string['allow_mentor_copy'] = 'Permitir que los remitentes envíen mensajes automáticamente a los mentores de un destinatario al enviar';
$string['allow_mentor_copy_help'] = 'En caso negativo, esta opción no será visible para los remitentes y los mentores nunca serán copiados. En caso afirmativo, el remitente tendrá la opción de elegir por mensaje. Si se fuerza, esta opción se forzará sin opción para anular la selección.';
$string['allowstudents'] = 'Permitir a los estudiantes usar Quickmail';
$string['allowstudents_desc'] = 'Permitir que los estudiantes utilicen Quickmail. Si elige "Nunca", el bloque no se puede configurar para permitir el acceso de los estudiantes a nivel del curso.';
$string['alternate'] = 'Emails alternativos';
$string['alternate_activated'] = '¡Ahora se puede utilizar el correo electrónico alternativo {$a}!';
$string['alternate_already_confirmed'] = 'Ese correo electrónico ya ha sido confirmado.';
$string['alternate_availability'] = '¿Quién puede enviar desde este correo electrónico?';
$string['alternate_availability_course'] = 'Todos los roles permitidos en {$a->courseshortname}';
$string['alternate_availability_only'] = 'Solo yo, solo en {$a->courseshortname}';
$string['alternate_availability_user'] = 'Solo yo, en cualquier curso.';
$string['alternate_body'] = '<p>
{$a->fullname} añadió {$a->address} como email alternativo para el curso {$a->course}.
</p>

<p>
El propósito de este email es verificar que la dirección existe, y que el
propietario tiene los permisos necesarios en la plataforma.
</p>


<p>
Para completar el proceso de verificación, haga clic en el siguiente enlace: {$a->url}
</p>

<p>
Si cree que este correo no va dirigido a usted, puede que lo haya recibido por error.
Simplemente ignore el mensaje.
</p>

Gracias.';
$string['alternate_confirmation_email_resent'] = '¡El correo electrónico de confirmación ha sido reenviado!';
$string['alternate_confirmed'] = 'Confirmado';
$string['alternate_created'] = '¡El correo electrónico de envío alternativo se creó correctamente!';
$string['alternate_delete'] = 'Eliminar dirección alternativa';
$string['alternate_delete_confirm'] = 'Esto eliminará permanentemente su correo electrónico alternativo, ¿está seguro?';
$string['alternate_deleted'] = 'Su correo electrónico de envío alternativo ha sido eliminado.';
$string['alternate_email_not_found'] = 'No se pudo encontrar ese correo electrónico alternativo.';
$string['alternate_invalid_token'] = 'Token de confirmación no válido.';
$string['alternate_new'] = 'Añadir un email alternativo';
$string['alternate_owner_must_confirm'] = 'Debe ser el propietario del correo electrónico para confirmar.';
$string['alternate_owner_must_delete'] = 'Debe ser el propietario del correo electrónico a eliminar.';
$string['alternate_resend_confirmation'] = 'Reenviar correo electrónico de confirmación';
$string['alternate_subject'] = 'Verificación de la dirección alternativa';
$string['alternate_waiting'] = 'Esperando';
$string['altsendfrom'] = 'Permitir correos electrónicos alternativos';
$string['altsendfrom_desc'] = 'Permitir correos electrónicos alternativos (necesita un cambio fundamental para esto).';
$string['attached_files'] = 'Archivos adjuntos ($a})';
$string['attachments'] = 'Archivos adjuntos';
$string['back_to_course'] = 'Volver al curso';
$string['back_to_mypage'] = 'Volver a Mi Página';
$string['backup_block_configuration'] = 'Respaldar ajustes de configuraciones de Nivel de Bloque de Quickmail  (Como por ejemplo [Allow Students to use Quickmail])';
$string['backup_history'] = 'Incluir historial de Quickmail';
$string['body'] = 'Cuerpo';
$string['broadcast'] = 'Redactar mensaje de administrador';
$string['cachedef_qm_controller_store'] = 'Almacén de caché para instancias de controlador.';
$string['cachedef_qm_event_notif_last_fired_at'] = 'Almacén en caché para las marcas de tiempo de la última vez que se activó la notificación del evento.';
$string['cachedef_qm_msg_addl_email_count'] = 'Recuentos de correo electrónico adicionales de mensajes en caché.';
$string['cachedef_qm_msg_attach_count'] = 'Recuentos de archivos adjuntos de mensajes en caché.';
$string['cachedef_qm_msg_deliv_count'] = 'Recuentos de mensajes entregados en caché.';
$string['cachedef_qm_msg_recip_count'] = 'Recuento de destinatarios de mensaje en caché.';
$string['compose'] = 'Redactar mensaje del curso';
$string['condition_grade_greater_than'] = 'Puntuación superior a';
$string['condition_grade_less_than'] = 'Puntuación inferior a';
$string['condition_summary_reminder_course_grade_range'] = 'Todos los que tengan una calificación entre {$a->grade_greater_than} y {$a->grade_less_than}';
$string['condition_summary_reminder_course_non_participation'] = 'Todos los que no han accedido al curso en {$a->time_amount} {$a->time_unit}';
$string['could_not_duplicate'] = 'No se pudo duplicar este borrador. Inténtelo de nuevo.';
$string['course_required'] = 'Se requiere un curso.';
$string['coursealternate_not_allowed'] = 'No puede compartir este correo electrónico alternativo en este curso.';
$string['courseferpa'] = 'Respetar el modo de grupos';
$string['courseneveraccessed'] = 'Nunca accedido';
$string['create_new'] = 'Crear nuevo';
$string['create_notification'] = 'Crear notificación';
$string['create_notification_message'] = 'Crear mensaje de notificación {$a->model} {$a->type}';
$string['create_notification_message_description'] = 'Ahora cree el mensaje que desea que se le envíe cuando se envíe esta notificación.';
$string['created'] = 'Creado';
$string['critical_error'] = 'Error crítico';
$string['default_message_type'] = 'Método de envío de mensajes preferido';
$string['default_message_type_configuration'] = 'Esta configuración será el método de envío predeterminado para cualquiera que redacte un mensaje en este curso. El remitente podrá anular la redacción del mensaje.';
$string['default_message_type_configuration_help'] = 'Esta configuración será el método de envío predeterminado para cualquiera que redacte un mensaje en este curso. El remitente podrá anular la redacción del mensaje.';
$string['default_message_type_desc'] = 'Envíe sus mensajes como Mensajes Moodle o correo electrónico tradicional.';
$string['delete_draft_confirm_message'] = 'Esto eliminará permanentemente su borrador de mensaje, ¿está seguro?';
$string['delete_draft_modal_title'] = 'Eliminar borrador de mensaje';
$string['delete_signature'] = 'Eliminar firma';
$string['delete_signature_confirm_message'] = 'Esto eliminará permanentemente su firma, ¿está seguro?';
$string['delete_signature_modal_title'] = 'Eliminar firma';
$string['deleted'] = 'Eliminado';
$string['download_file_content'] = 'Descargar contenido del archivo';
$string['downloads'] = 'Requerir ingresar para anexos';
$string['downloads_desc'] = 'Esta configuración determina si los anexos están disponibles solamente para usuarios ingresados a Moodle';
$string['draft_no_record'] = 'No se pudo encontrar ese borrador del mensaje.';
$string['drafted'] = 'Redactado';
$string['drafts'] = 'Ver borradores';
$string['duplicate'] = 'Duplicado';
$string['duplicate_draft_confirm_message'] = 'Esto hará una copia del borrador, ¿está seguro?';
$string['duplicate_draft_modal_title'] = 'Borrador de mensaje duplicado';
$string['edit_conditions'] = 'Editar condiciones';
$string['edit_event_details'] = 'Editar detalles del evento';
$string['edit_message'] = 'Editar mensaje';
$string['edit_notification'] = 'Editar notificación';
$string['edit_schedule'] = 'Editar programación';
$string['email_profile_fields'] = 'Campos de perfil de correo electrónico';
$string['email_profile_fields_desc'] = 'Estos campos de perfil se enviarán automáticamente por correo electrónico si están configurados para el usuario destinatario.';
$string['enable_notification'] = 'Habilitar la notificación';
$string['eventalternateemailadded'] = 'Email alternativo añadido';
$string['eventalternateemailadded_desc'] = 'El usuario con ID {$a->user_id} ha agregado un correo electrónico alternativo: {$a->email}';
$string['excluded_ids_label'] = 'Excluir';
$string['excluded_recipients_desc'] = '¿Quién NO debería recibir este mensaje?';
$string['failed_recipients'] = 'Destinatarios fallidos o pendientes';
$string['failed_recipients_promise'] = 'Continuaremos intentando enviar a estos destinatarios hasta que el mensaje se haya enviado correctamente.';
$string['ferpa'] = 'Modo FERPA';
$string['ferpa_desc'] = 'Permite al sistema comportarse según el modo de grupos del curso, ignorando el modo de grupos pero separándolos, o ignorando los grupos totalmente.';
$string['found_filtered_users'] = 'Se encontraron {$a} usuarios';
$string['from_email'] = 'Dirección de correo electrónico del remitente';
$string['from_email_help'] = 'La dirección de correo electrónico desde la que se enviará este mensaje. Puede agregar direcciones alternativas adicionales a través del menú de bloqueo en la página del curso.';
$string['here'] = 'aquí';
$string['included_ids_label'] = 'Para';
$string['included_recipients_desc'] = '¿Quién debería recibir este mensaje?';
$string['invalid_additional_email'] = 'El correo electrónico adicional "{$a}" introducido no es válido';
$string['invalid_additional_emails_validation'] = 'Algunos de los correos electrónicos adicionales que ingresó no eran válidos.';
$string['invalid_availability'] = 'Valor de disponibilidad no válido.';
$string['invalid_condition_grade_greater_than'] = 'Calificación no válida mayor que el valor.';
$string['invalid_condition_grade_less_than'] = 'Calificación no válida menor que el valor.';
$string['invalid_condition_time_amount'] = 'Cantidad de tiempo no válida para la condición.';
$string['invalid_condition_time_unit'] = 'Unidad de tiempo no válida para la condición.';
$string['invalid_custom_data_delimiters'] = 'Los códigos de sustitución del cuerpo del mensaje no están formateados correctamente.';
$string['invalid_custom_data_key'] = 'No se permite la clave de datos personalizada "{$a}".';
$string['invalid_custom_data_not_allowed'] = 'No se permiten códigos de sustitución personalizados para este mensaje.';
$string['invalid_email'] = 'Dirección de correo electrónico no válida.';
$string['invalid_notification_model'] = 'Selección de modelo de notificación no válida.';
$string['invalid_notification_type'] = 'El tipo de notificación debe ser "Recordatorio" o "Evento".';
$string['invalid_schedule_time_amount'] = 'Cantidad de tiempo no válida para la programación.';
$string['invalid_schedule_time_unit'] = 'Unidad de tiempo no válida para la programación.';
$string['invalid_send_method'] = 'Ese método de envío no está permitido.';
$string['invalid_time_amount'] = 'Cantidad de tiempo no válida.';
$string['invalid_time_relation'] = 'Debe ser "antes" o "después".';
$string['invalid_time_unit'] = 'Unidad de tiempo no válida.';
$string['is_enabled'] = 'Activado';
$string['last_run_at'] = 'Última ejecución';
$string['last_updated'] = 'Última actualización';
$string['manage_alternates'] = 'Correos electrónicos alternativos';
$string['manage_drafts'] = 'Ver borradores';
$string['manage_signatures'] = 'Mis firmas';
$string['mentor_copy'] = '¿Enviar copias a los mentores de los destinatarios?';
$string['mentor_copy_help'] = 'Si es seleccionado, cualquier mentor de sus destinatarios recibirá una copia del mensaje.';
$string['mentor_copy_message_prefix'] = '<p><strong>Estás recibiendo este mensaje porque estás asignado como mentor de</strong>: {$a}. La siguiente es una copia del mensaje que también se envió a su aprendiz.</p>';
$string['mentor_copy_subject_prefix'] = '[Copia del mentor]';
$string['mentors_copied'] = 'Enviar copia a los mentores';
$string['message_deleted'] = 'Mensaje borrado';
$string['message_details'] = 'Detalles del mensaje';
$string['message_no_record'] = 'No se pudo encontrar ese mensaje';
$string['message_not_found'] = 'No se pudo encontrar ese mensaje';
$string['message_preview'] = 'Vista previa del mensaje';
$string['message_queued'] = 'Mensaje programado para ser enviado';
$string['message_sent_asap'] = 'El mensaje se enviará en breve';
$string['message_sent_now'] = 'Mensaje enviado';
$string['message_type'] = 'Enviar mensajes Quickmail como';
$string['message_type_available_all'] = 'Sin restricciones, preferencia del remitente';
$string['message_type_available_email'] = 'Restringir solo al correo electrónico tradicional';
$string['message_type_available_message'] = 'Restringir solo a mensajes de Moodle';
$string['message_type_desc'] = 'Permite enviar mensajes de Quickmail como mensaje de Moodle, correo electrónico tradicional o preferencia del remitente.';
$string['message_type_email'] = 'Correo electrónico';
$string['message_type_message'] = 'Mensaje de Moodle';
$string['message_types_available'] = 'Restricciones de tipo de mensaje';
$string['message_types_available_desc'] = 'Restrinja los mensajes de Quickmail para que se envíen como mensajes de Moodle, correos electrónicos tradicionales o preferencias del remitente.';
$string['message_unqueued'] = 'Mensaje no programado';
$string['messageprovider:quickmessage'] = 'Mensaje Quickmail';
$string['migrate'] = 'Migrar datos';
$string['migrate_legacy_data_task'] = 'Migrar datos históricos de Quickmail v1 a v2';
$string['migration_chunk_size'] = 'Tamaño del fragmento de migración';
$string['migration_chunk_size_desc'] = 'Número de registros que debe procesar la tarea de migración de datos heredados cada vez que se ejecuta, si está habilitada.';
$string['missing_body'] = 'Falta contenido del mensaje.';
$string['missing_email'] = 'Falta dirección de correo electrónico.';
$string['missing_firstname'] = 'Falta nombre.';
$string['missing_lastname'] = 'Falta apellido.';
$string['missing_notification_name'] = 'Falta el nombre de la notificación.';
$string['missing_subject'] = 'Falta línea de asunto.';
$string['ms_alternate'] = 'Correos electrónicos alternativos';
$string['ms_compose'] = 'Redactar';
$string['ms_config'] = 'Configurar';
$string['ms_create_notification'] = 'Crear notificación';
$string['ms_drafts'] = 'Borradores';
$string['ms_notifications'] = 'Notificaciones';
$string['ms_queued'] = 'Programado';
$string['ms_sent'] = 'Correos electrónicos enviados';
$string['ms_signatures'] = 'Mis firmas';
$string['must_be_draft_to_duplicate'] = 'El mensaje debe ser un borrador para duplicarlo.';
$string['must_be_owner_to_duplicate'] = 'Lo sentimos, ese borrador no le pertenece y no se puede duplicar.';
$string['mute_time_summary'] = 'Tiempo de silencio';
$string['mute_time_unit'] = 'Tiempo de silencio';
$string['mute_time_unit_help'] = 'Una cantidad de tiempo opcional que debe transcurrir entre el envío automático de esta notificación.';
$string['never'] = 'Nunca';
$string['next_run_at'] = 'Nueva ejecución';
$string['no_alternates'] = 'No tiene correos electrónicos alternativos. ¡Cree uno nuevo ahora!';
$string['no_drafts'] = 'No hay borradores.';
$string['no_excluded_recipients'] = 'No hay destinatarios excluidos';
$string['no_included_recipients'] = 'No hay destinatarios incluidos';
$string['no_included_recipients_validation'] = 'Debe seleccionar al menos un destinatario.';
$string['no_notifications'] = 'No tiene notificaciones creadas.';
$string['no_queued'] = 'No tiene mensajes programados';
$string['no_sents'] = 'No tiene historial de mensajes enviados.';
$string['no_signatures_create'] = 'No tiene firmas. {$a}.';
$string['noferpa'] = 'No respetar el modo de grupos';
$string['notification_already_sent'] = 'Esta notificación ya ha sido enviada al menos una vez.';
$string['notification_conditions'] = 'Condiciones';
$string['notification_conditions_description'] = 'Especifique las condiciones de estas notificaciones. Se notificará a todos los destinatarios que cumplan estas condiciones.';
$string['notification_created'] = 'Notificación creada.';
$string['notification_deleted'] = 'Notificación borrada.';
$string['notification_is_enabled'] = 'Notificación habilitada';
$string['notification_is_enabled_help'] = 'Si está habilitada, esta notificación estará activa; de lo contrario, la notificación estará deshabilitada hasta que la habilite.';
$string['notification_model'] = 'Modelo de notificación';
$string['notification_model_event_course_entered'] = 'Curso ingresado';
$string['notification_model_event_course_entered_description'] = 'Notificar a un participante del curso cuando acceda al curso por primera vez.';
$string['notification_model_reminder_course_grade_range'] = 'Rango de calificaciones del curso';
$string['notification_model_reminder_course_grade_range_condition_description'] = 'Especifique el rango de calificaciones. Si un participante del curso se encuentra actualmente dentro de este rango, se le notificará.';
$string['notification_model_reminder_course_grade_range_description'] = 'Notificar a los participantes del curso que actualmente tienen una calificación dentro del rango dado.';
$string['notification_model_reminder_course_non_participation'] = 'No participación en el curso';
$string['notification_model_reminder_course_non_participation_condition_description'] = 'Especifique la cantidad de tiempo desde el último acceso al curso. Si un participante del curso no ha accedido al curso en este período de tiempo, se le notificará.';
$string['notification_model_reminder_course_non_participation_description'] = 'Notificar a los participantes del curso que no han accedido al curso en un período de tiempo determinado.';
$string['notification_name'] = 'Título';
$string['notification_name_help'] = 'Una breve descripción de esta notificación para ayudarle a identificarla fácilmente entre otras notificaciones que haya configurado.';
$string['notification_name_too_long'] = 'El nombre de la notificación debe tener 40 caracteres o menos.';
$string['notification_not_found'] = 'No se pudo encontrar esa notificación.';
$string['notification_not_updated'] = 'Notificación actualizada.';
$string['notification_review'] = 'Revise su notificación';
$string['notification_schedule'] = 'Programación';
$string['notification_type'] = 'Tipo de notificación';
$string['notification_type_event'] = 'Evento';
$string['notification_type_event_description'] = 'Un mensaje automatizado que se envía como reacción a un evento específico. Los eventos se pueden utilizar para alertar a los destinatarios de que se han completado actividades, se han enviado o calificado tareas y más.';
$string['notification_type_reminder'] = 'Recordatorio';
$string['notification_type_reminder_description'] = 'Un mensaje recurrente que se enviará automáticamente de forma programada. Los recordatorios se pueden utilizar para alertar a los destinatarios sobre las próximas actividades, fechas de entrega, participación en clases y más.';
$string['notification_updated'] = 'Notificación actualizada.';
$string['notifications'] = 'Notificaciones';
$string['notifications_enabled'] = 'Habilitar notificaciones de Quickmail';
$string['notifications_enabled_desc'] = 'Permita que los cursos creen notificaciones automáticas, incluidos recordatorios y respuestas a eventos.';
$string['notified_by'] = 'Notificado por';
$string['open'] = 'Abrir';
$string['open_broadcast'] = 'Redactar mensaje';
$string['open_compose'] = 'Redactar mensaje';
$string['overwrite_history'] = 'Sobreescribir historial de Quickmail';
$string['pending_recipients'] = 'Destinatarios pendientes';
$string['pending_recipients_promise'] = 'Estos destinatarios están recibiendo mensajes en este momento, vuelva más tarde para ver los fallos.';
$string['picker_style_autocomplete'] = 'Autocompletar';
$string['picker_style_multiselect'] = 'Selección múltiple';
$string['picker_style_option_title'] = 'Mi estilo preferido para el selector de destinatarios';
$string['picker_style_option_title_help'] = 'Su interfaz personal preferida para seleccionar destinatarios al redactar un mensaje.';
$string['pluginname'] = 'Quickmail';
$string['prepend_class'] = 'Anteponer el nombre del curso';
$string['prepend_class_configuration'] = 'Añada la información de identificación del curso al asunto del mensaje.';
$string['prepend_class_configuration_help'] = 'Añada la información de identificación del curso al asunto del mensaje.';
$string['prepend_class_desc'] = 'Anteponer el nombre corto del curso al asunto del email.';
$string['preview_no_body'] = '(Sin contenido)';
$string['preview_no_subject'] = '(Sin asunto)';
$string['profile_mentor_copy_message_prefix'] = '<p><strong>Está recibiendo este mensaje porque está asignado como {$a} del destinatario previsto</strong>. La siguiente es una copia de lo que se envió al destinatario.</p>';
$string['queue_scheduled_notifications_task'] = 'Ponga en cola cualquier notificación de Quickmail programada para enviarse';
$string['queued'] = 'Programado';
$string['queued_no_record'] = 'No se ha encontrado el mensaje en cola.';
$string['quickmail:addinstance'] = 'Añadir un nuevo bloque Quickmail al curso';
$string['quickmail:allowalternate'] = 'Cree direcciones de correo electrónico alternativas desde las que enviar';
$string['quickmail:allowcoursealternate'] = 'Cree direcciones de correo electrónico alternativas para compartir con otros instructores del curso';
$string['quickmail:canconfig'] = 'Permite a los usuarios configurar instancias de Quickmail.';
$string['quickmail:cansend'] = 'Permite a los usuarios enviar emails con Quickmail.';
$string['quickmail:createnotifications'] = 'Crear notificaciones automáticas en Quickmail';
$string['quickmail:myaddinstance'] = 'Añadir un nuevo bloque Quickmail a la página /my';
$string['quickmail:viewgroupusers'] = 'Ver todos los usuarios de cada grupo';
$string['receipt'] = 'Recibir copia';
$string['receipt_configuration'] = 'Enviar un correo electrónico de confirmación al remitente del mensaje cuando éste haya sido enviado. Esta configuración será la preferencia por defecto para el remitente.';
$string['receipt_configuration_help'] = 'Enviar un correo electrónico de confirmación al remitente del mensaje cuando éste haya sido enviado. Esta configuración será la preferencia por defecto para el remitente.';
$string['receipt_email_body'] = '<p>¡Su mensaje ha sido enviado! Puede ver más detalles de este mensaje enviado {$a->sent_message_link}.</p> <p> <strong>Resumen de detalles del mensaje:</strong><br><br> <strong>Curso:</strong> {$a->curse_name}<br><br> <strong>Asunto del mensaje:</strong> {$a->subject}<br><br> <strong>Destinatarios:</strong> {$a-> recipent_count}<br><br> <strong>Correos electrónicos de destinatarios adicionales:</strong> {$a->addition_emails_string}<br><br> <strong>Enviados a mentores:</strong> {$a->sent_to_mentors} <br><br> <strong>Recuento de archivos adjuntos:</strong> {$a->attachment_count}<br><br> <strong>Cuerpo del mensaje:</strong> </p> {$a->message_body }';
$string['receipt_help'] = 'Recibir una copia del email enviado';
$string['recipients'] = 'Destinatarios';
$string['redirect_back_from_message_detail_message_deleted'] = 'El mensaje que está intentando ver ha sido eliminado.';
$string['redirect_back_from_message_detail_no_access'] = 'No puede ver este mensaje.';
$string['redirect_back_to_course_from_message_after_duplicate'] = 'Su mensaje ha sido duplicado correctamente.';
$string['redirect_back_to_course_from_message_after_save'] = 'Se ha guardado tu borrador.';
$string['redirect_back_to_course_from_notifications_not_enabled'] = 'Las notificaciones de Quickmail están desactivadas para su sitio.';
$string['reset_success_message'] = 'Se ha restablecido la configuración predeterminada de Quickmail.';
$string['restore_default_confirm_message'] = 'Esto restablecerá la configuración predeterminada de Quickmail de este curso, ¿está seguro?';
$string['restore_default_modal_title'] = 'Restaurar configuración por defecto';
$string['restore_history'] = 'Restaurar historial de Quickmail';
$string['save'] = 'Guardar';
$string['save_draft'] = 'Guardar borrador';
$string['save_signature'] = 'Guardar firma';
$string['schedule_begin_at'] = 'Fecha de comienzo';
$string['schedule_end_at'] = 'Fecha de finalización';
$string['scheduled_time'] = 'Hora programada';
$string['select_allowed_user_fields'] = 'Campos de datos de usuario admitidos';
$string['select_allowed_user_fields_desc'] = 'Los remitentes podrán hacer referencia a los campos seleccionados para que el contenido del mensaje sea dinámico y específico para el destinatario. Ej: "[:firstname:]"';
$string['select_message_type'] = 'Enviar mensaje como';
$string['select_notification_model'] = 'Seleccione {$a} Modelo de notificación';
$string['select_signature_for_edit'] = 'Seleccione la firma que desea editar';
$string['selectable_roles'] = 'Roles seleccionables';
$string['selectable_roles_configuration'] = 'Estos roles estarán disponibles para su selección al redactar un mensaje.';
$string['selectable_roles_configuration_help'] = 'Estos roles estarán disponibles para su selección al redactar un mensaje.';
$string['selectable_roles_desc'] = 'Estos roles estarán disponibles para su selección al redactar un mensaje. Este ajuste se puede anular mediante la configuración del curso.';
$string['send_all_ready_messages_task'] = 'Enviar todos los mensajes Quickmail programados';
$string['send_as_tasks'] = 'Enviar todos los mensajes como tareas en segundo plano.';
$string['send_as_tasks_help'] = 'Si se selecciona, enviará todos los mensajes de forma asíncrona como tareas cron. En caso contrario, se enviarán inmediatamente.';
$string['send_at'] = 'Enviar a';
$string['send_message'] = 'Enviar mensaje';
$string['send_now'] = 'Enviar ahora';
$string['send_now_scheduled_confirm_message'] = 'Esto olvidará el horario y enviará el mensaje ahora, ¿está seguro?';
$string['send_now_scheduled_modal_title'] = 'Enviar mensaje ahora';
$string['send_now_threshold'] = 'Umbral de envío';
$string['send_now_threshold_desc'] = 'Fuerce el envío inmediato de un mensaje no programado si el número de destinatarios es este número o menos, incluso si el bloque está configurado para enviar mensajes como tareas en segundo plano. La configuración de 0 ignorará esta configuración.';
$string['send_receipt_subject_addendage'] = 'Mensaje enviado';
$string['send_schedule'] = 'Enviar programación';
$string['sending'] = 'Enviando';
$string['sent'] = 'Enviado';
$string['sent_at'] = 'Enviado a';
$string['sent_messages'] = 'Historial de mensajes enviados';
$string['set_event_details'] = 'Establecer detalles de notificación de evento {$a->model}';
$string['set_event_details_description'] = 'Especifique opciones adicionales sobre el evento.';
$string['set_notification_conditions'] = 'Establecer {$a->model} {$a->type} Condiciones de notificación';
$string['set_notification_schedule'] = 'Establecer {$a->model} {$a->type} Programa de notificación';
$string['set_notification_schedule_description'] = 'Especifique con qué frecuencia se debe enviar esta notificación, cuándo debe comenzar y cuándo debe finalizar. Si no se especifica una fecha de finalización, esta notificación continuará enviándose hasta que se deshabilite o se elimine.';
$string['signature'] = 'Firma';
$string['signature_signature_required'] = 'Se requiere una firma.';
$string['signature_title_must_be_unique'] = 'El título de la firma debe ser único.';
$string['signature_title_required'] = 'Se requiere un título de firma.';
$string['signatures'] = 'Firmas';
$string['status'] = 'estado';
$string['strictferpa'] = 'Separar grupos siempre';
$string['subject'] = 'Asunto';
$string['success_recipients_promise'] = 'Todos estos destinatarios recibieron mensajes del sistema.';
$string['time_amount'] = 'Cantidad de tiempo';
$string['time_beginning'] = 'Comenzando';
$string['time_delay_summary'] = 'Tiempo de retardo';
$string['time_delay_unit'] = 'Tiempo de retardo';
$string['time_delay_unit_help'] = 'Una cantidad de tiempo opcional para esperar antes de que se envíe la notificación.';
$string['time_ending'] = 'Finalizando';
$string['time_every'] = 'Cada';
$string['time_once_a'] = 'Una vez';
$string['time_relation'] = 'Antes o después';
$string['time_unit'] = 'Unidad de tiempo';
$string['time_unit_day'] = 'Día';
$string['time_unit_days'] = 'Días';
$string['time_unit_month'] = 'Mes';
$string['time_unit_months'] = 'Meses';
$string['time_unit_week'] = 'Semana';
$string['time_unit_weeks'] = 'Semanas';
$string['title'] = 'Título';
$string['unqueue'] = 'Salir de la cola';
$string['unqueue_scheduled_confirm_message'] = 'Esto cancelará la programación del envío de este mensaje y lo guardará como borrador, ¿está seguro?';
$string['unqueue_scheduled_modal_title'] = 'Mensaje programado fuera de cola';
$string['user_signature_deleted'] = 'Su firma ha sido eliminada.';
$string['validation_exception_message'] = '¡Excepción de validación!';
$string['view'] = 'Ver';
$string['view_message_detail'] = 'Ver detalles del mensaje';
$string['view_queued'] = 'Ver programado';
$string['view_sent'] = 'Ver mensajes enviados';
