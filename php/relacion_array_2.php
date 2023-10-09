<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Crea un array que almacene nombres de productos y sus respectivos precios. Muestra en una tabla los productos con sus precios, ordenados alfabeticamente por el nombre del producto. Muestra tambien el precio total de los productos y cuantos productos hay en el array."</h3>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php
        $productos = [
            ["Pollo", 5],
            ["Yogur", 2],
            ["Jamon", 4]
        ];

        $nombre = array_column($productos, 0);
        array_multisort($nombre, SORT_ASC, $productos);

        foreach ($productos as $producto) {
            list($nombre, $precio) = $producto;
            echo "<tr><td>" . $nombre . "</td><td>" . $precio . "</td></tr>";
        }
        echo "<tr><td>Total: </td><td>" . count($productos) . "</td><td>" . array_sum(array_column($productos, 1)) . "</td></tr>";
        ?>
    </table>

    <h3>Modifica el array anterior para que ademas de los productos y sus precios almacene la cantidad que se ha comprado de cada producto. Muestra en una columna adicional el precio total de cada producto (producto x cantidad) y al final de la tabla el precio total de todos los productos comprados y la cantidad de productos adquiridos</h3>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Producto por cantidad</th>
        </tr>
        <?php
        $total = 0;
        $productos = [
            ["Pollo", 5, 3],
            ["Yogur", 2, 2],
            ["Jamon", 4, 5]
        ];

        $nombre = array_column($productos, 0);
        array_multisort($nombre, SORT_ASC, $productos);

        foreach ($productos as $producto) {
            list($nombre, $precio, $cantidad) = $producto;
            echo "<tr><td>" . $nombre . "</td><td>" . $precio . "</td><td>" . ($precio * $cantidad) . "</td></tr>";
            $total += $precio * $cantidad;
        }
        echo "<tr><td>Total: </td><td></td><td>" . $total . "</td></tr>";
        ?>
    </table>

    <h3>Crea un array que cotenga los numeros del 1 al 50. Elimina mediante un bucle y la funcion unset los numeros que sean divisibles entre 3</h3>
    <?php
    $numeros = range(1, 51);
    foreach ($numeros as $numero) {
        if ($numero % 3 == 0) {
            unset($numeros[$numero - 1]);
        }
    }
    foreach ($numeros as $numero) {
        echo $numero . "<br>";
    }


    ?>
    <h3>Crea un array de dos dimensiones que contenga el nombre de cada persona, su apellido y su edad, que será un número aleatorio entre 0 y 100. Muestra los datos en una tabla que además contenga una columna que indique si la persona es menor de edad, mayor de edad, o está jubilada (+65 años)Utiliza la estructura match.</h3>
    <?php
    $personas = [
        ["Juan Fernandez", rand(0, 100)],
        ["Maria Nose", rand(0, 100)],
        ["Pedro Alonso", rand(0, 100)],
        ["Jose Castro", rand(0, 100)]
    ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Tipo Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($personas as $persona) {
                list($nombre, $edad) = $persona;
                $tipoPersona = match (true) {
                    $edad >= 0 && $edad <= 18 => "Menor de edad",
                    $edad > 18 && $edad <= 65 => "Mayor de edad",
                    $edad >= 65 => "Jubilado",
                    default => "Error"
                };
                echo "<tr><td>" . $nombre . "</td><td>" . $edad . "</td><td>" . $tipoPersona . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h3>Crea un array que contenga el DNI y el nombre de cada persona. Muestra esa información en una tabla en la que además indiques si el DNI introducido es correcto. Un DNI será correcto cuando tenga exactamente 9 caracteres</h3>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>DNI correcto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $personas = [
                ["12345678A", "Juan Fernandez"],
                ["12345678B", "Maria Nose"],
                ["1234567A", "Pedro Alonso"],
                ["1234567Z", "Jose Castro"]
            ];
            foreach ($personas as $persona) {
                list($dni, $nombre) = $persona;
                if (strlen($dni) == 9) {
                    echo "<tr><td>" . $dni . "</td><td>" . $nombre . "</td><td>Si</td></tr>";
                } else {
                    echo "<tr><td>" . $dni . "</td><td>" . $nombre . "</td><td>No</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>