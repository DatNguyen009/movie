<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    // Kiểm tra phương thức gửi form đi có phải là POST hay ko ?
    
    $prod_type = $_POST['radiocolor'];
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $khuyenmai = $_POST['khuyenmai'];
    $mieuta = $_POST['mieuta'];
    $soluong = $_POST['soluong'];
    $color = $_POST['color'];
    if ($masp == "") {
   
      $_SESSION['error'] = "Vui lòng mã không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    }
    if ($tensp == "") {
      $_SESSION['masp'] = "".$masp;
      $_SESSION['error'] = "Vui lòng tên không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    }
    if ($giasp == "") {
      $_SESSION['tensp'] = "".$tensp;
      $_SESSION['masp'] = "".$masp;
      $_SESSION['error'] = "Vui lòng giá không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    }
    if (!isset($_POST['radiocolor'])) {
      $_SESSION['gia'] = "".$giasp;
      $_SESSION['tensp'] = "".$tensp;
      $_SESSION['masp'] = "".$masp;
      $_SESSION['error'] = "Vui lòng loại sản phẩm không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    }
    if ($khuyenmai == "") {
      $_SESSION['gia'] = "".$giasp;
      $_SESSION['tensp'] = "".$tensp;
      $_SESSION['masp'] = "".$masp;
      $_SESSION['error'] = "Vui lòng khuyen mai không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    }
    if ($mieuta == "") {
      $_SESSION['khuyenmai'] = "".$khuyenmai;
      $_SESSION['gia'] = "".$giasp;
      $_SESSION['tensp'] = "".$tensp;
      $_SESSION['masp'] = "".$masp;
      $_SESSION['error'] = "Vui lòng miêu tả không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    } else {
      $_SESSION['mota'] = "".$mieuta;
    }

    if ($soluong == "") {
      $_SESSION['mota'] = "".$mieuta;
      $_SESSION['khuyenmai'] = "".$khuyenmai;
      $_SESSION['gia'] = "".$giasp;
      $_SESSION['tensp'] = "".$tensp;
      $_SESSION['masp'] = "".$masp;
      $_SESSION['error'] = "Vui lòng số lượng không được để trống";
      header("location:/DAT/Skincare/AdminWorker/Addproduct/");
    }
    else {
      $_SESSION['soluong'] = "".$soluong;
    }
  

   
    if($_SERVER["REQUEST_METHOD"] == "POST"){

      $targetDir = "upload_worker/"; 
      $allowTypes = array('jpg','png','jpeg','gif'); 

      $mang = [];
      $filesize = $_FILES["photo"]["size"];
      $fileNames = array_filter($_FILES['photo']['name']); 
      if ((count($fileNames) > 4) || (count($fileNames) == 0)) {
                $_SESSION['error'] = "Lỗi : Số file phải nhỏ hơn 4 và lớn hơn 0";
                header("location:/DAT/Skincare/AdminWorker/Addproduct/");
      }
      else {

          foreach($_FILES['photo']['name'] as $key=>$val){ 
            $fileName = basename($_FILES['photo']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
            //kiem  tra dinh dang file
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            array_push($mang, $fileName);
            if(!in_array($fileType, $allowTypes)){ 
              $_SESSION['error'] = "Lỗi : Vui lòng chọn đúng định dạng file.";
              header("location:/DAT/Skincare/AdminWorker/Addproduct/");
            }
            else {
              
              if (file_exists("upload_worker/" .$_FILES['photo']['name'][$key])) {
                $_SESSION['error'] = "Lỗi : File này đã tồn tại trong hệ thống:".$_FILES['photo']['name'][$key];
                header("location:/DAT/Skincare/AdminWorker/Addproduct/");
              }
               var_dump( move_uploaded_file($_FILES["photo"]["tmp_name"][$key], "upload_worker/" .$_FILES['photo']['name'][$key]));
            }
          }
          $add_product = "INSERT INTO `products_worker`(`prod_id`, `prod_name`, `prod_cost`, `prod_img`, `prod_amount`, `prod_description`, `prod_saleoff`,`Color`,`prod_type`) VALUES ('','$tensp',$giasp,'$mang[0]',$soluong,'$mieuta',$khuyenmai,'$color','$prod_type')";
          $qr = mysqli_query($con, $add_product);
          for ($i=0; $i < count($mang) ; $i++) { 
             
              mysqli_query($con, "INSERT INTO products_image(`prod_image`, `img_one`) VALUE('$mang[0]','$mang[$i]')");
              $_SESSION['success'] = "Thêm sản phẩm thành công";
              header("location:/DAT/Skincare/AdminWorker/ProductManager/");
          }
      
      }
        
    }
  
?>