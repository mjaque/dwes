<?php
class FileUploader {
    private $uploadDir;
    private $allowedTypes;
    private $maxFileSize;
    private $errors = [];

    public function __construct($uploadDir = 'uploads/', $allowedTypes = [], $maxFileSize = 2097152) {
        $this->uploadDir = rtrim($uploadDir, '/') . '/';
        $this->allowedTypes = $allowedTypes ?: ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt'];
        $this->maxFileSize = $maxFileSize;
        
        // Crear directorio si no existe
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }
    }

    public function upload($fileField) {
        if (!isset($_FILES[$fileField])) {
            $this->errors[] = "Campo de archivo '$fileField' no existe";
            return false;
        }

        $file = $_FILES[$fileField];

        // Manejar múltiples archivos
        if (is_array($file['name'])) {
            return $this->uploadMultiple($fileField);
        }

        return $this->processSingleFile($file);
    }

    private function uploadMultiple($fileField) {
        $results = [];
        $fileCount = count($_FILES[$fileField]['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            if ($_FILES[$fileField]['error'][$i] === UPLOAD_ERR_NO_FILE) {
                continue;
            }

            $singleFile = [
                'name' => $_FILES[$fileField]['name'][$i],
                'type' => $_FILES[$fileField]['type'][$i],
                'tmp_name' => $_FILES[$fileField]['tmp_name'][$i],
                'error' => $_FILES[$fileField]['error'][$i],
                'size' => $_FILES[$fileField]['size'][$i]
            ];

            $result = $this->processSingleFile($singleFile);
            if ($result) {
                $results[] = $result;
            }
        }

        return $results;
    }

    private function processSingleFile($file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->errors[] = $this->getUploadError($file['error']);
            return false;
        }

        // Validar tamaño
        if ($file['size'] > $this->maxFileSize) {
            $this->errors[] = "Archivo demasiado grande: " . $file['name'];
            return false;
        }

        // Validar tipo
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $this->allowedTypes)) {
            $this->errors[] = "Tipo de archivo no permitido: " . $file['name'];
            return false;
        }

        // Generar nombre único
        $newFilename = uniqid() . '_' . time() . '.' . $extension;
        $destination = $this->uploadDir . $newFilename;

        // Mover archivo
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'original_name' => $file['name'],
                'saved_name' => $newFilename,
                'path' => $destination,
                'size' => $file['size'],
                'type' => $file['type'],
                'extension' => $extension
            ];
        } else {
            $this->errors[] = "Error al mover el archivo: " . $file['name'];
            return false;
        }
    }

    private function getUploadError($errorCode) {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'Archivo excede el tamaño máximo del servidor',
            UPLOAD_ERR_FORM_SIZE => 'Archivo excede el tamaño máximo del formulario',
            UPLOAD_ERR_PARTIAL => 'El archivo fue solo parcialmente subido',
            UPLOAD_ERR_NO_FILE => 'No se seleccionó ningún archivo',
            UPLOAD_ERR_NO_TMP_DIR => 'Falta directorio temporal',
            UPLOAD_ERR_CANT_WRITE => 'Error al escribir en disco',
            UPLOAD_ERR_EXTENSION => 'Subida detenida por extensión'
        ];

        return $errors[$errorCode] ?? 'Error desconocido';
    }

    public function getErrors() {
        return $this->errors;
    }

    public function hasErrors() {
        return !empty($this->errors);
    }
}
