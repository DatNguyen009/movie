<?php
    session_start();
    unset($_SESSION['loginsuccess_login']);
    unset($_SESSION['loginsuccess_Worker']);
    header("location:/DAT/Skincare/Admin/Login/")
?>  