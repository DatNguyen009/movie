<?php 
session_start();
$con = mysqli_connect('localhost','root','','skincare');

$email = $_GET['email'];

if (isset($_GET['name'])) {
   

    $result =  mysqli_query($con, "SELECT * from orderemail_worker WHERE orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from order_email WHERE order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
    // $mang = array();
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['Buyer'].",";
        // array_push($mang, $row['Buyer']);
    }

    // echo json_encode($mang , JSON_FORCE_OBJECT);
   
} else {
    if (isset($_GET['anh'])) {
        $result =  mysqli_query($con, "SELECT * from orderemail_worker WHERE orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from order_email WHERE order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
   
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['typetable']." ";
        }
    } else {
        if (isset($_GET['piece'])) {
            $result =  mysqli_query($con, "SELECT * from orderemail_worker,products_worker WHERE products_worker.prod_id = orderemail_worker.order_id AND orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng' UNION SELECT * from order_email,product WHERE product.prod_id = order_email.order_id AND order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
       
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['prod_cost']." ";
            }
        } else {
            if (isset($_GET['color'])) {
                $result =  mysqli_query($con, "SELECT * from orderemail_worker WHERE orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from order_email WHERE order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
           
                while($row = mysqli_fetch_assoc($result))
                {
                    echo $row['Color']." ";
                }
            } else {
                if (isset($_GET['quantity'])) {
                    $result =  mysqli_query($con, "SELECT * from orderemail_worker WHERE orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from order_email WHERE order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
               
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo $row['soluong']." ";
                    }
                } else {
                    if (isset($_GET['totalpiece'])) {
                        $result =  mysqli_query($con, "SELECT * from orderemail_worker WHERE orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from order_email WHERE order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
                   
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo $row['Total_cost'] ." ";
                        }
                    } else {
                        if (isset($_GET['prodname'])) {
                            $result =  mysqli_query($con, "SELECT * from orderemail_worker,products_worker WHERE products_worker.prod_id = orderemail_worker.order_id AND orderemail_worker.email = '$email' AND orderemail_worker.Pack = 'Xác nhận đơn hàng' UNION SELECT * from order_email,product WHERE product.prod_id = order_email.order_id AND order_email.email = '$email' AND order_email.Pack = 'Xác nhận đơn hàng'");
                       
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo  $row['prod_name'].",";
                            }
                        }
                    }
                }
            }
        }
    }
  

}



?>