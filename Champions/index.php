<?php

require_once "class/Usuario.php";
require_once "class/Liga.php";
session_start();

/* function separaEquipos($equipos) {
  return explode(",", $equipos);
  } */

if (isset($_SESSION["user"])) {

    $user = $_SESSION['user'];

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        include "vistas/formlogin.php";
    } else {
        if (isset($_POST['creaLiga'])) {
            $liga = new Liga();
            $equipos = explode(",", $_POST['equiposString']);
            $liga->generaLiga($equipos);
            $view = "menu";
            include 'vistas/menu.php';
        } else {
            $view = "formlogin";
            include 'vistas/formlogin.php';
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
                $view = "creaLiga";
                include "vistas/creaLiga.php";
            } else {
                $msg = "Credenciales incorrectas";
                include "vistas/formlogin.php";
            }
        } else {
            if (isset($_POST["botonlogin"])) {
                $user = Usuario::getUsuario($_POST["user"], $_POST["pass"]);
                if ($user) {
                    $_SESSION["user"] = $user;
                    $liga = Liga::getLiga();
                    if ($liga) {
                        $view = "menu";
                        include "vistas/menu.php";
                    } else {
                        $view = "creaLiga";
                        include "vistas/creaLiga.php";
                    }
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