<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Estructuras de Repetición en PHP</title>
</head>

<body>
<?php
echo "<h1>Estructuras de Repetición en PHP</h1>";

// =============================================
// 1. ESTRUCTURA FOR
// =============================================
echo "<h2>1. Estructura FOR</h2>";

echo "<h3>For básico (del 1 al 5):</h3>";
for ($i = 1; $i <= 5; $i++) {
    echo "Iteración: $i<br>";
}

echo "<h3>For descendente (del 5 al 1):</h3>";
for ($i = 5; $i >= 1; $i--) {
    echo "Cuenta regresiva: $i<br>";
}

echo "<h3>For con incremento personalizado:</h3>";
for ($i = 0; $i <= 10; $i += 2) {
    echo "Número par: $i<br>";
}

echo "<h3>For para generar tabla de multiplicar:</h3>";
$numero = 7;
for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado<br>";
}

// =============================================
// 2. ESTRUCTURA WHILE
// =============================================
echo "<h2>2. Estructura WHILE</h2>";

echo "<h3>While básico:</h3>";
$contador = 1;
while ($contador <= 5) {
    echo "Contador: $contador<br>";
    $contador++;
}

echo "<h3>While con condición compleja:</h3>";
$numero = 1;
$suma = 0;
while ($suma < 50) {
    $suma += $numero;
    echo "Número: $numero, Suma acumulada: $suma<br>";
    $numero++;
}

echo "<h3>While para adivinar número:</h3>";
$numero_secreto = 42;
$intento = 30;
$intentos = 0;

while ($intento != $numero_secreto) {
    $intentos++;
    if ($intento < $numero_secreto) {
        echo "Intento $intentos: $intento - Muy bajo<br>";
        $intento += 5;
    } else {
        echo "Intento $intentos: $intento - Muy alto<br>";
        $intento -= 3;
    }
    
    // Prevenir bucle infinito
    if ($intentos > 20) {
        echo "Demasiados intentos. Abortando.<br>";
        break;
    }
}
echo "¡Adivinado! El número era $numero_secreto<br>";

// =============================================
// 3. ESTRUCTURA DO-WHILE
// =============================================
echo "<h2>3. Estructura DO-WHILE</h2>";

echo "<h3>Do-while (se ejecuta al menos una vez):</h3>";
$contador = 10;
do {
    echo "Contador: $contador (esto se ejecuta aunque la condición sea falsa)<br>";
    $contador++;
} while ($contador <= 5);

echo "<h3>Do-while para menú interactivo simulado:</h3>";
$opcion = 0;
$intentos_menu = 0;

do {
    $intentos_menu++;
    echo "Intento de menú #$intentos_menu<br>";
    
    // Simular selección de usuario
    $opcion = rand(1, 4); // Número aleatorio entre 1-4
    
    switch ($opcion) {
        case 1:
            echo "Opción seleccionada: 1 - Ver perfil<br>";
            break;
        case 2:
            echo "Opción seleccionada: 2 - Configuración<br>";
            break;
        case 3:
            echo "Opción seleccionada: 3 - Ayuda<br>";
            break;
        case 4:
            echo "Opción seleccionada: 4 - Salir<br>";
            break;
    }
    
} while ($opcion != 4 && $intentos_menu < 5);

// =============================================
// 4. ESTRUCTURA FOREACH (para arrays)
// =============================================
echo "<h2>4. Estructura FOREACH</h2>";

echo "<h3>Foreach con array indexado:</h3>";
$frutas = ["Manzana", "Banana", "Naranja", "Uva", "Fresa"];

foreach ($frutas as $fruta) {
    echo "Fruta: $fruta<br>";
}

echo "<h3>Foreach con array asociativo:</h3>";
$estudiante = [
    "nombre" => "Juan Pérez",
    "edad" => 20,
    "carrera" => "Ingeniería",
    "promedio" => 8.5
];

foreach ($estudiante as $clave => $valor) {
    echo ucfirst($clave) . ": $valor<br>";
}

echo "<h3>Foreach con array multidimensional:</h3>";
$empleados = [
    ["nombre" => "Ana", "departamento" => "Ventas", "salario" => 3000],
    ["nombre" => "Carlos", "departamento" => "IT", "salario" => 4000],
    ["nombre" => "María", "departamento" => "RH", "salario" => 3500]
];

foreach ($empleados as $indice => $empleado) {
    echo "Empleado #" . ($indice + 1) . ":<br>";
    foreach ($empleado as $clave => $valor) {
        echo " - " . ucfirst($clave) . ": $valor<br>";
    }
    echo "<br>";
}

// =============================================
// 5. CONTROL DE BUCLES: BREAK Y CONTINUE
// =============================================
echo "<h2>5. Control de Bucles: BREAK y CONTINUE</h2>";

