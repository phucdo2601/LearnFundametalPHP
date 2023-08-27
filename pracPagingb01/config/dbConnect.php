<?php
    require_once '../config/config.php';
    class DbConection {
        public $host = HOST;
        public $user = USER;
        public $password = PASSWORD;
        public $database = DATABASE;

        public $link;
        public $error;

        public function __construct() {
            $this->openDbConnect();
        }

        public function openDbConnect() {
            try {
                $this->link = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            // set the PDO error mode to exception
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function select($query) {
            $result = $this->link->query($query);
            return $result;
        }

        public function closeDbConnect() {
            $this->link = null;
        }

        
    }
?>