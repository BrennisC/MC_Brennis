<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';

class Conexion
{
    private static $pdo = null;
    public static function connection(): PDO
    {
        if (self::$pdo === null) {
            try {
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';

                $optiones = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejo de errores con excepciones
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Modo de recuperación predeterminado
                ];
                self::$pdo = new PDO($dsn, DB_USER, DB_PASS, $optiones);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
