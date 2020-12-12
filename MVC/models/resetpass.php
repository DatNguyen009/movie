<?php 
session_start();
$con = mysqli_connect('localhost','root','','skincare');
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['submit']))
{
  
    $email = $_POST['user_name'];
    $check = mysqli_query($con,"select * from admin where user_name = '$email' ");
    $row = mysqli_fetch_assoc($check);
    $pass = $row['password'];

    $find = mysqli_num_rows($check);
    if($find)
    {
     
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "datseto2018@gmail.com"; //enter you email address
        $mail->Password = 'Datnguyen2020'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email);
        $mail->addAddress("$email"); //enter you email address
        $mail->Subject = (" --------- Pass word Skincare --------- ");
        $mail->Body = "Email: $email \n Pass: $pass";

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
          
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
     
       $_SESSION['success']  =  "Gửi Email thành công";
       header("location: /DAT/Skincare/Skincare/ResetPass/");
    }
    else
    {
     
        $_SESSION['error']  =  "Email Không tồn tại";
        header("location: /DAT/Skincare/Skincare/ResetPass/");
    }
}
?>