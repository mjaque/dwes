<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Variables en PHP</title>
</head>

<body>
<?php
// =============================================
// SCRIPT PHP - DEMOSTRACIÓN DE TIPOS DE DATOS
// =============================================

echo "<h1>Demostración de Tipos de Datos en PHP</h1>";

// =============================================
// 1. TIPOS ESCALARES (SIMPLES)
// =============================================

echo "<h2>1. Tipos Escalares</h2>";

// Entero (Integer)
$edad = 25;
$temperatura = -10;
$poblacion = 8000000;

echo "<h3>Enteros (Integer)</h3>";
echo "Edad: $edad<br>";
echo "Temperatura: $temperatura °C<br>";
echo "Población: " . number_format($poblacion) . "<br>";
echo "Tipo de \$edad: " . gettype($edad) . "<br><br>";

// Flotante (Float/Double)
$precio = 19.99;
$pi = 3.14159265359;
$impuesto = 0.16;

echo "<h3>Flotantes (Float/Double)</h3>";
echo "Precio: $$precio<br>";
echo "PI: $pi<br>";
echo "Impuesto: " . ($impuesto * 100) . "%<br>";
echo "Tipo de \$precio: " . gettype($precio) . "<br><br>";

// Cadena (String)
$nombre = "Juan Pérez";
$email = "juan@email.com";
$mensaje = 'Hola mundo desde PHP';
$direccion = "Calle Principal #123";

echo "<h3>Cadenas (String)</h3>";
echo "Nombre: $nombre<br>";
echo "Email: $email<br>";
echo "Mensaje: $mensaje<br>";
echo "Dirección: $direccion<br>";
echo "Tipo de \$nombre: " . gettype($nombre) . "<br><br>";

// Booleano (Boolean)
$esMayorDeEdad = true;
$tieneLicencia = false;
$esEstudiante = true;

echo "<h3>Booleanos (Boolean)</h3>";
echo "Es mayor de edad: " . ($esMayorDeEdad ? 'Sí' : 'No') . "<br>";
echo "Tiene licencia: " . ($tieneLicencia ? 'Sí' : 'No') . "<br>";
echo "Es estudiante: " . ($esEstudiante ? 'Sí' : 'No') . "<br>";
echo "Tipo de \$esMayorDeEdad: " . gettype($esMayorDeEdad) . "<br><br>";

// =============================================
// 2. TIPOS COMPUESTOS
// =============================================

echo "<h2>2. Tipos Compuestos</h2>";

// Array (Indexado)
$frutas = array("Manzana", "Banana", "Naranja", "Uva");
$numeros = [1, 2, 3, 4, 5];

echo "<h3>Arrays Indexados</h3>";
echo "Frutas: " . implode(", ", $frutas) . "<br>";
echo "Números: " . implode(" - ", $numeros) . "<br>";
echo "Tipo de \$frutas: " . gettype($frutas) . "<br>";
print_r($frutas);
echo "<br><br>";

// Array Asociativo
$estudiante = [
    "nombre" => "María García",
    "edad" => 22,
    "carrera" => "Ingeniería",
    "promedio" => 8.5
];

echo "<h3>Arrays Asociativos</h3>";
echo "Nombre: " . $estudiante["nombre"] . "<br>";
echo "Edad: " . $estudiante["edad"] . "<br>";
echo "Carrera: " . $estudiante["carrera"] . "<br>";
echo "Promedio: " . $estudiante["promedio"] . "<br>";
print_r($estudiante);
echo "<br><br>";

// Array Multidimensional
$empleados = [
    ["nombre" => "Carlos", "departamento" => "Ventas", "salario" => 3000],
    ["nombre" => "Ana", "departamento" => "IT", "salario" => 4000],
    ["nombre" => "Luis", "departamento" => "RH", "salario" => 3500]
];

echo "<h3>Arrays Multidimensionales</h3>";
foreach ($empleados as $empleado) {
    echo "{$empleado['nombre']} - {$empleado['departamento']}: \${$empleado['salario']}<br>";
}
print_r($empleados);
echo "<br><br>";

// Objeto (StdClass)
$persona = new stdClass();
$persona->nombre = "Pedro López";
$persona->edad = 30;
$persona->profesion = "Desarrollador";

echo "<h3>Objetos (StdClass)</h3>";
echo "Nombre: " . $persona->nombre . "<br>";
echo "Edad: " . $persona->edad . "<br>";
echo "Profesión: " . $persona->profesion . "<br>";
echo "Tipo de \$persona: " . gettype($persona) . "<br><br>";

