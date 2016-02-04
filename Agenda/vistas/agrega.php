<?php
if ($view !== "agregar") {
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
                <input type="text" name="name" placeholder="Escriba nombre" class="data">
                <input type="text" name="apellidos" placeholder="Escriba apellidos">
                <input type="text" name="tfn1" placeholder="Escriba teléfono 1">
                <input type="text" name="tfn2" placeholder="Escriba teléfono 2">
                <input type="text" name="direccion" placeholder="Escriba dirección">
                <input type="SUBMIT" value="Agregar" name="agregado">
            </form>
            <?php
            // put your code here
            ?>
        </body>
    </html>
<?php } ?>
