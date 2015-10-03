<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina!</title>
    </head>
    <body>
        
        <form action="procesa.php" method="POST"
            name="formadivina">
            
            <label for="min">M&iacute;nimo</label>
            <input name="num[min]" id="min" required="required" type="text">
            
            <br/>
            
            <label for="max">M&aacute;ximo</label>
            <input name="num[max]" id="max" required="required" type="text">
            
            <br/>
            
            <label for="sol">Soluci&oacute;n</label>
            <input name="num[sol]" id="sol" required="required" type="text">
            
            <input type="SUBMIT" value="Enviar" name="botonenvio">
            
        </form>
    </body>
</html>
