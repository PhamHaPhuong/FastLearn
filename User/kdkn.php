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
function get_all_khoahoc()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT *
    FROM khoahoc  WHERE 1 ";

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
function get_khoahoc($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT *
    FROM khoahoc 
    WHERE maKhoaHoc= :id";

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
 
// Hàm lấy tất cả sinh viên
function get_all_nganhdaotao()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT *
    FROM nganhdaotao  WHERE 1 ";

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
function get_nganhdaotao($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT *
    FROM nganhdaotao 
    WHERE maNganh= :id";

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
function get_all_it()
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM khoahoc JOIN nganhdaotao ON khoahoc.maNganh=nganhdaotao.maNganh
    WHERE khoahoc.maNganh = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function get_all_kdkn()
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM khoahoc JOIN nganhdaotao ON khoahoc.maNganh=nganhdaotao.maNganh
    WHERE khoahoc.maNganh = 2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function get_all_ql()
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM khoahoc JOIN nganhdaotao ON khoahoc.maNganh=nganhdaotao.maNganh
    WHERE khoahoc.maNganh = 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function get_all_nn()
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM khoahoc JOIN nganhdaotao ON khoahoc.maNganh=nganhdaotao.maNganh
    WHERE khoahoc.maNganh = 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh doanh - Khởi nghiệp</title>
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="kdkn.css">
</head>
<body>
<div class="header">
        <div class="top-nav">
       <div>
            <div class="trong">
               <i class="fa fa-phone" aria-hidden="true"></i>
               <span>+8568457983</span>
           </div> 
           <div class="trong" style="float: right;">
            <div class="dropdown-i">
                <span><i style="font-size: 27px;" class="fa fa-user-circle" aria-hidden="true"></i>
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
               <a href="login.php">
                   <i style="font-size: 30px; margin-right: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i><span>Khóa học của bạn</span>
               </a>
           </div>

       </div>
   </div>
   <div>
       <div class="menu">
           <div class="dropdown">
                   <a class="dropbtn" style="background-color: white; color: black;"><i class="fa fa-bars" aria-hidden="true"></i>CÁC KHÓA HỌC</a>
                   <div class="dropdown-content">
                   <!-- <a href="#">Nghệ thuật và Thương mại</a>
                   <a href="#">Quản lý </a>
                   <a href="#">Công nghệ thông tin</a>
                   <a href="#">Ngoại ngữ</a> -->
                   </div>
           </div>
           <a href="home.php" >HOME</a>
           <a href="giaovien.php">GIÁO VIÊN</a>
               <div class="dropdown">
                   <a class="dropbtn">TỰ LUYỆN<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                   
                 </div>

           <a href="contact.php">LIÊN HỆ</a>
           <!-- <a href="#">ĐÀO TẠO</a> -->
       </div>
   </div>
   </div> 
   <div class="background">
        <div>
            <span><a href="#"><i class="fa fa-home" aria-hidden="true"></i>
                Trang chủ</a>
            </span>
            <span><a href="#">>></a></span>
            <span style="font-size: 22px;">Các khóa học</span>
            <h2>Các khóa học phổ biến nhất</h2>
        </div>
   </div>
   <div>
    <div class="tronang">
        <div class="topnav">
            <div class="search-container">
              <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button style="border-radius: 20px 0 0 20px;" type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
    </div>
    <div class="tronang" >
      <button class="but">Phổ biến nhất</button>
    </div>
    <div class="tronang">
      <button class="but">Mới nhất</button>
    </div>
</div>
<div class="tab">
  <h2>Danh mục con </h2>
  <div class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen"><b>Nghệ thuật và thương mại</b></div>
  <div class="tablinks" onclick="openCity(event, 'two')"><b>Quản lý</b></div>
  <div class="tablinks" onclick="openCity(event, 'three')"><b>Công nghệ thông tin</b></div>
  <div class="tablinks" onclick="openCity(event, 'four')"><b>Ngoại ngữ</b></div>
</div>
<div id="one" class="tabcontent" >
    <?php
      $sv = get_all_kdkn();
      disconnect_db();
    ?>
  <div class="roww">
    <?php foreach ($sv as $item) { ?>
    <div class="col" style="margin-right: 3%;"  onclick="window.location =  '../tailieu.php?maKhoaHoc=<?php echo $item['maKhoaHoc']; ?>'">
    <img src="anh/<?php echo $item['anh']; ?>" alt="" width="100%" height="auto">
        <div>
          <h4><?php echo $item['tenKhoaHoc']; ?></h4><br>
          <p><?php echo $item['noiDung']; ?></p>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
<div id="two" class="tabcontent">
    <?php
      $sv = get_all_ql();
      disconnect_db();
    ?>
  <div class="roww">
    <?php foreach ($sv as $item) { ?>
    <div class="col" style="margin-right: 3%;" onclick="window.location =  '../qli.php?maKhoaHoc=<?php echo $item['maKhoaHoc']; ?>'">
        <img src="anh/<?php echo $item['anh']; ?>" alt="" width="100%" height="auto">
        <div>
          <h4><?php echo $item['tenKhoaHoc']; ?></h4><br>
          <p><?php echo $item['noiDung']; ?></p>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
<div id="three" class="tabcontent">
    <?php
      $sv = get_all_it();
      disconnect_db();
    ?>
  <div class="roww">
    <?php foreach ($sv as $item) { ?>
    <div class="col" style="margin-right: 3%;" onclick="window.location =  '../laptrinh.php?maKhoaHoc=<?php echo $item['maKhoaHoc']; ?>'">
        <img src="anh/<?php echo $item['anh']; ?>" alt="" width="100%" height="auto">
        <div>
          <h4><?php echo $item['tenKhoaHoc']; ?></h4><br>
          <p><?php echo $item['noiDung']; ?></p>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
<div id="four" class="tabcontent">
    <?php
      $sv = get_all_nn();
      disconnect_db();
    ?>
  <div class="roww">
    <?php foreach ($sv as $item) { ?>
    <div class="col" style="margin-right: 3%;" onclick="window.location =  '../tienganh.php?maKhoaHoc=<?php echo $item['maKhoaHoc']; ?>'">
        <img src="anh/il2.jpg" alt="" width="100%" height="auto">
        <div>
          <h4><?php echo $item['tenKhoaHoc']; ?></h4><br>
          <p><?php echo $item['noiDung']; ?></p>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
<div style="color: white;">
        h
        <div style="position: absolute; ">
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
    </div>
   <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</body>
</html>