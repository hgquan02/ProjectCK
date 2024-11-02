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

// Kiểm tra xem người dùng có phải là học sinh không
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'hoc_sinh') {
    echo "Chỉ học sinh mới có thể xem hồ sơ.";
    header("Location: login.php");
    exit();
}

// Lấy ID học sinh từ phiên đăng nhập
$user_id = $_SESSION['user_id'];

// Truy vấn các hồ sơ đã nộp của học sinh
$query = "
    SELECT ho_so.id, ho_so.trang_thai, nganh_xet_tuyen.ten_nganh, nganh_xet_tuyen.khoi_xet, ho_so.hoc_ba
    FROM ho_so
    INNER JOIN nganh_xet_tuyen ON ho_so.nganh_id = nganh_xet_tuyen.id
    WHERE ho_so.user_id = $user_id
";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ đã nộp</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Hồ sơ đã nộp</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên ngành</th>
                    <th>Khối xét</th>
                    <th>Trạng thái hồ sơ</th>
                    <th>Chi tiết học bạ</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $row['ten_nganh']; ?></td>
                        <td><?php echo $row['khoi_xet']; ?></td>
                        <td>
                            <?php
                            if ($row['trang_thai'] == 'da_duyet') {
                                echo 'Đã duyệt';
                            } elseif ($row['trang_thai'] == 'chua_duyet') {
                                echo 'Chưa duyệt';
                            } else {
                                echo 'Không duyệt';
                            }
                            ?>
                        </td>
                        <td><a href="view_hoc_ba.php?id=<?php echo $row['id']; ?>">Xem học bạ</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Bạn chưa nộp hồ sơ nào.</p>
        <?php endif; ?>

        <a href="student.php">Quay lại trang học sinh</a>
    </div>

    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 70%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.table th {
    background-color: #f2f2f2;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}

    </style>
</body>
</html>

<?php
// Đóng kết nối
mysqli_close($conn);
?>
