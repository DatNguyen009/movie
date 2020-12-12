<?php
   session_start();
   $con = mysqli_connect('localhost','root','','skincare');

  
    if (isset($_GET['ProductManager'])) {
        $id = $_GET['prod_id'];
        $result =  mysqli_query($con, "SELECT * FROM product WHERE  prod_id = $id");
        $row = mysqli_fetch_assoc($result);
        echo $row['prod_name'];
    }else {
        $id = $_POST['order_id'];
        $fb_id = $_POST['fb_id'];
        $buyer = $_POST['buyer'];
        if ($_POST['typetable'] == 'princess') {
        
         
            if (is_numeric($fb_id)) {
                $result =  mysqli_query($con, "SELECT * FROM `order`,product WHERE `order`.order_id = product.prod_id AND order_id = $id AND fb_id = '$fb_id'AND Buyer = '$buyer'");
                $row = mysqli_fetch_assoc($result);
                // // echo $row['prod_name'] .' '.$row['prod_img'] .' '.$row['prod_cost'] .' '.$row['soluong'] .' '.$row['Total_cost'];
                echo $row['prod_name'];
                // echo $row['prod_img'];
            }
            else {
                $result =  mysqli_query($con, "SELECT * FROM `order_email`,product WHERE `order_email`.order_id = product.prod_id AND order_id = $id AND email = '$fb_id'AND Buyer = '$buyer'");
                $row = mysqli_fetch_assoc($result);
                // // echo $row['prod_name'] .' '.$row['prod_img'] .' '.$row['prod_cost'] .' '.$row['soluong'] .' '.$row['Total_cost'];
                echo $row['prod_name'];
                // echo $row['prod_img'];
            }
    
        }
        else {
            if (is_numeric($fb_id)) {
                $result =  mysqli_query($con, "SELECT * FROM `orderfb_worker`,products_worker WHERE `orderfb_worker`.order_id = products_worker.prod_id AND order_id = $id AND fb_id = '$fb_id'AND Buyer = '$buyer'");
                $row = mysqli_fetch_assoc($result);
                // // echo $row['prod_name'] .' '.$row['prod_img'] .' '.$row['prod_cost'] .' '.$row['soluong'] .' '.$row['Total_cost'];
                echo $row['prod_name'];
                // echo $row['prod_img'];
            }
            else {
                $result =  mysqli_query($con, "SELECT * FROM `orderemail_worker`,products_worker WHERE `orderemail_worker`.order_id = products_worker.prod_id AND order_id = $id AND email = '$fb_id'AND Buyer = '$buyer'");
                $row = mysqli_fetch_assoc($result);
                // // echo $row['prod_name'] .' '.$row['prod_img'] .' '.$row['prod_cost'] .' '.$row['soluong'] .' '.$row['Total_cost'];
                echo $row['prod_name'];
                // echo $row['prod_img'];
            }
        }
       
       
    }

?>