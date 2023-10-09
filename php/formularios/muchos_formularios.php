<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "../funciones/muchas_funciones.php"; ?>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Potencia</legend>
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
    <form action="" method="post">
        <fieldset>
            <legend>Maximo 3 numeros</legend>
            <label for="">Numero 1</label>
            <input type="number" name="num1">
            <br>
            <label for="">Numero 2</label>
            <input type="number" name="num2">
            <br>
            <label for="">Numero 3</label>
            <input type="number" name="num3">
            <br>
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
    <form action="" method="post">
        <fieldset>
            <legend>Primos</legend>
            <input type="number" name="numero">
            <br>
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
    <form action="" method="post">
        <fieldset>
            <legend>Temperaturas</legend>
            <label>Temperatura </label>
            <br>
            <input type="number" required name="temperatura">
            <br><br>
            <label>Medida original</label>
            <br>
            <input type="text" required name="original">
            <br><br>
            <label>Medida a transformar</label>
            <br>
            <input type="text" required name="transformar">
            <br><br>
            <input type="hidden" name="action" value="temperaturas">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "temperaturas") {
                    $temp = (float)$_POST["temperatura"];
                    $temp_ori = $_POST["original"];
                    $temp_trans = $_POST["transformar"];
                    echo "<h4>" . transformarTemp($temp, $temp_ori, $temp_trans) . "</h4>";
                }
            }
            ?>
        </fieldset>
    </form>
</body>

</html>