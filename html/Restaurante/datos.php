<?php

session_start();


// Si todavía no tenemos platos guardados en la sesión,
// creamos los platos iniciales.

if (!isset($_SESSION["platos"])) {

    $_SESSION["platos"] = [

        [
            "id" => 1,
            "nombre" => "Ensalada César",
            "precio" => 9.50,
            "tipo" => "primero",
            "ingredientes" => [
                "lechuga",
                "pollo",
                "queso",
                "salsa César"
            ]
        ],

        [
            "id" => 2,
            "nombre" => "Paella de pollo",
            "precio" => 14.50,
            "tipo" => "segundo",
            "ingredientes" => [
                "arroz",
                "pollo",
                "pimiento",
                "tomate"
            ]
        ],

        [
            "id" => 3,
            "nombre" => "Tarta de queso",
            "precio" => 5.50,
            "tipo" => "postre",
            "ingredientes" => [
                "queso",
                "galleta",
                "azúcar"
            ]
        ],

        [
            "id" => 4,
            "nombre" => "Sopa de verduras",
            "precio" => 7.00,
            "tipo" => "primero",
            "ingredientes" => [
                "zanahoria",
                "calabacín",
                "patata",
                "cebolla"
            ]
        ]

    ];
}


// Creamos la variable $platos
// usando los platos guardados en la sesión.

$platos =& $_SESSION["platos"];

?>