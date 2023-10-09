<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h3>1. Genera un numero aleatorio del 1 al 10 y muestra si el numero es par o impar</h3>

    <?php

    $n1 = rand(1, 10);
    echo "El numero " . $n1;
    if ($n1 % 2 == 0)
        echo " es par";
    else
        echo " no es par";
    ?>

    <h3>2. Genera un numero aleatorio del -10 al 10 y muestra si es positivo, negativo o cero</h3>

    <?php
    $n2 = rand(-10, 10);
    echo "El numero " . $n2;
    if ($n2 >= 0)
        echo " es positivo";
    else
        echo " es negativo";
    ?>

    <h3>3. Muestra los numeros impares del 1 al 20 en una lista</h3>
    <ul>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            if ($i % 2 != 0)
                echo "<li>$i</li>";
        }
        ?>
    </ul>

    <h3>4. Muestra, en español, el dia y el mes actual. Ejemplo: 1 de enero</h3>

    <?php
    $dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    $day = date("N");
    $month = date("n");
    $dia = $dias[$day - 1];
    $mes = $meses[$month - 1];
    echo "<br>";
    echo $dia . " " . date("j") . " de " . $mes;

    $day2 = date("l");
    $dia2 = match ($day2) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sabado",
        "Sunday" => "Domingo",
    };
    echo "<br>$dia2";
    ?>

    <h3>5. Muestra la zona horaria en la que nos encontramos</h3>

    <?php
    echo date("T");
    ?>

    <h3>Mostrar la suma de los pares del 1 al 20</h3>

    <?php
    $suma = 0;
    for ($i = 0; $i <= 20; $i++) {
        if ($i % 2 == 0) {
            $suma += $i;
        }
    }
    echo "<br>Suma: $suma";
    ?>

    <h3>Mostrar los numeros primos del 1 al 50</h3>

    <ol>
        <?php
        $contador = 0;
        for ($i = 2; $contador < 50; $i++) {
            $Primo = true;
            for ($j = 2; $j < $i - 1; $j++) {
                if ($i % $j == 0) {
                    $Primo = false;
                }
            }
            if ($Primo) {
                echo "<li>$i</li>";
                $contador++;
            }
        }

        ?>
    </ol>

    <h3>Arrays</h3>
    <?php
    $array1 = array(
        "key1" => "value1",
        "key2" => "value2",
        "key3" => "value3"
    );

    $array2 = array("value1", "value2", "value3");

    $array3 = ["value1", "value2", "value3"];

    print_r($array1);
    print_r($array2);
    print_r($array3);

    $array4 = [
        0 => "prueba",
        '2' => "adios",
        3.2 => "hola",
        true => "boolean"
    ];

    echo "<br>";
    print_r($array4);

    ?>
    <br><br>
    <?php
    $people = array(
        "12345678A" => "Pedro",
        "13572469B" => "Paco",
        "98145636C" => "Pepe"
    );
    // * Sacar solo el valor
    foreach ($people as $name) {
        echo $name . "<br>";
    }
    echo "<br>";
    // * Sacar la clave y el valor
    foreach ($people as $id => $name) {
        echo $id . " => " . $name . "<br>";
    }
    ?>
    <br><br>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        foreach ($people as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>SORT - Ordena valores menor a mayor reseteando llaves</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        $people_1 = $people;
        sort($people_1);
        foreach ($people_1 as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>RSORT - Ordena valores mayor a menor reseteando llaves</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        rsort($people_1);
        foreach ($people_1 as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>ASORT - Ordena valores menor a mayor sin resetear llaves</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        $people_2 = $people;
        asort($people_2);
        foreach ($people_2 as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>ARSORT - Ordena valores mayor a menor sin resetear llaves</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        arsort($people_2);
        foreach ($people_2 as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>KSORT - Ordena llaves menor a mayor sin resetear llaves</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        ksort($people_2);
        foreach ($people_2 as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>KRSORT - Ordena por llaves mayor a menor sin resetear llaves</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        krsort($people_2);
        foreach ($people_2 as $dni => $name) {
            echo "<tr><td>" . $dni . "</td><td>" . $name . "</td></tr>";
        }
        ?>
    </table>

</body>

</html>