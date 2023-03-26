<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate form nang cao</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = []; // mang luu tru loi

        /**
         * LAY DU LIEU
         */
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        /**
         * Validate the fullname
         */
        if (empty(trim($fullname))) {
            $errors['fullname']['required'] = "HO VA TEN bat buoc phai nhap";
        } else {
            $patternFullname = "~^[^\s][^0-9_!@#\$%\^\*(\)-\+\.]{4,}[^\s]$~u";

            if (!preg_match($patternFullname, $fullname)) {
                $errors['fullname']['is_fullname'] = "HO VA TEN khong hop le";
            }
        }

        /**
         * Validate the username
         */
        if (empty(trim($username))) {
            $errors['username']['required'] = "username bat buoc phai nhap";
        } else {
            $patternUsername = "/^[a-z-_][a-z-_0-9]+$/";

            if (!preg_match($patternUsername, $username)) {
                $errors['username']['is_username'] = "username khong hop le";
            }
        }

        /**
         * Validate the email
         */
        if (empty(trim($email))) {
            $errors['email']['required'] = "email bat buoc phai nhap";
        } else {
            $patternEmail = "/^[a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}$/";

            if (!preg_match($patternEmail, $email)) {
                $errors['email']['is_username'] = "email khong hop le";
            }
        }

        /**
         * Validate the email
         */
        if (empty(trim($password))) {
            $errors['password']['required'] = "password bat buoc phai nhap";
        } else {
            $patternPassword = "/^(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z])(?=.*[!@#\$%\^\*(\)-\+\.]).{8,}$/";

            if (!preg_match($patternPassword, $password)) {
                $errors['password']['is_username'] = "password khong hop le";
            }
        }

        echo '<pre>';
        print_r($errors);
        echo '</pre>';

        echo 'Hello World';
    }

    ?>
    <div class='container'>
        <div class="row justify">
            <div class='col-6'>
                <h2 class="text-center">Dang ky tai khoan</h2>
                <form action="" method="post">

                    <div class="mb-3">
                        <label for="" class="form-label">Ho Va Ten</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Ho va Ten">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Ten Dang Nhap</label>
                        <input type="text" class="form-control" name="username" placeholder="Ten Dang Nhap">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Mat Khau</label>
                        <input type="text" class="form-control" name="password" placeholder="Mat Khau">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Dang ky tai khoan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>