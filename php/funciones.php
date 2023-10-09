<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduccion funciones</title>
</head>

<body>
    <?php
    function sumaDos(int $num1, int $num2)
    {
        return $num1 + $num2;
    }
    function sumadosV2(int $num1, int $num2)
    {
        return $num1 + $num2;
    }
    function sumadosV3(int|float $num1, int|float $num2)
    {
        return $num1 + $num2;
    }
    function sumadosV4(int|float $num1, int|float $num2): int
    {
        return $num1 + $num2;
    }
    $resultado = sumaDos(1.5, 3);
    echo "<h3>Resultado 1 : $resultado</h3>";
    echo "<h3>Resultado 2: " . sumaDosV2(3, 5.3) . "</h3>";
    echo "<h3>Resultado 3: " . sumaDosV3(1, 4.5) . "</h3>";
    echo "<h3>Resultado 4: " . sumaDosV4(1, 4.5) . "</h3>";

    function calificacion(int $nota)
    {
        $calificacion = match (true) {
            $nota >= 0 && $nota < 5 => "Suspenso",
            $nota >= 5 && $nota < 7 => "Aprobado",
            $nota >= 7 && $nota < 9 => "Notable",
            $nota >= 9 && $nota <= 10 => "Sobresaliente",
            default => "Error"
        };
        return $calificacion;
    }
    echo "Nota: " . calificacion(8) . "<br>";
    echo "Devuelve los primos hasta el numero introducido<br>";
    function calculaPrimos(int $numeroLimite)
    {
        $contadorPrimos = 0;
        for ($i = 2; $i < $numeroLimite; $i++) {
            $Primo = true;
            for ($j = 2; $j < $i - 1; $j++) {
                if ($i % $j == 0) {
                    $Primo = false;
                }
            }
            if ($Primo) {
                echo "$i<br>";
                $numerosPrimos[$contadorPrimos] = $i;
                $contadorPrimos++;
            }
        }
        return $numerosPrimos;
    }

    $numerosPrimos = calculaPrimos(30);

    foreach ($numerosPrimos as $numero) {
        echo $numero . " ";
    }
    echo "<br>";
    function esPrimo(int $num)
    {
        $primo = true;
        for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0) {
                $primo = false;
            }
        }
        if ($primo) {
            echo "El numero $num es primo";
        } else {
            echo "El numero $num no es primo";
        }
    }
    esPrimo(5);

    function CaF(float $temperatura): float
    {
        return ($temperatura * 9 / 5) + 32;
    }
    function FaC(float $temperatura): float
    {
        return ($temperatura - 32) * 5 / 9;
    }
    function CaK(float $temperatura): float
    {
        return $temperatura + 273.15;
    }
    function KaC(float $temperatura): float
    {
        return $temperatura - 273.15;
    }
    function KaF(float $temperatura): float
    {
        return ($temperatura - 273.15) * 9 / 5 + 32;
    }
    function FaK(float $temperatura): float
    {
        return ($temperatura - 32) * 5 / 9 + 273.15;
    }
    echo "<br>";
    echo CaF(0) . "<br>";
    echo FaC(32) . "<br>";
    echo CaK(0) . "<br>";
    echo KaC(273.15) . "<br>";
    echo KaF(273.15) . "<br>";
    echo FaK(33) . "<br>";

    function transformarTemp(float $temp, string $temp_ori, string $temp_trans): float|string
    {
        if ($temp_ori == "C" && $temp_trans == "F") {
            return (CaF($temp));
        } else if ($temp_ori == "F" && $temp_trans == "C") {
            return (FaC($temp));
        } else if ($temp_ori == "C" && $temp_trans == "K") {
            return (CaK($temp));
        } else if ($temp_ori == "K" && $temp_trans == "C") {
            return (KaC($temp));
        } else if ($temp_ori == "K" && $temp_trans == "F") {
            return (KaF($temp));
        } else if ($temp_ori == "F" && $temp_trans == "K") {
            return (FaK($temp));
        } else {
            return "Te equivocaste bro";
        }
    }
    echo "<br><br>";
    echo transformarTemp(321, "a", "C");
    echo "<br><br>";
    function potencia(int $base, int $exponente): int
    {
        if ($exponente >= 0) {
            $contador = 1;
            for ($i = 1; $i <= $exponente; $i++) {
                $contador *= $base;
            }
            return $contador;
        }
    }

    echo potencia(2, 0);

    ?>

    <?php
    echo "<br><br>";
    function precioSinIVA(float $precio, string $IVA): float
    { //QUITAR EL IVA DE UN PRECIO
        $IVA = strtoupper($IVA);
        $preciofinal = 0;
        $preciofinal = match (true) {
            $IVA == "GENERAL" => $preciofinal = $precio - ($precio * 0.21),
            $IVA == "REDUCIDO" => $preciofinal = $precio - ($precio * 0.10),
            $IVA == "SUPERREDUCIDO" => $preciofinal = $precio - ($precio * 0.04),
            $IVA == "SINIVA" => $preciofinal = $precio,
            default => $preciofinal = 99999999
        };
        return $preciofinal;
    }

    function precioConIVA(float $precio, string $IVA): float
    { //AÑADIR EL IVA DE UN PRECIO
        $IVA = strtoupper($IVA);
        $preciofinal = match (true) {
            $IVA == "GENERAL" => $preciofinal = $precio + ($precio * 0.21),
            $IVA == "REDUCIDO" => $preciofinal = $precio + ($precio * 0.10),
            $IVA == "SUPERREDUCIDO" => $preciofinal = $precio + ($precio * 0.04),
            $IVA == "SINIVA" => $preciofinal = $precio,
            default => $preciofinal = 99999999
        };
        return $preciofinal;
    }
    echo "<br>";
    echo "precio con iva: " . precioConIVA(10, "REDUCIDO") . "<br>";
    echo "precio sin iva: " . precioSinIVA(10, "superreducido") . "<br>";
    ?>
    <?php
    //------------CALCULAR IRPFS------------
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
    echo "<br>";
    echo calcularIRPF(400000);
    ?>


</body>

</html>