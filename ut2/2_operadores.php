<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Operadores en PHP</title>
</head>

<body>
<?php
// =============================================
// DEMOSTRACIÓN COMPLETA DE OPERADORES EN PHP
// =============================================

echo "<h1>Operadores en PHP - Demostración Completa</h1>";

// =============================================
// 1. OPERADORES ARITMÉTICOS
// =============================================

echo "<h2>1. Operadores Aritméticos</h2>";

$a = 15;
$b = 4;

echo "<table border='1' cellpadding='8' cellspacing='0' style='width: 100%'>";
echo "<tr><th>Operador</th><th>Ejemplo</th><th>Resultado</th><th>Descripción</th></tr>";

// Suma
echo "<tr><td>+</td><td>\$a + \$b</td><td>" . ($a + $b) . "</td><td>Suma</td></tr>";

// Resta
echo "<tr><td>-</td><td>\$a - \$b</td><td>" . ($a - $b) . "</td><td>Resta</td></tr>";

// Multiplicación
echo "<tr><td>*</td><td>\$a * \$b</td><td>" . ($a * $b) . "</td><td>Multiplicación</td></tr>";

// División
echo "<tr><td>/</td><td>\$a / \$b</td><td>" . ($a / $b) . "</td><td>División</td></tr>";

// Módulo
echo "<tr><td>%</td><td>\$a % \$b</td><td>" . ($a % $b) . "</td><td>Módulo (residuo)</td></tr>";

// Potencia
echo "<tr><td>**</td><td>\$a ** \$b</td><td>" . ($a ** $b) . "</td><td>Potencia (PHP 5.6+)</td></tr>";

echo "</table>";

// =============================================
// 2. OPERADORES DE ASIGNACIÓN
// =============================================

echo "<h2>2. Operadores de Asignación</h2>";

$x = 10;
echo "<p>Valor inicial de \$x: $x</p>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Ejemplo</th><th>Equivale a</th><th>Resultado</th></tr>";

$x = 10; $resultado = $x; echo "<tr><td>=</td><td>\$x = 10</td><td></td><td>\$x = $resultado</td></tr>";
$x = 10; $x += 5; echo "<tr><td>+=</td><td>\$x += 5</td><td>\$x = \$x + 5</td><td>\$x = $x</td></tr>";
$x = 10; $x -= 3; echo "<tr><td>-=</td><td>\$x -= 3</td><td>\$x = \$x - 3</td><td>\$x = $x</td></tr>";
$x = 10; $x *= 2; echo "<tr><td>*=</td><td>\$x *= 2</td><td>\$x = \$x * 2</td><td>\$x = $x</td></tr>";
$x = 10; $x /= 2; echo "<tr><td>/=</td><td>\$x /= 2</td><td>\$x = \$x / 2</td><td>\$x = $x</td></tr>";
$x = 10; $x %= 3; echo "<tr><td>%=</td><td>\$x %= 3</td><td>\$x = \$x % 3</td><td>\$x = $x</td></tr>";
$x = 10; $x **= 2; echo "<tr><td>**=</td><td>\$x **= 2</td><td>\$x = \$x ** 2</td><td>\$x = $x</td></tr>";
$x = "Hola"; $x .= " Mundo"; echo "<tr><td>.=</td><td>\$x .= ' Mundo'</td><td>\$x = \$x . ' Mundo'</td><td>\$x = $x</td></tr>";

echo "</table>";

// =============================================
// 3. OPERADORES DE COMPARACIÓN
// =============================================

echo "<h2>3. Operadores de Comparación</h2>";

$num1 = 10;
$num2 = "10";
$num3 = 15;

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Nombre</th><th>Ejemplo</th><th>Resultado</th><th>Explicación</th></tr>";

