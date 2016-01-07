<?php

require_once "class/Usuario.php";
session_start();

if (isset($_SESSION["user"])) {

    $user = $_SESSION['user'];

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        include "vistas/formlogin.php";
    } else {

        if (isset($_POST['newLiga'])) {
            $view = "partida";
            include 'vistas/partida.php';
        } else {
            if (isset($_POST['recuperaXML'])) {
                $view = "xml";
                include 'vistas/xml.php';
            } else {
                if (isset($_POST['recupera'])) {
                    $view = "partida";
                    include 'vistas/partida.php';
                } else {
                    $partida = $_SESSION['partida'];
                    if (isset($_POST['volver'])) {
                        $view = "lista";
                        include 'vistas/lista.php';
                    } else {
                        if (isset($_POST['enviaLetra'])) {
                            $view = "perdida";
                            include 'vistas/perdida.php';
                        } else {
                            $view = "lista";
                            include 'vistas/lista.php';
                        }
                    }
                }
            }
        }
    }
} else {
//NO REGISTRADO

    if (isset($_POST["formlogin"])) {
        include "vistas/formlogin.php";
    } else {
        if (isset($_POST["login"])) {

//INTENTO LOGIN

            $user = Usuario::getUsuario($_POST["user"], $_POST["pass"]);
            if ($user) {
                $_SESSION["user"] = $user;
                $view = "ligas";
                include "vistas/ligas.php";
            } else {
                $msg = "Credenciales incorrectas";
                include "vistas/formlogin.php";
            }
        } else {
            if (isset($_POST["botonlogin"])) {
                $user = Usuario::getUsuario($_POST["user"], $_POST["pass"]);
                if ($user) {
                    $_SESSION["user"] = $user;
                    $view = "ligas";
                    include "vistas/ligas.php";
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