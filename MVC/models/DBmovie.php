<?php
session_start();
class DBmovie extends DB
{
   

    public function Prod_Manager()
    {
        $resultFD = "SELECT * FROM `product`";  
        return mysqli_query($this->con, $resultFD);
    }
    public function List_Product() {
        $query = "SELECT * FROM product ORDER BY `prod_id` DESC LIMIT 0, 4";
        return mysqli_query($this->con, $query);
    }
    public function List_Product_worker() {
        $query = "SELECT * FROM products_worker ORDER BY `prod_id` DESC LIMIT 0, 4";
        return mysqli_query($this->con, $query);
    }
    public function Prod_Detail(){
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $resultFD = "SELECT * FROM product WHERE prod_id = " . $id;
            return mysqli_query($this->con, $resultFD);
        }else
        {
            if (isset($_GET["prodid"])) {
                $id = $_GET["prodid"];
                $resultFD = "SELECT * FROM products_worker WHERE prod_id = " . $id;
                return mysqli_query($this->con, $resultFD);
            }
        }
    }
    public function Prod_Desciption(){
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $resultFD = "SELECT prod_description FROM product WHERE prod_id = " . $id;
            return mysqli_query($this->con, $resultFD);
        }else
        {
            if (isset($_GET["prodid"])) {
                $id = $_GET["prodid"];
                $resultFD = "SELECT prod_description FROM products_worker WHERE prod_id = " . $id;
                return mysqli_query($this->con, $resultFD);
            }
        }
    }

    public function Cart() {
      
        if (isset($_SESSION['FB_ID'])) {
            $fb_id = $_SESSION['FB_ID'];
            return mysqli_query($this->con,"SELECT products_worker.prod_id,products_worker.prod_name,products_worker.prod_cost,products_worker.prod_img,cartfb_worker.amount,products_worker.prod_saleoff,cartfb_worker.Color,cartfb_worker.typetable FROM cartfb_worker,products_worker WHERE cartfb_worker.prod_id = products_worker.prod_id AND 	fb_id = '$fb_id' UNION SELECT product.prod_id,product.prod_name,product.prod_cost,product.prod_img,cart.amount,product.prod_saleoff,cart.Color,cart.typetable FROM cart,product WHERE cart.prod_id = product.prod_id AND 	fb_id = '$fb_id'");
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                return mysqli_query($this->con,"SELECT products_worker.prod_id,products_worker.prod_name,products_worker.prod_cost,products_worker.prod_img,cartemail_worker.amount,products_worker.prod_saleoff,cartemail_worker.Color,cartemail_worker.typetable FROM cartemail_worker,products_worker WHERE email = '$email' AND cartemail_worker.prod_id = products_worker.prod_id UNION SELECT product.prod_id,product.prod_name,product.prod_cost,product.prod_img,cart_email.amount,product.prod_saleoff,cart_email.Color,cart_email.typetable FROM cart_email,product WHERE email = '$email' AND cart_email.prod_id = product.prod_id");
            }
        }
    }
    public function total() {
        if (isset($_SESSION['FB_ID'])) {
            $fb_id = $_SESSION['FB_ID'];
            $select_row = "SELECT * FROM cartfb_worker WHERE fb_id = '$fb_id' UNION SELECT * FROM cart WHERE fb_id = '$fb_id'";
            $result = mysqli_query($this->con,$select_row);
            $total = 0;
                while($row = mysqli_fetch_assoc($result))
                {
                    $total++;
                    
                }
                return $total;
        } else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                $select_row = "SELECT * FROM cartemail_worker WHERE email = '$email' UNION SELECT * FROM cart_email WHERE email = '$email'";
                $result = mysqli_query($this->con,$select_row);
                $total = 0;
                while($row = mysqli_fetch_assoc($result))
                {
                    $total++;
                    
                }
                return $total;
            }
        }
       
    }

    public function total_product() {
        $select_row = "SELECT count(prod_id) as total FROM product ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function total_product_worker() {
        $select_row = "SELECT count(prod_id) as total FROM products_worker ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }


    //tong so don hang princess
    public function combine_total_order() {
        $select_row = "SELECT count(*) AS combine_total_order FROM `order`   ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS combine_total_order FROM `order_email` ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['combine_total_order'] +$row_email['combine_total_order'];
    }

    public function combine_total_orderPack() {
        $select_row = "SELECT count(*) AS combine_total_order FROM `order`  WHERE Pack = 'Đã giao hàng' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS combine_total_order FROM `order_email` WHERE Pack = 'Đã giao hàng' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['combine_total_order'] +$row_email['combine_total_order'];
    }

    public function combine_total_orderSuccess() {
        $select_row = "SELECT count(*) AS combine_total_order FROM `order`  WHERE Pack = 'Giao hàng thành công' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS combine_total_order FROM `order_email` WHERE Pack = 'Giao hàng thành công' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['combine_total_order'] +$row_email['combine_total_order'];
    }

   
    // tong so do hang worker
    public function combine_total_order_worker() {
        $select_row = "SELECT count(*) AS combine_total_order FROM `orderfb_worker`   ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS combine_total_order FROM `orderemail_worker` ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['combine_total_order'] +$row_email['combine_total_order'];
    }

    public function combine_total_order_workerPack() {
        $select_row = "SELECT count(*) AS combine_total_order FROM `orderfb_worker`  WHERE Pack = 'Đã giao hàng' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS combine_total_order FROM `orderemail_worker`WHERE Pack = 'Đã giao hàng' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['combine_total_order'] +$row_email['combine_total_order'];
    }

    public function combine_total_order_workerSuccess() {
        $select_row = "SELECT count(*) AS combine_total_order FROM `orderfb_worker`  WHERE Pack = 'Giao hàng thành công' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS combine_total_order FROM `orderemail_worker`WHERE Pack = 'Giao hàng thành công' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['combine_total_order'] +$row_email['combine_total_order'];
    }


    public function total_order() {
        if (isset($_SESSION['FB_ID'])) {
            $select_row = "SELECT count(order_id) as total FROM `order`";
            $result = mysqli_query($this->con,$select_row);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
        else {
            $select_row = "SELECT count(order_id) as total FROM `order_email`";
            $result = mysqli_query($this->con,$select_row);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
    }
 
    public function total_cost() {
        
        if (isset($_SESSION['FB_ID'])) {
            $fb_id = $_SESSION['FB_ID'];
            $array_cost = array();
            $total = 0;
            $qr = mysqli_query($this->con,"SELECT products_worker.prod_cost,cartfb_worker.amount,prod_saleoff FROM cartfb_worker,products_worker WHERE cartfb_worker.prod_id = products_worker.prod_id AND fb_id = '$fb_id' UNION SELECT product.prod_cost,cart.amount,prod_saleoff FROM cart,product WHERE cart.prod_id = product.prod_id AND fb_id = '$fb_id'");
            while ($row =  mysqli_fetch_array($qr)) {
                settype($total_cost,"float");
                $total_cost = ($row['prod_cost']*$row['amount'])-(($row['prod_cost']*$row['amount'])*($row['prod_saleoff']/100));
                array_push($array_cost,$total_cost);      
            }
            for ($i=0; $i < count($array_cost) ; $i++) {
                $total += $array_cost[$i];
            }   
        
            return $total;
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                $array_cost = array();
                $total = 0;
                $qr = mysqli_query($this->con,"SELECT products_worker.prod_cost,cartemail_worker.amount,prod_saleoff FROM cartemail_worker,products_worker WHERE cartemail_worker.prod_id = products_worker.prod_id AND email = '$email' UNION SELECT product.prod_cost,cart_email.amount,prod_saleoff FROM cart_email,product WHERE cart_email.prod_id = product.prod_id AND email = '$email'");
                while ($row =  mysqli_fetch_array($qr)) {
                    settype($total_cost,"float");
                    $total_cost = ($row['prod_cost']*$row['amount'])-(($row['prod_cost']*$row['amount'])*($row['prod_saleoff']/100));
                    array_push($array_cost,$total_cost);      
                }
                for ($i=0; $i < count($array_cost) ; $i++) {
                    $total += $array_cost[$i];
                }   
            
                return $total;
            }
        }
    }
    public function Buyall() {
        if (isset($_SESSION['FB_ID'])) {
             
            $fb_id = $_SESSION['FB_ID'];
            return mysqli_query($this->con,"SELECT products_worker.prod_cost,cartfb_worker.amount,prod_saleoff,cartfb_worker.Color,products_worker.prod_name,products_worker.prod_img,cartfb_worker.typetable FROM cartfb_worker,products_worker WHERE cartfb_worker.prod_id = products_worker.prod_id AND fb_id = '$fb_id' UNION SELECT product.prod_cost,cart.amount,prod_saleoff,cart.Color,product.prod_name,product.prod_img,cart.typetable FROM cart,product WHERE cart.prod_id = product.prod_id AND fb_id = '$fb_id'");
        
        } else {
            $email = $_SESSION['user'];
            return mysqli_query($this->con,"SELECT products_worker.prod_cost,cartemail_worker.amount,prod_saleoff,cartemail_worker.Color,products_worker.prod_name,products_worker.prod_img,cartemail_worker.typetable FROM cartemail_worker,products_worker WHERE cartemail_worker.prod_id = products_worker.prod_id AND email = '$email' UNION SELECT product.prod_cost,cart_email.amount,prod_saleoff,cart_email.Color,product.prod_name,product.prod_img,cart_email.typetable FROM cart_email,product WHERE cart_email.prod_id = product.prod_id AND email = '$email'");
        
        }
       
    }

    public function Order_detail() {
        if (isset($_SESSION['FB_ID'])) {
            $fb_id = $_SESSION['FB_ID'];
            return mysqli_query($this->con,"("."SELECT * FROM `orderfb_worker` WHERE fb_id = '$fb_id') UNION (SELECT * FROM `order` WHERE fb_id = '$fb_id') ORDER BY `date` DESC");
        } else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                return mysqli_query($this->con,"("."SELECT * FROM `orderemail_worker` WHERE email = '$email') UNION (SELECT * FROM `order_email` WHERE email = '$email') ORDER BY `date` DESC");
            }
        }
        
    }

    public function Multi_image()
    {
        if (isset($_GET['id'])) {
            $id_product = $_GET['id'];
            $row_id = mysqli_query($this->con, "SELECT * FROM product WHERE prod_id = $id_product");
            $check_product = mysqli_num_rows($row_id);
            if ($check_product != 0) {
                $id = $_GET['id'];
                $prod_img =  mysqli_query($this->con, "SELECT prod_img FROM product WHERE prod_id = $id");
                $row = mysqli_fetch_array($prod_img);
                $row_img = $row['prod_img'];
                return mysqli_query($this->con,"SELECT img_one FROM `product_image`,product WHERE product_image.prod_img = product.prod_img AND product_image.prod_img  = '$row_img' ");
            } 
        } else {
            $id_product = $_GET['prodid'];
            $row_id = mysqli_query($this->con, "SELECT * FROM products_worker WHERE prod_id = $id_product");
            $check_product = mysqli_num_rows($row_id);
         
            if ($check_product != 0) {
                $id = $_GET['prodid'];
                $prod_img =  mysqli_query($this->con, "SELECT prod_img FROM products_worker WHERE prod_id = $id");
                $row = mysqli_fetch_array($prod_img);
                $row_img = $row['prod_img'];
                return mysqli_query($this->con,"SELECT img_one FROM `products_image`,products_worker WHERE products_image.prod_image = products_worker.prod_img AND products_image.prod_image  = '$row_img' ");
            } 
        }
       
        
    }

    public function checkid_product() {
        if (isset($_GET['id'])) {
            $id_product = $_GET['id'];
            $row_id = mysqli_query($this->con, "SELECT * FROM product WHERE prod_id = $id_product");
            $check_product = mysqli_num_rows($row_id);
            return $check_product;
        } else {
            if (isset($_GET['prodid'])) {
                $id_product = $_GET['prodid'];
                $row_id = mysqli_query($this->con, "SELECT * FROM products_worker WHERE prod_id  = $id_product");
                $check_product = mysqli_num_rows($row_id);
                return $check_product;
            }
        }
        
      
    }

    public function january() {
        $start = "2020-01-01 00:00:00";
        $end = "2020-01-30 00:00:00";
        $select_row = "SELECT count(*) AS january FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS january FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['january'] +$row_email['january'];
    }
    public function February() {
        $start = "2020-02-01 00:00:00";
        $end = "2020-02-29 00:00:00";
        $select_row = "SELECT count(*) AS February FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS February FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['February'] +$row_email['February'];
    }
    public function March() {
        $start = "2020-03-01 00:00:00";
        $end = "2020-03-31 00:00:00";
        $select_row = "SELECT count(*) AS March FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS March FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['March'] +$row_email['March'];
    }
    public function April() {
        $start = "2020-04-01 00:00:00";
        $end = "2020-04-30 00:00:00";
        $select_row = "SELECT count(*) AS April FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS April FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['April'] +$row_email['April'];
    }
    public function May() {
        $start = "2020-05-01 00:00:00";
        $end = "2020-05-31 00:00:00";
        $select_row = "SELECT count(*) AS May FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS May FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['May'] +$row_email['May'];
    }
    public function june() {
        $start = "2020-06-01 00:00:00";
        $end = "2020-06-30 00:00:00";
        $select_row = "SELECT count(*) AS june FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS june FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['june'] +$row_email['june'];
    }
    public function july() {
        $start = "2020-07-01 00:00:00";
        $end = "2020-07-31 00:00:00";
        $select_row = "SELECT count(*) AS july FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS july FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['july'] +$row_email['july'];
    }
    public function august() {
        $start = "2020-08-01 00:00:00";
        $end = "2020-08-31 00:00:00";
        $select_row = "SELECT count(*) AS august FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS august FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['august'] +$row_email['august'];
    }
    public function september() {
        $start = "2020-09-01 00:00:00";
        $end = "2020-09-30 00:00:00";
        $select_row = "SELECT count(*) AS september FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS september FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['september'] +$row_email['september'];
    }
    public function octember() {
        $start = "2020-10-01 00:00:00";
        $end = "2020-10-31 00:00:00";
        $select_row = "SELECT count(*) AS octember FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS octember FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['octember'] +$row_email['octember'];
    }
    public function november() {
        $start = "2020-11-01 00:00:00";
        $end = "2020-11-30 00:00:00";
        $select_row = "SELECT count(*) AS november FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS november FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['november'] +$row_email['november'];
    }
    public function december() {
        $start = "2020-12-01 00:00:00";
        $end = "2020-12-31 00:00:00";
        $select_row = "SELECT count(*) AS december FROM `order`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS december FROM `order_email`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['december'] +$row_email['december'];
    }



    ////////////////////////////////////////////chart worker
    public function january_worker() {
        $start = "2020-01-01 00:00:00";
        $end = "2020-01-30 00:00:00";
        $select_row = "SELECT count(*) AS january FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS january FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['january'] +$row_email['january'];
    }
    public function February_worker() {
        $start = "2020-02-01 00:00:00";
        $end = "2020-02-29 00:00:00";
        $select_row = "SELECT count(*) AS February FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS February FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['February'] +$row_email['February'];
    }
    public function March_worker() {
        $start = "2020-03-01 00:00:00";
        $end = "2020-03-31 00:00:00";
        $select_row = "SELECT count(*) AS March FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS March FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['March'] +$row_email['March'];
    }
    public function April_worker() {
        $start = "2020-04-01 00:00:00";
        $end = "2020-04-30 00:00:00";
        $select_row = "SELECT count(*) AS April FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS April FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['April'] +$row_email['April'];
    }
    public function May_worker() {
        $start = "2020-05-01 00:00:00";
        $end = "2020-05-31 00:00:00";
        $select_row = "SELECT count(*) AS May FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS May FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['May'] +$row_email['May'];
    }
    public function june_worker() {
        $start = "2020-06-01 00:00:00";
        $end = "2020-06-30 00:00:00";
        $select_row = "SELECT count(*) AS june FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS june FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['june'] +$row_email['june'];
    }
    public function july_worker() {
        $start = "2020-07-01 00:00:00";
        $end = "2020-07-31 00:00:00";
        $select_row = "SELECT count(*) AS july FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS july FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['july'] +$row_email['july'];
    }
    public function august_worker() {
        $start = "2020-08-01 00:00:00";
        $end = "2020-08-31 00:00:00";
        $select_row = "SELECT count(*) AS august FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS august FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['august'] +$row_email['august'];
    }
    public function september_worker() {
        $start = "2020-09-01 00:00:00";
        $end = "2020-09-30 00:00:00";
        $select_row = "SELECT count(*) AS september FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS september FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['september'] +$row_email['september'];
    }
    public function octember_worker() {
        $start = "2020-10-01 00:00:00";
        $end = "2020-10-31 00:00:00";
        $select_row = "SELECT count(*) AS octember FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS octember FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['octember'] +$row_email['octember'];
    }
    public function november_worker() {
        $start = "2020-11-01 00:00:00";
        $end = "2020-11-30 00:00:00";
        $select_row = "SELECT count(*) AS november FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS november FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['november'] +$row_email['november'];
    }
    public function december_worker() {
        $start = "2020-12-01 00:00:00";
        $end = "2020-12-31 00:00:00";
        $select_row = "SELECT count(*) AS december FROM `orderfb_worker`  WHERE date >= '$start' AND date <= '$end' ";
        $result = mysqli_query($this->con,$select_row);
        $row = mysqli_fetch_assoc($result);

        $result_order_email = mysqli_query($this->con,"SELECT count(*) AS december FROM `orderemail_worker`  WHERE date >= '$start' AND date <= '$end' ");
        $row_email = mysqli_fetch_assoc($result_order_email);
        return $row['december'] +$row_email['december'];
    }
}

?>