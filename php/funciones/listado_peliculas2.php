<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "../objetos/pelicula.php" ?>
    <?php require "../funciones/bbdd_peliculas.php" ?>
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-3">Listado de peliculas</h1>

        <?php
        $sql = "SELECT * FROM peliculas";
        $resultado = $conexion->query($sql);
        $peliculas = [];

        echo "<table class='table table-info table-hover'>";
        echo "<thead class='table-dark'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Titulo</th>";
        echo "<th>Fecha de estreno</th>";
        echo "<th>Edad recomendada</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($fila = $resultado->fetch_assoc()) {
            $nueva_pelicula = new Pelicula($fila["id_pelicula"],
             $fila["titulo"], 
             $fila["fecha_estreno"], 
             $fila["edad_recomendada"]);
             array_push($peliculas, $nueva_pelicula);
        }
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>