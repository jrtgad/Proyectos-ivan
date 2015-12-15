<?php
if ($view !== "admin") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Administración aplicación</title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
            <!--<div id="reg_user">-->
                <form action="/" method="POST">
                    <?php echo "<h2>Hola " . $user->getUser() . "</h2>" ?>
                    <?php if (isset($msg)) { echo $msg;} ?>
                    <input type="SUBMIT" name="botonlogout" value="Log out">
                    <input type="SUBMIT" name="alta" value="Nuevo usuario">
                </form>
            <!--</div>-->
        </body>
    </html>
<?php } ?>
