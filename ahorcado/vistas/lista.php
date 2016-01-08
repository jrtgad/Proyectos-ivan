<?php
if ($view !== "lista") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title></title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
            <form action="/" method="POST">
                <input type="submit" name="logout" value="Log out">
                <input type="submit" name="newPartida" value="Nueva partida">
                <?php
                echo "<h1>Hola " . $_SESSION['user']->getUser() . "</h1>";
                $juegos = $user->getPartidas();

                echo "<h2>Partidas sin acabar</h2>";

                //$juegos -> sortByProperty("finalizada", 'n');
                $actual = $juegos->iterate();

                while ($actual) {
                    if ($actual->getFinalizada() === 0 || $actual->getFinalizada() === "0") {
                        echo "<input type=\"radio\" name=\"idPartida\" value=\"" . $actual->get_Idpartida() . "\">";
                        echo "Partida " . $actual->get_Idpartida();
                        echo "<br>";
                    }
                    $actual = $juegos->iterate();
                }

                echo "<input type=\"SUBMIT\" name=\"recupera\" value=\"Continuar partida\">";

                $juegos->resetIterator();

                $actual = $juegos->iterate();

                echo "<h2>Partidas acabadas</h2>";

                while ($actual) {
                    if ($actual->getFinalizada() === 1 || $actual->getFinalizada() === "1") {
                        echo "<input type=\"checkbox\" name=\"checkboxes[" . $actual->get_Idpartida() . "]\" value=\"" . $actual->get_Idpartida() . "\">";
                        echo "Partida " . $actual->get_Idpartida();
                        echo "<br>";
                    }
                    $actual = $juegos->iterate();
                }
                echo "<input type=\"SUBMIT\" name=\"recuperaXML\" value=\"Mostrar XML\">";
                ?>

            </form>
        </body>
    </html>

    <?php
}
?>