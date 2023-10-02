<?php
    require_once './connect.php';

    class User extends Database {
        protected $tableName = "user";

        //functions to add users
        public function add($data) {
            if (!empty($data)) {
                # code...
                $fileds = $placeholder = [];
                foreach ($data as $field => $value) {
                    $fileds[] = $field;
                    $placeholder[] = ":{field}";
                }
            }

            // $sql = "INSERT INTO {$this->tableName} (name, email, mobile) values (:name, :email, :mobile);";
            $sql = "INSERT INTO {$this->tableName} (" .implode(",", $fileds) .") values (".implode(",", $placeholder) .")";

            $stmt =$this->conn->prepare($sql);

            try {
                $this->conn->beginTransaction();
                
                $stmt->execute($data);

                $lastInsertedId = $this->conn->lastInsertId();

                $this->conn->commit();

                return $lastInsertedId;

            } catch (PDOException $e) {
                echo "Cannot executing add new user function: ".$e->getMessage();
                $this->conn->rollBack();
            }
        }


        //function to get rows


        // function to get single row


        // function to count number of rows


        //function to upload photo


        //function to update user
        

        //function to delete user

        // function for search
    }
?>