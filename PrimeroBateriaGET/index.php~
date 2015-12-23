<<<<<<< HEAD
<html>
    <head>   
        <title>Datos del Formulario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <style>
            .data {
                color: brown;
                display: block;
            }
            
            h1 {text-align: center;}
            
            .capaform {width: 600px; 
                       margin-left: auto; 
                       margin-right: auto;
                       position: relative;
                       top: 50px;
                       font-size: 20px;
                       text-align:left;
                       padding: 50px;
                       border: 5px solid orange}
            
            .form-font {font-size: 25px}
            
            input {font-size: 20px}
            
            select {font-size: 20px}
            
            .form-section {margin: 25px;}
            
            .submit {position: absolute;
                     right: 30px;
                     width: 80px;
                     height: 30px ;
                     background: orange}
        </style>
    </head>
<?php
if(!isset($_GET['botonenvio']))
{
    //Atento a la llave abierta, mirar más abajo
?>
    <body>
        <h1> Formulario de Registro de Cliente </h1>
        <div class="capaform">

            <form class="form-font" name="Formregistro" 
                  action="index.php" method="GET">
                <div class="form-section">
                    <label for="nombre"> Nombre: </Label> 
                    <input id="nombre" type="text"  required = "required" name="datos[nombre]" size="30" /> 
                </div>
                <div class="form-section">
                    <label for="contrasenia"> Contrase&ntilde;a: </Label> 
                    <input id="contrasenia" type="password"  required = "required" name="datos[contrasenia]" size="20"/> 
                </div>
                <div class="form-section">
                    <label for="fechanac"> Fecha de Nacimiento: </Label> 
                    <input id="fechanac" type="date"  required = "required" name="datos[fecha]">
                </div>
                <div class="form-section">
                    <label for="nomtienda"> Tienda: </Label> 
                    <select id="nomtienda" name="datos[poblacion]">
                        <option value="Madrid">Madrid</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Valencia">Valencia</option>
                    </select> 
                </div>
                <div class="form-section">
                    Edad: 
                    <label for="m25"> Menor de 25 </Label>
                    <input id="m25" type="radio" name="datos[edad]" value="Menor 25" /> 
                    <label for="e25-50"> Entre 25 y 50 </Label>
                    <input id="e25-50" type="radio" name="datos[edad]" value="Entre 25 y 50" /> 
                    <label for="M50"> Mayor de 50 </Label>
                    <input id="M50" type="radio" name="datos[edad]" value="Mayor 50" /> 
                </div>
                <div class="form-section">
                    <input id="suscripcion" type="checkbox"  name="datos[suscripcion]"
                            checked="checked"/> 
                    <label for="suscripcion"> Suscripci&oacuten a la revista semanal </label>
                </div>
                <input class="submit" type="submit" 
                       value="Enviar" name="botonenvio" /> 
            </form>   
        </div>
    </body>
<?php
    //Abrir un modulo php para cerrar la llave de arriba
}
else
{
    $datos = $_GET['datos'];
    
    $nombre = htmlspecialchars($datos['nombre']);
    $contrasenia = htmlspecialchars($datos['contrasenia']);
    $fechanac = htmlspecialchars($datos['fecha']);
    $nomtienda = htmlspecialchars($datos['poblacion']);
    if (isset($datos['edad'])) 
    {
        $edad = $datos['edad'];
    } 
    else 
    {
        $edad = "No introducida";
    }
    if (isset($datos['suscripcion'])) 
    {
        $suscripcion = "Solicitada";
    } 
    else 
    {
        $suscripcion = "No solicitada";
    }
 ?>   
            <body>
                <h1>
                    Sus datos son los siguientes: <br/> <br/>
                    Nombre: <em class='data'><?php  echo $nombre ?></em>
                    Contrase&ntilde;a: <em class='data'><?php echo $contrasenia ?></em>
                    Fecha de nacimiento: <em class='data'><?php  echo $fechanac ?></em>
                    Tienda: <em class='data'><?php echo $nomtienda ?></em>
                    Edad: <em class='data'><?php echo $edad ?></em>
                    Suscripci&oacuten: <em class='data'><?php echo $suscripcion ?></em>
                </h1>
            </body>
<?php
}
?>
=======
<html>
    <head>   
        <title>Datos del Formulario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <style>
            .data {
                color: brown;
                display: block;
            }
            
            h1 {text-align: center;}
            
            .capaform {width: 600px; 
                       margin-left: auto; 
                       margin-right: auto;
                       position: relative;
                       top: 50px;
                       font-size: 20px;
                       text-align:left;
                       padding: 50px;
                       border: 5px solid orange}
            
            .form-font {font-size: 25px}
            
            input {font-size: 20px}
            
            select {font-size: 20px}
            
            .form-section {margin: 25px;}
            
            .submit {position: absolute;
                     right: 30px;
                     width: 80px;
                     height: 30px ;
                     background: orange}
        </style>
    </head>
