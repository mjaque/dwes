<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Arrays en PHP</title>
</head>

<body>
<?php
echo "<h1>Manejo de Arrays en PHP</h1>";

// =============================================
// 1. CREACIÓN DE ARRAYS
// =============================================
echo "<h2>1. Creación de Arrays</h2>";

// Array indexado (forma tradicional)
$frutas = array("Manzana", "Banana", "Naranja");
echo "<h3>Array indexado (forma tradicional):</h3>";
print_r($frutas);

// Array indexado (forma corta PHP 5.4+)
$colores = ["Rojo", "Azul", "Verde"];
echo "<h3>Array indexado (forma corta):</h3>";
print_r($colores);

// Array asociativo
$estudiante = [
    "nombre" => "María García",
    "edad" => 22,
    "carrera" => "Medicina",
    "promedio" => 9.2
];
echo "<h3>Array asociativo:</h3>";
print_r($estudiante);

// Array multidimensional
$empleados = [
    ["nombre" => "Ana", "departamento" => "Ventas", "salario" => 3000],
    ["nombre" => "Carlos", "departamento" => "IT", "salario" => 4000],
    ["nombre" => "Luis", "departamento" => "Marketing", "salario" => 3500]
];
echo "<h3>Array multidimensional:</h3>";
print_r($empleados);

// =============================================
// 2. ACCESO A ELEMENTOS
// =============================================
echo "<h2>2. Acceso a Elementos</h2>";

$lenguajes = ["PHP", "JavaScript", "Python", "Java"];

echo "<h3>Acceso por índice:</h3>";
echo "Primer elemento: " . $lenguajes[0] . "<br>";
echo "Tercer elemento: " . $lenguajes[2] . "<br>";
echo "Último elemento: " . $lenguajes[count($lenguajes) - 1] . "<br>";

echo "<h3>Acceso en array asociativo:</h3>";
$config = [
    "host" => "localhost",
    "user" => "admin",
    "password" => "secret"
];
echo "Host: " . $config["host"] . "<br>";
echo "Usuario: " . $config["user"] . "<br>";

echo "<h3>Acceso en array multidimensional:</h3>";
echo "Primer empleado: " . $empleados[0]["nombre"] . " - " . $empleados[0]["departamento"] . "<br>";
echo "Segundo empleado: " . $empleados[1]["nombre"] . " - Salario: $" . $empleados[1]["salario"] . "<br>";

// =============================================
// 3. MODIFICACIÓN DE ARRAYS
// =============================================
echo "<h2>3. Modificación de Arrays</h2>";

$numeros = [1, 2, 3];
echo "<h3>Array original:</h3>";
print_r($numeros);

// Agregar elementos
$numeros[] = 4; // Al final
array_push($numeros, 5, 6); // Múltiples elementos al final
array_unshift($numeros, 0); // Al inicio

echo "<h3>Después de agregar elementos:</h3>";
print_r($numeros);

// Modificar elementos
$numeros[2] = 100;
$config["password"] = "newsecret";

echo "<h3>Después de modificar elementos:</h3>";
print_r($numeros);

// Eliminar elementos
unset($numeros[3]); // Eliminar por índice
$ultimo = array_pop($numeros); // Eliminar último
$primero = array_shift($numeros); // Eliminar primero

echo "<h3>Después de eliminar elementos:</h3>";
echo "Eliminado al final: $ultimo<br>";
echo "Eliminado al inicio: $primero<br>";
print_r($numeros);

// =============================================
// 4. FUNCIONES ÚTILES PARA ARRAYS
// =============================================
echo "<h2>4. Funciones Útiles para Arrays</h2>";

$datos = [10, 5, 8, 3, 15, 2];

echo "<h3>Función count():</h3>";
echo "Número de elementos: " . count($datos) . "<br>";

echo "<h3>Función sort() - Orden ascendente:</h3>";
sort($datos);
print_r($datos);

echo "<h3>Función rsort() - Orden descendente:</h3>";
rsort($datos);
print_r($datos);

echo "<h3>Función in_array() - Buscar elemento:</h3>";
$buscar = 8;
echo "¿Está el número $buscar en el array? " . (in_array($buscar, $datos) ? "Sí" : "No") . "<br>";

echo "<h3>Función array_search() - Buscar clave:</h3>";
$clave = array_search(8, $datos);
echo "El número 8 está en la posición: $clave<br>";

