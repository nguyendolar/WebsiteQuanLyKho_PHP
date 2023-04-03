<?php
include('inc/connect.php');

if(isset($_POST['addoto'])){
    $ten = $_POST['ten'];
    $anh  = $_POST['anh'];
    $gia  = $_POST['gia'];
    $chinhanh  = $_POST['chinhanh'];
    $query = "INSERT INTO oto ( ten, anh, gia, chinhanh_id) VALUES ( '{$ten}', '{$anh}', '{$gia}', '{$chinhanh}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: oto.php?msg=1");
    } 
    else {
        header("Location: oto.php?msg=2");
    }
}
if(isset($_POST['editoto'])){
    $ten = $_POST['ten'];
    $anh  = $_POST['anh'];
    $gia  = $_POST['gia'];
    $chinhanh  = $_POST['chinhanh'];
    $id  = $_POST['id'];
    $query = "UPDATE `oto` SET `ten`='{$ten}',`anh`='{$anh}',`gia`='{$gia}',`chinhanh_id`='{$chinhanh}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: oto.php?msg=1");
    } 
    else {
        header("Location: oto.php?msg=2");
    }
}
if(isset($_POST['deleteoto'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM hopdong WHERE oto_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: oto.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM oto WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: oto.php?msg=1");
    }
}
if(isset($_POST['addnv'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $phongban  = $_POST['phongban'];
    $query = "INSERT INTO nhanvien ( hoten, email, diachi, sodienthoai, phongban_id) VALUES ( '{$hoten}', '{$email}', '{$diachi}','{$sdt}', '{$phongban}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: nhanvien.php?msg=1");
    } 
    else {
        header("Location: nhanbvien.php?msg=2");
    }
}
if(isset($_POST['editnv'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $phongban  = $_POST['phongban'];
    $id  = $_POST['id'];
    $query = "UPDATE `nhanvien` SET `hoten`='{$hoten}',`email`='{$email}',`diachi`='{$diachi}',`sodienthoai`='{$sdt}',`phongban_id`='{$phongban}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: nhanvien.php?msg=1");
    } 
    else {
        header("Location: nhanvien.php?msg=2");
    }
}
if(isset($_POST['deletenv'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM hopdong WHERE nhanvien_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: nhanvien.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM nhanvien WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: nhanvien.php?msg=1");
    }
}
if(isset($_POST['addkh'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $query = "INSERT INTO khachhang ( hoten,gioitinh,ngaysinh, sodienthoai, email, diachi) VALUES ( '{$hoten}', '{$gioitinh}', '{$ngaysinh}','{$sdt}', '{$email}','{$diachi}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: khachhang.php?msg=1");
    } 
    else {
        header("Location: khachhang.php?msg=2");
    }
}
if(isset($_POST['editkh'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $id  = $_POST['id'];
    $query = "UPDATE `khachhang` SET `hoten`='{$hoten}',`email`='{$email}',`diachi`='{$diachi}',`sodienthoai`='{$sdt}',`gioitinh`='{$gioitinh}',`ngaysinh`='{$ngaysinh}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: khachhang.php?msg=1");
    } 
    else {
        header("Location: khachhang.php?msg=2");
    }
}
if(isset($_POST['deletekh'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM hopdong WHERE khachhang_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: khachhang.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM khachhang WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: khachhang.php?msg=1");
    }
}
if(isset($_POST['addhd'])){
    $loaihopdong = $_POST['loaihopdong'];
    $khachhang = $_POST['khachhang'];
    $nhanvien = $_POST['nhanvien'];
    $oto = $_POST['oto'];
    $baohanh = $_POST['baohanh'];
    $tongtien = $_POST['tongtien'];
    $query = "INSERT INTO hopdong ( loaihopdong_id,khachhang_id,nhanvien_id, oto_id, thoigianbaohanh, tongtien) VALUES ( '{$loaihopdong}', '{$khachhang}', '{$nhanvien}','{$oto}', '{$baohanh}','{$tongtien}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: hopdong.php?msg=1");
    } 
    else {
        header("Location: hopdong.php?msg=2");
    }
}
if(isset($_POST['edithd'])){
    $loaihopdong = $_POST['loaihopdong'];
    $khachhang = $_POST['khachhang'];
    $nhanvien = $_POST['nhanvien'];
    $oto = $_POST['oto'];
    $baohanh = $_POST['baohanh'];
    $tongtien = $_POST['tongtien'];
    $id  = $_POST['id'];
    $query = "UPDATE `hopdong` SET `loaihopdong_id`='{$loaihopdong}',`khachhang_id`='{$khachhang}',`nhanvien_id`='{$nhanvien}',`oto_id`='{$oto}',`thoigianbaohanh`='{$baohanh}',`tongtien`='{$tongtien}' WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: hopdong.php?msg=1");
    } 
    else {
        header("Location: hopdong.php?msg=2");
    }
}
if(isset($_POST['deletehd'])){
    $id  = $_POST['id'];
    $query = "DELETE FROM hopdong WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: hopdong.php?msg=1");
}
?>
