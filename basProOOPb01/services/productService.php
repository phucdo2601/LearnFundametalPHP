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

        public function updateProduct($data, $file, $id) {
            $item_brand = $data['item_brand'];
            $item_name = $data['item_name'];
            $item_price = $data['item_price'];
            $item_register = date('Y-m-d H:i:s');
            // var_dump($file);
            // die();

            $file_name = $file['item_image']['name'];
            if (!empty($file_name)) {
                $permited = array('jpg', 'jpeg', 'png', 'gif');
                $file_size = $file['item_image']['size'];
                $file_temp = $file['item_image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                $upload_image = "./assets/products/" . $unique_image;

                if ($file_size > 1048567) {
                    $msg = "File size must be less than 1 MB";
                    return $msg;
                } elseif (in_array($file_ext, $permited) == false) {
                    $msg = "You Can upload only" . implode(', ', $permited);
                    return $msg;
                } else {
                    $target_dir = "../assets/products/{$unique_image}";
                    // var_dump($target_dir);
                    // die();

                    move_uploaded_file($file_temp, $target_dir);
                    
                    $query = "UPDATE product set item_brand = '$item_brand', item_name = '$item_name', item_price = '$item_price', item_image= '$upload_image', item_register = '$item_register' where item_id = '$id'";

                    $result = $this->db->update($query);
                    if ($result) {
                        $msg = "Product Update Susscessfull";
                        return $msg;
                    } else {
                        $msg = "Update Failed";
                        return $msg;
                    }
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

        public function addNewProduct($data, $file) {
            $item_brand = $data['item_brand'];
            $item_name = $data['item_name'];
            $item_price = $data['item_price'];
            $item_register = date('Y-m-d H:i:s');

            // var_dump($file);
            // die();

            $file_name = $file['item_image']['name'];
            if (empty($file_name)) {
                $msg = "File size must be have";
                return $msg;
            }else {
                $file_size = $file['item_image']['size'];
                $file_temp = $file['item_image']['tmp_name'];

                $permited = array('jpg', 'jpeg', 'png', 'gif');
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                $upload_image = "./assets/products/" . $unique_image;

                if ($file_size > 1048567) {
                    $msg = "File size must be less than 1 MB";
                    return $msg;
                } elseif (in_array($file_ext, $permited) == false) {
                    $msg = "You Can upload only " . implode(', ', $permited);
                    return $msg;
                } else {
                    $target_dir = "../assets/products/{$unique_image}";
                    // var_dump($target_dir);
                    // die();

                    move_uploaded_file($file_temp, $target_dir);
                    
                    $query = "INSERT INTO product(item_name, item_brand, item_price, item_image, item_register) values ('$item_name', '$item_brand', '$item_price', '$upload_image', '$item_register')";

                    $result = $this->db->insert($query);
                    if ($result) {
                        $msg = "Product Update Susscessfull";
                        return $msg;
                    } else {
                        $msg = "Update Failed";
                        return $msg;
                    }
                }
            }


        }
    }


?>