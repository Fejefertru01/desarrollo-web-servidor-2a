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
    if(!isset($_GET["titulo"])) header('location:index.php');
       if($_SERVER["REQUEST_METHOD"]="GET"){
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
    ?>
    <div class="container">
        <h1>View Videogame</h1>
        <h3><?php echo $titulo; ?></h3>
        <h3><?php echo $distribuidora; ?></h3>
        <h3><?php echo $precio; ?></h3>
        <form action="edit_videogame.php">
        <input type='hidden' name='titulo' value="<?php echo $titulo?>">
            <input type="submit" value ="Editar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>