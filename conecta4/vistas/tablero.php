<table>
<?php
    for ($i = 0; $i < 7; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            $pos = $i . $j;
            echo "<td name=\"$pos\" onclick=\"colorea(this)\"></td>";
        }
        echo "</tr>";
    }
?>
</table>