<?php
    if ($view !== "admin") {
        header("Location: /");
    } else {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Administración aplicación</title>
                <link rel="stylesheet" href="../css/styles.css">
            </head>
            <body>
                <!--<div id="reg_user">-->
                <form action="/" method="POST">
                    <?php echo "<h2>Hola " . $user->getUser() . "</h2>" ?>
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <input type="SUBMIT" name="logout" value="Log out">
                    <input type="SUBMIT" name="alta" value="Nuevo usuario">
                </form>
                <!--</div>-->
            </body>
        </html>
    <?php } ?>
