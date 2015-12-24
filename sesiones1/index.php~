<<<<<<< HEAD
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
=======
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
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
?>