<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> File </title>
</head>
<body>
    <?php
    session_start();
    include("connect.php");
    // Kiểm tra nếu có file được tải lên
    if(isset($_FILES['file'])){
        $file = $_FILES['file'];
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];

        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_extensions = array("jpg", "jpeg", "png", "gif", "doc", "docx");
        // Hiển thị ảnh đã được tải lên
        if(in_array($file_extension, $allowed_extensions)){
            if($file_size <= 5242880){ // 5MB
                $email = $_SESSION['email'];
                $new_file_name = time() . "." . $file_extension;
                $upload_path = "anh/"; // Thay đổi đường dẫn này thành đường dẫn bạn muốn lưu file lên server
                if(in_array($file_extension, array("jpg", "jpeg", "png", "gif"))){
                    echo "<img width='200px' src=\"$upload_path$new_file_name\">";
                }
                if(move_uploaded_file($file_tmp, $upload_path.$new_file_name)){
                 
                    // Truy vấn dữ liệu từ bảng "user"
                    // $sql = "SELECT * FROM sinhvien ORDER BY sinhvien.maSinhvien DESC LIMIT  ";
                    $sql = "SELECT maGiangVien From giangvien Where email = '".$email."'";
                    $result = $conn->query($sql);
                    if ($result) {
                        $row = $result ->fetch_assoc();
                        $sql = "INSERT INTO tailieu values(null,'Test',".$row["maGiangVien"].",1,'"."/FastLearn/".$upload_path.$new_file_name."','".$file_extension."')";
                        $result = $conn->query($sql);

                        // Hiển thị dữ liệu ra màn hình
                        if ($result) {
                            echo "File đã được tải lên thành công.";
                        
                        } else {
                            echo "Có lỗi xảy ra khi tải lên file.";
                        }
                    
                    } else {
                        echo "Có lỗi xảy ra khi tải lên file.";
                    }
                    
                }else{
                    echo "Có lỗi xảy ra khi tải lên file.";
                }
            }else{
                echo "Kích thước file quá lớn. Vui lòng chọn file nhỏ hơn 5MB.";
            }
        }else{
            echo "Chỉ được chọn hình ảnh hoặc tập tin Word.";
        }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload"> <br>

        Chân phải bước tới cha <br>
        Chân trái bước tới mẹ <br>
        Cao đo nỗi buồn <br>
        Xa nuôi chí lớn
</body>
</html>