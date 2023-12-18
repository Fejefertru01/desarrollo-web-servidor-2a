<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
    <title>View videogame</title>
</head>

<body>
    <?php
    if(isset($_GET["titulo"])) {
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $titulo=$_GET["titulo"];
            $stml = $conexion->prepare("Select * from videojuegos where titulo=?");
            $stml->bind_param("s",$titulo);
            $stml->execute();
            $result = $stml->get_result();
            $conexion->close();
            $fila=$result->fetch_assoc();
            $distribuidora=$fila["distribuidora"];
            $precio=$fila["precio"];
        }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo_antiguo"];
        $titulo_nuevo = $_POST["titulo"];
        $distribuidora = $_POST["distribuidora"];
        $precio = (double)$_POST["precio"];
        $sql = $conexion->prepare("UPDATE videojuegos SET titulo = ?, distribuidora = ?, precio = ? where titulo = ?");
        $sql->bind_param("ssds", $titulo_nuevo, $distribuidora, $precio,$titulo);
        $sql->execute();
        $conexion->close();
        header('location: ./');
    }
    ?>
    <div class="container">
        <h1>Edit Videogame</h1>
        <form action="" method="post">
            <label class="form-label">Titulo</label>
            <input class="form-control" type="text" name="titulo" value="<?php echo $titulo ?>">
            <label class="form-label">Distribuidora</label>
            <input class="form-control" type="text" name="distribuidora" value="<?php echo $distribuidora ?>">
            <label class="form-label">Precio</label>
            <input class="form-control" type="text" name="precio" value="<?php echo $precio ?>" >
            <input type="hidden" name="action" value = "editar">
            <input type="hidden" name="titulo_antiguo" value = "<?php echo $titulo ?>">
            <input type="submit" class="btn btn-primary" value="Editar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>