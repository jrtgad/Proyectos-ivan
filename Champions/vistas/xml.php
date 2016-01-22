<?php
    if ($view !== "xml") {
        header("Location: /");
    } else {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>XMLLLLLLL</title>
                <link rel="stylesheet" href="../css/styles.css">
            </head>
            <body>
                <div>
                    <h1>Resumen partida</h1>

                    <?php
                    $xmlstr = <<<XML
<?xml version="1.0" standalone="yes" ?>
<equipos></equipos>
XML;

                    $xml = new SimpleXMLElement($xmlstr);

                    //todas las partidas
                    foreach ($equipos as $equipo) {

                        $eq = $xml->addChild("equipo");
                        $eq->addChild("id", $equipo->getId());
                        //$currentEquipo = $equipo->getByProperty("_Id", $key)->getPuntos();
                        $eq->addChild("puntos", $equipo->getPuntos());
                        //$eq->addAttribute("id", $current->getId());
                        $eq->addChild("golesF", $equipo->getGolesF());
                        $eq->addChild("golesC", $equipo->getGolesC());
                    }
                    ?>
                    <code class="language-xml">

                        <?php echo htmlspecialchars($xml->asXML()) ?>
                        <form action="/" method="POST">
                            <input type="submit" name="menu" value="Volver">
                        </form>
                    </code>
                </div>
            </body>
        </html>

        <?php
    }
?>