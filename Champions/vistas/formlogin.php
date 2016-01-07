<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de acceso ahorcado</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <form action="/" method="POST" id="reg_user">

            <?php
                if (isset($msg)) {
                    echo "<h1>" . $msg . "</h1>";
                }
            ?>

            <label for="user">Usuario:</label><br>
            <input type="text" name="user"><br>
            <label for="pass">Contraseña:</label><br>
            <input type="text" name="pass"><br>

            <input type="SUBMIT" value="Log in" name="login">
        </form>
    </body>
</html>