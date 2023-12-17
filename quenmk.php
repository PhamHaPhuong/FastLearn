<?php
include("connect.php");
$loi="";
if (isset ($_POST ['nutguiyeucau'] ) == true ) {
    $email =  $_POST['email'] ;
   $sql= "  SELECT * FROM  user WHERE email = '".$email."'";
   $result = $conn->query($sql);
  if($result->num_rows == 0) {
    $loi = " email bạn nhập chưa đăng ký thành viên với chúng tôi ";  }
else {
   $matkhaumoi =  ("Passsword".substr (md5(rand(0, 999999999)) , 0 , 8 )."@");
   $sql= "  UPDATE  user  SET matkhau = '".md5($matkhaumoi)."'  WHERE email = '".$email."'";
   $stmt = $conn->query($sql);
    echo "Mat khau moi: ".$matkhaumoi."<br>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="quenmk.php" method="post">
    <div><a href="login.php"><i class="fa fa-undo" aria-hidden="true"></i></a><span>Quay lại trang chủ</span></div>
    <h4> quên mật khẩu </h4>
    <?php 
    if($loi!= "") { ?>
        <?= $loi ?> 
        <?php 
    }
    ?>
    <label for="email">Email:</label> 
    <input  value="  <?php
    if (isset($email) == true )
    echo $email ?>  "type="email" id="email" name="email" required> <br>

    <button type ="submit" name ="nutguiyeucau" value ="nutgui" class="btn">Gửi yêu cầu</button>

</form>
</body>
</html>