<?php
//load the database configuration file
include_once 'dbConfig.php';

//Get status message
if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Member data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Something went wrong, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid Excel file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

    <!-- Show/hide Excel file upload form -->
    <script>
        function formToggle(ID) {
            var element = document.getElementById(ID);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <h1>Import Excel file with php</h1>

    <!-- Display status message -->

    <?php if(!empty($statusMsg)) { ?>
        <div class="col-xs-12 p-3">
            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
        </div>

    <?php } ?>

    <h2>Members list</h2>

    <div class="row p-3">
        <div class="col-md-12 head">
            <div class="float-end">
                <a href="javascript:void(0)" class="btn btn-success" onclick="formToggle('importFrm');">
                    <i class="plus"></i> Import Excel
                </a>
            </div>
        </div>

        <!-- Excel File upload form -->

        <div class="col-md-12" id="importFrm" style="display: none;">
            <form class="row g-3" action="importData.php" method="post" enctype="multipart/form-data">
                <div class="col-auto">
                    <label for="fileInput" class="visually-hidden">
                        File
                    </label>

                    <input type="file" class="form-control" name="file" id="fileInput">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
                </div>
            </form>
        </div>

        <!-- DATA List Table -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $result = $db->query("select * from members order by id desc");
                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                ?>


                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['created']; ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="7">No member(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>