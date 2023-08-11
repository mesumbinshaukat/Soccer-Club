<?php
  session_start();
  // session_destroy();
  
     
  
        if (isset($_POST['submit_btn'])) {
  
        
           if (isset($_SESSION['items'])) {
            $myitems = array_column($_SESSION['items'], 'item_name');
            if (in_array($_POST['pr_name'] , $myitems)) {
               echo "<script>alert('item already added');
               window.location.href='merchendise.php';
               </script>
               "; 
           //   print_r($_SESSION['items']);
            }
            else{
           $count  = count($_SESSION['items']);
           $_SESSION['items'][$count] = array('item_name' => $_POST['pr_name'] , 'item_price' => $_POST['pr_price'] , 'item_pic' => $_POST['pr_pic']   ); 
           // print_r($_SESSION['items']);
        
              echo "<script>
           alert('item added to cart');   
           window.location.href='merchendise.php';
          </script>
           ";   
         
        
            }
        }
           else{
            $_SESSION['items'][0] = array('item_name' => $_POST['pr_name'] , 'item_price' => $_POST['pr_price'] , 'item_pic' => $_POST['pr_pic']  );
            echo "<script>
           alert('item added to cart');
           window.location.href='merchendise.php';
          </script>";
             
           }
         
        }
        ?>