<?php
 require 'lib/acc.php';
 $role = get_all_acc();

// Nếu người dùng submit form
if (!empty($_POST['add_acc']))
{
    // Lay data
    $data['hoTen']         = isset($_POST['name']) ? $_POST['name'] : '';
    $data['matkhau']         = isset($_POST['pass']) ? $_POST['pass'] : '';
    $data['roler']         = isset($_POST['roler']) ? $_POST['roler'] : '';
    
    // Validate thong tin
    $errors = array();  
    if (empty($data['hoTen'])){
        $errors['hoTen'] = 'Chưa nhập tên người dùng';
    }
    if (empty($data['matkhau'])){
        $errors['matkhau'] = 'Mật khẩu không được để trống';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_acc($data['hoTen'], $data['matkhau'],$data['roler']);
        // Trở về trang danh sách
        header("location: acc_list.php");
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm tài khoản</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="chung.css">
    </head>
    <body style="background-color: #FFFAF5;">
        <h1>Thêm thông tin tài khoản</h1>
        <button class="next"><a href="acc_list.php">Trở về</a> <br/> <br/></button>
        <form method="post" action="acc_add.php">
            <table width="100%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên tài khoản</td>
                   <td> 
                    <input type="text" name="name" value="<?php 
                            echo !empty($data['hoTen']) ? $data['hoTen'] : ''; ?>"
                        />
                        <?php if (!empty($errors['hoTen'])) echo $errors['hoTen']; ?>
                        </td>
                </tr>

                <tr>
                    <td>Mật khẩu</td>
                   <td> 
                    <input type="text" name="pass" value="<?php 
                            echo !empty($data['matkhau']) ? $data['matkhau'] : ''; ?>"
                        />
                        <?php if (!empty($errors['matkhau'])) echo $errors['matkhau']; ?>
                        </td>
                </tr>

                <tr>
                    <td>Vai trò</td>
                   <td> 
                   <input type="text" name="roler" value="<?php 
                            echo !empty($data['roler']) ? $data['roler'] : ''; ?>"
                        />
                        <?php if (!empty($errors['roler'])) echo $errors['roler']; ?>
                        </td>
                </tr>
            
                <td></td>
                    <td>
                        <input class="luu" type="submit" name="add_acc" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>