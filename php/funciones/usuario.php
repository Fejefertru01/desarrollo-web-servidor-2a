<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ValidacionUsuario</title>
</head>

<body>
    <?php
    $patron = "/^[a-zA-Z0-9]{4,8}$/";
    $patron1 = "/^[a-zA-Z][a-zA-Z ]{2,30}$/";
    $patron2 = "/^[a-zA-Z][a-zA-Z]{2,30}$/";
    function depurar($entrada)
    {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);
        $temp_fecha = depurar($_POST["fecha"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_apellido = depurar($_POST["apellido"]);
        if (!strlen($temp_usuario) > 0) {
            $err_usuario = "El nombre de usuario es obligatorio";
        } else {
            #/^[a-zA-Z0-9{4,8}]$/

            if (!preg_match($patron, $temp_usuario)) {
                $err_usuario = "El nombre debe tener entre 4 y 8 caracteres y tener solo letras o numeros";
            }
        }

        if (!strlen($temp_nombre) > 0) {
            $err_nombre = "El nombre es obligatorio";
        } else {

            #/^[a-zA-Z0-9{4,8}]$/
            $patron1 = "/^[a-zA-Z][a-zA-Z ]{2,30}$/";
            if (!preg_match($patron1, $temp_nombre)) {
                $err_nombre = "El nombre debe tener entre 2 y 30 caracteres";
            }
        }
        if (!strlen($temp_apellido) > 0) {
            $err_apellido = "El apellido es obligatorio";
        } else {
            #/^[a-zA-Z0-9{4,8}]$/

            if (!preg_match($patron2, $temp_apellido)) {
                $err_apellido = "El apellido debe tener entre 2 y 30 caracteres";
            }
        }

        if (strlen($temp_fecha) == 0) {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
        } else {
            $fecha_actual = date("Y-m-d");
            list($anyo_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
            list($anyo, $mes, $dia) = explode('-', $temp_fecha);
            if ($anyo_actual - $anyo > 18) {
            } else if ($anyo_actual - $anyo < 18) {
                $err_fecha_nacimiento = "No puedes ser menor de edad";
            } else {
                if ($mes_actual - $mes > 0) {
                    //es mayor
                } else if ($mes_actual - $mes < 0) {
                    $err_fecha_nacimiento = "No puede ser menor de edad";
                } else {
                    if ($dia_actual - $dia > 0) {
                        //exito
                    } else {
                        $err_fecha_nacimiento = "No puedes ser menor de edad";
                    }
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <fieldset>
            <label>Usuario:</label>
            <input type="text" name="usuario">
            <?php if (isset($err_usuario)) echo $err_usuario ?><br><br>
            <label>Fecha de nacimiento: </label>
            <input type="date" name="fecha"><?php if (isset($err_fecha_nacimiento)) echo $err_fecha_nacimiento ?><br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre"><?php if (isset($err_nombre)) echo $err_nombre ?><br><br>
            <label>Apellido: </label>
            <input type="text" name="apellido"><?php if (isset($err_apellido)) echo $err_apellido ?><br><br>
            <input type="submit" value="Registrarse"><br><br>
            <?php
            if (preg_match($patron, $temp_usuario)) {
                $usuario = $temp_usuario;
                echo "Usuario: " . $usuario;
            }
            echo "<br><br>";
            if (preg_match($patron1, $temp_nombre)) {
                $nombre = $temp_nombre;
                $nombre = ucwords($nombre, " ");
                echo "Nombre: " . $nombre;
            }
            echo "<br><br>";
            if (preg_match($patron2, $temp_apellido)) {
                $apellido = $temp_apellido;
                $apellido = ucfirst($apellido);
                echo "Apellido: " . $apellido;
            }
            echo "<br><br>";
            if (!isset($err_fecha_nacimiento)) echo "Fecha de nacimiento: " . $temp_fecha;
            ?>

        </fieldset>
    </form>
</body>

</html>