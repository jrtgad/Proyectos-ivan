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
                $jornada = $liga->getJornadas()->getByProperty("id", $_POST['borrar']);

                $partidos = $jornada->getPartidos();

                $actual = $partidos->iterate();
                while ($actual) {
                    $actual->setGolL(null);
                    $actual->setGolV(null);
                    $actual->persist();
                    $actual = $partidos->iterate();
                }
                $jornada->setState("0");
                $jornada->persist();
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
                        //id jornada
                        $jornada = $liga->getJornadas()->getByProperty("id", $_POST['modificado']);

                        $partidos = $jornada->getPartidos();
                        $actual = $partidos->iterate();
                        $resultados = $_POST['resultado'];

                        while ($actual) {
                            $resultado = $resultados[$actual->getId()];
                            $actual->setGolL($resultado['local']);
                            $actual->setGolV($resultado['visitante']);
                            $actual->persist();
                            $actual = $partidos->iterate();
                        }
                        $jornada->setState("1");
                        $jornada->persist();
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

                                $equipos = $liga->getEquipos();
                                foreach ($equipos as $eq) {
                                    $eq->setPuntos(0);
                                    $eq->setGolesF(0);
                                    $eq->setGolesC(0);
                                }

                                $jornadas = [];
                                $actual = $liga->getJornadas()->iterate();
                                while ($actual) {
                                    $jornadas[] = $actual;
                                    $actual = $liga->getJornadas()->iterate();
                                }

                                foreach ($jornadas as $jornada) {
                                    if ($jornada->getState() === "1") {
                                        $partidoActual = $jornada->getPartidos()->iterate();

                                        while ($partidoActual) {
                                            foreach ($liga->getEquipos() as $equipo) {

                                                //$equipo es local
                                                if ($partidoActual->getEquipoL() === $equipo->getEquipo()) {
                                                    $equipo->setGolesF($equipo->getGolesF() + $partidoActual->getGolL());
                                                    $equipo->setGolesC($equipo->getGolesC() + $partidoActual->getGolV());
                                                    if ($partidoActual->getGolL() > $partidoActual->getGolV()) {
                                                        $equipo->setPuntos($equipo->getPuntos() + 3);
                                                    } else {
                                                        if ($partidoActual->getGolL() === $partidoActual->getGolV()) {
                                                            $equipo->setPuntos($equipo->getPuntos() + 1);
                                                        }
                                                    }
                                                } else {

                                                    //$equipo es visitante
                                                    if ($partidoActual->getEquipoV() === $equipo->getEquipo()) {

                                                        $equipo->setGolesF($equipo->getGolesF() + $partidoActual->getGolV());
                                                        $equipo->setGolesC($equipo->getGolesC() + $partidoActual->getGolL());
                                                        if ($partidoActual->getGolV() > $partidoActual->getGolL()) {
                                                            $equipo->setPuntos($equipo->getPuntos() + 3);
                                                        } else {
                                                            if ($partidoActual->getGolL() === $partidoActual->getGolV()) {
                                                                $equipo->setPuntos($equipo->getPuntos() + 1);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            $partidoActual = $jornada->getPartidos()->iterate();
                                        }
                                    }
                                }
                                $view = "clasificacion";
                                include 'vistas/clasificacion.php';
                            } else {
                                if (isset($_POST["xml"])) {
                                    $liga = $_SESSION["liga"];
                                    $equipos = $liga->getEquipos();
                                    $view = "xml";
                                    include "vistas/xml.php";
                                } else {
                                    $view = "formlogin";
                                    include 'vistas/formlogin.php';
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