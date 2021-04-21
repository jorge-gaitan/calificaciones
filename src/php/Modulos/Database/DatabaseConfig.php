<?php

namespace Jorge\Modulos\Database;

use Dotenv\Dotenv;

// Cargar el contenido del archivo .env con la configuración para la base de datos.
final class DatabaseConfig
{
    private static $host = 'localhost';
    private static $port = '3307';
    private static $protocol = 'mysql';
    private static $database = 'database';
    private static $username = 'root';
    private static $password = '';

    public static function init($path = null): void
    {
        $path = ($path ?: __DIR__ . '/../../../../');
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->load();

        self::$host = $_ENV['mysql_server'];
        self::$protocol = $_ENV['mysql_protocol'];
        self::$port = $_ENV['mysql_port'];
        self::$database = $_ENV['mysql_database'];
        self::$username = $_ENV['mysql_username'];
        self::$password = $_ENV['mysql_password'];
    }

    public static function instance(): self
    {
        return new self();
    }

    public static function getHost(): string
    {
        return self::$host;
    }

    public static function getPort(): string
    {
        return self::$port;
    }

    public static function getProtocol(): string
    {
        return self::$protocol;
    }

    public static function getDatabase(): string
    {
        return self::$database;
    }

    public static function getUsername(): string
    {
        return self::$username;
    }

    public static function getPassword(): string
    {
        return self::$password;
    }
}
