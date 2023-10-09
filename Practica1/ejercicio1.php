<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "<table border=1><thead><tr><th>Tabla del " . $i . "</th></tr></thead><tbody>";
        for ($x = 1; $x <= 10; $x++) {
            echo "<tr><td>" . $i . "x" . $x . "=" . ($i * $x) . "</td></tr>";
        }
        echo "</tbody></table><br>";
    }

    ?>
</body>

</html>