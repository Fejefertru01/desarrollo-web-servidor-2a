<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maximo de tres numeros</title>
</head>

<body>
    <form action="" method="post">
        <label>Primer numero</label>
        <br>
        <input type="text" name="primerNum">
        <br><br>
        <label>Segundo numero</label>
        <br>
        <input type="text" name="segundoNum">
        <br><br>
        <label>Tercer numero</label>
        <br>
        <input type="text" name="tercerNum">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $primerNum = (int)$_POST["primerNum"];
        $segundoNum = (int)$_POST["segundoNum"];
        $tercerNum = (int)$_POST["tercerNum"];
        if ($primerNum == $segundoNum && $primerNum == $tercerNum) {
            echo "<h4>Todos los numeros son iguales</h4>";
        } else if ($primerNum > $segundoNum && $primerNum > $tercerNum) {
            echo "<h4>El numero $primerNum es el mayor</h4>";
        } else if ($segundoNum > $primerNum && $segundoNum > $tercerNum) {
            echo "<h4>El numero $segundoNum es el mayor</h4>";
        } else {
            echo "<h4>El numero $tercerNum es el mayor</h4>";
        }
    }
    ?>
</body>

</html>