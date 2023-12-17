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
function get_all_nd()
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM noidungkh 
    JOIN khoahoc ON noidungkh.idND = khoahoc.idND
    JOIN giangvien ON noidungkh.maGiangVien = giangvien.maGiangVien
    WHERE khoahoc.maNganh = 3";
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
    <title>
    <?php
      $sv = get_all_ql();
      disconnect_db();
    ?>
     <?php foreach ($sv as $item) { ?>
    <?php echo $item['tenNganh']; ?>
    <?php } ?>
    </title>
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="tailieu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="tren">
    <?php
      $sv = get_all_ql();
      disconnect_db();
    ?>
     <?php foreach ($sv as $item) { ?>
        <span>    <i class="fa fa-bookmark" aria-hidden="true"></i>
        <a href="home.php">Trang chủ</a> </span> 
        <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="kdkn.php"><?php echo $item['tenNganh']; ?></a></span>
        <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="#"><?php echo $item['tenKhoaHoc']; ?></a> </span>
            </div><?php } ?>
            <div style="margin: 4%;">
        
        <div>
        <?php
      $sv = get_all_nd();
      disconnect_db();
    ?>
        <?php foreach ($sv as $item) { ?>
            <div class="header">
            <?php echo $item['heading']; ?>
        </div> 
<div class="gv" style="margin: 20px;">
                <i style="font-size: 24px;" class="fa fa-user" aria-hidden="true"></i> <span><b>Giảng viên: <?php echo $item['tenGiangVien']; ?></b> </span>
            </div>
<div class="mom">
                <div class="son1" style="background-color: white;">
                    <div style="width: 70%; margin-left: 10%;background-color: var(--color1); box-shadow: 0px 8px 8px 0px rgba(0,0,0,0.1);;">
                        <ul>
                            <a href="#loi"><li>Lợi ích</li></a>
                            <a href="#lo"><li>Lộ trình</li></a>
                            <a href="#gv"><li>Giáo viên</li></a>
                        </ul>
                    </div>
                    <div style="padding: 5% 10%;">
                    <div id="loi">
                    <h2>Lợi ích từ khóa học</h2><br><br>
                        <?php echo $item['loiIch']; ?>
                    </div>
                    <div id="lo">
                    <?php echo $item['loTrinh']; ?>
                    </div>
                        
                    </div>
                    
                </div>
                <div class="son2" style="padding-left: 20px;">
                    <div style="background-color: white;border-radius: 20px;">
                        <div>
                            <img src="anh/<?php echo $item['anh']; ?>" alt="" width="100%" height="auto">
                            <div style="margin: 10px 5%; text-align: center;">
                                <h3 style="color: var(--color5);"><?php echo $item['hocPhi']; ?> vnđ</h3> <br>
                                <a href="User/muakh.php"><button style="background-color: #D6DA28; width: 150px; height: 40px; border-radius: 20px; text-align: center; border: none; margin-bottom: 50px ;"><h4 style="color: white;">Mua ngay</h4></button></a>
                                <div style="color: #D6DA28; font-size: 12px;padding-bottom: 20px;">
                                    <span style="margin-right: 20%;"><i class="fa fa-heart-o" aria-hidden="true"></i>Lưu vào yêu thích</span> 
                                    <span><i class="fa fa-share-alt" aria-hidden="true"></i>Chia sẻ</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>
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