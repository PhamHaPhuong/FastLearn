<?php 
session_start();

include "connect.php";


if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ.";
        return;
    }
    $matkhau = md5($_POST['matkhau']);
    $sql = "SELECT * FROM user WHERE email='$email'and matkhau= '$matkhau' ";

    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if(mysqli_num_rows($result)== 1) {
        $_SESSION['email'] = $email;
        $role=$row['role'];
        if($role== 2){
            header("location:admin/home.php");
        }
        if($role == 1) {
            header("location:Teacher/home.php");
        }
        if($role == 0){
          header("location:User/khoahoccuatoi.php");
        }

    }else {
       echo "tài khoản hoặc mật khẩu sai ";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div style="background-color: white;">
        <img style="margin-left: 3%;" src="anh/logo.png" alt="" width="5%" height="auto"> 
    </div>
    <div class="con2">
        <div style="color:red; background-color: white; padding: 50px 0;border: 1px solid black;" >
            <form action="login.php" method="post" id="form1">
                <div style="padding: 0 5% ; border-bottom: 1px solid black;">
                <h2>Đăng nhập</h2><br>
                <h4>Đăng nhập vào tài khoản của bạn</h4>
                <br><br>
                <div>
                    <div >
                    <i class="fa fa-home" aria-hidden="true"></i>
                    
                </div><br>

                <input style="width:100%; height: 40px;" type="text" id="name" name="email" placeholder="email của bạn "><br><br>
                <input type="password" id="fpass" name="matkhau" placeholder="Mật khẩu" 
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"
                 title="Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt." required><br><br>
                <input style="width: 20px; float: left;" type="checkbox" name="fcheck" id="fcheck"><span style="font-size: 13px; float: left;">Tự động đăng nhập</span><span></span><br> 

                <input style="margin: 20px 0; background-color: var(--color1); width: 150px; height: 30px; border: none; border-radius: 10px;" type="submit" name ="dangnhap" value="Đăng nhập">
       
            </div>

                </div>
                <p style="margin-top: 5%;"> <a style="color: black;" href="quenmk.php"><u>Quên mật khẩu</u></a> </p>
                <p style="margin-top: 5%;">Bạn chưa có tài khoản? <a style="color: black;" href="signup.php"><b>Đăng ký ngay</b></a> </p>
                
                
    </div>
</body>
</html>