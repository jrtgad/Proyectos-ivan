<table>    
<?php
    if(isset($_POST['botonenvio'])){        
        foreach($tableroCorrecto as $f => $filas){
            echo "<tr>";
            foreach($filas as $c => $valor){
                if(isset($jugada[$f][$c])){               
                    if($jugada[$f][$c] === ""){
                        echo "<td><input type='text' value='" . $jugada[$f][$c] . "' size='1' maxlength='1'/></td>";
                    } else {
                        if($jugada[$f][$c] === $tableroCorrecto[$f][$c]){
                            echo "<td class='verde'>" . $jugada[$f][$c] . "</td>";
                        } else {
                            echo "<td class='rojo'>" . $jugada[$f][$c] . "</td>";
                        }
                    }                    
                } else {
                    echo "<td>". $tableroCorrecto[$f][$c] ."</td>";
                }                
            }
            echo "</tr>";
        }
    } else {
        foreach($tablero as $fila => $filas){
            echo "<tr>";
            foreach($filas as $columna => $valor){            
                if($valor === ""){
                        echo "<td><input type='text' name='jugada[$fila][$columna]' value='$valor' size='1' maxlength='1'/></td>";
                } else {
                    echo "<td>" . $tablero[$fila][$columna] . "</td>";
                }

                echo "<input type='hidden' name='tableroCorrecto[$fila][$columna]' value='". $tableroCorrecto[$fila][$columna] . "' />";            
            }
            echo "</tr>";
        }      
    }
    
?>
        <br>        
</table>