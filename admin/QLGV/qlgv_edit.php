<?php
 
require 'lib/qlgv.php';
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['maGiangVien']) ? (int)$_GET['maGiangVien'] : '';
if ($id){
    $data = get_giangvien($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy nhân viên cần sửa
if (!$data){
   header("location: qlgv_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_giangvien']))
{
    // Lay data
    $data['tenGiangVien']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['email']    = isset($_POST['email']) ? $_POST['email'] : '';
    $data['ngaySinh']          = isset($_POST['birth']) ? $_POST['birth'] : '';
    $data['chuyenNganh']          = isset($_POST['mon']) ? $_POST['mon'] : '';
    $data['maGiangVien']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Validate thong tin
    $errors = array();
    
    if (empty($data['tenGiangVien'])){
        $errors['tenGiangVien'] = 'Chưa nhập tên giảng viên';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        edit_giangvien($data['maGiangVien'], $data['tenGiangVien'], $data['email'], $data['ngaySinh'], $data['chuyenNganh']);
        // Trở về trang danh sách
        header("location: qlgv_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa giảng viên</title>
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
        <h1 style="text-align: center">Sửa giảng viên </h1>
            <form method="post" action="qlgv_edit.php?maGiangVien=<?php echo $data['maGiangVien']; ?>">
            <table width="80%" border="1" cellspacing="0" cellpadding="10">
               
                <tr>
                    <td><b>Tên giảng viên</b></td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['tenGiangVien']; ?>"/>
                        <?php if (!empty($errors['tenGiangVien'])) echo $errors['tenGiangVien'] ;?>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>
                        <input type="text" name="email" value="<?php echo $data['email']; ?>"/>
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Ngày sinh</b></td>
                    <td>
                        <input type="text" name="birth" value="<?php echo $data['ngaySinh']; ?>"/>
                        <?php if (!empty($errors['ngaySinh'])) echo $errors['ngaySinh']; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Chuyên ngành</b></td>
                    <td>
                        <input type="text" name="mon" value="<?php echo $data['chuyenNganh']; ?>"/>
                        <?php if (!empty($errors['chuyenNganh'])) echo $errors['chuyenNganh']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['maGiangVien']; ?>"/>
                        <input class="luu" type="submit" name="edit_giangvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        
    </body>
</html>