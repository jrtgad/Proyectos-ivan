<<<<<<< HEAD
<table>
    <?php
    
    $imgCPU = "<img src=\"../img/CPU.png\" alt=\"o\"/>";
    $imgUSER = "<img src=\"../img/USER.png\" alt=\"x\"/>";
    
        for($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for($j = 0; $j < 3; $j++) {
                $pos = 3 * $i + $j;
                
                //Si ya hay celdas definidas, que las pinte sacando su valor
                //1 es jugador, 2 es cpu
                if (isset($jugada[$pos])) {
                    $jugador = $jugada[$pos];
                    if ($jugada[$pos] === "1") {
                        echo "<td id=$pos>";
                        echo "<input type=\"hidden\" name=jugada[$pos] value=$jugador>";
                        echo $imgUSER;
                        echo "</td>";
                    } else {
                        $jugador = $jugada[$pos];
                        echo "<td id=$pos>";
                        echo "<input type=\"hidden\" name=jugada[$pos] value=$jugador>";
                        echo $imgCPU;
                        echo "</td>";
                    }
                    //Si la celda no está definida, la pinta normal
                    //con el js para poner imagen
                } else {
                    echo "<td id=\"$pos\" onclick=\"ponerImagen(this)\" value=\"0\"></td>";
                }
            }
            echo "</tr>";
        }
    ?>
=======
<table>
    <?php
    
    $imgCPU = "<img src=\"../img/CPU.png\" alt=\"o\"/>";
    $imgUSER = "<img src=\"../img/USER.png\" alt=\"x\"/>";
    
        for($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for($j = 0; $j < 3; $j++) {
                $pos = 3 * $i + $j;
                
                //Si ya hay celdas definidas, que las pinte sacando su valor
                //1 es jugador, 2 es cpu
                if (isset($jugada[$pos])) {
                    $jugador = $jugada[$pos];
                    if ($jugada[$pos] === "1") {
                        echo "<td id=$pos>";
                        echo "<input type=\"hidden\" name=jugada[$pos] value=$jugador>";
                        echo $imgUSER;
                        echo "</td>";
                    } else {
                        $jugador = $jugada[$pos];
                        echo "<td id=$pos>";
                        echo "<input type=\"hidden\" name=jugada[$pos] value=$jugador>";
                        echo $imgCPU;
                        echo "</td>";
                    }
                    //Si la celda no está definida, la pinta normal
                    //con el js para poner imagen
                } else {
                    echo "<td id=\"$pos\" onclick=\"ponerImagen(this)\" value=\"0\"></td>";
                }
            }
            echo "</tr>";
        }
    ?>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</table>