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
                echo "<h2>Partidas sin acabar</h2>";

                $juegos = $user->getPartidas();

                $actual = $juegos->iterate();


                //SIN ACABAR
                while ($actual) {
                    if ((int) $actual->getFinalizada() === 0) {
                        echo "<input type=\"radio\" name=\"idPartida\" value=\"" . $actual->get_IdPartida() . "\">";
                        echo "Partida " . $actual->get_IdPartida();
                        echo "<br>";
                    }
                    $actual = $juegos->iterate();
                }
                echo "<input type=\"SUBMIT\" name=\"recupera\" value=\"Continuar partida\">";

                if (isset($_SESSION["msgRecupera"])) {
                    echo "<h2>" . $_SESSION["msgRecupera"] . "</h2>";
                }

                $juegos->resetIterator();



                $actual = $juegos->iterate();
                //ACABADAS
                echo "<h2>Partidas acabadas</h2>";

                while ($actual) {
                    if ((int) $actual->getFinalizada() === 1) {
                        echo "<input type=\"checkbox\" name=\"checkboxes[" . $actual->get_IdPartida() . "]\" value=\"" . $actual->get_IdPartida() . "\">";
                        echo "Partida " . $actual->get_IdPartida() . "<br>";
                    }
                    $actual = $juegos->iterate();
                }

                if (isset($_SESSION["msgXML"])) {
                    echo "<h2>" . $_SESSION["msgXML"] . "</h2>";
                }
                echo "<input type=\"SUBMIT\" name=\"recuperaXML\" value=\"Mostrar XML\">";
                ?>

            </form>
        </body>
    </html>

    <?php
}
?>