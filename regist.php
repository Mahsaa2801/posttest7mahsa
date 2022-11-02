<?php
    session_start();
    require 'koneksi.php';
    if(isset($_POST['regist'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpass = $_POST['cpass'];
        if($password === $cpass) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        } else{
            echo "
            <script>
                alert('Password Tidak Sesuai!');
                document.location.href = 'regist.hp'
            </script>";
        }
        if (mysqli_fetch_assoc($result)){
            echo"
            <script>
            alert('Username Telah Digunakan');
            document.location.href = 'regist.php';
            </script>";
        }else{
            $sql = "INSERT INTO user VALUES ('', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
        }
        if (mysqli_affected_rows($conn)> 0){
            echo"
            <script>
            alert('Registrasi Telah Berhasil');
            document.location.href = 'login.php';
            </script>";
        }else{
            echo"
            <script>
            alert('Registrasi Gagal');
            document.location.href = 'regist.php';
            </script>";
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Registrasi</title>
        <link rel="stylesheet" href="style3.css">
    </head>
    <body>
		  <div class="signup_body">
			  <div class="signup_box">
				<h2>REGISTRASI</h2>
				<form action="" method="POST">
                    <div class="input_wrap">
						<input type="text" name="username" id="username" placeholder="Username" required>
						<input type="password"  name="password" placeholder="Password" required>
						<input type="password" name="cpass" placeholder="Konfirmasi Password" required>
						<a href="regist.php">
							<button type="submit" name="regist">Registrasi</button>
						</a>
					</div>
				</form>
				<p>Sudah punya akun? <a href="login.php"  style="color: red; text-decoration: none;">Login</a></p>
			  </div>
		  </div>
    </body>
</html>