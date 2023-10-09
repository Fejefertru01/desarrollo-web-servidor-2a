<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $arrayBidimensional = [[], []];
    $primerArray = [];
    $segundoArray = [];

    for ($i = 0; $i < 10; $i++) {
        array_push($primerArray, rand(1, 11));
    }
    print_r($primerArray);
    ?>
</body>

</html>