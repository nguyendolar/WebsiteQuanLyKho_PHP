<?php
include('inc/connect.php');

if(isset($_POST['login'])){
    $tk = $_POST['taikhoan'];
    $mk  = $_POST['matkhau'];
    if ($tk == "admin" && $mk == "admin") 
    {
      header("Location: index.php?msg=1");
      $_SESSION['taikhoan'] = $tk;
      $_SESSION['hoten'] = "Quản trị viên";
    }
    else{
      header("Location: login.php?fail=1");
    }
  }
 ?> 