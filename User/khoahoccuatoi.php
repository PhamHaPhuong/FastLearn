<?php
 	$timeout_duration = 300;
	session_start();
	if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
		 session_unset() ;
		 session_destroy() ;
		 header("Location: ../login.php");
	}
	$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khóa học của tôi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="khoahoccuatoi.css">
</head>
<body>

    <div class="header">
        <div class="top-nav">
       <div>
            <div class="trong">
               <i class="fa fa-phone" aria-hidden="true"></i>
               <span>+8568457983</span>
           </div> 
           <div class="trong" style="float: right; margin-right: 10%;">
               <div class="dropdown-i">
               <span><i style="font-size: 27px;" class="fa fa-user-circle" aria-hidden="true"> 
               <?php
// Kết nối tới cơ sở dữ liệu
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bt60";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}
// Truy vấn dữ liệu từ bảng "user"
$sql = "SELECT * FROM user ORDER BY user.email  LIMIT 1  ";
$result = $conn->query($sql);

// Hiển thị dữ liệu ra màn hình
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Họ Tên : " . $row["hoTen"] . "<br>";
    }
} else {
    echo "No data found.";
}

// Đóng kết nối
$conn->close();
?>
         </i>
                 </span>
                   <div class="dropdown-con">
                       <a href="hoso.php"><div class="">
                       Hồ sơ của bạn
                   </div></a>
                   <a href="../doipass.php"><div class="">
                       Thay đổi mật khẩu
                   </div></a>
                   <a href="#"><div class="">
                       Cài đặt
                   </div></a>
                   <a href="../logout.php"><div class="">
                       Đăng xuất
                   </div></a>
                   </div>
                 </div>
               
           </div>
       </div>	
   </div>
    <div class="tre">
        <div style="padding: 20px 10%; background-color: var(--color3); color: white;">
            <a href="home.php" style="color: white;" href="#"><i class="fa fa-home" aria-hidden="true"></i> Trang Chủ</a> <i style="margin: 0 20px;" class="fa fa-chevron-right" aria-hidden="true"></i> Khóa học của tôi
        </div>
        
    </div>
    <div>
<div style="padding: 3% 10%;">
            <div><h3>Xin chào bạn! Chào mừng bạn đến với FastLearn. Hãy ôn luyện thật tốt nhé!!</h3> </div>
        </div>
        <div>
            <div class="hang">
                <div class="cot1" >
                    <div style="border-bottom: 8px solid white; color: white; font-size: 36px; padding: 15% 20%;">
                        <i style="margin-right: 20% ;" class="fa fa-user-circle-o" aria-hidden="true"></i>  <b>        Bạn</b>
                    </div>
                    <div class="cung" style="padding-bottom: 15% ;">
                        <p>Cấp độ 5</p>
                        <p style="margin-left: 20%;">7/600</p>
                        <p style="margin-left: 20%;">Cấp độ 6</p>
                    </div>
                </div>
                <div class="cot2">
                    <div class="roww">
                        <div class="col">
                            <div style="border-bottom: 10px solid #FBE98D; margin-right: 20%;">Khóa học</div>
                            <div style="margin-top: 50%;">Thành tích của bạn <i style="margin: 0 20px;" class="fa fa-chevron-right" aria-hidden="true"></i></div>
                        </div>
                        <div class="col">
                            <div style="border-bottom: 10px solid #A1D776; margin-right: 20%;">Giáo trình</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
    </div>
    <div style="background-color: #F5F1F1 ; padding: 5% 8%;">
        <h3>Khóa học của tôi</h3>
        <div class="dad">
            <a href="#"><div class="son" style="margin-right: 5%; height: 250px;text-align: center;">
                <img src="anh/ddk3.png" alt="">
                <div style="color: var(--color5); padding-top: 5%; ">TIẾNG ANH</div>
            </div></a>
            <a href="#"><div class="son" style="margin-right: 5%;height: 250px;text-align: center;">
                <img src="anh/ddk.png" alt="">
                <div style="color: var(--color5); padding-top: 5%; ">MÁY TÍNH MẠNG</div>
            </div></a>
            <a href="#"><div class="son" style="height: 250px;text-align: center;">
                <img src="anh/ddk2.png" alt="">
                <div style="color: var(--color5); padding-top: 5%; ">KINH DOANH ONLINE</div>
            </div></a>
        </div>
    </div>
    <div class="footer">
        <button>Chọn ngay mục tiêu của bạn</button>
        <div class="nhom" >
            <div class="pt">
                <img src="anh/logo.png" alt="" width="70" height="auto">
                <div style="margin-top: 20px;">Học viện đào tạo từ xa lâu đời nhất ở Hoa Kỳ</div>
                <div style="margin-top: 20px;">Mã số doanh nghiệp: 010986666</div>
                <div style="margin-top: 20px;">Địa chỉ: Số nhà 20 Ngách 234/35 Đường Hoàng Quốc Việt,
                    Phường Cổ Nhuế 1, Quận Bắc Từ Liêm, Thành phố Hà Nội, Việt Nam</div>
            </div>
            <div class="pt">
                <div class="dt">
                    <h3>VỀ FAST LEARN</h3><br>
                    <a href="#about"><p>Giới thiệu</p></a><br>
                    <a href="#"><p>Tuyển dụng</p></a><br>
                    <br>
                    <h3 style="margin-bottom: 10px;">KẾT NỐI VỚI CHÚNG TÔI</h3><br>
                    <span><a href="#"><i style="color:#0765FF; font-size: 28px;" class="fa fa-facebook-square" aria-hidden="true"></i></a></span>
                    <span><a href="#"><i style="color:#9A3E6A;font-size: 28px;" class="fa fa-envelope" aria-hidden="true"></i></a></span>
                </div>
                <div class="dt">
                    <h3>THÔNG TIN</h3><br>
                    <a href="#about"><p>Điều kiện giao dịch</p></a><br>
                    <a href="#"><p>Chính sách thanh toán</p></a><br>
                    <a href="#"><p>Bảo vệ thông tin</p></a>
                    
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>