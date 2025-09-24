<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Funciones en PHP</title>
</head>

<body>
<?php
// =============================================
// DEMOSTRACIÓN COMPLETA DE FUNCIONES EN PHP
// =============================================

echo "<h1>Funciones en PHP - Demostración Completa</h1>";

// =============================================
// 1. FUNCIONES BÁSICAS SIN PARÁMETROS
// =============================================

echo "<h2>1. Funciones Básicas sin Parámetros</h2>";

// Función simple sin parámetros
function saludar() {
    return "¡Hola Mundo!";
}

// Función que muestra información del sistema
function mostrarInfoServidor() {
    return [
        'PHP Version' => PHP_VERSION,
        'Sistema Operativo' => PHP_OS,
        'Memoria Límite' => ini_get('memory_limit')
    ];
}

echo "<p><strong>Función saludar():</strong> " . saludar() . "</p>";

echo "<p><strong>Función mostrarInfoServidor():</strong></p>";
$info = mostrarInfoServidor();
echo "<ul>";
foreach ($info as $clave => $valor) {
    echo "<li><strong>$clave:</strong> $valor</li>";
}
echo "</ul>";

// =============================================
// 2. FUNCIONES CON PARÁMETROS POR VALOR
// =============================================

echo "<h2>2. Funciones con Parámetros por Valor (Valor por Defecto)</h2>";

// Función con parámetros por valor
function sumar($a, $b) {
    return $a + $b;
}

// Función con parámetros opcionales (valores por defecto)
function crearEmail($usuario, $dominio = "company.com") {
    return strtolower($usuario) . "@" . $dominio;
}

// Función con múltiples parámetros y valores por defecto
function calcularDescuento($precio, $descuento = 10, $iva = 0.16) {
    $precioConDescuento = $precio * (1 - $descuento/100);
    return $precioConDescuento * (1 + $iva);
}

echo "<h3>Ejemplos de Parámetros por Valor:</h3>";
echo "<p><strong>sumar(5, 3):</strong> " . sumar(5, 3) . "</p>";
echo "<p><strong>crearEmail('Juan'):</strong> " . crearEmail('Juan') . "</p>";
echo "<p><strong>crearEmail('Maria', 'gmail.com'):</strong> " . crearEmail('Maria', 'gmail.com') . "</p>";
echo "<p><strong>calcularDescuento(100):</strong> $" . number_format(calcularDescuento(100), 2) . "</p>";
echo "<p><strong>calcularDescuento(100, 20, 0.10):</strong> $" . number_format(calcularDescuento(100, 20, 0.10), 2) . "</p>";

// =============================================
// 3. FUNCIONES CON PARÁMETROS POR REFERENCIA
// =============================================

echo "<h2>3. Funciones con Parámetros por Referencia</h2>";

// Función que modifica variable por referencia
function incrementar(&$numero, $cantidad = 1) {
    $numero += $cantidad;
    return $numero;
}

// Función que modifica un array por referencia
function agregarElemento(&$array, $elemento) {
    $array[] = $elemento;
    return count($array);
}

// Función que intercambia valores por referencia
function intercambiar(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
    return "Intercambiado: a=$a, b=$b";
}

// Función que resetea variable por referencia
function resetearContador(&$contador) {
    $contador = 0;
    return "Contador reseteado a 0";
}

echo "<h3>Demostración de Paso por Referencia:</h3>";

// Ejemplo 1: Incrementar variable
$contador = 5;
echo "<p><strong>Antes de incrementar:</strong> \$contador = $contador</p>";
incrementar($contador, 3);
echo "<p><strong>Después de incrementar(&\$contador, 3):</strong> \$contador = $contador</p>";

// Ejemplo 2: Modificar array
$frutas = ['manzana', 'banana'];
echo "<p><strong>Array original:</strong> " . implode(', ', $frutas) . "</p>";
agregarElemento($frutas, 'naranja');
echo "<p><strong>Después de agregarElemento(&\$frutas, 'naranja'):</strong> " . implode(', ', $frutas) . "</p>";

// Ejemplo 3: Intercambiar valores
$x = 10;
$y = 20;
echo "<p><strong>Antes de intercambiar:</strong> x=$x, y=$y</p>";
intercambiar($x, $y);
echo "<p><strong>Después de intercambiar(&\$x, &\$y):</strong> x=$x, y=$y</p>";

