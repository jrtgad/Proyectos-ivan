<?php
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            $pos = "tirada[$i][$j]";
            //Si ya hay celdas definidas, que las pinte sacando su valor
            //1 es jugador, 2 es mina, 3 mina explotada
            /*if (isset($tiradas[$pos])) {
                    if ($tiradas[$pos] === "1") {
                        echo "<td>";
                        echo "<input type=\"hidden\" name=$pos value=\"0\">";
                        echo "</td>";
                    } else if ($tiradas[$pos] === "2") {
                        echo "<td>";
                        echo "<input type=\"hidden\" name=$pos value=\"*\">";
                        echo "</td>";
                    } else if ($tiradas[$pos] === "3") {
                        echo "<td>";
                        echo "<input type=\"hidden\" name=$pos value=\"X\">";
                        echo "</td>";
                    } else {
                        echo "<td></td>";
                    }
            } else {*/
                echo "<td name=$pos onclick=\"setImage(this)\"></td>";
            //}
        }
        echo "</tr>";
    }
?>