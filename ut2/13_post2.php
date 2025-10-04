<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .result-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .variable {
            background-color: #f8f9fa;
            padding: 10px;
            margin: 10px 0;
            border-left: 4px solid #007bff;
        }
        .error {
            color: #dc3545;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 4px;
        }
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Datos recibidos via POST</h2>

        <?php
        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<div class="success">✅ Formulario enviado correctamente via POST</div>';
            
            // Mostrar todas las variables POST recibidas
            echo '<h3>Variables POST recibidas:</h3>';
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            // Procesar y mostrar cada variable individualmente
            echo '<h3>Datos individuales:</h3>';
            
            // Nombre
            if (!empty($_POST['nombre'])) {
                $nombre = htmlspecialchars($_POST['nombre']);
                echo '<div class="variable"><strong>Nombre:</strong> ' . $nombre . '</div>';
            } else {
                echo '<div class="error">❌ Nombre no recibido</div>';
            }

            // Email
            if (!empty($_POST['email'])) {
                $email = htmlspecialchars($_POST['email']);
                echo '<div class="variable"><strong>Email:</strong> ' . $email . '</div>';
                
                // Validar formato de email
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="success">✓ Email válido</div>';
                } else {
                    echo '<div class="error">✗ Formato de email inválido</div>';
                }
            } else {
                echo '<div class="error">❌ Email no recibido</div>';
            }

            // Edad
            if (!empty($_POST['edad'])) {
                $edad = intval($_POST['edad']);
                echo '<div class="variable"><strong>Edad:</strong> ' . $edad . ' años</div>';
                
                // Validar edad
                if ($edad >= 18) {
                    echo '<div class="success">✓ Mayor de edad</div>';
                } else {
                    echo '<div class="error">✗ Menor de edad</div>';
                }
            } else {
                echo '<div class="variable"><strong>Edad:</strong> No especificada</div>';
            }

            // País
            if (!empty($_POST['pais'])) {
                $pais = htmlspecialchars($_POST['pais']);
                $paises = [
                    'MX' => 'México',
                    'ES' => 'España',
                    'AR' => 'Argentina',
                    'CO' => 'Colombia',
                    'OT' => 'Otro'
                ];
                
                $nombrePais = $paises[$pais] ?? 'Desconocido';
                echo '<div class="variable"><strong>País:</strong> ' . $nombrePais . ' (' . $pais . ')</div>';
            } else {
                echo '<div class="variable"><strong>País:</strong> No seleccionado</div>';
            }

            // Género
            if (!empty($_POST['genero'])) {
                $genero = htmlspecialchars($_POST['genero']);
                $generos = [
                    'M' => 'Masculino',
                    'F' => 'Femenino',
                    'O' => 'Otro'
                ];
                
                echo '<div class="variable"><strong>Género:</strong> ' . $generos[$genero] . '</div>';
            } else {
                echo '<div class="variable"><strong>Género:</strong> No seleccionado</div>';
            }

            // Intereses (array)
            if (!empty($_POST['intereses'])) {
                $intereses = $_POST['intereses'];
                echo '<div class="variable"><strong>Intereses seleccionados:</strong><ul>';
                
                foreach ($intereses as $interes) {
                    $interesLimpio = htmlspecialchars($interes);
                    echo '<li>' . ucfirst($interesLimpio) . '</li>';
                }
                
                echo '</ul></div>';
                echo '<div class="variable"><strong>Total de intereses:</strong> ' . count($intereses) . '</div>';
            } else {
                echo '<div class="variable"><strong>Intereses:</strong> Ninguno seleccionado</div>';
            }

            // Mensaje
            if (!empty($_POST['mensaje'])) {
                $mensaje = htmlspecialchars($_POST['mensaje']);
                echo '<div class="variable"><strong>Mensaje:</strong><br>' . nl2br($mensaje) . '</div>';
                echo '<div class="variable"><strong>Longitud del mensaje:</strong> ' . strlen($mensaje) . ' caracteres</div>';
            } else {
                echo '<div class="variable"><strong>Mensaje:</strong> Vacío</div>';
            }

            // Ejemplo de procesamiento adicional
            echo '<h3>Procesamiento adicional:</h3>';
            
            // Crear un array con los datos limpios
            $datosUsuario = [
                'nombre' => $nombre ?? 'No especificado',
                'email' => $email ?? 'No especificado',
                'edad' => $edad ?? 'No especificada',
                'pais' => $nombrePais ?? 'No seleccionado',
                'genero' => $generos[$genero] ?? 'No seleccionado',
                'intereses' => $intereses ?? [],
                'fecha_registro' => date('Y-m-d H:i:s')
            ];

            echo '<div class="variable"><strong>Datos estructurados del usuario:</strong>';
            echo '<pre>';
            print_r($datosUsuario);
            echo '</pre></div>';

        } else {
            echo '<div class="error">❌ Error: Esta página debe ser accedida via POST</div>';
            echo '<p><a href="formulario.html">← Volver al formulario</a></p>';
        }
        ?>

        <hr>
        <h3>Información técnica:</h3>
        <div class="variable">
            <strong>Método HTTP:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?><br>
            <strong>Timestamp:</strong> <?php echo date('Y-m-d H:i:s'); ?><br>
            <strong>IP del cliente:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?>
        </div>

        <p style="margin-top: 20px;">
            <a href="formulario.html">← Enviar otro formulario</a>
        </p>
    </div>
</body>
</html>
