<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cuenta art&iacuteculos</title>
        <style>
            h1{text-align: center;}
            
            form{text-align: center;}
        </style>
    </head>
    <body>
        <h1>Escriba un texto metiendo artículos</h1>
        <form action="cuentarticulos.php" method="POST">
            <textarea name="texto" required="required"></textarea>
            <div class="centrado"><input type="SUBMIT" value="Cuenta!"/></div>
        </form>
    </body>
</html>
