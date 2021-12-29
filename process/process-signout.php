<?php
//đưa về trang đăng nhập
    session_start();
    if(isset($_SESSION['signinOK'])){
        unset($_SESSION['signinOK']);
        header('Location: ../index.php');
    }
?>