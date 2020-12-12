<?php
    function Search() {
        session_start();
        $con = mysqli_connect('localhost','root','','skincare');
        if (isset($_GET['submitsearch'])) {
            $searh  = $_GET['search'];
            header('location:/DAT/Skincare/Skincare/Search/&search='.$searh);
        } 
    }
    Search();
?>  
