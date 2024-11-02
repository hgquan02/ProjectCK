<?php 
  $servername = "localhost"; // Đổi thành tên server của bạn nếu khác
  $username = "root"; // Tên người dùng CSDL
  $password = ""; // Mật khẩu của CSDL
  $dbname = "quanly_xettuyen"; // Tên CSDL của bạn

  // Kết nối tới MySQL sử dụng kiểu thủ tục
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Kiểm tra kết nối
  if (!$conn) {
      die("Kết nối thất bại: " . mysqli_connect_error());
  } else {
      // echo "Kết nối thành công!";
  }
?>