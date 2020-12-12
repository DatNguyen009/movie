<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $id = $_POST['order_id'];
    $buyer = $_POST['buyer'];
    $sdt = $_POST['sdt'];
    $pack = $_POST['Pack'];
    if ($_POST['typetable'] == 'princess') {
        if ($pack == "Đã giao hàng") {
            echo 0;
        } else {
    
            $fb_id = $_POST['fb_id'];
            if (is_numeric($fb_id)) {
                mysqli_query($con, "UPDATE `order` SET `Pack`= 'Đã giao hàng' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND fb_id = '$fb_id';");
                echo 1;
            }
            else {
                mysqli_query($con, "UPDATE `order_email` SET `Pack`= 'Đã giao hàng' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND email = '$fb_id';");
                echo 1;
            }
    
          
        }
    } else {
        if ($pack == "Đã giao hàng") {
            echo 0;
        } else {
    
            $fb_id = $_POST['fb_id'];
            if (is_numeric($fb_id)) {
                mysqli_query($con, "UPDATE `orderfb_worker` SET `Pack`= 'Đã giao hàng' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND fb_id = '$fb_id';");
                echo 1;
            }
            else {
                mysqli_query($con, "UPDATE `orderemail_worker` SET `Pack`= 'Đã giao hàng' WHERE order_id = $id AND Buyer = '$buyer' AND SDT = '$sdt' AND email = '$fb_id';");
                echo 1;
            }
    
          
        }
    }
    
   

?>