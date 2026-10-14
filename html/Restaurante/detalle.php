<?php

require_once "datos.php";
require_once "funciones.php";


// Comprobamos que hemos recibido un ID

if (!isset($_GET["id"])) {

    header("Location: index.php");

    exit;

}


$id = $_GET["id"];


// Buscamos el plato

$plato = buscarPlato($platos, $id);


// Si no existe

if ($plato == null) {

    echo "El plato no existe.";

    exit;

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Detalle del plato</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

    <div class="contenedor">

        <h1>
            <?php echo htmlspecialchars($plato["nombre"]); ?>
        </h1>


        <p>

            <strong>Precio:</strong>

            <?php
            echo number_format(
                $plato["precio"],
                2,
                ",",
                "."
            );
            ?>

            €

        </p>


        <p>

            <strong>Tipo:</strong>

            <?php echo nombreTipo($plato["tipo"]); ?>

        </p>


        <h2>Ingredientes</h2>


        <ul>

            <?php foreach ($plato["ingredientes"] as $ingrediente) { ?>

                <li>
                    <?php echo htmlspecialchars($ingrediente); ?>
                </li>

            <?php } ?>

        </ul>


        <br>


        <a href="editar.php?id=<?php echo $plato["id"]; ?>">
            Editar plato
        </a>


        <br>
        <br>


        <a href="index.php">
            Volver al listado
        </a>

    </div>

</body>

</html>