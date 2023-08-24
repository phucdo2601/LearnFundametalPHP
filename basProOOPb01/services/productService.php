<?php
    require_once '../dbConnect.php';

    class ProductService {
        public $db;


        public function __construct()
        {
            $this->db = new DbConnection();
        }

        public function getAllProducts() {
            $query = "SELECT * FROM product";
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

        public function getProductById($id) {
            $query = "SELECT * FROM product where item_id = '$id'";
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

        public function updateProduct($data, $file, $id) {;
            $item_brand = $data['item_brand'];
            $item_name = $data['item_name'];
            $item_price = $data['item_price'];
            $item_register = date('Y-m-d H:i:s');

            if (!empty($file_name)) {
                $permited = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $file['photo']['name'];
                $file_size = $file['photo']['size'];
                $file_temp = $file['photo']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                $upload_image = "./assets/product" . $unique_image;
                if ($file_size > 1048567) {
                    $msg = "File size must be less than 1 MB";
                    return $msg;
                } elseif (in_array($file_ext, $permited) == false) {
                    $msg = "You Can upload only" . implode(', ', $permited);
                    return $msg;
                } else {
                    
                }
            } else {
                $query = "UPDATE product set item_brand = '$item_brand', item_name = '$item_name', item_price = '$item_price', item_register = '$item_register' where item_id = '$id'";

                $result = $this->db->update($query);
                if ($result) {
                    $msg = "Studenet Update Susscessfull";
                    return $msg;
                } else {
                    $msg = "Update Failed";
                    return $msg;
                }
            }

        }
    }

    // $test = new ProductService();
    // $res = $test->getProductById(2);
    // var_dump($res);
    // die();
?>