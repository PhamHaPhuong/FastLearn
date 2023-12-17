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
    FROM giangvien  WHERE 1 ";

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
    FROM giangvien 
    WHERE maGiangVien= :id";

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
function get_all_ba()
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM sv_gv_kh 
    JOIN giangvien ON giangvien.maGiangVien=sv_gv_kh.maGiangVien
    JOIN khoahoc ON khoahoc.maKhoaHoc=sv_gv_kh.maKhoaHoc
    WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
$sv = get_all_ba();
disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khóa học của tôi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="khoadaycuatoi.css">
</head>
<body>
<?php foreach ($sv as $item) { ?>
    <div class="tre">
        <div style="padding: 20px 10%; background-color: var(--color3); color: white;">
            <a style="color: white;" href="#"><i class="fa fa-home" aria-hidden="true"></i> Trang Chủ</a> <i style="margin: 0 20px;" class="fa fa-chevron-right" aria-hidden="true"></i> Khóa dạy của tôi
        </div>
        
    </div>
    <div>
<div style="padding: 3% 10%;">
            <div><h3>Xin chào bạn! Chào mừng bạn đến với FastLearn.</h3> </div>
        </div>
        <div>
            <div class="hang">
                <div class="cot1" >
                    <div style="border-bottom: 8px solid white; color: white; font-size: 36px; padding: 15% 20%;">
                        <i style="margin-right: 20% ;" class="fa fa-user-circle-o" aria-hidden="true"></i>  <b>        Bạn</b>
                    </div>
                    <!-- <div class="cung" style="padding-bottom: 15% ;">
                        <p>Cấp độ 5</p>
                        <p style="margin-left: 20%;">7/600</p>
                        <p style="margin-left: 20%;">Cấp độ 6</p>
                    </div> -->
                </div>
                <div class="cot2">
                    <div class="roww">
                        <div class="col">
                            <div style="border-bottom: 10px solid #FBE98D; margin-right: 20%;">Quản lý học viên </div>
                            <div style="margin-top: 50%;">Thành tích của bạn<i style="margin: 0 20px;" class="fa fa-chevron-right" aria-hidden="true"></i></div>
                        </div>
                        <div class="col">
                            <div style="border-bottom: 10px solid #A1D776; margin-right: 20%;">Đăng tải tài liệu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
    </div>
    <div style="background-color: #F5F1F1 ; padding: 5% 8%;">
        <h3>Khóa dạy của tôi</h3>
        <div class="dad">
            <a href="#"><div class="son" style="margin-right: 5%; height: 250px;text-align: center;">
            <img src="../anh/<?php echo $item['anh']; ?>" alt="" width="100%" height="auto">
                <div style="color
                : var(--color5); padding-top: 5%; "><?php echo $item['tenKhoaHoc']; ?></div>
            </div></a>
            <!-- <a href="#"><div class="son" style="margin-right: 5%;height: 250px;text-align: center;">
                <img src="anh/ddk.png" alt="">
                <div style="color: var(--color5); padding-top: 5%; ">MÁY TÍNH MẠNG</div>
            </div></a>
            <a href="#"><div class="son" style="height: 250px;text-align: center;">
                <img src="anh/ddk2.png" alt="">
                <div style="color: var(--color5); padding-top: 5%; ">KINH DOANH ONLINE</div>
            </div></a> -->
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
    <?php } ?>
</body>
</html>