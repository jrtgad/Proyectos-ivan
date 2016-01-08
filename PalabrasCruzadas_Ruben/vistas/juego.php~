<<<<<<< HEAD
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            input[type=text] {
                border: 1px solid #ccc;
                width: 20px;
                heoght: 20px;
                font: 12px monaco, monospace; 
                letter-spacing: 10.5px;
                text-indent: 5px;
                text-transform: uppercase;
            }
        </style>

    </head>
    <body>
        <h1>Las palabras a colocar son:</h1>
        <?php
        shuffle($palabrasUsadas);
        echo "<h2>" . implode($palabrasUsadas, ' ') . "</h2>";
        ?>
        <form action="procesaJugada.php" method="POST">
            <input type="hidden" value=<?php echo implode($palabrasUsadas, ','); ?> name='palabras'/> 
            <table>
                <?php
                foreach ($tablero as $fila => $datosFila) {
                    echo "<tr>";
                    foreach ($datosFila as $columna => $letra) {
                        if ($tablero[$fila][$columna]) {
                            echo "<td><input type=text name=tablero[$fila][$columna]/></td>";
                            // echo "<td>".$tablero[$fila][$columna]."/></td>";
                        } else {
                            echo "<td display='hidden'></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <input type="submit" value="Enviar jugada" name="enviar" />
        </form>
    </body>
</html>
=======
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            input[type=text] {
                border: 1px solid #ccc;
                width: 20px;
                heoght: 20px;
                font: 12px monaco, monospace; 
                letter-spacing: 10.5px;
                text-indent: 5px;
                text-transform: uppercase;
            }
        </style>

    </head>
    <body>
        <h1>Las palabras a colocar son:</h1>
        <?php
        shuffle($palabrasUsadas);
        echo "<h2>" . implode($palabrasUsadas, ' ') . "</h2>";
        ?>
        <form action="procesaJugada.php" method="POST">
            <input type="hidden" value=<?php echo implode($palabrasUsadas, ','); ?> name='palabras'/> 
            <table>
                <?php
                foreach ($tablero as $fila => $datosFila) {
                    echo "<tr>";
                    foreach ($datosFila as $columna => $letra) {
                        if ($tablero[$fila][$columna]) {
                            echo "<td><input type=text name=tablero[$fila][$columna]/></td>";
                            // echo "<td>".$tablero[$fila][$columna]."/></td>";
                        } else {
                            echo "<td display='hidden'></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <input type="submit" value="Enviar jugada" name="enviar" />
        </form>
    </body>
</html>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
