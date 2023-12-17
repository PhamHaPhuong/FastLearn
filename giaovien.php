<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giáo viên</title>
    <link rel="stylesheet" href="chung.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="giaovien.css">
</head>
<body>
    <div class="header">
        <div class="top-nav">
       <div>
            <div class="trong">
               <i class="fa fa-phone" aria-hidden="true"></i>
               <span>+8568457983</span>
           </div> 
           <div class="trong" style="float: right;">
               <a href="dangky.php">Đăng kí</a>
               <a href="login.php" style="border: 1px solid black;background-color: white; border-radius: 10px;">Đăng nhập</a>
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
                   <a href="kdkn.php" class="dropbtn" style="background-color: white; color: black;"><i class="fa fa-bars" aria-hidden="true"></i>CÁC KHÓA HỌC</a>
           </div>
           <a href="home.php" >GIỚI THIỆU</a>
           <a href="giaovien.php">GIÁO VIÊN</a>
           <a href="contact.php">LIÊN HỆ</a>
       </div>
   </div>
   </div> 
   <div class="content">
        <img src="anh/gv.png" alt="" width="100%" height="auto">
   </div>




   <div style="margin-top: 50px;"></div>
    <h2 style="text-align: center;">Đội ngũ giảng viên</h2>
   <div class="show">
    <div style="padding: 30px 25.55%;">
        <div class="tab">
    <div class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen"><b>Kinh doanh - khởi nghiệp</b></div>
    <div class="tablinks" onclick="openCity(event, 'two')"><b>Quản lý</b></div>
    <div class="tablinks" onclick="openCity(event, 'three')"><b>Lập trình</b></div>
    <div class="tablinks" onclick="openCity(event, 'four')"><b>Ngoại ngữ</b></div>
  </div>
    </div>
    
  <div id="one" class="tabcontent">
        <div style=" padding: 0 10%;">
            <div class="dad" >
                <div class="son1" style=" text-align: center;">
                    <div style="margin-top: 20%;">
                        <img src="anh/avtgv.png" width="60%" alt="">
                    </div><br>
                    <h3>GS.Hải Tiến</h3><br>
                    <div>
                        <span class="tabimg" onclick="open(event, 'mot')" id="default"><img src="anh/avtgv.png" width="10%" alt=""></span>
                        <span class="tabimg" onclick="open(event, 'mot')"><img src="anh/avtgv.png" width="10%" alt=""></span>
                        <span class="tabimg" onclick="open(event, 'mot')"><img src="anh/avtgv.png" width="10%" alt=""></span>
                        <span class="tabimg" onclick="open(event, 'mot')"><img src="anh/avtgv.png" width="10%" alt=""></span>
                    </div>
                </div>
                <div class="son2" style="padding: 2% 5%; font-size: 15px;">
                    <div class="tabnd" id="mot">
                    Là giảng viên đào tạo thực chiến về kinh doanh thời trang, kinh doanh online hàng đầu <br> <br>
                    Founder và sáng lập EMFA GROUP - 1 công ty thời trang thực chiến rất nhiều team phát triển các dự án về thời trang và các nhãn hàng <br> <br>

                    Với 7 năm chinh chiến trong ngành thời trang trải qua rất nhiều dự án cùng công ty phát triển. Anh Hải đã phát triển 1 dự án mới trong lĩnh vực đào tạo về kinh doanh thời trang. <br> <br>

                    Khóa học rất phù hợp với các bạn chuẩn bị khởi nghiệp, mới khởi nghiệp muốn làm 1 ông/ bà chủ. Giúp các bạn định hướng đúng tư duy về nguồn hàng, marketing thời trang, phát triển team, xây trải nghiệm được tốt nhất. <br> <br>
               <div style="text-align: center; margin-top: 30px;"><button><b>Đăng ký học</b></button></div> 
                    
              </div>
                  
                  </div>
            </div>
        </div>
  </div>
  <div>
  <div id="two" class="tabcontent">
    <div class="roww">
        <div class="col" style="margin-right: 5%;">
            <img src="anh/ql1.jpg" alt="" width="100%" height="auto">
            <div>
              <h4>Kiến Thức Quản Lý</h4><br>
              <p>Kế toán thuế thực tế từ A - Z</p>
              <p style="font-size: 12px;">Khóa học cần thiết về nghiệp vụ kế toán thuế. ....</p>
              
            </div>
        </div>
        <div class="col" style="margin-right: 5%;">
          <img src="anh/ql2.jpg" alt="" width="100%" height="auto">
          <div>
            <h4>Kiến Thức Quản Lý</h4><br>
            <p>Pháp luật kế toán</p>
              <p style="font-size: 12px;">Đúc kết ngắn gọn về công việc của một kế toán chuyên nghiệp ....</p>
          </div>
        </div>
        <div class="col">
          <img src="anh/ql3.jpg" alt="" width="100%" height="auto">
          <div>
            <h4>Bí quyết chăm sóc khách hàng</h4><br>
            <p style="font-size: 12px;">Khóa học này hướng dẫn học viên các kỹ năng chăm sóc khách hàng hiệu quả....</p>
          </div>
        </div>
      </div>
  </div>
  
  <div id="three" class="tabcontent">
    <div class="roww">
        <div class="col" style="margin-right: 5%;">
            <img src="anh/ql1.jpg" alt="" width="100%" height="auto">
            <div>
              <h4>Kiến Thức Quản Lý</h4><br>
              <p>Kế toán thuế thực tế từ A - Z</p>
              <p style="font-size: 12px;">Khóa học cần thiết về nghiệp vụ kế toán thuế. ....</p>
              
            </div>
        </div>
        <div class="col" style="margin-right: 5%;">
          <img src="anh/ql2.jpg" alt="" width="100%" height="auto">
          <div>
            <h4>Kiến Thức Quản Lý</h4><br>
            <p>Pháp luật kế toán</p>
              <p style="font-size: 12px;">Đúc kết ngắn gọn về công việc của một kế toán chuyên nghiệp ....</p>
          </div>
        </div>
        <div class="col">
          <img src="anh/ql3.jpg" alt="" width="100%" height="auto">
          <div>
            <h4>Bí quyết chăm sóc khách hàng</h4><br>
            <p style="font-size: 12px;">Khóa học này hướng dẫn học viên các kỹ năng chăm sóc khách hàng hiệu quả....</p>
          </div>
        </div>
      </div>
  </div>
  <div id="four" class="tabcontent">
    <div class="roww">
        <div class="col" style="margin-right: 5%;">
            <img src="anh/ql1.jpg" alt="" width="100%" height="auto">
            <div>
              <h4>Kiến Thức Quản Lý</h4><br>
              <p>Kế toán thuế thực tế từ A - Z</p>
              <p style="font-size: 12px;">Khóa học cần thiết về nghiệp vụ kế toán thuế. ....</p>
              
            </div>
        </div>
        <div class="col" style="margin-right: 5%;">
          <img src="anh/ql2.jpg" alt="" width="100%" height="auto">
          <div>
            <h4>Kiến Thức Quản Lý</h4><br>
            <p>Pháp luật kế toán</p>
              <p style="font-size: 12px;">Đúc kết ngắn gọn về công việc của một kế toán chuyên nghiệp ....</p>
          </div>
        </div>
        <div class="col">
          <img src="anh/ql3.jpg" alt="" width="100%" height="auto">
          <div>
            <h4>Bí quyết chăm sóc khách hàng</h4><br>
            <p style="font-size: 12px;">Khóa học này hướng dẫn học viên các kỹ năng chăm sóc khách hàng hiệu quả....</p>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
<div style="color: white;">
  <div style="">
      <div class="footer" style="background-color: white;">
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
  </div>
</div>
<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tabimg;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tabimg = document.getElementsByClassName("tabimg");
      for (i = 0; i < tabimg.length; i++) {
        tabimg[i].className = tabimg[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();


    function open(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</body>
</html>