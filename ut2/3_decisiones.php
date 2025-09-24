<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Estructuras de Decisión en PHP</title>
</head>

<body>
<?php
echo "<h1>Estructuras de Decisión en PHP</h1>";

// =============================================
// 1. ESTRUCTURA IF BÁSICA
// =============================================
echo "<h2>1. Estructura IF básica</h2>";
$edad = 18;

if ($edad >= 18) {
    echo "Tienes $edad años: Eres mayor de edad<br>";
}

// =============================================
// 2. IF-ELSE
// =============================================
echo "<h2>2. Estructura IF-ELSE</h2>";
$nota = 6.5;

if ($nota >= 7) {
    echo "Nota: $nota - Aprobado<br>";
} else {
    echo "Nota: $nota - Reprobado<br>";
}

// =============================================
// 3. IF-ELSEIF-ELSE
// =============================================
echo "<h2>3. Estructura IF-ELSEIF-ELSE</h2>";
$calificacion = 8.5;

if ($calificacion >= 9) {
    echo "Calificación: $calificacion - Excelente (A)<br>";
} elseif ($calificacion >= 8) {
    echo "Calificación: $calificacion - Muy Bueno (B)<br>";
} elseif ($calificacion >= 7) {
    echo "Calificación: $calificacion - Bueno (C)<br>";
} elseif ($calificacion >= 6) {
    echo "Calificación: $calificacion - Suficiente (D)<br>";
} else {
    echo "Calificación: $calificacion - Insuficiente (F)<br>";
}

// =============================================
// 4. OPERADOR TERNARIO
// =============================================
echo "<h2>4. Operador Ternario</h2>";
$temperatura = 25;
$clima = ($temperatura > 30) ? "Caluroso" : "Agradable";
echo "Temperatura: {$temperatura}°C - Clima: $clima<br>";

// Ternario anidado
$puntaje = 85;
$resultado = ($puntaje >= 90) ? "Excelente" : 
             (($puntaje >= 70) ? "Aprobado" : "Reprobado");
echo "Puntaje: $puntaje - Resultado: $resultado<br>";

// =============================================
// 5. ESTRUCTURA SWITCH
// =============================================
echo "<h2>5. Estructura SWITCH</h2>";
$dia_semana = "miércoles";

switch ($dia_semana) {
    case "lunes":
        echo "Hoy es lunes: ¡Ánimo, comienza la semana!<br>";
        break;
    case "martes":
        echo "Hoy es martes: Segundo día de trabajo<br>";
        break;
    case "miércoles":
        echo "Hoy es miércoles: ¡Mitad de semana!<br>";
        break;
    case "jueves":
        echo "Hoy es jueves: Casi viernes<br>";
        break;
    case "viernes":
        echo "Hoy es viernes: ¡Último día laboral!<br>";
        break;
    case "sábado":
    case "domingo":
        echo "Hoy es $dia_semana: ¡Fin de semana!<br>";
        break;
    default:
        echo "Día no válido<br>";
}

// Switch con números
echo "<h3>Switch con números</h3>";
$mes = 3;

switch ($mes) {
    case 1: case 2: case 3:
        echo "Mes $mes: Primer trimestre<br>";
        break;
    case 4: case 5: case 6:
        echo "Mes $mes: Segundo trimestre<br>";
        break;
    case 7: case 8: case 9:
        echo "Mes $mes: Tercer trimestre<br>";
        break;
    case 10: case 11: case 12:
        echo "Mes $mes: Cuarto trimestre<br>";
        break;
    default:
        echo "Mes no válido<br>";
}

// =============================================
// 6. OPERADOR NULL COALESCING (??)
// =============================================
echo "<h2>6. Operador Null Coalescing (??)</h2>";

// Ejemplo con variable no definida
$nombre = $_POST['nombre'] ?? "Invitado";
echo "Nombre: $nombre<br>";

// Ejemplo con array
$usuario = [
    'email' => 'usuario@example.com'
    // 'nombre' no está definido
];
$nombre_usuario = $usuario['nombre'] ?? "Usuario Anónimo";
echo "Nombre de usuario: $nombre_usuario<br>";

