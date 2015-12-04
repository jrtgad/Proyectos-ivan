<?php
if ($view !== "alta") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Inserción de nuevo usuario</title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
            <form action="/" method="POST">

                <?php
                if (isset($msg)) {
                    echo "<h1>" . $msg . "</h1>";
                }
                ?>

                <label for="user">Usuario:</label><br>
                <input type="text" name="user"><br>
                <label for="pass">Contraseña:</label><br>
                <input type="text" name="pass"><br>
                <select id="rolusuario">
                    <option value="usuario">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>

                <input type="SUBMIT" value="Dar de alta" name="altauser">
            </form>
        </body>
    </html>
    <?php
}
?>
