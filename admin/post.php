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
    $sql = "SELECT * FROM khoahoc  WHERE 1";

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
    $sql = "SELECT * FROM khoahoc  
    WHERE maKhoaHoc = :id";

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
 
// Hàm thêm sinh viên
function add_khoahoc($tenKhoaHoc, $hocPhi, $noiDung, $anh, $tenNganh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $tenKhoaHoc = addslashes($tenKhoaHoc);
    $hocPhi = addslashes($hocPhi);
    $noiDung = addslashes($noiDung);
    $anh = addslashes($anh);
    $tenNganh = addslashes($tenNganh);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO khoahoc(tenKhoaHoc, hocPhi, noiDung, anh, maNganh) VALUES
            ('$tenKhoaHoc','$hocPhi','$noiDung','$anh','$tenNganh')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}
 

function get_all_nganhdaotao()
{
    global $conn;
    connect_db();
    $sql = "SELECT * from nganhdaotao
            WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function get_all_ndkh()
{
    global $conn;
    connect_db();
    $sql = "SELECT * from noidungkh
            WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Nếu người dùng submit form
$role = get_all_nganhdaotao();
$sv=get_all_ndkh();
if (!empty($_POST['add_khoahoc']))
{
    // Lay data
    $data['tenKhoaHoc']        = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['hocPhi']         = isset($_POST['hp']) ? $_POST['hp'] : '';
    $data['noiDung']          = isset($_POST['nd']) ? $_POST['nd'] : '';
    $data['anh']    = isset($_POST['anh']) ? $_POST['anh'] : '';
    $data['maNganh']    = isset($_POST['nganh']) ? $_POST['nganh'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['tenKhoaHoc'])){
        $errors['tenKhoaHoc'] = 'Chưa nhập tên khóa học';
    }
     
    if (empty($data['hocPhi'])){
        $errors['hocPhi'] = 'Chưa nhập học phí<br>';
    }
    
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_khoahoc($data['tenKhoaHoc'], $data['hocPhi'], $data['noiDung'], $data['anh'], $data['maNganh']);
        // Trở về trang danh sách
        // header("location: employe_list.php");
        echo"Bạn đã thêm khóa học thành công";
    }
}

disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nội dung khóa học</title>
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="tailieu.css">
</head>
<style>
    :root{
	--color1: #F4CCD7;
	--color2: #FBDBE4;
	--color3: #313C5D;
	--color4: #FFF8F8;
	--color5: #C51C4C;


}
    input{
        width: 80%;
        height: 40px;
        margin-bottom: 20px;
        padding: 20px;
    }
    select{
        width: 50%;
        height: 40px;
    margin-bottom: 20px;
       
    }
</style>
    <body style="background-color: #FFFFFF;">
    <div class="tren">
            <span>    <i class="fa fa-bookmark" aria-hidden="true"></i>
            <a href="home.php">Trang chủ</a> </span> 
            <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="kdkn.php">Đăng bài</a></span>
            <!-- <i class="fa fa-chevron-right" aria-hidden="true"></i> <span><a href="#">Ngành học</a> </span> -->
                </div>
    <div>
    <div style="padding: 5% 10%;">
            <div style="border: 1px solid gray; border-radius: 30px;padding: 3% ;">
                <div style="color: blanchedalmond;">
                    <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>

                </div>
                <div style="padding: 2% 10%;border: 1px solid gray; border-radius: 30px;">
                    <form method="post">
                        <h2 style="text-align: center;">Đăng tải khóa học</h2><br>
                        <input type="text" name="ten" placeholder="Tên khóa học" value="<?php 
                            echo !empty($data['tenKhoaHoc']) ? $data['tenKhoaHoc'] : ''; ?>"
                        /><br>
                        <?php if (!empty($errors['tenKhoaHoc'])) echo $errors['tenKhoaHoc']; ?> 
                        <input type="text" name="hp" placeholder="Học phí" value="<?php 
                            echo !empty($data['hocPhi']) ? $data['hocPhi'] : ''; ?>"
                        /> <br>
                        <?php if (!empty($errors['hocPhi'])) echo $errors['hocPhi']; ?>
                        <input type="text" name="nd" placeholder="nội dung khóa học" value="<?php 
                            echo !empty($data['noiDung']) ? $data['noiDung'] : ''; ?>"
                        /> <br>
                        <?php if (!empty($errors['noiDung'])) echo $errors['noiDung']; ?>
                        <div style="text-align: center; width: 80%; height:auto; border: 1px solid black; padding: 3% 5%">
                                 <p>Tải ảnh khóa học</p>
                                 <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <input type="file" name="anh"  placeholder="tên file ảnh" value="<?php 
                            echo !empty($data['anh']) ? $data['anh'] : ''; ?>"
                        /> <br>
                        <?php if (!empty($errors['anh'])) echo $errors['anh']; ?>
                        </div>
                       
                        <span>Chọn khóa học: </span>
                        <select name="nganh"><br>
                        <?php foreach($role as $a){ ?>
                               <option value="<?php echo $a['maNganh'] ?>"  ><?php echo $a['tenNganh'] ?></option>
                               <?php   } ?>
                            
                        </select><br>
                        <span>Chọn nội dung khóa học: </span>
                        <select name="nganh"><br>
                        <?php foreach($sv as $a){ ?>
                               <option value="<?php echo $a['idND'] ?>"  ><?php echo $a['idND'] ?></option>
                               <?php   } ?>
                            
                        </select><br>
                        <input  style="width: 120px; height: 40px;border: none; border-radius: 20px;padding:0; background-color:var(--color1) ;" class="luu" type="submit" name="add_khoahoc" value="Lưu"/>
                    </form>
    </body>
</html>