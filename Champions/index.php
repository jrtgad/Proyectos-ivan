<?php

require_once "class/Usuario.php";
require_once "class/Liga.php";

session_start();
$msg = "";

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

            $liga->setJornadas(Jornada::getJornadas());

            $_SESSION['liga'] = $liga;
            $view = "menu";
            include 'vistas/menu.php';
        } else {
            $liga = $_SESSION['liga'];
            if (isset($_POST['borrar'])) {
                $liga->borraJornada($_POST["borrar"]);

                $msg = "Jornada borrada";
                $view = "menu";
                include "vistas/menu.php";
            } else {
                if (isset($_POST['modificar'])) {
                    //Id jornada
                    $jornada = $liga->getJornadas()->getByProperty("id", $_POST['modificar']);

                    $view = "partido";
                    include 'vistas/partido.php';
                } else {
                    if (isset($_POST['modificado'])) {
                        $liga->modificaJornada($_POST['modificado'], $_POST["resultado"]);
                        //var_dump($_SESSION["user"]);
                        $msg = "Jornada modificada";
                        $view = "menu";
                        include "vistas/menu.php";
                    } else {
                        if (isset($_POST['menu'])) {
                            $view = "menu";
                            include "vistas/menu.php";
                        } else {
                            if (isset($_POST['clasificacion'])) {
                                $liga = $_SESSION['liga'];
                                $liga->generaClasificacion();
                                $view = "clasificacion";
                                include 'vistas/clasificacion.php';
                            } else {
                                if (isset($_POST["xml"])) {
                                    $liga = $_SESSION["liga"];
                                    $equipos = $liga->getEquipos();
                                    $view = "xml";
                                    include "vistas/xml.php";
                                } else {
                                    $view = "menu";
                                    include 'vistas/menu.php';
                                }
                            }
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

                $liga = new Liga();
                $liga->setJornadas(Jornada::getJornadas());

                if ($liga->getJornadas()->isEmpty()) {
                    $view = "creaLiga";
                    include "vistas/creaLiga.php";
                } else {
                    //Array de equipos
                    $liga->setEquipos(Equipo::getEquipos());

                    $_SESSION['liga'] = $liga;
                    $view = "menu";
                    include "vistas/menu.php";
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
?>