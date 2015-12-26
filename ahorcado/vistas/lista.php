<?php
if ($view !== "lista") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title></title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
            <form action="/" method="POST">
                <input type="submit" name="logout" value="Log out">
                <input type="submit" name="newPartida" value="Nueva partida">
                <?php
<<<<<<< HEAD
                echo "<h1>Hola " . $user->getUser() . "</h1>";
                //$user->recuperaPartidas();
=======
                echo "<h1>Hola " . $_SESSION['user'] . "</h1>";
                $user->recuperaPartidas();
>>>>>>> 8d1012099c0daaee5a0d8cf9690bb7f76609a479
                ?>

            </form>
        </body>
    </html>

    <?php
}
?>