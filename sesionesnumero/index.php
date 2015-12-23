<?php
    session_start();
    
    if(isset($_SESSION['numCorrecto'])) {
        if(isset($_POST['enviar'])) {
            $numero = $_POST['num'];
            $numeroSecreto = $_SESSION['numCorrecto'];
        
            if("\"" + $numero + "\"" === "\"" + $numeroSecreto + "\"") {
                $view = "acierto";
                $msg = "<h1>Ha acertado!</h1>";
                include "vistas/acierto.php";
            } elseif($numero > $numeroSecreto) {
                $view = "continua";
                $msg = "El número es menor";
                include "vistas/continua.php";
            } else {
                $view = "continua";
                $msg = "El número es mayor";
                include "vistas/continua.php";
            }
        } elseif(isset($_POST['inicio'])) {
            session_unset();
            session_destroy();
            header("Location: /");
        }
    }  else {
        $numeroSecreto = rand(0, 10);
        $_SESSION['numCorrecto'] = $numeroSecreto;
        
        $view = "bienvenido";
        include "vistas/bienvenido.php";
    }
?>
