<?php
require_once '../services/productService.php';
$productService = new ProductService();

$list_data = $productService->getAllProducts();
// var_dump($list_data);
// foreach($list_data as $x => $val) {
//     var_dump($val['item_name']);
//     echo "<br>";
// }
// die();
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

    <div class="contanier">
        <h1>List Products</h1>

        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Register_Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_data as $x => $val) {
                ?>
                    <tr>
                        <th scope="row"><?= $val['item_id'] ?></th>
                        <td><?= $val['item_brand'] ?></td>
                        <td><?= $val['item_name'] ?></td>
                        <td><?= $val['item_price'] ?></td>
                        <td><?= date("d/m/Y", strtotime($val['item_register'])); ?></td>
                        <td>
                            <img style="width: 100px; height: 100px;" src="<?= "." . $val['item_image'] ?>" alt="<?= $val['item_name'] ?>">
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $val['item_id'] ?>">Edit</a>
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