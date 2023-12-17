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
function get_all_nd()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM noidungkh  WHERE 1";

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
function get_noidung($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM noidungkh  
    WHERE idND = :id";

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
function add_noidung($heading, $loTrinh, $tengv, $loiIch)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $heading = addslashes($heading);
    $loTrinh = addslashes($loTrinh);
    $tengv = addslashes($tengv);
    $loiIch = addslashes($loiIch);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO noidungkh(heading, loTrinh, maGiangVien, loiIch) VALUES
            ('$heading','$loTrinh','$tengv','$loiIch')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}
 

function  get_all_gv()
{
    global $conn;
    connect_db();
    $sql = "SELECT * from giangvien
            WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Nếu người dùng submit form
$role =  get_all_gv();
if (!empty($_POST['add_noidung']))
{
    // Lay data
    $data['heading']        = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['loTrinh']         = isset($_POST['hp']) ? $_POST['hp'] : '';
    $data['maGiangVien']          = isset($_POST['nd']) ? $_POST['nd'] : '';
    $data['loiIch']    = isset($_POST['anh']) ? $_POST['anh'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['heading'])){
        $errors['heading'] = 'Chưa nhập nội dung';
    }
     
    if (empty($data['loTrinh'])){
        $errors['loTrinh'] = 'Chưa nhập nội dung';
    }
    if (empty($data['loiIch'])){
        $errors['loiIch'] = 'Chưa nhập nội dung';
    }
    
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_noidung($data['heading'], $data['loTrinh'], $data['maGiangVien'], $data['loiIch']);
        // Trở về trang danh sách
        header("location: post.php");
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
    <link rel="stylesheet" href="../tailieu.css">
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
        width: 100%;
        height: 100px;
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
    <div style="padding: 3% 10%;">
        <p style="color: gray;"><i>Bắt đầu viết bằng văn bản hoặc HTML</i></p><br>
                    <form method="post">
                        <h2 style="">Heading</h2><br>
                        <input type="text" name="ten" placeholder="Thêm heading" value="<?php 
                            echo !empty($data['heading']) ? $data['heading'] : ''; ?>"
                        /><br>
                        <?php if (!empty($errors['heading'])) echo $errors['heading']; ?> 

                        <input type="text" name="hp" placeholder="Lộ trình học" value="<?php 
                            echo !empty($data['loTrinh']) ? $data['loTrinh'] : ''; ?>"
                        /> <br>
                        <?php if (!empty($errors['loTrinh'])) echo $errors['loTrinh']; ?>

                        <span>Giảng viên đảm nhận: </span>
                        <select name="nd"><br>
                        <?php foreach($role as $a){ ?>
                               <option value="<?php echo $a['maGiangVien'] ?>"  ><?php echo $a['tenGiangVien'] ?></option>
                               <?php   } ?></select><br>
                        <input type="text" name="anh" placeholder="Lợi ích của khóa học" value="<?php 
                            echo !empty($data['loiIch']) ? $data['loiIch'] : ''; ?>"
                        /> <br>
                        <?php if (!empty($errors['loiIch'])) echo $errors['loiIch']; ?>
                       
                       
                        
                            
                        
                        <input  style="width: 120px; height: 40px;border: none; border-radius: 20px;padding:0; background-color:var(--color1) ;" class="luu" type="submit" name="add_noidung" value="Lưu"/>
                    </form>
                    </div>
    </body>
</html>