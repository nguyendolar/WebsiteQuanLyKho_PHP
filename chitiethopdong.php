
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
            <?php if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT a.*,b.ten as 'loaihopdong',c.hoten as 'khachhang', d.hoten as 'nhanvien', e.ten as 'oto' FROM hopdong as a,loaihopdong as b, khachhang as c, nhanvien as d, oto as e WHERE a.loaihopdong_id = b.id AND a.khachhang_id = c.id AND a.nhanvien_id = d.id AND a.oto_id = e.id AND a.id ='{$id}'";
                $result = mysqli_query($connect, $query);
                $arUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } ?>
            <main>
            <div class="container-fluid px-4">
        <h4 class="mt-4">HỢP ĐỒNG HD_<?php echo $arUser['id'] ?> </h4>
        <h6 class="mt-4 mb-3">Ngày tạo : <?php echo $arUser['ngaytao'] ?> </h6>
        <div class="card mb-4">
            <div class="card-body">
            <div class="col">
                        <div class="row">
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Loại hợp đồng:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo $arUser['loaihopdong'] ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Khách hàng:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo $arUser['khachhang'] ?>" readonly>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Nhân viên phụ trách:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo $arUser['nhanvien'] ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Xe ô tô:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo $arUser['oto'] ?>" readonly>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Thời gian bảo hành:</label>
                            <input type="text" class="form-control" id="category-film" name="baohanh" value="<?php echo $arUser['thoigianbaohanh'] ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Tổng tiền:</label>
                            <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo $arUser['tongtien'] ?> VND" readonly>
                        </div>
                        </div>
                    </div>
                    <a class="btn btn-warning" target="_blank" href="xuathopdong.php?id=<?php echo $arUser['id'] ?>">
                                                Xuất file pdf
                                    </a>
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