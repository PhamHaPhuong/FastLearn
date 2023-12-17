<?php
 
require 'lib/qlsv.php';
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['maSinhVien']) ? (int)$_GET['maSinhVien'] : '';
if ($id){
    $data = get_sinhvien($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy nhân viên cần sửa
if (!$data){
   header("location: qlsv_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_sinhvien']))
{
    // Lay data
    $data['tenSinhVien']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['ngaySinh']         = isset($_POST['birth']) ? $_POST['birth'] : '';
    $data['email']    = isset($_POST['email']) ? $_POST['email'] : '';
    $data['maSinhVien']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Validate thong tin
    $errors = array();

    if (empty($data['tenSinhVien'])){
        $errors['tenSinhVien'] = 'Chưa nhập tên sinh viên';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        edit_sinhvien($data['maSinhVien'], $data['tenSinhVien'], $data['ngaySinh'], $data['email']);
        // Trở về trang danh sách
        header("location: qlsv_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="chung.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body style="">
        
    <div class="tren">
<span>    <i class="fa fa-bookmark" aria-hidden="true"></i><a href="#">Trang chủ</a> </span> <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="qlgv_list.php">Quản lý giảng viên</a></span><i class="fa fa-chevron-right" aria-hidden="true"></i> <span>Edit</span>
    </div>
        <div class="formsua" style="margin:5% 20%;padding: 30px ;  border: 2px solid black; text-align: ; background-color: var(--color4);" >
        <h1 style="text-align: center">Sửa sinh viên </h1>
            <form method="post" action="qlsv_edit.php?maSinhVien=<?php echo $data['maSinhVien']; ?>">
            <table width="80%" border="1" cellspacing="0" cellpadding="10">
                
                <tr>
                    <td><b>Tên sinh viên</b></td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['tenSinhVien']; ?>"/>
                        <?php if (!empty($errors['tenSinhVien'])) echo $errors['tenSinhVien'] ;?>
                </tr>
                <tr>
                    <td><b>Ngày sinh</b></td>
                    <td>
                        <input type="text" name="birth" value="<?php echo $data['ngaySinh']; ?>"/>
                        <?php if (!empty($errors['ngaySinh'])) echo $errors['ngaySinh'] ;?>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>
                        <input type="text" name="email" value="<?php echo $data['email']; ?>"/>
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['maSinhVien']; ?>"/>
                        <input class="luu" type="submit" name="edit_sinhvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        
    </body>
</html>