<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function calcularIRPF(float $salario): float
    {
        $salarioIRPF = 0;
        $salarioAUX = 0;
        if ($salario <= 12450) {
            $salarioIRPF = $salario * 0.81;
        } else if ($salario > 12450 && $salario <= 20200) {
            $salarioIRPF = 12450 * 0.81;
            $salarioAUX = $salario - 12450;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.76);
        } else if ($salario > 20200 && $salario <= 35200) {
            $salarioIRPF = 12450 * 0.81;
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioAUX = $salario - 20200;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.70);
        } else if ($salario > 35200 && $salario <= 60000) {
            $salarioIRPF = 12450 * 0.81;
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioIRPF = $salarioIRPF + (15000 * 0.70);
            $salarioAUX = $salario - 35200;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.63);
        } else if ($salario > 60000 && $salario <= 300000) {
            $salarioIRPF = 12450 * 0.81;
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioIRPF = $salarioIRPF + (15000 * 0.70);
            $salarioIRPF = $salarioIRPF + (24800 * 0.63);
            $salarioAUX = $salario - 60000;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.55);
        } else if ($salario > 300000) {
            $salarioIRPF = 12450 * 0.81;
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioIRPF = $salarioIRPF + (15000 * 0.70);
            $salarioIRPF = $salarioIRPF + (24800 * 0.63);
            $salarioIRPF = $salarioIRPF + (240000 * 0.55);
            $salarioAUX = $salario - 300000;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.53);
        }
        return $salarioIRPF;
    }
    ?>
</body>

</html>