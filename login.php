<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Login || Sembakouu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
		<img src="img/Logo500.png">
        <form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control" minlength="4">
			<input type="submit" name="submit" value="Login" class="btn">
			<a href="https://wa.wizard.id/c5da7d" target="_blank"> <br>Lupa Password! </a>
		</form>
		<?php
			if(isset($_POST['submit'])){
				session_start();
				include 'config.php';
				
				$user = $_POST['user'];
				$pass = $_POST['pass'];

				$cek = mysqli_query($conn, "SELECT * FROM penjual WHERE Username ='".$user."' AND Password = '".MD5($pass)."'");
				$cek2 = mysqli_query($conn, "SELECT * FROM pembeli WHERE Username ='".$user."' AND Password = '".($pass)."'");
				$cek3 = mysqli_query($conn, "SELECT * FROM penjual WHERE Username ='".$user."'");
				$cek4 = mysqli_query($conn, "SELECT * FROM penjual WHERE Password ='".MD5($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['user_global'] = $d;
					$_SESSION['idAdmin'] = $d->idAdmin;
					echo '<script>alert("Login Berhasil!")</script>';
					echo '<script>window.location="home.php"</script>';
				}elseif (mysqli_num_rows($cek2) > 0){
					$d = mysqli_fetch_object($cek);
					echo '<script>alert("Anda tidak memiliki access, silahkan kembali!")</script>';
					echo '<script>window.location="login.php"</script>';
				}elseif (mysqli_num_rows($cek3) > 0){
					$d = mysqli_fetch_object($cek);
					echo '<script>alert("Password anda salah!")</script>';
					echo '<script>window.location="login.php"</script>';
				}elseif (mysqli_num_rows($cek4) > 0){
					$d = mysqli_fetch_object($cek);
					echo '<script>alert("Username anda salah!")</script>';
					echo '<script>window.location="login.php"</script>';
				}else{
					echo '<script>alert("Username atau Password anda salah!")</script>';
				}
			}
		?>
	</div>
</body>
</html>