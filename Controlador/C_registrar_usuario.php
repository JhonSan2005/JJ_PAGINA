<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("../Modelo/Login.php");

// Verificar si se han enviado los datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí debes obtener los datos del formulario y pasarlos a la función registeruser
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];



    $registro_exitoso = Login::registerUser($documento,$nombre, $correo, $password);

    if ($registro_exitoso) {
        // Redirigir a alguna página de éxito
        header("location: ../Vista/index.php");
    } else {
        // Manejar el caso de registro fallido
        echo "Error al registrar el usuario.";
    }
} else {
    // Cargar la vista de registro si no se han enviado datos
    header("location: ../Controladores/controlador.php?seccion=seccion2");
}
?>
