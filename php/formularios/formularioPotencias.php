<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$base = (int) $_POST ["base"];
        //$exponente = (int) $_POST["exponente"];
        //echo "<h4>" . ($base**$exponente) . "</h4>";

        $temp_base = depurar($_POST["base"]);
        $temp_exponente = depurar($_POST["exponente"]);

        if (strlen($temp_base) > 0) {
            //Se ha introducido la base
            //comprobamos si se ha introducido un numero
            if (is_numeric(($temp_base))) {
                //Se ha introducido y además es un numero
                //comprobamos que se ha introducico un numero correcto
                $temp_base = (int)$temp_base;
                if ($temp_base >= 0) {
                    //EXITO!
                    $base = $temp_base;
                } else {
                    $error_base = "El numero debe ser igual o mayor que 0";
                }
            } else {
                //se ha introducico pero no es un numero
                $error_base = "No se ha introducido un número";
            }
        } else {
            //No se ha introducico nada
            $error_base = "No se ha introducido la base";
        }
        if (strlen($temp_exponente) > 0) {
            //Se ha introducido la base
            //comprobamos si se ha introducido un numero
            if (is_numeric(($temp_exponente))) {
                //Se ha introducido y además es un numero
                //comprobamos que se ha introducico un numero correcto
                $temp_exponente = (int)$temp_exponente;
                if ($temp_exponente >= 0) {
                    //EXITO!
                    $base = $temp_exponente;
                } else {
                    $error_exponente = "El numero debe ser igual o mayor que 0";
                }
            } else {
                //se ha introducico pero no es un numero
                $error_exponente = "No se ha introducido un número";
            }
        } else {
            //No se ha introducico nada
            $error_exponente = "No se ha introducido la exponente";
        }
    }


    function depurar($entrada)
    {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    ?>
    <form action="" method="post">
        <label>Base</label>
        <input type="text" name="base">
        <?php if (isset($error_base)) echo $error_base ?>
        <br><br>
        <label>Exponente</label>
        <input type="text" name="exponente">
        <?php if (isset($error_exponente)) echo $error_exponente ?>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
</body>

</html>