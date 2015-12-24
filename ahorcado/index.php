<?php

    require_once "class/Usuario.php";

    session_start();

    if (isset($_SESSION['user'])) {
        //REGISTRADO
        $user = $_SESSION['user'];

        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            include "vistas/formlogin.php";
        } else {
            if ($user->getRol() === "admin") {

                //ADMIN
                //formulario de añadir usuario

                if (isset($_POST['alta'])) {
                    $user = $_SESSION['user'];
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

                $_SESSION['user'] = $user;
                if (isset($_POST['newPartida'])) {
                    $partida = $user->nuevaPartida();
                    $partida->persist();
                    $view = "partida";
                    include 'vistas/partida.php';
                } else {/*
                  if (isset($_POST['recupera'])) { */
                    /* QUE HAGA LO QUE TENGA QUE HACER */
                    /* $view = "partida";
                      include 'vistas/partida';
                      //                } else {
                      //                    if (isset($_POST['stop'])) {
                      //                        /* QUE HAGA LO QUE TENGA QUE HACER */
//                        $view = "lista";
//                        include 'vistas/lista.php';
                    /* } else { */
                    if (isset($_POST['enviaLetra'])) {
                        if (!isset($_POST['letra'])) {
                            $msg = "Introduzca una letra";
                        } else {
                            $partida->compruebaJugada($_POST['letra']);
                        }
                        include 'vistas/partida.php';
//                        } else {
//                            if ($_POST['generaLista']) {
//
//                            } else {
//                                if ($_POST['volver']) {
//                                    $view = "lista";
//                                    include 'vistas/lista.php';
//                                }
//                            }
//                        }
//                    }
//                }
                    }
                }
            }
            /* } else {

              //NO REGISTRADO

              if (isset($_POST['formlogin'])) {
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
              } */
        }
    }