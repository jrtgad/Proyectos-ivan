<?php
    session_start();
    
    if (isset($_SESSION['user'])) {
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
        } else {
            $view = "content";
            include "vistas/content.php";
        }
    } else if(isset($_POST['login'])) {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        $view = "content";
        include "vistas/content.php";
    } else {
        $view = "login";
        include "vistas/login.php";
    }
?>