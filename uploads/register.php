<?php 
  include "../php/registerxuli.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <!-- <link rel="stylesheet" href="../css/styleregister.css"> -->
    <style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden; 
}
.container-register {
  display: grid;
  grid-template-columns: 2fr 1fr; 
  font-family: Arial, sans-serif;
  min-height: 100vh;
}
.left-register {
  background-color: lightblue;
}
.left-register img {
  object-fit: cover; 
  display: block;
  width: 100%;
  height: 100vh;
  margin: 0;
  padding: 0;

}
.right-register {
  background-color: #DDDDDD;
  text-align: center;
  place-items: center;
  color: #0d2e7c;
  padding: 40px;
  overflow-y: auto; /* Cho phép cuộn dọc */
  height: 100vh; /* Đảm bảo chiều cao bằng viewport */
}
.right-register a img {
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
.input-register { 
  width: 100%;
  height: 40px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #DDDDDD;
  padding: 10px;
  font-size: 16px;
  outline: none; 
  transition: border-color 0.3s;
}
.btn-register {
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

.btn-register:hover {
  background-color: #0b2b60; 
}


.input-register:hover {
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
.form-register{
  margin-bottom: 30px;
}

label {
  font-size: 16px;
  color: #333;
  margin-bottom: 5px;
  display: inline-block;
}

#opt-register {
  width: 100%;
  padding: 20px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  color: #333;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  transition: border-color 0.3s;
  outline: none;
}

/* Thêm một mũi tên nhỏ để thể hiện đây là dropdown */
#opt-register::after {
  content: "▼";
  font-size: 12px;
  color: #777;
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
}

/* Hiệu ứng khi focus */
#opt-register:focus {
  border-color: #5d9cec;
  background-color: #fff;
}

/* CSS cho tùy chọn bên trong */
#opt-register option {
  padding: 10px;
}

    </style>
</head>
<body>
<div class="container-register"> 
  <div class="left-register">
      <img src="2-10.png" alt="">
  </div>

  <div class="right-register">
    <div>
        <a href=""><img src="2-10.png" alt=""></a>
    </div>
    <div class="form-container">
        <form action="" method="post" class="form-register">
        <h1 style="text-align: center;">Đăng kí</h1><br>

        <label for="" class="label-register"></label><br>
        <input type="text" name="fullname" class="input-register" required placeholder="Họ và tên">
        <br>

        <label for="" class="label-register"></label><br>
        <input type="password" name="password" id="" class="input-register" required placeholder="Mật khẩu">
        <br>

        <label for="" class="label-register"></label><br>
        <input type="password" name="confirm-password" id="" class="input-register" required placeholder="Nhập lại mật khẩu">
        <br>

        <label for="" class="label-register"></label><br>
        <input type="date" name="dob" id="" class="input-register" required placeholder="Ngày sinh">
        <br>

        

        <label for="">Giới tính</label>
        <select name="gender" id="" class="input-register" id="opt-register" placeholder="Giới tính">
          <option value="nam">Nam</option>
          <option value="nu">Nữ</option>
          <option value="other">Other</option>
        </select>
        <br>

        <label for="" class="label-register"></label><br>
        <input type="text" name="email" class="input-register" required placeholder="Email">
        <br>

        <label for="" class="label-register"></label><br>
        <input type="text" name="phone" class="input-register" required placeholder="Số điện thoại">
        <br>

        <label for="" class="label-register"></label><br>
        <input type="text" name="address" class="input-register" required placeholder="Địa chỉ">
        <br>

        <label for="" class="label-register"></label><br>
        <input type="text" name="cccd" class="input-register" required placeholder="Căn cước công dân">
        <br>  

        <input type="submit" name="submit" value="Đăng kí" class="btn-register">
        <br>

        <label for="">Already have an account?</label>
        <a href="login.php">Login</a>
        </form>
    </div>
  </div>
</div>


    

</body>
</html>
