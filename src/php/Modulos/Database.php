<?php

namespace Jorge\Modulos;

use Jorge\Modulos\Database\DatabaseConfig;

/**
 * Clase principal que controla y proporciona todos los métodos de la base de datos
 */
final class Database
{

    /**
     * Objeto que guarda la conexión con el servidor mysql
     * @var \PDO
     */
    private static $PDO;

    /** 
     * Es la encargada de iniciar la clase, a su ves llama el método connect para iniciar la variable PDO
     */
    public static function init(): void
    {
        self::connect();
    }

    /**
     * Regresa la clase para usarla de manera mas cómoda dentro una variable
     */
    public static function instance(): self
    {
        return new self();
    }

    /**
     * Conecta la base de datos usando los parámetros .env
     */
    public static function connect(): void
    {
        $Config = DatabaseConfig::instance();

        $protocol = $Config->getProtocol();
        $server = $Config->getHost();
        $port = $Config->getPort();
        $database = $Config->getDatabase();
        $user = $Config->getUsername();
        $password = $Config->getPassword();

        try {
            $pdo = new \PDO("$protocol:host=$server:$port;dbname=$database", $user, $password);
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            self::$PDO = $pdo;
        } catch (\PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
        }
    }

    /**
     * Método que cierra la conexión MySQLi
     */
    public static function close(): void
    {
        self::$PDO = null;
    }

    /**
     * Ejecuta un <b>PDO::query</b> a la base de datos
     * @param string $sql Cadena de texto con comando SQL
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public static function query(string $sql)
    {
        $pdo = self::PDO();
        return $pdo->query($sql);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement Cadena de texto con comando SQL
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public static function prepare(string $statement)
    {
        $pdo = self::PDO();
        return $pdo->prepare($statement);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_execute(string $statement, array $params = [])
    {
        $stmt = self::prepare($statement);
        if ($stmt) {
            $stmt->execute($params);
        }
        return $stmt;
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @param bool $results
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_fetch(string $statement, array $params = [], bool $results = false, $fetch_all = false)
    {
        $stmt = self::prepare_execute($statement, $params);
        if ($results) {
            return (!$fetch_all ? $stmt->fetch(\PDO::FETCH_OBJ) : $stmt->fetchAll(\PDO::FETCH_OBJ));
        }
        return $stmt;
    }

    /**
     * 
     * @param string $statement
     * @param array $params
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_fetch_result(string $statement, array $params = [])
    {
        return self::prepare_fetch($statement, $params, true, false);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @param bool $results
     * @return \PDOStatement Regresa objecto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_fetch_all(string $statement, array $params = [])
    {
        return self::prepare_fetch($statement, $params, true, true);
    }

    /**
     * 
     * @param string $class
     * @param string $statement
     * @param array $params
     * @return \PDOStatement
     */
    public static function prepare_fetch_class(string $class, string $statement, array $params = [])
    {
        $stmt = self::prepare_execute($statement, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    /**
     * 
     * @param string $class
     * @param string $statement
     * @param array $params
     * @return \PDOStatement
     */
    public static function prepare_fetch_all_class(string $class, string $statement, array $params = [])
    {
        $stmt = self::prepare_execute($statement, $params);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * 
     * @return \PDO
     */
    public static function PDO(): \PDO
    {
        return self::$PDO;
    }

    /**
     * 
     * @return int
     */
    public static function getLastId(): int
    {
        return self::PDO()->lastInsertId();
    }
}
