<?php
    require_once '../configs/dbConnection.php';

    class ProductService {
        public $db;

        public function __construct() {
            $this->db = new DbConnection();
        }

        public function getAllProducts() {
            $query = "select * from product";

            $result = $this->db->select($query);

            $arrResult = [];
            while($row = $result->fetch_assoc()) {
                $model = array(
                    'item_id' => $row['item_id'],
                    'item_brand' => $row['item_brand'],
                    'item_name' => $row['item_name'],
                    'item_price' => $row['item_price'],
                    'item_image' => $row['item_image'],
                    'item_register' => $row['item_register'],
                );
                array_push($arrResult, $model);
            }

            return $arrResult;
        }
    }


    // $testProSer = new ProductService();
    // $listPro = $testProSer->getAllProducts();
    // var_dump($listPro);
?>