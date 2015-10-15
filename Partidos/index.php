<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Champions</title>
        <style>
            form{text-align: center;
                   display: block;}
        </style>
    </head>
    <body>
        <form action="puntua.php" method="POST">
            <h1>Liga de campeones</h1>
            <table>
                <tr>
                    <td>Local</td>
                    <td>Resultado</td>
                    <td>Visitante</td>
                </tr>
                <tr>
                    <td name="datos[local]">
                        Real Madrid
                    </td>
                    <td>
                        <input $type="text" $name="datos[resultado]">
                    </td>
                    <td name="datos[visitante]">
                        Manchester United
                    </td>
                </tr>
                <tr>
                    <td name="datos[local]">
                        Real Madrid
                    </td>
                    <td>
                        <input $type="text" $name="datos[resultado]">
                    </td>
                    <td $name="datos[visitante]">
                        AC Milan
                    </td>
                </tr>
                <tr>
                    <td name="datos[local]">
                        Manchester United
                    </td>
                    <td>
                        <input $type="text" $name="datos[resultado]">
                    </td>
                    <td name="datos[visitante]">
                        Real Madrid
                    </td>
                </tr>
                <tr>
                    <td name="datos[local]">
                        Manchester United
                    </td>
                    <td>
                        <input $type="text" $name="datos[resultado]">
                    </td>
                    <td name="">
                        Ac Milan
                    </td>
                </tr>
                <tr>
                    <td name="datos[local]">
                        Ac Milan
                    </td>
                    <td>
                        <input $type="text" $name="datos[resultado]">
                    </td>
                    <td name="datos[visitante]">
                        Manchester United
                    </td>
                </tr>
                <tr>
                    <td name="datos[local]">
                        Ac Milan
                    </td>
                    <td>
                        <input $type="text" $name="datos[resultado]">
                    </td>
                    <td name="datos[visitante]">
                        Real Madrid
                    </td>
                </tr>
            </table>
        </form>
        
    </body>
</html>
