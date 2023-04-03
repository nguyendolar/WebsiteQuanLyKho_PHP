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
            <?php 
		$hopdong = mysqli_num_rows($connect->query("SELECT * FROM hopdong"));
		$oto = mysqli_num_rows($connect->query("SELECT * FROM oto"));
		$khachhang= mysqli_num_rows($connect->query("SELECT * FROM khachhang"));
		$nhanvien= mysqli_num_rows($connect->query("SELECT * FROM nhanvien"));
    $q1 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 1"));
		$d1=$q1['total'];
    $q2 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 2"));
		$d2=$q2['total'];
    $q3 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 3"));
		$d3=$q3['total'];
    $q4 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 4"));
		$d4=$q4['total'];
    $q5 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 5"));
		$d5=$q5['total'];
    $q6 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 6"));
		$d6=$q6['total'];
    $q7 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 7"));
		$d7=$q7['total'];
    $q8 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 8"));
		$d8=$q8['total'];
    $q9 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 9"));
		$d9=$q9['total'];
    $q10 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 10"));
		$d10=$q10['total'];
    $q11 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 11"));
		$d11=$q11['total'];
    $q12 = mysqli_fetch_assoc($connect->query("SELECT SUM(tongtien) as 'total' FROM `hopdong` WHERE MONTH(ngaytao) = 12"));
		$d12=$q12['total'];
		?>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"></li>
</ol>
<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
      <div class="card-body">Số lượng xe ô tô: <strong><?php echo $oto ?></strong> </div>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="oto.php">Xem chi tiết</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-warning text-white mb-4">
      <div class="card-body">Số lượng khách hàng : <strong><?php echo $khachhang ?></strong> </div>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="khachhang.php">Xem chi tiết</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-success text-white mb-4">
      <div class="card-body">Số lượng nhân viên : <strong><?php echo $nhanvien ?></strong></div>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="nhanvien.php">Xem chi tiết</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-danger text-white mb-4">
      <div class="card-body">Số lượng hợp đồng : <strong><?php echo $hopdong ?></strong> </div>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="hopdong.php">Xem chi tiết</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-lg-12">
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-chart-bar me-1"></i>
    Doanh thu mỗi tháng
  </div>
  <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>

</div>
</div>
<p style="display:none" id="m1"><?php echo $d1 ?></p>
<p style="display:none" id="m2" ><?php echo $d2 ?></p>
<p style="display:none" id="m3" ><?php echo $d3 ?></p>
<p style="display:none" id="m4" ><?php echo $d4 ?></p>
<p style="display:none" id="m5" ><?php echo $d5 ?></p>
<p style="display:none" id="m6" ><?php echo $d6 ?></p>
<p style="display:none" id="m7" ><?php echo $d7 ?></p>
<p style="display:none" id="m8" ><?php echo $d8 ?></p>
<p style="display:none" id="m9" ><?php echo $d9 ?></p>
<p style="display:none" id="m10" ><?php echo $d10 ?></p>
<p style="display:none" id="m11" ><?php echo $d11 ?></p>
<p style="display:none" id="m12"><?php echo $d12 ?></p>
</main>
            </main>
            <?php include('inc/footer.php')?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
                     <?php 
                    if (isset($_GET['msg'])) {?>
                        <script>
                        function Redirect() {
                        window.location = 'index.php';
                        }
                        alert('Đăng nhập thành công !') 
                        Redirect()
                    </script>
                   <?php } ?>
</body>

</html>