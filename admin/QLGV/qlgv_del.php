<?php require 'lib/qlgv.php';
 
// Thực hiện xóa
$id = isset($_POST['maGiangVien']) ? (int)$_POST['maGiangVien'] : '';
if ($id){
    delete_giangvien( $id );
}
 

 
// Trở về trang danh sách
header("location: qlgv_list.php");
?>  

<?php echo $data ?>
