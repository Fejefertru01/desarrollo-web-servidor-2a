<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $temperaturas = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
    ];
    for ($i = 0; $i < count($temperaturas); $i++) { //Añadimos la cuarta columna
        $temperaturas[$i][3] = ($temperaturas[$i][1] + $temperaturas[$i][2]) / 2;
    }

    $minimas = array_column($temperaturas, 1); //Ordeno por temperaturas minimas
    $nombre = array_column($temperaturas, 0);
    array_multisort($minimas, SORT_ASC, $nombre, SORT_ASC, $temperaturas);
    ?>
    <table>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Minima</th>
                <th>Maxima</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($temperaturas as $temperatura) {
                list($nombre, $minima, $maxima, $media) = $temperatura;
                echo "<tr><td>" . $nombre . "</td><td>" . $minima . "</td><td>" . $maxima . "</td><td>" . $media . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $minimasSumadas = 0;
    $maximasSumadas = 0;
    for ($i = 0; $i < count($temperaturas); $i++) {
        $minimasSumadas += ($temperaturas[$i][1]);
        $maximasSumadas += ($temperaturas[$i][2]);
    }
    echo "<h4>La media de las minimas es " . round($minimasSumadas / (count($temperaturas)), 2) . "</h4>";
    echo "<h4>La media de las maximas es " . round($maximasSumadas / (count($temperaturas)), 2) . "</h4>";
    ?>

</body>

</html>