echo "<tr><td>==</td><td>Igual</td><td>\$num1 == \$num2</td><td>" . ($num1 == $num2 ? 'true' : 'false') . "</td><td>Igual en valor</td></tr>";
echo "<tr><td>===</td><td>Idéntico</td><td>\$num1 === \$num2</td><td>" . ($num1 === $num2 ? 'true' : 'false') . "</td><td>Igual en valor y tipo</td></tr>";
echo "<tr><td>!=</td><td>Diferente</td><td>\$num1 != \$num3</td><td>" . ($num1 != $num3 ? 'true' : 'false') . "</td><td>Diferente en valor</td></tr>";
echo "<tr><td><></td><td>Diferente</td><td>\$num1 <> \$num3</td><td>" . ($num1 <> $num3 ? 'true' : 'false') . "</td><td>Diferente en valor (alternativo)</td></tr>";
echo "<tr><td>!==</td><td>No idéntico</td><td>\$num1 !== \$num2</td><td>" . ($num1 !== $num2 ? 'true' : 'false') . "</td><td>Diferente en valor o tipo</td></tr>";
echo "<tr><td><</td><td>Menor que</td><td>\$num1 < \$num3</td><td>" . ($num1 < $num3 ? 'true' : 'false') . "</td><td>Menor que</td></tr>";
echo "<tr><td>></td><td>Mayor que</td><td>\$num1 > \$num3</td><td>" . ($num1 > $num3 ? 'true' : 'false') . "</td><td>Mayor que</td></tr>";
echo "<tr><td><=</td><td>Menor o igual</td><td>\$num1 <= \$num3</td><td>" . ($num1 <= $num3 ? 'true' : 'false') . "</td><td>Menor o igual que</td></tr>";
echo "<tr><td>>=</td><td>Mayor o igual</td><td>\$num3 >= \$num1</td><td>" . ($num3 >= $num1 ? 'true' : 'false') . "</td><td>Mayor o igual que</td></tr>";
echo "<tr><td><=></td><td>Spaceship</td><td>\$num1 <=> \$num3</td><td>" . ($num1 <=> $num3) . "</td><td>-1: menor, 0: igual, 1: mayor (PHP 7+)</td></tr>";

echo "</table>";

// =============================================
// 4. OPERADORES LÓGICOS
// =============================================

echo "<h2>4. Operadores Lógicos</h2>";

$verdadero = true;
$falso = false;

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Nombre</th><th>Ejemplo</th><th>Resultado</th><th>Descripción</th></tr>";

echo "<tr><td>and</td><td>AND</td><td>\$verdadero and \$falso</td><td>" . ($verdadero and $falso ? 'true' : 'false') . "</td><td>Y lógico (baja precedencia)</td></tr>";
echo "<tr><td>&&</td><td>AND</td><td>\$verdadero && \$falso</td><td>" . ($verdadero && $falso ? 'true' : 'false') . "</td><td>Y lógico (alta precedencia)</td></tr>";
echo "<tr><td>or</td><td>OR</td><td>\$verdadero or \$falso</td><td>" . ($verdadero or $falso ? 'true' : 'false') . "</td><td>O lógico (baja precedencia)</td></tr>";
echo "<tr><td>||</td><td>OR</td><td>\$verdadero || \$falso</td><td>" . ($verdadero || $falso ? 'true' : 'false') . "</td><td>O lógico (alta precedencia)</td></tr>";
echo "<tr><td>xor</td><td>XOR</td><td>\$verdadero xor \$falso</td><td>" . ($verdadero xor $falso ? 'true' : 'false') . "</td><td>O exclusivo (solo uno verdadero)</td></tr>";
echo "<tr><td>!</td><td>NOT</td><td>!\$verdadero</td><td>" . (!$verdadero ? 'true' : 'false') . "</td><td>NO lógico (negación)</td></tr>";

echo "</table>";

// Ejemplo práctico de operadores lógicos
$edad = 25;
$tieneLicencia = true;
$esEstudiante = false;

echo "<h3>Ejemplo Práctico:</h3>";
echo "Edad: $edad, Tiene licencia: " . ($tieneLicencia ? 'Sí' : 'No') . ", Es estudiante: " . ($esEstudiante ? 'Sí' : 'No') . "<br>";

if ($edad >= 18 && $tieneLicencia) {
    echo "✅ Puede conducir<br>";
} else {
    echo "❌ No puede conducir<br>";
}

if ($edad < 26 || $esEstudiante) {
    echo "✅ Puede obtener descuento estudiantil<br>";
}

// =============================================
// 5. OPERADORES DE INCREMENTO/DECREMENTO
// =============================================

echo "<h2>5. Operadores de Incremento/Decremento</h2>";

$contador = 5;
echo "<p>Valor inicial de \$contador: $contador</p>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Nombre</th><th>Ejemplo</th><th>Resultado</th><th>Explicación</th></tr>";

