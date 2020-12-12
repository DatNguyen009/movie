<?php 
    session_start();
    $con = mysqli_connect('localhost','root','','movie');
    $id = $_GET['id'];

    $del_Film = "DELETE FROM film WHERE film.ID_film = $id ";
    mysqli_query($con, $del_Film);
    var_dump( mysqli_query($con, $del_Film));
    header("location:/DAT/TEST_MVC/Admin/Login/");
  
?>