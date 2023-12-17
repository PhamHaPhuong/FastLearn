<?php
 
require 'lib/acc.php';
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['email']) ? (int)$_GET['email'] : '';
if ($id){
    $data = get_acc($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy nhân viên cần sửa
if (!$data){
   header("location: acc_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_acc']))
{
    // Lay data
    $data['hoTen']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['matkhau']         = isset($_POST['pass']) ? $_POST['pass'] : '';
    $data['roler']         = isset($_POST['roler']) ? $_POST['roler'] : '';
    $data['email']         = isset($_POST['email']) ? $_POST['email'] : '';
     
    // Validate thong tin
    $errors = array();
    if (empty($data['hoTen'])){
        $errors['hoTen'] = 'Chưa nhập tên tài khoản';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        edit_acc($data['hoTen'], $data['email'],$data['matkhau'],$data['roler']);
        // Trở về trang danh sách
        header("location: acc_list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa tài khoản</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="chung.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body style="">
        
    <div class="tren">
<span>    <i class="fa fa-bookmark" aria-hidden="true"></i><a href="#">Trang chủ</a> </span> <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="acc_list.php">Quản lý tài khoản</a></span><i class="fa fa-chevron-right" aria-hidden="true"></i> <span>Edit</span>
    </div>
        <div class="formsua" style="margin:5% 20%;padding: 30px ;  border: 2px solid black; text-align: ; background-color: var(--color4);" >
        <h1 style="text-align: center">Sửa tài khoản</h1>
            <form method="post" action="acc_edit.php?email=<?php echo $data['email']; ?>">
            <table width="80%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td><b>Tên người dùng</b></td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['hoTen']; ?>"/>
                        <?php if (!empty($errors['hoTen'])) echo $errors['hoTen'] ;?>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>
                        <input type="text" name="email" value="<?php echo $data['email']; ?>"/>
                        <?php if (!empty($errors['email'])) echo $errors['email'] ;?>
                </tr>
                <tr>
                    <td><b>Mật khẩu</b></td>
                    <td>
                        <input type="text" name="pass" value="<?php echo $data['matkhau']; ?>"/>
                        <?php if (!empty($errors['matkhau'])) echo $errors['matkhau'] ;?>
                </tr>
                <tr>
                    <td><b>Vai trò</b></td>
                    <td>
                        <input type="text" name="roler" value="<?php echo $data['roler']; ?>"/>
                        <?php if (!empty($errors['roler'])) echo $errors['roler'] ;?>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['email']; ?>"/>
                        <input class="luu" type="submit" name="edit_acc" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        
    </body>
</html>