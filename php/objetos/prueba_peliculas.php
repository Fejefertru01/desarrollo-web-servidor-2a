<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba peliculas</title>
    <?php require "pelicula.php" ?>
</head>

<body>
    <?php
    $pelicula = new Pelicula(1, "Spiderman", "2002-05-03", "7");
    $pelicula2 = new Pelicula(2, "El Señor de los anillos", "2002-05-03", "12");
    $pelicula3 = new Pelicula(3, "El Hobbit", "2002-05-03", "12");
    $peliculas = array($pelicula, $pelicula2, $pelicula3);
    echo "<table border=1px>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Titulo</th>";
    echo "<th>Fecha estreno</th>";
    echo "<th>Edad recomendada</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($peliculas as $pelicula) {
        echo "<tr>";
        echo "<td>" . $pelicula->id_pelicula . "</td>";
        echo "<td>" . $pelicula->titulo . "</td>";
        echo "<td>" . $pelicula->fecha_estreno . "</td>";
        echo "<td>" . $pelicula->edad_recomendada . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
</body>

</html>