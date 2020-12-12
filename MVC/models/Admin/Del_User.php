<?php 
    function Del_User() {
        $con = mysqli_connect('localhost','root','','movie');
        $email = $_POST['email'];
        if (isset($_POST['email'])) {
            $Del_user = "DELETE FROM login WHERE email = '$email' ";
            mysqli_query($con, $Del_user);
            echo "1";
        }
    
    }
    Del_User();
  
?>