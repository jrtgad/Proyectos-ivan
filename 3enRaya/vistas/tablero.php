<table>
    <?php
    
    $imgCPU = "<img src=\"../img/CPU.png\" alt=\"x\"/>";
    $imgUSER = "<img src=\"../img/USER.png\" alt=\"x\"/>";
    
        for($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for($j = 0; $j < 3; $j++) {
                $pos = 3 * $i + $j;
                
                if (isset($jugada[$pos])) {
                    $jugador = $jugada[$pos];
                    if ($jugada[$pos] === "1") {
                        echo "<td id=celda$pos>";
                        echo "<input type=\"hidden\" name=jugada[$pos] value=$jugador>";
                        echo $imgUSER;
                        echo "<td>";
                    } else {
                        $jugador = $jugada[$pos];
                        echo "<td id=celda$pos>";
                        echo "<input type=\"hidden\" name=jugada[$pos] value=$jugador>";
                        echo $imgCPU;
                        echo "<td>";
                    }
                    
                } else {
                    echo "<td id=\"celda$pos\" onclick=\"ponerImagen(this)\"></td>";
                }
            }
            echo "</tr>";
        }
    ?>
 </table> 