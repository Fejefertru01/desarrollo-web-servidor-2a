<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Peliculas</title>
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
        $temp_idpelicula = depurar("id_pelicula");
        $temp_titulo = depurar("titulo");
        $temp_fecha = depurar("fecha_estreno");
        $temp_edad = depurar("edad_recomendada");

        if (strlen($temp_idpelicula) == 0) {
            $err_idpelicula = "El campo ID Pelicula es obligatorio";
        } else {
            $patron = "/^[0-9]{1,8}$/";
            if ($temp_idpelicula < 0) {
                $err_idpelicula = "El campo ID Pelicula debe ser un numero positivo";
            } else if (!preg_match($patron, $temp_idpelicula)) {
                $err_idpelicula = "El ID Pelicula debe ser un numero positivo con 8 caracteres como mucho";
            } else {
                $id_pelicula = $temp_idpelicula;
                echo $id_pelicula;
            }
        }
    }

    ?>
    <form action="" method="post">
        <fieldset>
            <label>ID Pelicula: </label>
            <input type="text" name="id_pelicula">
            <?php if (isset($err_idpelicula)) echo $err_idpelicula ?>
            <br><br>
            <label>Titulo</label>
            <input type="text" name="titulo">
            <br><br>
            <label>Fecha Estreno: </label>
            <input type="number" name="fecha_estreno" min="1895">
            <br><br>
            <label>Edad Recomendada</label>
            <select name="edad_recomendada" id="edad_recomendada">
                <option value="0" selected>0</option>
                <option value="3">3</option>
                <option value="7">7</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
            <br><br>
            <input type="submit" value="Enviar Pelicula">
        </fieldset>
    </form>
</body>

</html>