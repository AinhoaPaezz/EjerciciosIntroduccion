<?php

require_once "funciones.php";
require_once "db/conexion.php"; // Asegúrate de que este archivo usa mysqli

// 1. Recoger los filtros de la URL ($_GET) para que no den error
$tipo = $_GET["tipo"] ?? "";
$ingrediente = $_GET["ingrediente"] ?? "";

// Consultamos los platos de la base de datos
$sql = "SELECT * FROM platos ORDER BY nombre";
$stmt = $conexion->query($sql);
$platosBD = $stmt->fetchAll(PDO::FETCH_ASSOC);

$platos = [];
// Construimos el array estructurado con los ingredientes de cada plato
foreach ($platosBD as $fila) {
    $ingredientesDelPlato = obtenerIngredientesDeUnPlato($conexion, $fila['nombre']);
    // Construimos el array del plato simulando la estructura que espera tu HTML
    $platos[] = [
        "id" => urlencode($nombrePlato), // Usamos el nombre como ID para los enlaces de editar/borrar
        "nombre" => $nombrePlato,
        "precio" => $fila['precio'],
        "tipo" => $fila['tipo'],
        "ingredientes" => $ingredientesPlato
    ];
}

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
    <a href="index.php">Todos</a> |
    <a href="index.php?tipo=primero">Primeros</a> |
    <a href="index.php?tipo=segundo">Segundos</a> |
    <a href="index.php?tipo=postre">Postres</a>

    <hr>

    <!-- BUSCAR POR INGREDIENTE -->
    <h2>Buscar por ingrediente</h2>
    <form action="index.php" method="GET">
        <input type="text" name="ingrediente" placeholder="Ejemplo: pollo"
            value="<?php echo htmlspecialchars($ingrediente); ?>">
        <button type="submit">Buscar</button>
    </form>

    <hr>

    <!-- LISTADO DE PLATOS -->
    <h2>Platos</h2>

    <?php
    $hayResultados = false;

    foreach ($platos as $plato) {

        // Filtrar por Tipo
        if ($tipo != "" && $plato["tipo"] != $tipo) {
            continue;
        }

        // Filtrar por Ingrediente
        // Nota: in_array comprueba si el ingrediente buscado está en el array de ingredientes del plato
        if ($ingrediente != "" && !in_array(strtolower($ingrediente), array_map('strtolower', $plato["ingredientes"]))) {
            continue;
        }

        $hayResultados = true;
        ?>

        <div>
            <h3><?php echo htmlspecialchars($plato["nombre"]); ?></h3>
            <p>Precio: <?php echo number_format($plato["precio"], 2, ",", "."); ?> €</p>
            <p>Tipo: <?php echo htmlspecialchars($plato["tipo"]); ?></p>

            <p>Ingredientes:</p>
            <ul>
                <?php foreach ($plato["ingredientes"] as $ingredientePlato) { ?>
                    <li><?php echo htmlspecialchars($ingredientePlato); ?></li>
                <?php } ?>
            </ul>

            <!-- BOTONES (Pasando el nombre del plato codificado en la URL como id) -->
            <a href="detalle.php?id=<?php echo $plato["id"]; ?>">Ver detalle</a> |
            <a href="editar.php?id=<?php echo $plato["id"]; ?>">Editar</a> |
            <a href="eliminar.php?id=<?php echo $plato["id"]; ?>"
                onclick="return confirm('¿Seguro que quieres eliminar este plato?');">Eliminar</a>
        </div>
        <hr>

        <?php
    }

    if (!$hayResultados) {
        echo "<p>No se han encontrado platos.</p>";
    }
    ?>

    <br>
    <a href="nuevo.php">Añadir nuevo plato</a>

</body>

</html>