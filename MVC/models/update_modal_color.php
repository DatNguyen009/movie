<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');

    if (isset($_GET['typetable'])) {
        $id = $_GET['prod_id'];
        $result =  mysqli_query($con, "SELECT * FROM products_worker WHERE  prod_id = $id");
        $row = mysqli_fetch_assoc($result);
        echo $row['Color'];
    }else {
        $id = $_GET['prod_id'];
        $result =  mysqli_query($con, "SELECT * FROM product WHERE  prod_id = $id");
        $row = mysqli_fetch_assoc($result);
        echo $row['Color'];
    }
    
    
?>