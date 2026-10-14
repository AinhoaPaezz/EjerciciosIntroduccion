<?php

require_once "datos.php";


// Comprobamos que hemos recibido el ID

if (!isset($_GET["id"])) {

    header("Location: index.php");
    exit;

}


$id = $_GET["id"];


// Buscamos el plato dentro del array

foreach ($platos as $indice => $plato) {

    if ($plato["id"] == $id) {

        // Eliminamos el plato

        unset($platos[$indice]);

        break;

    }

}


// Reorganizamos los índices del array

$platos = array_values($platos);


// Volvemos al listado

header("Location: index.php");

exit;

?>