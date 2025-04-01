<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Alejandro Sanahuja Benitez">
    <title>portal web de pruevas</title>
    <link rel="shortcut icon" href="../img/favicon.ico" alt="">
    <title>Contacto - Cimientos & Sueños Inmobiliaria</title>
    <style>
        .contact-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            border-color: #ff0000;
        }
        .error-message {
            color: #ff0000;
            font-size: 0.8em;
            display: none;
        }
        .submit-btn {
            background-color: #2a5d84;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .submit-btn:hover {
            background-color: #1e4563;
        }
        .home-btn {
            display: inline-block;
            background-color: #666;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .home-btn:hover {
            background-color: #4d4d4d;
        }
        h2 {
            color: #2a5d84;
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <div class="contact-form">
        <a href="../Index.php" class="home-btn">Inicio</a>
        <h2>Cimientos & Sueños<br>Inmobiliaria</h2>
        <form action="/enviar" method="POST" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="nombre">Nombre completo *</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="dni">DNI/NIE *</label>
                <input type="text" id="dni" name="dni" required placeholder="Ej: 12345678Z">
                <span id="dni-error" class="error-message">Por favor, introduce un DNI válido (8 números y 1 letra)</span>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono">
            </div>

            <div class="form-group">
                <label for="tipo">Estoy interesado en:</label>
                <select id="tipo" name="tipo">
                    <option value="compra">Compra de propiedad</option>
                    <option value="venta">Venta de propiedad</option>
                    <option value="alquiler">Alquiler</option>
                    <option value="tasacion">Tasación</option>
                </select>
            </div>

            <div class="form-group">
                <label for="presupuesto">Presupuesto aproximado</label>
                <input type="number" id="presupuesto" name="presupuesto" step="1000">
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Enviar consulta</button>
        </form>
    </div>

    <script>
        function validarDNI(dni) {
            const dniRegex = /^\d{8}[A-Z]$/;
            if (!dniRegex.test(dni)) return false;

            const letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            const numeros = dni.substring(0, 8);
            const letra = dni.substring(8, 9);
            const calculo = parseInt(numeros) % 23;
            const letraCorrecta = letras.charAt(calculo);

            return letra === letraCorrecta;
        }

        function validarFormulario() {
            const dniInput = document.getElementById('dni');
            const dniError = document.getElementById('dni-error');
            const dni = dniInput.value.toUpperCase();

            if (!validarDNI(dni)) {
                dniInput.classList.add('error');
                dniError.style.display = 'block';
                return false;
            } else {
                dniInput.classList.remove('error');
                dniError.style.display = 'none';
                return true;
            }
        }

        document.getElementById('dni').addEventListener('input', function() {
            const dniInput = this;
            const dniError = document.getElementById('dni-error');
            
            if (this.value.length > 0 && !validarDNI(this.value.toUpperCase())) {
                dniInput.classList.add('error');
                dniError.style.display = 'block';
            } else {
                dniInput.classList.remove('error');
                dniError.style.display = 'none';
            }
        });
    </script>
</body>
</html>