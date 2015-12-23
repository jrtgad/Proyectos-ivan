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
}