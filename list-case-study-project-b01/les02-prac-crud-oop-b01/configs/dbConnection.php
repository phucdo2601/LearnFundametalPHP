<?php
    require_once '../configs/dbConfig.php';

    class DbConnection {
        private  $HOST = HOST;
        private $USER = USER;
        private $PASSWORD = PASSWORD;
        private $DATABASE = DATABASE;

        public $link;

        public $error;

        public function __construct() {
            $this->dbConnect();
        }

        public function dbConnect() {
            $this->link =  mysqli_connect($this->HOST, $this->USER, $this->PASSWORD, $this->DATABASE) or  die($this->link->error . __LINE__);
            if (!$this->link) {
                $error = 'Database connection failed';
                return false; 
            }
        }

        public function select($query) {
            $result = mysqli_query($this->link, $query)  or  die($this->link->error . __LINE__);

            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                return false;
            }
        }

        public function insert($query) {
            $result = mysqli_query($this->link, $query)  or  die($this->link->error . __LINE__);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }

        public function update($query) {
            $result = mysqli_query($this->link, $query)  or  die($this->link->error . __LINE__);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }


        public function delete($query) {
            $result = mysqli_query($this->link, $query)  or  die($this->link->error . __LINE__);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }
    }

    // $testCon = new DbConnection();
    // var_dump($testCon->dbConnect());
    // die();
?>