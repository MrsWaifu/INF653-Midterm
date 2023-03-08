<?php 
  class Database {

    private $hostname = 'localhost';
    private $port = '5432';
    private $database = 'quotesdb';
    private $username = 'postgres';
    private $password = 'postgres';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;
  
      $hostname = $dbparts['host'];
      $username = $dbparts['user'];
      $password = $dbparts['pass'];
      $database = ltrim($dbparts['path'],'/');

      try {
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
      }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }
    }
  }