<?php

require_once 'class/Usuario.php';
require_once 'class/Pintor.php';
session_start();

if (isset($_SESSION['user'])) {
    if (isset($_POST['botonlogout'])) {
        session_unset();
        session_destroy();
        $view = "login";
        include "vistas/formlogin.php";
    } else {
        if (isset($_POST['botonbaja'])) {
            $user = $_SESSION['user'];
            $user->deleteUser();
            session_unset();
            session_destroy();
            $view = "login";
            include "vistas/formlogin.php";
        } else {
            $user = $_SESSION['user'];
            $view = "content";
            include 'vistas/content.php';
        }
    }
} else {
    if (isset($_POST['botonregistro'])) {
        $view = "registro";
        include "vistas/registro.php";
    } else {
        if (isset($_POST['botonRegistrarse'])) {
            $user = new Usuario($_POST['userReg'], $_POST['mailReg'], $_POST['passReg'], $_POST['pintores']);
            if ($user->registerUser()) {
                $msg = "Usuario registrado";
                $_SESSION['user'] = $user;
                $view = "content";
                include "vistas/content.php";
            } else {
                $msg = "Ha habido un fallo al registrar usuario";
                $view = "login";
                include "vistas/formlogin.php";
            }
        } else {
            if (isset($_POST['botonlogin'])) {
                $user = Usuario::getUsuario($_POST['user'], $_POST['pass']);
                if ($user) {
                    $_SESSION['user'] = $user;
                    $view = "content";
                    include "vistas/content.php";
                } else {
                    $msg = "Credenciales incorrectas";
                    $view = "login";
                    include "vistas/formlogin.php";
                }
            } else {
                $view = "login";
                include "vistas/formlogin.php";
            }
        }
    }
}
?>