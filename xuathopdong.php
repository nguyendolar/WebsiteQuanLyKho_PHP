<?php
    require('inc/connect.php');
    $id = $_GET['id'];
    $query = "SELECT a.*,b.ten as 'loaihopdong',c.hoten as 'khachhang', d.hoten as 'nhanvien', e.ten as 'oto' FROM hopdong as a,loaihopdong as b, khachhang as c, nhanvien as d, oto as e WHERE a.loaihopdong_id = b.id AND a.khachhang_id = c.id AND a.nhanvien_id = d.id AND a.oto_id = e.id AND a.id ='{$id}'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<head>
    <style>
    body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
    width: 40%;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 50%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
</style>
</head>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img style="width : 80%" src="https://kenhmuaxe.com/wp-content/uploads/2020/04/logo-kenh-mua-xe.jpg"/></div>
        <div class="company">Cửa hàng ô tô Vĩnh Cữu</div>
    </div>
  <br/>
  <div class="title">
        CHI TIẾT HỢP ĐỒNG 
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
  <table class="TableData">
    <tr>
        <th>Mã hợp đồng</th>
        <td class="cotSTT">HD_<?php echo $row['id'] ?></td>
    </tr>
    <tr>
        <th>Loại hợp đồng</th>
        <td class="cotSTT"><?php echo $row['loaihopdong'] ?></td>
    </tr>
    <tr>
        <th>Khách hàng</th>
        <td class="cotSTT"><?php echo $row['khachhang'] ?></td>
    </tr>
    <tr>
        <th>Nhân viên phụ trách</th>
        <td class="cotSTT"><?php echo $row['nhanvien'] ?></td>
    </tr>
    <tr>
        <th>Xe ô tô</th>
        <td class="cotSTT"><?php echo $row['oto'] ?></td>
    </tr>
    <tr>
        <th>Thời gian bảo hành</th>
        <td class="cotSTT"><?php echo $row['thoigianbaohanh'] ?></td>
    </tr>
  </table>
  <div class="footer-left"> Tổng tiền<br/>
  <?php echo $row['tongtien'] ?> VND </div>
  <div class="footer-right"> Ngày tạo hợp đồng<br/>
  <?php echo $row['ngaytao'] ?> </div>
</div>
</body>
