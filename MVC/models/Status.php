<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $id = $_POST['order_id'];
    $buyer = $_POST['buyer'];
    $sdt = $_POST['sdt'];
    $status = $_POST['status'];
    $soluong = $_POST['amount'];
    if ($_POST['typetable'] == 'princess') {
        if ($status == "Đã giao hàng") {
          
            $fb_id = $_POST['fb_id'];
            if (is_numeric($fb_id)) {
                $amount = mysqli_query($con, "SELECT prod_amount FROM `order`,product WHERE `order`.order_id = product.prod_id AND order_id = $id ");
                $result  = mysqli_fetch_assoc($amount);
                $sl = $result['prod_amount']-$soluong;
                mysqli_query($con, "UPDATE `order` SET `Pack`= 'Giao hàng thành công' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND fb_id = '$fb_id';");
                mysqli_query($con, "UPDATE `product` SET `prod_amount`= '$sl' WHERE prod_id = $id ;");
                echo 1;
            }
            else {
                $amount_email = mysqli_query($con, "SELECT prod_amount FROM `order_email`,product WHERE `order_email`.order_id = product.prod_id AND order_id = $id ");
                $result_email  = mysqli_fetch_assoc($amount_email);
                $sl_email = $result_email['prod_amount']-$soluong;
               
                mysqli_query($con, "UPDATE `order_email` SET `Pack`= 'Giao hàng thành công' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND email = '$fb_id';");
                mysqli_query($con, "UPDATE `product` SET `prod_amount`= '$sl_email' WHERE prod_id = $id ;");
                echo 1;
            }
        } else {

            if ($status == "Giao hàng thành công") {
                echo 3;
            }
            else
            {
                echo 0;
            }
           
            
        }
    } else {
        if ($status == "Đã giao hàng") {
          
            $fb_id = $_POST['fb_id'];
            if (is_numeric($fb_id)) {
                $amount = mysqli_query($con, "SELECT prod_amount FROM `order`,product WHERE `order`.order_id = product.prod_id AND order_id = $id ");
                $result  = mysqli_fetch_assoc($amount);
                $sl = $result['prod_amount']-$soluong;
                mysqli_query($con, "UPDATE `orderfb_worker` SET `Pack`= 'Giao hàng thành công' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND fb_id = '$fb_id';");
                mysqli_query($con, "UPDATE `product` SET `prod_amount`= '$sl' WHERE prod_id = $id ;");
                echo 1;
            }
            else {
                $amount_email = mysqli_query($con, "SELECT prod_amount FROM `order_email`,product WHERE `order_email`.order_id = product.prod_id AND order_id = $id ");
                $result_email  = mysqli_fetch_assoc($amount_email);
                $sl_email = $result_email['prod_amount']-$soluong;
               
                mysqli_query($con, "UPDATE `orderemail_worker` SET `Pack`= 'Giao hàng thành công' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND email = '$fb_id';");
                mysqli_query($con, "UPDATE `product` SET `prod_amount`= '$sl_email' WHERE prod_id = $id ;");
                echo 1;
            }
        } else {

            if ($status == "Giao hàng thành công") {
                echo 3;
            }
            else
            {
                echo 0;
            }
           
            
        }
    }
   
        
    

  
?>