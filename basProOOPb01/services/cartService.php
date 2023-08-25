<?php
    require_once '../dbConnect.php';


    class CartService {
        private $db;

        public function __construct()
        {
            $this->db = new DbConnection();
        }
        

        public function getAllCarts() {
            $query = "select c.cart_id, c.user_id, c.item_id, u.first_name, u.last_name, pr.item_brand, pr.item_name, pr.item_price, pr.item_image, pr.item_name
            from cart c left join user u on c.user_id = u.user_id left join product pr on c.item_id = pr.item_id;";

            $result = $this->db->select($query);

            $arrResult = [];

            if (isset($result)) {
                while ($row = $result->fetch_assoc()) {
                    $model = array(
                        "cart_id" => $row['cart_id'],
                        "user_id" => $row['user_id'],
                        "item_id" => $row['item_id'],
                        "first_name" => $row['first_name'],
                        "last_name" => $row['last_name'],
                        "item_brand" => $row['item_brand'],
                        "item_name" => $row['item_name'],
                        "item_price" => $row['item_price'],
                        "item_image" => $row['item_image'],
                    );

                    array_push($arrResult, $model);
                }
            }

            return $arrResult;
        }

        public function searchCartByItemIdAndUserId($itemId, $userId) {
            if (empty($itemId) || is_null($itemId)) {
                $itemId = '';
            }

            if (empty($userId) || is_null($userId)) {
                $userId = '';
            }

            $query = "select c.cart_id, c.user_id, c.item_id, u.first_name, u.last_name, pr.item_brand, pr.item_name, pr.item_price, pr.item_image, pr.item_name
            from cart c left join user u on c.user_id = u.user_id left join product pr on c.item_id = pr.item_id
            where c.item_id = '$itemId' or c.user_id ='$userId'";

            $result = $this->db->select($query);

            $arrResult = [];

            if (isset($result)) {
                while ($row = $result->fetch_assoc()) {
                    $model = array(
                        "cart_id" => $row['cart_id'],
                        "user_id" => $row['user_id'],
                        "item_id" => $row['item_id'],
                        "first_name" => $row['first_name'],
                        "last_name" => $row['last_name'],
                        "item_brand" => $row['item_brand'],
                        "item_name" => $row['item_name'],
                        "item_price" => $row['item_price'],
                        "item_image" => $row['item_image'],
                    );

                    array_push($arrResult, $model);
                }
            }

            return $arrResult;

        }
    }

    // $cartService = new CartService();
    // $listCart = $cartService->searchCartByItemIdAndUserId(1, null);

    // var_dump($listCart);
    // die();
?>