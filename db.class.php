<?php


class Db
{
    /**
     * @return PDO
     */
    private $connection;

    /**
     * Db constructor.
     */
    function __construct()
    {
        $this->connection = null;
    }

    /**
     * Kills the Db Connection
     */
    function __destruct()
    {
        $this->connection = null;
    }

    /**
     * @return PDO
     */
    function con()
    {
        try {

            $this->connection = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true));

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connection->query("SET time_zone = '+5:30'");

            return $this->connection;

        } catch (PDOException $e) {
		pageInfo("danger", "Database Error");
		exit;
        }
    }
}
