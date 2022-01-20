<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cabala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="styles/form.css">
</head>
<body style="padding: 2%">
    <section class="container-fluid container">
        <main>
            <h1 class="text-center" style="font-weight: bold;">Estudio Numerológico</h1>
            <br>
            <p>
                Llena los siguientes datos para obtener tu urgencia interior 
                (un tipo de signo zodiacal numérico), tu tónica fundamental
                (lo que tiene que hacer para tener éxito en la vida) y otros
                datos de más importancia
            </p>
            <br>
        </main>

        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col md-3">
            <form class="form-container" method="post" action="./process.php">
                <div class="form-group">
                    <label for="name" class="form-label">Nombres y apellidos completos:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <br>
                <p>Fecha de nacimiento</p>
                <div class="form-group">
                    <label for="day" class="form-label">Día:</label>
                    <input type="number" class="form-control" id="day" name="day" min="1" max="31" required>
                </div>
                <div class="form-group">
                    <label for="month" class="form-label">Mes:</label>
                    <select class="form-control" id="month" name="month" required>
                        <option value="">Elija un mes...</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year" class="form-label">Año:</label>
                    <select class="form-control" id="year" name="year" required>
                        <option value="">Elija un año...</option>
                        <?php
                        $year = (int) date("Y");
                        for ($i= $year; $i >= $year - 110; $i--) { 
                            echo '<option value="' . $i . '"> ' . $i . '</option>';
                        }
                        ?>                
                    </select>
                </div>
                <br><br>
                <center>
                <button type="submit" class="btn btn-primary">Calcular Estudio</button>
                </center>
            </form>
            </section>
        </section>
    </section>
    </body>
</html>