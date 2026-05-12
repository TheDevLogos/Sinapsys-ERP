<?php
$configPath = __DIR__ . '/../data/config.php';
if (file_exists($configPath)) {
    include $configPath;
} else {
    die("Error: No se pudo encontrar el archivo de configuración.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/login.css">
</head>
<body>

    <style>
        .denied-container {
            display: flex;
            align-items: center; /* Centra verticalmente el logo y el formulario */
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px; /* Ajusta el ancho máximo del contenedor */
            padding: 20px;
        }

        .denied-container {
            flex: 1; /* Ocupa el espacio disponible a la izquierda */
            display: flex;
            align-items: center; /* Centra verticalmente el logo */
        }
    </style>

    <div class="denied-container">
        <div class="logo-container">
            <a href="<?php echo BASE_URL;?>/routes.php?page=index">
                <img src="<?php echo BASE_URL;?>/assets/image/Logo_IMPLAN _Fondo positivo.png" alt="Logo IMPLAN" class="logo-image">
            </a>
        </div>
        <div class="form-container">
            <h1>Acceso denegado: La credencial del usuario no es suficiente.</h1>
        </div>
    </div>
    
</body>
</html>