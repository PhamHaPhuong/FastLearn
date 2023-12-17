<?php
require 'lib/acc.php';
$acc = get_all_acc();
disconnect_db();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Danh sách tài khoản</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="chung.css">
</head>
<style>
    
</style>
<body>
    <div class="tren">
<span>    <i class="fa fa-bookmark" aria-hidden="true"></i><a href="../home.php">Trang chủ</a> </span> <i class="fa fa-chevron-right" aria-hidden="true"></i> <span>Quản lý tài khoản</span>
    </div>
    <h1 style="text-align: center;">Danh sách tài khoản</h1>
    <div style="margin:3%; border: 2px solid black">
       <div>
        <button class="btthem">
    <a style="color: white;" href="acc_add.php"><i style="font-size: 20px;" class="fa fa-location-arrow" aria-hidden="true"></i>Thêm tài khoản</a> <br /> <br />
    </button>
       </div> 
        <div style=" margin: 5% 3%;padding: 5% 3%;border: 1px solid black; height: 400px;">
            <table width="100%" border="1" cellspacing="0" cellpadding="10">
        
        <tr>
            <td><b>Tên người dùng</b></td>
            <td><b>Email</b></td>
            <td><b>Mật khẩu</b></td>
            <td><b>Vai trò</b></td>
        </tr>
        <?php foreach ($acc as $item) { ?>
            <tr>
                <td><?php echo $item['hoTen']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['matkhau']; ?></td>
                <!-- <td><?php echo $item['roler']; ?></td> -->
                <td>
                    <form method="post" action="acc_del.php">
                        <span>
                            <i style=" color: #C7CB07; font-size: 22px;" class="fa fa-pencil-square" aria-hidden="true"></i>
                        <input class="sua" onclick="window.location = 
                        'acc_edit.php?email=<?php echo $item['email']; ?>'" type="button" value="Sửa" />
                        </span>
                        
                        <input type="hidden" name="email" value="<?php echo $item['email']; ?>" />
                        <span>
                             <i style=" color: red; font-size: 22px;" class="fa fa-trash" aria-hidden="true">
                             <input class="xoa" onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" />

                            </i>
                        </span>
                       
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
        </div>
    </div>
    
    <div class="footer">
			<button>Chọn ngay mục tiêu của bạn</button>
			<div class="nhom" >
				<div class="pt">
					<img src="logo.png" alt="" width="70" height="auto">
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
</body>

</html>