echo "<h3>Función array_reverse() - Invertir orden:</h3>";
$invertido = array_reverse($datos);
print_r($invertido);

// =============================================
// 5. ITERACIÓN SOBRE ARRAYS
// =============================================
echo "<h2>5. Iteración sobre Arrays</h2>";

$productos = [
    "Laptop" => 1200,
    "Mouse" => 25,
    "Teclado" => 80,
    "Monitor" => 300
];

echo "<h3>Con foreach (array asociativo):</h3>";
foreach ($productos as $producto => $precio) {
    echo "Producto: $producto - Precio: $$precio<br>";
}

echo "<h3>Con foreach (array indexado):</h3>";
foreach ($lenguajes as $indice => $lenguaje) {
    echo "Índice $indice: $lenguaje<br>";
}

echo "<h3>Con for (array indexado):</h3>";
for ($i = 0; $i < count($lenguajes); $i++) {
    echo "Elemento $i: " . $lenguajes[$i] . "<br>";
}

// =============================================
// 6. FUNCIONES DE TRANSFORMACIÓN
// =============================================
echo "<h2>6. Funciones de Transformación</h2>";

$numeros = [1, 2, 3, 4, 5];

echo "<h3>array_map() - Aplicar función a cada elemento:</h3>";
$cuadrados = array_map(function($n) {
    return $n * $n;
}, $numeros);
print_r($cuadrados);

echo "<h3>array_filter() - Filtrar elementos:</h3>";
$pares = array_filter($numeros, function($n) {
    return $n % 2 == 0;
});
print_r($pares);

echo "<h3>array_reduce() - Reducir a un valor:</h3>";
$suma = array_reduce($numeros, function($acumulado, $actual) {
    return $acumulado + $actual;
}, 0);
echo "Suma total: $suma<br>";

// =============================================
// 7. COMBINACIÓN Y DIVISIÓN
// =============================================
echo "<h2>7. Combinación y División</h2>";

$array1 = [1, 2, 3];
$array2 = [4, 5, 6];

echo "<h3>array_merge() - Combinar arrays:</h3>";
$combinado = array_merge($array1, $array2);
print_r($combinado);

echo "<h3>array_slice() - Extraer parte del array:</h3>";
$slice = array_slice($combinado, 2, 3); // Desde índice 2, 3 elementos
print_r($slice);

echo "<h3>array_chunk() - Dividir en partes:</h3>";
$chunks = array_chunk($combinado, 2);
print_r($chunks);

// =============================================
// 8. ARRAYS ASOCIATIVOS AVANZADOS
// =============================================
echo "<h2>8. Arrays Asociativos Avanzados</h2>";

echo "<h3>array_keys() - Obtener claves:</h3>";
$claves = array_keys($estudiante);
print_r($claves);

echo "<h3>array_values() - Obtener valores:</h3>";
$valores = array_values($estudiante);
print_r($valores);

echo "<h3>array_key_exists() - Verificar clave:</h3>";
echo "¿Existe 'edad'? " . (array_key_exists('edad', $estudiante) ? "Sí" : "No") . "<br>";
echo "¿Existe 'telefono'? " . (array_key_exists('telefono', $estudiante) ? "Sí" : "No") . "<br>";

// =============================================
// 9. OPERACIONES CON ARRAYS MULTIDIMENSIONALES
// =============================================
echo "<h2>9. Operaciones con Arrays Multidimensionales</h2>";

$ventas = [
    ["producto" => "Laptop", "cantidad" => 5, "precio" => 1200],
    ["producto" => "Mouse", "cantidad" => 20, "precio" => 25],
    ["producto" => "Teclado", "cantidad" => 15, "precio" => 80]
];

echo "<h3>Calcular total de ventas:</h3>";
$total_ventas = 0;
foreach ($ventas as $venta) {
    $subtotal = $venta["cantidad"] * $venta["precio"];
    $total_ventas += $subtotal;
    echo "{$venta['producto']}: {$venta['cantidad']} x \${$venta['precio']} = \$$subtotal<br>";
}
echo "<strong>Total de ventas: \$$total_ventas</strong><br>";

echo "<h3>Extraer columnas específicas:</h3>";
$productos = array_column($ventas, 'producto');
$cantidades = array_column($ventas, 'cantidad');
echo "Productos: " . implode(', ', $productos) . "<br>";
echo "Cantidades: " . implode(', ', $cantidades) . "<br>";

