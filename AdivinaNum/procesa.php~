<?php

//Recogemos las variables en cualquier caso
    $num = $_POST['num'];

    $min = $num['min'];
    $max = $num['max'];
    $sol = $num['sol'];
        
//Si llega una variable numBueno, no es la primera vez que entramos,
//ya hay un número generado
    if(isset($num['numBueno']))
    {
        $numBueno = $num['numBueno'];
    }
//Si no llega la variable, es la 1ª vez que entramos y hay que generar el número aleatorio
    else
    {
        $numBueno = rand($min, $max);
    }
    
?>
<html>
    <head>        
    </head>
    <body>
        <form action="procesa.php" method="POST" name="formadivina">
            
            <label for="min">M&iacute;nimo</label>
            <input type="text" name="num[min]" 
                   value="<?php echo "$min";?>" readonly="readonly">
            
            <label for="max">M&aacute;ximo</label>
            <input type="text" name="num[max]" 
                   value="<?php echo "$max";?>" readonly="readonly">
            
            <!--Tenemos que volver a enviar el numero bueno,
            el server, por si solo, no se acuerda de el-->
            <input type="hidden" name="num[numBueno]" 
                   value="<?php echo "$numBueno";?>">
            
            <?php
            
            //Si no se acierta de primera, 
            //calcularemos si la solución es mayor o menor
                if($sol != $numBueno)
                {
                    if($sol < $numBueno)
                    {
                        echo "<h1>HAS FALLADO, EL N&Uacute;MERO ES MAYOR</h1>";
                    }
                    else
                    {
                        echo "<h1>HAS FALLADO, EL N&Uacute;MERO ES MENOR</h1>";
                    }
                    
                    
                    echo "<input type=\"text\" name=\"num[sol]\">";
                    
                    echo "<input type=\"SUBMIT\" value=\"Enviar\" type=\"submit\" name=\"botonenvio\">";
                }                           
                else
                {
                    echo "<h1>HAS ACERTADO!</h1><br/>";
                    
                    echo "<input type=\"text\" style=\"background:red;color:yellow\" name=\"num[sol]\" value=\"$numBueno\"><br/>";
                    echo "<input type=\"text\" style=\"background:yellow;color:green\" name=\"num[sol]\" value=\"$sol\">";
                }               
            ?>
                         
        </form>
    </body>
</html>