// =============================================
// 3. TIPOS ESPECIALES
// =============================================

echo "<h2>3. Tipos Especiales</h2>";

// NULL
$variableNula = null;
$variableNoDefinida;

echo "<h3>NULL</h3>";
echo "Variable nula: ";
var_dump($variableNula);
echo "<br>";
echo "Variable no definida: ";
@var_dump($variableNoDefinida); // @ suprime el warning
echo "<br>Tipo de \$variableNula: " . gettype($variableNula) . "<br><br>";

// Resource (recurso)
$archivo = fopen("ejemplo.txt", "w"); // Abrir archivo para escritura

echo "<h3>Resource (Recurso)</h3>";
echo "Tipo de \$archivo: " . gettype($archivo) . "<br>";
if (is_resource($archivo)) {
    echo "Es un recurso válido<br>";
    fwrite($archivo, "Este es un ejemplo de recurso en PHP\n");
    fclose($archivo); // Cerrar el recurso
    echo "Archivo creado y recurso cerrado<br>";
}
echo "<br>";

// =============================================
// 4. FUNCIONES ÚTILES PARA TIPOS DE DATOS
// =============================================

echo "<h2>4. Funciones para Trabajar con Tipos</h2>";

// gettype() - Obtener el tipo de variable
echo "<h3>gettype()</h3>";
echo "Tipo de \$edad: " . gettype($edad) . "<br>";
echo "Tipo de \$nombre: " . gettype($nombre) . "<br>";
echo "Tipo de \$esMayorDeEdad: " . gettype($esMayorDeEdad) . "<br><br>";

// is_* functions - Verificar tipos
echo "<h3>Funciones is_*</h3>";
echo "¿\$edad es int? " . (is_int($edad) ? 'Sí' : 'No') . "<br>";
echo "¿\$nombre es string? " . (is_string($nombre) ? 'Sí' : 'No') . "<br>";
echo "¿\$precio es float? " . (is_float($precio) ? 'Sí' : 'No') . "<br>";
echo "¿\$frutas es array? " . (is_array($frutas) ? 'Sí' : 'No') . "<br>";
echo "¿\$persona es object? " . (is_object($persona) ? 'Sí' : 'No') . "<br>";
echo "¿\$variableNula es null? " . (is_null($variableNula) ? 'Sí' : 'No') . "<br><br>";

// var_dump() - Mostrar tipo y valor
echo "<h3>var_dump()</h3>";
echo "var_dump(\$edad): ";
var_dump($edad);
echo "<br>var_dump(\$nombre): ";
var_dump($nombre);
echo "<br>var_dump(\$frutas): ";
var_dump($frutas);
echo "<br><br>";

// =============================================
// 5. CONVERSIÓN DE TIPOS
// =============================================

echo "<h2>5. Conversión de Tipos</h2>";

// Conversión implícita
$numeroString = "100";
$suma = $numeroString + 50; // PHP convierte automáticamente

echo "<h3>Conversión Implícita</h3>";
echo "\"100\" + 50 = " . $suma . "<br>";
echo "Tipo resultado: " . gettype($suma) . "<br><br>";

// Conversión explícita (casting)
$precioString = "19.99";
$precioFloat = (float)$precioString;
$edadFloat = (float)$edad;
$booleanoDesdeString = (bool)"Hola";

echo "<h3>Conversión Explícita (Casting)</h3>";
echo "(float)\"19.99\" = ";
var_dump($precioFloat);
echo "<br>(float)\$edad = ";
var_dump($edadFloat);
echo "<br>(bool)\"Hola\" = ";
var_dump($booleanoDesdeString);
echo "<br><br>";

// =============================================
// RESUMEN FINAL
// =============================================

echo "<h2>Resumen de Tipos de Datos</h2>";
echo "<ul>";
echo "<li><strong>Escalares:</strong> int, float, string, bool</li>";
echo "<li><strong>Compuestos:</strong> array, object</li>";
echo "<li><strong>Especiales:</strong> null, resource</li>";
echo "</ul>";

echo "<p><strong>Nota:</strong> PHP es un lenguaje de tipado dinámico, lo que significa que las variables pueden cambiar de tipo durante la ejecución.</p>";

?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/language.types.php">Tipos de Datos en PHP</a>.</li>
<li><a href="https://www.php.net/manual/es/language.variables.variable.php">Variables en PHP</a>.</li>
</ul>
</body>
</html>
