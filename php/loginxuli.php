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


  // Khởi tạo biến lỗi
$usernameErr = $passwordErr = "";
$username = $password = "";
$error_message = "";

// Xử lý khi form được gửi
if (isset($_POST['submit'])) {
    // Kiểm tra nếu trường username trống
    if (empty($_POST['username'])) {
        $usernameErr = "Tên đăng nhập là bắt buộc";
    } else {
        $username = test_input($_POST['username']);
    }

    // Kiểm tra nếu trường password trống
    if (empty($_POST['password'])) {
        $passwordErr = "Mật khẩu là bắt buộc";
    } else {
        $password = test_input($_POST['password']);
    }

    if (empty($usernameErr) && empty($passwordErr)) {
      // Làm sạch dữ liệu đầu vào trước khi đưa vào câu truy vấn
      $username = mysqli_real_escape_string($conn, $username);
      $password = mysqli_real_escape_string($conn, $password);
      
      // Tạo câu lệnh SQL
      $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      
      // Thực thi câu lệnh SQL
      $result = mysqli_query($conn, $sql);
  
      // Kiểm tra kết quả truy vấn
      if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['user_type'] = $row['user_type'];
  
          // Điều hướng người dùng tới trang tương ứng
          if ($row['user_type'] == 'admin') {
              header("Location: admin.php");
          } elseif ($row['user_type'] == 'giao_vien') {
              header("Location: teacher.php");
          } else {
              header("Location: student.php");
          }
          exit();
      } else {
          $error_message = "Tên đăng nhập hoặc mật khẩu không đúng!";
      }
  }
}

    // Hàm làm sạch dữ liệu đầu vào
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>