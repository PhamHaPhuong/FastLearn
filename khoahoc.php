<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các khóa học</title>
	<link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="khoahoc.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
        <div class="top-nav">
       <div>
            <div class="trong">
              <a href="#">Đăng kí</a>
              <a href="#" style="border: 1px solid black;background-color: white; border-radius: 10px;">Đăng nhập</a>
              </div>
              </div>
           </div>
       </div>	
   </div>
   <div style="background-color: red;">
       <div class="center-nav">
           <div class="trong">
               <img src="anh/logo.png" alt="" width="45px" height="58px">
           </div>
           <div class="trong" style="padding: 21px 20%;"> 
               <div class="box">
                   <form class="sbox" action="/search" method="get">
                   <input class="stext" type="text" name="q" placeholder="Tìm khóa học, giáo viên">
                   <a class="sbutton" type="submit" href="javascript:void(0);">
                   <i class="fa fa-search"></i>
                   </a>
                   </form>
                   </div> 
           </div>
           <div class="trong" style="padding: 21px 0 21px 20%;">
               <a>
                   <i style="font-size: 30px; margin-right: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i><span>Khóa học của bạn</span>
               </a>
           </div>

       </div>
   </div>
   <div>
       <div class="menu">
           <div class="dropdown">
                   <a class="dropbtn" style="background-color: white; color: black;"><i class="fa fa-bars" aria-hidden="true"></i>CÁC KHÓA HỌC</a>
                   <!-- <div class="dropdown-content">
                   <a href="#">Nghệ thuật và Thương mại</a>
                   <a href="#">Quản lý </a>
                   <a href="#">Công nghệ thông tin</a>
                   <a href="#">Ngoại ngữ</a>
                   </div> -->
           </div>
           <a href="#" >GIỚI THIỆU</a>
           <a href="#">GIÁO VIÊN</a>
               <div class="dropdown">
                   <a class="dropbtn">TỰ LUYỆN<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                   <div class="dropdown-content">
                   <a href="#">Cơ bản</a>
                   <a href="#">Nâng cao </a>
                   </div>
                 </div>

           <a href="#">LIÊN HỆ</a>
           <a href="#">ĐÀO TẠO</a>
       </div>
   </div>
   </div>  
   <div class="slideshow-container">

    <div class="mySlides fade">
      <img src="anh/itbgr.jpg" style="width:100%">
      <div class="text">
        <div>KHÓA HỌC PRO</div>
        <button> <h3>Đăng kí</h3></button>
      </div>
    </div>
    
    <div class="mySlides fade">
      <img src="anh/tienganhbgr.png" style="width:100%">
      <div class="text">
        <div>KHÓA HỌC PRO</div>
        <button> <h3>Đăng kí</h3></button>
      </div>
    </div>
    
    <div class="mySlides fade">
      <img src="anh/itbgr.jpg" style="width:100%">
      <div class="text">
        <div>KHÓA HỌC PRO</div>
        <button> <h3>Đăng kí</h3></button>
      </div>
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    
    </div>
    <br>
    
    <div style="text-align:center; margin-top: -13px;">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div> 
<div class="content">
    <div class="duoi">
        <h4>Kinh doanh - Khởi nghiệp</h4>
        <div class="hang">
            <div class="cot" style="margin-right: 5%;">
                <img src="anh/kn1.jpg" alt=""  width="100%" height="auto">
                <p>Nghệ thuật giao tiếp và đàm phán </p>
              </div>
            <div class="cot" style="margin-right: 5%;" >
              <img src="anh/kn2.jpg" alt="" width="100%" height="auto">
              <p>Sát thủ bán hàng livestream </p>
            </div>
            <div class="cot">
              <img src="anh/kn3.png" alt="" width="100%" height="auto">
              <p>Sát thủ bán hàng livestream </p>
            </div>
        </div>
        <a href="#"><button>xem thêm ></button></a>
    </div>
    <div class="duoi">
      <h4>Quản lý </h4>
      <div class="hang">
          <div class="cot" style="margin-right: 5%;">
              <img src="anh/qli1.jpg" alt=""  width="100%" height="auto">
              <p>Làm chủ giọng nói</p>
            </div>
          <div class="cot" style="margin-right: 5%;" >
            <img src="anh/qli2.png" alt="" width="100%" height="auto">
            <p>Làm sao để đàm phán hiệu quả?</p>
          </div>
          <div class="cot">
            <img src="anh/qli3.jpg" alt="" width="100%" height="auto">
            <p>Bí quyết chinh phục nhà tuyển dụng</p>
          </div>
      </div>
      <a href="#"><button>xem thêm ></button></a>
  </div>
  <div class="duoi">
    <h4>Lập trình </h4>
    <div class="hang">
        <div class="cot" style="margin-right: 5%;">
            <img src="anh/it1.jpg" alt=""  width="100%" height="auto">
            <p>Kiến Thức Nhập Môn IT</p>
          </div>
        <div class="cot" style="margin-right: 5%;" >
          <img src="anh/it2.jpg" alt="" width="100%" height="auto">
          <p>Lập trình C++ cơ bản, nâng cao</p>
        </div>
        <div class="cot">
          <img src="anh/it3.jpg" alt="" width="100%" height="auto">
          <p>HTML CSS từ Zero đến Hero</p>
        </div>
    </div>
    <a href="#"><button>xem thêm ></button></a>
</div>
<div class="duoi">
  <h4>Ngoại ngữ </h4>
  <div class="hang">
      <div class="cot" style="margin-right: 5%;">
          <img src="anh/ta1.png" alt=""  width="100%" height="auto">
          <p>Tiếng anh cơ bản</p>
        </div>
      <div class="cot" style="margin-right: 5%;" >
        <img src="anh/ta2.jpg" alt="" width="100%" height="auto">
        <p>Luyện Thi IELTS </p>
      </div>
      <div class="cot">
        <img src="anh/ta3.png" alt="" width="100%" height="auto">
        <p>Luyện Thi TOEIC</p>
      </div>
  </div>
  <a href=""><button>xem thêm ></button></a>
</div>
<div class="duoi">
  <h4>Bài viết nổi bật </h4>
  <div class="hang">
      <div class="cot" style="margin-right: 5%;">
          <img src="anh/nb1.jpg" alt=""  width="100%" height="auto">
          <p>Tiếng anh cơ bản</p>
        </div>
      <div class="cot" style="margin-right: 5%;" >
        <img src="anh/nb2.png" alt="" width="100%" height="auto">
        <p>Luyện Thi IELTS </p>
      </div>
      <div class="cot">
        <img src="anh/nb3.png" alt="" width="100%" height="auto">
        <p>Luyện Thi TOEIC</p>
      </div>
  </div>
  <a href="#"><button>xem thêm ></button></a>
</div>
</div>
<div class="footer">
  <button>Chọn ngay mục tiêu của bạn</button>
  <div class="nhom" >
    <div class="pt">
      <img src="anh/logo.png" alt="" width="70" height="auto">
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




<script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        </script>
</body>
</html>