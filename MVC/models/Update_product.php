<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $saleoff = $_POST['saleoff'];
    $color = $_POST['color'];
    
    if (isset($_POST['typetable'])) {
        $result = mysqli_query($con, "UPDATE `products_worker` SET `prod_name`= '$name',`prod_cost`= $gia,`prod_amount`= $soluong,`prod_saleoff`= $saleoff, `Color`= '$color' WHERE prod_id = $id");
        if ($result == true) {
            echo "success";
        } else {
            echo "fail";
        }
    } else {
        $result = mysqli_query($con, "UPDATE `product` SET `prod_name`= '$name',`prod_cost`= $gia,`prod_amount`= $soluong,`prod_saleoff`= $saleoff, `Color`= '$color' WHERE prod_id = $id");
        if ($result == true) {
            echo "success";
        } else {
            echo "fail";
        }
    }

   
  

?>