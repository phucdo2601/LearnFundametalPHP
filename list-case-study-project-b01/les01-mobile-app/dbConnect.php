<?php
    class DbConnection {
        //Database connection properties
        protected $host = 'localhost';
        protected $user = 'root';
        protected $password = '12345678';
        protected $database = 'learn_php_crub_ec_web_b01';

        public $con = null;

        public function __construct(){
            $this->con = new mysqli($this->host, $this->user, $this->password, $this->database);

            if ($this->con->connect_error) {
                echo "Fail " . $this->con->connect_error;
            }
        }

        public function __destruct() {
            $this->closeConnection();
        }

        public function closeConnection() {
            if ($this->con != null) {
                $this->con->close();
                $this->con = null;
            }
        }
    }
?>