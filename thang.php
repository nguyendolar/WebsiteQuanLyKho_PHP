
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('inc/head.php')?>
</head>

<body class="sb-nav-fixed">
<?php include('inc/header.php')?>
    <div id="layoutSidenav">
    <?php include('inc/menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-6 mt-4">
                        <div class="card-header">
                        <form method="POST" action="" class="register-form" id="register-form">
                        <div class="row" style="justify-content:space-around !important">
                        <div class="col-3">
                            <input type="text" class="form-control" value="Chọn tháng muốn xem" disabled/>
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" min="1" max="12" name="ngay" required >
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success" name="thongke" >
                                Xem
                            </button>
                        </div>
                    </div>
                </form>
                            
                        </div>
                        <div class="card-body mt-4">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                        <th>Mã hợp đồng</th>
                                        <th>Loại hợp đồng</th>
                                        <th>Khách hàng</th>
                                        <th>Nhân viên phụ trách</th>
                                        <th>Xe ô tô</th>
                                        <th>Ngày tạo</th>
                                        <th>Thời gian bảo hành</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Mã hợp đồng</th>
                                        <th>Loại hợp đồng</th>
                                        <th>Khách hàng</th>
                                        <th>Nhân viên phụ trách</th>
                                        <th>Xe ô tô</th>
                                        <th>Ngày tạo</th>
                                        <th>Thời gian bảo hành</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                if(isset($_POST['thongke'])){
                                    $ngay = $_POST['ngay'];
                                    $sum = 0;
                                    $query = "SELECT a.*,b.ten as 'loaihopdong',c.hoten as 'khachhang', d.hoten as 'nhanvien', e.ten as 'oto' FROM hopdong as a,loaihopdong as b, khachhang as c, nhanvien as d, oto as e WHERE a.loaihopdong_id = b.id AND a.khachhang_id = c.id AND a.nhanvien_id = d.id AND a.oto_id = e.id AND MONTH(ngaytao) = '{$ngay}' ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td>HD_<?php echo $arUser["id"] ?></td>
                                        <td><?php echo $arUser["loaihopdong"] ?></td>
                                        <td><?php echo $arUser["khachhang"] ?> </td>
                                        <td><?php echo $arUser["nhanvien"] ?> </td>
                                        <td><?php echo $arUser["oto"] ?></td>
                                        <td><?php echo $arUser["ngaytao"] ?></td>
                                        <td><?php echo $arUser["thoigianbaohanh"] ?></td>
                                        <td><?php echo $arUser["tongtien"] ?> VND</td>
                                    </tr>
                                    
                                    <!-- Modal Update-->
                                    <?php $sum = $sum + $arUser["tongtien"];} echo "<h4>Danh sách doanh thu tháng ".$ngay."_____________________Tổng doanh thu : ".$sum." VND</h4>";} ?>
                                    
                                    
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('inc/footer.php')?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>