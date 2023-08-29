<?php
require_once './dbConfig.php';

class DbConnection {
    public $host = HOST;
    public $username = USERNAME;
    public $password = PASSWORD;
    public $database = DATABASE;

    public function __construct(){
        $this->dbConnect();
    }
    
    public $link;
    public $error;

    public function dbConnect() {
        try {
            $this->link = new PDO("mysql:$this->host;dbname=$this->database", $this->username, $this->password);
            //set PDO error mode to exception
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo 'Connection error: '.$e->getMessage();
        }
        
    }

    public function select($query) {
        $result = $this->link->query($query);
        return $result;
    }

    public function insert($query) {
        $result = $this->link->query($query) or die($this->link->errorInfo());
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function update($query) {
        $result = $this->link->query($query) or die($this->link->errorInfo());
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function delete($query) {
        $result = $this->link->query($query) or die($this->link->errorInfo());
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function closeDbConnect() {
        $this->link = null;
    }

    

}
?>