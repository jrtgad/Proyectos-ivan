<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conversor de divisas</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <h1>Conversor de divisas</h1>
        <form action="conversor.php" method="POST">
            <input type="text" name="cant" required="required">
            <ul>
                <li><input type="radio" name="origen" value="EUR">Euros</li>
                <li><input type="radio" name="origen" value="USD">D&oacute;lares</li>
                <li><input type="radio" name="origen" value="GBP">Libras</li>
                <li><input type="radio" name="origen" value="CNY">Yuanes</li>     
            </ul>
            &nbsp;pasarlo a&nbsp;
            <ul>
                <li><input type="radio" name="resultado" value="EUR2">Euros</li>
                <li><input type="radio" name="resultado" value="USD2">D&oacute;lares</li>
                <li><input type="radio" name="resultado" value="GBP2">Libras</li>
                <li><input type="radio" name="resultado" value="CNY2">Yuanes</li>     
            </ul>
            <br>
            <input type="submit" name="conv">
            
        </form>
    </body>
</html>
