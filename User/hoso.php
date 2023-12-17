<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "bt60";      // Khai báo database

// Kết nối database tintuc
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$tenSinhVien = "";
$ngaySinh = "";
$email = "";


//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["tenSinhVien"])) { $tenSinhVien = $_POST['tenSinhVien']; }
    if(isset($_POST["ngaySinh"])) { $ngaySinh = $_POST['ngaySinh']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO sinhvien (tenSinhVien, ngaySinh, email )
    VALUES ('$tenSinhVien', '$ngaySinh', '$email')";

    if (mysqli_query($connect, $sql)) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

//Đóng database
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title> Dữ liệu của sinh viên </title>

</head>
<body>
<div class="container"> 
       <div class="row">
              <div class="col-6 offset-md-3">
                  <form id="" class="bg-light p-4 my-3" action="" method="post">
                     <h2 class="py-3 text-center text-uppercase">Hồ Sơ Học Viên </h2>
                        <div class="form-group"> 
                           <label for="fname"> Họ Tên </label>
                           <input type="text" name="tenSinhVien" class="form-control" id="tenSinhVien">
                        </div>
                        <div class="form-group"> 
                           <label for="ngaySinh"> Ngày Sinh  </label>
                           <input type="date" name="ngaySinh" class="form-control" id="ngaySinh">
                         </div>
                        <div class="form-group"> 
                           <label for=""> Giới Tính</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gioitinh" checked 
                                        id="" value="gioitinh">
                                        <label class="form-check-label" for="nam"> Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="nữ"
                                        value="nữ">
                                        <label class="form-check-label" for="nữ"> Nữ</label>

                                    </div>
                                </div>
                        
                        </div>
                        <div class="form-group"> 
                           <label for="email"> Email </label>
                           <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="btn-reg" value="Tạo Hồ Sơ" >
                    </form>
                </div>
       </div>
</div>
</form>
</body>
</html>