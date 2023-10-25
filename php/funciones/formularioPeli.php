<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<?php require "../funciones/bbdd_peliculas.php" ?>
</head>

<body>
    <?php
    function depurar($entrada)
    {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_idpelicula = depurar($_POST["id_pelicula"]);
        $temp_titulo = depurar($_POST["titulo"]);
        $temp_fecha = depurar($_POST["fecha_estreno"]);
        if (isset($_POST["edad_recomendada"])) {
            $temp_edad = depurar($_POST["edad_recomendada"]);
        } else {
            $temp_edad = "";
        }

        #   Validación id_pelicula
        if (strlen($temp_idpelicula) == 0) {
            $err_idpelicula = "El id de la pelicula es obligatorio";
        } else {
            if (filter_var($temp_idpelicula, FILTER_VALIDATE_INT) == FALSE) {
                $err_idpelicula = "El id de la pelicula debe ser un numero entero";
            } else {
                if (strlen($temp_idpelicula) > 8) {
                    $err_idpelicula = "El id de la pelicula no puede tener mas de 8 caracteres";
                } else {
                    $temp_idpelicula = (int) $temp_idpelicula;
                    $id_pelicula = $temp_idpelicula;
                }
            }
        }
        #   Validación titulo
        if (strlen($temp_titulo) == 0) {
            $err_titulo = "El titulo es obligatorio";
        } else {
            if (strlen($temp_titulo) > 80) {
                $err_titulo = "El titulo no puede tener más de 80 caracteres";
            } else {
                $temp_titulo = strtolower($temp_titulo);
                $temp_titulo = ucwords($temp_titulo);
                $titulo = $temp_titulo;
            }
        }
        #   Validación fecha
        if (strlen($temp_fecha) == 0) {
            $err_fecha = "La fecha es obligatoria";
        } else {
            list($anyo, $mes, $dia) = explode('-', $temp_fecha);
            if ($anyo < 1895) {
                $err_fecha = "La fecha no puede ser anterior a 1895";
            } else {
                $fecha_estreno = $temp_fecha;
            }
        }
        #   Validación edad
        if (strlen($temp_edad) == 0) {
            $err_edad = "La edad es obligatoria";
        } else {
            $edades_recomendadas = [0, 3, 7, 12, 16, 18];
            if (!in_array($temp_edad, $edades_recomendadas)) {
                $err_edad = "La edad no es correcta";
            } else {
                $edad_recomendada = $temp_edad;
            }
        }
        if (isset($id_pelicula) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada)) {
            echo "<h1>Exito</h1>";
            $sql = "INSERT INTO peliculas VALUES ($id_pelicula, '$titulo', '$fecha_estreno', '$edad_recomendada')";

            $conexion->query($sql);
        }
    }

    ?>
    <div class="container">
        <h1>Insertar pelicula</h1>
        <div class="col-9">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">ID Pelicula: </label>
                    <input class="form-control" type="text" name="id_pelicula">
                    <?php if (isset($err_idpelicula)) echo $err_idpelicula ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="titulo">
                    <?php if (isset($err_titulo)) echo $err_titulo ?>
                </div>


                <div class="mb-3">
                    <label class="form-label">Fecha Estreno: </label>
                    <input class="form-control" type="date" name="fecha_estreno">
                    <?php if (isset($err_fecha)) echo $err_fecha ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edad Recomendada</label>
                    <select class="form-select" name="edad_recomendada" id="edad_recomendada">
                        <option disabled selected hidden>Selecciona una edad</option>
                        <option value="0">0</option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                    </select>
                    <?php if (isset($err_edad)) echo $err_edad ?>
                </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>