<?php
    include_once '../lib/Session.php';

    // Session::checkSession();
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>

<?php
    class AdminLogin {
        private $db;
        private $fm;


        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function adminLogin($adminUser, $adminPass) {
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

            if (empty($adminUser) || empty($adminPass)) {
                $loginmsg = "Username or password must not be empty";
                return $loginmsg;
            }
            else 
            {
                $query = "SELECT * FROM tbl_admin where adminUser = '$adminUser' and adminPass = '$adminPass'  ";
                $result = $this->db->select($query);
                if ($result != false) {
                    $value = $result->fetch_assoc();
                    Session::set("login", true);
                    Session::set("adminId", $value['adminId']);
                    Session::set("adminUser", $value['adminUser']);
                    Session::set("adminName", $value['adminName']);
                    header("Location:dashboard.php");
                } else {
                    $loginmsg = "Username or password must not match!";
                    return $loginmsg;
                }

            }
        }
    }
?>