// =============================================
// 4. COMPARACIÓN: POR VALOR vs POR REFERENCIA
// =============================================

echo "<h2>4. Comparación: Paso por Valor vs Paso por Referencia</h2>";

function duplicarValor($numero) {
    $numero *= 2;
    return $numero;
}

function duplicarReferencia(&$numero) {
    $numero *= 2;
    return $numero;
}

echo "<h3>Comparación Práctica:</h3>";

$valorOriginal = 5;

// Por valor
$resultadoValor = duplicarValor($valorOriginal);
echo "<p><strong>Paso por Valor:</strong></p>";
echo "<ul>";
echo "<li>Valor original: $valorOriginal</li>";
echo "<li>Resultado de función: $resultadoValor</li>";
echo "<li>Valor original después: $valorOriginal (no cambió)</li>";
echo "</ul>";

// Por referencia
$resultadoReferencia = duplicarReferencia($valorOriginal);
echo "<p><strong>Paso por Referencia:</strong></p>";
echo "<ul>";
echo "<li>Valor original: 5</li>";
echo "<li>Resultado de función: $resultadoReferencia</li>";
echo "<li>Valor original después: $valorOriginal (sí cambió)</li>";
echo "</ul>";

// =============================================
// 5. FUNCIONES CON TIPADO ESTRICTO
// =============================================

echo "<h2>5. Funciones con Tipado Estricto (PHP 7+)</h2>";

// Declaración estricta de tipos
//declare(strict_types=1);

// Función con tipado fuerte
function calcularAreaRectangulo(float $base, float $altura): float {
    return $base * $altura;
}

// Función con tipado y valor por defecto
function formatearNombre(string $nombre, string $apellido, string $titulo = ""): string {
    if ($titulo) {
        return "$titulo $nombre $apellido";
    }
    return "$nombre $apellido";
}

// Función que retorna un array tipado
function obtenerDatosUsuario(int $id): array {
    return [
        'id' => $id,
        'nombre' => "Usuario $id",
        'email' => "usuario$id@email.com",
        'activo' => true
    ];
}

echo "<h3>Ejemplos de Tipado Estricto:</h3>";
echo "<p><strong>calcularAreaRectangulo(5.5, 3.2):</strong> " . calcularAreaRectangulo(5.5, 3.2) . "</p>";
echo "<p><strong>formatearNombre('Ana', 'García', 'Dr.'):</strong> " . formatearNombre('Ana', 'García', 'Dr.') . "</p>";

$usuario = obtenerDatosUsuario(123);
echo "<p><strong>obtenerDatosUsuario(123):</strong></p>";
echo "<pre>";
print_r($usuario);
echo "</pre>";

// =============================================
// 6. FUNCIONES VARIÁDICAS (NÚMERO VARIABLE DE PARÁMETROS)
// =============================================

echo "<h2>6. Funciones Variádicas (...$parametros)</h2>";

// Función que acepta número variable de parámetros
function sumarMultiples(...$numeros) {
    return array_sum($numeros);
}

// Función variádica con tipado
function concatenarCadenas(string ...$cadenas): string {
    return implode(' ', $cadenas);
}

// Función con parámetros fijos y variables
function crearLista($titulo, ...$elementos) {
    $lista = "<h4>$titulo</h4><ul>";
    foreach ($elementos as $elemento) {
        $lista .= "<li>$elemento</li>";
    }
    $lista .= "</ul>";
    return $lista;
}

echo "<h3>Ejemplos de Funciones Variádicas:</h3>";
echo "<p><strong>sumarMultiples(1, 2, 3, 4, 5):</strong> " . sumarMultiples(1, 2, 3, 4, 5) . "</p>";
echo "<p><strong>concatenarCadenas('Hola', 'Mundo', 'desde', 'PHP'):</strong> " . concatenarCadenas('Hola', 'Mundo', 'desde', 'PHP') . "</p>";
echo crearLista('Lenguajes de Programación', 'PHP', 'JavaScript', 'Python', 'Java');

// =============================================
// 7. FUNCIONES RECURSIVAS
// =============================================

