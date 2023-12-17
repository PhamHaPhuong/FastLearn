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
 
// Hàm lấy tất cả giảng viên
function get_all_acc()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT *
    FROM user 
    WHERE 1";

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

// Hàm lấy giảng viên theo ID
function get_acc($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT *
    FROM user
    WHERE email = :id";

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
// Hàm thêm giảng viên
function add_acc($hoTen, $matkhau, $roler)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $hoTen = addslashes($hoTen);
    $matkhau = addslashes($matkhau);
    $roler = addslashes($roler);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO user(hoTen, matkhau, roler) VALUES
            ('$hoTen','$matkhau','$roler')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}
 // Hàm sửa nhan vien 
function edit_acc($id, $hoTen, $matkhau, $roler)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $em_name     = addslashes($hoTen);
    $em_pass  = addslashes($matkhau);
    $em_roler   = addslashes($roler);

    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn -> prepare("UPDATE user 
                            SET hoTen = :hoTen, matkhau = :matkhau, roler = :roler
                            WHERE email = :id");
    
    $stmt->bindParam(':hoTen', $hoTen);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':matkhau', $matkhau);
    $stmt->bindParam(':roler', $roler);

    // Thực thi truy vấn
    $stmt->execute();
}
 
// Hàm xóa giảng viên
function delete_acc($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
        DELETE FROM user
        WHERE email = :id
    ";
     
    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
     
    // Thực thi truy vấn
    $stmt->execute();
     
    // Trả về kết quả truy vấn
    return $stmt->rowCount();
}