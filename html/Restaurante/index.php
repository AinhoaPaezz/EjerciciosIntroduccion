<?php

require_once "datos.php";
require_once "funciones.php";


// Recogemos los filtros de la URL

$tipo = $_GET["tipo"] ?? "";

$ingrediente = $_GET["ingrediente"] ?? "";

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Restaurante</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h1>Restaurante</h1>


    <!-- FILTROS POR TIPO -->

    <h2>Filtrar por tipo</h2>

    <a href="index.php">Todos</a>

    <a href="index.php?tipo=primero">
        Primeros
    </a>

    <a href="index.php?tipo=segundo">
        Segundos
    </a>

    <a href="index.php?tipo=postre">
        Postres
    </a>


    <hr>


    <!-- BUSCAR POR INGREDIENTE -->

    <h2>Buscar por ingrediente</h2>

    <form action="index.php" method="GET">

        <input type="text" name="ingrediente" placeholder="Ejemplo: pollo"
            value="<?php echo htmlspecialchars($ingrediente); ?>">

        <button type="submit">
            Buscar
        </button>

    </form>


    <hr>


    <!-- LISTADO DE PLATOS -->

    <h2>Platos</h2>


    <?php

    $hayResultados = false;


    foreach ($platos as $plato) {


        // Si hemos seleccionado un tipo,
        // comprobamos que coincida.
    
        if ($tipo != "" && $plato["tipo"] != $tipo) {

            continue;
        }


        // Si hemos buscado un ingrediente,
        // comprobamos que el plato lo tenga.
    
        if (
            $ingrediente != ""
            && !tieneIngrediente($plato, $ingrediente)
        ) {

            continue;
        }


        $hayResultados = true;

        ?>


        <div>

            <h3>
                <?php echo htmlspecialchars($plato["nombre"]); ?>
            </h3>


            <p>

                Precio:

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

                Tipo:

                <?php echo nombreTipo($plato["tipo"]); ?>

            </p>


            <p>
                Ingredientes:
            </p>


            <ul>

                <?php foreach ($plato["ingredientes"] as $ingredientePlato) { ?>

                    <li>
                        <?php
                        echo htmlspecialchars($ingredientePlato);
                        ?>
                    </li>

                <?php } ?>

            </ul>


            <!-- BOTONES -->

            <a href="detalle.php?id=<?php echo $plato["id"]; ?>">
                Ver detalle
            </a>


            <a href="editar.php?id=<?php echo $plato["id"]; ?>">
                Editar
            </a>


            <a href="eliminar.php?id=<?php echo $plato["id"]; ?>"
                onclick="return confirm('¿Seguro que quieres eliminar este plato?');">
                Eliminar
            </a>

        </div>


        <hr>


        <?php

    }


    if (!$hayResultados) {

        echo "<p>No se han encontrado platos.</p>";

    }

    ?>


    <!-- AÑADIR PLATO -->

    <br>

    <a href="nuevo.php">
        Añadir nuevo plato
    </a>


</body>

</html>