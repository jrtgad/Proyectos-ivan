<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tablas de multiplicar</title>
        
        <style>
            
            .centrado{text-align: center;}
            
        </style>
    </head>
    <body>
        <div class="centrado">
            <h1>Tablas de multiplicar</h1>
            <form action="calcula.php" method="POST" name="calcula" style="align:center">

                <input type="text" name="num[numero]" id="numero" required="required">

                <input type="SUBMIT" name="envio" value="Enviar">

            </form>
        </div>
    </body>
</html>
