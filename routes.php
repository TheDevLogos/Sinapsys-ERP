<?php
$configPath = __DIR__ . '/data/config.php';
if (file_exists($configPath)) {
    include $configPath;
} else {
    die("Error: No se pudo encontrar el archivo de configuración.");
}
?>
<?php
$rutas = [
    'index' => BASE_URL,

    'login' => 'modulo/login/login.php',
    'logout' => 'modulo/login/logout.php',

    'ICU' => 'modulo/view/ICU.php',
    'GDM' => 'modulo/view/GDM.php',
    'statusMIR' => 'modulo/view/statusMIR.php',
    'ods2030' => 'modulo/view/ods2030.php',
    'PMTODU' => 'modulo/view/PMTODU.php',

    'ASM' => 'modulo/user/ASM.php',
    'RAT' => 'modulo/user/AvanceTrimestral.php',
    'HRAT' => 'modulo/admin/DUAM_registroTreimestre.php',

    'ASM_modify' => 'modulo/admin/ASM_modify.php',
    'ASM_avance' => 'modulo/admin/ASM_avance.php',
    'GDM_modify' => 'modulo/admin/GDM_modify.php',
    'ICU_modify' => 'modulo/admin/ICU_modify.php',
    'DUAM_modify' => 'modulo/admin/DUAM_modify.php',
    'ods2030_modify' => 'modulo/admin/ods2030_modify.php',
    'PMTODU_modify' => 'modulo/admin/PMTODU_modify.php',

    'reporte' => 'modulo/user/reporte.php',
    
    'update' => 'modulo/admin/update.php',

    'config' => 'modulo/config/configuracion.php',
    'profile' => 'modulo/config/perfil.php'
];

// Obtener el parámetro 'page'
$page = isset($_GET['page']) ? $_GET['page'] : 'default';

// Redireccionar si la página existe en el array
if (array_key_exists($page, $rutas)) {
    header('Location: ' . $rutas[$page]);
    exit();
}
?>