<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Ámbito de Variables en PHP</title>
</head>

<body>
<?php
// =============================================
// DEMOSTRACIÓN DE ÁMBITOS DE VARIABLES EN PHP
// =============================================

echo "<h2>Demostración de Ámbitos de Variables en PHP</h2>";

// =============================================
// 1. VARIABLE GLOBAL
// =============================================
$variableGlobal = "Soy una variable global";

function mostrarGlobal() {
    // Esto NO funcionará - la variable global no es accesible directamente
    // echo "Dentro de función: " . $variableGlobal; // Error: undefined variable
    
    // Para acceder a globales dentro de funciones necesitamos 'global'
    global $variableGlobal;
    echo "<p>Dentro de mostrarGlobal(): " . $variableGlobal . "</p>";
}

// =============================================
// 2. VARIABLES LOCALES EN FUNCIONES
// =============================================
function funcionLocal() {
    $variableLocal = "Soy local de funcionLocal()";
    echo "<p>Dentro de funcionLocal(): " . $variableLocal . "</p>";
    
    // Esta variable solo existe dentro de esta función
    $contador = 0;
    $contador++;
    echo "<p>Contador local: " . $contador . "</p>";
}

function otraFuncion() {
    // No podemos acceder a $variableLocal de funcionLocal()
    // echo $variableLocal; // Error
    
    $variableLocal = "Soy local de otraFuncion() - mismo nombre, diferente ámbito";
    echo "<p>Dentro de otraFuncion(): " . $variableLocal . "</p>";
}

// =============================================
// 3. VARIABLES ESTÁTICAS
// =============================================
function funcionEstatica() {
    static $contadorEstatico = 0;
    $contadorNormal = 0;
    
    $contadorEstatico++;
    $contadorNormal++;
    
    echo "<p>Estático: " . $contadorEstatico . ", Normal: " . $contadorNormal . "</p>";
}

// =============================================
// 4. VARIABLES SUPERGLOBALES
// =============================================
function mostrarSuperglobal() {
    echo "<p>Superglobal \$_SERVER['PHP_SELF']: " . $_SERVER['PHP_SELF'] . "</p>";
    echo "<p>Superglobal \$_SERVER['SERVER_NAME']: " . $_SERVER['SERVER_NAME'] . "</p>";
}

// =============================================
// 5. VARIABLES POR REFERENCIA
// =============================================
function modificarPorReferencia(&$variable) {
    $variable .= " - MODIFICADA";
    echo "<p>Dentro de modificarPorReferencia(): " . $variable . "</p>";
}

function modificarPorValor($variable) {
    $variable .= " - MODIFICADA";
    echo "<p>Dentro de modificarPorValor(): " . $variable . "</p>";
}

// =============================================
// 6. VARIABLES EN CLASES (PROPIEDADES)
// =============================================
class MiClase {
    public $publica = "Propiedad pública";
    private $privada = "Propiedad privada";
    protected $protegida = "Propiedad protegida";
    
    public static $estatica = "Propiedad estática";
    
    public function mostrarPropiedades() {
        echo "<p>Dentro de la clase: " . $this->publica . "</p>";
        echo "<p>Dentro de la clase: " . $this->privada . "</p>";
        echo "<p>Dentro de la clase: " . $this->protegida . "</p>";
    }
    
    public static function metodoEstatico() {
        echo "<p>Método estático: " . self::$estatica . "</p>";
    }
}

// =============================================
// EJECUCIÓN DE LAS DEMOSTRACIONES
// =============================================

echo "<h3>1. Variable Global:</h3>";
echo "<p>Fuera de funciones: " . $variableGlobal . "</p>";
mostrarGlobal();

echo "<h3>2. Variables Locales en Funciones:</h3>";
funcionLocal();
otraFuncion();
// Intentar acceder a variable local fuera de su función
// echo $variableLocal; // Esto causaría error

echo "<h3>3. Variables Estáticas vs Normales:</h3>";
echo "<p>Llamadas a funcionEstatica():</p>";
funcionEstatica(); // Estático: 1, Normal: 1
funcionEstatica(); // Estático: 2, Normal: 1
funcionEstatica(); // Estático: 3, Normal: 1

echo "<h3>4. Variables Superglobales:</h3>";
mostrarSuperglobal();

echo "<h3>5. Paso por Referencia vs Valor:</h3>";
$miVariable = "Valor original";
echo "<p>Antes de modificarPorReferencia(): " . $miVariable . "</p>";
modificarPorReferencia($miVariable);
echo "<p>Después de modificarPorReferencia(): " . $miVariable . "</p>";

$otraVariable = "Valor original";
echo "<p>Antes de modificarPorValor(): " . $otraVariable . "</p>";
modificarPorValor($otraVariable);
echo "<p>Después de modificarPorValor(): " . $otraVariable . "</p>";

echo "<h3>6. Variables en Clases (Ámbito de Objetos):</h3>";
$objeto = new MiClase();
echo "<p>Desde fuera: " . $objeto->publica . "</p>";
// echo $objeto->privada; // Error - no accesible
$objeto->mostrarPropiedades();
echo "<p>Propiedad estática: " . MiClase::$estatica . "</p>";
MiClase::metodoEstatico();

echo "<h3>7. Variables Variables:</h3>";
$nombreVariable = "edad";
$$nombreVariable = 25; // Crea $edad = 25
echo "<p>Variable variable: \$edad = " . $edad . "</p>";

// =============================================
// RESUMEN FINAL
// =============================================
echo "<h3>Resumen de Ámbitos:</h3>";
echo "<ul>";
echo "<li><strong>Global:</strong> Accesible en todo el script con 'global'</li>";
echo "<li><strong>Local:</strong> Solo existe dentro de su función</li>";
echo "<li><strong>Estática:</strong> Conserva su valor entre llamadas a función</li>";
echo "<li><strong>Superglobal:</strong> Accesibles en cualquier lugar</li>";
echo "<li><strong>Por referencia:</strong> Modifica la variable original</li>";
echo "<li><strong>Propiedades de clase:</strong> Públicas, privadas o protegidas</li>";
echo "</ul>";
?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/language.variables.scope.php">Ámbito de Variables en PHP</a>.</li>
</ul>
</body>
</html>
