<?php
    require_once '../dbConnection.php';

    class ProductService {
        public $db = null;

        public function __construct()
        {
            $this->db = new DbConnection();
        }

        public function getListProductPage($pageRow = 3, $pageNum = 1) {

            $query = "Select * from product";
            $listAll = $this->db->select($query);
            $countAll = $listAll->num_rows;

            $page_nums = ceil($countAll/$pageRow);

            $start_limit = ($pageNum - 1) * $pageRow;

            $queryPaging = "select * from product limit $start_limit, $pageRow";
            $listPaging = $this->db->select($queryPaging);

            $arrResult = [];
            while ($row = $listPaging->fetch_assoc()) {
                $model = array(
                    'item_id' => $row['item_id'],
                    'item_name' => $row['item_name'],
                    'item_price' => $row['item_price'],
                );
                array_push($arrResult, $model);
            }

            $modelResult = array(
                'data' => $arrResult,
                'page_nums' => $page_nums,
                'total_records' => $countAll
            );

            return $modelResult;

        }
    }

    // $productService = new ProductService();
    // var_dump($productService->getListProductPage($pageRow = 6));
    // die();
?>