$contador = 5; $pre = ++$contador; echo "<tr><td>++\$var</td><td>Pre-incremento</td><td>++\$contador</td><td>\$contador = $contador</td><td>Incrementa, luego devuelve</td></tr>";
$contador = 5; $post = $contador++; echo "<tr><td>\$var++</td><td>Post-incremento</td><td>\$contador++</td><td>\$contador = $contador</td><td>Devuelve, luego incrementa</td></tr>";
$contador = 5; $pre = --$contador; echo "<tr><td>--\$var</td><td>Pre-decremento</td><td>--\$contador</td><td>\$contador = $contador</td><td>Decrementa, luego devuelve</td></tr>";
$contador = 5; $post = $contador--; echo "<tr><td>\$var--</td><td>Post-decremento</td><td>\$contador--</td><td>\$contador = $contador</td><td>Devuelve, luego decrementa</td></tr>";

echo "</table>";

// =============================================
// 6. OPERADORES DE CADENA
// =============================================

echo "<h2>6. Operadores de Cadena</h2>";

$cadena1 = "Hola";
$cadena2 = "Mundo";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Ejemplo</th><th>Resultado</th><th>Descripción</th></tr>";

echo "<tr><td>.</td><td>\$cadena1 . ' ' . \$cadena2</td><td>" . ($cadena1 . ' ' . $cadena2) . "</td><td>Concatenación</td></tr>";
echo "<tr><td>.=</td><td>\$cadena1 .= \$cadena2</td><td>" . ($cadena1 . $cadena2) . "</td><td>Concatenación y asignación</td></tr>";

echo "</table>";

// =============================================
// 7. OPERADORES DE ARRAY
// =============================================

echo "<h2>7. Operadores de Array</h2>";

$array1 = ['a' => 1, 'b' => 2];
$array2 = ['b' => 3, 'c' => 4];
$array3 = [1, 2, 3];

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Nombre</th><th>Ejemplo</th><th>Resultado</th><th>Descripción</th></tr>";

$union = $array1 + $array2; echo "<tr><td>+</td><td>Unión</td><td>\$array1 + \$array2</td><td>"; print_r($union); echo "</td><td>Une arrays (claves únicas)</td></tr>";
$igual = $array1 == $array2; echo "<tr><td>==</td><td>Igualdad</td><td>\$array1 == \$array2</td><td>" . ($igual ? 'true' : 'false') . "</td><td>Mismos pares clave/valor</td></tr>";
$identico = $array1 === $array2; echo "<tr><td>===</td><td>Identidad</td><td>\$array1 === \$array2</td><td>" . ($identico ? 'true' : 'false') . "</td><td>Mismos pares clave/valor y mismo orden</td></tr>";
$diferente = $array1 != $array2; echo "<tr><td>!=</td><td>Desigualdad</td><td>\$array1 != \$array2</td><td>" . ($diferente ? 'true' : 'false') . "</td><td>No mismos pares clave/valor</td></tr>";

echo "</table>";

// =============================================
// 8. OPERADORES DE TIPO
// =============================================

echo "<h2>8. Operadores de Tipo</h2>";

$variable1 = "Hola Mundo";
$variable2 = 42;
$variable3 = new stdClass();

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Operador</th><th>Ejemplo</th><th>Resultado</th><th>Descripción</th></tr>";

echo "<tr><td>instanceof</td><td>\$variable3 instanceof stdClass</td><td>" . ($variable3 instanceof stdClass ? 'true' : 'false') . "</td><td>Verifica si es instancia de clase</td></tr>";

echo "</table>";

// Operador ternario (PHP 7+)
echo "<h3>Operador Ternario y Null Coalescing (PHP 7+)</h3>";

$usuario = "Juan";
$nombre = $usuario ?: "Invitado"; // Ternario abreviado
echo "Nombre: $nombre<br>";

$valorNulo = null;
$resultado = $valorNulo ?? "Valor por defecto"; // Null coalescing
echo "Valor coalescing: $resultado<br>";

// =============================================
// 9. OPERADORES DE EJECUCIÓN
// =============================================

echo "<h2>9. Operadores de Ejecución</h2>";

// Nota: El operador de ejecución (backticks) está desaconsejado
$output = `dir`; // En Windows
// $output = `ls`; // En Linux/Mac

