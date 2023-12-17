<?php
 
require 'lib/course.php';
$role = get_all_roles();
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['maKhoaHoc']) ? (int)$_GET['maKhoaHoc'] : '';
if ($id){
    $data = get_course($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy nhân viên cần sửa
if (!$data){
   header("location: course_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_course']))
{
    // Lay data
    $data['tenKhoaHoc']         = isset($_POST['course']) ? $_POST['course'] : '';
    $data['hocPhi']         = isset($_POST['tuition']) ? $_POST['tuition'] : '';
    $data['noiDung']         = isset($_POST['cont']) ? $_POST['cont'] : '';
    $data['anh']          = isset($_POST['pic']) ? $_POST['pic'] : '';
    $data['maKhoaHoc']         = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Validate thong tin
    $errors = array();
    if (empty($data['tenKhoaHoc'])){
        $errors['tenKhoaHoc'] = 'Chưa nhập tên khóa học';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        edit_course($data['maKhoaHoc'], $data['tenKhoaHoc'],$data['hocPhi'],$data['noiDung'], $data['anh']);
        // Trở về trang danh sách
        header("location: course_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa khóa học</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="chung.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body style="">
        
    <div class="tren">
<span>    <i class="fa fa-bookmark" aria-hidden="true"></i><a href="#">Trang chủ</a> </span> <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="qlgv_list.php">Quản lý khóa học</a></span><i class="fa fa-chevron-right" aria-hidden="true"></i> <span>Edit</span>
    </div>
        <div class="formsua" style="margin:5% 20%;padding: 30px ;  border: 2px solid black; text-align: ; background-color: var(--color4);" >
        <h1 style="text-align: center">Sửa khóa học </h1>
            <form method="post" action="course_edit.php?maKhoaHoc=<?php echo $data['maKhoaHoc']; ?>">
            <table width="80%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td><b>Tên khóa học</b></td>
                    <td>
                        <input type="text" name="course" value="<?php echo $data['tenKhoaHoc']; ?>"/>
                        <?php if (!empty($errors['tenKhoaHoc'])) echo $errors['tenKhoaHoc'] ;?>
                </tr>
                <tr>
                    <td><b>Học phí</b></td>
                    <td>
                        <input type="text" name="tuition" value="<?php echo $data['hocPhi']; ?>"/>
                        <?php if (!empty($errors['hocPhi'])) echo $errors['hocPhi'] ;?>
                </tr>
                <tr>
                    <td><b>Nội dung</b></td>
                    <td>
                        <input type="text" name="cont" value="<?php echo $data['noiDung']; ?>"/>
                        <?php if (!empty($errors['noiDung'])) echo $errors['noiDung'] ;?>
                </tr>
                <tr>
                    <td><b>Ảnh khóa học</b></td>
                    <td>
                        <input type="text" name="pic" value="<?php echo $data['anh']; ?>"/>
                        <?php if (!empty($errors['anh'])) echo $errors['anh'] ;?>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['maKhoaHoc']; ?>"/>
                        <input class="luu" type="submit" name="edit_course" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        
    </body>
</html>