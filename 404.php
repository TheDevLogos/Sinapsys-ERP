<?php
$configPath = __DIR__ . '/data/config.php';
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
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/error404.css">
    <title>404 - Página no encontrada</title>
</head>
<body>
    <div class="error-container">
        <div class="logo-container">
            <a href="<?php echo BASE_URL;?>/routes.php?page=index">
                <img src="<?php echo BASE_URL;?>/assets/image/Logo_IMPLAN_FondoPositivo.png" alt="Logo IMPLAN" class="logo-image">
            </a>
        </div>
        <div class="form-container">

            <h1>404 - Página no encontrada</h1>
            <p>Lo sentimos, la página que intentas acceder no existe.</p>
            <p>Por favor, seleccione el logotipo del IMPLAN</p>
        </div>
    </div>

</body>
</html>
