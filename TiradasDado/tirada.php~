<html>
    <head>
        <title>Tiradas</title>
        <style>
            p {text-align: center;}
            h1 {text-align: center;}
        </style>
    </head>
    <body>
        <p><h1>
<?php
if (!isset($_POST)) {
    header("Location:index.php");
} elseif ($_POST['tiradas'] < 1) {
    header("Location:index.php");
} else {
    $tiradas = $_POST['tiradas'];

    echo $tiradas . " tiradas de dado:</h1></p><p>";
    
    for ($i = 1; $i <= 6; $i++) {
        $numeros[$i] = 0;
    }
            
    if (!is_nan($tiradas)) {
        while ($tiradas) {
            $valor = rand(1, 6);
            $numeros[$valor] += 1;
            $tiradas -= 1;
        }
        asort($numeros);

        foreach ($numeros as $index => $num) {
            echo "<br>Numero " . $index . " ===> " . $num . "<br>";
        }
    }
}
?>
            </p>
    </body>
</html>