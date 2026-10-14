<?php

require_once "datos.php";

$errores = [];

$nombre = "";
$precio = "";
$tipo = "";
$ingredientes = [];


// Comprobamos si se ha enviado el formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recogemos los datos

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


    // SI NO HAY ERRORES, GUARDAMOS EL PLATO

    if (empty($errores)) {

        // Calculamos el siguiente ID

        if (empty($platos)) {

            $nuevoId = 1;

        } else {

            $ids = array_column($platos, "id");

            $nuevoId = max($ids) + 1;

        }


        // Creamos el nuevo plato

        $nuevoPlato = [

            "id" => $nuevoId,

            "nombre" => $nombre,

            "precio" => (float) $precio,

            "tipo" => $tipo,

            "ingredientes" => $ingredientes

        ];


        // Añadimos el plato al array

        $platos[] = $nuevoPlato;


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

    <title>Añadir plato</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <h1>Añadir nuevo plato</h1>


    <!-- MOSTRAR ERRORES -->

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

    <form action="nuevo.php" method="POST">


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

            <option value="">
                Selecciona un tipo
            </option>

            <option value="primero">
                Primer plato
            </option>

            <option value="segundo">
                Segundo plato
            </option>

            <option value="postre">
                Postre
            </option>

        </select>

        <br>
        <br>


        <h3>Ingredientes</h3>


        <label>

            <input type="checkbox" name="ingredientes[]" value="tomate">

            Tomate

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="queso">

            Queso

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="cebolla">

            Cebolla

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="pollo">

            Pollo

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="arroz">

            Arroz

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="patata">

            Patata

        </label>

        <br>


        <label>

            <input type="checkbox" name="ingredientes[]" value="zanahoria">

            Zanahoria

        </label>

        <br>
        <br>


        <button type="submit">
            Guardar plato
        </button>


    </form>


    <br>


    <a href="index.php">
        Volver al listado
    </a>


</body>

</html>