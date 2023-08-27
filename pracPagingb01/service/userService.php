<?php
    require_once '../config/dbConnect.php';

    class UserService {
        public $db = null;

        public function __construct() {
            $this->db = new DbConection();
        }

        public function getAllUsers() {
            $queryAllUsers = "SELECT * FROM user";

            $listAllUsers = $this->db->select($queryAllUsers);

            return $listAllUsers->fetchAll();
        }
    }

?>