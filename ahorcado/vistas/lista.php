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

                    $actual = $juegos->iterate();

                    while ($actual) {
                        if ($actual->getFinalizada() === 0 || $actual->getFinalizada() === "0") {
                            echo "<input type=\"radio\" name=\"idPartida\" value=\"" . $actual->get_IdPartida() . "\">";
                            echo "Partida " . $actual->get_IdPartida();
                            echo "<br>";
                        }
                        $actual = $juegos->iterate();
                    }
                    if (isset($_SESSION['recupera'])) {
                        echo "<h2>" . $_SESSION['recupera'] . "</h2>";
                    }
                    echo "<input type=\"SUBMIT\" name=\"recupera\" value=\"Continuar partida\">";

                    if (isset($msgRecupera)) {
                        echo "<h2>" . $msgRecupera . "</h2>";
                    }

                    $juegos->resetIterator();

                    $actual = $juegos->iterate();

                    echo "<h2>Partidas acabadas</h2>";

                    while ($actual) {
                        if ($actual->getFinalizada() === 1 || $actual->getFinalizada() === "1") {
                            echo "<input type=\"checkbox\" name=\"checkboxes[" . $actual->get_IdPartida() . "]\" value=\"" . $actual->get_IdPartida() . "\">";
                            echo "Partida " . $actual->get_IdPartida();
                            echo "<br>";
                        }
                        $actual = $juegos->iterate();
                    }

                    if (isset($msgXML)) {
                        echo "<h2>" . $msgXML . "</h2>";
                    }
                    echo "<input type=\"SUBMIT\" name=\"recuperaXML\" value=\"Mostrar XML\">";
                    ?>

                </form>
            </body>
        </html>

        <?php
    }
?>