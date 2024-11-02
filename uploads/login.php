<?php 
  include "../php/loginxuli.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- <link rel="stylesheet" href="../css/stylelogin.css">    -->
    <style>
      html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden; 
}
.container-login {
  display: grid;
  grid-template-columns: 2fr 1fr; 
  font-family: Arial, sans-serif;
  min-height: 100vh;
}
.left-login {
  background-color: lightblue;
}
.left-login img {
  object-fit: cover; 
  display: block;
  width: 100%;
  height: 100vh;
  margin: 0;
  padding: 0;

}
.right-login {
  background-color: #DDDDDD;
  text-align: center;
  place-items: center;
  color: #0d2e7c;
  padding: 40px;
  overflow-y: auto; /* Cho phép cuộn dọc */
  height: 100vh; /* Đảm bảo chiều cao bằng viewport */
}
.right-login a img {
  width: 100px;
  height: 100px;
  margin-top: 20px;
  border-radius: 50%;
}

.form-container {
  height: auto; 
  width: 100%;
  max-width: 450px;
  background-color: #fff;
  padding: 30px;
  border-radius: 8px; 
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
  margin-top: 20px;
}
.input-login {
  width: 100%;
  max-width: 430px;
  height: 40px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #DDDDDD;
  padding: 10px;
  font-size: 16px;
  outline: none; 
  transition: border-color 0.3s;
}
.btn-login {
  width: 100%;
  height: 50px;
  border-radius: 5px;
  background-color: #0d2e7c;
  color: #fff;
  margin-top: 10px;
  margin-bottom: 20px;
  border: none; 
  cursor: pointer; 
  transition: background-color 0.3s; 
}

.btn-login:hover {
  background-color: #0b2b60; 
}


.input-login:hover {
  border-color: #007bff;
}

.form-container-h1 {
  text-align: left;
  
}

.form-container p {
  font-size: 15px;
  float: left;
  color: #a0a0a0;
  margin-top: 0;
  margin-bottom: 40px;
}
.form-login{
  margin-bottom: 30px;
}
.error-message{
  color: red;
  font-size: 13px;
  margin-bottom: 5px;
}
    </style>
</head>
<body>

    <div class="container-login">
        <div class="left-login">
            <img src="2-10.png" alt="">
        </div>

        <div class="right-login">
            <div>
                <a href=""><img src="2-10.png" alt=""></a>
            </div>
            <h3>TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI</h3>
            <h2>CỔNG THÔNG TIN ĐÀO TẠO</h2>

            <div class="form-container">
                <h1 class="form-container-h1">ĐĂNG NHẬP</h1>
                <p>Cổng thông tin đào tạo</p>
                <form action="" method="post" class="form-login">
                    <div class="input-container">
                        <input type="text" name="username" class="input-login"  placeholder="Tên đăng nhập">
                        <div class="error-message"><?php echo $usernameErr; ?></div>
                    </div>

                    <div class="input-container">
                        <input type="password" name="password" class="input-login"  placeholder="Mật khẩu">
                        <div class="error-message"><?php echo $passwordErr; ?></div>
                    </div>

                    <input type="submit" name="submit" value="Đăng nhập" class="btn-login">
                    <div class="error-message"><?php echo $error_message; ?></div>
                    <hr>
                    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng kí</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
