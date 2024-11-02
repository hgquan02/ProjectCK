<?php
session_start();

// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_xettuyen";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy ID hồ sơ từ URL
$ho_so_id = $_GET['id'];

// Truy vấn thông tin học bạ
$query = "SELECT hoc_ba FROM ho_so WHERE id = $ho_so_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Kiểm tra nếu hồ sơ tồn tại và học bạ hợp lệ
if ($row) {
    $file_path = "uploads/" . $row['hoc_ba'];
    if (file_exists($file_path)) {
        header('Content-Type: image/jpeg'); // Hoặc 'image/png' nếu là file PNG
        readfile($file_path);
    } else {
        echo "File học bạ không tồn tại.";
    }
} else {
    echo "Hồ sơ không hợp lệ.";
}

mysqli_close($conn);
?>
