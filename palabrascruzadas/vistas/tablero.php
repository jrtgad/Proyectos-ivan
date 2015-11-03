<table>
    <?php
        /*for ($i = 0; $i < (strlen($elegidas[0]) + strlen($elegidas[2])); $i += 1) {
            echo "<tr>";
            for ($j = 0; $j < (strlen($elegidas[1]) + strlen($elegidas[3])); $j += 1) {
                echo "<td>"; 
                if ($j === $posiciones[1][1]) {
                    
                }
                echo "</td>";
            }
            echo "</tr>";
        }*/
    
//        echo "<tr>";
//        for ( $i = 0; $i < $posiciones[1][1]; $i += 1) {
//            echo "<td></td>";
//        }
//        
//        echo "</tr>";
    
    
    $huecos = [];
    $huecos = rellenaHuecos($posiciones[0][1], 
                            $posiciones[1][2],
                            "h", 
                            $elegidas[0], 
                            $huecos);
    
    $huecos = rellenaHuecos($posiciones[1][1], 
                            $posiciones[2][2], 
                            "h", 
                            $elegidas[2], 
                            $huecos);
    
    var_dump(($huecos));
    
    function rellenaHuecos($columna, $fila, $dir, $word, $huecos) {
        if ($dir === "h") {
            
            for ($i = $columna; 
                 $i < ($columna + strlen($word)); 
                 $i += 1) {
                     
                $huecos[$i][$fila] = $word[$i - $columna];
            }
        }
        return $huecos;
    }
    
    ?>
</table>