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
 * Strings for component 'aiprovider_azureai', language 'es', version '4.5'.
 *
 * @package     aiprovider_azureai
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action_apiversion'] = 'Versión API';
$string['action_deployment'] = 'ID de despliegue';
$string['action_deployment_desc'] = 'El ID de despliegue relacionado con el endpoint de API usada por el proveedor para esta acción.';
$string['action_systeminstruction'] = 'Instrucción del sistema';
$string['action_systeminstruction_desc'] = 'Esta instrucción se envía al modelo de IA junto a la entrada del usuario. No se recomienda editar esta instrucción salvo que sea absolutamente necesario.';
$string['apikey'] = 'Clave de API Azure AI';
$string['apikey_desc'] = 'Introduzca su clave de API Azure AI';
$string['deployment'] = 'Nombre de despliegue de API Azure AI';
$string['deployment_desc'] = 'Introduzca el nombre de despliegue de su API Azure AI.';
$string['enableglobalratelimit'] = 'Configurar límite para todo el sitio';
$string['enableglobalratelimit_desc'] = 'Limitar el número de solicitudes que el proveedor de API Azure AI puede recibir en todo el sitio cada hora.';
$string['enableuserratelimit'] = 'Configurar límite de usuario';
$string['enableuserratelimit_desc'] = 'Limitar el número de solicitudes que cada usuario puede hacer al proveedor de API Azure AI cada hora.';
$string['endpoint'] = 'Enpoint de API Azure AI';
$string['endpoint_desc'] = 'Introduzca la URL del endpoint de su Azure AI API con el siguiente formato: https://NOMBRE_DE_SU_RECURSO.openai.azure.com';
$string['globalratelimit'] = 'Número máximo de solicitudes para todo el sitio';
$string['globalratelimit_desc'] = 'El número máximo de solicitudes permitidas en una hora para todo el sitio.';
$string['pluginname'] = 'Proveedor de Azure AI API';
$string['privacy:metadata'] = 'El proveedor de Azure AI API no almacena ningún dato personal.';
$string['privacy:metadata:aiprovider_azureai:externalpurpose'] = 'Esta información se envía a la API Azure para que se genere una respuesta. Los ajustes de su cuenta Azure AI pueden cambiar cómo Microsoft almacena y retiene estos datos. No se envían datos de usuarios explícitamente a Microsoft ni se almacenna en el LMS de Moodle mediante este plugin.';
$string['privacy:metadata:aiprovider_azureai:model'] = 'El modelo usado para generar la respuesta.';
$string['privacy:metadata:aiprovider_azureai:numberimages'] = 'Cuando se generan imágenes, el número de imágenes usado en la respuesta.';
$string['privacy:metadata:aiprovider_azureai:prompttext'] = 'El texto introducido por el usuario usado para generar la respuesta.';
$string['privacy:metadata:aiprovider_azureai:responseformat'] = 'Cuando se generan imágenes, el formato de la respuesta.';
$string['userratelimit'] = 'Número máximo de solicitudes por usuario';
$string['userratelimit_desc'] = 'El número de solicitudes permitidas por hora, por usuario.';
