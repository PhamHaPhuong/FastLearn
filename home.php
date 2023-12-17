<?php
// Biến kết nối toàn cục
global $conn;
 
// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=bt60", "root", "");
            // Thiết lập font chữ kết nối
            $conn->exec("set names utf8");
        } catch (PDOException $e) {
            die("Can't not connect to database: " . $e->getMessage());
        }
    }
}
 
// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        $conn = null;
    }
}
 
// Hàm lấy tất cả sinh viên
function get_all_sinhvien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT *
    FROM qva WHERE 1 ";

    // Thực hiện câu truy vấn
    $query = $conn->query($sql);

    // Mảng chứa kết quả
    $result = array();

    // Lặp qua từng record và đưa vào biến kết quả
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }

    // Trả kết quả về
    return $result;
    var_dump($result);
}

// Hàm lấy sinh viên theo ID
function get_sinhvien($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT *
    FROM qva
    WHERE id = :id";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Trả kết quả về
    return $result;
}
disconnect_db();
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
			<div class="trong" style="float: right;">
				<a href="dangky.php">Đăng kí</a>
               <a href="login.php" style="border: 1px solid black;background-color: white; border-radius: 10px;">Đăng nhập</a>
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
					<i style="font-size: 30px; margin-right: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i><span>Khóa học của bạn</span>
				</a>
			</div>

		</div>
	</div>
	<div>
		<div class="menu">
			<div class="dropdown">
					<a  href="kdkn.php" class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i>CÁC KHÓA HỌC</a>
					<!-- <div class="dropdown-content">
					<a href="#">Nghệ thuật và Thương mại</a>
					<a href="#">Quản lý </a>
					<a href="#">Công nghệ thông tin</a>
					<a href="#">Ngoại ngữ</a>
					</div> -->
			</div>
			<a href="home.php" style="background-color: #F4CCD7; color: black;">GIỚI THIỆU</a>
			<a href="giaovien.php">GIÁO VIÊN</a>


			<a href="contact.php">LIÊN HỆ</a>
			<!-- <a href="daotao.">ĐÀO TẠO</a> -->
		</div>
	</div>
	</div>
	<div class="content">
		<div class="hero">
			<div class="bo">
				<img src="anh/bg.png" width="100%" height="auto" alt="">
				<!-- <div style="color:red;" class="con2">
					<form action="" id="form1">
						<h3>Giải đáp nhanh</h3>
						<input type="text" id="fname" name="fname" placeholder="Họ tên"><span>*</span><br>
						<input type="text" id="fphone" name="femail" placeholder="Địa chỉ Email"><span>*</span><br>
						<input type="text" id="fcontent" name="fcontent" placeholder="Nội dung yêu cầu"><span>*</span><br>
						<input style="margin-bottom: 20px; background-color: var(--color2); width: 100px; height: 40px; border: none; border-radius: 10px;" type="submit" value="Gửi">
				</div> -->
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
		<div class="cauhoi" style="padding: 3% 0;height: 400px">
			<h3 style="text-alight: center;">Các câu hỏi thường gặp</h3>
			<?php
            $sv = get_all_sinhvien();
            disconnect_db();
?>
<?php foreach ($sv as $item) { ?>
                <div style=" background-color: #FFF8F8, border-radius: 20px; padding: 3% 20% 0% 20%;">
                    <div style="background-color:#F8F0E5; padding: 20px; text-align:left;">
                    <?php echo $item['noiDungCauHoi']; ?>
                    </div>
                <div style=" font-size: 14px; padding: 10px 0 10px 10%; text-align:left;">
                <?php echo $item['noiDungTraLoi']; ?>
                </div>
    </div>
                
                <!-- <?php 
                $formattedDate = date('d/m/Y', strtotime($item['ngaySinh']));
                echo $formattedDate; 
                ?>
                <?php echo $item['email']; ?> -->
                
            
        <?php }?>
        </div>
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