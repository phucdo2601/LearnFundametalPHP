<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>My Shop</title>
</head>

<body>
    <div class="container my-5">
    <h2>List of Clients</h2>
    <a class="btn btn-primary" href="/learn_php_crud_mysql_b01/create.php"> New Client</a>
     
    <br/>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $dbhost='localhost:3306';
        $dbroot='root';
        $dbpass='12345678';
        $dbname='learn_php_fun_crud_b01';

        //Create database connection
        $connection = new mysqli($dbhost, $dbroot, $dbpass, $dbname);
        if($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        //read all rows from database
        $sql = "SELECT * FROM clients";
        $result = $connection->query($sql);
        if(!$result) {
            die("Invalid query: ".$connection->error);
        }

        //read data of each rows
        while($rowa = $result->fetch_assoc()) {
            echo "
            <tr>
            <th scope='row'>$rowa[id]</th>
            <td>$rowa[name]</td>
            <td>$rowa[email]</td>
            <td>$rowa[phone]</td>
            <td>$rowa[address]</td>
            <td>$rowa[created_at]</td>
            <td>
              <a class='btn btn-primary btn-sm' href='/learn_php_crud_mysql_b01/edit.php?id=$rowa[id]'>Edit</a>
              <br>
              <a class='btn btn-danger' href='/learn_php_crud_mysql_b01/delete.php?id=$rowa[id]'> Delete</a>
            </td>
          </tr>
            ";
        }
    ?>
    
   
  </tbody>
</table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>