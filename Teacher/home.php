<?php
 	$timeout_duration = 20;
	session_start();
	if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
		 session_unset() ;
		 session_destroy() ;
		 header("Location: login.php/");
	}
	$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" href="chung.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
</style>
<body>
	<div class="header">
		 <div class="top-nav">
		<div>
			 <div class="trong">
				<i class="fa fa-phone" aria-hidden="true"></i>
				<span>+8568457983</span>
			</div> 
			<div class="trong" style="float: right; margin-right: 5%;">
				<div class="dropdown-i">
					<span><i style="font-size: 17px;" class="fa fa-user-circle" aria-hidden="true"> <?php
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
 
$sql = "SELECT * FROM user WHERE user.email = '".$_SESSION["email"]."'";
$result = $conn->query($sql);
// Hiển thị dữ liệu ra màn hình
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Chào giảng viên,  " . $row["hoTen"] . "<br>";
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
						<a href="#"><div class="">
						Hồ sơ của bạn
					</div></a>
					<a href="doipass.php"><div class="">
						Thay đổi mật khẩu
					</div></a>
					<a href="#"><div class="">
						Cài đặt
					</div></a>
					<a href="#"><div class="">
						Đăng xuất
					</div></a>
					</div>
				  </div>
				
			</div>
		</div>	
	</div>
	<div style="background-color: red;">
		<div class="center-nav">
			<div class="trong">
				<img src="anh/logo.png" alt="" width="45px" height="58px">
			</div>
			<div class="trong" style="padding: 21px 20%;"> 
				<div class="box">
					<form class="sbox" action="/search" method="get">
					<input class="stext" type="text" name="q" placeholder="Tìm khóa học, giáo viên">
					<a class="sbutton" type="submit" href="javascript:void(0);">
					<i class="fa fa-search"></i>
					</a>
					</form>
					</div> 
			</div>
			<div class="trong" style="padding: 21px 0 21px 20%;">
				<a>
					<i style="font-size: 30px; margin-right: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i><span>Lớp dạy của tôi</span>
				</a>
			</div>

		</div>
	</div>
	<div>
		<div class="menu">
			<div class="dropdown">
					<a  href="#" class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i>CÁC KHÓA DẠY</a>
					<div class="dropdown-content">
					<a href="#">Nghệ thuật và Thương mại</a>
					<a href="#">Quản lý </a>
					<a href="#">Công nghệ thông tin</a>
					<a href="#">Ngoại ngữ</a>
					</div>
			</div>
			<a href="#" style="background-color: #F4CCD7; color: black;">GIỚI THIỆU</a>
			<a href="#">GIÁO VIÊN</a>
				<div class="dropdown">
					<a class="dropbtn">TỰ LUYỆN<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<div class="dropdown-content">
					<a href="#">Cơ bản</a>
					<a href="#">Nâng cao </a>
					</div>
				  </div>

			<a href="#">LIÊN HỆ</a>
			<a href="#">ĐÀO TẠO</a>
		</div>
	</div>
	</div>
	<div class="content">
		<div class="hero">
			<div class="bo">
				<div class="con1">
					<h1>Fast Learn</h1><br>
					<h5>Phòng luyện ảo - trải nghiệm thực tế - công nghệ hàng đầu.</h5>
				</div>
				<div style="color:red;" class="con2">
					<form action="" id="form1">
						<h3>Giải đáp nhanh</h3>
						<input type="text" id="fname" name="fname" placeholder="Họ tên"><span>*</span><br>
						<input type="text" id="fphone" name="femail" placeholder="Địa chỉ Email"><span>*</span><br>
						<input type="text" id="fcontent" name="fcontent" placeholder="Nội dung yêu cầu"><span>*</span><br>
						<input style="margin-bottom: 20px; background-color: var(--color2); width: 100px; height: 40px; border: none; border-radius: 10px;" type="submit" value="Gửi">
				</div>
			</div>
		</div>
		<div id="about" class="about">
			<div class="boxxi">
				<div>
					<div class="roww">
						<div class="column">
							<img src="anh/about.png" alt="">
						</div>
						<div class="column" style="padding-left: 5%;">
							<h1 style="color:#C51C4C;">Giới thiệu hình thức học trực tuyến tại FAST LEARN </h1>
							<br> </br>
							<div><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp &nbsp</span><span>Được thành lập từ năm 2013, Fast Learn hoạt động sứ mệnh "Giúp các bạn học sinh trên khắp mọi miền Việt Nam có môi trường học bình đẳng, học với giáo viên giỏi hàng đầu Việt Nam".</span></div>
							<br>
							<div><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp &nbsp</span><span>Trong nhiều năm qua Fast Learn đã không ngừng khẳng định vị trí và chất lượng trong lĩnh vực đào tạo trực tuyến cho học sinh cấp 1, 2, 3 khi nhận được sự tin tưởng của hơn 1.000.000 học sinh theo học, số lượng học sinh đạt HSG, Thủ khoa, Á Khoa đại học không ngừng tăng qua từng năm.</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="lotrinh">
			<div class="tit"><p>Lộ trình học tại FastLearn</p></div>
			<div class="big">
				<div style="margin-right: 5%; color:#9EA02F; border: 1px solid #9EA02F; border-top-right-radius: 20px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;"  class="small"><h4>1.     Đăng kí khóa học</h4> </div>
				<div style="margin-right: 5%;color:#C33737; border: 1px solid #C33737; border-top-right-radius: 20px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;" class="small"><h4>2.      Nhận tài liệu và học trực tiếp</h4></div>
				<div style="color:#5C2B9B; border: 1px solid #5C2B9B; border-top-right-radius: 20px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;" class="small"><h4>3.     Hỏi đáp bình luận</h4></div>
			</div>
		</div>
		<div class="khoahoc">
			<h2 style="color: var(--color5);">Khóa học nổi bật</h2>
			<div style="margin-top: 30px;">Khám phá các kỹ năng được tìm kiếm nhiều nhất hàng đầu trong tuần này và bắt đầu việc học của bạn ngay hôm nay</div>
			<div class="cha">
				<div class="mom">
						<div class="son">
							<img src="anh/bt2.jpg" alt="" width="90%" height="auto">
							<div >Nghệ thuật và Thương mại</div>
							
						</div>							
				</div>
				<div class="mom">
					<div class="son">
						<img src="anh/bt1.jpg" alt="" width="90%" height="auto">
						<div >Quản lí</div>
						
					</div>	
				</div>
				<div class="mom">
					<div class="son">
						<img src="anh/bt2.jpg" alt="" width="90%" height="auto">
						<div >Công nghệ thông tin</div>
						
					</div>	
				</div>
				<div class="mom">
					<div class="son">
						<img src="anh/bt3.jpg" alt="" width="90%" height="auto">
						<div >Ngoại ngữ</div>
						
					</div>	
				</div>
			</div>
		</div>
		<div class="noibat" >
			<div class="tit"><p>Những gì chỉ có tại Fastlearn</p></div>
			<div class="clss">
				<div style="margin-right: 5%; "  class="grp">
					<img src="anh/icon-ts-1.png" alt="">
					<div>Giảng viên uy tín
						Bài giảng chất lượng</div>
				</div>
				<div style="margin-right: 5%;" class="grp">
					<img src="anh/icon-ts-2.png" alt="">
					<div>Thanh toán 1 lần<br>
						Học mãi mãi</div>
				</div>
				<div style="" class="grp">
					<img src="anh/icon-ts-3.png" alt="">
					<div>Học trực tuyến
						Hỗ trợ trực tiếp</div>
				</div>
			</div>
		</div>
		<div class="cauhoi">
			<h3>Các câu hỏi thưởng gặp</h3>
			<div style="padding-left: 10%">
				
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
	</div>
</body>
</html>