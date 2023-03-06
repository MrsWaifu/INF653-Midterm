<?php 
  class Database {

    private $hostname = 'dpg-cg1q5s5269vfsntb9vm0-a';
    private $database = 'quotesdb_el48';
    private $username = 'quotesdb_el48_user';
    private $password = 'TD8oZ2yYfKXahTf5dVkr9l0p4XJDHPOz';

    private $conn;

    // DB Connect
    public function connect() {
      $url = getenv('postgres://quotesdb_el48_user:TD8oZ2yYfKXahTf5dVkr9l0p4XJDHPOz@dpg-cg1q5s5269vfsntb9vm0-a.oregon-postgres.render.com/quotesdb_el48');
      $dbparts = parse_url($url);
  
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