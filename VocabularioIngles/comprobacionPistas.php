<?php

if (!isset($_POST['enviarPistas'])){
    header: 'Location:index.php';
}
else{
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Comprobacion de pistas</title>
    </head>
    <body>
        
    <?php
    
        $palabrasIngles= array("table","chair","spoon","knive","fork","plate","glass",
            "jar","bottle","bowl","freezer","ladle","oven","recipe","toaster","pot","mincer",
            "faucet", "cutlery","cup");
        $palabrasEspañol= array("mesa","silla","cuchara","cuchillo","tenedor","plato","vaso","jarra",
            "botella","taza","congelador","cucharon","horno","receta","tostadora","olla","picadora",
            "grifo","cubiertos","taza");
        $introducidasConPista = $_POST['introducidaConPista'];
        $idioma= $_POST['idioma'];
        $correctasAntes = $_POST['correctas'];
        $correctasDespues = $correctasAntes;
        if ($idioma==0){
            echo "<table border='1'>";
            echo "<tr><th>Español</th><th>Introducida</th><th>Correcta</th></tr>";
            foreach ($introducidasConPista as $indicePalabaPista => $palabraPista){
                echo "<tr>";
                echo "<td>$palabrasEspañol[$indicePalabaPista]</td>";
                echo "<td>$palabraPista</td>";
                echo "<td>$palabrasIngles[$indicePalabaPista]</td>";
                echo "</tr>";
                if ($palabraPista == $palabrasIngles[$indicePalabaPista]){
                    $correctasDespues++;
                }
                
            }
            echo "</table>";
            echo "<h2> Palabras correctas antes: $correctasAntes</h2>";
            echo "<h2> Palabras correctas final: $correctasDespues</h2>";
        }
        else{
            echo "<table border='1'>";
            echo "<tr><th>Español</th><th>Introducida</th><th>Correcta</th></tr>";
            foreach ($introducidasConPista as $indicePalabaPista => $palabraPista){
                echo "<tr>";
                echo "<td>$palabrasIngles[$indicePalabaPista]</td>";
                echo "<td>$palabraPista</td>";
                echo "<td>$palabrasEspañol[$indicePalabaPista]</td>";
                echo "</tr>";
                if ($palabraPista == $palabrasEspañol[$indicePalabaPista]){
                    $correctasDespues++;
                }
            }
            echo "</table>";
            echo "<h2> Palabras correctas antes: $correctasAntes</h2>";
            echo "<h2> Palabras correctas final: $correctasDespues</h2>";
        }
}
    ?>
        
    </body>
</html>
