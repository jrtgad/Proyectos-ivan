<?php

    include "class/Usuario.php";
    session_start();

//LOGGED
    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
        if (isset($_POST["logout"])) {
            session_unset();
            session_destroy();
            include "vistas/formlogin.php";
        } else {
            if (isset($_POST["agrega"])) {
                $user = $_SESSION["user"];
                $view = "agregar";
                include "vistas/agrega.php";
            } else {
                if (isset($_POST["agregado"])) {
                    $contacto = $user->addContacto($_POST["name"], $_POST["apellidos"], $_POST["tf1"], $_POST["tf2"], $_POST["direccion"]);
                    $msg = "Contacto agregado";
                    $view = "menu";
                    include "vistas/menu.php";
                } else {
                    if (isset($_POST["borra"])) {
                        if(isset($_POST["checkbox"])) {
                            $user->removeContact($_POST["checkbox"]);
                            $view = "menu";
                            include 'vistas/menu.php';
                        } else {
                            $msg = "No ha seleccionado ningún contacto";
                            $view = "menu";
                            include 'vistas/menu.php';
                        }
                    } else {
                        $view = "menu";
                        include "vistas/menu.php";
                    }
                }
            }
        }
    } else {
        if (isset($_POST["login"])) {
            $user = Usuario::getUserByCredentials($_POST['user'], $_POST['pass']);
            if ($user) {
                $_SESSION["user"] = $user;
                $view = "menu";
                include 'vistas/menu.php';
            } else {
                $msg = "Ha introducido datos incorrectos";
                include 'vistas/formlogin.php';
            }
        } else {
            if (isset($_POST["registrarse"])) {
                $view = "registro";
                include "vistas/registro.php";
            } else {
                if (isset($_POST["botonRegistro"])) {
                    if (Usuario::getUserByCredentials($_POST['user'], $_POST['pass'])) {
                        $msg = "El usuario ya existe en la base de datos";
                        include 'vistas/registro.php';
                    } else {
                        $user = new Usuario($_POST["user"], $_POST["pass"]);
                        $user->persist();
                        $msg = "Usuario registrado";
                        include 'vistas/formlogin.php';
                    }
                } else {
                    if (isset($_POST["volverReg"])) {
                        include "vistas/formlogin.php";
                    } else {
                        include "vistas/formlogin.php";
                    }
                }
            }
        }
    }
?>
