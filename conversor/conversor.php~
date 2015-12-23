<?php
    /*if(!isset($_POST['conv'])){
        header("Location: localhost:8000");
    }else{
        if(!isset($_POST['cant']) || 
                !isset($_POST['origen']) || 
                !isset($_POST['resultado'])){
            header("Location: localhost:8000");
        }  else {*/
            $cantidad = $_POST['cant'];
            $origen = $_POST['origen'];
            $res = $_POST['resultado'];
        /*}
        
    }*/
    
    switch ($origen) {
        case "EUR": switch ($res){
            case "USD2": $aux = $cantidad * 1.11751; break;
            case "GBP2": $aux = $cantidad * 0.73680; break;
            case "CNY2": $aux = $cantidad * 7.12067; break;
            default : $aux = $cantidad;
        } break;
    
        case "USD": switch ($res) {
            case "EUR2": $aux = $cantidad * 0.89472; break;
            case "GBP2": $aux = $cantidad * 0.65922; break;
            case "CNY2": $aux = $cantidad * 6.37594; break;
            default : $aux = $cantidad;
        }break;
    
        case "GBP": switch ($res) {
            case "EUR2": $aux = $cantidad * 1.35727; break;
            case "USD2": $aux = $cantidad * 1.51740; break;
            case "CNY2": $aux = $cantidad * 9.67484; break;
            default : $aux = $cantidad;
        };break;
    
        case "CNY": switch ($res) {
            case "EUR2": $aux = $cantidad * 0.14026; break;
            case "USD2": $aux = $cantidad * 0.15685; break;
            case "GBP2": $aux = $cantidad * 0.10337; break;
            default : $aux = $cantidad;
        };break;
    }
    
    switch ($res)
    {
        case "EUR2": $res = "euros";break;
        case "USD2": $res = "d&oacute;lares";break;
        case "GBP2": $res = "libras";break;
        case "CNY2": $res = "yuanes";break;
    }
    switch ($origen)
    {
        case "EUR": $origen = "euros";break;
        case "USD": $origen = "d&oacute;lares";break;
        case "GBP": $origen = "libras";break;
        case "CNY": $origen = "yuanes";break;
    }
        echo "<h1>$cantidad $origen son $aux $res</h1>";
?>