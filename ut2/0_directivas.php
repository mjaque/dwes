<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Directivas en PHP</title>
</head>

<body>
<?php
// =============================================
// DEMOSTRACIÓN DE DIRECTIVAS PHP
// =============================================

echo "<h1>Directivas de Configuración en PHP</h1>";

// Función para mostrar el estado de una directiva
function mostrarDirectiva($directiva) {
    $valor = ini_get($directiva);
    echo "<tr><td><strong>$directiva</strong></td><td>$valor</td></tr>";
}

// Modificar algunas directivas para la demostración
ini_set('max_execution_time', 90);
ini_set('memory_limit', '256M');
ini_set('display_errors', 1);

?>

<h2>Directivas Actuales del Sistema</h2>
<table border="1" cellpadding="5" cellspacing="0">
<tr><th>Directiva</th><th>Valor Actual</th></tr>
<?php
mostrarDirectiva('error_reporting');
mostrarDirectiva('display_errors');
mostrarDirectiva('max_execution_time');
mostrarDirectiva('memory_limit');
mostrarDirectiva('post_max_size');
mostrarDirectiva('upload_max_filesize');
mostrarDirectiva('date.timezone');
mostrarDirectiva('session.gc_maxlifetime');
mostrarDirectiva('default_charset');
?>
</table>

<h2>Modificando Directivas en Tiempo de Ejecución</h2>
<?php
// Antes de modificar
$tiempoOriginal = ini_get('max_execution_time');
echo "<p>Tiempo máximo de ejecución original: $tiempoOriginal segundos</p>";

// Modificar la directiva
ini_set('max_execution_time', 120);
$tiempoNuevo = ini_get('max_execution_time');
echo "<p>Tiempo máximo de ejecución modificado: $tiempoNuevo segundos</p>";

// Restaurar valor original
ini_set('max_execution_time', $tiempoOriginal);
echo "<p>Tiempo restaurado: " . ini_get('max_execution_time') . " segundos</p>";
?>

<h2>Directivas de Seguridad Importantes</h2>
<?php
$directivasSeguridad = [
    'allow_url_fopen' => 'Habilitar apertura de URLs',
    'allow_url_include' => 'Habilitar include de URLs',
    'expose_php' => 'Exponer versión de PHP',
    'display_errors' => 'Mostrar errores en producción'
];

echo "<ul>";
foreach ($directivasSeguridad as $directiva => $descripcion) {
    $valor = ini_get($directiva);
    $recomendacion = ($directiva == 'display_errors') ? 'Off' : 'Off';
    $estado = ($valor == $recomendacion) ? '✅ Seguro' : '⚠️ Revisar';
    echo "<li>$descripcion: <strong>$valor</strong> ($estado)</li>";
}
echo "</ul>";
?>

<h2>Métodos para Configurar Directivas</h2>

<h3>1. Archivo php.ini (Recomendado para producción)</h3>
<pre>
; En /etc/php/8.x/apache2/php.ini
max_execution_time = 90
memory_limit = 256M
display_errors = Off
log_errors = On
date.timezone = Europe/Madrid
</pre>

<h3>2. Archivo .htaccess (Apache)</h3>
<pre>
# En .htaccess
php_value max_execution_time 90
php_value memory_limit 256M
php_flag display_errors Off
php_value date.timezone Europe/Madrid
</pre>

<h3>3. En tiempo de ejecución con ini_set()</h3>
<pre>
&lt;?php
ini_set('max_execution_time', 90);
ini_set('memory_limit', '256M');
ini_set('display_errors', 0);
?&gt;
</pre>

<h3>4. En el código con funciones específicas</h3>
<pre>
&lt;?php
error_reporting(E_ALL);
date_default_timezone_set('Europe/Madrid');
set_time_limit(90);
?&gt;
</pre>

<h2>Directivas Críticas para Producción</h2>
<?php
$directivasProduccion = [
    'display_errors' => 'Off',
    'log_errors' => 'On',
    'expose_php' => 'Off',
    'allow_url_include' => 'Off',
    'session.cookie_httponly' => 'On',
    'session.cookie_secure' => 'On'
];

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Directiva</th><th>Valor Recomendado</th><th>Valor Actual</th><th>Estado</th></tr>";

foreach ($directivasProduccion as $directiva => $recomendado) {
    $actual = ini_get($directiva);
    $estado = ($actual == $recomendado) ? '✅' : '❌';
    echo "<tr>
            <td>$directiva</td>
            <td>$recomendado</td>
            <td>$actual</td>
            <td>$estado</td>
          </tr>";
}
echo "</table>";
?>

<h2>Verificación de Directivas No Modificables</h2>
<?php
// Algunas directivas no pueden modificarse en tiempo de ejecución
$directivasNoModificables = [
    'max_input_time',
    'memory_limit', // Depende del contexto
    'post_max_size'
];

echo "<ul>";
foreach ($directivasNoModificables as $directiva) {
    $esModificable = ini_get_all()[$directiva]['access'] ?? 'Desconocido';
    echo "<li>$directiva: Acceso - $esModificable</li>";
}
echo "</ul>";

// Mostrar información completa de una directiva
echo "<h3>Información detallada de max_execution_time</h3>";
$info = ini_get_all()['max_execution_time'];
echo "<pre>";
print_r($info);
echo "</pre>";
?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/ini.list.php">Lista de Directivas en PHP</a>.</li>
<li><a href="https://www.php.net/manual/es/timezones.php">Lista de Zonas Horarias Soportadas</a>.</li>
</ul>
</body>
</html>
