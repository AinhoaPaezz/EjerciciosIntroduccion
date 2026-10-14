<?php

// 1. Conexión a la base de datos de tu PC (Configurado para tu Workbench en Ubuntu)
$servidor = "database-1.c9uaktlkuqg8.us-east-1.rds.amazonaws.com";
$port = 3306;
$usuario = "admin";
$password = "dwes2026"; // ¡IMPORTANTE! Si pusiste contraseña en Workbench, escríbela aquí entre las comillas
$base_datos = "concesionario"; // El nombre exacto de la base de datos que creamos
/*
$dsn = "mysql:host=$servidor;port=$port;dbname=$base_datos;charset=utf8mb4";
$opciones_ssl = [
    // Ruta típica en Ubuntu/Debian. Si estás en CentOS/RedHat suele ser '/etc/pki/tls/certs/ca-bundle.crt'
    PDO::MYSQL_ATTR_SSL_CA => '/etc/ssl/certs/ca-certificates.crt',
    // Desactivamos temporalmente la verificación estricta del nombre del host para asegurar que conecte
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
];

$conector = null;
*/

$dsn = "mysql:host=$servidor;port=$port;dbname=$base_datos;charset=utf8mb4";
$opciones_ssl = [
    PDO::MYSQL_ATTR_SSL_CA => '../cert/global-bundle.pem',
    // Desactivamos temporalmente la verificación estricta del nombre del host para asegurar que conecte
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
];

$conexion = null;
$conexion = new PDO($dsn, $usuario, $password, $opciones_ssl);