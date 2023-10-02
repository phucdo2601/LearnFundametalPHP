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
        public function getRows($start = 0, $limit = 4) {
            $sql = "select * from {$this->tableName} ORDER BY DESC LIMIT {$start}, {$limit}";
            $stmt =$this->conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $results = [];
            }

            return $results;
        }

        // function to get single row
        public function getRow($field, $value) {
            $sql = "select * from {$this->tableName} where {$field} = :{$value}";
            $stmt =$this->conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $result = [];
            }

            return $result;
        }


        // function to count number of rows
        public function getCount() {
            $sql = "select count(*) as pcount from {$this->tableName}";
            $stmt =$this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['pcount'];
        }


        //function to upload photo
        public function uploadPhoto($file) {
            if (!empty($file)) {
                $fileTempPath = $file['tmp_name'];
                $fileName = $file['name'];
                $fileType = $file['type'];

                $fileNameCmps = explode('.', $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = md5(time().$fileName) . '.' .$fileExtension;
                $allowedExtn = ["png", "jpg", "jpeg"];


                if (in_array($fileExtension, $allowedExtn)) {
                    $uploadFileDir = getcwd() . '/uploads/';
                    $destFilePath = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTempPath, $destFilePath)) {
                        return $newFileName;
                    }
                }

            }
        }


        //function to update user
        

        //function to delete user

        // function for search
    }
?>