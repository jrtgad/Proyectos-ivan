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
        if ($user->getRol() === "admin") {

//ADMIN
//formulario de añadir usuario

            if (isset($_POST["alta"])) {
                $user = $_SESSION["user"];
                $view = "alta";
                include "vistas/alta.php";
            } else {
//Añadir usuario a la bbdd
                if (isset($_POST['altauser'])) {
                    $newUser = Usuario::getUsuario($_POST['user'], $_POST['pass']);
                    if (!$newUser) {
                        $newUser = new Usuario($_POST['user'], $_POST['pass'], "usuario");
                        $newUser->persist();
                        $msg = "Usuario creado";
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
        } else {
//NO ES ADMIN
            $juegos = $user->getPartidas();

            if (isset($_POST['newPartida'])) {
                $partida = $user->nuevaPartida();
                $_SESSION['partida'] = $partida;
                $view = "partida";
                include 'vistas/partida.php';
            } else {
                if (isset($_POST['recuperaXML'])) {
                    if (isset($_POST["checkboxes"])) {
                        $arrayXml = $_POST['checkboxes'];
                        $view = "xml";
                        include 'vistas/xml.php';
                    } else {
                        $_SESSION["msgXML"] = "No ha seleccionado ninguna partida";
                        include 'vistas/lista.php';
                    }
                } else {
                    $_SESSION['user'] = $user;

                    if (isset($_POST['recupera'])) {
                        if (isset($_POST['idPartida'])) {
                            $partida = $user->getPartidas()->getByProperty("_IdPartida", $_POST['idPartida']);
                            $_SESSION['partida'] = $partida;
                            $view = "partida";
                            include 'vistas/partida.php';
                        } else {
                            $_SESSION["msgRecupera"] = "No ha seleccionado ninguna partida";
                            include 'vistas/lista.php';
                        }
                    } else {
                        if (isset($_POST['volver'])) {
                            $_SESSION['partida']->persist();
                            $juegos = $user->getPartidas();
                            $view = "lista";
                            include 'vistas/lista.php';
                        } else {
                            if (isset($_POST["volverXML"])) {
                                $juegos = $user->getPartidas();
                                $view = "lista";
                                include 'vistas/lista.php';
                            } else {
                                if (isset($_POST['enviaLetra'])) {
                                    $partida = $_SESSION['partida'];
                                    $partida->compruebaJugada($_POST['letra']);
                                    if ((int) $partida->getFallos() > 10) {
                                        $partida->setFinalizada(1);
                                        $partida->persist();
                                        $view = "perdida";
                                        include 'vistas/perdida.php';
                                    } else {
                                        if ($partida->getPalabradescubierta() === $partida->getPalabrasecreta()) {
                                            $partida->setFinalizada(1);
                                            $partida->persist();
                                            $view = "ganada";
                                            include 'vistas/ganada.php';
                                        } else {
                                            $view = "partida";
                                            $partida->persist();
                                            include 'vistas/partida.php';
                                        }
                                    }
                                } else {
                                    $view = "lista";
                                    include 'vistas/lista.php';
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
                if ($user->getRol() === "admin") {
                    $_SESSION["user"] = $user;
                    $view = "admin";
                    include "vistas/admin.php";
                } else {
                    $_SESSION["user"] = $user;
                    $view = "lista";
                    include "vistas/lista.php";
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
