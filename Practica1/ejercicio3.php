<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $cuadradosPerfectos = [];
    $perfecto = false;
    $contador = 1;
    do {
        if (intval((sqrt($contador))) ** 2 == $contador) {
            array_push($cuadradosPerfectos, $contador);
        }
        $contador += 1;
    } while (count($cuadradosPerfectos) < 50);
    ?>
    <table>
        <thead>
            <tr>
                <th>Cuadrado Perfecto</th>
                <th>Raiz</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cuadradosPerfectos as $cuadradoPerfecto) {
                echo "<tr><td>" . $cuadradoPerfecto . "</td><td>" . sqrt($cuadradoPerfecto) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>