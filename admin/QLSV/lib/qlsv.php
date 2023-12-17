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
    $sql = "SELECT * FROM sinhvien
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

// Hàm lấy sinh viên theo ID
function get_sinhvien($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM sinhvien 
    WHERE maSinhVien = :id";

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
function add_sinhvien($tenSinhVien, $ngaySinh, $email)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $ten = addslashes($tenSinhVien);
    $ngaySinh = addslashes($ngaySinh);
    $email = addslashes($email);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO sinhvien(tenSinhVien, ngaySinh, email) VALUES
            ('$tenSinhVien','$ngaySinh','$email')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}
 // Hàm sửa nhan vien 
function edit_sinhvien($id, $tenSinhVien, $ngaySinh, $email)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $em_name        = addslashes($tenSinhVien);
    $em_birth = addslashes($ngaySinh);
    $em_email   = addslashes($email);

    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn->prepare("UPDATE sinhvien SET tenSinhVien = :tenSinhVien, ngaySinh = :ngaySinh, email = :email WHERE maSinhVien = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tenSinhVien', $tenSinhVien);
    $stmt->bindParam(':ngaySinh', $ngaySinh);
    $stmt->bindParam(':email', $email);
    // Thực thi truy vấn
    $stmt->execute();
}
 
// Hàm xóa sinh viên
function delete_sinhvien($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
        DELETE FROM sinhvien
        WHERE maSinhVien = :id
    ";
     
    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
     
    // Thực thi truy vấn
    $stmt->execute();
     
    // Trả về kết quả truy vấn
    return $stmt->rowCount();
}
