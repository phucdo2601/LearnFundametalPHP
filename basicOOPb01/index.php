<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <br />
    <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="col-md-12">
              <div class="card shadow">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6">
                              <h3>All Student Info</h3>
                          </div>
                          <div class="col-md-6">
                              <a href="addstd.php" class="btn btn-info float-right">Add Student</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                  
                      <table class="table table-bordered">
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Photo</th>
                              <th>Address</th>
                              <th>Action</th>
                          </tr>
                          
                          <tr>
                            <th>Test01</th>
                            <th>Test01</th>
                            <th>Test01</th>
                            <th>Test01</th>
                            <th>Test01</th>
                            <th>Test01</th>
                        </tr>
                      </table>

                  </div>
              </div>
          </div>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>