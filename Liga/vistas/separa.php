<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../styles/estilos.css">
    </head>
    <body>
        <form action="../puntua.php" method="POST">
            <table>
                <?php

                function multiExplode($splitters, $text) {
                    $texto = str_replace($splitters, ",", $text);
                    return explode(",", $texto);
                }

                $equipos = $_POST['equipos'];

//Separamos los equipos según estos caracteres
                $splitters = [",", ".", "\\", "/", ";", ":", "-"];
                $equipos = multiExplode($splitters, $equipos);

//$equipos = explode(",", $equipos);
//Ponemos todas las iniciales en mayúscula para hacerlo bonito :P
                for ($i = 0; $i < count($equipos); $i++) {
                    $equipos[$i] = ucwords(trim($equipos[$i]));
                }

//Sacamos una lista de visitantes, que serán los mismos que locales
                $equiposVisitantes = $equipos;

//Usado para el índice de cada partido datos[0][golL][golV][eqLoc][eqVis]
                $contadorPartidos = 0;

//Creamos la tabla de partidos
                foreach ($equipos as $local) {
                    foreach ($equiposVisitantes as $visitante) {
                        //Un equipo no puede jugar contra sí mismo
                        if ($local !== $visitante) {
                            echo "<tr><td>" . $local . "</td>";
                            //contadorPartidos será el número de partidos, empezando desde 0
                            echo "<input type=hidden value=" . trim($local) . " name=datos[" . $contadorPartidos . "][eqLoc]>";
                            echo "<td><input type=text name=datos[" . $contadorPartidos . "][golL]></td>";
                            echo "<td><input type=text name=datos[" . $contadorPartidos . "][golV]></td>";
                            echo "<td>" . $visitante . "</td></tr>";
                            echo "<input type=hidden value=" . trim($visitante) . " name=datos[" . $contadorPartidos . "][eqVis]>";
                            $contadorPartidos += 1;
                        }
                    }
                }
                ?>
            </table>
            <input type="submit" value="Enviar">
        </form>
    </body>