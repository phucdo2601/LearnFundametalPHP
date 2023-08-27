<?php
    require_once "../config/dbConnect.php";

    class CartService {
        public $db = null;

        public function __construct(){
            $this->db = new DbConection();
        }

        public function searchDataPaging($user_id = 0, $item_id = 0, $page_num = 1, $page_row = 3) {
            
    // var_dump($user_id);
    // var_dump($item_id);
            
            if ($page_row == 'null') {
                $page_row = 3;
            }
            
            if ($page_num < 0) {
                $page_num  = 1;
            }

            if ($page_row < 0) {
                $page_row = 3;
            }

            $queryCartAll = "select * from cart";
            $listAll = $this->db->select($queryCartAll);
            $countAll = $listAll->rowCount();

            $page_nums = ceil($countAll/$page_row);
            $start_limit = ($page_num - 1) * $page_row;

            $queryPaging = null;

            if (isset($user_id) && isset($item_id)) {
                $queryPaging = "select c.cart_id, c.item_id, c.user_id, p.item_brand, p.item_image, p.item_name, p.item_price, u.first_name, u.last_name
                from cart c left join product p on c.item_id = p.item_id
                left join user u on c.user_id = u.user_id
                Where c.item_id = $item_id and c.user_id = $user_id
                LIMIT $start_limit, $page_row";
            } elseif (isset($user_id)) {
                $queryPaging  = "select c.cart_id, c.item_id, c.user_id, p.item_brand, p.item_image, p.item_name, p.item_price, u.first_name, u.last_name
                from cart c left join product p on c.item_id = p.item_id
                left join user u on c.user_id = u.user_id
                Where c.user_id = $user_id
                LIMIT $start_limit, $page_row";
            } elseif (isset($item_id)) {
                $queryPaging  = "select c.cart_id, c.item_id, c.user_id, p.item_brand, p.item_image, p.item_name, p.item_price, u.first_name, u.last_name
                from cart c left join product p on c.item_id = p.item_id
                left join user u on c.user_id = u.user_id
                Where c.item_id = $item_id
                LIMIT $start_limit, $page_row";
            } else {
                $queryPaging = "select c.cart_id, c.item_id, c.user_id, p.item_brand, p.item_image, p.item_name, p.item_price, u.first_name, u.last_name
                from cart c left join product p on c.item_id = p.item_id
                left join user u on c.user_id = u.user_id
                LIMIT $start_limit, $page_row";
            }

            $listPaging = $this->db->select($queryPaging)->fetchAll();

            $modelResult = array(
                'data' => $listPaging,
                'page_nums' => $page_nums,
                'total_records' => $countAll
            );

            return $modelResult;

        }

    }
?>