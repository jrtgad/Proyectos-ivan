<html>
    <head>
        <title>Temperaturas</title>
        <style>
            table{text-align: center;
                    float: left;
                    margin: 20px;
                    border: 1px solid goldenrod;}
            
            tr{border: 1px solid goldenrod;}
            
            .dcha{text-align: right;
                    font-weight: bold;}
            
            .tit{font-weight: bold;}
            
            .centrado{text-align: center;
                        clear: both;}
            
            .lil{width: 35px;}
        </style>
    </head>
    <body>
        <table><tr>

<?php

$datos = $_POST['datos'];

foreach ($datos as $ciudad => $meses) {
    echo "<th>Ciudad</th><th>Max</th><th>Min</th><th>med</th></tr>";
    echo "<tr><td>$ciudad</td>";
    foreach ($meses as $mes => $temperaturas) {        
        foreach ($temperaturas as $temp => $valor){
            echo "<td>$valor</td><td></td><td></td>";
        }
    }
    echo "</tr>";
}
?>
        </table>
    </body>
</html>