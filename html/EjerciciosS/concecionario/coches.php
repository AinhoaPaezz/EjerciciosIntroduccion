<?php
// 1. Conexión a la base de datos de tu PC (Configurado para tu Workbench en Ubuntu)
$servidor = "database-1.c9uaktlkuqg8.us-east-1.rds.amazonaws.com";
$usuario = "admin";
$password = "dwes2026";           // ¡IMPORTANTE! Si pusiste contraseña en Workbench, escríbela aquí entre las comillas
$base_datos = "concesionario"; // El nombre exacto de la base de datos que creamos

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. Lógica para BORRAR cuando se recibe un ID por la URL (?borrar=id)
if (isset($_GET['borrar'])) {
    $id_a_borrar = intval($_GET['borrar']); // Convertimos a número por seguridad

    // Consulta SQL para eliminar de la tabla
    $sql_borrar = "DELETE FROM coches WHERE id = $id_a_borrar";

    if ($conexion->query($sql_borrar) === TRUE) {
        // Recargar la página limpia sin el parámetro de borrar en la URL
        header("Location: coches.php");
        exit();
    } else {
        echo "Error al borrar: " . $conexion->error;
    }
}

// 3. Obtener todos los coches actuales de la base de datos
$sql_listar = "SELECT * FROM coches ORDER BY id DESC"; // Los más nuevos primero
$resultado = $conexion->query($sql_listar);

// 4. Variables para personalizar tu header.php
$titulo_pagina = "Lista de Coches - Concesionario";
$menu = "Coches";
$menu2 = "Nuevo";

// 5. Incluimos tu menú de forma limpia y automática
include 'header.php';
?>

<!-- Estilos exclusivos para la tabla de coches (tu menú ya trae sus propios estilos del header) -->
<style>
    .table-container {
        max-width: 900px;
        margin: 30px auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .btn-borrar {
        background-color: #f44336;
        color: white;
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn-borrar:hover {
        background-color: #da190b;
    }
</style>

<!-- Contenedor del listado -->
<div class="table-container">
    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($coche = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($coche['marca']); ?></strong></td>
                        <td><?php echo htmlspecialchars($coche['modelo']); ?></td>
                        <td><?php echo $coche['anyo']; ?></td>
                        <td><?php echo number_format($coche['precio'], 2, ',', '.'); ?> €</td>
                        <td>
                            <a class="btn-borrar" href="coches.php?borrar=<?php echo $coche['id']; ?>"
                                onclick="return confirm('¿Seguro que quieres borrar este coche?')">Borrar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align:center; color:#777; padding: 20px;">No hay coches en la base de datos actualmente.</p>
    <?php endif; ?>
</div>

</body>

</html>