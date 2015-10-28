<table>
<?php
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            $pos = $i . $j;
            echo "<td name=\"tirada[$pos]\" onclick=\"setImage(this)\"></td>";
        }
        echo "</tr>";
    }
?>
</table>