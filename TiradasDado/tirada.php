<html>
    <head>
        <title>Tiradas</title>
    </head>
    <body>
        <p>
<?php
if (!isset($_POST)) {
    header("Location:index.php");
} else {
    $tiradas = $_POST['tiradas'];

    for ($i = 1; $i <= 6; $i++) {
        $numeros[$i] = 0;
    }
            
    if (!is_nan($tiradas)) {
        while ($tiradas) {
            $valor = rand(1, 6);
            $numeros[$valor] += 1;
            $tiradas -= 1;
        }
        array_multisort($numeros, SORT_NUMERIC, SORT_ASC);

        foreach ($numeros as $index => $num) {
            echo "<br>Numero " . $index . " ===> " . $num . "<br>";
        }
    }
}
?>
            </p>
    </body>
</html>