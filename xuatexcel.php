<?php

require('Classes/PHPExcel.php');
require('inc/connect.php');


if(isset($_POST['xuatexcel']))
{
//Khởi tạo đối tượng

$excel = new PHPExcel();

//Chọn trang cần ghi (là số từ 0->n)

$excel->setActiveSheetIndex(0);

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);

$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);



//Xét in đậm cho khoảng cột

$excel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);

$excel->getActiveSheet()->setCellValue('A1', 'Mã hợp đồng');

$excel->getActiveSheet()->setCellValue('B1', 'Loại hợp đồng');

$excel->getActiveSheet()->setCellValue('C1', 'Khách hàng');

$excel->getActiveSheet()->setCellValue('D1', 'Nhân viên phụ trách');

$excel->getActiveSheet()->setCellValue('E1', 'Xe ô tô');

$excel->getActiveSheet()->setCellValue('F1', 'Ngày tạo');

$excel->getActiveSheet()->setCellValue('G1', 'Thời gian bảo hành');

$excel->getActiveSheet()->setCellValue('H1', 'Tổng tiền');

$query = "SELECT a.*,b.ten as 'loaihopdong',c.hoten as 'khachhang', d.hoten as 'nhanvien', e.ten as 'oto' FROM hopdong as a,loaihopdong as b, khachhang as c, nhanvien as d, oto as e WHERE a.loaihopdong_id = b.id AND a.khachhang_id = c.id AND a.nhanvien_id = d.id AND a.oto_id = e.id ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$numRow = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $excel->getActiveSheet()->setCellValue('A' . $numRow, 'HD_'.$row['id']);

    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['loaihopdong']);

    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['khachhang']);

    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['nhanvien']);

    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['oto']);

    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['ngaytao']);

    $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['thoigianbaohanh']);

    $excel->getActiveSheet()->setCellValue('H' . $numRow, $row['tongtien'].' VND');

    $numRow++;

}
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('hopdong.xlsx');
header('Content-type: application/vnd.ms-excel');

header('Content-Disposition: attachment; filename="hopdong.xls"');
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
}

?>