// =============================================
// 7. ESTRUCTURAS ANIDADAS
// =============================================
echo "<h2>7. Estructuras Anidadas</h2>";

$es_fin_de_semana = false;
$hora = 14;

if (!$es_fin_de_semana) {
    if ($hora < 9) {
        echo "Es muy temprano para trabajar<br>";
    } elseif ($hora >= 9 && $hora <= 18) {
        echo "Horario laboral<br>";
    } else {
        echo "Fuera del horario laboral<br>";
    }
} else {
    echo "¡Es fin de semana!<br>";
}

// =============================================
// 8. COMPARACIONES AVANZADAS
// =============================================
echo "<h2>8. Comparaciones Avanzadas</h2>";

// Comparación estricta (===) vs comparación flexible (==)
$numero1 = "10";
$numero2 = 10;

echo "Comparación flexible ('10' == 10): " . ($numero1 == $numero2 ? "Verdadero" : "Falso") . "<br>";
echo "Comparación estricta ('10' === 10): " . ($numero1 === $numero2 ? "Verdadero" : "Falso") . "<br>";

// Operadores lógicos
$edad = 25;
$tiene_licencia = true;

if ($edad >= 18 && $tiene_licencia) {
    echo "Puede conducir<br>";
} else {
    echo "No puede conducir<br>";
}

// =============================================
// 9. MATCH EXPRESSION (PHP 8+)
// =============================================
echo "<h2>9. Match Expression (PHP 8+)</h2>";

$estado = "activo";

$mensaje = match($estado) {
    'activo' => "El usuario está activo",
    'inactivo' => "El usuario está inactivo",
    'bloqueado' => "El usuario está bloqueado",
    default => "Estado desconocido"
};
echo "Estado: $estado - $mensaje<br>";

// Match con múltiples condiciones
$puntuacion = 75;
$categoria = match(true) {
    $puntuacion >= 90 => "A",
    $puntuacion >= 80 => "B",
    $puntuacion >= 70 => "C",
    $puntuacion >= 60 => "D",
    default => "F"
};
echo "Puntuación: $puntuacion - Categoría: $categoria<br>";

// =============================================
// 10. EJEMPLO PRÁCTICO COMPLETO
// =============================================
echo "<h2>10. Ejemplo Práctico Completo</h2>";

function verificarAcceso($edad, $es_miembro, $hora_visita) {
    echo "Verificando acceso - Edad: $edad, Miembro: " . ($es_miembro ? "Sí" : "No") . ", Hora: $hora_visita<br>";
    
    if ($edad < 18) {
        return "Acceso denegado: Menor de edad";
    }
    
    if ($hora_visita > 22 || $hora_visita < 8) {
        return "Acceso denegado: Fuera del horario permitido";
    }
    
    if ($es_miembro || $edad >= 65) {
        return "Acceso gratuito permitido";
    } else {
        return "Acceso permitido con pago";
    }
}

// Pruebas de la función
echo verificarAcceso(25, true, 15) . "<br>";
echo verificarAcceso(16, false, 14) . "<br>";
echo verificarAcceso(70, false, 20) . "<br>";
echo verificarAcceso(25, false, 23) . "<br>";

echo "<h2>Resumen de Estructuras</h2>";
echo "<ul>
<li><strong>IF</strong>: Ejecuta código si la condición es verdadera</li>
<li><strong>IF-ELSE</strong>: Ejecuta un bloque u otro según la condición</li>
<li><strong>IF-ELSEIF-ELSE</strong>: Múltiples condiciones en cadena</li>
<li><strong>Operador Ternario</strong>: If-else en una sola línea</li>
<li><strong>SWITCH</strong>: Múltiples casos para una variable</li>
<li><strong>Null Coalescing</strong>: Asigna valor por defecto si es null</li>
<li><strong>MATCH</strong>: Similar a switch pero más potente (PHP 8+)</li>
</ul>";

?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/language.control-structures.php">Estructuras de Control en PHP</a>.</li>
</ul>
</body>
</html>
