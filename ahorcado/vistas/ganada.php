<?php
if ($view !== "ganada") {
    header("Location:/");
} else {
    $partida = $_SESSION['partida'];
    ?>
    <!DOCTYPE html>
    <HTML>
        <HEAD>
            <meta charset="utf-8">
            <title>YEAH!</title>
            <LINK rel="stylesheet" href="../css/styles.css">
        </HEAD>
        <BODY>
            <form action="/" method="POST">
                <H1>hah ganao!</H1>
                <input type="submit" name="logout" value="Log out">                
                <input type="submit" name="newPartida" value="Nueva partida">
                <?php
                /* if (isset($msg)) {
                  echo "<h2>" . $msg . "</h2>";
                  } */
                $secreta = $partida -> getPalabrasecreta();
                echo "<br><br><span id=\"palabra\">" . $partida -> getPalabradescubierta() . "</span><br><br>";
                ?>

                <DIV>
                    <H2>Letras usadas</H2>
    <?php
    echo $partida -> getLetrasusadas();
    ?>

                    <H2>Intentos</H2>
    <?php
    echo $partida -> getIntentos();
    ?>

                </DIV>

            </form>
            <form action="/" method="POST">
                <input type="submit" name="volver" value="Volver">
            </form>
        </BODY>
    </HTML>

    <?php
}
?>