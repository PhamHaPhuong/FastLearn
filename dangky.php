<?php 
   include"connect.php";
   
   if(isset($_POST['btn'])) {
   $hoTen = $_POST['hoTen'];
   $email = $_POST['email'];
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email không hợp lệ.";
    return;
}
   $matkhau = md5($_POST['matkhau']);
   $role = $_POST['role'];
   $sql= "INSERT INTO user ( hoTen, email, matkhau,role)
   VAlUES( '$hoTen' , '$email', '$matkhau', '$role');
   ";
   mysqli_query($conn, $sql);
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="dangky.css">
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="dangky.php" method="post">
    <div style="background-color: white;">
        <img style="margin-left: 3%;" src="anh/logo.png" alt="" width="5%" height="auto"> 
    </div>
    <div class="con2" >
        <div style="background-color: white;padding: 0 5%;">
            
            <div style="border-bottom: 1px solid black ; text-align: center; padding: 20px 0;">
                <h2>ĐĂNG KÝ</h2><br>
                <h4>Tạo tài khoản của bạn.</h4>
            </div>
            <div>
                <div class="me" style="margin: 10px 47% 20px 3%;">
                    <input type="radio" id="sv" name="role">
                    <label  for="sinhvien">Sinh viên</label>
                </div>
            </div>
            <div class="hai" style="padding: 0 10% 30px 3%;">
                <input type="text" id="fname" name="hoTen" placeholder="Họ và tên"><br><br>
                <input type="text" name="email" id="fgt" placeholder=" Email của bạn "><br><br>
                
                <input type="password" id="fpass" name="matkhau" placeholder="Mật khẩu" 
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
                 title="Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt." required><br><br>
                <input type="password" id="flpass" name="matkhau" placeholder="Nhập lại mật khẩu"><br><br>
                <div style="font-size: 13px; text-align: center;">Bằng cách nhấp vào "Đăng ký", bạn đồng ý với <u>Điều khoản sử dụng</u> và <u>Chính sách quyền riêng tư</u> của chúng tôi .</div>
                
            </div>
<div style=" text-align: center;"><input style="margin: 0 0 30px 0; background-color: var(--color1); width: 150px; height: 30px; border: none; border-radius: 10px;" type="submit" name = "btn" value="Đăng nhập"></div>
            </div>
        </div>
        
    </div>
    </form>
    
</body>
</html>