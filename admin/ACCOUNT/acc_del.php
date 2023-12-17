<?php require 'lib/acc.php';
 
// Thực hiện xóa
$id = isset($_POST['email']) ? (int)$_POST['email'] : '';
if ($id){
    delete_acc( $id );
}
 

 
// Trở về trang danh sách
header("location: acc_list.php");
?>  

<?php echo $data ?>
