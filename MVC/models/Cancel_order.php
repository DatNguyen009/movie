<?php 

function cancel_order() {
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $id = $_POST['order_id'];
    $buyer = $_POST['buyer'];
    $sdt = $_POST['sdt'];
    $fb_id  = $_POST['fb_id'];

    if ($_POST['typetable'] == 'princess') {
        if (isset($fb_id) && $fb_id != "") {
            mysqli_query($con, "DELETE FROM `order` WHERE fb_id = '$fb_id' AND order_id  = $id AND Buyer = '$buyer' AND SDT = '$sdt' ");
            echo 0;
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                mysqli_query($con, "DELETE FROM `order_email` WHERE email = '$email' AND order_id  = $id AND Buyer = '$buyer' AND SDT = '$sdt' ");
     
                echo 0;
            }
        }
      
    } else {
        if (isset($fb_id) && $fb_id != "") {
            mysqli_query($con, "DELETE FROM `orderfb_worker` WHERE fb_id = '$fb_id' AND order_id  = $id AND Buyer = '$buyer' AND SDT = '$sdt' ");
            echo 0;
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                mysqli_query($con, "DELETE FROM `orderemail_worker` WHERE email = '$email' AND order_id  = $id AND Buyer = '$buyer' AND SDT = '$sdt' ");
     
                echo 0;
            }
        }
      
    }

   

}

cancel_order();
?>