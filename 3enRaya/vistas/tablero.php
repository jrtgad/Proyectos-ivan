<table>
    <?php
        for($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for($j = 0; $j < 3; $j++) {
                $pos = 3 * $i + $j;
                echo "<td name=celda[$pos] id=\"celda[$pos]\" "
                        . " onclick=\"ponerImagen(this)\"></td>";                
            }
            echo "</tr>";
        }
    ?>
 </table> 