<?php

function Register() {
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
    $email = $_POST['user_name'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm-password'];
    
  

    if (is_numeric($email)) {
        $result = mysqli_query($con, "SELECT * FROM `admin` WHERE user_name = '$email'") or die("khong the truy van");
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error'] = "Số điện thoại đã tồn tại";
            header("location:/DAT/Skincare/Skincare/Register/");
        }
        else {
            if ($pass != $confirm_pass) {
                $_SESSION['error'] = "Mật khẩu và mật khẩu xác nhận chưa tương thích";
                header("location:/DAT/Skincare/Skincare/Register/");
            } else {
                $insert_user = "INSERT INTO `admin`(`user_name`, `password`) VALUES ('$email','$pass')";
                $qr_insert= mysqli_query($con, $insert_user) or die("khong th truy van duoc");
                $_SESSION['sucsess_register'] = "Đăng ký thành công";
                header("location:/DAT/Skincare/Skincare/Login/");
            }
        }
    }
    else {
        $checkemail = explode("@",$email);

        if ($checkemail[1] != "gmail.com") {
        $_SESSION['error'] = "Vui lòng nhập đúng địa chỉ Email";
        header("location:/DAT/Skincare/Skincare/Register/");
        }
        else {
            $qr = "SELECT * FROM `admin` WHERE user_name = '$email'";
            $result = mysqli_query($con, $qr) or die("khong the truy van");
    
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['error'] = "Email đã tồn tại";
                header("location:/DAT/Skincare/Skincare/Register/");
            }
            else {
    
               if (strlen($pass) < 6) {
                    $_SESSION['error'] = "Mật khẩu không được nhỏ hơn 6 kí tự";
                    header("location:/DAT/Skincare/Skincare/Register/");
               } else {
                    
                    if ($pass != $confirm_pass) {
                        $_SESSION['error'] = "Mật khẩu và mật khẩu xác nhận chưa tương thích";
                        header("location:/DAT/Skincare/Skincare/Register/");
                    } else {
                        $insert_user = "INSERT INTO `admin`(`user_name`, `password`) VALUES ('$email','$pass')";
                        $qr_insert= mysqli_query($con, $insert_user) or die("khong th truy van duoc");
                        $_SESSION['sucsess_register'] = "Đăng ký thành công";
                        header("location:/DAT/Skincare/Skincare/Login/");
                    }
               }
             
                
            
            }
        }
      
    }
    
   

}

Register();
?>