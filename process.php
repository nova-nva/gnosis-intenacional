<?php
require_once "./config.php";

function getTarot($num){
    return "./images/tarot/tarot0" . $num . ".jpg";
}

function getZodiac($month, $day){
    if($month == 1){
        if($day <= 19){
            return 'capricornio';
        }
        else if($day >= 20){
            return 'acuario';
        }
    }
    else if($month == 2){
        if($day <= 19){
            return 'acuario';
        }
        else if($day >= 20){
            return 'piscis';
        }
    }
    else if($month == 3){
        if ($day >= 21){
            return 'aries';
        }
        else if($day <= 20){
            return 'piscis';
        }
    }
    else if($month == 4){
        if($day <= 19){
            return 'aries';
        }
        else if($day >= 20){
            return 'tauro';
        }
    }
    else if($month == 5){
        if($day <= 19){
            return 'tauro';
        }
        else if ($day >= 20){
            return 'geminis';
        }
    }
    else if($month == 6){
        if($day <= 20){
            return 'geminis';
        }
        else if($day >= 21){
            return 'cancer';
        }
    }
    else if($month == 7){
        if($day <= 22){
            return 'cancer';
        }
        else if($day >= 23){
            return 'leo';
        }
    }
    else if($month == 8){
        if($day <= 22) {
            return 'leo';
        }
        else if($day >= 23){
            return 'virgo';
        }
    }
    else if($month == 9){
        if($day <= 22){
            return 'virgo';
        }
        else if($day >= 23){
            return 'libra';
        }
    }
    else if($month == 10){
        if($day <= 22){
            return 'libra';
        }
        else if($day >= 23){
            return 'escorpio';
        }
    }
    else if($month == 11){
        if($day <= 22){
            return 'escorpio';
        }
        else if($day >= 23){
            return 'sagitario';
        }
    }
    else if($month == 12){
        if($day <= 19){
            return 'sagitario';
        }
        else if($day >= 20){
            return 'capricornio';
        }
    }
}

function getZodiacImage($sign){
    return "./images/zodiaco/" . $sign . ".jpg";
}

function getFinalDate($date){
    $fragmented = explode("-", $date);   
    $newDate = $fragmented[2] . "/" . $fragmented[1] . "/" . $fragmented[0];
    return $newDate;
}

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

function getFullMonth($month){
    switch ($month) {
        case '1':
            return 'Enero';
            break;
        case '2':
            return 'Febrero';
            break;
        case '3':
            return 'Marzo';
            break;
        case '4':
            return 'Abril';
            break;
        case '5':
            return 'Mayo';
            break;
        case '6':
            return 'Junio';
            break;
        case '7':
            return 'Julio';
            break;
        case '8':
            return 'Agosto';
            break;
        case '9':
            return 'Septiembre';
            break;
        case '10':
            return 'Octubre';
            break;
        case '11':
            return 'Noviembre';
            break;
        case '12':
            return 'Diciembre';
            break;
    }
}

// Proceso de tildes
$accents = array("á", "é", "í", "ó", "ú");
$no_accents = array("a", "e", "i", "o", "u");

$pre_name = $_POST['name'];
$name = str_replace($accents, $no_accents, $pre_name);
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
    $word= strtolower($names[$i]);
    $word = str_replace($accents, $no_accents, $word);
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
    $word = str_replace($accents, $no_accents, $word);
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
<html lang="es">
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
        .important{
            color: red;
        }
        .ltl{
            font-size: small;
            text-align: justify;
        }
    </style>    
