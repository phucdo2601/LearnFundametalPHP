<?php
  require_once 'partials/connect.php';

  $dbObj = new Database();
  var_dump($dbObj);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Php advanced CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <h1 class="bg-dark text-light text-center py-2">Php Advance Crud</h1>

  <div class="container">

    <!-- form modal -->
    <div class="modal fade" id="usermodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="usermodalLabel">Adding or Updating Users</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="" id="addform" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <!-- Username -->
              <div class="form-group">
                <label for="">Name:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark">
                      <i class="fas fa-user-alt text-light"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter your username..." autocomplete="off" required="required" id="username" name="username">
                </div>
              </div>

              <!-- email -->
              <div class="form-group">
                <label for="">Email:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark">
                      <i class="fas fa-envelope-open text-light"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter your email..." autocomplete="off" required="required" id="email" name="email">
                </div>
              </div>

              <!-- mobile -->
              <div class="form-group">
                <label for="">Mobile:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark">
                      <i class="fas fa-phone text-light"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter your mobile..." autocomplete="off" required="required" id="mobile" name="mobile" maxlength="10" minlength="5">
                </div>
              </div>

              <!-- photo -->
              <div class="form-group">
                <label>Photo:</label>
                <div class="input-group">
                  <label class="custom-file-label" for="userphoto">Choose File:</label>
                  <input type="file" class="custom-file-input" name="photo" id="userphoto">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark">Submit</button>

              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <!-- input search and button -->
    <div class="row mb-3">
      <div class="col-10">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark">
              <i class="fas fa-search text-light"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Search...">
        </div>
      </div>

      <div class="col-2">
        <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#usermodal">
          Add New User
        </button>
      </div>
    </div>

    <!-- table -->
    <table class="table" id="usertable">
      <thead class="table-dark">
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Picture1</th>
          <td>Phucdn</td>
          <td>testEmail01@gmail.com</td>
          <td>42342342</td>
          <td>
            <span>Edit</span>
            <span>Profile</span>
            <span>Delete</span>
          </td>
        </tr>

      </tbody>
    </table>

    <!-- pagination -->
    <nav aria-label="Page navigation example" id="pagination">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>

  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



</body>

</html>