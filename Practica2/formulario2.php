<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "funciones.php"; ?>
    <title>Formulario</title>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>
                <h2>Cambiar Divisas</h2>
            </legend>
            <input type="number" name="precio" min="0" step="0.01">
            <br><br>

            <div id="divisa_original">
                <fieldset>
                    <legend>Divisa de Origen</legend>
                    <input type="radio" name="divisa_original" value="E">
                    <label for="">€</label>
                    <br>
                    <input type="radio" name="divisa_original" value="D">
                    <label for="">$</label>
                    <br>
                    <input type="radio" name="divisa_original" value="Y">
                    <label for="">¥</label>
                </fieldset>
                <br>
            </div>
            <div id="divisa_transformar">
                <fieldset>
                    <legend>Divisa a transformar</legend>
                    <input type="radio" name="divisa_transformar" value="E">
                    <label for="">€</label>
                    <br>
                    <input type="radio" name="divisa_transformar" value="D">
                    <label for="">$</label>
                    <br>
                    <input type="radio" name="divisa_transformar" value="Y">
                    <label for="">¥</label>
                    <br>
                </fieldset>
            </div>

            <br>
            <input type="hidden" name="action" value="divisas">
            <input type="submit" value="Cambiar divisa">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "divisas") {
                    if (isset($_POST["divisa_original"]) && isset($_POST["divisa_transformar"])) {
                        $precio = (float)$_POST["precio"];
                        if (!empty($precio)) {
                            $divisa_original = $_POST["divisa_original"];
                            $divisa_transformar = $_POST["divisa_transformar"];
                            echo "<h3>" . cambiarDivisa($precio, $divisa_original, $divisa_transformar) . "</h3>";
                        } else {
                            echo "<h3>Escriba el precio</h3>";
                        }
                    } else {
                        echo "<h3>Elige unidad</h3>";
                    }
                }
            }
            ?>
        </fieldset>
    </form>
    <br><br>
    <form action="" method="post">
        <fieldset>
            <legend>
                <h2>Algoritmos matematicos</h2>
            </legend>
            <input type="number" name="numero">
            <br><br>
            <select name="algoritmo">
                <option value="sumatorio">Sumatorio</option>
                <option value="factorial">Factorial</option>
            </select>
            <br><br>
            <input type="hidden" name="action" value="algoritmos_matematicos">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "algoritmos_matematicos") {
                    $numero = (int)$_POST["numero"];
                    if (!isset($_POST["numero"])) {
                        echo "<h3>Rellena el numero</h3>";
                    } else {
                        $algoritmo = $_POST["algoritmo"];
                        if ($algoritmo == "sumatorio") {
                            if ($numero >= 0) {
                                echo "<h3>" . sumatorio($numero) . "</h3>";
                            } else {
                                echo  "<h3> Numeros mayores a 0 por favor</h3>";
                            }
                        } else {
                            if ($numero < 1) {
                                echo "<h3>Para el factorial el numero minimo es 1</h3>";
                            } else {
                                echo "<h3>" . factorial($numero) . "</h3>";
                            }
                        }
                    }
                }
            }
            ?>
        </fieldset>
    </form>
    <br><br>
    <?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
    ]
    ?>
    <fieldset>
        <legend>
            <h2>Animales</h2>
        </legend>
        <form action="" method="post">
            <label for="">Animal: </label>
            <input type="text" name="animal">
            <br><br>
            <input type="hidden" name="action" value="Animales">
            <input type="submit" value="Comprobar">
            <br><br>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["action"] == "Animales") {
                $nombre_animal = $_POST["animal"];
                $animalEncontrado = false;
                foreach ($animales as $animal) {
                    list($nombre, $clase, $ejemplares) = $animal;
                    if ($nombre_animal == $nombre) {
                        echo "<h3>El " . $nombre . " esta " . (comprobarEstado($ejemplares)) . "</h3>";
                        $animalEncontrado = true;
                    }
                }
                if (!$animalEncontrado) echo "<h3>El animal introducido no esta en la lista</h3>";
            }
        }
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Especie</th>
                    <th>Clase</th>
                    <th>Nº Ejemplares</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($animales as $animal) {
                    list($nombre, $clase, $ejemplares) = $animal;
                    echo "<tr>";
                    echo "<td>$nombre</td>";
                    echo "<td>$clase</td>";
                    echo "<td>$ejemplares</td>";
                    echo "<td>" . comprobarEstado($ejemplares) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>


    </fieldset>
</body>

</html>