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
				<li><a href="laporan.php">Laporan</a></li>
				<li><a href="logout.php" onClick="return confirm('apakah kamu yakin?')">Logout</a></li>
			</ul>
			<h4><br><br><br>Selamat Datang <?php echo $_SESSION['user_global']->NamaAdmin ?><br><br></h4>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h2>Dashboard</h2>
			<div class="box-list">
			<div class="block-title">
			<form action="listbarang.php" method="POST">
				<h3> Cari Barang</h3>
					<div class="input-control-add">
						<input type="text" name="cari" id="cari" class="input-control-add" autocomplete="off" placeholder="Cari Barang...">
							<button type="submit" name="submit" value="cari" class="input-group-btn" ><a>Cari </a></button>
					</div>
				</form>
				<form action="" method="POST">
				<h3> Pendapatan Hari Ini</h3>
					<div class="input-control-pendapatan">
						<input type="text" name="pendapatan" disabled id="cari" class="input-control-pendapatan" value="<?php
						$cek1 = "SELECT penjualan.Waktu,SUM(detail_penjualan.TotalHarga) AS total
						FROM penjualan 
						JOIN detail_penjualan 
						ON penjualan.kdPenjualan = detail_penjualan.kdPenjualan
						WHERE penjualan.Waktu=DATE(NOW())
						GROUP BY penjualan.Waktu";
						$result1 = mysqli_query($conn, $cek1);
						if ($result1->num_rows > 0) {
							$tampil1 = mysqli_fetch_array($result1);
							$total = $tampil1['total'];
							echo 'Rp. ' . number_format($total,2,',','.');
						}else{
							$total = 0;}  ?>">
					</div>
					<?php
					echo '&nbsp;&nbsp;&nbsp;';
					echo date('d F Y');
					?>
				</form>
			</div>
			</div>
			<table align="center" class="box-list">
			<div class="block-title">
			<tr>
				<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Kode Barang</b></td>
				<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Nama Barang</b></td>
				<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Jenis Barang</b></td>
				<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Gambar</b></td>
				<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Harga Jual</b></td>
				<td style='border: 1px #000; padding: 10px 10px 10px 10px;' align="center"><b>Stok</b></td>
				<td style='border: 1px #000; padding: 10px 10px 10px 10px;' align="center"><b>Satuan</b></td>
			</tr>

				<?php
				if(isset($_POST['cari'])){
					$cek2 = mysqli_query($conn,"SELECT * FROM barang WHERE NamaBarang LIKE '%".$cari."%' OR jenis_barang LIKE '%".$cari."%'");
					if(mysqli_num_rows($cek2) > 0){
						while ($tampil = mysqli_fetch_array($cek2)){
							$id = $tampil['kdBarang'];
							$nama = $tampil['NamaBarang'];
							$jenis_barang = $tampil['jenis_barang'];
							$gambar = $tampil['gambar'];
							$HargaJual = $tampil['HargaJual'];
							$Stok = $tampil['Stok'];
							$Satuan = $tampil['Satuan'];
						}
						}
					}else{
						$cek = mysqli_query($conn,"SELECT * FROM barang WHERE Stok <= 10");
						while ($tampil = mysqli_fetch_array($cek)){
							$id = $tampil['kdBarang'];
							$nama = $tampil['NamaBarang'];
							$jenis_barang = $tampil['jenis_barang'];
							$gambar = $tampil['gambar'];
							$HargaJual = $tampil['HargaJual'];
							$Stok = $tampil['Stok'];
							$Satuan = $tampil['Satuan'];
						?>
						<tr>
							<td align='center'><?php echo $id ?></td>
							<td align='center'><?php echo $nama ?></td>
							<td align='center'><?php echo $jenis_barang ?></td>
							<td align='center'><img src="<?php echo $gambar ?>" width="50px"></td>
							<td align='center'><?php echo 'Rp. ' . number_format($HargaJual,2,',','.'); ?></td>
							<td align='center'><?php echo $Stok ?></td>
							<td align='center'><?php echo $Satuan ?></td>
						</tr>
						<?php
						}
					}
						$cek1 = "SELECT penjualan.Waktu,SUM(detail_penjualan.TotalHarga) AS total
						FROM penjualan 
						JOIN detail_penjualan 
						ON penjualan.kdPenjualan = detail_penjualan.kdPenjualan
						WHERE penjualan.Waktu=DATE(NOW())
						GROUP BY penjualan.Waktu";
						$result1 = mysqli_query($conn, $cek1);
						if ($result1->num_rows > 0) {
						$tampil1 = mysqli_fetch_array($result1);
						$total = $tampil1['total'];
						}else $total = 0;
					
					
				?>
				</div>
			</div>
		</div>
	</div>
				
	
</body>

</html>