<?php
    session_start();
    unset($_SESSION['FB_ID']);
    unset($_SESSION['FB_NAME']);
    unset($_SESSION['user']);
    unset($_SESSION['name']);
    unset($_SESSION['loginsuccess']);
    header("location:/DAT/Skincare/Skincare/Home/")
?>  