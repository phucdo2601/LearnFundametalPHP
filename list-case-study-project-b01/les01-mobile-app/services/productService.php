<?php

include_once "./dbConnect.php";
    class ProductService {
        public $db = null;

        public function __construct()
        {
            $this->db = new DbConnection();
        }

        public function getAllProducts() {
            $query = "SELECT * FROM tbl_register ORDER BY id DESC";
            $result = $this->db->con->query($query);
            return $result;
        }
    }
?>