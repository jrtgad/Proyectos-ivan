<<<<<<< HEAD
<!-- Autor: Daniel Fernández -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba el Sudoku</title>
    </head>
    <body>
        <?php
        //Creamos el array del sudoku
        $tablero = array(
            0 => array(9,7,6,2,4,3,8,5,1),
            1 => array(3,2,8,1,6,5,7,4,9),
            2 => array(5,1,4,8,7,9,3,6,2),
            3 => array(6,4,2,7,3,8,1,9,5),
            4 => array(7,5,9,6,1,2,4,3,8),
            5 => array(1,8,3,9,5,4,6,2,7),
            6 => array(8,6,5,4,9,1,2,7,3),
            7 => array(4,9,1,3,2,7,5,8,6),
            8 => array(2,3,7,5,8,6,9,1,4)
        );
            
        //Creamos el array donde se guardarán los nuevos valores generados aleatoriamente
        /*
         * En este bucle, vamos cogiendo cada fila en grupos de 3, generando un valor aleatorio
         * entre 1 y 2, de esta forma, cada cuadrante tendrá de valor mínimo el valor mínimo de las
         * tres filas que lo contienen sumadas y el valor máximo de la suma de los valores máximos de las 
         * tres filas que lo contienen. Osea, 3 y 6.
         */
        $nuevotablero = $tablero;
        for($i=0;$i<9;$i++){
            for($j=0;$j<9;$j = $j+3){
                //Cantidad de veces que puede haber un valor para introducir
                $maximo = rand(1,2);
                for($a=0;$a<$maximo;$a++){
                    $num = rand(0,2); //Lo introducimos en un lugar aleatorio
                    $nuevotablero[$i][$num+$j] = 0;
                }
            }
        }
        //Creamos la tabla
        echo "<h2>Comprueba el sudoku</h2>";
         echo "<table border ='1' width='20%'>";
         echo "<form method='post' action='programa.php'>";
            for($i=0;$i<9;$i++){
                echo "<tr>";
                for($j=0;$j<9;$j++){
                    if($nuevotablero[$i][$j] == 0){
                       //Pasamos unicamente los valores que introduzca el usuario
                        echo '<td><input type="number" value="0" size="1" min="0" max="9" name="nuevotablero[' .$i .'][' .$j. ']"></td> ';
                    } 
                    else {
                        echo '<td  align="center"> ' . $nuevotablero[$i][$j] . '</td> ';
                    }
                }
                echo "</tr>";
            } 
        echo"</table>";
        echo"<p>Introduzca los números en las casillas correspondientes.</p>";
        echo"<p>Si la casilla se deja con valor 0 contará como número no introducido</p>";
        echo"<input type='submit' name='enviar' value='enviar'>";
        echo "</form>";
         
            
        
        ?>
    </body>
</html>


=======
<!-- Autor: Daniel Fernández -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba el Sudoku</title>
    </head>
    <body>
        <?php
        //Creamos el array del sudoku
        $tablero = array(
            0 => array(9,7,6,2,4,3,8,5,1),
            1 => array(3,2,8,1,6,5,7,4,9),
            2 => array(5,1,4,8,7,9,3,6,2),
            3 => array(6,4,2,7,3,8,1,9,5),
            4 => array(7,5,9,6,1,2,4,3,8),
            5 => array(1,8,3,9,5,4,6,2,7),
            6 => array(8,6,5,4,9,1,2,7,3),
            7 => array(4,9,1,3,2,7,5,8,6),
            8 => array(2,3,7,5,8,6,9,1,4)
        );
            
        //Creamos el array donde se guardarán los nuevos valores generados aleatoriamente
        /*
         * En este bucle, vamos cogiendo cada fila en grupos de 3, generando un valor aleatorio
         * entre 1 y 2, de esta forma, cada cuadrante tendrá de valor mínimo el valor mínimo de las
         * tres filas que lo contienen sumadas y el valor máximo de la suma de los valores máximos de las 
         * tres filas que lo contienen. Osea, 3 y 6.
         */
        $nuevotablero = $tablero;
        for($i=0;$i<9;$i++){
            for($j=0;$j<9;$j = $j+3){
                //Cantidad de veces que puede haber un valor para introducir
                $maximo = rand(1,2);
                for($a=0;$a<$maximo;$a++){
                    $num = rand(0,2); //Lo introducimos en un lugar aleatorio
                    $nuevotablero[$i][$num+$j] = 0;
                }
            }
        }
        //Creamos la tabla
        echo "<h2>Comprueba el sudoku</h2>";
         echo "<table border ='1' width='20%'>";
         echo "<form method='post' action='programa.php'>";
            for($i=0;$i<9;$i++){
                echo "<tr>";
                for($j=0;$j<9;$j++){
                    if($nuevotablero[$i][$j] == 0){
                       //Pasamos unicamente los valores que introduzca el usuario
                        echo '<td><input type="number" value="0" size="1" min="0" max="9" name="nuevotablero[' .$i .'][' .$j. ']"></td> ';
                    } 
                    else {
                        echo '<td  align="center"> ' . $nuevotablero[$i][$j] . '</td> ';
                    }
                }
                echo "</tr>";
            } 
        echo"</table>";
        echo"<p>Introduzca los números en las casillas correspondientes.</p>";
        echo"<p>Si la casilla se deja con valor 0 contará como número no introducido</p>";
        echo"<input type='submit' name='enviar' value='enviar'>";
        echo "</form>";
         
            
        
        ?>
    </body>
</html>


>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
