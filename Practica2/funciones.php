<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>

<body>
    <?php
    function cambiarDivisa(float $dinero, string $divisaOriginal, string $nuevaDivisa): string
    {
        if ($divisaOriginal == "E" && $nuevaDivisa == "D") {
            return ($dinero * 1.06) . " $";
        } else if ($divisaOriginal == "E" && $nuevaDivisa == "Y") {
            return ($dinero * 157.56) . " ¥";
        } else if ($divisaOriginal == "D" && $nuevaDivisa == "E") {
            return ($dinero * 0.94) . " €";
        } else if ($divisaOriginal == "D" && $nuevaDivisa == "Y") {
            return ($dinero * 148.73) . " ¥";
        } else if ($divisaOriginal == "Y" && $nuevaDivisa == "E") {
            return ($dinero * 0.0063) . " €";
        } else if ($divisaOriginal == "Y" && $nuevaDivisa == "D") {
            return ($dinero * 0.0067) . " $";
        } else {
            return "Divisas incorrectas";
        }
    }
    ?>

    <?php
    function sumatorio(int $numero): int
    {
        $sumatorio = 0;
        for ($i = 1; $i <= $numero; $i++) {
            $sumatorio += $i;
        }
        return $sumatorio;
    }
    function factorial(int $numero): int
    {
        $sumatorio = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $sumatorio *= $i;
        }
        return $sumatorio;
    }
    ?>

    <?php
    function comprobarEstado(int $num_ejemplares): string
    {
        if ($num_ejemplares == 0) {
            return "Extinto";
        } else if ($num_ejemplares > 0 && $num_ejemplares <= 500) {
            return "En peligro critico";
        } else if ($num_ejemplares > 500 && $num_ejemplares <= 2000) {
            return "En peligro";
        } else if ($num_ejemplares > 2000) {
            return "Amenazado";
        } else {
            return "Error";
        }
    }
    ?>
    
</body>

</html>