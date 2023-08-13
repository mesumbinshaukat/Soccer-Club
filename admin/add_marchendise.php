<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}
include('../connection.php');
if(isset($_POST['product_btn'])) {
    $p_name = $_POST["p_name"]; 
    $p_category= $_POST["p_category"];
    $p_price = $_POST["p_price"];
    $product_pic = $_FILES['p_img']['name'];
    $product_pic_tmp = $_FILES['p_img']['tmp_name'];
    $product_pic_path = "product_photos/" . date('Y-m-d-H-s') . $product_pic;
    move_uploaded_file($product_pic_tmp , $product_pic_path);
    $insert_query = "INSERT INTO `marchandise`(`p_cat`, `p_name`, `p_price`, `p_image`) VALUES
     ('$p_category','$p_name','$p_price','$product_pic_path')";
    $query_run = mysqli_query($conn , $insert_query);
    if ($query_run) {
        echo "<script>alert('Product Added')</script>";
    }
    
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      body{
        background-color: #252525;
        color: white;
      }
    </style>
</head>
<body>
  <div id="mySidebar" class="sidebar">
    <?php include('navbar.php') ?>
    
</div>
  <div id="main">
  <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span> 
  <div  class="container me-5 " >
    <h1 class="text-center mt-5 ">Add Product</h1>
    
    <form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Product Name</label>
    <input type="text" class="form-control" name="p_name">
  </div>
  <div class="mb-3">
    <label>Product Category</label>
    <select name="p_category" class="form-control form-select">
    <option value="" disabled selected hidden >Select Product Category</option>
        <?php $select_category = "SELECT * FROM `product_category` ";
        $select_query_run = mysqli_query($conn , $select_category);
        while($category = mysqli_fetch_array($select_query_run)){?>
        <option value="<?php echo $category['c_id']; ?>"><?php echo $category['c_name']; ?></option>
        <?php }?>
    </select>
  </div>
  <div class="mb-3">
    <label>Product Price</label>
    <input type="number" class="form-control" name="p_price">
  </div>
  <div class="mb-3">
    <label>Product Image</label>
    <input type="file" class="form-control" name="p_img">
  </div>


  <input type="submit" class="btn btn-success" value="Add Product" name="product_btn">
</form>
</div>
</body>
</html>