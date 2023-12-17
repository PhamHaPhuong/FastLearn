<?php require 'lib/qlsv.php';
 
// Thực hiện xóa
$id = isset($_POST['maSinhVien']) ? (int)$_POST['maSinhVien'] : '';
if ($id){
    delete_sinhvien( $id );
}
 

 
// Trở về trang danh sách
header("location: qlsv_list.php");
?>  

<?php echo $data ?>
