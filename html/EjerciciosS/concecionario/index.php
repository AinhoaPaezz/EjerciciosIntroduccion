<?php

include "db/conexion.php";

$sql = "SELECT * FROM coches";
$stmt = $conexion->query($sql);
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Mi concesionario</h1>

    <h2>Añadir coche</h2>

    <form action="añadir.php" method="POST">

        <label>Marca:</label>
        <input type="text" name="marca" required>

        <label>Modelo:</label>
        <input type="text" name="modelo" required>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>

        <label>Año:</label>
        <input type="number" name="año" required>

        <button type="submit">Añadir coche</button>

    </form>


    <h2>Lista de coches</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Año</th>
            <th>Acción</th>
        </tr>

        <?php

        foreach ($resultado as $coche) {

            ?>

            <tr>

                <td><?php echo $coche["id"]; ?></td>

                <td><?php echo $coche["marca"]; ?></td>

                <td><?php echo $coche["modelo"]; ?></td>

                <td><?php echo $coche["precio"]; ?> €</td>

                <td><?php echo $coche["año"]; ?></td>

                <td>
                    <form action="borrar.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $coche["id"]; ?>">
                        <button type="submit">Eliminar</button>
                    </form>

                    <form action="editar.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $coche["id"]; ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>

            </tr>

            <?php

        }

        ?>

    </table>

</body>

</html>