<?php
if(!isset($_GET['botonenvio']))
{
    //Atento a la llave abierta, mirar más abajo
?>
    <body>
        <h1> Formulario de Registro de Cliente </h1>
        <div class="capaform">

            <form class="form-font" name="Formregistro" 
                  action="index.php" method="GET">
                <div class="form-section">
                    <label for="nombre"> Nombre: </Label> 
                    <input id="nombre" type="text"  required = "required" name="datos[nombre]" size="30" /> 
                </div>
                <div class="form-section">
                    <label for="contrasenia"> Contrase&ntilde;a: </Label> 
                    <input id="contrasenia" type="password"  required = "required" name="datos[contrasenia]" size="20"/> 
                </div>
                <div class="form-section">
                    <label for="fechanac"> Fecha de Nacimiento: </Label> 
                    <input id="fechanac" type="date"  required = "required" name="datos[fecha]">
                </div>
                <div class="form-section">
                    <label for="nomtienda"> Tienda: </Label> 
                    <select id="nomtienda" name="datos[poblacion]">
                        <option value="Madrid">Madrid</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Valencia">Valencia</option>
                    </select> 
                </div>
                <div class="form-section">
                    Edad: 
                    <label for="m25"> Menor de 25 </Label>
                    <input id="m25" type="radio" name="datos[edad]" value="Menor 25" /> 
                    <label for="e25-50"> Entre 25 y 50 </Label>
                    <input id="e25-50" type="radio" name="datos[edad]" value="Entre 25 y 50" /> 
                    <label for="M50"> Mayor de 50 </Label>
                    <input id="M50" type="radio" name="datos[edad]" value="Mayor 50" /> 
                </div>
                <div class="form-section">
                    <input id="suscripcion" type="checkbox"  name="datos[suscripcion]"
                            checked="checked"/> 
                    <label for="suscripcion"> Suscripci&oacuten a la revista semanal </label>
                </div>
                <input class="submit" type="submit" 
                       value="Enviar" name="botonenvio" /> 
            </form>   
        </div>
    </body>
<?php
    //Abrir un modulo php para cerrar la llave de arriba
}
else
{
    $datos = $_GET['datos'];
    
    $nombre = htmlspecialchars($datos['nombre']);
    $contrasenia = htmlspecialchars($datos['contrasenia']);
    $fechanac = htmlspecialchars($datos['fecha']);
    $nomtienda = htmlspecialchars($datos['poblacion']);
    if (isset($datos['edad'])) 
    {
        $edad = $datos['edad'];
    } 
    else 
    {
        $edad = "No introducida";
    }
    if (isset($datos['suscripcion'])) 
    {
        $suscripcion = "Solicitada";
    } 
    else 
    {
        $suscripcion = "No solicitada";
    }
 ?>   
            <body>
                <h1>
                    Sus datos son los siguientes: <br/> <br/>
                    Nombre: <em class='data'><?php  echo $nombre ?></em>
                    Contrase&ntilde;a: <em class='data'><?php echo $contrasenia ?></em>
                    Fecha de nacimiento: <em class='data'><?php  echo $fechanac ?></em>
                    Tienda: <em class='data'><?php echo $nomtienda ?></em>
                    Edad: <em class='data'><?php echo $edad ?></em>
                    Suscripci&oacuten: <em class='data'><?php echo $suscripcion ?></em>
                </h1>
            </body>
<?php
}
?>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>