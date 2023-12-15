<?php
  $_server = 'localhost';
  $_user = 'root';
  $_password = 'medac';
  $_database = 'db_videojuegos';

  $conexion = new mysqli($_server, $_user, $_password, $_database) or die('Error de conexion');
?>