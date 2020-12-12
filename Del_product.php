<?php 

function Del_cart() {
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $id = $_POST['prod_id'];
    $img = $_POST['prod_img'];
    if (isset($_POST['typetable'])) {
        $count = mysqli_query($con, "SELECT COUNT(products_image.img_one) as total FROM `products_image`,products_worker WHERE products_worker.prod_img = products_image.prod_image AND products_image.prod_image = '$img'");
        $row = mysqli_fetch_assoc($count);
    
        $result = mysqli_query($con, "SELECT products_image.img_one,products_image.prod_image  FROM `products_image`,products_worker WHERE products_worker.prod_img = products_image.prod_image  AND products_image.prod_image  = '$img'");
        mysqli_query($con, "DELETE FROM products_image WHERE prod_image  = '$img' ");
        mysqli_query($con, "DELETE FROM products_worker WHERE prod_id  = $id ");
        while ($row_IMAGE = mysqli_fetch_assoc($result)) {
            $state = unlink("upload_worker/".$row_IMAGE['img_one']);
        }                                          
       
       
        echo 0;
    }
    else {
        // $count = mysqli_query($con, "SELECT COUNT(product_image.img_one) as total FROM `product_image`,product WHERE product.prod_img = product_image.prod_img AND product_image.prod_img = '$img'");
        // $row = mysqli_fetch_assoc($count);
        $result = mysqli_query($con, "SELECT product_image.img_one,product_image.prod_img FROM `product_image`,product WHERE product.prod_img = product_image.prod_img AND product_image.prod_img = '$img'");
        while ($row_IMAGE = mysqli_fetch_assoc($result)) {
            $state = unlink("upload/".$row_IMAGE['img_one']);
        }      
        mysqli_query($con, "DELETE FROM product WHERE prod_id  = $id ");
        echo 0;
    }
  
}

Del_cart();

?>