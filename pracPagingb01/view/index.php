<?php
    require_once '../service/cartService.php';
    require_once '../service/productService.php';
    require_once '../service/userService.php';

    $cartService = new CartService();
    $productService = new ProductService();
    $userService = new UserService();
    
    $listUsers = $userService->getAllUsers();
    $listProducts = $productService->getAllProducts();

    $listCarts  = [];

    if (isset($_GET['records'])) {
        $records = $_GET['records'];
    } else {
        $records = 3;
    }

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    if (isset($_GET['item_id'])) {
        $item_id = $_GET['item_id'];
    }

    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    }

    var_dump($_GET);

    if ($_GET) {
        if ($item_id && $user_id) {
            var_dump("search by user_id and item_id");
            $listCarts = $cartService->searchDataPaging($user_id, $item_id, $page, $records);
        } elseif ($page && $records) {
            $listCarts = $cartService->searchDataPaging(0, 0, $page, $records);
        }
        elseif ($records) {
            $listCarts = $cartService->searchDataPaging(0, 0, $page, $records);
        }elseif ($page) {
            $listCarts = $cartService->searchDataPaging(0, 0, $page, $records);
        }
    } else {
        $listCarts = $cartService->searchDataPaging(0,0,1,3);
    }

    

    $page_nums = $listCarts['page_nums'];

    
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

    <?php include_once './components/products/productsTable.php' ?>
    
    <?php include_once './components/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>