// =============================================
// 10. FUNCIONES DE BÚSQUEDA AVANZADA
// =============================================
echo "<h2>10. Funciones de Búsqueda Avanzada</h2>";

$inventario = [
    ["id" => 1, "nombre" => "Laptop", "stock" => 10],
    ["id" => 2, "nombre" => "Mouse", "stock" => 50],
    ["id" => 3, "nombre" => "Teclado", "stock" => 25]
];

echo "<h3>Buscar producto por ID:</h3>";
$id_buscar = 2;
$encontrado = null;

foreach ($inventario as $producto) {
    if ($producto["id"] == $id_buscar) {
        $encontrado = $producto;
        break;
    }
}

if ($encontrado) {
    echo "Producto encontrado: {$encontrado['nombre']} - Stock: {$encontrado['stock']}<br>";
} else {
    echo "Producto no encontrado<br>";
}

echo "<h3>Filtrar productos con stock bajo:</h3>";
$stock_bajo = array_filter($inventario, function($producto) {
    return $producto["stock"] < 30;
});

foreach ($stock_bajo as $producto) {
    echo "Alerta: {$producto['nombre']} tiene stock bajo ({$producto['stock']} unidades)<br>";
}

// =============================================
// 11. CONVERSIÓN Y SERIALIZACIÓN
// =============================================
echo "<h2>11. Conversión y Serialización</h2>";

echo "<h3>implode() - Array a string:</h3>";
$lista = implode(", ", $lenguajes);
echo "Lenguajes: $lista<br>";

echo "<h3>explode() - String a array:</h3>";
$texto = "PHP,JavaScript,Python,Java";
$array_lenguajes = explode(",", $texto);
print_r($array_lenguajes);

echo "<h3>serialize() y unserialize():</h3>";
$datos_serializados = serialize($estudiante);
echo "Serializado: " . $datos_serializados . "<br>";

$datos_originales = unserialize($datos_serializados);
echo "Deserializado:<br>";
print_r($datos_originales);

echo "<h3>json_encode() y json_decode():</h3>";
$json = json_encode($estudiante);
echo "JSON: " . $json . "<br>";

$array_desde_json = json_decode($json, true); // true para array asociativo
echo "Array desde JSON:<br>";
print_r($array_desde_json);

// =============================================
// 12. EJEMPLO PRÁCTICO COMPLETO
// =============================================
echo "<h2>12. Ejemplo Práctico Completo - Sistema de Estudiantes</h2>";

$estudiantes = [
    [
        "id" => 1,
        "nombre" => "Ana López",
        "notas" => [9, 8, 7, 10],
        "activo" => true
    ],
    [
        "id" => 2,
        "nombre" => "Carlos Ruiz",
        "notas" => [6, 7, 5, 8],
        "activo" => true
    ],
    [
        "id" => 3,
        "nombre" => "María Torres",
        "notas" => [10, 9, 10, 9],
        "activo" => false
    ]
];

// Calcular promedios y estadísticas
foreach ($estudiantes as &$estudiante) {
    $estudiante["promedio"] = array_sum($estudiante["notas"]) / count($estudiante["notas"]);
    $estudiante["estado"] = $estudiante["promedio"] >= 7 ? "Aprobado" : "Reprobado";
}

// Filtrar estudiantes activos
$estudiantes_activos = array_filter($estudiantes, function($est) {
    return $est["activo"];
});

// Ordenar por promedio (descendente)
usort($estudiantes_activos, function($a, $b) {
    return $b["promedio"] <=> $a["promedio"];
});

echo "<h3>Estudiantes Activos (ordenados por promedio):</h3>";
foreach ($estudiantes_activos as $est) {
    echo "{$est['nombre']} - Promedio: " . number_format($est['promedio'], 2) . 
         " - {$est['estado']}<br>";
}

// Estadísticas generales
$total_estudiantes = count($estudiantes);
$total_activos = count($estudiantes_activos);
$mejor_promedio = max(array_column($estudiantes, 'promedio'));
$promedio_general = array_sum(array_column($estudiantes, 'promedio')) / $total_estudiantes;

echo "<h3>Estadísticas:</h3>";
echo "Total estudiantes: $total_estudiantes<br>";
echo "Estudiantes activos: $total_activos<br>";
echo "Mejor promedio: " . number_format($mejor_promedio, 2) . "<br>";
echo "Promedio general: " . number_format($promedio_general, 2) . "<br>";

?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/language.types.array.php">Arrays en PHP</a>.</li>
</ul>
</body>
</html>
