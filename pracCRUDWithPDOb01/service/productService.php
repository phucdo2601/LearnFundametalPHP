<?php
    require_once '../config/dbConnect.php';

    class ProductService {
        private $db;

        public function __construct() {
            $this->db = new DbConnection();
        }

        public function getAllProductsWithPaging($page_num = 1, $page_row = 3) {
            $queryAllProducts = "Select * from products";
            $listAll = $this->db->select($queryAllProducts);
            $countAll = $listAll->rowCount();

            $page_nums = ceil($countAll / $page_row);
             
        }
    }


?>