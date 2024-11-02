<?php
    include "../php/studentxuli.php";

    // Hàm để lấy danh sách môn thi dựa trên khối xét tuyển
    function getSubjectsByKhoi($khoiXet) {
        switch ($khoiXet) {
            case "A00":
                return "Toán, Lý, Hóa";
            case "A01":
                return "Toán, Lý, Anh";
            case "C00":
                return "Văn, Sử, Địa";
            // Thêm các khối xét khác nếu cần
            default:
                return "";
        }
    }

    // Kiểm tra nếu form được submit và lấy giá trị khối xét
    $selectedKhoi = isset($_GET['khoi_xet']) ? $_GET['khoi_xet'] : '';
    $subjects = $selectedKhoi ? getSubjectsByKhoi($selectedKhoi) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang dành cho học sinh</title>
    <link rel="stylesheet" href="../css/stylestudent.css">
</head>
<body>
    <div class="container">
        <h2>Chào mừng <?php echo $_SESSION['username']; ?>!</h2>
        <h3>Danh sách các ngành xét tuyển</h3>
        <a href="state.php">Các ngành đã đăng kí</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Tên ngành</th>
                    <th>Khối xét tuyển</th>
                    <th>Thời gian xét tuyển</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['ten_nganh']; ?></td>
                        <td><?php echo $row['khoi_xet_tuyen']; ?></td>
                        <td><?php echo $row['thoi_gian']; ?></td>
                        <td><?php echo $row['trang_thai']; ?></td>
                        <td>
                            <!-- Form gửi dữ liệu lựa chọn khối xét -->
                            <form action="" method="GET">
                                <input type="hidden" name="nganh_id" value="<?php echo $row['id_nganh']; ?>">
                                <select name="khoi_xet" onchange="this.form.submit()">
                                    <option value="">Chọn khối xét</option>
                                    <option value="A00" <?php if ($selectedKhoi == "A00") echo 'selected'; ?>>A00 - Toán, Lý, Hóa</option>
                                    <option value="A01" <?php if ($selectedKhoi == "A01") echo 'selected'; ?>>A01 - Toán, Lý, Anh</option>
                                    <option value="C00" <?php if ($selectedKhoi == "C00") echo 'selected'; ?>>C00 - Văn, Sử, Địa</option>
                                    <!-- Thêm các khối xét khác tại đây -->
                                </select>
                            </form>
                            <?php if ($row['id_nganh'] == $_GET['nganh_id'] && $subjects): ?>
                                <div>Môn thi: <?php echo $subjects; ?></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="login.php" class="btn-logout">Đăng xuất</a>
    </div>
</body>
</html>
