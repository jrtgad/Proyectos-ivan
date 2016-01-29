<?php

session_start();

//LOGGED
if (isset($_SESSION["user"])) {

} else {



//NOT LOGGED
    if (isset($_POST["login"])) {
        $user = Usuario::getUserById($_POST['user'], $_POST['pass']);
        if ($user) {
            $_SESSION["user"] = $user;
            $view = "menu";
            include 'vistas/menu.php';
        }
        $_SESSION["errorLogin"] = "Ha introducido datos incorrectos";
        include 'vistas/formlogin.php';
    } else {
        if (isset($_POST["registrarse"])) {
            $view = "registro";
            include "vistas/registro.php";
        } else {
            if (isset($_POST["botonRegistro"])) {
                if (Usuario::getUserById($_POST['user'], $_POST['pass'])) {
                    $_SESSION["repetido"] = "El usuario ya existe en la base de datos";
                    include 'vistas/formlogin.php';
                } else {
                    $user = new Usuario($_POST["user"], $_POST["pass"]);
                }
            } else {

            }
        }
    }
}
?>
