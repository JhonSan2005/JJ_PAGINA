<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("../Modelo/starUser.php");

// Verificar si se han enviado los datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí debes obtener los datos del formulario de inicio de sesión
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Intentar iniciar sesión
    $login_exitoso = starUser::loginUser($correo, $password);

    if ($login_exitoso) {
        // Redirigir a alguna página de éxito
        header("location: ../Vista/pagina_de_inicio.php");
    } else {
        // Manejar el caso de inicio de sesión fallido
        echo "Correo o contraseña incorrectos.";
    }
} else {
    // Cargar la vista de inicio de sesión si no se han enviado datos
    header("location: ../Vista/formulario_de_inicio.php");
}
?>
