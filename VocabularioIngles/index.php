
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="formulario" action="comprobacion.php" method="POST">
        <table border="1">
        <?php
        /*Creación de los arrays de palabras en inglés y en español. 
        El indice de uno es equivalente a su traduccion en el indice del otro*/
        
        $palabrasIngles= array("table","chair","spoon","knive","fork","plate","glass",
            "jar","bottle","bowl","freezer","ladle","oven","recipe","toaster","pot","mincer",
            "faucet", "cutlery","cup");
        $palabrasEspañol= array("mesa","silla","cuchara","cuchillo","tenedor","plato","vaso","jarra",
            "botella","taza","congelador","cucharon","horno","receta","tostadora","olla","picadora",
            "grifo","cubiertos","taza");
        $palabrasSeleccionadas=[];
        $palabrasMostrar=[];
        //Generación de un número aleatorio entre 0 y 1 para mostrar inglés o español
        $idioma=rand(0,1);//0 mostrará español, 1 mostrará inglés.
        
        if ($idioma==0){
            for ($i=0;$i<10;$i++){
                $palabraRand= rand(0,19);
                while(array_key_exists($palabraRand, $palabrasSeleccionadas)){
                    $palabraRand= rand(0,19);
                }
                $palabrasSeleccionadas[$palabraRand]=true;
                $palabrasMostrar[$palabraRand]=$palabrasEspañol[$palabraRand];
            }
        }
        else{
            for ($i=0;$i<10;$i++){
                $palabraRand= rand(0,19);
                while(array_key_exists($palabraRand, $palabrasSeleccionadas)){
                    $palabraRand= rand(0,19);
                }
                $palabrasSeleccionadas[$palabraRand]=true;
                $palabrasMostrar[$palabraRand]=$palabrasIngles[$palabraRand];
            }
        }
        
        foreach ($palabrasMostrar as $indice => $palabra){
            echo "<tr>";
            echo "<td>$palabra</td>";
            echo "<td><input type='text' name='palabrasUsuario[$indice]'</td>";
            echo "<td> <input type='checkbox' value='on' name='solicitudPista[$indice]' </td>";
            
            echo "</tr>";
        }
        
        echo "<input type='hidden' name='idioma' value='$idioma' >";
        ?>
        </table>
            
            <input type="submit" value="Enviar" name="enviar" />
        </form>
    </body>
</html>
