<?php
    require_once 'dbConfig.php';

    class DbConnection {
        public $HOST = HOST;
        public $USER = USER;
        public $PASSWORD = PASSWORD;
        public $DATABASE = DATABASE;

        public $link;
        public $error;


        public function  __construct()
        {
            $this->dbConnect();
        }

        public function dbConnect() {
            $this->link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
            if (!$this->link) {
                $this->error = "Connection is failed!";
            }
        }

        public function select($query) {
            $result = mysqli_query($this->link, $query);
            return $result;
        }

    }
?>