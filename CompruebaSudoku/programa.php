<<<<<<< HEAD
<!-- Autor: Daniel Fernández -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba el sudoku</title>
    </head>
    <body>
        <?php 
        
        $enviar = $_POST['enviar'];
        if(!isset($enviar)){
            header("Location: index.php");
        }
        //Volvemos a crear el sudoku
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
        //Cogemos el tablero con los datos que nos ha incluido el usuario
        $tableroRecibido = $_POST['nuevotablero'];
        
        //Contadores
        $incorrecto = 0;
        $correcto = 0;
        $numeroNoIntroducido = 0;
        
        //Vamos mostrando la tabla dependiendo de lo que ocurra
        echo "<table border ='1' width='20%'>";
            for($i=0;$i<9;$i++){
                echo "<tr>";
                for($j=0;$j<9;$j++){
                    //En caso de que sea un valor que no ha sido modificado
                    if(!isset($tableroRecibido[$i][$j])){
                    $tableroRecibido[$i][$j] = $tablero[$i][$j];
                    echo "<td></td>"; //Se deja vacío
                    }
                    //En caso de que el valor sea distinto
                    else if($tableroRecibido[$i][$j] != $tablero[$i][$j]){
                        //Si es igual a 0 significa que el usuario no ha rellenado la casilla
                        if($tableroRecibido[$i][$j] == 0){
                            echo "<td bgcolor='gray' align='center'>".$tablero[$i][$j]."</td>";
                            $numeroNoIntroducido++;
                            //Cuenta como número no introducido
                        }
                        else{
                            //En este caso, el usuario ha introducido un número y se ha equivocado
                            echo "<td bgcolor='red' align='center'>".$tablero[$i][$j]."</td>";
                            $incorrecto++;
                        }
                        
                    }
                    //En caso de que haya introducido un número y haya acertado
                    else if($tableroRecibido[$i][$j] == $tablero[$i][$j]){
                        echo "<td bgcolor='green' align='center'>".$tablero[$i][$j]."</td>";
                        $correcto++;
                    }
                    
                }
                echo "</tr>";
            } 
        echo"</table>";
        $NumerosTotales = $correcto+$incorrecto ;
        echo"<p>Ha introducido $NumerosTotales número(s).</p>";
        echo"<p>No ha introducido $numeroNoIntroducido número(s).";
        echo"<p>Numeros correctos: $correcto.";
        echo"<p>Numeros incorrectos: $incorrecto.";
        ?>
    </body>
</html>

=======
<!-- Autor: Daniel Fernández -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba el sudoku</title>
    </head>
    <body>
        <?php 
        
        $enviar = $_POST['enviar'];
        if(!isset($enviar)){
            header("Location: index.php");
        }
        //Volvemos a crear el sudoku
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
        //Cogemos el tablero con los datos que nos ha incluido el usuario
        $tableroRecibido = $_POST['nuevotablero'];
        
        //Contadores
        $incorrecto = 0;
        $correcto = 0;
        $numeroNoIntroducido = 0;
        
        //Vamos mostrando la tabla dependiendo de lo que ocurra
        echo "<table border ='1' width='20%'>";
            for($i=0;$i<9;$i++){
                echo "<tr>";
                for($j=0;$j<9;$j++){
                    //En caso de que sea un valor que no ha sido modificado
                    if(!isset($tableroRecibido[$i][$j])){
                    $tableroRecibido[$i][$j] = $tablero[$i][$j];
                    echo "<td></td>"; //Se deja vacío
                    }
                    //En caso de que el valor sea distinto
                    else if($tableroRecibido[$i][$j] != $tablero[$i][$j]){
                        //Si es igual a 0 significa que el usuario no ha rellenado la casilla
                        if($tableroRecibido[$i][$j] == 0){
                            echo "<td bgcolor='gray' align='center'>".$tablero[$i][$j]."</td>";
                            $numeroNoIntroducido++;
                            //Cuenta como número no introducido
                        }
                        else{
                            //En este caso, el usuario ha introducido un número y se ha equivocado
                            echo "<td bgcolor='red' align='center'>".$tablero[$i][$j]."</td>";
                            $incorrecto++;
                        }
                        
                    }
                    //En caso de que haya introducido un número y haya acertado
                    else if($tableroRecibido[$i][$j] == $tablero[$i][$j]){
                        echo "<td bgcolor='green' align='center'>".$tablero[$i][$j]."</td>";
                        $correcto++;
                    }
                    
                }
                echo "</tr>";
            } 
        echo"</table>";
        $NumerosTotales = $correcto+$incorrecto ;
        echo"<p>Ha introducido $NumerosTotales número(s).</p>";
        echo"<p>No ha introducido $numeroNoIntroducido número(s).";
        echo"<p>Numeros correctos: $correcto.";
        echo"<p>Numeros incorrectos: $incorrecto.";
        ?>
    </body>
</html>

>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
