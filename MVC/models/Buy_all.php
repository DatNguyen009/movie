<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $name = $_POST['name'];
    $SDT = $_POST['SDT'];
    $address = $_POST['address'];
    $fb_id = $_POST['fb_id'];
    if (isset($fb_id) && $fb_id != "") {
      
        $qr = mysqli_query($con, "SELECT products_worker.prod_cost,cartfb_worker.amount,cartfb_worker.prod_id,products_worker.prod_saleoff,cartfb_worker.Color,cartfb_worker.typetable FROM cartfb_worker,products_worker WHERE cartfb_worker.prod_id = products_worker.prod_id AND  fb_id = '$fb_id' UNION SELECT product.prod_cost,cart.amount,cart.prod_id,product.prod_saleoff,cart.Color,cart.typetable FROM cart,product WHERE cart.prod_id = product.prod_id AND  fb_id = '$fb_id' ");
     
        while ($row =  mysqli_fetch_array($qr)) {
            $total_cost = ($row['prod_cost']*$row['amount'])-(($row['prod_cost']*$row['amount'])*($row['prod_saleoff']/100));
            $id = $row['prod_id'];
            $color = $row['Color'];
            $amount = $row['amount'];
            $typetable = $row['typetable'];
            if ($typetable == 'princess') {
                $result = "INSERT INTO `order`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `soluong`, `Total_cost`, `date`, `fb_id`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$amount','$total_cost',NOW(),'$fb_id','Xác nhận đơn hàng','princess')";
                mysqli_query($con, $result);
                mysqli_query($con, "DELETE FROM `cart` WHERE fb_id = '$fb_id' AND prod_id = '$id' ");
            }
            else {
                $result = "INSERT INTO `orderfb_worker`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `soluong`, `Total_cost`, `date`, `fb_id`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$amount','$total_cost',NOW(),'$fb_id','Xác nhận đơn hàng','worker')";
                mysqli_query($con, $result);
                mysqli_query($con, "DELETE FROM `cartfb_worker` WHERE fb_id = '$fb_id' AND prod_id = '$id' ");
            }
          
        }
        
        echo "1";
    
    }
    else {
        if (isset($_SESSION['user'])) {
            $email = $_SESSION['user'];
            $qr = mysqli_query($con, "SELECT products_worker.prod_cost,cartemail_worker.amount,cartemail_worker.prod_id,products_worker.prod_saleoff,cartemail_worker.Color,cartemail_worker.typetable FROM cartemail_worker,products_worker WHERE cartemail_worker.prod_id = products_worker.prod_id AND  email = '$email' UNION SELECT product.prod_cost,cart_email.amount,cart_email.prod_id,product.prod_saleoff,cart_email.Color,cart_email.typetable FROM cart_email,product WHERE cart_email.prod_id = product.prod_id AND  email = '$email' ");
            $mang = array();
            while ($row =  mysqli_fetch_array($qr)) {
                $total_cost = ($row['prod_cost']*$row['amount'])-(($row['prod_cost']*$row['amount'])*($row['prod_saleoff']/100));
                $id = $row['prod_id'];
                $color = $row['Color'];
                $amount = $row['amount'];
                $typetable = $row['typetable'];
                array_push($mang, $row['typetable']);
                if ($typetable == 'princess') {
                    $result = "INSERT INTO `order_email`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `soluong`, `Total_cost`, `date`, `email`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$amount','$total_cost',NOW(),'$email','Xác nhận đơn hàng','princess')";
                    mysqli_query($con, $result);
                    mysqli_query($con, "DELETE FROM `cart_email` WHERE email = '$email' AND prod_id = '$id' ");
                  
                } else {
                    $result = "INSERT INTO `orderemail_worker`(`order_id`, `Buyer`, `SDT`, `Address`, `Color`, `soluong`, `Total_cost`, `date`, `email`,`Pack`,`typetable`) VALUES ($id,'$name','$SDT','$address','$color','$amount','$total_cost',NOW(),'$email','Xác nhận đơn hàng','worker')";
                    mysqli_query($con, $result);
                    mysqli_query($con, "DELETE FROM `cartemail_worker` WHERE email = '$email' AND prod_id = '$id' ");
                   
                }
             
            }
            
            $chuoi = implode(" ", $mang);
            if (strstr($chuoi, 'princess') && strstr($chuoi, 'worker')) {
                echo "cahai";
            } else {
                if (strstr($chuoi, "princess")) {
                    echo "princess";
                }
                else {
                    echo "worker";
                }
            }
        
        }

    }

    
   
  

?>