echo "<p>Salida del comando del sistema (primeras 100 chars): " . substr($output, 0, 100) . "...</p>";

// =============================================
// 10. PRECEDENCIA DE OPERADORES
// =============================================

echo "<h2>10. Precedencia de Operadores</h2>";

echo "<p><strong>Ejemplo de precedencia:</strong></p>";

$resultado1 = 2 + 3 * 4; // 3*4=12, luego 2+12=14
$resultado2 = (2 + 3) * 4; // 2+3=5, luego 5*4=20

echo "2 + 3 * 4 = $resultado1 (la multiplicación tiene mayor precedencia)<br>";
echo "(2 + 3) * 4 = $resultado2 (los paréntesis cambian la precedencia)<br>";

// =============================================
// 11. EJEMPLOS PRÁCTICOS COMBINADOS
// =============================================

echo "<h2>11. Ejemplos Prácticos Combinados</h2>";

// Ejemplo 1: Calculadora simple
echo "<h3>Ejemplo 1: Calculadora</h3>";
$numero1 = 20;
$numero2 = 5;
$operacion = "+";

switch($operacion) {
    case "+":
        $resultado = $numero1 + $numero2;
        break;
    case "-":
        $resultado = $numero1 - $numero2;
        break;
    case "*":
        $resultado = $numero1 * $numero2;
        break;
    case "/":
        $resultado = $numero1 / $numero2;
        break;
    default:
        $resultado = "Operación no válida";
}

echo "$numero1 $operacion $numero2 = $resultado<br>";

// Ejemplo 2: Validación de formulario
echo "<h3>Ejemplo 2: Validación de Formulario</h3>";
$nombre = "Ana";
$edad = 25;
$email = "ana@email.com";

// Validación con operadores lógicos y de comparación
if (!empty($nombre) && $edad >= 18 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "✅ Formulario válido: $nombre ($edad años) - $email<br>";
} else {
    echo "❌ Formulario inválido<br>";
}

// Ejemplo 3: Manipulación de arrays
echo "<h3>Ejemplo 3: Manipulación de Arrays</h3>";
$productos1 = ['laptop' => 1000, 'mouse' => 50];
$productos2 = ['teclado' => 80, 'mouse' => 60];

$catalogo = $productos1 + $productos2; // Unión de arrays
echo "Catálogo combinado: ";
print_r($catalogo);
echo "<br>";

// =============================================
// RESUMEN FINAL
// =============================================

echo "<h2>Resumen de Operadores en PHP</h2>";

$categorias = [
    "Aritméticos" => "+ - * / % **",
    "Asignación" => "= += -= *= /= %= .= **=",
    "Comparación" => "== === != <> !== < > <= >= <=>",
    "Lógicos" => "&& || and or xor !",
    "Incremento/Decremento" => "++ --",
    "Cadena" => ". .=",
    "Array" => "+ == === != <>",
    "Tipo" => "instanceof",
    "Ternario" => "?: ??",
    "Ejecución" => "`` (backticks)"
];

echo "<table border='1' cellpadding='8' cellspacing='0' style='width: 100%'>";
echo "<tr><th>Categoría</th><th>Operadores</th><th>Uso Principal</th></tr>";

foreach($categorias as $categoria => $operadores) {
    $uso = match($categoria) {
        "Aritméticos" => "Cálculos matemáticos",
        "Asignación" => "Asignar valores a variables",
        "Comparación" => "Comparar valores",
        "Lógicos" => "Combinar condiciones booleanas",
        "Incremento/Decremento" => "Modificar valores numéricos",
        "Cadena" => "Manipular texto",
        "Array" => "Trabajar con arrays",
        "Tipo" => "Verificar tipos de datos",
        "Ternario" => "Condiciones abreviadas",
        "Ejecución" => "Ejecutar comandos del sistema",
        default => "Varios usos"
    };
    
    echo "<tr><td>$categoria</td><td><code>$operadores</code></td><td>$uso</td></tr>";
}

echo "</table>";

echo "<p><strong>Consejo:</strong> Usa paréntesis para clarificar la precedencia cuando las expresiones sean complejas.</p>";

?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/language.operators.php">Operadores en PHP</a>.</li>
</ul>
</body>
</html>
