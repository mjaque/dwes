<!DOCTYPE html>
<html lang=es>

<head>
	<meta charset=utf-8 />
	<meta name=viewport content='width=device-width, initial-scale=1' />
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Uso de GET en PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .section { margin: 20px 0; padding: 15px; border-left: 4px solid #007bff; background: #f8f9fa; }
        .form-group { margin: 10px 0; }
        label { display: inline-block; width: 150px; font-weight: bold; }
        input, select, textarea { padding: 8px; margin: 5px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .result { background: #e9ecef; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .danger { background: #f8d7da; color: #721c24; border-left-color: #dc3545; }
        .success { background: #d1ecf1; color: #0c5460; border-left-color: #17a2b8; }
        .info { background: #d1ecf1; color: #0c5460; border-left-color: #17a2b8; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .url-example { background: #fff3cd; padding: 10px; border-radius: 4px; }
    </style>
</head>

<body>
<?php
echo "
    <div class='container'>
        <h1>🔍 Recuperación de Datos por GET en PHP</h1>";

// =============================================
// 1. COMPROBACIÓN BÁSICA DE DATOS GET
// =============================================
echo "<div class='section'>
        <h2>1. Comprobación Básica de Datos GET</h2>";

// Verificar si hay parámetros GET
if (!empty($_GET)) {
    echo "<div class='result success'>✅ Se recibieron parámetros GET</div>";
    echo "<p>Número de parámetros recibidos: " . count($_GET) . "</p>";
} else {
    echo "<div class='result info'>ℹ️ No se recibieron parámetros GET</div>";
    echo "<p>Prueba agregar parámetros a la URL o usar el formulario de abajo.</p>";
}

echo "</div>";

// =============================================
// 2. RECUPERACIÓN DIRECTA DE PARÁMETROS
// =============================================
echo "<div class='section'>
        <h2>2. Recuperación Directa de Parámetros</h2>";

// Recuperar parámetros individuales
$nombre = $_GET['nombre'] ?? 'No proporcionado';
$edad = $_GET['edad'] ?? 'No proporcionada';
$ciudad = $_GET['ciudad'] ?? 'No proporcionada';
$intereses = $_GET['intereses'] ?? 'No proporcionados';

echo "<table>
        <tr><th>Parámetro</th><th>Valor</th><th>Tipo</th></tr>
        <tr><td>nombre</td><td>" . htmlspecialchars($nombre) . "</td><td>" . gettype($nombre) . "</td></tr>
        <tr><td>edad</td><td>" . htmlspecialchars($edad) . "</td><td>" . gettype($edad) . "</td></tr>
        <tr><td>ciudad</td><td>" . htmlspecialchars($ciudad) . "</td><td>" . gettype($ciudad) . "</td></tr>
        <tr><td>intereses</td><td>" . htmlspecialchars($intereses) . "</td><td>" . gettype($intereses) . "</td></tr>
    </table>";

echo "</div>";

// =============================================
// 3. VISUALIZACIÓN COMPLETA DE $_GET
// =============================================
echo "<div class='section'>
        <h2>3. Array Completo \$_GET</h2>";

if (!empty($_GET)) {
    echo "<h3>Contenido de \$_GET:</h3>";
    echo "<pre>" . print_r($_GET, true) . "</pre>";
    
    echo "<h3>Valores con htmlspecialchars (seguro para mostrar):</h3>";
    echo "<table><tr><th>Clave</th><th>Valor Original</th><th>Valor Seguro</th></tr>";
    foreach ($_GET as $clave => $valor) {
        echo "<tr>
                <td><strong>" . htmlspecialchars($clave) . "</strong></td>
                <td>" . var_export($valor, true) . "</td>
                <td>" . htmlspecialchars($valor) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay datos para mostrar.</p>";
}

echo "</div>";

// =============================================
// 4. VALIDACIÓN Y SANITIZACIÓN
// =============================================
echo "<div class='section'>
        <h2>4. Validación y Sanitización</h2>";

// Validar y sanitizar datos
if (isset($_GET['edad'])) {
    $edad_raw = $_GET['edad'];
    $edad_filtered = filter_var($edad_raw, FILTER_SANITIZE_NUMBER_INT);
    $edad_validated = filter_var($edad_filtered, FILTER_VALIDATE_INT);
    
    echo "<div class='form-group'>
            <label>Edad cruda:</label> " . htmlspecialchars($edad_raw) . "<br>
            <label>Después de sanitizar:</label> " . htmlspecialchars($edad_filtered) . "<br>
            <label>Después de validar:</label> " . ($edad_validated !== false ? $edad_validated : 'Inválida') . "
          </div>";
}

// Validar email si está presente
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $email_validado = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    echo "<div class='form-group'>
            <label>Email:</label> " . htmlspecialchars($email) . "<br>
            <label>Validación:</label> " . ($email_validado ? "✅ Válido" : "❌ Inválido") . "
          </div>";
}

echo "<h3>Ejemplos de Filtros:</h3>";
echo "<ul>
        <li><strong>FILTER_SANITIZE_STRING</strong>: Elimina etiquetas HTML</li>
        <li><strong>FILTER_SANITIZE_NUMBER_INT</strong>: Solo números enteros</li>
        <li><strong>FILTER_SANITIZE_EMAIL</strong>: Limpia dirección email</li>
        <li><strong>FILTER_VALIDATE_INT</strong>: Valida número entero</li>
        <li><strong>FILTER_VALIDATE_EMAIL</strong>: Valida email</li>
      </ul>";

echo "</div>";

// =============================================
// 5. MANEJO DE PARÁMETROS MÚLTIPLES
// =============================================
echo "<div class='section'>
        <h2>5. Manejo de Parámetros Múltiples</h2>";

// Parámetros con mismo nombre (ej: intereses[])
if (isset($_GET['intereses']) && is_array($_GET['intereses'])) {
    echo "<h3>Intereses seleccionados (array):</h3>";
    echo "<ul>";
    foreach ($_GET['intereses'] as $index => $interes) {
        echo "<li>Interés " . ($index + 1) . ": " . htmlspecialchars($interes) . "</li>";
    }
    echo "</ul>";
} elseif (isset($_GET['intereses'])) {
    echo "<p>Intereses: " . htmlspecialchars($_GET['intereses']) . " (valor simple)</p>";
}

// Parámetros numéricos múltiples
if (isset($_GET['numeros'])) {
    $numeros = is_array($_GET['numeros']) ? $_GET['numeros'] : [$_GET['numeros']];
    $suma = 0;
    $validos = [];
    
    foreach ($numeros as $numero) {
        if (is_numeric($numero)) {
            $suma += (float)$numero;
            $validos[] = $numero;
        }
    }
    
    echo "<p>Números válidos: " . implode(', ', $validos) . "</p>";
    echo "<p>Suma: $suma</p>";
}

echo "</div>";

// =============================================
// 6. EJEMPLOS DE URLs CON PARÁMETROS
// =============================================
echo "<div class='section'>
        <h2>6. Ejemplos de URLs con Parámetros GET</h2>";

$base_url = htmlspecialchars($_SERVER['PHP_SELF']);
echo "<div class='url-example'>
        <h3>URL actual: " . $base_url . "</h3>
        <p>Prueba estos enlaces:</p>
        <ul>
            <li><a href='{$base_url}?nombre=Juan&edad=25'>Ejemplo simple</a></li>
            <li><a href='{$base_url}?usuario=admin&email=admin@example.com&rol=supervisor'>Ejemplo con email</a></li>
            <li><a href='{$base_url}?categoria=tecnologia&precio_min=100&precio_max=500'>Ejemplo de filtros</a></li>
            <li><a href='{$base_url}?intereses[]=programacion&intereses[]=diseño&intereses[]=musica'>Ejemplo con array</a></li>
            <li><a href='{$base_url}'>Limpiar parámetros</a></li>
        </ul>
      </div>";

echo "</div>";

// =============================================
// 7. FORMULARIO PARA PROBAR GET
// =============================================
echo "<div class='section'>
        <h2>7. Formulario para Probar GET</h2>
        <form method='GET' action=''>
            <input type='hidden' name='formulario' value='enviado'>
            
            <div class='form-group'>
                <label for='nombre'>Nombre:</label>
                <input type='text' id='nombre' name='nombre' value='" . ($_GET['nombre'] ?? '') . "'>
            </div>
            
            <div class='form-group'>
                <label for='edad'>Edad:</label>
                <input type='number' id='edad' name='edad' value='" . ($_GET['edad'] ?? '') . "'>
            </div>
            
            <div class='form-group'>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' value='" . ($_GET['email'] ?? '') . "'>
            </div>
            
            <div class='form-group'>
                <label for='ciudad'>Ciudad:</label>
                <select id='ciudad' name='ciudad'>
                    <option value=''>Selecciona una ciudad</option>
                    <option value='madrid'" . (($_GET['ciudad'] ?? '') == 'madrid' ? ' selected' : '') . ">Madrid</option>
                    <option value='barcelona'" . (($_GET['ciudad'] ?? '') == 'barcelona' ? ' selected' : '') . ">Barcelona</option>
                    <option value='valencia'" . (($_GET['ciudad'] ?? '') == 'valencia' ? ' selected' : '') . ">Valencia</option>
                </select>
            </div>
            
            <div class='form-group'>
                <label>Intereses:</label><br>
                <input type='checkbox' name='intereses[]' value='programacion' " . 
                (isset($_GET['intereses']) && in_array('programacion', (array)$_GET['intereses']) ? 'checked' : '') . "> Programación<br>
                <input type='checkbox' name='intereses[]' value='diseño' " . 
                (isset($_GET['intereses']) && in_array('diseño', (array)$_GET['intereses']) ? 'checked' : '') . "> Diseño<br>
                <input type='checkbox' name='intereses[]' value='musica' " . 
                (isset($_GET['intereses']) && in_array('musica', (array)$_GET['intereses']) ? 'checked' : '') . "> Música<br>
            </div>
            
            <div class='form-group'>
                <label for='mensaje'>Mensaje:</label><br>
                <textarea id='mensaje' name='mensaje' rows='3' cols='50'>" . ($_GET['mensaje'] ?? '') . "</textarea>
            </div>
            
            <button type='submit'>Enviar por GET</button>
            <button type='button' onclick='location.href=\"{$base_url}\"'>Limpiar</button>
        </form>
      </div>";

// =============================================
// 8. INFORMACIÓN TÉCNICA
// =============================================
echo "<div class='section'>
        <h2>8. Información Técnica</h2>";

echo "<h3>Variables de Servidor Relacionadas:</h3>";
echo "<table>
        <tr><th>Variable</th><th>Valor</th></tr>
        <tr><td>PHP_SELF</td><td>" . ($_SERVER['PHP_SELF'] ?? '') . "</td></tr>
        <tr><td>QUERY_STRING</td><td>" . ($_SERVER['QUERY_STRING'] ?? '') . "</td></tr>
        <tr><td>REQUEST_METHOD</td><td>" . ($_SERVER['REQUEST_METHOD'] ?? '') . "</td></tr>
        <tr><td>REQUEST_URI</td><td>" . ($_SERVER['REQUEST_URI'] ?? '') . "</td></tr>
      </table>";

echo "<h3>Características de GET:</h3>";
echo "<ul>
        <li>✅ Los parámetros son visibles en la URL</li>
        <li>✅ Pueden ser guardados como favoritos</li>
        <li>✅ Límite de longitud (depende del navegador, ~2000 caracteres)</li>
        <li>❌ No seguro para datos sensibles</li>
        <li>❌ No puede enviar archivos</li>
        <li>🔍 Ideal para búsquedas, filtros y paginación</li>
      </ul>";

echo "</div>";

// =============================================
// 9. EJEMPLO PRÁCTICO: BUSCADOR
// =============================================
echo "<div class='section'>
        <h2>9. Ejemplo Práctico: Buscador</h2>";

// Simulación de base de datos
$productos = [
    ["id" => 1, "nombre" => "Laptop HP", "categoria" => "tecnologia", "precio" => 800],
    ["id" => 2, "nombre" => "iPhone 14", "categoria" => "tecnologia", "precio" => 1000],
    ["id" => 3, "nombre" => "Silla Oficina", "categoria" => "muebles", "precio" => 150],
    ["id" => 4, "nombre" => "Monitor Samsung", "categoria" => "tecnologia", "precio" => 300],
    ["id" => 5, "nombre" => "Mesa Madera", "categoria" => "muebles", "precio" => 200]
];

$termino_busqueda = $_GET['busqueda'] ?? '';
$categoria_filtro = $_GET['categoria'] ?? '';
$precio_max = $_GET['precio_max'] ?? '';

echo "<form method='GET' style='background: #e9ecef; padding: 15px; border-radius: 5px;'>
        <div class='form-group'>
            <label for='busqueda'>Buscar:</label>
            <input type='text' id='busqueda' name='busqueda' value='" . htmlspecialchars($termino_busqueda) . "' placeholder='Nombre del producto'>
        </div>
        
        <div class='form-group'>
            <label for='categoria'>Categoría:</label>
            <select id='categoria' name='categoria'>
                <option value=''>Todas</option>
                <option value='tecnologia'" . ($categoria_filtro == 'tecnologia' ? ' selected' : '') . ">Tecnología</option>
                <option value='muebles'" . ($categoria_filtro == 'muebles' ? ' selected' : '') . ">Muebles</option>
            </select>
        </div>
        
        <div class='form-group'>
            <label for='precio_max'>Precio máximo:</label>
            <input type='number' id='precio_max' name='precio_max' value='" . htmlspecialchars($precio_max) . "' placeholder='Ej: 500'>
        </div>
        
        <button type='submit'>🔍 Buscar</button>
        <button type='button' onclick='location.href=\"{$base_url}\"'>🗑️ Limpiar</button>
      </form>";

// Filtrar productos
$resultados = array_filter($productos, function($producto) use ($termino_busqueda, $categoria_filtro, $precio_max) {
    $coincide = true;
    
    if (!empty($termino_busqueda)) {
        $coincide = $coincide && (stripos($producto['nombre'], $termino_busqueda) !== false);
    }
    
    if (!empty($categoria_filtro)) {
        $coincide = $coincide && ($producto['categoria'] == $categoria_filtro);
    }
    
    if (!empty($precio_max) && is_numeric($precio_max)) {
        $coincide = $coincide && ($producto['precio'] <= (float)$precio_max);
    }
    
    return $coincide;
});

echo "<h3>Resultados de la búsqueda (" . count($resultados) . " productos):</h3>";
if (count($resultados) > 0) {
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th></tr>";
    foreach ($resultados as $producto) {
        echo "<tr>
                <td>{$producto['id']}</td>
                <td>{$producto['nombre']}</td>
                <td>{$producto['categoria']}</td>
                <td>\${$producto['precio']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron productos que coincidan con los criterios de búsqueda.</p>";
}

echo "</div>";

echo "    </div>";
?>
<h2>Para saber más:</h2>
<p>Consulta:</p>
<ul>
<li><a href="https://www.php.net/manual/es/reserved.variables.get.php">$_GET en PHP</a>.</li>
</ul>
</body>
</html>
