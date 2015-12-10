<?php

require_once "class/Usuario.php";

session_start();

if (isset($_SESSION['user'])) {

//REGISTRADO

    $user = $_SESSION['user'];

    if ($user->getRol() === "admin") {

//ADMIN

        if (isset($_POST['botonlogout'])) {
            session_unset();
            session_destroy();
            include "vistas/formlogin.php";
        } else {
            //formulario de añadir usuario
            if (isset($_POST['alta'])) {
                $user = $_SESSION['user'];
                $view = "alta";
                include "vistas/alta.php";
            } else {
                //Añadir usuario a la bbdd
                if (isset($_POST['altauser'])) {
                    $user = Usuario::getUsuario($_POST['user'], $_POST['pass']);
                    if (!$user) {
                        $newUser = new Usuario($_POST['user'], $_POST['pass'],null,null,"usuario");
                        $newUser->persist();
                        $view = "admin";
                        include "vistas/admin.php";
                    } else {
                        $msg = "El usuario ya existe";
                        $view = "admin";
                        include "vistas/admin.php";
                    }
                } else {
                    $view = "admin";
                    include 'vistas/admin.php';
                }
            }
        }
    } else {

//NO ES ADMIN
        if (isset($_POST['botonlogout'])) {
            session_unset();
            session_destroy();
            $view = "login";
            include "vistas/formlogin.php";
        } else {

        }
    }
} else {

//NO REGISTRADO

    if (isset($_POST['formlogin'])) {
        $view = "login";
        include "vistas/formlogin.php";
    } else {
        if (isset($_POST['login'])) {

//INTENTO LOGIN

            $user = Usuario::getUsuario($_POST['user'], $_POST['pass']);
            if ($user) {
                if ($user->getRol() === "admin") {
                    $_SESSION['user'] = $user;
                    $view = "admin";
                    include "vistas/admin.php";
                } else {
                    $_SESSION['user'] = $user;
                    $view = "lista";
                    include "vistas/lista.php";
                }
            } else {
                $msg = "Credenciales incorrectas";
                include "vistas/formlogin.php";
            }
        } else {
            if (isset($_POST['botonlogin'])) {
                $user = Usuario::getUsuario($_POST['user'], $_POST['pass']);
                if ($user) {
                    $_SESSION['user'] = $user;
                    $view = "lista";
                    include "vistas/lista.php";
                } else {
                    $msg = "Credenciales incorrectas";
                    include "vistas/formlogin.php";
                }
            } else {
                include "vistas/formlogin.php";
            }
        }
    }
}
?>