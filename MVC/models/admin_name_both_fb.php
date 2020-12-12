<?php 
session_start();
$con = mysqli_connect('localhost','root','','skincare');

$fb_id  = $_GET['email'];

if (isset($_GET['name'])) {
   

    $result =  mysqli_query($con, "SELECT * from orderfb_worker WHERE orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from `order` WHERE `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
    // $mang = array();
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['Buyer'].",";
        // array_push($mang, $row['Buyer']);
    }

    // echo json_encode($mang , JSON_FORCE_OBJECT);
   
} else {
    if (isset($_GET['anh'])) {
        $result =  mysqli_query($con, "SELECT * from orderfb_worker WHERE orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from `order` WHERE `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
   
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['typetable']." ";
        }
    } else {
        if (isset($_GET['piece'])) {
            $result =  mysqli_query($con, "SELECT * from orderfb_worker,products_worker WHERE products_worker.prod_id = orderfb_worker.order_id AND orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng' UNION SELECT * from `order`,product WHERE product.prod_id = `order`.order_id AND `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
       
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['prod_cost']." ";
            }
        } else {
            if (isset($_GET['color'])) {
                $result =  mysqli_query($con, "SELECT * from orderfb_worker WHERE orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from `order` WHERE `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
           
                while($row = mysqli_fetch_assoc($result))
                {
                    echo $row['Color']." ";
                }
            } else {
                if (isset($_GET['quantity'])) {
                    $result =  mysqli_query($con, "SELECT * from orderfb_worker WHERE orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from `order` WHERE `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
               
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo $row['soluong']." ";
                    }
                } else {
                    if (isset($_GET['totalpiece'])) {
                        $result =  mysqli_query($con, "SELECT * from orderfb_worker WHERE orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng'  UNION SELECT * from `order` WHERE `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
                   
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo $row['Total_cost'] ." ";
                        }
                    } else {
                        if (isset($_GET['prodname'])) {
                            $result =  mysqli_query($con, "SELECT * from orderfb_worker,products_worker WHERE products_worker.prod_id = orderfb_worker.order_id AND orderfb_worker.fb_id  = '$fb_id ' AND orderfb_worker.Pack = 'Xác nhận đơn hàng' UNION SELECT * from `order`,product WHERE product.prod_id = `order`.order_id AND `order`.fb_id  = '$fb_id ' AND `order`.Pack = 'Xác nhận đơn hàng'");
                       
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