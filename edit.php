<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>My Shop</title>
</head>
<?php
$dbhost = 'localhost:3306';
$dbroot = 'root';
$dbpass = '12345678';
$dbname = 'learn_php_fun_crud_b01';

//Create database connection
$connection = new mysqli($dbhost, $dbroot, $dbpass, $dbname);

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        # code...
        header("location: /learn_php_crud_mysql_b01/index.php");
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM clients where id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();


    if (!$row) {
        # code...
        header("location: /learn_php_crud_mysql_b01/index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do{
        if (empty($id) ||empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE clients  ".
        "SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = '$id'";
        $result = $connection->query($sql);
        if (!$result) {
            # code...
            $errorMessage = "Invalid query: ".$connection->error;
        }

        $successMessage = "Client upadate successfully";

        header("location: /learn_php_crud_mysql_b01/index.php");
        exit;

    } while(true);

}

?>

<body>
    <div class="container">
        <h2>Update Client</h2>

        <?php

        if (!empty($errorMessage)) {
            echo "<div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dimiss='alert' aria-label='Close'></button>

              </div>";
        }

        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <?php

            if (!empty($successMessage)) {
                echo "<div class='alert alert-success alert-dismissable fade show' role='alert'>
    <strong>$successMessage</strong>
    <button type='button' class='btn-close' data-bs-dimiss='alert' aria-label='Close'></button>

  </div>";
            }

            ?>

            <div class="row mb-3">
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a href="/learn_php_crud_mysql_b01/index.php" class="btn bnt-outline-primary" role="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>