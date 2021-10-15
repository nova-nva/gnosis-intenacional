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