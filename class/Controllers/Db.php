<?php

class Db
{
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "1234";
    private $dbName = "cinema";

    private static $instance = null;
    private $connection = null;

    private function __construct()
    {
        $this->connection = new PDO(
            'mysql:dbname=' . $this->dbName . ';host=' . $this->dbHost . ';charset=UTF8', $this->dbUsername, $this->dbPassword
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new Db;

        return self::$instance;
    }

    function executeQuery($sql, $params = array())
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
    
    function getRowCount($result)
    {
        return $result->rowCount();
    }
    
    function fetchAllResults($result, $mode = PDO::FETCH_ASSOC)
    {
        return $result->fetchAll($mode);
    }
    
    function fetchSingleValue($result, $field)
    {
        $row = $this->fetchArrayResult($result);
        if (!isset($row[$field])) return null;
        return $row[$field];
    }


    function fetchArrayResult($result, $mode = PDO::FETCH_ASSOC)
    {
        $arrayResult = $result->fetch($mode);
        return $arrayResult;
    }
    
    function commitTransaction()
    {
        $this->connection->commit();
    }

    function buildUpdateParams($data, $excludeID = false)
    {
        $params = array();
        foreach ($data as $key => $value) {
            if ($key == "id" && !$excludeID) continue;
            $params[] = "`" . $key . "`=:" . $key;
        }

        return implode(",", $params);
    }
    
}
