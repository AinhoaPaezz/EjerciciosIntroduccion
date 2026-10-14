<?php

require_once "datos.php";
require_once "funciones.php";


// Comprobamos que hemos recibido el ID

if (!isset($_GET["id"])) {

    header("Location: index.php");
    exit;

}

$id = $_GET["id"];


// Buscamos la posición del plato dentro del array

$posicion = null;

foreach ($platos as $indice => $plato) {

    if ($plato["id"] == $id) {

        $posicion = $indice;
        break;

    }

}


// Si no encontramos el plato

if ($posicion === null) {

    echo "El plato no existe.";
    exit;

}


// Guardamos el plato que vamos a editar

$plato = $platos[$posicion];


// Variables del formulario

$errores = [];

$nombre = $plato["nombre"];

$precio = $plato["precio"];

$tipo = $plato["tipo"];

$ingredientes = $plato["ingredientes"];


// Comprobamos si se ha enviado el formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");

    $precio = $_POST["precio"] ?? "";

    $tipo = $_POST["tipo"] ?? "";

    $ingredientes = $_POST["ingredientes"] ?? [];


    // VALIDAR NOMBRE

    if ($nombre == "") {

        $errores[] = "El nombre es obligatorio.";

    }


    // VALIDAR PRECIO

    if (!is_numeric($precio) || $precio <= 0) {

        $errores[] = "El precio debe ser mayor que 0.";

    }


    // VALIDAR TIPO

    $tiposValidos = [
        "primero",
        "segundo",
        "postre"
    ];

    if (!in_array($tipo, $tiposValidos)) {

        $errores[] = "Debes seleccionar un tipo válido.";

    }


    // SI NO HAY ERRORES

    if (empty($errores)) {

        // Modificamos el plato

        $platos[$posicion] = [

            "id" => $id,

            "nombre" => $nombre,

            "precio" => (float) $precio,

            "tipo" => $tipo,

            "ingredientes" => $ingredientes

        ];


        // Volvemos al listado

        header("Location: index.php");

        exit;

    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Editar plato</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <h1>Editar plato</h1>


    <!-- ERRORES -->

    <?php if (!empty($errores)) { ?>

        <div>

            <?php foreach ($errores as $error) { ?>

                <p>
                    <?php echo htmlspecialchars($error); ?>
                </p>

            <?php } ?>

        </div>

    <?php } ?>


    <!-- FORMULARIO -->

    <form action="editar.php?id=<?php echo $id; ?>" method="POST">


        <label for="nombre">
            Nombre del plato:
        </label>

        <br>

        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">

        <br>
        <br>


        <label for="precio">
            Precio:
        </label>

        <br>

        <input type="number" id="precio" name="precio" step="0.01" value="<?php echo htmlspecialchars($precio); ?>">

        <br>
        <br>


        <label for="tipo">
            Tipo de plato:
        </label>

        <br>

        <select id="tipo" name="tipo">

            <option value="primero" <?php if ($tipo == "primero")
                echo "selected"; ?>>
                Primer plato
            </option>

            <option value="segundo" <?php if ($tipo == "segundo")
                echo "selected"; ?>>
                Segundo plato
            </option>

            <option value="postre" <?php if ($tipo == "postre")
                echo "selected"; ?>>
                Postre
            </option>

        </select>

        <br>
        <br>


        <h3>Ingredientes</h3>


        <label>

            <input type="checkbox" name="ingredientes[]" value="tomate" <?php
            if (in_array("tomate", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Tomate

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="queso" <?php
            if (in_array("queso", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Queso

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="cebolla" <?php
            if (in_array("cebolla", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Cebolla

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="pollo" <?php
            if (in_array("pollo", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Pollo

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="arroz" <?php
            if (in_array("arroz", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Arroz

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="patata" <?php
            if (in_array("patata", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Patata

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="zanahoria" <?php
            if (in_array("zanahoria", $ingredientes)) {
                echo "checked";
            }
            ?>>

            Zanahoria

        </label>

        <br>
        <br>


        <button type="submit">
            Guardar cambios
        </button>


    </form>


    <br>


    <a href="index.php">
        Volver al listado
    </a>


</body>

</html>