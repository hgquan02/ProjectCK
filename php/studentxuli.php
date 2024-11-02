<?php
session_start();
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

// Kiểm tra xem học sinh đã đăng nhập hay chưa
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'hoc_sinh') {
    header("Location: login.php");
    exit();
}

// Lấy danh sách các ngành xét tuyển đang mở cho học sinh
$query = "SELECT * FROM nganh_xet_tuyen WHERE trang_thai = 'hien'";
$result = mysqli_query($conn, $query);

?>