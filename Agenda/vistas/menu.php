<?php
if ($view !== "menu") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Formulario de acceso agenda</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
            <h1><?php echo "Hola, " . $_SESSION["user"]->getUser(); ?></h1>

            <form action="/">
                <input type="SUBMIT" value="Log out" name="logout">
            </form>

            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Teléfono1</td>
                    <td>Teléfono2</td>
                    <td>Dirección</td>
                </tr>
                <?php
                if ($_SESSION["user"]->getContactos()) {
                    $contactos = $_SESSION["user"]->getContactos();
                    $actual = $contactos->iterate();
                    while ($actual) {
                        echo "<tr><td>";
                        echo "<input type=\"checkbox\" value=\"" . $contacto->getId() . "\">";
                        echo "</td>";
                        echo "<td>" . $actual->getNombre() . "</td>";
                        echo "<td>" . $actual->getApellidos() . "</td>";
                        echo "<td>" . $actual->getTelefono1() . "</td>";
                        echo "<td>" . $actual->getTelefono2() . "</td>";
                        echo "<td>" . $actual->getDireccion() . "</td>";
                        echo "</tr>";
                        $actual = $contactos->iterate();
                    }
                }
                ?>
                <form action="/" method="POST">
                    <input type="SUBMIT" value="Agregar contacto" name="agrega">
                    <input type="SUBMIT" value="Borrar contacto" name="borra">
                </form>
            </table>
        </body>
    </html>
<?php } ?>