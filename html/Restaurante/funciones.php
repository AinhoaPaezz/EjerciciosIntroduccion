<?php

function buscarPlato($platos, $id)
{
    foreach ($platos as $plato) {

        if ($plato["id"] == $id) {

            return $plato;
        }
    }

    return null;
}


function tieneIngrediente($plato, $ingrediente)
{
    foreach ($plato["ingredientes"] as $ingredientePlato) {

        if (strtolower($ingredientePlato) == strtolower($ingrediente)) {

            return true;
        }
    }

    return false;
}


function nombreTipo($tipo)
{
    switch ($tipo) {

        case "primero":
            return "Primer plato";

        case "segundo":
            return "Segundo plato";

        case "postre":
            return "Postre";

        default:
            return "Sin categoría";
    }
}

?>