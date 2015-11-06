<?php
    $tablero[0] = [9,7,6,2,4,3,8,5,1];
    $tablero[1] = [3,2,8,1,6,5,7,4,9];
    $tablero[2] = [5,1,4,8,7,9,3,6,2];
    $tablero[3] = [6,4,2,7,3,8,1,9,5];
    $tablero[4] = [7,5,9,6,1,2,4,3,8];
    $tablero[5] = [1,8,3,9,5,4,6,2,7];
    $tablero[6] = [8,6,5,4,9,1,2,7,3];
    $tablero[7] = [4,9,1,3,2,7,5,8,6];
    $tablero[8] = [2,3,7,5,8,6,9,1,4];
    
    $tableroCorrecto = $tablero;
    
    
    for($i = 0; $i < 3; $i++){
        for($j = 0; $j < 3; $j++){
            $veces = rand(3, 6);
            do {
                $fila = rand(0,2);
                $col = rand(0,2);
                $col = $col +(3 * $j);
                $fila = $fila + (3* $i);
                if($tablero[$fila][$col] = "") {
                    $veces++;
                } else {
                    $tablero[$fila][$col] = "";
                }
                $veces--;
            }while($veces !== 0);
        }
    }
            
    include "vistas/bienvenido.php";
