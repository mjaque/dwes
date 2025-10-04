<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de Archivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
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
        .success {
            color: #155724;
            background-color: #d4edda;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .error {
            color: #721c24;
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .warning {
            color: #856404;
            background-color: #fff3cd;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .file-info {
            background-color: #f8f9fa;
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #007bff;
            border-radius: 4px;
        }
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
            font-size: 12px;
        }
        .file-preview {
            max-width: 200px;
            max-height: 150px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .uploaded-files {
            display: flex;
            flex-wrap: wrap;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>📊 Resultados del Procesamiento de Archivos</h1>

        <?php
        // Configuración
        $uploadDir = 'uploads/';
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes

        // Crear directorio de uploads si no existe
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Verificar método POST y enctype multipart
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo '<div class="error">❌ Error: Esta página debe ser accedida via POST</div>';
            exit;
        }

        if (empty($_FILES)) {
            echo '<div class="error">❌ Error: No se recibieron archivos. Verifique el enctype="multipart/form-data"</div>';
            exit;
        }

        echo '<div class="success">✅ Formulario multipart recibido correctamente</div>';

        // Mostrar datos POST (no archivos)
        echo '<h2>📝 Datos del formulario (POST):</h2>';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        // Mostrar estructura de FILES
        echo '<h2>📁 Estructura de $_FILES:</h2>';
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';

        // Procesar archivos individualmente
        echo '<h2>🔄 Procesamiento de Archivos</h2>';

        $archivosSubidos = [];
        $errores = [];

        // Función para validar y subir archivos
        function procesarArchivo($fileKey, $fileData, $uploadDir, $allowedTypes, $maxFileSize) {
            $resultados = [];
            
            // Verificar si se subió el archivo sin errores
            if ($fileData['error'] === UPLOAD_ERR_OK) {
                
                // Validar tamaño
                if ($fileData['size'] > $maxFileSize) {
                    $resultados['error'] = "Archivo demasiado grande (" . round($fileData['size']/1024/1024, 2) . "MB)";
                    return $resultados;
                }

                // Obtener extensión
                $fileExtension = strtolower(pathinfo($fileData['name'], PATHINFO_EXTENSION));
                
                // Validar tipo de archivo
                if (!in_array($fileExtension, $allowedTypes)) {
                    $resultados['error'] = "Tipo de archivo no permitido: .$fileExtension";
                    return $resultados;
                }

                // Generar nombre único
                $nuevoNombre = uniqid() . '_' . time() . '.' . $fileExtension;
                $rutaDestino = $uploadDir . $nuevoNombre;

                // Mover archivo al directorio final
                if (move_uploaded_file($fileData['tmp_name'], $rutaDestino)) {
                    $resultados['success'] = [
                        'nombre_original' => $fileData['name'],
                        'nombre_servidor' => $nuevoNombre,
                        'ruta' => $rutaDestino,
                        'tamaño' => $fileData['size'],
                        'tipo' => $fileData['type'],
                        'extension' => $fileExtension
                    ];
                } else {
                    $resultados['error'] = "Error al mover el archivo al servidor";
                }
                
            } elseif ($fileData['error'] !== UPLOAD_ERR_NO_FILE) {
                // Manejar errores de subida
                $erroresUpload = [
                    UPLOAD_ERR_INI_SIZE => 'Archivo excede el tamaño máximo permitido en el servidor',
                    UPLOAD_ERR_FORM_SIZE => 'Archivo excede el tamaño máximo del formulario',
                    UPLOAD_ERR_PARTIAL => 'El archivo fue solo parcialmente subido',
                    UPLOAD_ERR_NO_FILE => 'No se seleccionó ningún archivo',
                    UPLOAD_ERR_NO_TMP_DIR => 'Falta directorio temporal',
                    UPLOAD_ERR_CANT_WRITE => 'Error al escribir en disco',
                    UPLOAD_ERR_EXTENSION => 'Subida detenida por extensión'
                ];
                
                $resultados['error'] = $erroresUpload[$fileData['error']] ?? 'Error desconocido';
            }

            return $resultados;
        }

        // Procesar archivo único
        echo '<h3>1. Archivo único:</h3>';
        if (!empty($_FILES['archivo_single']['name'])) {
            $resultado = procesarArchivo('archivo_single', $_FILES['archivo_single'], $uploadDir, $allowedTypes, $maxFileSize);
            
            if (isset($resultado['success'])) {
                echo '<div class="success">✅ Archivo subido: ' . $resultado['success']['nombre_original'] . '</div>';
                echo '<div class="file-info">';
                echo '<strong>Detalles:</strong><br>';
                echo 'Tamaño: ' . round($resultado['success']['tamaño']/1024, 2) . ' KB<br>';
                echo 'Tipo: ' . $resultado['success']['tipo'] . '<br>';
                echo 'Nombre en servidor: ' . $resultado['success']['nombre_servidor'];
                echo '</div>';
                
                $archivosSubidos[] = $resultado['success'];
            } elseif (isset($resultado['error'])) {
                echo '<div class="error">❌ Error: ' . $resultado['error'] . '</div>';
            }
        } else {
            echo '<div class="warning">⚠️ No se seleccionó archivo único</div>';
        }

        // Procesar múltiples archivos (array)
        echo '<h3>2. Múltiples archivos (array):</h3>';
        if (!empty($_FILES['archivos_multiple']['name'][0])) {
            $totalArchivos = count($_FILES['archivos_multiple']['name']);
            $subidosExitosos = 0;
            
            for ($i = 0; $i < $totalArchivos; $i++) {
                if ($_FILES['archivos_multiple']['error'][$i] === UPLOAD_ERR_OK) {
                    $archivoIndividual = [
                        'name' => $_FILES['archivos_multiple']['name'][$i],
                        'type' => $_FILES['archivos_multiple']['type'][$i],
                        'tmp_name' => $_FILES['archivos_multiple']['tmp_name'][$i],
                        'error' => $_FILES['archivos_multiple']['error'][$i],
                        'size' => $_FILES['archivos_multiple']['size'][$i]
                    ];
                    
                    $resultado = procesarArchivo("archivos_multiple[$i]", $archivoIndividual, $uploadDir, $allowedTypes, $maxFileSize);
                    
                    if (isset($resultado['success'])) {
                        echo '<div class="success">✅ Archivo ' . ($i+1) . ': ' . $resultado['success']['nombre_original'] . '</div>';
                        $archivosSubidos[] = $resultado['success'];
                        $subidosExitosos++;
                    } elseif (isset($resultado['error'])) {
                        echo '<div class="error">❌ Error en archivo ' . ($i+1) . ': ' . $resultado['error'] . '</div>';
                    }
                }
            }
            
            echo '<div class="file-info">Total de archivos en array: ' . $totalArchivos . '<br>';
            echo 'Subidos exitosamente: ' . $subidosExitosos . '</div>';
        } else {
            echo '<div class="warning">⚠️ No se seleccionaron múltiples archivos</div>';
        }

        // Procesar archivos individuales específicos
        echo '<h3>3. Archivos específicos individuales:</h3>';
        
        $archivosEspecificos = ['foto_perfil', 'documento_identidad', 'curriculum'];
        
        foreach ($archivosEspecificos as $archivo) {
            echo '<h4>' . ucfirst(str_replace('_', ' ', $archivo)) . ':</h4>';
            
            if (!empty($_FILES[$archivo]['name'])) {
                $resultado = procesarArchivo($archivo, $_FILES[$archivo], $uploadDir, $allowedTypes, $maxFileSize);
                
                if (isset($resultado['success'])) {
                    echo '<div class="success">✅ Archivo subido: ' . $resultado['success']['nombre_original'] . '</div>';
                    
                    // Mostrar previsualización para imágenes
                    if (in_array($resultado['success']['extension'], ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo '<img src="' . $resultado['success']['ruta'] . '" alt="Previsualización" class="file-preview">';
                    }
                    
                    $archivosSubidos[] = $resultado['success'];
                } elseif (isset($resultado['error'])) {
                    echo '<div class="error">❌ Error: ' . $resultado['error'] . '</div>';
                }
            } else {
                echo '<div class="warning">⚠️ No se seleccionó archivo</div>';
            }
        }

        // Resumen final
        echo '<h2>📋 Resumen de la subida:</h2>';
        if (!empty($archivosSubidos)) {
            echo '<div class="success">✅ Total de archivos subidos exitosamente: ' . count($archivosSubidos) . '</div>';
            
            echo '<div class="uploaded-files">';
            foreach ($archivosSubidos as $archivo) {
                echo '<div class="file-info" style="margin: 5px; padding: 10px; min-width: 200px;">';
                echo '<strong>' . $archivo['nombre_original'] . '</strong><br>';
                echo 'Tamaño: ' . round($archivo['tamaño']/1024, 2) . ' KB<br>';
                echo 'Tipo: ' . $archivo['extension'] . '<br>';
                echo '<small>' . $archivo['nombre_servidor'] . '</small>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<div class="warning">⚠️ No se subió ningún archivo</div>';
        }

        // Información del servidor
        echo '<h2>⚙️ Configuración del servidor:</h2>';
        echo '<div class="file-info">';
        echo '<strong>Límites de subida:</strong><br>';
        echo 'upload_max_filesize: ' . ini_get('upload_max_filesize') . '<br>';
        echo 'post_max_size: ' . ini_get('post_max_size') . '<br>';
        echo 'max_file_uploads: ' . ini_get('max_file_uploads') . '<br>';
        echo 'Directorio temporal: ' . ini_get('upload_tmp_dir') ?: sys_get_temp_dir();
        echo '</div>';
        ?>

        <div style="margin-top: 30px; text-align: center;">
            <a href="formulario_archivos.html" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">← Volver al formulario</a>
        </div>
    </div>
</body>
</html>