echo "<h2>7. Funciones Recursivas</h2>";

// Función recursiva: factorial
function factorial(int $n): int {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

// Función recursiva: Fibonacci
function fibonacci(int $n): int {
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    return fibonacci($n - 1) + fibonacci($n - 2);
}

echo "<h3>Ejemplos de Recursividad:</h3>";
echo "<p><strong>factorial(5):</strong> " . factorial(5) . " (5! = 5×4×3×2×1 = 120)</p>";

echo "<p><strong>Secuencia Fibonacci:</strong> ";
for ($i = 0; $i < 10; $i++) {
    echo fibonacci($i) . " ";
}
echo "</p>";

// =============================================
// 8. FUNCIONES ANÓNIMAS Y CLOSURES
// =============================================

echo "<h2>8. Funciones Anónimas y Closures</h2>";

// Función anónima asignada a variable
$multiplicar = function($a, $b) {
    return $a * $b;
};

// Closure con uso de variables externas
$factor = 10;
$multiplicarPorFactor = function($numero) use ($factor) {
    return $numero * $factor;
};

// Función que retorna una función anónima
function crearMultiplicador($multiplicador) {
    return function($numero) use ($multiplicador) {
        return $numero * $multiplicador;
    };
}

echo "<h3>Ejemplos de Funciones Anónimas:</h3>";
echo "<p><strong>\$multiplicar(4, 5):</strong> " . $multiplicar(4, 5) . "</p>";
echo "<p><strong>\$multiplicarPorFactor(7):</strong> " . $multiplicarPorFactor(7) . " (factor = $factor)</p>";

$duplicar = crearMultiplicador(2);
$triplicar = crearMultiplicador(3);
echo "<p><strong>\$duplicar(8):</strong> " . $duplicar(8) . "</p>";
echo "<p><strong>\$triplicar(8):</strong> " . $triplicar(8) . "</p>";

// =============================================
// 9. FUNCIONES INTEGRADAS DE PHP
// =============================================

echo "<h2>9. Funciones Integradas de PHP</h2>";

$cadena = "   Hola Mundo desde PHP   ";
$arrayEjemplo = [10, 5, 8, 3, 15, 2];

echo "<h3>Ejemplos de Funciones Integradas:</h3>";
echo "<p><strong>Cadena original:</strong> '$cadena'</p>";
echo "<p><strong>strtoupper():</strong> '" . strtoupper($cadena) . "'</p>";
echo "<p><strong>trim():</strong> '" . trim($cadena) . "'</p>";
echo "<p><strong>strlen():</strong> " . strlen(trim($cadena)) . " caracteres</p>";

echo "<p><strong>Array original:</strong> [" . implode(', ', $arrayEjemplo) . "]</p>";
echo "<p><strong>max():</strong> " . max($arrayEjemplo) . "</p>";
echo "<p><strong>min():</strong> " . min($arrayEjemplo) . "</p>";
echo "<p><strong>sort() + array_slice():</strong> [" . implode(', ', array_slice($arrayEjemplo, 0, 3)) . "] (primeros 3)</p>";

// =============================================
// 10. CASOS PRÁCTICOS COMBINADOS
// =============================================

echo "<h2>10. Casos Prácticos Combinados</h2>";

// Sistema de carrito de compras
function calcularTotalCarrito(array &$carrito, float $descuento = 0, float $iva = 0.16): array {
    $subtotal = 0;
    
    foreach ($carrito as &$producto) {
        $producto['total'] = $producto['precio'] * $producto['cantidad'];
        $subtotal += $producto['total'];
    }
    
    $descuentoMonto = $subtotal * ($descuento / 100);
    $totalAntesIva = $subtotal - $descuentoMonto;
    $ivaMonto = $totalAntesIva * $iva;
    $total = $totalAntesIva + $ivaMonto;
    
    return [
        'subtotal' => $subtotal,
        'descuento' => $descuentoMonto,
        'iva' => $ivaMonto,
        'total' => $total
    ];
}

// Uso del sistema de carrito
$carrito = [
    ['producto' => 'Laptop', 'precio' => 1000, 'cantidad' => 1],
    ['producto' => 'Mouse', 'precio' => 50, 'cantidad' => 2],
    ['producto' => 'Teclado', 'precio' => 80, 'cantidad' => 1]
];

$totales = calcularTotalCarrito($carrito, 10, 0.16);

echo "<h3>Sistema de Carrito de Compras:</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th></tr>";

foreach ($carrito as $producto) {
    echo "<tr>
            <td>{$producto['producto']}</td>
            <td>$" . number_format($producto['precio'], 2) . "</td>
            <td>{$producto['cantidad']}</td>
            <td>$" . number_format($producto['total'], 2) . "</td>
          </tr>";
}

echo "</table>";

echo "<h4>Resumen de Compra:</h4>";
echo "<ul>";
echo "<li><strong>Subtotal:</strong> $" . number_format($totales['subtotal'], 2) . "</li>";
echo "<li><strong>Descuento (10%):</strong> -$" . number_format($totales['descuento'], 2) . "</li>";
echo "<li><strong>IVA (16%):</strong> $" . number_format($totales['iva'], 2) . "</li>";
echo "<li><strong>Total:</strong> $" . number_format($totales['total'], 2) . "</li>";
echo "</ul>";

// =============================================
// RESUMEN FINAL
// =============================================

echo "<h2>Resumen de Tipos de Funciones en PHP</h2>";

$tiposFunciones = [
    "Básicas" => "Sin parámetros, retorno simple",
    "Con parámetros por valor" => "Reciben copia de los valores",
    "Con parámetros por referencia" => "Modifican variables originales (&)",
    "Con tipado estricto" => "Especifican tipos de parámetros y retorno",
    "Variádicas" => "Aceptan número variable de parámetros (...)",
    "Recursivas" => "Se llaman a sí mismas",
    "Anónimas" => "Sin nombre, asignadas a variables",
    "Integradas" => "Proporcionadas por PHP"
];

echo "<table border='1' cellpadding='8' cellspacing='0' style='width: 100%'>";
echo "<tr><th>Tipo de Función</th><th>Características</th><th>Ejemplo</th></tr>";

foreach ($tiposFunciones as $tipo => $caracteristicas) {
    $ejemplo = match($tipo) {
        "Básicas" => "function hola() { return 'Hola'; }",
        "Con parámetros por valor" => "function sumar(\$a, \$b) { return \$a + \$b; }",
        "Con parámetros por referencia" => "function incrementar(&\$x) { \$x++; }",
        "Con tipado estricto" => "function area(float \$b, float \$a): float { ... }",
        "Variádicas" => "function sumar(...\$nums) { return array_sum(\$nums); }",
        "Recursivas" => "function factorial(\$n) { return \$n * factorial(\$n-1); }",
        "Anónimas" => "\$fn = function(\$x) { return \$x * 2; };",
        "Integradas" => "strlen(), count(), array_map()"
    };
    
    echo "<tr>
            <td><strong>$tipo</strong></td>
            <td>$caracteristicas</td>
            <td><code>$ejemplo</code></td>
          </tr>";
}

echo "</table>";

echo "<h3>Diferencias Clave: Paso por Valor vs Paso por Referencia</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Aspecto</th><th>Paso por Valor</th><th>Paso por Referencia</th></tr>";
echo "<tr><td><strong>Sintaxis</strong></td><td>function nombre(\$param)</td><td>function nombre(&\$param)</td></tr>";
echo "<tr><td><strong>Modifica original</strong></td><td>No</td><td>Sí</td></tr>";
echo "<tr><td><strong>Uso de memoria</strong></td><td>Copia el valor</td><td>Referencia al original</td></tr>";
echo "<tr><td><strong>Rendimiento</strong></td><td>Mejor para datos pequeños</td><td>Mejor para datos grandes</td></tr>";
echo "<tr><td><strong>Casos de uso</strong></td><td>Cálculos, transformaciones</td><td>Modificar arrays, objetos, contadores</td></tr>";
echo "</table>";

echo "<p><strong>Consejo:</strong> Usa paso por referencia cuando necesites modificar variables originales o trabajar con estructuras grandes de datos.</p>";

?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/functions.user-defined.php">Funciones de Usuario en PHP</a>.</li>
</ul>
</body>
</html>
