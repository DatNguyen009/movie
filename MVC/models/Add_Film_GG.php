<?php 
    function ADD_Film_Home() {
        session_start();
        $con = mysqli_connect('localhost','root','','skincare');
      
        $quantity = $_GET['quantity'];
        $color = $_GET['color'];
        $fb_id = $_GET['fb_id'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($fb_id) && $fb_id != "") {
                $id_film = "SELECT * FROM cart WHERE prod_id = $id AND fb_id = '$fb_id' ";
                $result = mysqli_query($con, $id_film);
                if (mysqli_num_rows($result) > 0) {
                    echo 0;
                } else {
                    $insertfilm = "INSERT INTO cart(prod_id,fb_id,amount,Color,typetable) VALUE($id,'$fb_id',$quantity,'$color','princess');";
                    mysqli_query($con, $insertfilm);
                    echo 1;
                }
               
            }
            else {
                if (isset($_SESSION['user'])) {
                    $email = $_SESSION['user'];
                    $id_film = "SELECT * FROM cart_email WHERE prod_id = $id AND email = '$email' ";
                    $result = mysqli_query($con, $id_film);
                    if (mysqli_num_rows($result) > 0) {
                        echo 0;
                    } else {
                        $insertfilm = "INSERT INTO cart_email(prod_id,email,amount,Color,typetable) VALUE($id,'$email',$quantity,'$color','princess');";
                        mysqli_query($con, $insertfilm);
                        echo 1;
                    }
                } else {
                    echo "login";
                }
            }
        } else {
            $id = $_GET['prodid'];
            if (isset($fb_id) && $fb_id != "") {
                $id_film = "SELECT * FROM cartfb_worker WHERE prod_id = $id AND fb_id = '$fb_id' ";
                $result = mysqli_query($con, $id_film);
                if (mysqli_num_rows($result) > 0) {
                    echo 0;
                } else {
                    $insertfilm = "INSERT INTO cartfb_worker(prod_id,fb_id,amount,Color,typetable) VALUE($id,'$fb_id',$quantity,'$color','worker');";
                    mysqli_query($con, $insertfilm);
                    echo 1;
                }
               
            }
            else {
                if (isset($_SESSION['user'])) {
                    $email = $_SESSION['user'];
                    $id_film = "SELECT * FROM cartemail_worker WHERE prod_id = $id AND email = '$email' ";
                    $result = mysqli_query($con, $id_film);
                    if (mysqli_num_rows($result) > 0) {
                        echo 0;
                    } else {
                        $insertfilm = "INSERT INTO cartemail_worker(prod_id,email,amount,Color,typetable) VALUE($id,'$email',$quantity,'$color','worker');";
                        mysqli_query($con, $insertfilm);
                        echo 1;
                    }
                } else {
                    echo "login";
                }
            }
        }
       
       
    }

    ADD_Film_Home();

?>