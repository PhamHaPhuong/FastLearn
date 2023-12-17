<?php
 	$timeout_duration = 300;
	session_start();
	if(!isset($_SESSION["email"]) || isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
		 session_unset() ;
		 session_destroy() ;
		 header("Location: ../login.php");
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
			<div class="trong" style="float: right; margin-right: 10%;">
				<div class="dropdown-i">
				<span><i style="font-size: 17px;" class="fa fa-user-circle" aria-hidden="true"> 
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
 
$sql = "SELECT * FROM user WHERE user.email = '".$_SESSION["email"]."'";
$result = $conn->query($sql);
// Hiển thị dữ liệu ra màn hình
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Xin chào : " . $row["hoTen"] . "<br>";
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
	<div style="background-color: red;">
		<div class="center-nav">
			<div class="trong">
				<img src="../anh/logo.png" alt="" width="45px" height="58px">
			</div>
			<div class="trong" style="padding: 21px 20%;"> 
				<div class="box">
				<?php
$servername = "localhost"; // Thay thế bằng tên server của bạn
$username = "root"; // Thay thế bằng tên người dùng của bạn
$password = ""; // Thay thế bằng mật khẩu của bạn
$dbname = "bt60"; // Thay thế bằng tên cơ sở dữ liệu của bạn

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php 
// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy từ khóa tìm kiếm từ form
    $keyword = $_POST["keyword"];

    // Xử lý truy vấn tìm kiếm
    $sql = "SELECT * FROM khoahoc WHERE tenKhoaHoc LIKE '%$keyword%'";
    $result = $conn->query($sql);

    // Kiểm tra kết quả và hiển thị
    if ($result->num_rows > 0) {
        // Duyệt qua từng hàng dữ liệu tìm được
        while ($row = $result->fetch_assoc()) {
            echo "Tên Khóa Học : " . $row["tenKhoaHoc"] . "<br>";
            echo "Nội Dung: " . $row["noiDung"] . "<br>";
            // ...
        }
    } else {
        echo "Không có kết quả tìm kiếm.";
    }
}
?>
					<form class="sbox" form action="home.php" method="POST">
					<input class="stext" type="text" name="keyword" placeholder="Tìm khóa học, giáo viên">
					<a class="sbutton" type="submit"href="javascript:void(0);">
					<i class="fa fa-search"></i>
					</a>
					</form>
					</div> 
			</div>

		</div>
	</div>
	<div>
	<!-- <div style="background-color: red;">
		<div class="center-nav">
			<div class="trong">
				<img src="../anh/logo.png" alt="" width="45px" height="58px">
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

		</div>
	</div> -->

	</div>
	<div style="    padding: 3% ;">
		<div class="dad">
			<div class="son1">

				<ul>
					<li style="padding: 10px; background-color: var(--color3); color: white;"><h4>Chung</h4></li>
					<li><a class="active" href="#home" style="background-color: white; color: black;"><i class="fa fa-clock-o" aria-hidden="true"></i>	Tổng quan</a></li>
					<li style="padding: 10px; background-color: var(--color3); color: white;"><h4>Quản lý</h4></li>
					<li><a href="QLSV/qlsv_list.php"><i class="fa fa-user" aria-hidden="true"></i>Học viên</a></li>
					<li><a href="ACCOUNT/acc_list.php"><i class="fa fa-user" aria-hidden="true"></i>Tài khoản</a></li>
					<li><a href="QLGV/qlgv_list.php"><i class="fa fa-users" aria-hidden="true"></i>Giáo viên</a></li>
					<li><a href="COURSE/course_list.php"><i class="fa fa-calendar" aria-hidden="true"></i>Khóa học</a></li>
					<li style="padding: 10px; background-color: var(--color3); color: white;"><h4>Hệ thống</h4></li>
					<li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>Q&A</a></li>
					<li><a href="dangnoidung.php"><i class="fa fa-cog" aria-hidden="true"></i>Post bài viết</a></li>
				  </ul>
			</div>
			<div class="son2">
				<h2>Tổng quan </h2>
				<div class="bo" style="color: white;">
					<div class="con" style="margin-right: 5%;">
						<div class="dad" style="background-color:#3554B3 ;border-radius: 20px;">
							<div class="son1"><i style="font-size:32px;" class="fa fa-user" aria-hidden="true"></i></div>
							<div class="son2" style="text-align: center;">
								<div style="padding: 5% 0; border-bottom: 1px solid white;">863</div>
								<div style="padding: 5% 0;">Học viên</div>
							</div>
						</div>
					</div>
					<div class="con" style="margin-right: 5%;">
						<div class="dad" style="background-color:#CED134 ;border-radius: 20px;">
							<div class="son1"><i style="font-size:32px;" class="fa fa-calendar-o" aria-hidden="true"></i></div>
							<div class="son2" style="text-align: center;">
								<div style="padding: 5% 0; border-bottom: 1px solid white;">324</div>
								<div style="padding: 5% 0;">Đăng ký</div>
							</div>
						</div>
					</div>
					<div class="con">
						<div class="dad" style="background-color:#B33535 ; border-radius: 20px;">
							<div class="son1"><i style="font-size:32px;" class="fa fa-bar-chart" aria-hidden="true"></i></div>
							<div class="son2" style="text-align: center;">
								<div style="padding: 5% 0; border-bottom: 1px solid white; color: #B33535;">1</div>
								<div style="padding: 5% 0;">Thống kê</div>
							</div>
						</div>
					</div>
				</div>
				<div style="text-align: center; padding: 3% 10%">
		<h3>Upload khóa học </h3>
		<a href="dangnoidung.php"><img src="../anh/Group2.png" width="30%" height=auto alt=""></a>
			
		</div>
			</div>
		</div>
		
	</div>
</body>
</html>