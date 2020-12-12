<?php
session_start();
$con = mysqli_connect('localhost','root','','skincare');
$name=mysqli_real_escape_string($con,$_POST['name']);
$id=mysqli_real_escape_string($con,$_POST['id']);

$res=mysqli_query($con,"select * from facebook_users where fb_id='$id'");
$_SESSION['FB_ID']="".$id;
$_SESSION['FB_NAME']="".$name;
$_SESSION['loginsuccess'] = "success";
if(mysqli_num_rows($res)>0){

}else{
	mysqli_query($con,"insert into facebook_users(name,fb_id) values('$name','$id')");
}
?>