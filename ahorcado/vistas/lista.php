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
                echo "<h1>Hola " . $_SESSION['user'] . "</h1>";
=======
                echo "<h1>Hola " . $user->getUser() . "</h1>";
>>>>>>> a7bf54701e9ea1d9028b8f6892d8e86e44b2a4c1
                $user->recuperaPartidas();
                ?>

            </form>
        </body>
    </html>

    <?php
}
?>