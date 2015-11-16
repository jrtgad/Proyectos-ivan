<?php
    $fichero=fopen("tablasmul.txt","w");
    
    for ($factor1=1; $factor1<=10; $factor1++) 
    {
        for ($factor2=1; $factor2 <= 10; $factor2++)
        {
            $res = $factor1 * $factor2;
            fwrite($fichero, "$factor1 x $factor2 = $res \r\n");
        }
        fwrite($fichero, "*********\r\n");
    }

    fclose($fichero);
?>