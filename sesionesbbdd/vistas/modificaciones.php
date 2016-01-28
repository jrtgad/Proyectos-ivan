<?php
    if($view !== "modificaciones") {
        header("Location: /");
    } else {
?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Modifique su perfil</title>
                <link rel="stylesheet" href="../css/estilos.css">
            </head>
            <body>
                <form action="/" method="POST">
                    <label for="nuevoNom">Introduzca nuevo nombre de usuario</label><br>
                    <input type="text" name="nuevoNom"><br>
                    <label for="nuevaPass">Introduzca nueva contraseña</label><br>
                    <input type="pass" name="nuevaPass"><br>
                    <label for="nuevoMail">Introduzca nueva dirección de correo</label><br>
                    <input type="text" name="nuevoMail"><br>
                    <label for="pintores">Seleccione su pintor favorito</label><br>
                    <select name="pintores">
                        <?php
                            $pintores = Pintor::getPintores();
                            foreach ($pintores as $num => $pintor) {
                                echo "<option value=\"" . $pintor[0] . "\">" . $pintor[1] . "</option>";
                            }
                        ?>
                    </select><br><br>
                <input type="SUBMIT" value="Guardar" name="modificado">
                </form>
            </body>
        </html>
<?php
    }
?>