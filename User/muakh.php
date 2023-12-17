
<?php

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bt60";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Xử lý đăng ký khoá học
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $maGiangVien = $_POST["maGiangVien"];
    $maKhoaHoc = $_POST["maKhoaHoc"];

    // Lấy maSinhVien từ email
    $maSinhVien = "";
    $sql = "SELECT maSinhVien FROM sinhvien WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $maSinhVien = $result["maSinhVien"];
    } else {
        header("location: khongthanhcong.php");
        exit;
    }

    // Thêm dữ liệu vào bảng khoá học đăng ký
    $sql = "INSERT INTO sv_gv_kh (maSinhVien, maGiangVien, maKhoaHoc) VALUES (:maSinhVien, :maGiangVien, :maKhoaHoc)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':maSinhVien', $maSinhVien);
    $stmt->bindParam(':maGiangVien', $maGiangVien);
    $stmt->bindParam(':maKhoaHoc', $maKhoaHoc);

    if ($stmt->execute()) {
        echo "Khoá học đã được đăng ký thành công.";
    } else {
        echo "Đã xảy ra lỗi: " . $stmt->errorInfo();
    }
}
function get_all_roles()
{
    global $conn;
    // connect_db();
    $sql = "SELECT * from giangvien
            WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function get_all_departments()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    // connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * From khoahoc";
     
    // Thực hiện câu truy vấn
    $stmt = $conn->query($sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Lặp qua từng record và đưa vào biến kết quả
        while ($row = $stmt->fetch()){
            $result[] = $row;
        }
    // Trả kết quả về
    return $result;
}
$role = get_all_roles();
    $pb = get_all_departments();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng kí khóa học </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="chung.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="tailieu.css">
    </head>
    <style>
        form input{
    width: 200px;
    height: 30px;
    color: gray;
}
    form select{
        width: 200px;
    height: 30px;
    color: gray;
    }
        form p span{
            color: red;
        }
        form p{
            font-size: 14px; 
            margin-top: 20px;
        }
        .bo{
            padding: 5% 10%;
        }
        .bo:after{
            content:"";
            display: table;
            clear: both;
            max-width: 100%;
        }
        .con{
            width: 50%;
            float:left;
        }
        .luu{
            width: 100px;
            background-color:#F4CCD7 ;
            margin-top: 5%;
            border: none;
            border-radius: 20px; 
        }
    </style>
    <body style="background-color: #FFFFFF;">
    <div class="tren">
        <span>    <i class="fa fa-bookmark" aria-hidden="true"></i>
        <a href="home.php">Trang chủ</a> </span> 
        <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="kdkn.php">Các khóa học</a></span>
        <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="#">Thanh toán</a> </span>
            </div> 
             <div class="bo">
                    <div class="con">
                    <div class="tong" style="padding: 5% 15%;">
                <div>
                    <h3>Thanh toán </h3><br></br>
                    <p>Thông tin đăng ký khóa học</p>
                </div>
               
                 <form method="post"  action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <p class="dien" style="font-size: 14px;">Email<span style="color: red;">*</span></p>
                    <input type="text" name="email" value="Nhập họ tên của bạn">
                <p class="dien" style="">Chọn Khóa học<span>*</span></p>
                <select name="maKhoaHoc">
                        <?php foreach($pb as $a){ ?>
                 <option value="<?php echo $a['maKhoaHoc'] ?>"  ><?php echo $a['tenKhoaHoc'] ?></option>
                   <?php   } ?>
                        </select>
            
                <p class="dien" style="">Giáo viên giảng dạy <span>*</span></p>
                <select name="maGiangVien">
                        <?php foreach($role as $a){ ?>
                 <option value="<?php echo $a['maGiangVien'] ?>"  ><?php echo $a['tenGiangVien'] ?></option>
                   <?php   } ?>
                            
                        </select> <br>
                <input class="luu" type="submit" value="Lưu"/>
                        
        </form>
            </div>
       
                    </div>
                    <div class="con">
                        <img src="https://e-bills.vn/assets/img/home/banner%201.png" alt="" width="80%" height="auto">
                    </div>
                </div>
            
    </body>
</html>