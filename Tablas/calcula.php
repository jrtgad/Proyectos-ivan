<html>
    <head></head>
    <body>

<?php

    $num = $_POST['num'];  
    $numero = $num['numero'];
    
    //Lo hacemos para cualquier número en lugar de 0-9
    //Si la funcion devuelve false, hay alguna letra
    if(!checkLetters($numero))
    {
        header('Location: http://localhost:8000');
    }
    else
    {
        generaTabla($numero);
    }

?>

    </body>
</html>
<?php

function generaTabla($arg)
{
    $i = 1;
    echo "<table><th>La tabla del $arg</th>";
    while($i <= 10)
    {
        $aux = $arg * $i;
        echo "<tr><td>$arg * $i</td><td> = </td><td>$aux</td></tr>";
        $i++;
        
    }
    echo "</table></br>";
}

function checkLetters($entrada)
{
    $bool = true;
    
    //Separamos por caracteres
    $arr = str_split($entrada);
    
    //recorremos el array de caracteres
    for($i=0; $i<(strlen($entrada)-1); $i++)
    {
        //Comparamos si cada valor del array es un entero
        if(($arr[$i] != "," || $arr[$i] != "-" || $arr[$i] != " ")
                && !is_integer($arr[$i]))
        {
            //en el momento que un caracter 
            //no sea entero, el booleano pasa a false
            $bool = false;
        }
        else
        {
            generaTabla($arr[$i]);
        }
    }
    return $bool;
}

function splitNum($arg){
    if(!is_numeric($arg[0])) {
        header('Location: http://localhost:8000');
    }else{
        if($arg[$i] == "-")
        {
            for($i = $arg[$i-1]; $i <= $arg[$i+1]; $i++){
                $i = (int) $i;
                generaTabla($i);
            }
        }
    }
}

?>