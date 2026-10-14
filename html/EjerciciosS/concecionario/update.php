<?php
include "db/conexion.php";

$id = $_POST["id"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$año = $_POST["año"];

$sql = " UPDATE coches SET marca = '$marca', modelo = '$modelo', precio = '$precio', año = '$año' WHERE  id =$id";
echo $sql;
die();
if ($conexion->query($sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error" . $conexion->error;
}
?>