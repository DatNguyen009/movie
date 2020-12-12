<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $id = $_POST['prod_id'];
    $amount = $_POST['prod_amount'];
    $cost = $_POST['prod_cost'];
    $name = $_POST['name'];
    $SDT = $_POST['SDT'];
    $address = $_POST['address'];
    $color = $_POST['color'];
    $fb_id = $_POST['fb_id'];
   
    if ($_POST['typeprod'] == 'id') {
        if (isset($fb_id) && $fb_id != "") {
            mysqli_query($con, "INSERT INTO `order`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `Total_cost`, `soluong`, `date`,`fb_id`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$cost','$amount',NOW(),'$fb_id','Xác nhận đơn hàng','princess') ");
            mysqli_query($con, "DELETE FROM `cart` WHERE fb_id = '$fb_id' AND prod_id = '$id' ");
            echo "princess";
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                $insert = "INSERT INTO `order_email`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `Total_cost`, `soluong`, `date`,`email`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$cost','$amount',NOW(),'$email','Xác nhận đơn hàng','princess') ";
                mysqli_query($con, $insert);
                mysqli_query($con, "DELETE FROM `cart_email` WHERE email = '$email' AND prod_id = '$id' ");
                echo "princess";
            } else {
                echo "login";
            }
    
            
        }
    } else {
        if (isset($fb_id) && $fb_id != "") {
            mysqli_query($con, "INSERT INTO `orderfb_worker`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `Total_cost`, `soluong`, `date`,`fb_id`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$cost','$amount',NOW(),'$fb_id','Xác nhận đơn hàng','worker') ");
            mysqli_query($con, "DELETE FROM `cartfb_worker` WHERE fb_id = '$fb_id' AND prod_id = '$id' ");
            echo 1;
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                $insert = "INSERT INTO `orderemail_worker`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `Total_cost`, `soluong`, `date`,`email`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$cost','$amount',NOW(),'$email','Xác nhận đơn hàng','worker') ";
                mysqli_query($con, $insert);
                mysqli_query($con, "DELETE FROM `cartemail_worker` WHERE email = '$email' AND prod_id = '$id' ");
                echo 1;
            } else {
                echo "login";
            }
    
            
        }
    }
    

    
  

?>