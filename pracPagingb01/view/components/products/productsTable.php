<div class="container">
    <div class="px-4 text-center">
        <div>
            <form action="" method="GET" class="row gx-2">
                <div class="col">
                    <div class="p-4">
                        Seach:
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <select class="form-select" aria-label="Default select example" name="item_id">
                            <option selected value="null">Choose product</option>

                            <?php
                            foreach ($listProducts as $key => $value) {

                            ?>
                                <option value="<?= $value['item_id'] ?>"><?= $value['item_name'] ?></option>

                            <?php

                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <select class="form-select" aria-label="Default select example"  name="user_id">
                            <option selected value="null">Choose User</option>

                            <?php
                            foreach ($listUsers as $key => $value) {

                            ?>
                                <option value="<?= $value['user_id'] ?>"><?= $value['first_name'] . ' ' . $value['last_name'] ?></option>

                            <?php

                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <button type="button" class="btn btn-primary" onclick="this.form.submit()">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Item Id</th>
                <th scope="col">User Id</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Item Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listData = $listCarts['data'];
            foreach ($listData as $key => $value) {

            ?>
                <tr>
                    <th scope="row"><?= $value['cart_id'] ?></th>
                    <td><?= $value['first_name'] . ' ' . $value['last_name'] ?></td>
                    <td><?= $value['item_id'] ?></td>
                    <td><?= $value['user_id'] ?></td>
                    <td><?= $value['item_name'] ?></td>
                    <td><?= $value['item_price'] ?></td>
                    <td><?= $value['item_id'] ?></td>
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
                    <option value=$page selected>Open this select menu</option>
                    <?php
                    for ($i = 5; $i <= 10; $i = $i + 5) {

                    ?>
                        <option value="<?= $i ?>" <?php if ($records == $i) echo "selected=\"selected\""; ?>><?= $i ?></option>
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
                            <li class="page-item"><a class="page-link" href="?page=<?= $i ?>&records=<?= $records ?>"><?= $i ?></a></li>
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