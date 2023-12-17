<?php
 require 'lib/qlsv.php';

// Nếu người dùng submit form
if (!empty($_POST['add_sinhvien']))
{
    // Lay data
    $data['tenSinhVien']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['ngaySinh']         = isset($_POST['birth']) ? $_POST['birth'] : '';
    $data['email']          = isset($_POST['email']) ? $_POST['email'] : '';
    
    // Validate thong tin
    $errors = array();

    if (empty($data['tenSinhVien'])){
        $errors['tenSinhVien'] = 'Chưa nhập tên sinh viên ';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_sinhvien($data['tenSinhVien'], $data['ngaySinh'], $data['email']);
        // Trở về trang danh sách
        header("location: qlsv_list.php");
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh viên </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="chung.css">
    </head>
    <body style="background-color: #FFFAF5;">
        <h1>Thêm thông tin sinh viên </h1>
        <button class="next"><a href="qlsv_list.php">Trở về</a> <br/> <br/></button>
        <form method="post" action="qlsv_add.php">
            <table width="100%" border="1" cellspacing="0" cellpadding="10">
               
                <tr>
                    <td>Tên sinh viên</td>
                   <td> 
                    <input type="text" name="name" value="<?php 
                            echo !empty($data['tenSinhVien']) ? $data['tenSinhVien'] : ''; ?>"
                        />
                        <?php if (!empty($errors['tenSinhVien'])) echo $errors['tenSinhVien']; ?>
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
                    <td>Email</td>
                   <td> 
                    <input type="text" name="email" value="<?php 
                            echo !empty($data['email']) ? $data['email'] : ''; ?>"
                        />
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                        </td>
                </tr>
            
                <td></td>
                    <td>
                        <input class="luu" type="submit" name="add_sinhvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>