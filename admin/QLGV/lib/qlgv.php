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
function get_all_giangvien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT * FROM giangvien
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
function get_giangvien($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT * FROM giangvien 
    WHERE maGiangVien = :id";

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
function add_giangvien($tenGiangVien, $email, $ngaySinh, $chuyenNganh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
    // Chống SQL Injection
    $tenGiangVien = addslashes($tenGiangVien);
    $email = addslashes($email);
    $ngaySinh = addslashes($ngaySinh);
    $chuyenNganh = addslashes($chuyenNganh);
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO giangvien(tenGiangVien, email , ngaySinh, chuyenNganh) VALUES
            ('$tenGiangVien','$email','$ngaySinh','$chuyenNganh')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}
 // Hàm sửa nhan vien 
function edit_giangvien($id, $tenGiangVien, $email, $ngaySinh, $chuyenNganh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $em_name        = addslashes($tenGiangVien);
    $em_email   = addslashes($email);
    $em_birth   = addslashes($ngaySinh);
    $em_mon   = addslashes($chuyenNganh);

    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn->prepare("UPDATE giangvien SET tenGiangVien = :tenGiangVien, email = :email, ngaySinh = :ngaySinh, chuyenNganh = :chuyenNganh  WHERE maGiangVien = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tenGiangVien', $tenGiangVien);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':ngaySinh', $ngaySinh);
    $stmt->bindParam(':chuyenNganh', $chuyenNganh);

    // Thực thi truy vấn
    $stmt->execute();
}
 
// Hàm xóa giảng viên
function delete_giangvien($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
        DELETE FROM giangvien
        WHERE maGiangVien = :id
    ";
     
    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
     
    // Thực thi truy vấn
    $stmt->execute();
     
    // Trả về kết quả truy vấn
    return $stmt->rowCount();
}
