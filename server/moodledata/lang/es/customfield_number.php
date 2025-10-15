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
 * Strings for component 'customfield_number', language 'es', version '4.5'.
 *
 * @package     customfield_number
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitytypes'] = 'Tipos de actividades';
$string['automaticallypopulated'] = 'Rellenado automáticamente';
$string['crontaskname'] = 'Rellenar automáticamente campos numéricos personalizados';
$string['decimalplaces'] = 'Número de cifras decimales';
$string['defaultvalueconfigerror'] = 'El valor por defecto debe estar entre el mínimo y el máximmo';
$string['display'] = 'Mostrar plantilla';
$string['display_help'] = 'Cómo mostrar el valor del campo. Use los siguientes marcadores de posición:

* **{value}** - muestra un valor en un formato decimal (flotante con decimales configurados en el campo)
* **$ {value}** - precio en dólares
* **{value} hrs** - duración en horas';
$string['displayvalueconfigerror'] = 'Marcador de posición no válido';
$string['displaywhenzero'] = 'Mostrar cuando sea cero';
$string['displaywhenzero_help'] = 'Cómo mostrar el valor del campo cuando el valor es "0". Por ejemplo, en caso de un precio puede mostrar la palabra "Gratis" pero en caso de la duración tal vez prefiera dejarlo en blanco porque significa que no se ha estimado la duración.

Déjelo en blanco si no quiere mostrar nada en absoluto cuando el valor sea "0".';
$string['fieldtype'] = 'Tipo de campo';
$string['fieldtype_help'] = 'Seleccione el tipo de campo numérico a configurar. Algunas opciones requieren introducción manual en la página de ajustes del curso, mientras que otros rellenan automáticamente valores, como con el número de actividades especificadas en un curso.';
$string['genericfield'] = 'Campo genérico para cualquier dato numérico';
$string['headerdisplaysettings'] = 'Mostrar formato';
$string['invalidprovider'] = 'Proveedor incorrecto';
$string['manualinput'] = 'Introducción manual';
$string['maximumvalue'] = 'Valor máximo';
$string['maximumvalueerror'] = 'El valor debe ser menor o igual a {$a}';
$string['minimumvalue'] = 'Valor mínimo';
$string['minimumvalueconfigerror'] = 'El valor mínimo debe ser menor que el máximo';
$string['minimumvalueerror'] = 'El valor debe ser mayor o igual a {$a}';
$string['missingrequired'] = 'Falta ID de instancia o ID de campo';
$string['nofactivities'] = 'Número de actividades en el curso';
$string['pluginname'] = 'Número';
$string['privacy:metadata'] = 'El plugin de personalización de campo de número no almacena ningún dato personal';
$string['specificsettings'] = 'Ajustes de campo de número';
