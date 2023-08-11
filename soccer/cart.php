<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <title>Document</title>
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
                                                    <td>$
                                                        <?php echo $value['item_price'] ?>
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
                                                                <input type="hidden" name="item_name" value="<?php echo $value['item_name'] ?>" >
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


                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeName">Cardholder's Name</label>
                                                    <input type="text" id="typeName"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Cardholder's Name" />
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeText">Card Number</label>
                                                    <input type="text" id="typeText"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="1234 5678 9012 3457" minlength="19"
                                                        maxlength="19" />
                                                </div>



                                            </form>

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
                                                    <?php $amount = $total * 20 / 100;
                                                    echo $total - $amount; ?>
                                                </p>
                                            </div>

                                            <button type="button" class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between">

                                                    <span>Checkout <i
                                                            class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>

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
</body>


<script>
   var price_get = document.getElementsByClassName("get_price");
   var quantity_get = document.getElementsByClassName("get_quantity");
   var total = document.getElementsByClassName("total");
   var gr_total = document.getElementById("g_total");
   var discount_display = document.getElementById("discount");
   function subtotal() {
    grand_total=0;
    for (let index = 0; index < price_get.length; index++) {
        total[index].innerText = (price_get[index].value)*(quantity_get[index].value);
        grand_total = grand_total + (price_get[index].value)*(quantity_get[index].value);
    }
    gr_total.innerText ="$"+ grand_total;
    var amount = grand_total *20 / 100;
    var discount = grand_total - amount;
    discount_display.innerText = "$" + discount; 
   }
   subtotal();
</script>
</html>