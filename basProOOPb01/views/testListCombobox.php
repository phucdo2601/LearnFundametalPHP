<?php
require_once '../services/userService.php';
require_once '../services/productService.php';
require_once '../services/cartService.php';

$userService = new UserService();
$productService = new ProductService();
$cartService = new CartService();

$listUser = $userService->getAllUsers();
$listProduct = $productService->getAllProducts();
$listCart = [];

if ($_POST) {
    $listCart = $cartService->searchCartByItemIdAndUserId($_POST['item_id'], $_POST['user_id']);
} else {
    $listCart = $cartService->getAllCarts();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn Procduct EC Web b01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php include_once './components/navbar.php' ?>

    <div class="container text-center">
        <h1 class="primary">Search Cart by user or item</h1>
    </div>

    <div class="container px-4 text-center">
        <div >
            <form action="" method="post" class="row gx-5">
                <div class="col">
                    <div class="p-3">Load list user</div>
                    <select class="form-select" aria-label="Default select example" name="user_id">
                        <option selected value="">Open this select menu</option>
                        <?php
                        foreach ($listUser as $key => $value) {

                        ?>
                            <option value="<?= $value['user_id'] ?>"><?= $value['first_name'] . ' ' . $value['last_name'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <div class="p-3">Load list item</div>
                    <select class="form-select" aria-label="Default select example" name="item_id">
                        <option selected value="">Open this select menu</option>

                        <?php
                        foreach ($listProduct as $key => $value) {
                            # code...

                        ?>
                            <option value="<?= $value['item_id'] ?>"><?= $value['item_name'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <div class="p-5">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cart ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($listCart as $x => $val) {
                ?>
                    <tr>
                        <th scope="row"><?= $val['cart_id'] ?></th>
                        <td><?= $val['first_name'] .' '.$val['last_name'] ?></td>
                        <td><?= $val['item_brand'] ?></td>
                        <td><?= $val['item_name'] ?></td>
                        <td><?= $val['item_price'] ?></td>
                        <td>
                            <img style="width: 100px; height: 100px;" src="<?= "." . $val['item_image'] ?>" alt="<?= $val['item_name'] ?>">
                        </td>
                    </tr>
            <?php
                }
                ?>
            </tbody>

        </table>
    </div>

    <?php include_once './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>