<?php 
session_start();
if (isset($_POST['remove_item'])) {
    
    foreach ($_SESSION['items'] as $key => $value) {
       
       if ($value['item_name'] == $_POST['item_name']) {
          unset($_SESSION['items'][$key]);
          $_SESSION['items'] = array_values($_SESSION['items']);
          echo "<script>alert('Item Removed');
          window.location.href='cart.php';</script>"; 
       }
    }
    
 }

?>