<!DOCTYPE html>
<?php
if ($view !== "clasificacion") {
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
                <div class="clasificacion">
                    <table>
                        <tr class="cabecera">
                            <td>Equipo</td>
                            <td>Puntos</td>
                            <td>Goles a favor</td>
                            <td>Goles en contra</td>
                            <td>Diferencia goles</td>
                        </tr>
                        <?php
                        $equipos = $liga->getEquipos();

                        foreach ($equipos as $equipo) {
                            echo "<tr><td>" . $equipo->getEquipo() . "</td>";
                            echo "<td>" . $equipo->getPuntos() . "</td>";
                            echo "<td>" . $equipo->getGolesF() . "</td>";
                            echo "<td>" . $equipo->getGolesC() . "</td>";
                            echo "<td>" . abs($equipo->getGolesF() - $equipo->getGolesC()) . "</td></tr>";

                            /*foreach ($partidos as $partido) {

                            }*/
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </main>
        </body>
    </html>
    <?php
}