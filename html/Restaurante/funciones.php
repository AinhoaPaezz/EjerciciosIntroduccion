<?php

// 1. Obtiene todos los ingredientes 
function obtenerIngredientes($conexion)
{
    $sql = "SELECT * FROM ingredientes ORDER BY nombre";
    $consulta = $conexion->query($sql);

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

// 2. Busca un plato especfico por su nombre
function buscarPlato($conexion, $nombrePlato)
{
    $sql = "SELECT * FROM platos WHERE nombre = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->execute([$nombrePlato]);

    return $consulta->fetch(PDO::FETCH_ASSOC);
}

// 3. Devuelve el nombre 
function nombreTipo($tipoPlato)
{
    return match ($tipoPlato) {
        'primero' => 'Primer plato',
        'segundo' => 'Segundo plato',
        'postre' => 'Postre',

    };
}
// 4. Obtiene la lista de ingredientes que lleva un plato específico
function obtenerIngredientesDeUnPlato($conexion, $nombrePlato)
{
    $sql = "SELECT ingrediente FROM plato_ingrediente WHERE plato = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->execute([$nombrePlato]);

    // fetchAll con FETCH_COLUMN te devuelve directamente un array simple de textos: ['Patata', 'Huevo', 'Cebolla']
    return $consulta->fetchAll(PDO::FETCH_COLUMN);
}

