<?php
 require 'lib/course.php';
 $role = get_all_roles();

// Nếu người dùng submit form
if (!empty($_POST['add_course']))
{
    // Lay data
    $data['tenKhoaHoc']         = isset($_POST['course']) ? $_POST['course'] : '';
    $data['hocPhi']         = isset($_POST['tuition']) ? $_POST['tuition'] : '';
    $data['noiDung']         = isset($_POST['cont']) ? $_POST['cont'] : '';
    $data['anh']          = isset($_POST['pic']) ? $_POST['pic'] : '';
    
    // Validate thong tin
    $errors = array();  
    if (empty($data['tenKhoaHoc'])){
        $errors['tenKhoaHoc'] = 'Chưa nhập tên khóa học';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_course($data['tenKhoaHoc'],$data['hocPhi'],$data['noiDung'], $data['anh']);
        // Trở về trang danh sách
        header("location: course_list.php");
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm khóa học </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="chung.css">
    </head>
    <body style="background-color: #FFFAF5;">
        <h1>Thêm thông tin khóa học </h1>
        <button class="next"><a href="course_list.php">Trở về</a> <br/> <br/></button>
        <form method="post" action="course_add.php">
            <table width="100%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên khóa học</td>
                   <td> 
                    <input type="text" name="course" value="<?php 
                            echo !empty($data['tenKhoaHoc']) ? $data['tenKhoaHoc'] : ''; ?>"
                        />
                        <?php if (!empty($errors['tenKhoaHoc'])) echo $errors['tenKhoaHoc']; ?>
                        </td>
                </tr>

                <tr>
                    <td>Học phí</td>
                   <td> 
                    <input type="text" name="tuition" value="<?php 
                            echo !empty($data['hocPhi']) ? $data['hocPhi'] : ''; ?>"
                        />
                        <?php if (!empty($errors['ngaySinh'])) echo $errors['ngaySinh']; ?>
                        </td>
                </tr>

                <tr>
                    <td>Nội dung</td>
                   <td> 
                   <input type="text" name="cont" value="<?php 
                            echo !empty($data['noiDung']) ? $data['noiDung'] : ''; ?>"
                        />
                        <?php if (!empty($errors['noiDung'])) echo $errors['noiDung']; ?>
                        </td>
                </tr>
                <tr>
                    <td>Ảnh khóa học</td>
                   <td> 
                   <input type="text" name="pic" value="<?php 
                            echo !empty($data['anh']) ? $data['anh'] : ''; ?>"
                        />
                        <?php if (!empty($errors['anh'])) echo $errors['anh']; ?>
                    </td>
                </tr>
                <td></td>
                    <td>
                        <input class="luu" type="submit" name="add_course" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>