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

// Kiểm tra xem có chọn ngành hay không
$nganh_id = $_GET['id'] ?? null;
$major = null;
$scores = [];

if ($nganh_id) {
    // Lấy thông tin ngành đã chọn
    $major_query = "SELECT * FROM majors WHERE id = $nganh_id";
    $major_result = mysqli_query($conn, $major_query);
    $major = mysqli_fetch_assoc($major_result);

    // Kiểm tra xem có môn nào tương ứng với khối xét tuyển không
    if ($major) {
        $block_query = "SELECT * FROM subjects WHERE khoi_xet = '{$major['khoi_xet']}'";
        $block_result = mysqli_query($conn, $block_query);

        // Nếu có môn được chọn từ biểu mẫu
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject_id = $_POST['subject'] ?? null;
            if ($subject_id) {
                // Lấy điểm cho môn đã chọn
                $scores_query = "SELECT * FROM scores WHERE subject_id = $subject_id";
                $scores_result = mysqli_query($conn, $scores_query);
                while ($row = mysqli_fetch_assoc($scores_result)) {
                    $scores[$row['mon_hoc']] = $row['diem']; // Điều chỉnh theo cấu trúc bảng của bạn
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nộp Hồ Sơ</title>
    <link rel="stylesheet" href="../css/stylestudent.css">
</head>
<body>
    <div class="container">
        <?php if ($major): ?>
            <h2>Nộp Hồ Sơ cho Ngành: <?php echo $major['ten_nganh']; ?></h2>
            <h3>Khối Xét Tuyển: <?php echo $major['khoi_xet']; ?></h3>

            <form action="submit.php?nganh_id=<?php echo $nganh_id; ?>" method="post">
                <label for="subject">Chọn Môn Xét Tuyển:</label>
                <select name="subject" id="subject" onchange="this.form.submit()">
                    <option value="">Chọn môn</option>
                    <?php while ($row = mysqli_fetch_assoc($block_result)): ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo isset($subject_id) && $subject_id == $row['id'] ? 'selected' : ''; ?>>
                            <?php echo $row['ten_mon']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                
                <h3>Điểm Các Môn:</h3>
                <div id="scores">
                    <?php if ($scores): ?>
                        <?php foreach ($scores as $mon_hoc => $diem): ?>
                            <p><?php echo $mon_hoc . ': ' . $diem; ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Chưa có điểm cho môn này.</p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-submit">Gửi Hồ Sơ</button>
            </form>

            <a href="student_dashboard.php" class="btn-back">Quay lại</a>
        <?php else: ?>
            <p>Ngành không tồn tại.</p>
        <?php endif; ?>
    </div>
</body>
</html>
