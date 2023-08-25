<?php
    require_once '../dbConnect.php';

    class UserService {
        public $db;

        public function __construct()
        {
            $this->db = new DbConnection();
        }

        public function getAllUsers() {
            $query = "SELECT user_id, first_name, last_name, register_date from user";
            $result = $this->db->select($query);

            $arrResult = [];

            while ($row = $result->fetch_assoc()) {
                $model = array(
                    'user_id' => $row['user_id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'register_date' => $row['register_date'],
                );

                array_push($arrResult, $model);
            }

            return $arrResult;
        }
    }
?>