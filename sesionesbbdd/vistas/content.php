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
                <?php
                    if (isset($msg)) {
                        echo "<h1>" . $msg . "</h1>";
                    }
                ?>
                <form action="/" method="POST">
                    <input type="SUBMIT" name="botonlogout" value="Cerrar sesión">
                    <input type="SUBMIT" name="botonbaja" value="Darse de baja">
                    <input type="SUBMIT" name="botonmodifica" value="Modificar perfil">
                    <h1>Hola, <?php echo $_SESSION['user']->getUser()?></h1>
                    <?php
                        echo "<img src=\"img/" . $user->getPintor()->getCuadroAleatorio() . ".jpg\"</img>";
                    ?>

                </form>
            </body>
        </html>
<?php
    }
?>