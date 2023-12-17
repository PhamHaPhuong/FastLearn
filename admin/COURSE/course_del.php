<?php require 'lib/course.php';
 
// Thực hiện xóa
$id = isset($_POST['maKhoaHoc']) ? (int)$_POST['maKhoaHoc'] : '';
if ($id){
    delete_course( $id );
}
 

 
// Trở về trang danh sách
header("location: course_list.php");
?>  

<?php echo $data ?>
