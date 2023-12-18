<?php
    require 'database_conection.php';
        if($_SERVER["REQUEST_METHOD"]=="GET"&& isset($_GET["borrar"])){
        $titulo=$_GET["borrar"];
        $stml = $conexion->prepare("Delete from videojuegos where titulo=?");
        $stml->bind_param("s",$titulo);
        $stml->execute();
        }
        header('location: index.php');
    ?>