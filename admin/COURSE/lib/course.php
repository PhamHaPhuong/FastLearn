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
function get_all_course()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT khoahoc.maKhoaHoc, khoahoc.tenKhoaHoc, khoahoc.hocPhi, khoahoc.noiDung, khoahoc.anh
    FROM khoahoc 
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
function get_course($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả giảng viên
    $sql = "SELECT khoahoc.maKhoaHoc, khoahoc.tenKhoaHoc, khoahoc.hocPhi, khoahoc.noiDung, khoahoc.anh
    FROM khoahoc
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
// Hàm thêm giảng viên
function add_course($tenKhoaHoc, $hocPhi, $noiDung, $anh)
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
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO khoahoc(tenKhoaHoc, hocPhi, noiDung , anh) VALUES
            ('$tenKhoaHoc','$hocPhi','$noiDung','$anh')
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    // Thực hiện câu truy vấn     
    return $result;
}
 // Hàm sửa nhan vien 
function edit_course($id, $tenKhoaHoc, $hocPhi, $noiDung, $anh)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $em_course     = addslashes($tenKhoaHoc);
    $em_tuition  = addslashes($hocPhi);
    $em_cont   = addslashes($noiDung);
    $em_pic   = addslashes($anh);

    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn -> prepare("UPDATE khoahoc 
                            SET tenKhoaHoc = :tenKhoaHoc, hocPhi = :hocPhi, 
                            noiDung = :noiDung, anh = :anh  
                            WHERE maKhoaHoc = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tenKhoaHoc', $tenKhoaHoc);
    $stmt->bindParam(':hocPhi', $hocPhi);
    $stmt->bindParam(':noiDung', $noiDung);
    $stmt->bindParam(':anh', $anh);

    // Thực thi truy vấn
    $stmt->execute();
}
 
// Hàm xóa giảng viên
function delete_course($id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
        DELETE FROM khoahoc
        WHERE maKhoaHoc = :id
    ";
     
    // Sử dụng PDO để thực hiện truy vấn SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
     
    // Thực thi truy vấn
    $stmt->execute();
     
    // Trả về kết quả truy vấn
    return $stmt->rowCount();
}
function get_all_roles()
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