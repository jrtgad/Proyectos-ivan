<?php
if(!isset($_POST['enviar'])){
    header:'Location:index.php';
}
else {
?>

    <html>
        <head>
            <meta charset="UTF-8"/>
            <title>Comprobacion palabras 1</title>
        </head>
        <body>

    <?php
        $palabrasUsuario= $_POST['palabrasUsuario'];

        $palabrasIngles= array("table","chair","spoon","knive","fork","plate","glass",
            "jar","bottle","bowl","freezer","ladle","oven","recipe","toaster","pot","mincer",
            "faucet", "cutlery","cup");
        $palabrasEspañol= array("mesa","silla","cuchara","cuchillo","tenedor","plato","vaso","jarra",
            "botella","taza","congelador","cucharon","horno","receta","tostadora","olla","picadora",
            "grifo","cubiertos","taza");
        $idioma= $_POST['idioma'];
        $correctas=0;
        if(isset($_POST['solicitudPista'])){
            if (count($_POST['solicitudPista'])>3){
                //MOSTRAR ERROR SI HAY MAS DE 3 PISTAS
                echo "<h2> Como máximo puedes solicitar 3 pistas.<br> Has seleccionado: ";
                echo count($_POST['solicitudPista']);
                echo "</h2>";
                echo "<form name='volverAjugar' action='index.php' method='POST'>";
                echo "<input type='submit' value='Volver a Jugar' name='tryAgain' />";
                
                echo "</form>";
            }
            else{
                //SI HAY MENOS DE 3 PISTAS PROCESAR!!!!
                $pistasSolicitadas=$_POST['solicitudPista'];
                echo "<table border='1'>";
                if($idioma==0){//Español
                    echo "<tr><th>Español</th><th>Introducida</th><th>Correcta</th></tr>";
                    foreach ($palabrasUsuario as $indice => $palabra){
                        if (!array_key_exists($indice, $pistasSolicitadas)){
                            echo "<tr>";
                            echo "<td> $palabrasEspañol[$indice]</td>";
                            echo "<td> $palabra</td>";
                            echo "<td> $palabrasIngles[$indice]</td>";
                            echo "</tr>";
                            if ($palabra == $palabrasIngles[$indice]){
                                $correctas++;
                            }
                        }
                    }
                    echo "</table>";
                    echo "<h2> Palabras correctas: $correctas</h2>";
                    echo "<form name='conpistas' action='comprobacionPistas.php' method='POST'>";
                    echo "<table border='1'>";
                    echo "<tr><th>Español</th><th>Pista</th><th>Introducir</th></tr>";
                    foreach ($pistasSolicitadas as $indicePista => $dato){
                        $letrasPista = substr($palabrasIngles[$indicePista],0,2);
                        echo "<tr>";
                        echo "<td> $palabrasEspañol[$indicePista]</td>";
                        echo "<td> $letrasPista</td>";
                        echo "<td> <input type='text' name='introducidaConPista[$indicePista]'</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<input type='hidden' name='correctas' value='$correctas' >";
                    echo "<input type='hidden' name='idioma' value='$idioma' >";
                    echo "<input type='submit' value='Enviar' name='enviarPistas' />";
                    echo "</form>";
                }
                else{//Inglés
                    echo "<tr><th>Ingles</th><th>Introducida</th><th>Correcta</th></tr>";
                    foreach ($palabrasUsuario as $indice => $palabra){
                        if (!array_key_exists($indice, $pistasSolicitadas)){
                            echo "<tr>";
                            echo "<td> $palabrasIngles[$indice]</td>";
                            echo "<td> $palabra</td>";
                            echo "<td> $palabrasEspañol[$indice]</td>";
                            echo "</tr>";
                            if ($palabra == $palabrasEspañol[$indice]){
                                $correctas++;
                            }
                        }
                    }
                    echo "</table>";
                    echo "<h2> Palabras correctas: $correctas</h2>";
                    echo "<form name='conpistas' action='comprobacionPistas.php' method='POST'>";
                    echo "<table border='1'>";
                    echo "<tr><th>Ingles</th><th>Pista</th><th>Introducir</th></tr>";
                    foreach ($pistasSolicitadas as $indicePista => $dato){
                        $letrasPista = substr($palabrasEspañol[$indicePista],0,2);
                        echo "<tr>";
                        echo "<td> $palabrasIngles[$indicePista]</td>";
                        echo "<td> $letrasPista</td>";
                        echo "<td> <input type='text' name='introducidaConPista[$indicePista]'</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<input type='hidden' name='correctas' value='$correctas' >";
                    echo "<input type='hidden' name='idioma' value='$idioma' >";
                    echo "<input type='submit' value='Enviar' name='enviarPistas' />";
                    echo "</form>";
                }
                
            }
        }
        else{ //SIN PISTAS
            

            if($idioma==0){
                echo "<table border='1'>";
                echo "<tr><th>Español</th><th>Introducida</th><th>Correcta</th></tr>";
                foreach ($palabrasUsuario as $indicePalabra => $palabra){
                    echo "<tr>";
                    echo "<td>$palabrasEspañol[$indicePalabra]</td>";
                    echo "<td>$palabra</td>";
                    echo "<td>$palabrasIngles[$indicePalabra]</td>";
                    echo "</tr>";
                    if ($palabra == $palabrasIngles[$indicePalabra]){
                        $correctas++;
                    }
                }
                echo "</table>";
                echo "<h2> Palabras correctas: $correctas</h2>";
            }
            else{
                echo "<table border='1'>";
                echo "<tr><th>Ingles</th><th>Introducida</th><th>Correcta</th></tr>";
                foreach ($palabrasUsuario as $indicePalabra => $palabra){
                    echo "<tr>";
                    echo "<td>$palabrasIngles[$indicePalabra]</td>";
                    echo "<td>$palabra</td>";
                    echo "<td>$palabrasEspañol[$indicePalabra]</td>";
                    echo "</tr>";
                    if ($palabra == $palabrasEspañol[$indicePalabra]){
                        $correctas++;
                    }
                }
                echo "</table>";
                echo "<h2> Palabras correctas: $correctas</h2>";
            }
        }
        
}
?>
    </body>
</html>