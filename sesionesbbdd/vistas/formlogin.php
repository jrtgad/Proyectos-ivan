<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
        <form action="/" method="POST">
            <?php
                if(isset($msg)) {
                    echo "<h1>" . $msg . "</h1>";
                }
            ?>
            <label for="user">Introduzca su nombre de usuario</label>
            <input type="text" name="user">
            <label for="pass">Introduzca su contraseña</label>
            <input type="password" name="pass">
            <input type="SUBMIT" name="botonlogin" value="Log in">
            <input type="SUBMIT" name="botonregistro" value="Registrarse">
        </form>
    </body>
</html>

