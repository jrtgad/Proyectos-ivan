<<<<<<< HEAD
<html>
    <head>
        <title></title>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

$num = $_POST['num'];

/*for($i=2; $i <= $num - 1; $i++) {
    if($num % $i) {
        $msg = "El número $num no es primo";
    } else {
        $msg = "El número $num es primo";
    }
}*/
$i=2;
$cont = 0;
while($i < $num) {
    if($num % $i) {
        
    } else {
        $cont++;
    }
    $i++;
}
if($cont) {
    $msg = " no es primo";
} else {
    $msg = " es primo";
}
include("index.php");
echo "$num $msg";

?>
        </div>            
    </body>
=======
<html>
    <head>
        <title></title>
        <style>
            .centrado{text-align: center;}
        </style>
    </head>
    <body>
        <div class="centrado">
<?php

$num = $_POST['num'];

/*for($i=2; $i <= $num - 1; $i++) {
    if($num % $i) {
        $msg = "El número $num no es primo";
    } else {
        $msg = "El número $num es primo";
    }
}*/
$i=2;
$cont = 0;
while($i < $num) {
    if($num % $i) {
        
    } else {
        $cont++;
    }
    $i++;
}
if($cont) {
    $msg = " no es primo";
} else {
    $msg = " es primo";
}
include("index.php");
echo "$num $msg";

?>
        </div>            
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>