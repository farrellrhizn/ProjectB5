<?php
	session_start();
	$timeout = 1; // setting timeout dalam menit
	$logout = "login.php"; // redirect halaman logout

	$timeout = $timeout * 360; // menit ke detik
	if(isset($_SESSION['start_session'])){
		$elapsed_time = time()-$_SESSION['start_session'];
		if($elapsed_time >= $timeout){
			session_destroy();
			echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
		}
	}

	$_SESSION['start_session']=time();

	include 'config.php';

	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
	
	$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Admin || BukaToko</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	
    <!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">BukaToko</a></h1>
			<ul>
				<li><a href="index.php">Dashboard</a></li>
				<li><a href="listadmin.php">Admin</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h3>Daftar Admin</h3>
			<table align="center">
				<tr>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>ID</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Nama</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Username</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Email</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>No HP</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Alamat</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center" href="admin.php"><b>Edit</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center" href="#" onClick="return confirm('apakah kamu yakin?');"><b>Hapus</b></td>
				</tr>
				<?php
				$cek = mysqli_query($conn,"SELECT * FROM users WHERE access=2 ");
					while ($tampil = mysqli_fetch_array($cek)){
					
					$id = $tampil['id'];
					$nama = $tampil['nama'];
					$username = $tampil['username'];
					$email = $tampil['email'];
					$nohp = $tampil['no_hp'];
					$alamat = $tampil['alamat'];
					echo "
						<tr>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$id</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$nama</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$username</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$email</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$nohp</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$alamat</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='admin.php?edit=$id'><img src='img/edit.jpg' width='16px' alt='Função Editar'></a>
							</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='hapusadmin.php'><img src='img/edit.jpg' width='16px' alt='fungsi hapus'></a>
							</td>
						</tr>
					";
		}
				?>
		</div>
	</div>
	
</body>
	<!-- Footer -->
	<footer class="container">
		<div class="pull-right">
			<a href="" target="_blank">Helheim Staff</a>
		</div>
		<div class="pull-left">
			<span>2019 - 2020</span> © <a href="/" target="_blank">Kingofthedeath</a>
		</div>
	</footer>
</html>