echo "<h3>Break para salir del bucle:</h3>";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 6) {
        echo "Llegamos a 6, saliendo del bucle...<br>";
        break;
    }
    echo "Número: $i<br>";
}

echo "<h3>Continue para saltar iteración:</h3>";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue; // Saltar números pares
    }
    echo "Número impar: $i<br>";
}

echo "<h3>Break con etiquetas (números primos):</h3>";
$limite = 30;
echo "Números primos hasta $limite: ";

for ($numero = 2; $numero <= $limite; $numero++) {
    $es_primo = true;
    
    for ($divisor = 2; $divisor <= sqrt($numero); $divisor++) {
        if ($numero % $divisor == 0) {
            $es_primo = false;
            break; // Sale del bucle interno
        }
    }
    
    if ($es_primo) {
        echo "$numero ";
    }
}
echo "<br>";

// =============================================
// 6. BUCLES ANIDADOS
// =============================================
echo "<h2>6. Bucles Anidados</h2>";

echo "<h3>Tabla de multiplicar completa:</h3>";
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><th>×</th>";

// Encabezados de columnas
for ($i = 1; $i <= 10; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";

// Filas de la tabla
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th>$i</th>"; // Encabezado de fila
    
    for ($j = 1; $j <= 10; $j++) {
        echo "<td align='center'>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// =============================================
// 7. EJEMPLOS PRÁCTICOS
// =============================================
echo "<h2>7. Ejemplos Prácticos</h2>";

echo "<h3>Procesamiento de datos de estudiantes:</h3>";
$estudiantes = [
    ["nombre" => "Laura", "notas" => [8, 7, 9, 6]],
    ["nombre" => "Pedro", "notas" => [5, 6, 7, 8]],
    ["nombre" => "Sofia", "notas" => [9, 9, 8, 10]]
];

foreach ($estudiantes as $estudiante) {
    $suma_notas = 0;
    $cantidad_notas = count($estudiante['notas']);
    
    // Calcular promedio
    foreach ($estudiante['notas'] as $nota) {
        $suma_notas += $nota;
    }
    
    $promedio = $suma_notas / $cantidad_notas;
    $estado = ($promedio >= 7) ? "Aprobado" : "Reprobado";
    
    echo "Estudiante: {$estudiante['nombre']} - Promedio: " . number_format($promedio, 2) . " - $estado<br>";
}

echo "<h3>Búsqueda en array:</h3>";
$productos = ["Laptop", "Mouse", "Teclado", "Monitor", "Tablet"];
$busqueda = "Teclado";
$encontrado = false;

foreach ($productos as $indice => $producto) {
    if ($producto === $busqueda) {
        echo "¡Producto encontrado! '$busqueda' está en la posición $indice<br>";
        $encontrado = true;
        break;
    }
}

if (!$encontrado) {
    echo "Producto '$busqueda' no encontrado<br>";
}

// =============================================
// 8. COMPARACIÓN ENTRE ESTRUCTURAS
// =============================================
echo "<h2>8. Comparación entre Estructuras</h2>";

echo "<ul>
<li><strong>FOR</strong>: Cuando sabes exactamente cuántas iteraciones necesitas</li>
<li><strong>WHILE</strong>: Cuando no sabes cuántas iteraciones necesitas, pero conoces la condición de parada</li>
<li><strong>DO-WHILE</strong>: Cuando necesitas que el código se ejecute al menos una vez</li>
<li><strong>FOREACH</strong>: Específico para recorrer arrays y objetos</li>
</ul>";

echo "<h3>Mismo resultado con diferentes estructuras:</h3>";

echo "Con FOR: ";
for ($i = 0; $i < 3; $i++) {
    echo "$i ";
}

echo "<br>Con WHILE: ";
$i = 0;
while ($i < 3) {
    echo "$i ";
    $i++;
}

echo "<br>Con DO-WHILE: ";
$i = 0;
do {
    echo "$i ";
    $i++;
} while ($i < 3);

// =============================================
// 9. RENDIMIENTO Y BUENAS PRÁCTICAS
// =============================================
echo "<h2>9. Rendimiento y Buenas Prácticas</h2>";

echo "<h3>Pre-calcular límites en bucles:</h3>";
$array_grande = range(1, 1000);

// Menos eficiente
echo "Menos eficiente: el count() se ejecuta en cada iteración<br>";

// Más eficiente
$tamaño = count($array_grande);
echo "Más eficiente: el count() se calcula una vez fuera del bucle<br>";

echo "<h3>Evitar operaciones costosas dentro de bucles:</h3>";
echo "Mover cálculos complejos fuera del bucle cuando sea posible<br>";

?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/language.types.php">Tipos de Datos en PHP</a>.</li>
<li><a href="https://www.php.net/manual/es/language.variables.variable.php">Variables en PHP</a>.</li>
</ul>
</body>
</html>