</head>
<body>
    <div class="container">
        <br>
        <p>
            Sabias que dentro del nombre de las personas, según el sentido de las letras, se encierra el Karma?. Esta afirmación del Esoterista Samael Aun Weor en su libro Curso Zodiacal nos invita a explorar el sentido de nuestro nombre desde sus origenes y asi encontrarle sus significados más trascendentes.
        </p>            
        <p>
            Existen formulas Kabalisticas muy antiguas que nos permiten encontrar el razgo caracteristico de cada individuo. Para poder entenderlas se necesitarian volumenes y horas de estudios. Es por esto que basados en las formulas del Esoterista Samael Aun Weor e Iglesias Janeiro te brindamos los resultados exactos de sus formulas de manera sencilla y a tu alcance.
        </p>            
        <p>
            Si quieres profundizar en la ciencia de la KÁBALA te invitamos a un curso gratuito <a href="https://www.gnosisinternacional.com/curso-de-kabala-online" target="_blank">aqui</a> o bien estudiar los libros fuente como Tarot y Kabala, La Arcana de los numeros y La Cabala de prediccion.<br>
        </p>
        <br>
        <center>
            <p>¡AHORA TUS RESULTADOS!</p>
            <p><h1><?php echo $pre_name?></h1></p>
            <p style="font-size: small;">FECHA DE NACIMIENTO: <?php echo $day . " de " . getFullMonth($month) . " de " . $year?> </p>
        </center>
        <br><br>
        <div class="row">
            <div class="col 4">
                <center>
                <br><br><img src="<?php echo getTarot($urgency) ?>" width="400" height="800"><br><br>
                <a href="<?php echo $tarot_links[$tonica]?>" target="_blank">Explora tu carta egipcia</a>
                </center>
            </div>
            <div class="col 6">
                <br><h2>NUMEROLOGÍA</h2><br>
                <p class="ltl">
                    LA TÓNICA FUNDAMENTAL
                    Representa el perfil psicológico del individuo, sus características predominantes, eso que lo define. Viene siendo en la Numerología el equivalente de lo que es el Signo Zodiacal en la astrología
                </p>
                <p class="important ltl">TU TÓNICA FUNDAMENTAL ES: <?php echo $urgency . "<br>" . $tonic_results[$urgency]; ?></p><br><br>
                <p class="ltl">
                    LA URGENCIA INTERIOR
                    como su nombre lo indica es un aspecto de sí mismos (o varios) que son urgentes conocer como parte del proceso del autoconomiento. Aspectos que en cada encarnación son preponderantes en el individuo y que resultan de gran utilidad conocerlos, para avanzar en el camino.                </p>
                <p class="important ltl">TU URGENCIA INTERIOR ES: <?php echo $tonica  . "<br>" . $urgency_results[$tonica]; ?></p><br><br>
                <p class="ltl">
                    LA NATURALEZA EMOTIVA
                    se refiere a como funcionan las emociones en cada uno de nosotros. Cual es nuestra natural inclinación a la hora de expresas nuestros sentimientos. Todo el mundo tiene emociones, pero la forma en que se manifiestan (sienten, interior) y se expresan (exterior) es muy particular. Y este análisis nos ayuda a entender un poco mejor eso, como parte de nuestro autoconocimiento.
                <p class="important ltl">TU NATURALEZA EMOTIVA ES: <?php echo $emotiveNature . "<br>" . $nature_results[$emotiveNature]; ?></p><br><br>
                <p class="ltl">
                    LA CONSTITUCIÓN FÍSICA
                    esta especialmente enfocado a la Salud y funcionamiento en general del Cuerpo Físico
                    <p class="important ltl">TU CONSTITUCIÓN FÍSICA ES: <?php echo $physicConstitution . "<br>" . $physic_results[$physicConstitution]; ?></p><br><br>
                <p class="ltl">
                    EL TALENTO NATURAL
                    nos habla de un aspecto DESTACADO de nuestra personalidad, una inclinación (positiva o negativa) muy marcada en cada uno, por lo que viene este análisis a ser un complemento adecuado de la TONICA.
                    <p class="important ltl">TU TALENTO NATURAL ES: <?php echo $naturalTalent . "<br>" . $talent_results[$naturalTalent]; ?></p><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col 6">
                <h2>ASTROLOGÍA</h2>
                <p>TU SIGNO: <?php echo strtoupper(getZodiac($month, $day)); ?></p><br>

                <p class="ltl"><?php echo $zodiac_results[getZodiac($month, $day)]; ?></p><br>
                <h3>52 AVOS</h3><br>
                <p class="ltl">Son siete periodos de 52 días, que se calculan a partir de tu cumpleaños y están relacionadas con nuestros negocios y papeleos.</p>
                <p>
                <?php 
                echo "<p class='ltl'>";
                for($i = 0; $i<count($fifty_init); $i++){
                    echo "<span class='important'>Periodo del " . getFinalDate($fifty_init[$i]) . " al " . getFinalDate($fifty_end[$i]) . "</span>"; 
                    echo " - " . $fiftys[$i+1] . "<br><br>";
                }
                echo "</p>";
                ?>
                </p>
            </div>
            <div class="col 4">
                <center>
                <br><br><br><img src="<?php echo getZodiacImage(getZodiac($month, $day)) ?>" width="400" height="700"><br><br>
                <a href="<?php echo $zodiac_links[getZodiac($month, $day)]?>" target="_blank">Explora tu signo</a>
                </center>
            </div>
        </div>
    </div>
</body>
</html>