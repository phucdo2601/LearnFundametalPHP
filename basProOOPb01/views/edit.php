<?php
require_once '../services/productService.php';
$productService = new ProductService();
$id = $_GET['id'];
$edit_data = $productService->getProductById($id);
$item_id=null;
$item_brand = null;
$item_name= null;
$item_price = null;
$item_image = null;
$item_register = null;

foreach($edit_data as $x => $val) {
    $item_id = $val['item_id'];
    $item_brand = $val['item_brand'];
    $item_name = $val['item_name'];
    $item_price = $val['item_price'];
    $item_image = $val['item_image'];
    $item_register = $val['item_register'];
}
// $date = date('Y-m-d H:i:s');
// var_dump($date);
// die();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_POST);
        // var_dump($_FILES);
        // die();
        $updateProduct = $productService->updateProduct($_POST, $_FILES, $id);
        header('Location: index.php');
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

    <div class="contanier">
        <h1>Edit Product</h1>

        <hr>
        <?php 
                        if (isset($register)) {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?=$register?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <?php 
                        }
                    ?>

        <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <?php if(!empty($item_image)) : ?>
                <img style="width: 100px; height: 100px;" src="<?= ".".$item_image ?>" alt="<?php echo $editProduct['image'] ?>" class="product-img-view">
                <?php endif; ?>
                
            <label for="productImage" class="form-label">Product Image</label>
            <br />
            <input type="file" name="item_image">

            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="itemName" name="item_name" value="<?php echo $item_name ?>">
            </div>

            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Brand</label>
                <input type="text" class="form-control" id="itemBrand" name="item_brand" value="<?php echo $item_brand ?>">
            </div>

            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="itemPrice" name="item_price" value="<?php echo $item_price ?>">
            </div>

        </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <?php include_once './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>