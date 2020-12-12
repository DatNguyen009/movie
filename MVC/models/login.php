<?php
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
 
    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($con, $_POST['user_name']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);

        if (is_numeric($user)) {
            $result = mysqli_query($con, "select * from admin where user_name = '$user' AND password = '$pass' ");
            $num = mysqli_num_rows($result);
        
            if ($num == 1) {
                $_SESSION['loginsuccess'] = "<h2 style = 'padding-top:40px;'>LOGIN SUCCESSFUL</h2>";
                $_SESSION['user'] = "".$user;
                $_SESSION['name'] = "".$user;
                echo "success";
            
            } else {
            
                $result_qr = mysqli_query($con, "select * from admin where user_name = '$user' ");
                if (mysqli_num_rows($result_qr)>0) {
                    echo "error_pass";
                } else {
                    echo "error_SDT";
                }
            }
        } else {
            $checkemail = explode("@",$user);
            $result = mysqli_query($con, "select * from admin where user_name = '$user' AND password = '$pass' ");
            $num = mysqli_num_rows($result);
        
            if ($num == 1) {
                $_SESSION['loginsuccess'] = "<h2 style = 'padding-top:40px;'>LOGIN SUCCESSFUL</h2>";
                $_SESSION['user'] = "".$user;
                $_SESSION['name'] = "".$checkemail[0];
                echo "success";
            
            } else {
            
                $result_qr = mysqli_query($con, "select * from admin where user_name = '$user' ");
                if (mysqli_num_rows($result_qr)>0) {
                    echo "error_pass";
                } else {
                    if ($checkemail[1] != "@gmail.com") {
                        echo "error_validateemail";
                    }else
                    {
                        echo "error_email";
                    }
                
                }
            }
        }
        

        
        
    }
    else {
        $user = mysqli_real_escape_string($con, $_POST['user_name']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);
        if ($user == 'Daitymakeup') {
            $result = mysqli_query($con, "select * from admin where user_name = '$user' AND password = '$pass' ");
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                echo "3";
                $_SESSION['loginsuccess_Worker'] = "<h2 style = 'padding-top:40px;'>LOGIN SUCCESSFUL</h2>";
            } else {
                $result_qr = mysqli_query($con, "select * from admin where user_name = '$user' ");
                if (mysqli_num_rows($result_qr)>0) {
                    echo "1";
                } else {
                    echo "0";
                }
            }
        } else {
            $result = mysqli_query($con, "select * from admin where user_name = '$user' AND password = '$pass' ");
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                echo "2";
                $_SESSION['loginsuccess_login'] = "<h2 style = 'padding-top:40px;'>LOGIN SUCCESSFUL</h2>";
            } else {
                $result_qr = mysqli_query($con, "select * from admin where user_name = '$user' ");
                if (mysqli_num_rows($result_qr)>0) {
                    echo "1";
                } else {
                    echo "0";
                }
            }
        }
        
       
    }
   

?>