<?php
function recursive_addition($number){
    $len = strlen($number);
    if($len == 1){
        return $number;
    }
    else{
        $newSum = 0;
        $number = strval($number);
        while($len > 1){
            $newSum = 0;
            for ($i=0; $i < strlen($number); $i++) { 
                $newSum += $number[$i];
            }
            $number = strval($newSum);
            $len = strlen(strval($newSum));
        }
        return $newSum;
    }
}

$name = $_POST['name'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];

$names = explode(' ', $name);
$len = count($names);

// Tonica fundamental
$total_year = 0;
for ($i=0; $i < strlen($year); $i++) { 
    $total_year += $year[$i];
}
$sum = $day + $month + $total_year;
$tonica = recursive_addition($sum);

// Urgencia Interior
$preSum = 0;
for ($i=0; $i < count($names); $i++) { 
    $preSum += strlen($names[$i]);
}
$preSum += $tonica;
$urgency = recursive_addition($preSum);

// Naturaleza emotiva (vocales)
$vowels = array("a" => 1, "e" => 6, "i" => 10, "o" => 18, "u" => 24);
$v_counter = 0;
for($i = 0; $i<count($names); $i++){
    $word = strtolower($names[$i]);
    for($j = 0; $j<strlen($word); $j++){
        if($word[$j] == "a" || $word[$j] == "e" || $word[$j] == "i" || $word[$j] == "o" || $word[$j] == "u"){
            $v_counter += $vowels[$word[$j]];
        }
    }
}
$emotiveNature = recursive_addition($v_counter);

// Constitucion fisica (consonantes)
$consonants = array("b" => 2, "c" => 3, "ch" => 4, "d" => 5, "f" => 7, "g" => 8, "h" => 9, "j" => 11, "k" => 12, "l" => 13, "ll" => 14, "m" => 15, "n" => 16, "|" => 17, "p" => 19, "q" => 20, "r" => 21, "s" => 22, "t" => 23, "v" => 25, "w" => 50, "x" => 26, "y" => 27, "z" => 28);
$rpl = array("a", "e", "i", "o", "u");
$c_counter = 0;
for($i = 0; $i<count($names); $i++){
    $word = strtolower($names[$i]);
    $word = str_replace($rpl, "", $word);
    $word = str_replace("ñ", "|", $word);
    for($j = 0; $j<strlen($word); $j++){
        $letter = $word[$j];
        if($letter == "c"){
            if($j + 1 < strlen($word)){
                if($word[$j+1] == "h"){
                    $letter = $word[$j] . $word[$j+1];
                    $j++;
                }
            }
        }
        else if($letter == "l"){
            if($j + 1 < strlen($word)){
                if($word[$j+1] == "l"){
                    $letter = $word[$j] . $word[$j+1];
                    $j++;
                }
            }
        }
        $c_counter += $consonants[$letter];
    }
}
$physicConstitution = recursive_addition($c_counter);

// Talento natural (la suma de ambos)
$naturalTalent = recursive_addition($emotiveNature + $physicConstitution);

// 52avos
$init_date = date(date("Y"). "-" . $month . "-" . $day);
$fifty_init = array();
$fifty_end = array();
for($i = 0; $i<7; $i++){
    array_push($fifty_init, $init_date);
    $end_date = date("Y-m-d", strtotime($init_date . "+ 52 days"));
    array_push($fifty_end, $end_date);
    $init_date = $end_date;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>    
    <style>
        body{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding:3%;
        }
    </style>    
</head>
<body>
    <div class="container">
        <h1>Resultados</h1>
        <h4>La información ingresada por el usuario es la siguiente:</h4><br>
        <p>
            <b>Nombre: </b> <?php echo $name; ?>
        </p>
        <p>
            <b>Fecha de nacimiento:</b><br>
            <b>Día: </b> <?php echo $day ?><br>
            <b>Mes: </b> <?php echo $month ?><br>
            <b>Año: </b> <?php echo $year ?><br>
        </p>

        <br>
        <h4>Análisis previo del nombre:</h4><br>
        <p>
            <b>Número de palabras: </b> <?php echo $len ?>
        </p>
        <p>
            <b>Longitud de palabras: </b> <br>
            <?php
            for ($i=0; $i < $len; $i++) { 
                echo $names[$i] . '(' . strlen($names[$i]) . ') <br>';
            }
            ?>
        </p>
        <br>

        <h4>Resultados:</h4><br>
        <p>
            <b>Tónica fundamental:</b> <?php echo $tonica; ?>
            <br>
            <b>Urgencia interior:</b> <?php echo $urgency; ?>
            <br>
            <b>Naturaleza interior (vocales):</b> <?php echo $emotiveNature; ?>
            <br>
            <b>Constitucion fisica (consonantes):</b> <?php echo $physicConstitution; ?>
            <br>
            <b>Talento natural:</b> <?php echo $naturalTalent; ?>
            <br>
        </p>
        <br>

        <h4>52avos (yyyy-m-d):</h4>
        <p>
        <?php 
        echo "<ul>"; 
        for($i = 0; $i<count($fifty_init); $i++){
            echo "<li>"; 
            echo $fifty_init[$i] . "   ->   ";
            echo $fifty_end[$i];
            echo "</li>"; 
        }
        echo "</ul>"; 
        ?>
        </p>

    </div>
</body>
</html>