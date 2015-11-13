<?php
    session_start();
    if(isset($_SESSION['user'])) {
        if(isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            $view = "login";
            include "vistas/formlogin.php";
        }
    } else {
        if(!isset($_POST['login'])){
            $view = "login";
            include "vistas/formlogin.php";
        } else {
            $_SESSION['user'] = $_POST['user'];
        }
        
    }
?>