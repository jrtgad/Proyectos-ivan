<?php
    //Recogemos el número introducido en el formulario
    $num = $_POST['num'];
    
    //Instanciamos $i con un nº menos para empezar a calcular el factorial
    $i = $num - 1;
    
    //Usamos un auxiliar para el primer nº
    $aux = $num * $i;
    
    //Mientras que $i sea mayor que 0 seguimos calculando con $i - 1
    while($i > 1){
        $i -= 1;
        $aux *= $i;
    }
    
?>
<html>
    <head>
        <title>Factorizar un n&uacute;mero</title>
        <style>
            h1 {text-align: center;}
            
            .capaform {width: 600px; 
                       margin-left: auto; 
                       margin-right: auto;
                       position: relative;
                       top: 50px;
                       font-size: 20px;
                       text-align:left;
                       padding: 50px;
                       border: 5px solid orange}
            
            form {text-align: center;}
        </style>
    </head>
    <body>
        <h1>
            <?php 
                echo "<div class=\"capaform\"><h1>El factorial es $aux</h1>";
                echo "<form action=\"factoriza.php\" method=\"POST\">
                        <input type=\"text\" name=\"num\">
                        <input type=\"SUBMIT\" value=\"ENVIAR\">
                    </form></div>";
            ?>
        </h1>
    </body>
</html>