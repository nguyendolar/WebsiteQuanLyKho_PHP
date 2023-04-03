
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
                    <h1 class="mt-4">Danh sách hợp đồng</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                        <?php if (isset($_GET['msg'])){
                            if($_GET['msg'] == 1){ ?>
                             <div class="alert alert-success">
                                <strong>Thành công</strong>
                            </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">
                                <strong>Không thể xóa</strong>
                            </div>
                            <?php }  ?> 
                            <?php }  ?>   
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalAdd">
                                Thêm mới
                            </button>
                            <form action="xuatexcel.php" method="post">
                                    <button type="submit" style="margin-left : 110px;margin-top : -66px" class="btn btn-info" name="xuatexcel"> Xuất file excel</button>
                            </form>
                            
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                        <th>STT</th>
                                        <th>Mã hợp đồng</th>
                                        <th>Loại hợp đồng</th>
                                        <th>Khách hàng</th>
                                        <th>Nhân viên phụ trách</th>
                                        <th>Xe ô tô</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>STT</th>
                                    <th>Mã hợp đồng</th>
                                        <th>Loại hợp đồng</th>
                                        <th>Khách hàng</th>
                                        <th>Nhân viên phụ trách</th>
                                        <th>Xe ô tô</th>
                                        <th>Ngày tạo</th>
                                        <th style="width : 300px !important">Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                    $query = "SELECT a.*,b.ten as 'loaihopdong',c.hoten as 'khachhang', d.hoten as 'nhanvien', e.ten as 'oto' FROM hopdong as a,loaihopdong as b, khachhang as c, nhanvien as d, oto as e WHERE a.loaihopdong_id = b.id AND a.khachhang_id = c.id AND a.nhanvien_id = d.id AND a.oto_id = e.id ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelDel = "exampleModalDel".$arUser["id"] ;
                                        $idModelEdit = "exampleModalEdit".$arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td>HD_<?php echo $arUser["id"] ?></td>
                                        <td><?php echo $arUser["loaihopdong"] ?></td>
                                        <td><?php echo $arUser["khachhang"] ?> </td>
                                        <td><?php echo $arUser["nhanvien"] ?> </td>
                                        <td><?php echo $arUser["oto"] ?></td>
                                        <td><?php echo $arUser["ngaytao"] ?></td>
                                        <td style="width : 250px !important">
                                        <a class="btn btn-warning" href="chitiethopdong.php?id=<?php echo $arUser["id"] ?>">
                                                Chi tiết
                                    </a>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Cập nhập
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelDel ?>">
                                                Xóa
                                            </button>
                                            <!--Dele-->
                                            <div class="modal fade" id="<?php echo $idModelDel ?>" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa ?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Hợp đồng : HD_<?php echo $arUser["id"] ?>
                                                            <form action="function.php" method="post">
                                                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                                <div class="modal-footer" style="margin-top: 20px">
                                                                    <button style="width:100px" type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        Đóng
                                                                    </button>
                                                                    <button style="width:100px" type="submit" class="btn btn-danger" name="deletehd"> Xóa</button>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Dele-->
                                        </td>

                                    </tr>
                                    <!-- Modal Update-->
                                    <div class="modal fade" id="<?php echo $idModelEdit ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cập nhập</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST" >
                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                        <div class="col">
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Loại hợp đồng:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="loaihopdong" required>
                                                                    <option value="<?php echo $arUser["loaihopdong_id"] ?>" selected><?php echo $arUser["loaihopdong"] ?></option>
                                                                    <?php  
                                                                    $qrlhd = "SELECT * FROM loaihopdong";
                                                                    $rslhd = mysqli_query($connect, $qrlhd);
                                                                    while($arlhds = mysqli_fetch_array($rslhd, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arlhds['id'] ?>"><?php echo $arlhds['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Khách hàng:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="khachhang" required>
                                                                <option value="<?php echo $arUser["khachhang_id"] ?>" selected><?php echo $arUser["khachhang"] ?></option>
                                                                    <?php  
                                                                    $qrkh = "SELECT * FROM khachhang";
                                                                    $rskh = mysqli_query($connect, $qrkh);
                                                                    while($arkhs = mysqli_fetch_array($rskh, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arkhs['id'] ?>"><?php echo $arkhs['hoten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Nhân viên phụ trách:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="nhanvien" required>
                                                                <option value="<?php echo $arUser["nhanvien_id"] ?>" selected><?php echo $arUser["nhanvien"] ?></option>
                                                                    <?php  
                                                                    $qrnv = "SELECT * FROM nhanvien";
                                                                    $rsnv = mysqli_query($connect, $qrnv);
                                                                    while($arnvs = mysqli_fetch_array($rsnv, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arnvs['id'] ?>"><?php echo $arnvs['hoten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Xe ô tô:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="oto" required>
                                                                <option value="<?php echo $arUser["oto_id"] ?>" selected><?php echo $arUser["oto"] ?></option>
                                                                    <?php  
                                                                    $qroto = "SELECT * FROM oto";
                                                                    $rsoto = mysqli_query($connect, $qroto);
                                                                    while($arotos = mysqli_fetch_array($rsoto, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arotos['id'] ?>"><?php echo $arotos['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Thời gian bảo hành:</label>
                                                            <input type="text" class="form-control" id="category-film" name="baohanh" required value="<?php echo $arUser['thoigianbaohanh'] ?>">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Tổng tiền:</label>
                                                            <input type="number" class="form-control" id="category-film" name="tongtien" required value="<?php echo $arUser['tongtien'] ?>">
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="edithd">Lưu</button>
                                                </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    <?php $stt++;} ?>
                                    <!-- Modal Add-->
                                    <div class="modal fade" id="exampleModalAdd" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                    <div class="col">
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Loại hợp đồng:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="loaihopdong" required>
                                                                    <option value="" selected>Chọn loại hợp đồng</option>
                                                                    <?php  
                                                                    $qrlhd = "SELECT * FROM loaihopdong";
                                                                    $rslhd = mysqli_query($connect, $qrlhd);
                                                                    while($arlhd = mysqli_fetch_array($rslhd, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arlhd['id'] ?>"><?php echo $arlhd['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Khách hàng:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="khachhang" required>
                                                                    <option value="" selected>Chọn khách hàng</option>
                                                                    <?php  
                                                                    $qrkh = "SELECT * FROM khachhang";
                                                                    $rskh = mysqli_query($connect, $qrkh);
                                                                    while($arkh = mysqli_fetch_array($rskh, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arkh['id'] ?>"><?php echo $arkh['hoten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Nhân viên phụ trách:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="nhanvien" required>
                                                                    <option value="" selected>Chọn nhân viên phụ trách</option>
                                                                    <?php  
                                                                    $qrnv = "SELECT * FROM nhanvien";
                                                                    $rsnv = mysqli_query($connect, $qrnv);
                                                                    while($arnv = mysqli_fetch_array($rsnv, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arnv['id'] ?>"><?php echo $arnv['hoten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Xe ô tô:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="oto" required>
                                                                    <option value="" selected>Chọn xe ô tô</option>
                                                                    <?php  
                                                                    $qroto = "SELECT * FROM oto";
                                                                    $rsoto = mysqli_query($connect, $qroto);
                                                                    while($aroto = mysqli_fetch_array($rsoto, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $aroto['id'] ?>"><?php echo $aroto['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Thời gian bảo hành:</label>
                                                            <input type="text" class="form-control" id="category-film" name="baohanh" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Tổng tiền:</label>
                                                            <input type="number" class="form-control" id="category-film" name="tongtien" required>
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="addhd">Lưu </button>
                                                </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    

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