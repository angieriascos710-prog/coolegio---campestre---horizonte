<?php
// Datos de conexión. En XAMPP normalmente el usuario es root y la clave vacía.
const DB_HOST = 'localhost';
const DB_NAME = 'colegio_campestre_horizonte';
const DB_USER = 'root';
const DB_PASS = '';

function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die('No hay conexión con la base de datos. Revisa que MySQL esté encendido en XAMPP y que la base "'
                . DB_NAME . '" exista. Detalle: ' . $e->getMessage());
        }
    }
    return $pdo;
}
