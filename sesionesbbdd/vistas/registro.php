<?php
    if ($view !== "registro") {
        header("Location: /");
    } else {
?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>
                    Registro en la aplicación
                </title>
            </head>
            <body>
                <form action="index.php" method="POST">
                    <label for="userReg" value="Usuario">
                    <input type="text" name="userReg">
                    <label for="mailReg" value="E-mail">
                    <input type="email" name="mailReg">
                    <label for="passReg" value="Contraseña">
                    <input type="password" name="passReg">
                    <label for="pintores" value="Elija su pintor favorito">
                    <select name="pintores">
                        <option value="1">Boticceli</option>
                        <option value="2">Durero</option>
                        <option value="3">Da Vinci</option>
                        <option value="4">Miguel Angel</option>
                        <option value="5">Van Eyck</option>
                    </select>
                    <input type="SUBMIT" value="Registrarse" name="botonRegistrado">
                </form>
            </body>
        </html>
<?php
    }
?>