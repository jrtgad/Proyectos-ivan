<<<<<<< HEAD
<html>
    <head>
        <title>Encuentra palabras</title>
    </head>
    <body>
        
    <?php

    function checkEro($word, &$success) {
        $pos = strpos($word, 'ero');
        $success = 0;
        
        if($pos && ($pos === (strlen($word) -3))){
            $success++;
        }
        return ($pos && ($pos === (strlen($word) -3)));
    }
    
    function checkLength($word, &$howLong) {
        $length = strlen($word);
        $howLong = 0;
        
        if($length < 8 || $length > 10){
            $howLong = $howLong++;
        }
                
        return ($length < 8 || $length > 10);
    }
    
    function checkCapitals($word, &$capitals) {
        $mayus = strpos($word, 0);
        $capitals = 0;
        
        if(ctype_upper($mayus)){
            $capitals = $capitals++;
        }
        return (ctype_upper($mayus));
    }
    
    function checkVowels($word, &$howManyVowels) {
        $letters = str_split($word);
        $howManyVowels = 0;
        
        foreach ($letters as $letter)
        {
            $letter = strtolower($letter);
            
            if ($letter == 'a' || $letter == 'e' || $letter == 'i' || 
                    $letter == 'o' || $letter = 'u'){
                $howManyVowels = $howManyVowels++;
            }
            
            return ($howManyVowels >= 4);
        }
    }
    
    function multiExplode($splitters, $text) {
        $texto = str_replace($splitters, $splitters[0], $text);
        return explode($splitters[0], $texto);
    }

    $text = $_POST['texto'];
    
    $splitters = [',', ' ', '\n', '\t', '.', ':', ';'];
    
    $palabras = multiExplode($splitters, $text);
    /*$mayus = false;
    $between = 0;
    $vowels = 0;
    $endsin = 0;*/
    
    foreach ($palabras as $word) {
        if(checkEro($word, $success) && checkVowels($word, $howManyVowels)
                && checkCapitals($word, $capitals) && checkLength($word, $howLong)){
            echo "<br>$word acaba en 'ero'";
            echo ", tiene más de 4 vocales";
            echo ", empieza por may&uacutescula";
            echo " y tiene entre 8 y 10 letras";
        }
    }
?>
    </body>
=======
<html>
    <head>
        <title>Encuentra palabras</title>
    </head>
    <body>
        
    <?php

    function checkEro($word, &$success) {
        $pos = strpos($word, 'ero');
        $success = 0;
        
        if($pos && ($pos === (strlen($word) -3))){
            $success++;
        }
        return ($pos && ($pos === (strlen($word) -3)));
    }
    
    function checkLength($word, &$howLong) {
        $length = strlen($word);
        $howLong = 0;
        
        if($length < 8 || $length > 10){
            $howLong = $howLong++;
        }
                
        return ($length < 8 || $length > 10);
    }
    
    function checkCapitals($word, &$capitals) {
        $mayus = strpos($word, 0);
        $capitals = 0;
        
        if(ctype_upper($mayus)){
            $capitals = $capitals++;
        }
        return (ctype_upper($mayus));
    }
    
    function checkVowels($word, &$howManyVowels) {
        $letters = str_split($word);
        $howManyVowels = 0;
        
        foreach ($letters as $letter)
        {
            $letter = strtolower($letter);
            
            if ($letter == 'a' || $letter == 'e' || $letter == 'i' || 
                    $letter == 'o' || $letter = 'u'){
                $howManyVowels = $howManyVowels++;
            }
            
            return ($howManyVowels >= 4);
        }
    }
    
    function multiExplode($splitters, $text) {
        $texto = str_replace($splitters, $splitters[0], $text);
        return explode($splitters[0], $texto);
    }

    $text = $_POST['texto'];
    
    $splitters = [',', ' ', '\n', '\t', '.', ':', ';'];
    
    $palabras = multiExplode($splitters, $text);
    /*$mayus = false;
    $between = 0;
    $vowels = 0;
    $endsin = 0;*/
    
    foreach ($palabras as $word) {
        if(checkEro($word, $success) && checkVowels($word, $howManyVowels)
                && checkCapitals($word, $capitals) && checkLength($word, $howLong)){
            echo "<br>$word acaba en 'ero'";
            echo ", tiene más de 4 vocales";
            echo ", empieza por may&uacutescula";
            echo " y tiene entre 8 y 10 letras";
        }
    }
?>
    </body>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
</html>