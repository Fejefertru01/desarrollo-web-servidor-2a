<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "../funciones/muchas_funciones.php"; ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend><b>Potencia</b></legend>
            <label>Base</label>
            <br>
            <input type="text" required name="base">
            <br><br>
            <label>Exponente</label>
            <br>
            <input type="text" required name="exp">
            <br><br>
            <input type="hidden" name="action" value="potencia">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "potencia") {
                    $base = (int)$_POST["base"];
                    $exp = (int)$_POST["exp"];
                    echo "<h4>" . potencia($base, $exp) . "</h4>";
                }
            }
            ?>
        </fieldset>
    </form>
    <br>
    <form action="" method="post">
        <fieldset>
            <legend><b>Maximo 3 numeros</b></legend>
            <label for="">Numero 1</label>
            <input type="number" name="num1">
            <br>
            <label for="">Numero 2</label>
            <input type="number" name="num2">
            <br>
            <label for="">Numero 3</label>
            <input type="number" name="num3">
            <br><br>
            <input type="hidden" name="action" value="maximo3">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "maximo3") {
                    $num1 = (int)$_POST["num1"];
                    $num2 = (int)$_POST["num2"];
                    $num3 = (int)$_POST["num3"];
                    echo "<h3>" . maximo_3($num1, $num2, $num3) . "</h3>";
                }
            }
            ?>
        </fieldset>
    </form>
    <br>
    <form action="" method="post">
        <fieldset>
            <legend><b>Primos</b></legend>
            <input type="number" name="numero">
            <br><br>
            <input type="hidden" name="action" value="primos">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "primos") {
                    $numero = (int)$_POST["numero"];
                    $array = calculaPrimos($numero);
                    echo "<br>";
                    foreach ($array as $primos) {
                        echo $primos . " ";
                    }
                }
            }
            ?>
        </fieldset>
    </form>
    <br>
    <form action="" method="post">
        <fieldset>
            <legend><b>Temperatura</b></legend>
            <input type="number" name="numero" min="0">
            <br>
            <div id="contenedorTemperatura">
                <div id="u1">
                    <fieldset>
                        <legend>Temperatura original</legend>
                    <input type="radio" name="u1" value="F">
                    <label for="">Fahrenheit</label>
                    <br>
                    <input type="radio" name="u1" value="C">
                    <label for="">Celsius</label>
                    <br>
                    <input type="radio" name="u1" value="K">
                    <label for="">Kelvin</label>
                    </fieldset>
                    <br>
                </div>
                <div id="u2">
                    <fieldset>
                        <legend>Temperatura a transformar</legend>
                    <input type="radio" name="u2" value="F">
                    <label for="">Fahrenheit</label>
                    <br>
                    <input type="radio" name="u2" value="C">
                    <label for="">Celsius</label>
                    <br>
                    <input type="radio" name="u2" value="K">
                    <label for="">Kelvin</label>
                    <br>
                    </fieldset>
                </div>
            </div>
            <br>
            <input type="hidden" name="action" value="temperatura">
            <input type="submit" value="Transformar">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "temperatura") {
                    if (isset($_POST["u1"]) && isset($_POST["u2"])) {
                        $numero = (float)$_POST["numero"];
                        if (!empty($numero)) {
                            $u1 = $_POST["u1"];
                            $u2 = $_POST["u2"];
                            echo "<h3>" . transformarTemp($numero, $u1, $u2) . "</h3>";
                        } else {
                            echo "<h3>Pon numero</h3>";
                        }
                    }
                } else {
                    echo "<h3>elige unidad</h3>";
                }
            }
            ?>
        </fieldset>
    </form>
</body>

</html>