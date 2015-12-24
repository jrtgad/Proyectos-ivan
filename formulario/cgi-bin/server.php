<<<<<<< HEAD
<?php
if (isset($_POST)) {
    try {
        $pairs = $_POST;
        $content = "";
        
        $file = fopen('./users/'.uniqid().'.txt', "w+");
        foreach ($pairs as $field => $value) {
            if ($field != "send") {
                fwrite($file, $field . " => " . $value  . PHP_EOL);
            }
        }
        fclose($file);
		setcookie ("micookie" , "correct" );
		header("Location: ./../html/correct.html");
    } catch (Exception $e){
	setcookie ("micookie" , "error");
        header("Location: ./../html/error.html");
    }
=======
<?php
if (isset($_POST)) {
    try {
        $pairs = $_POST;
        $content = "";
        
        $file = fopen('./users/'.uniqid().'.txt', "w+");
        foreach ($pairs as $field => $value) {
            if ($field != "send") {
                fwrite($file, $field . " => " . $value  . PHP_EOL);
            }
        }
        fclose($file);
		setcookie ("micookie" , "correct" );
		header("Location: ./../html/correct.html");
    } catch (Exception $e){
	setcookie ("micookie" , "error");
        header("Location: ./../html/error.html");
    }
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
}