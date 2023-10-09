<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array_multi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fortnite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Street fighter", "PS4", 50],
        ["Legend of Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55],
    ];
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Precio</th>
        </tr>
        <?php
        foreach ($juegos as $juego) {
            list($nombre, $plataforma, $precio) = $juego;
            echo "<tr><td>" . $nombre . "</td><td>" . $plataforma . "</td><td>" . $precio . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Precio</th>
            <th>random</th>
        </tr>
        <?php
        $nombre = array_column($juegos, 0);
        $consola = array_column($juegos, 1);
        $precio = array_column($juegos, 2);


        array_multisort($consola, SORT_ASC, $nombre, SORT_ASC, $precio, SORT_ASC, $juegos);
        for ($i = 0; $i < count($juegos); $i++) {
            $juegos[$i][3] = rand(1, 10);
        }
        foreach ($juegos as $juego) {

            list($nombre, $plataforma, $precio, $random) = $juego;
            echo "<tr><td>" . $nombre . "</td><td>" . $plataforma . "</td><td>" . $precio . "</td><td>" . $random . "</td></tr>";
        }



        ?>
    </table>

</body>

</html>