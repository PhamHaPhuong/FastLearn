<?php

require 'connect.php';

if(isset($_POST['doimatkhau'])) {
    $hoTen = $_POST['hoTen'];
    $matkhau_cu = md5($_POST['matkhau_cu']);
    $matkhau_moi = md5($_POST['matkhau_moi']); 
    $matkhau_moi2 = md5($_POST['matkhau_moi2']);
    $sql = "SELECT * FROM user WHERE hoTen='".$hoTen." 'AND matkhau='".$matkhau_cu."' LIMIT 1 ";
    $row = mysqli_query($conn, $sql)->fetch_assoc();
    
    if($row>0) {
        mysqli_query($conn ,"UPDATE user SET matkhau = '".$matkhau_moi."' WHERE hoTen ='".$hoTen."'");
        
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
                           <label for="hoTen"> Tên Đăng Nhập </label>
                           <input type="text" name="hoTen" class="form-control" id="hoTen">
                        </div>
                        <div class="form-group"> 
                           <label for="matkhau_cu"> Mật Khẩu Cũ </label>
                           <input type="text" name="matkhau_cu" class="form-control" id="matkhau_cu" placeholder="Mật khẩu"
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
                            title="Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt." required><br><br>
                        </div>
                        <div class="form-group"> 
                           <label for="matkhau_moi"> Mật Khẩu Mới  </label>
                           <input type="text" name="matkhau_moi" class="form-control" id="matkhau_moi"  placeholder="Mật khẩu"
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
                            title="Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt." required><br><br>
                        </div>
                        <div class="form-group"> 
                           <label for="matkhau_moi2"> Nhập Lại Mật Khẩu Mới  </label>
                           <input type="text" name="matkhau_moi2" class="form-control" id="matkhau_moi2"  placeholder="Mật khẩu"
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
                            title="Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt." required><br><br>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="doimatkhau" id="doimatkhau" value=" Cập Nhật Mật Khẩu " >
                    </form>
                </div>
       </div>
    </div>
</body>
</html>

