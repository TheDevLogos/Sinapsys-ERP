<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/modulo/session/session_start.php'; 
checkToken();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include 'preloader.php' ?>

    <?php include 'modulo/header/models.php'; ?>

    <!-- Contenedor con margen superior de 7cm -->
    <div style="width: 70%; margin: 5cm 0 0 0;">
        <img src="assets/image/sedmun.gif" alt="Logo Sedmun" 
             style="display: block; margin-left: auto; margin-right: 80px; max-width: 450px; height: auto;">
    </div>

</body>
</html>