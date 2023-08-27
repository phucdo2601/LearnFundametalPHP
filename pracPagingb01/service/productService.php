<?php
    require_once '../config/dbConnect.php';

    class ProductService {
        public $db = null;

        public function __construct() {
            $this->db = new DbConection();
        }

        public function getAllProducts() {
            $queryAllUsers = 'SELECT * FROM product';
            $listAllUsers = $this->db->select($queryAllUsers);

            $listData = $listAllUsers->fetchAll();

            return $listData;
        }

    }
?>