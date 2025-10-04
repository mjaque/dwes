<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario POST - Ejemplo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
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
            margin-bottom: 15px;
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
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Formulario de Registro</h2>
        <form action="13_post2.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="1" max="120">
            </div>

            <div class="form-group">
                <label for="pais">País:</label>
                <select id="pais" name="pais">
                    <option value="">Selecciona un país</option>
                    <option value="MX">México</option>
                    <option value="ES">España</option>
                    <option value="AR">Argentina</option>
                    <option value="CO">Colombia</option>
                    <option value="OT">Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label>Género:</label>
                <div>
                    <input type="radio" id="masculino" name="genero" value="M">
                    <label for="masculino" style="display: inline; margin-right: 15px;">Masculino</label>
                    
                    <input type="radio" id="femenino" name="genero" value="F">
                    <label for="femenino" style="display: inline; margin-right: 15px;">Femenino</label>
                    
                    <input type="radio" id="otro" name="genero" value="O">
                    <label for="otro" style="display: inline;">Otro</label>
                </div>
            </div>

            <div class="form-group">
                <label>Intereses:</label>
                <div>
                    <input type="checkbox" id="programacion" name="intereses[]" value="programacion">
                    <label for="programacion" style="display: inline; margin-right: 15px;">Programación</label>
                    
                    <input type="checkbox" id="diseno" name="intereses[]" value="diseno">
                    <label for="diseno" style="display: inline; margin-right: 15px;">Diseño</label>
                    
                    <input type="checkbox" id="marketing" name="intereses[]" value="marketing">
                    <label for="marketing" style="display: inline;">Marketing</label>
                </div>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4"></textarea>
            </div>

            <button type="submit">Enviar Formulario</button>
        </form>
    </div>
</body>
</html>
