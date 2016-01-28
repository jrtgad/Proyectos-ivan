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
                    <label for="userReg">Usuario</label><br>
                    <input type="text" name="userReg">
                    <br>
                    <label for="mailReg">E-mail</label><br>
                    <input type="email" name="mailReg">
                    <br>
                    <label for="passReg">Contraseña</label><br>
                    <input type="password" name="passReg">
                    <br>
                    <label for="pintores">Elija su pintor favorito</label><br>
                    <select name="pintores">
                    <?php
                        $pintores = Pintor::getPintores();
                        foreach ($pintores as $num => $pintor) {
                            echo "<option value=\"" . $pintor[0] . "\">" . $pintor[1] . "</option>";
                        }
                    ?>
                    <!-- Lo fácil
                        <option value="1">Boticceli</option>
                        <option value="2">Durero</option>
                        <option value="3">Da Vinci</option>
                        <option value="4">Miguel Angel</option>
                        <option value="5">Van Eyck</option>
                    -->
                    </select>
                    <input type="SUBMIT" value="Registrarse" name="botonRegistrarse">
                </form>
            </body>
        </html>
<?php
    }
?>