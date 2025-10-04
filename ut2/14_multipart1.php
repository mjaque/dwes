<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida Múltiple de Archivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .file-info {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }
        .multiple-files {
            border: 2px dashed #007bff;
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>📁 Formulario Multipart - Subida de Archivos</h2>
        
        <form action="procesar_archivos.php" method="POST" enctype="multipart/form-data">
            
            <!-- Datos del usuario -->
            <div class="form-group">
                <label for="nombre">Nombre del usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Archivo único -->
            <div class="form-group">
                <label for="archivo_single">Archivo único (máx. 2MB):</label>
                <input type="file" id="archivo_single" name="archivo_single" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                <div class="file-info">Formatos permitidos: JPG, PNG, PDF, DOC (Máximo 2MB)</div>
            </div>

            <!-- Múltiples archivos - Campo array -->
 y características de los formularios por POST.                <label for="archivos_multiple">Múltiples archivos (hasta 5):</label>
                <input type="file" id="archivos_multiple" name="archivos_multiple[]" multiple 
                       accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.txt">
                <div class="file-info">Puede seleccionar varios archivos manteniendo presionada la tecla Ctrl</div>
            </div>

            <!-- Múltiples campos de archivo individuales -->
            <div class="form-group multiple-files">
                <label>Archivos específicos (cada uno individual):</label>
                
                <div style="margin-bottom: 10px;">
                    <label for="foto_perfil">Foto de perfil:</label>
                    <input type="file" id="foto_perfil" name="foto_perfil" accept=".jpg,.jpeg,.png">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="documento_identidad">Documento de identidad:</label>
                    <input type="file" id="documento_identidad" name="documento_identidad" accept=".pdf,.jpg,.jpeg">
                </div>

                <div>
                    <label for="curriculum">Currículum vitae:</label>
                    <input type="file" id="curriculum" name="curriculum" accept=".pdf,.doc,.docx">
                </div>
            </div>

            <!-- Categoría para organizar archivos -->
            <div class="form-group">
                <label for="categoria">Categoría de los archivos:</label>
                <select id="categoria" name="categoria">
                    <option value="personal">Personal</option>
                    <option value="trabajo">Trabajo</option>
                    <option value="estudio">Estudio</option>
                    <option value="otros">Otros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción de los archivos:</label>
                <textarea id="descripcion" name="descripcion" rows="3" 
                          placeholder="Describe brevemente el contenido de los archivos..."></textarea>
            </div>

            <button type="submit">📤 Subir Archivos</button>
        </form>

        <div style="margin-top: 20px; padding: 15px; background-color: #e9ecef; border-radius: 5px;">
            <h4>💡 Información sobre formularios multipart:</h4>
            <ul>
                <li><strong>enctype="multipart/form-data"</strong> es obligatorio para subir archivos</li>
                <li>Los archivos se almacenan temporalmente en el servidor</li>
                <li>Límite máximo configurado en php.ini: upload_max_filesize y post_max_size</li>
                <li>Los archivos se acceden mediante $_FILES en PHP</li>
            </ul>
        </div>
    </div>
</body>
</html>
