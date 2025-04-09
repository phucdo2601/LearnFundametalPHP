<?php
    class Database {
        private $dbserver = "localhost:3306";
        private $dbuser = "root";
        private $dbpassword = "";
        private $dbname = "l_advance_php_crub_b01";

        protected $conn;

        //constructor
        public function __construct() {
            try {
                $dsn = "mysql:host={$this->dbserver}; dbname={$this->dbname}; charset=utf8";
                $options=array(PDO::ATTR_PERSISTENT);
                $this->conn = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
            } catch (PDOException $e) {
                echo "Connection Error".$e->getMessage();
            }
        }
    }
?>