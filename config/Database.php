<?php
    class Database {
        private $host;
        private $port;
        private $dbname;
        private $username;
        private $password;
        private $conn;


         public function __construct($db) {
             $this->username = getenv('username');
             $this->password = getenv('password');
             $this->dbname = getenv('dbname');
             $this->host = getenv('host');
             $this->port = getenv('port');
             $this->conn = $db;

         }
         
        //DB connect for Render  
         public function connect () {
             if ($this->conn) {
                 return $this->conn;
             } else {
                 $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};";

                 try {
                     $this->conn = new PDO($dsn, $this->username, $this->password);
                     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     return $this->conn;  
                 } catch(PDOException $e) {
                     echo 'Connection Error: ' . $e->getMessage();
                 }
             }
         }
      }

?>
