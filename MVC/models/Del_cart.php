<?php 

function Del_cart() {
    session_start();
    $con = mysqli_connect('localhost','root','','skincare');
   
    $fb_id  = $_GET['fb_id'];

    if (isset($_GET['princess'])) {
        $id = $_GET['princess'];
        if (isset($fb_id) && $fb_id != "") {
            mysqli_query($con, "DELETE FROM cart WHERE fb_id = '$fb_id' AND prod_id  = $id ");
            echo 0;
        }
        else {
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
              
                mysqli_query($con, "DELETE FROM cart_email WHERE email = '$email' AND prod_id  = $id ");
                
                echo 0;
            }
        }
    } else {
        if (isset($_GET['worker'])) {
            $id = $_GET['worker'];
            if (isset($fb_id) && $fb_id != "") {
                mysqli_query($con, "DELETE FROM cartfb_worker WHERE fb_id = '$fb_id' AND prod_id  = $id ");
                echo 0;
            }
            else {
                if (isset($_SESSION['user'])) {
                    $email = $_SESSION['user'];
                  
                    mysqli_query($con, "DELETE FROM cartemail_worker WHERE email = '$email' AND prod_id  = $id ");
                    
                    echo 0;
                }
            }
        }
    }

   

 
}

Del_cart();

?>
