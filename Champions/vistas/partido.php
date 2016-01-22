<!DOCTYPE html>
<?php
    if ($view !== "partido") {
        header("Location: /");
    } else {
        $liga = $_SESSION['liga'];
        ?>

        <html>
            <head>
                <link rel="stylesheet" href="../css/screen.css">
            </head>
            <body>
                <main>
                    <h1>Gestión liga</h1>
                    <form action="/" method="POST">
                        <div class="botonera">
                            <input type="submit" name="logout" value="Log out">
                            <input type="submit" name="menu" value="Volver">
                        </div>
                    </form>
                    <form action="index.php" method="POST">
                        <div class="partidos">

                            <table>
                                <?php
                                $partidos = $jornada->getPartidos();

                                $actual = $partidos->iterate();
                                //actual es cada partido

                                while ($actual) {
                                    echo "<tr><td>" . $actual->getEquipoL() . "</td>";
                                    echo "<td><input type=\"number\" value=\"" . $actual->getGolL() . "\" name=\"resultado[" . $actual->getId() . "][local]\" required></td>";
                                    echo "<td><input type=\"number\" value=\"" . $actual->getGolV() . "\" name=\"resultado[" . $actual->getId() . "][visitante]\" required></td>";
                                    echo "<td>" . $actual->getEquipoV() . "</td></tr>";

                                    $actual = $partidos->iterate();
                                }
                                echo "<tr><td><button type=\"SUBMIT\" name=\"modificado\" value=\"" . $jornada->getId() . "\">Aceptar</button></td>";
                                ?>
                            </table>
                        </div>
                    </form>
                </main>
            </body>
        </html>
    <?php }
?>