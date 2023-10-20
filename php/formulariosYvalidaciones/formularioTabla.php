<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla formulario</title>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <label>Producto</label>
            <br>
            <input type="text" name="producto">
            <br><br>
            <label>Precio</label>
            <br>
            <input type="number" step="1" name="precio">
            <br><br>
            <label>Cantidad</label>
            <br>
            <input type="number" step="1" name="cantidad">
            <br><br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>


        <?php
        $productos = [
            ["Jamon", 10, 3],
            ["Queso", 7, 1],
            ["CocaCola", 3, 10],
        ];
        foreach ($productos as $producto) {

            list($nombre, $precio, $cantidad) = $producto;
            echo "<tr><td>" . $nombre . "</td><td>" . $precio . "</td><td>" . $cantidad . "</td></tr>";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre =  $_POST["producto"];
            $precio = (float)$_POST["precio"];
            $cantidad = (int)$_POST["cantidad"];

            $nuevo_producto = [$nombre, $precio, $cantidad];
            array_push($productos, $nuevo_producto);
            echo "<tr><td>" . $nombre . "</td><td>" . $precio . "</td><td>" . $cantidad . "</td></tr>";
        }

        ?>
    </table>
</body>

</html>