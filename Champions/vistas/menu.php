<!DOCTYPE html>
<?php
    if ($view !== "menu") {
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
                    <form action="index.php" method="POST">
                        <div class="botonera">
                            <input type="submit" name="logout" value="Log out">
                            <input type="submit" name="xml" value="XML">
                            <input type="submit" name="clasificacion" value="Clasificacion">

                        </div>
                        <div class="jornadas">
                            <?php
                            if (isset($msg)) {
                                echo "<p>" . $msg . "</p>";
                            }
                            ?>
                            <table>
                                <?php
                                $jornadas = $liga->getJornadas();
                                $actual = $jornadas->iterate();

                                while ($actual) {
                                    if ($actual->getState() === "0") {
                                        echo "<tr><td><span style=\"color:red;font-size:2em;\">*</span></td>";
                                    } else {
                                        echo "<tr><td><span style=\"color:green;font-size:2em;\">*</span></td>";
                                    }
                                    echo "<td>Jornada " . $actual->getFecha() . "</td>";
                                    echo "<td><button type=\"SUBMIT\" name=\"modificar\" value=\"" . $actual->getId() . "\">Modificar</button></td>";
                                    echo "<td><button type=\"SUBMIT\" name=\"borrar\"  value=\"" . $actual->getId() . "\">Borrar</button></td></tr>";
                                    $actual = $jornadas->iterate();
                                }
                                ?>
                            </table>
                        </div>
                    </form>
                </main>
            </body>
        </html>
    <?php }
?>