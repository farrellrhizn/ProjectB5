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

	include('config.php');
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Dashboard || Sembakouu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	
    <!-- header -->
	<header>
		<div class="container">
		<h1><a href="home.php">Sembakouu</a></h1>
			<ul>
				<li><a href="home.php">Dashboard</a></li>
				<li><a href="admin.php">Profile</a></li>
				<li><a href="listbarang.php">Barang</a></li>
				<li><a href="listsupplier.php">Supplier</a></li>
				<li><a href="listsupplier.php">Transaksi</a></li>
				<li><a href="listsupplier.php">Laporan</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h2>Data Barang</h2>
				<div class="box-list">
				<div class="block-title">
					<h3><i class="fa fa-search"></i> Tambah Barang</h3>
				</div>
				<form action="addbarang.php" method="POST">
					<div class="input-control-add">
						<input type="text" class="input-control-add" placeholder="Nama Barang...">
							<button type="submit" value="Tambah" class="input-group-btn"><a>Tambah</a></button>
					</div>
				</form>
				<form action="" method="POST">
				<h3><i class="fa fa-search"></i> Cari Barang</h3>
					<div class="input-control-add">
						<input type="text" name="cari" id="cari" class="input-control-add" placeholder="Cari Barang...">
							<button type="submit" name="submit" value="cari" class="input-group-btn"><a>Cari </a></button>
					</div>
				</form>
			</div>
			<table align="center">
				<tr>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Kode Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Nama Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Jenis Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Harga Beli</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Harga Jual</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Stok</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Satuan</b></td>
					<td style='border: 1px #000; padding: 10px 0px 10px 0px;' align="center" href="editbarang.php"><b>Edit</b></td>
					<td style='border: 1px #000; padding: 10px 0px 10px 0px;' align="center" href="#" onClick="return confirm('apakah kamu yakin?');"><b>Hapus</b></td>
				</tr>
			
			
				<?php
				if(!(isset($_POST['submit']))){
					$cek = mysqli_query($conn,"SELECT * FROM barang ");
					
					while ($tampil = mysqli_fetch_array($cek)){
					
					$id = $tampil['kdBarang'];
					$nama = $tampil['NamaBarang'];
					$jenis_barang = $tampil['jenis_barang'];
					$HargaBeli = $tampil['HargaBeli'];
					$HargaJual = $tampil['HargaJual'];
					$Stok = $tampil['Stok'];
					$Satuan = $tampil['Satuan'];
					echo "
						<tr>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$id</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$nama</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$jenis_barang</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$HargaBeli</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$HargaJual</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$Stok</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$Satuan</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='editbarang.php?edit=$id'><img src='img/edit.jpg' width='16px'></a>
							</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='hapus.php'><img src='img/edit.jpg' width='16px' alt='fungsi hapus' ></a>
							</td>
						</tr>
						";
						}
					} else{
					$cari = $_POST['cari'];
					$cek2 = mysqli_query($conn,"SELECT * FROM barang WHERE NamaBarang LIKE '%".$cari."%' OR jenis_barang LIKE '%".$cari."%'");
					if(mysqli_num_rows($cek2) > 0){
						while ($tampil = mysqli_fetch_array($cek2)){
							$id = $tampil['kdBarang'];
							$nama = $tampil['NamaBarang'];
							$jenis_barang = $tampil['jenis_barang'];
							$HargaBeli = $tampil['HargaBeli'];
							$HargaJual = $tampil['HargaJual'];
							$Stok = $tampil['Stok'];
							$Satuan = $tampil['Satuan'];
							echo "
								<tr>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$id</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$nama</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$jenis_barang</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$HargaBeli</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$HargaJual</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$Stok</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$Satuan</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
										<a href='admin.php?edit=$id'><img src='img/edit.jpg' width='16px' alt='Função Editar'></a>
									</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
										<a href='hapus.php'><img src='img/edit.jpg' width='16px' alt='fungsi hapus'></a>
									</td>
								</tr>
								";
						}
					} else{
						echo "
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Barang</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Tidak</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Ditemukan!</td>
							</tr>";
					}echo "</table>
					<center><a href='Listitem.php'><br /><br />Complete list of items</a></center>
					";
				} 
				?>
		</div>
	</div>
	
	
</body>

</html>