<?php
if ($view !== "partida") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <HTML>
        <HEAD>
            <meta charset="utf-8">
            <title>Nueva partida</title>
            <LINK rel="stylesheet" href="../css/styles.css">
        </HEAD>
        <BODY>
            <form action="/" method="POST">
                <H1>Ahorcado</H1>
                <input type="submit" name="logout" value="Log out">
                <input type="submit" name="volver" value="Volver">

                <?php
                if (isset($msg)) {
                    echo "<h2>" . $msg . "</h2>";
                }
                $secreta = $user->getPartidas()->getPalabrasecreta();
                echo $partida->generaGuiones($secreta);
                ?>
                <input type="text" name="letra">
                <input type="submit" name="enviaLetra" value="Enviar">
                <DIV>
                    <H2>Letras usadas</H2>
                    <?php
                    echo $partida->getLetrasusadas();
                    ?>

                    <H2>Intentos</H2>
                    <?php
                    echo $partida->getIntentos();
                    ?>

                </DIV>

            </form>
        </BODY>
    </HTML>

    <?php
}
?>