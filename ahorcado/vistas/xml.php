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
<partidas></partidas>
XML;

                $xml = new SimpleXMLElement($xmlstr);

                //todas las partidas
                foreach ($arrayXml as $key => $partida) {
                    $arrayPartidas = $xml->addChild("partida");
                    //addLoQSea(Nombre, valor)
                    //id partida
                    $arrayPartidas->addAttribute("id", $key);
                    $currentJugadas = $user->getPartidas()->getByProperty("_IdPartida", $key)->getJugadas();


                    //todas las jugadas
                    $current = $currentJugadas->iterate();
                    while ($current) {
                        $jug = $arrayPartidas->addChild("jugada");
                        //id jugada
                        $jug->addAttribute("id", $current->getId());
                        $jug->addChild("letra", $current->getLetra());
                        $current = $currentJugadas->iterate();
                    }
                }
                ?>
                <code class="language-xml">

                    <!--Este es el que imprime-->



                    <?php
                        echo htmlspecialchars($xml->asXML());

                        $fp = fopen("../xml/partida.xml", "+w");
                        fwrite($fp, $xml);
                        fclose($fp);
                    ?>
                    <form action="/" method="POST">

                        <a href="xml/partida.xml" target="blank">Descargar</a>
                        <input type="submit" name="volver" value="Volver">
                    </form>
                </code>
            </div>
        </body>
    </html>

    <?php
}
?>