<?php
 require 'lib/qlgv.php';

// Nếu người dùng submit form
if (!empty($_POST['add_giangvien']))
{
    // Lay data
    $data['tenGiangVien']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['email']          = isset($_POST['email']) ? $_POST['email'] : '';
    $data['ngaySinh']          = isset($_POST['birth']) ? $_POST['birth'] : '';
    $data['chuyenNganh']    = isset($_POST['mon']) ? $_POST['mon'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['tenGiangVien'])){
        $errors['tenGiangVien'] = 'Chưa nhập tên giảng viên ';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_giangvien($data['tenGiangVien'], $data['email'], $data['ngaySinh'], $data['chuyenNganh']);
        // Trở về trang danh sách
        header("location: qlgv_list.php");
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm giảng viên </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="chung.css">
    </head>
    <body style="background-color: #FFFAF5;">
        <h1>Thêm thông tin giảng viên </h1>
        <button class="next"><a href="qlgv_list.php">Trở về</a> <br/> <br/></button>
        <form method="post" action="qlgv_add.php">
            <table width="100%" border="1" cellspacing="0" cellpadding="10">

                <tr>
                    <td>Tên giảng viên</td>
                   <td> 
                    <input type="text" name="name" value="<?php 
                            echo !empty($data['tenGiangVien']) ? $data['tenGiangVien'] : ''; ?>"
                        />
                        <?php if (!empty($errors['tenGiangVien'])) echo $errors['tenGiangVien']; ?>
                        </td>
                </tr>

                <tr>
                    <td>Email</td>
                   <td> 
                    <input type="text" name="email" value="<?php 
                            echo !empty($data['email']) ? $data['email'] : ''; ?>"
                        />
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                        </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                   <td> 
                    <input type="text" name="birth" value="<?php 
                            echo !empty($data['ngaySinh']) ? $data['ngaySinh'] : ''; ?>"
                        />
                        <?php if (!empty($errors['ngaySinh'])) echo $errors['ngaySinh']; ?>
                        </td>
                </tr>
                <tr>
                    <td>Chuyên ngành</td>
                   <td> 
                    <input type="text" name="mon" value="<?php 
                            echo !empty($data['chuyenNganh']) ? $data['chuyenNganh'] : ''; ?>"
                        />
                        <?php if (!empty($errors['chuyenNganh'])) echo $errors['chuyenNganh']; ?>
                        </td>
                </tr>
                <td></td>
                    <td>
                        <input class="luu" type="submit" name="add_giangvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>