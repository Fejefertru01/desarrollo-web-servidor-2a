<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalculadoraIVA</title>
    <?php require('../formularios/irpf.php') ?>
</head>

<body>
    <h2>Formulario IVA</h2>
    <fieldset>
        <legend>Formulario IVA</legend>
        <form action="" method="post">
            <label>Introduzca el precio</label>
            <br>
            <input type="text" name="precio">
            <br><br>
            <label>Elija su IVA</label>
            <br><br>
            <input type="radio" id="siniva" name="tipoIVA" value="siniva">
            <label for="siniva">SIN IVA</label><br>
            <input type="radio" id="superreducido" name="tipoIVA" value="superreducido">
            <label for="superreducido">SUPERREDUCIDO</label><br>
            <input type="radio" id="reducido" name="tipoIVA" value="reducido">
            <label for="reducido">REDUCIDO</label><br>
            <input type="radio" id="general" name="tipoIVA" value="general">
            <label for="general">GENERAL</label><br><br>
            <input type="hidden" name="action" value="iva">
            <input type="submit" value="Enviar"><br><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "iva") {
                    $precio = (int) $_POST["precio"];
                    if (!isset($_POST["tipoIVA"])) {
                        echo "<h4>Rellena el tipo de iva</h4>";
                    } else {
                        $tipoIVA = $_POST["tipoIVA"];
                        if (empty($precio)) {
                            echo "<h4>Rellena el precio</h4>";
                        } else {
                            function precioConIVA(float $precio, string $tipoIVA): float
                            {
                                $IVA = strtoupper($tipoIVA);
                                $preciofinal = match (true) {
                                    $IVA == "GENERAL" => $preciofinal = $precio + ($precio * 0.21),
                                    $IVA == "REDUCIDO" => $preciofinal = $precio + ($precio * 0.10),
                                    $IVA == "SUPERREDUCIDO" => $preciofinal = $precio + ($precio * 0.04),
                                    $IVA == "SINIVA" => $preciofinal = $precio,
                                    default => $preciofinal = 99999999
                                };
                                return $preciofinal;
                            }
                            echo "<h4>El precio final es: " . precioConIVA($precio, $tipoIVA) . "</h4>";
                        }
                    }
                }
            }
            ?>
        </form>
    </fieldset>
    <h2>Formulario IRPF</h2>
    <fieldset>
        <legend>Formulario IRPF</legend>
        <form action="" method="post">
            <label>Salario: </label>
            <input type="number" step="1000" name="salario"><br><br>
            <input type="hidden" name="action" value="irpf">
            <input type="submit" value="calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "irpf") {
                    $salario = (float)$_POST["salario"];
                    echo "<h4>El salario quitando el IRPF es " . calcularIRPF($salario) . "</h4>";
                }
            }
            ?>
        </form>
    </fieldset>

</body>

</html>