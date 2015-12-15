<?php
if ($view !== "lista") {
    header("Location: /");
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title></title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body>
            <form action="/" method="POST">
                <input type="submit" name="logout" value="Log out">
                <input type="submit" name="newPartida" value="Nueva partida">
                <?php
                echo "<h1>Hola " . $user . "</h1>";
                $user->recuperaPartidas();
                ?>

            </form>
        </body>
    </html>

    <?php
}
?>