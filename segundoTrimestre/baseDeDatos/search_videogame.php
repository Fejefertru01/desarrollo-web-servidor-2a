<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
    <title>Index</title>
</head>

<body>
    <div class="container mt-3">
        <h1>Videojuegos</h1>
        <form action="search_videogame.php" method="post">
            <div class="row mb-3">
                <div class="col-4">
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="col-4">
                    <label>Ordenar por:</label>
                    <select name="campo">
                        <option value="titulo">Titulo</option>
                        <option value="distribuidora">Distribuidora</option>
                        <option value="precio">Precio</option>
                    </select>
                    <label>Orden</label>
                    <select name="orden">
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Distribuidora</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                $titulo=$_POST["titulo"];
                $campo=$_POST["campo"];
                $orden=$_POST["orden"];
                $stml = $conexion->prepare("Select * from videojuegos where titulo LIKE CONCAT('%',?,'%') order by $campo $orden");
                $stml->bind_param("s",$titulo);
                $stml->execute();
                $result = $stml->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["titulo"] . "</td>";
                    echo "<td>" . $row["distribuidora"] . "</td>";
                    echo "<td>" . $row["precio"] . "</td>";
                    echo "</tr>";
                }
                $conexion->close();
            }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>