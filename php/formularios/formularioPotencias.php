<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <label>Base</label>
        <br>
        <input type="text" name="base">
        <br><br>
        <label>Potencia</label>
        <br>
        <input type="text" name="exponente">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $base = (int) $_GET["base"];
        $exponente = (int)$_GET["exponente"];
        echo "<h4>" . ($base ** $exponente) . "</h4>";
    }
    ?>
</body>

</html>