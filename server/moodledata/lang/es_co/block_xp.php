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
 * Strings for component 'block_xp', language 'es_co', version '4.5'.
 *
 * @package     block_xp
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityname_help'] = 'El texto que el nombre de la actividad debe contener o al que debe ser igual. No distingue mayúsculas y minúsculas.';
$string['anonymity_help'] = 'Esta configuración controla si los participantes pueden ver el nombre de otros participantes y su imagen de perfil.';
$string['completionrules_help'] = 'Las reglas de finalización se separan en tres categorías: finalización de actividad, finalización de sección y finalización de curso. Añadir condiciones a las categorías determinará cuándo y cuántos puntos se consiguen.

Las reglas se evalúan en el orden en que se presentan en pantalla. Tan pronto como se cumpla una condición se conseguirán los puntos correspondientes y no se seguirán evaluando las reglas restantes.

[Para saber más](https://docs.levelup.plus/xp/docs/completion-rules?ref=blockxp_help)';
$string['configblockrankingsnapshot_help'] = 'El tablero de ranking muestra el nivel del usuario. Puede intentar mostrar también las dos personas vecinas. Esta característica requiere que se active el ranking y que se muestren los niveles.';
$string['configdescription_help'] = 'Un mensaje introductorio breve a mostrar en el bloque. Los estudiantes tienen la posibilidad de omitir el mensaje, en cuyo caso no lo volverán a ver.';
$string['configrecentactivity_help'] = 'Cuando está activado, el bloque mostrará una breve lista de eventos recientes que le hayan dado puntos al estudiante.';
$string['configtitle_help'] = 'El título del bloque.';
$string['currencysign_help'] = 'Con este ajuste usted puede cambiar el significado de los puntos. Se mostrará junto a la cantidad de puntos que tiene cada usuario como sustituto de la referencia a _puntos de experiencia_.

Elija uno de los símbolos existentes, ¡o suba los suyos!';
$string['drops_help'] = 'En videojuegos, algunos personajes pueden _soltar_ artículos o puntos de experiencia en el suelo para que el jugador los recoja. Estos artículos y puntos se suelen llamar "drops".

En Level Up XP, los "drops" son fragmentos de código ( p.ej. `[xpdrop id=1 secret=abcdef]`) que un docente puede colocar en contenido habitual de Moodle. Cuando se los encuentra un usuario, estos "drops" se _recogerán_ y se conseguirá un cierto número de puntos.

Actualmente, los "drops" son invisibles para el usuario y el usuario los consigue de forma pasiva la primera vez que los encuentra.

Los "drops" se pueden usar para dar puntos de forma inteligente cuando un estudiante accede a un determinado contenido. Algunas ideas:

- Coloque un "drop" en la retroalimentación de un cuestionario que sólo sea visible cuando se hace perfectamente.
- Coloque un "drop" en contenido profundo para premiar su lectura.
- Coloque un "drop" en una discusión de foro interesante.
- Coloque un "drop" en una página a la que sea difícil llegar en un módulo "lección".

[Más información](https://docs.levelup.plus/xp/docs/how-to/use-drops?ref=blockxp_help)';
$string['enablecheatguard_help'] = 'Las medidas contra trampas son un mecanismo sencillo para evitar que los estudiantes abusen del sistema usando trucos obvios, como refrescar la misma página sin parar, o repetir la misma acción una y otra vez.';
$string['enableinfos_help'] = 'Cuando se configura a "No", los estudiantes no podrán ver la página de información.';
$string['enableladder_help'] = 'Cuando se configura a \'No\', los estudiantes no podrán ver el ranking.';
$string['enablelevelupnotif_help'] = 'Cuando se configura a \'Si\', a los estudiantes se les mostrará una ventana emergente felicitándolos por el nuevo nivel alcanzado.';
$string['enablexpgain_help'] = 'Cuando se configura como NO, nadie podrá ganar puntos en el curso. Esto es útil para congelar por un tiempo los puntos obtenidos o para habilitarlos en un momento tiempo limitado.

Por favor, tenga en cuenta que también puede controlarse con mayor precisión usando el permiso _block/xp:earnxp_.';
$string['eventsrules_help'] = 'Este plugin está usando los eventos para otorgar puntos a acciones realizadas por los estudiantes.
Puede usar el formulario siguiente para añadir sus propias reglas y modificar las reglas por defecto.

Se recomienda comprobar la página de _log_  del plugin para identificar eventos que se disparan cuando los estudiantes realizar acciones en el curso.

Recursos adicionales:

- [¿Cómo se calculan puntos de experiencia?](https://docs.levelup.plus/xp/docs/getting-started/points-calculation?ref=blockxp_help)
- [Solución de problemas de reglas](https://docs.levelup.plus/xp/docs/troubleshooting/event-rule-not-working?ref=blockxp_help)';
$string['graderules_help'] = 'Los estudiantes ganarán tantos puntos como su calificación.
Tanto una calificación de 5/10 como una de 5/100 le darán al estudiante 5 puntos.
Cuando la calificación de un estudiante varíe varias veces, ganarán puntos equivalentes a la calificación máxima que hayan recibido.
A los estudiantes nunca se les quitan puntos, y se ignoran las calificaciones negativas.

Ejemplo: Alicia entrega una tarea y recibe una calificación de 40/100. En _Level Up XP_, Alicia recibe 40 puntos por su calificación.
Alicia hace un nuevo intento en la misma tarea, pero esta vez su calificación baja a 25/100. Los puntos de Alicia en _Level Up XP_ no varían.
En su intento final, Alicia consigue 60/100, y gana 20 puntos adicionales en _Level Up XP_: el total de puntos obtenidos es 60.

[Más en la documentación de _Level Up XP_](https://docs.levelup.plus/xp/docs/how-to/grade-based-rewards?ref=blockxp_help)';
$string['importpoints_help'] = 'La importación puede usarse para _aumentar_ la puntuación de los estudiantes, o para _sobreescribirla_ con el valor dado.

Observe que la importación _no_ usa el mismo formato que el informe exportado. El formato requerido se describe en la [documentación](https://docs.levelup.plus/xp/docs/how-to/import-points/importing-points-from-csv?ref=localxp_help), donde hay un [archivo de ejemplo](https://docs.levelup.plus/xp/docs/how-to/import-points/importing-points-from-csv?ref=localxp_help#sample-file) disponible.';
$string['ladderadditionalcols_help'] = 'Este ajuste determina qué columnas adicionales se muestran en el ranking. Pulse las teclas CTRL o CMD mientras clica para seleccionar más de una columna, o para quitar la selección de una columna previamente seleccionada.';
$string['levelbadges_help'] = 'Suba imágenes para reemplazar el aspecto de niveles individuales.

Los archivos deben llamarse [nivel].[extensión de archivo], por ejemplo 1.png, 2.jpg, etc.

Recomendamos imágenes de 100x100 píxeles, en cualquiera de los siguientes formatos: GIF, JPEG, PNG and SVG.';
$string['leveldesc_help'] = 'Una breve descripción del nivel. Esto se muestra en la página de información junto al nivel mismo. Puede usarlo para describir una recompensa a estudiantes que hayan alcanzado el nivel, para incluir instrucciones sobre cómo trabajar para conseguir este nivel, para describir el nivel de forma lúdica (p.ej.: _Sólo los más intrépidos han llegado a conseguir este nivel_), etc.';
$string['levelname_help'] = 'Un nombre corto para mostrar en vez del _Nivel #1_, _Nivel #2_, etc que aparece por defecto a veces. ¡Si da nombre a algunos niveles, recomendamos que dé nombre a todos!';
$string['limitparticipants_help'] = 'Este ajuste controla quién sale en el ranking. Los vecinos son los participantes que aparecen encima y debajo del usuario actual. Por ejemplo, cuando se muestra "Mostrando 2 vecinos", sólo se mostrarán los dos participantes con puntuación inmediatamente superior e inferior que el usuario actual.';
$string['maxactionspertime_help'] = 'El número máximo de acciones que contarán para puntuar durante el lapso de tiempo dado. Cualquier acción subsiguiente se ignorará. Cuando este valor esta vacío o es igual a cero "0", no aplicará.';
$string['pointstoaward_help'] = 'El número de puntos a otorgar cuando se cumplan las condiciones.';
$string['ranking_help'] = 'El rank es la posición absoluta del usuario actual en el tablero de ranking. El ranking relativo es la diferencia en puntos de experiencia entre un usuario y sus vecinos.';
$string['rulecm_help'] = 'Esta condición se cumple cuando el evento ocurre en la actividad o recurso especificado.';
$string['rulesscope_help'] = 'El alcance de las reglas determina cuándo se aplicarán.

Las reglas se pueden crear con dos alcances: para todo el sitio o específicas para un curso. Cuando sea posible, se evaluarán primero las reglas de curso, seguidas de las reglas de sitio. Esto permite a los educadores crear reglas más amplias aplicables a todo el sitio y ajustarlas para cursos individual.

- Para todo el sitio: Estas reglas son efectivas para todo el sitio, excepto cuando haya reglas específicas para cursos.
- Para el curso: Estas reglas se aplican sólo en un curso específico. Tienen prioridad sobre las reglas de todo el sitio.';
$string['shortcode:xpiflevel_help'] = 'Vea los ejemplos siguientes para dar formato a este atajo de código. Cuando se especifica estrictamente un nivel, el contenido se mostrará independientemente de otras reglas.
Todas las reglas _mayor_ y _menor que_ deben coincidir para que el contenido se muestre.
¡Fíjese en que a eso puede hacer que el contenido nunca se muestre!
Tenga en cuenta que los profesores, y otros usuarios con permisos de edición, siempre lo verán todo.

```
[xpiflevel 1 3 5]
    Se muestra si el nivel del usuario es exactamente 1, 3 or 5.
[/xpiflevel]

[xpiflevel >3]
    Se muestra si el nivel del usuario es mayor que 3.
[/xpiflevel]

[xpiflevel >=3]
    Se muestra si el nivel del usuario es mayor o igual a 3.
[/xpiflevel]

[xpiflevel >=10 <20 30]
    Se muestra si el nivel del usuario es mayor o igual a 10 Y SI es estrictamente menor que 20
O SI es exactamente igual a 30.
[/xpiflevel]

[xpiflevel <=10 >=20]
    Nunca se muestra porque el nivel del usuario nunca puede ser menor o igual a 10 Y mayor o igual a 20.
[/xpiflevel]
```

Tenga en cuenta que estos atajos de código NO pueden enlazarse entre ellos.';
$string['shortcode:xpladder_help'] = 'Por defecto se mostrará una parte del tablero de ranking alrededor del actual usuario.

```
[xpladder]
```

Para mostrar los 10 estudiantes superiores en vez de los vecinos del usuario actual, seleccione el parámetro `top`. Opcionalmente puede seleccionar el número de usuarios a mostrar con algo así como `top=20`.

```
[xpladder top]
[xpladder top=15]
```

Se mostrará un enlace al tablero de ranking completo bajo la tabla. Si no quiere mostrar tal enlace, añada el argumento `hidelink`.

```
[xpladder hidelink]
```

Por defecto la tabla no incluye la columna de progreso que muestra la barra de progreso. Si se ha seleccionado esa columna en la configuración del tablero de ranking, puede usar el argumento `withprogress` para mostrarla.

```
[xpladder withprogress]
```

Tenga en cuenta que cuando un curso usa grupos el tablero de ranking averiguará mejor qué grupo debe mostrar el tablero de ranking.';
$string['shortcode:xplevelname_help'] = 'Por defecto la etiqueta muestra el nombre del nivel del usuario actual.
Alternativamente puede usar el argumento `level` para mostrar el nombre de un nivel específico.

```
[xplevelname]
[xplevelname level=5]
```

Si se da el argumento`level` y no existe el nivel, no se mostrará nada.';
$string['shortcode:xppoints_help'] = 'Por defecto esto muestra el número de puntos del usuario actual. Alternativamente usted puede especificar un número para sobreescribir este valor.

El estilo de los puntos dependerá de si se muestra un valor arbitrario o los puntos actuales del usuario. El argumento `plain` puede usarse para eliminar cualquier estilo.

```
[xppoints]
[xppoints 500]
[xppoints 123 plain]
```';
$string['timebetweensameactions_help'] = 'El mínimo tiempo requerido antes de que una acción que ya haya sucedido anteriormente se acepte de nuevo. Una acción se considera idéntica si ocurrió en el mismo objeto y contexto; leer un post de un foro se considerará idéntico si se lee el mismo post otra vez. Cuando el valor está vacío, o es igual a cero, no es aplicable.';
$string['timeformaxactions_help'] = 'El lapso de tiempo (en segundos) durante el que el usuario no debe exceder un máximo número de acciones.';
$string['usecustomlevelbadges_help'] = 'Cuando configura a SI, debe proporcionar una imagen para cada nivel.';
