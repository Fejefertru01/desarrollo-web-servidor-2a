<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>Hola mundo</h1>";
    ?>
    <h1>Hola</h1>
    <?php
    echo "<h2>Otro hola mundo</h2>";
    $entero = 1; # int
    $decimal = 1.2; # float
    $exponente = 3e5;

    var_dump($exponente);

    echo "<h3>$exponente</h3>";

    $string1 = "Hola";
    $string2 = "Adios";
    echo "$string1 $string2";
    echo "<br>";
    echo $string1 . " " . $string2;
    echo "<h1>" . $string1 . "</h1>";
    echo "<h1>$string1</h1>";
    echo '$string1';
    echo "<br>";
    $array1 = [1, "2", 3];
    $array2 = ["a", "b", "c"];
    var_dump($array1);
    echo "<br>";
    var_dump($array2);

    echo "<br>";
    define("EDAD", 25);
    echo EDAD;
    echo "<br>";
    $dia = date("d");
    if ($dia <= 15)
        echo "Estamos a principios de mes";
    else
        echo "Estamos a finales de mes";

    echo "<br>";
    $random1 = rand(1, 150);
    echo "<br>";
    echo "el numero $random1 ";
    if ($random1 < 10) :
        echo "es de un digito";
    elseif ($random1 < 100) :
        echo "es de dos digitos";
    else :
        echo "es de tres digitos";
    endif;

    echo "<br>";
    $n1 = rand(1, 3);
    switch ($n1):
        case 1:
            echo "el numero es igual a 1";
            break;
        case 2:
            echo "el numero es igual a 2";
            break;
        case 3:
            echo "el numero es igual a 3";
    endswitch;

    echo "<br>";
    $date = date("l");
    switch (date("N")) {
        case 1:
            $date = "Lunes";
            break;
        case 2:
            $date = "Martes";
            break;
        case 3:
            $date = "Miercoles";
            break;
        case 4:
            $date = "Jueves";
            break;
        case 5:
            $date = "Viernes";
            break;
        case 6:
            $date = "Sabado";
            break;
        case 7:
            $date = "Domingo";
    }
    switch ($date) {
        case "Lunes":
        case "Miercoles":
        case "Viernes":
            echo "Los " . $date . " hay clase";
            break;
        default:
            echo "Los " . $date . " no hay clase";
    }



    ?>
</body>

</html>