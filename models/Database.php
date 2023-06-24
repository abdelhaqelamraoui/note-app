<?php


const HOSTNAME = 'localhost';
const PORT = 3306;
const DBNAME = 'notesdb';
const USERNAME = 'root';
const PASSWORD =   'root';

use \PDO as PDO;

class Database {

  private PDO $conn;

  function __construct() {
    $this->connect();
  }

  function __destruct() {
    $this->disconnect();
  }

  function init() {
    $sql = <<<TXT
    CREATE DATABASE IF NOT EXISTS notesdb;
    USE notesdb;
    CREATE TABLE IF NOT EXISTS notes (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(255) NOT NULL,
      content TEXT NOT NULL
    );
    TXT;

    if(!$this->isConnected()) $this->connect();
    if($this->isConnected()) $this->execute($sql);
    $this->disconnect();
  }

  private function connect() {
    $dsn = sprintf("mysql: host=%s; port=%d; dbname=%s", HOSTNAME, PORT, DBNAME);
    $this->conn = new PDO($dsn, USERNAME, PASSWORD);
  }

  function isConnected() {
    return !is_null($this->conn);
  }

  function disconnect() {
    unset($this->conn);
  }

  function execute($sql, $params = null) {
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($params);
  }

  function query($sql, $params = null, $mode = \PDO::FETCH_ASSOC, $class = null) {
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);
    $res = ($class === null) ? $stmt->fetchAll($mode) : $stmt->fetchAll($mode, $class);
    $stmt->closeCursor();
    return $res;
  }


  
}
