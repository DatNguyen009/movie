<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');

    if (isset($_GET['ProductManager'])) {
        if (isset($_GET['typetable']))
        {
            $id = $_GET['prod_id'];
            $result =  mysqli_query($con, "SELECT * FROM products_worker WHERE prod_id = $id");
            $row = mysqli_fetch_assoc($result);
            echo $row['prod_img'] .' '.$row['prod_cost'].' '.$row['prod_amount'] .' '.$row['prod_saleoff'];
        }
        else {
            $id = $_GET['prod_id'];
            $result =  mysqli_query($con, "SELECT * FROM product WHERE prod_id = $id");
            $row = mysqli_fetch_assoc($result);
            echo $row['prod_img'] .' '.$row['prod_cost'].' '.$row['prod_amount'] .' '.$row['prod_saleoff'];
        }
       
    }else {
        $id = $_POST['order_id'];
        $fb_id = $_POST['fb_id'];
        $color = $_POST['color'];
        $buyer = $_POST['buyer'];
        if ($_POST['typetable'] == 'princess') {
            if (is_numeric($fb_id)) {
                $result =  mysqli_query($con, "SELECT * FROM `order`,product WHERE `order`.order_id = product.prod_id AND order_id = $id AND fb_id = '$fb_id' AND Buyer = '$buyer' ");
                $row = mysqli_fetch_assoc($result);
                echo $row['prod_img'] .' '.number_format($row['prod_cost']).' '.$row['soluong'] .' '.number_format($row['Total_cost']).' '.$color;
            } else {
                $email = $_SESSION['user'];
                $result =  mysqli_query($con, "SELECT * FROM `order_email`,product WHERE `order_email`.order_id = product.prod_id AND order_id = $id AND email = '$email' AND Buyer = '$buyer' ");
                $row = mysqli_fetch_assoc($result);
                echo $row['prod_img'] .' '.number_format($row['prod_cost']).' '.$row['soluong'] .' '.number_format($row['Total_cost']).' '.$color;
            }
        } else {
            if (is_numeric($fb_id)) {
                $result =  mysqli_query($con, "SELECT * FROM `orderfb_worker`,products_worker WHERE `orderfb_worker`.order_id = products_worker.prod_id AND order_id = $id AND fb_id = '$fb_id' AND Buyer = '$buyer' ");
                $row = mysqli_fetch_assoc($result);
                echo $row['prod_img'] .' '.number_format($row['prod_cost']).' '.$row['soluong'] .' '.number_format($row['Total_cost']).' '.$color;
            } else {
                $email = $_SESSION['user'];
                $result =  mysqli_query($con, "SELECT * FROM `orderemail_worker`,products_worker WHERE `orderemail_worker`.order_id = products_worker.prod_id AND order_id = $id AND email = '$email' AND Buyer = '$buyer' ");
                $row = mysqli_fetch_assoc($result);
                echo $row['prod_img'] .' '.number_format($row['prod_cost']).' '.$row['soluong'] .' '.number_format($row['Total_cost']).' '.$color;
            }
        }
      
     
    }

?>