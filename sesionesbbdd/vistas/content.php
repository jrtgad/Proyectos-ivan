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
                        echo "<h1 class=\"error\">" . $msg . "</h1>";
                    }
                ?>
                <form action="/" method="POST" class="formulario">
                    <input type="SUBMIT" class="boton" name="botonlogout" value="Cerrar sesión">
                    <input type="SUBMIT" class="boton" name="botonbaja" value="Darse de baja">
                    <input type="SUBMIT" class="boton" name="botonmodifica" value="Modificar perfil">
                    <h1>Hola, <?php echo $_SESSION['user']->getUser()?></h1>
                    <?php
                        echo "<img src=\"img/" . $user->getPintor()->getCuadroAleatorio() . ".jpg\"></img>";
                    ?>

                </form>
            </body>
        </html>
<?php
    }
?>