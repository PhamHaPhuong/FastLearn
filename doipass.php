<?php

require 'connect.php';

if(isset($_POST['doimatkhau'])) {
    $user = $_POST['user'];
    $matkhau_cu = $_POST['password_cu'];
    $matkhau_moi = $_POST['password_moi']; 
    $matkhau_moi2 = $_POST['password_moi2'];
    $sql = "SELECT * FROM user WHERE hoTen ='".$user." 'AND password='".$matkhau_cu."' LIMIT 1 ";
    $row = mysqli_query($conn, $sql)->fetch_assoc();
    
    if($row>0) {
        mysqli_query($conn ,"UPDATE hoho SET password = '".$matkhau_moi."' WHERE user ='".$user."'");
        
        echo 'mật khẩu đã được thay đổi ';
    }else {
        echo 'toàn khoản hoặc mật khẩu cũ không đúng , vui lòng nhập lại ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title> ĐỔI PASS</title>

</head>
<body>
   <div class="container"> 
       <div class="row">
              <div class="col-6 offset-md-3">
                  <form action="doipass.php" method="post">
                     <h2 class="py-3 text-center text-uppercase"> ĐỔI MẬT KHẨU  </h2>
                        <div class="form-group"> 
                           <label for="user"> Tên Đăng Nhập </label>
                           <input type="text" name="user" class="form-control" id="user">
                        </div>
                        <div class="form-group"> 
                           <label for="password_cu"> Mật Khẩu Cũ </label>
                           <input type="text" name="password_cu" class="form-control" id="password_cu">
                        </div>
                        <div class="form-group"> 
                           <label for="password_moi"> Mật Khẩu Mới  </label>
                           <input type="text" name="password_moi" class="form-control" id="password_moi">
                        </div>
                        <div class="form-group"> 
                           <label for="password_moi2"> Nhập Lại Mật Khẩu Mới  </label>
                           <input type="text" name="password_moi2" class="form-control" id="password_moi2">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="doimatkhau" id="doimatkhau" value=" Cập Nhật Mật Khẩu " >
                    </form>
                </div>
       </div>
    </div>
</body>
</html>