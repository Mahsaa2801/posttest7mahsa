<?php
    session_start();
    require 'koneksi.php';  
    if(isset($_SESSION['login'])) {
        header("Location: config.php");

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){
                header("Location: config.php");
                $_SESSION['login'] = true;
                echo"
                <script>
                alert('Sign In berhasil!');
                document.location.href='config.php';
                </script>";
                exit;
            } 
        } else {
            echo "
            <script>
            alert('Username atau Password salah!');
            document.location.href='login.php';
            </script>";
    
    }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style3.css">
    </head>
    <body>
		  <div class="signin_body">
			  <div class="signin_box">
				<h2>LOGIN</h2>
				<form action="" method="POST">
					<div class="input_wrap">
						<input type="username" name="username" id="username" placeholder="Username" required>
						<input type="password" name="password" id="username" placeholder="Password" required>
						<button type="submit" name="login">login</button>
					</div>
				</form>
				<p>Belum punya akun? <a href="regist.php" style="color: red; text-decoration: none;">Registrasi</a></p>
			  </div>
		  </div>
           
    </body>
</html>