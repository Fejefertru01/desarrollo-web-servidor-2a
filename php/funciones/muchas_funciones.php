<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperaturas,Maximo 3 numeros,potencias y primos</title>
</head>

<body>
    <?php
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



    function maximo_3(int $primerNum, int $segundoNum, int $tercerNum): string
    {
        if ($primerNum == $segundoNum && $primerNum == $tercerNum) {
            return "<h4>Todos los numeros son iguales</h4>";
        } else if ($primerNum > $segundoNum && $primerNum > $tercerNum) {
            return "<h4>El numero $primerNum es el mayor</h4>";
        } else if ($segundoNum > $primerNum && $segundoNum > $tercerNum) {
            return "<h4>El numero $segundoNum es el mayor</h4>";
        } else {
            return "<h4>El numero $tercerNum es el mayor</h4>";
        }
    }
    function calculaPrimos(int $numeroLimite): array
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
                $numerosPrimos[$contadorPrimos] = $i;
                $contadorPrimos++;
            }
        }
        return $numerosPrimos;
    }
    function potencia(int $base, int $exponente): string
    {
        return "<h4>" . ($base ** $exponente) . "</h4>";
    }
    ?>

</body>

</html>