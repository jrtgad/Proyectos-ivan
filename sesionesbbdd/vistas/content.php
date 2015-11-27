<?php
    if($view !== "content") {
        header("Location: /");
    } else {
?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Contenido</title>
                <link rel="stylesheet" href="../css/estilos.css">
            </head>
            <body>
                <form action="/" method="POST">
                    <input type="SUBMIT" name="botonlogout" value="Cerrar sesión">
                    <input type="SUBMIT" name="botonbaja" value="Darse de baja">

                    <?php
                        echo "<img src=\"img/" . $user->getPintor()->getCuadroAleatorio()->getCuadroAleatorio() . ".jpg\"</img>";
                    ?>

                </form>
            </body>
        </html>
<?php
    }
?>