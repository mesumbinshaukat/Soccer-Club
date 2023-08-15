<?php
include('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Shopping Cart</title>
    <style>
      /* *{
        overflow: hidden;
      } */
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .input-group {
            width: 55% !important;
        }
    </style>
</head>

<body>


    <?php
    include("navbar.php");
    ?>
<?php

if(isset($_POST['btn_checkout'])){
    $u_id = $_SESSION['u_id'];
    $date = date("Y-m-d-H-s");
    $query_i_order = "INSERT INTO `tbl_order`(`order_time`, `user_id`) VALUES ($date,'$u_id')";
    $query_i_order_run = mysqli_query($conn,$query_i_order);
$last_row = mysqli_insert_id($conn);
    //   echo $last_row;
    foreach($_SESSION['items'] as $value){
     $p_name =   $value['item_name'];
     $p_price =   $value['item_price'];
    

    $query_i_items = "INSERT INTO `checkout`( `item_name`, `item_price`, `order_id`) VALUES ('$p_name','$p_price','$last_row')";
    $query_i_items_run = mysqli_query($conn,$query_i_items);
   
    
}
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$amount_mail = $_POST['amount_mail'];
$discount = "<script>var abc = document.getElementById('value').value; document.write(abc)</script>";

try {
    //Server settings
    // $mail->SMTPDebug = 2; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'wot.official.786@gmail.com'; //SMTP username
    $mail->Password = 'rbonmvlzxhgpouvw'; //SMTP password
    $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



    //Recipients
    $mail->setFrom('wot.official.786@gmail.com', 'WORLD OF TECH');
    $mail->addAddress($user_email, $user_name); //Add a recipient

    

    $body = "<p>Hello <b>" . $_POST['user_name'] . "!</b></p><br><p><b>Call: +923362100225</b></p><br><br><p>Best Regards,<br> <b>Soccer Club</b></p><h1>Thanks For Shopping</h1>";

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Shopping | Soccer Club';
    $mail->Body = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
  

    echo 'Message has been sent';
    echo "<script>alert('Form submitted successfuly')</script>";
    header('location:index.php');
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}



?>








    <section class="h-100 h-custom " style="background-color: #;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 mt-4">
                <div class="col">
                    <div class="card bg-light">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7 ">
                                    <h5 class="mb-3 btn btn-dark btn-outlined"><a href="merchendise.php"
                                            class="text-decoration-none text-light">Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class=" fs-4  mb-1 text-white">Shopping Cart</p>
                                            <p class="mb-0">You have  <span class="fw-bold text-light " ><?php echo count($_SESSION['items']) ?></span>  items in your cart</p>
                                        </div>
                                    </div>







                                    <table class="table table-bordered bg-dark text-center text-white" >
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity (+/-)</th>
                                            <th>Total </th>
                                            <th>Delete </th>

                                        </tr>
                                        <?php
                                        if (isset($_SESSION['items'])) {
                                           

                                            foreach ($_SESSION['items'] as $key => $value) {
                                                
                                                ?>
                                                <tr>
                                                    <td><img width="40px" src="./admin/<?php echo $value['item_pic'] ?>" alt="">
                                                    </td>
                                                    <td>
                                                        <?php echo $value['item_name'] ?>
                                                    </td>
                                                    <td>Rs.<?php echo $value['item_price'] ?>
                                                        <input type="hidden" class="get_price" value="<?php echo $value['item_price'] ?>" >
                                                    </td>
                                                    <td>
                                                        <center><input class="input-group text-center get_quantity" type="number" min="1" max="10" onchange="subtotal()"
                                                                value="<?php echo $value['item_qty'] ?>" ></center>
                                                    </td>
                                                    <td class="total"></td>
                                                    <td>
                                                        <form action="delete.php" method="post">
                                                            <button type="submit" name="remove_item"
                                                                class="btn btn-danger">Delete</button>
                                                                <input type="hidden" name="item_name"  value="<?php echo  $value['item_name']?>" >
                                                        </form>
                                                    </td>

                                                </tr>
                                            <?php }
                                        } ?>
                                    </table>
                                </div>




                                <div class="col-lg-5">

                                    <div class="card bg-dark text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Card details</h5>
                                                <img src="images\logo.png"
                                                    class="img-fluid rounded-3 w-25" style="width: 45px;" alt="Avatar">
                                            </div>


                                            <form  method="post">
                                            
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeName">Cardholder's Name</label>
                                                    <input type="text" id="typeName" name="user_name"
                                                        class="form-control form-control-lg"  value="<?php echo $_SESSION['u_name'] ?>"
                                                        placeholder="Cardholder's Name" />
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeText">Cardholder's Email</label>
                                                    <input type="text" id="typeText"  name="user_email"
                                                        class="form-control form-control-lg" value="<?php echo $_SESSION['u_email'] ?>"
                                                        placeholder="Cardholder's Email" 
                                                        maxlength="19" />
                                                </div>



                                            

                                            <hr class="my-4">


                                            
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2" id="g_total">
                                                  
                                                </p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Discount</p>
                                                <p class="mb-2">20%</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Grand Total(Incl. taxes and with Discount)</p>
                                                <p class="mb-2" id="discount">
                                                
                                                </p>                                                
                                                <input type="hidden" name="amount_mail" class="mb-2" id="for_mail">
                                                
                                                
                                               
                                            </div>

                                            <!-- <button type="button" class="btn btn-info btn-block btn-lg"> -->
                                                <div class="d-flex justify-content-between">

                                                    <button type="submit" name="btn_checkout" class="btn btn-primary">Checkout </button>
                                                    </form>

                                                </div>
                                            <!-- </button> -->

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- smtp  -->
<?php






?>







<script>
       var price_get = document.getElementsByClassName('get_price');
    var quantity_get = document.getElementsByClassName('get_quantity');
    var total = document.getElementsByClassName('total');
    var gr_total = document.getElementById('g_total');
    var discount_display = document.getElementById('discount');
    var discount_mail = document.getElementById('for_mail');
    function subtotal() {
     grand_total=0;
     for (let index = 0; index < price_get.length; index++) {
         total[index].innerText = "Rs." + (price_get[index].value)*(quantity_get[index].value);
         grand_total = grand_total + (price_get[index].value)*(quantity_get[index].value);
     }
     gr_total.innerText ='Rs.'+ grand_total;
     var amount = grand_total *20 / 100;
     var discount = grand_total - amount;
    
     discount_display.innerText = 'Rs.' + discount; 
     discount_mail.innerText = 'Rs.' + discount; 
    }
    subtotal();
    </script>

                                             
</body>

</html>