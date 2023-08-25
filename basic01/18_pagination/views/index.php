<?php
require_once '../services/productService.php';
$productService = new ProductService();

$listReturn = array();

if (isset($_GET['records'])) {
    $records = $_GET['records'];
} else {
    $records = 3;
}

if (isset(($_GET['page']))) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($page)) {
    if (isset($records)) {
        $listReturn = $productService->getListProductPage($pageRow  = $records, $pageNum = $page);
    } else {
        $listReturn = $productService->getListProductPage($pageRow = 3, $pageNum = $page);
    }
} else {
    $listReturn = $productService->getListProductPage($pageRow  = $records, $pageNum = 1);
}

$list_data = $listReturn['data'];
$page_nums = $listReturn['page_nums'];

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

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_data as $key => $value) {
                ?>
                    <tr>
                        <td scope="row"><?= $value['item_id'] ?></td>
                        <td scope="row"><?= $value['item_name'] ?></td>
                        <td scope="row"><?= $value['item_price'] ?></td>
                        <td scope="row">

                            <form action="../services/commons/setValueBeforeChangingPage.php" method="POST">
                                <input type="hidden" name="page" value="<?=$page?>">
                                <input type="hidden" name="records" value="<?=$records?>">
                                <input type="hidden" name="records" value="<?=$value['item_id']?>">
                               <button type="submit" class="btn btn-primary">
                                    View
                               </button>
                            </form>
                    </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div>
            <form action="" method="GET" class="row">
                <div class="col">
                    <select class="form-select" aria-label="Default select example" style="width: 200px" name="records" onchange="this.form.submit()">
                        <option selected>Open this select menu</option>
                        <?php 
                            for ($i=5; $i <= 10; $i=$i+5) { 
                            
                        ?>
                            <option value="<?=$i?>" <?php if($records==$i) echo "selected=\"selected\""; ?>><?=$i?></option>
                        <?php 
                           
                            }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            for ($i = 1; $i <= $page_nums; $i++) {

                            ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $i ?>&records=<?= $records?>"><?= $i ?></a></li>
                            <?php
                                # code...
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </form>
        </div>


    </div>

    <?php include_once './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>