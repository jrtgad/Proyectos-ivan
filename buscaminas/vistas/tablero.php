<?php
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            //Si ya hay celdas definidas, que las pinte sacando su valor
            //1 es jugador, 2 es mina, 3 mina explotada
            if (isset($resultado[$i][$j])) {
                    if ($resultado[$i][$j] === "1") {
                        echo "<td>";
                        echo "0";
                        echo "</td>";
                    } else if ($resultado[$i][$j] === "3") {
                        echo "<td>";
                        echo "X";
                        echo "</td>";
                    } else if ($resultado[$i][$j] === "2") {
                        echo "<td>";
                        echo "*";
                        echo "</td>";
                    } else {
                        echo "<td></td>";
                    }
            } else {
                echo "<td name=\"tirada[$i][$j]\" id=\"tirada[$i][$j]\" onclick=\"setImage(this)\"></td>";
            }
        }
        echo "</tr>";
    }
?>