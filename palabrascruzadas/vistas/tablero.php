<table>
    <?php
        function generaArray($palabras, $pos) {
            $arrayTab = [];
            
            for($i = 0; $i < 4; $i++) {
                $x = $pos[$i][2];
                $y = $pos[$i][1];
                
                for($y = $pos[$i][1]; $y < strlen($palabras[$i]); $y++) {
                    $arrayTab[$y][$x] = $elegidas[$i][$y];
                } 
            }
            
            return $arrayTab;
        }
    
    
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