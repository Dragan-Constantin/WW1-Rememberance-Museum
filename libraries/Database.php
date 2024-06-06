<?php

/**
 * Database class for managing database connections and queries.
 */
class Database {
    private $host;
    private $port;
    private $username;
    private $password;
    private $database;
    private $conn;
    private $stmt;
    private $error;

    /**
     * Constructor to initialize database connection.
     */
    public function __construct() {
        $this->host = $_ENV["HOSTNAME"];
        $this->port = $_ENV["PORT"];
        $this->username = $_ENV["USERNAME"];
        $this->password = $_ENV["PASSWORD"];
        $this->database = $_ENV["DBNAME"];
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->database";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ];
        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * Prepares a SQL query.
     *
     * @param string $sql The SQL query to be prepared.
     */
    public function prepareQuery($sql) {
        $this->stmt = $this->conn->prepare($sql);
    }

    /**
     * Executes a prepared statement.
     *
     * @param array $vars Optional array of parameters to bind to the query.
     * @return bool True on success, false on failure.
     */
    public function execute($vars = array()) {
        return $this->stmt->execute($vars);
    }

    /**
     * Fetches all results from a query as an associative array.
     *
     * @param array $vars Optional array of parameters to bind to the query.
     * @return array The fetched results.
     */
    public function resultSet($vars = array()) {
        $this->execute($vars);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetches a single result from a query as an associative array.
     *
     * @param array $vars Optional array of parameters to bind to the query.
     * @return array The fetched result.
     */
    public function resultSingle($vars = array()) {
        $this->execute($vars);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Returns the number of rows affected by the last SQL statement.
     *
     * @return int The number of affected rows.
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}