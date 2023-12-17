<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="123.css">
    <title> File </title>
</head>
<body>
    <div class="container">
    
    <?php
        session_start();
        include("connect.php");
        $sql = "SELECT * FROM tailieu";
        $result = $conn->query($sql);

        // Hiển thị dữ liệu ra màn hình
        if ($result) {
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
            while($row = $result ->fetch_assoc()) {
                echo "<div class='item'>";
                if(in_array($row['type'], $allowed_extensions)) {
                    echo "<img width='200px' height='150px' src='".$row['linkFile']."' />";
                } else {
                    switch($row['type']) {
                        case "docx": case "doc":
                            echo "<img width='200px' height='150px' src='/GIAODIEN/resource/ic_word.png' />";
                        break;
                        default:
                            echo "<img width='200px' height='150px' src='/GIAODIEN/resource/ic_unknown.png' />";
                    }
                }
                echo "<a href='".$row['linkFile']."' download='".$row['linkFile']."'>Tải về</a>";
                echo "</div>";
            }
        }
    ?>
    
    </div>
</body>
</html>