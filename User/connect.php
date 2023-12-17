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