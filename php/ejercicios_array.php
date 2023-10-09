<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Arrays</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--Ejercicio 1-->
    <h3>Crea un array que contenga los números pares del 1 al 50 y muéstralos. Investiga si hay algún método en PHP para “barajar” los elementos de un array. Una vez barajado, muestra los números en orden descendente.</h3>
    <?php
    $numeros_pares;
    for ($i = 1; $i <= 50; $i++) {
        if ($i % 2 == 0) {
            $numeros_pares[] = $i;
        }
    }
    shuffle($numeros_pares);
    rsort($numeros_pares);
    foreach ($numeros_pares as $numero) {
        echo $numero . ", ";
    }
    ?>
    <!--Ejericicio 2-->
    <h3>Genera 10 números aleatorios entre el 0 y el 100. Almacénalos en un array y muéstralos ordenados de mayor a menor y de menor a mayor.</h3>
    <?php
    $numeros_aleatorios;
    for ($i = 0; $i < 10; $i++) {
        $numeros_aleatorios[] = rand(0, 100);
    }
    rsort($numeros_aleatorios);
    foreach ($numeros_aleatorios as $numero) {
        echo $numero . ", ";
    }
    echo "<br>";
    sort($numeros_aleatorios);
    foreach ($numeros_aleatorios as $numero) {
        echo $numero . ", ";
    }
    ?>
    <!--Ejercicio 3-->
    <h3>Dada la lista de países y sus capitales mostrada en la siguiente página, muéstralos en una tabla ordenados por los nombres de sus países.</h3>
    <?php
    $paises = array(
        "Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" =>
        "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" =>
        "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" =>
        "Berlin", "Greece" => "Athens", "Ireland" => "Dublin",
        "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid",
        "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia",
        "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin",
        "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" =>
        "Vienna", "Poland" => "Warsaw"
    );
    ?>
    <table>
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capital</th>
            </tr>
        </thead>
        <?php
        ksort($paises);
        foreach ($paises as $pais => $capital) {
            echo "<tr><td>" . $pais . "</td><td>" . $capital . "</td></tr>";
        }
        ?>
    </table>
    <!--Ejercicio 4-->
    <h3>Crea un array multidimensional que contenga la siguiente información de series: título, plataforma y temporadas. Crea al menos 5 series con sus respectivos títulos, plataforma y temporadas. Muéstralos en tres tablas. Una los mostrará tal y como los has añadido, otra ordenados por temporada (de menor a mayor) y otra ordenados por la plataforma a la que pertecenen, y si la plataforma es igual, por el título.</h3>
    <h3>Tabla 1 (tal cual)</h3>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $series = [
                ["Juego de Tronos", "HBO", 8],
                ["Hijos de la Anarquia", "Disney+", 7],
                ["The Walking Dead", "HBO", 11],
                ["Breaking Bad", "Netflix", 5],
                ["Better Call Saul", "Netflix", 6],
            ];
            foreach ($series as $serie) {
                list($titulo, $plataforma, $temporadas) = $serie;
                echo "<tr><td>" . $titulo . "</td><td>" . $plataforma . "</td><td>" . $temporadas . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h3>Tabla 2 (ordenados por temporada de menor a mayor)</h3>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $temporadas = array_column($series, 2);

            array_multisort($temporadas, SORT_ASC, $series);

            foreach ($series as $serie) {
                list($titulo, $plataforma, $temporadas) = $serie;
                echo "<tr><td>" . $titulo . "</td><td>" . $plataforma . "</td><td>" . $temporadas . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h3>Tabla 3 (ordenados por plataforma, si es igual, por el titulo)</h3>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $titulo = array_column($series, 0);
            $plataforma = array_column($series, 1);

            array_multisort($plataforma, SORT_ASC, $titulo, SORT_ASC, $series);

            foreach ($series as $serie) {
                list($titulo, $plataforma, $temporadas) = $serie;
                echo "<tr><td>" . $titulo . "</td><td>" . $plataforma . "</td><td>" . $temporadas . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!--Ejercicio 5-->
    <h3>Crear un array de estudiantes y, aleatoriamente, asignarles una nota del 0 al 10. Mostrar los estudiantes en una tabla que contenga sus nombres, la nota que han sacado y la calificación final (suspenso, aprobado, notable o sobresaliente). Ordenar los estudiantes por orden alfabético.</h3>

    <?php
    $estudiantes = [
        ["Jaime", rand(0, 10)],
        ["Ayyoub", rand(0, 10)],
        ["Victor", rand(0, 10)],
        ["Pablo", rand(0, 10)],
        ["Fernando", rand(0, 10)],
        ["Elliot", rand(0, 10)],
    ];

    $nombre = array_column($estudiantes, 0);

    array_multisort($nombre, SORT_ASC, $estudiantes);

    function calificacion($nota)
    {
        $calificacion = match (true) {
            $nota >= 0 && $nota < 5 => "Suspenso",
            $nota >= 5 && $nota < 7 => "Aprobado",
            $nota >= 7 && $nota < 9 => "Notable",
            $nota >= 9 && $nota <= 10 => "Sobresaliente",
            default => "Error"
        };
        return $calificacion;
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nota</th>
                <th>Calificacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudiantes as $estudiante) {
                list($nombre, $nota) = $estudiante;
                echo "<tr><td>" . $nombre . "</td><td>" . $nota . "</td><td>" . calificacion($nota) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>