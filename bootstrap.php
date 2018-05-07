<?php

// Cargar Dependencias
require_once dirname(__FILE__).'/vendor/autoload.php';

// Cargar Config
$config = parse_ini_file('bot.config');

// Base de Datos Config
define('DB_HOST', $config['DB_HOST']);
define('DB_NAME', $config['DB_NAME']);
define('DB_USER', $config['DB_USER']);
define('DB_PASS', $config['DB_PASS']);

// Crear instancia PDO
try {
    $db = new \PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME,
        DB_USER,
        DB_PASS
    );
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
    die();
}