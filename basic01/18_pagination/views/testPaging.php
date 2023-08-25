<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagination With PHP MySQL</title>
  <style>
     .container{
       width:50%;
       margin:auto;
     }
    .link{
      padding:10px 15px;
      text-decoration:none;
      margin-left:10px ;
      border:1px solid #ccc;
    }
    .product{
      border:1px solid #ccc;
      padding:10px;
    }
    .active{
      background:green;
      color:white;
    }
  </style>
</head>
<body>
 <div class='container'>
  <?php
    #Database Connection
    $con=mysqli_connect("localhost","root","","learn_ec_web_crud_b01");
	
    $sql="select * from product";
    $res=$con->query($sql);

    #Total no of Products
    $no_of_products=$res->num_rows;

    #No of Products per Page
    $no_of_products_per_page=6;

    #Calculate no of pages
    $no_of_pages= ceil($no_of_products/$no_of_products_per_page);

    #Get Current Page No
    $page=1;
    if(isset($_GET["page"])){
      $page=$_GET["page"];
    }
	
    #Calculate starting limit
    $start_limit=($page-1)*$no_of_products_per_page; 
 
    #Show Product Count and Products Rage
    echo "<p><b>No of Products : </b>".$no_of_products."</p>";
    echo "<p><b> Products From : </b>".($start_limit+1)." <b>To</b> ".($start_limit+$no_of_products_per_page)."</p>";

    #Display Products
    $sql="select * from product limit $start_limit, $no_of_products_per_page";
    $res=$con->query($sql);
    while($row=$res->fetch_assoc()){
      echo "<p class='product'>{$row["item_name"]} - Price {$row["item_price"]}</p>";
    }
	
    echo "<br>";
	
    #Generate Page Links
    for($i=1;$i<=$no_of_pages;$i++){
      $pageName=basename($_SERVER["PHP_SELF"]);
      #Check Active Page
      if($page==$i){
        echo "<a href='{$pageName}?page={$i}' class='link active'>{$i}</a>";
      }else{
        echo "<a href='{$pageName}?page={$i}' class='link'>{$i}</a>";
      }
    }
  ?>
 </div>
</body>
</html>