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
    <title>Supplier || Sembakouu</title>
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
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h2>Data Supplier</h2>
				<div class="box-list">
				<div class="block-title">
				<form action="" method="POST">
				<h3>Cari Supplier</h3>
					<div class="input-control-add">
						<input type="text" name="cari" autocomplete="off" id="cari" class="input-control-add" placeholder="Cari Supplier...">
						<button type="submit" name="submit" value="cari" class="input-group-btn"><a>Cari </a></button>
					</div>
				</form>
				<form action="addsupplier.php" method="GET">
				<h3> Tambah Supplier</h3>
					<div class="input-control-add">
						<button type="submit" value="Tambah" class="input-group-btn"><a>Tambah</a></button>
					</div>
				</form>
				</div>
				</form>
			</div>
			<table align="center" class="box-list">
				<tr>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Kode Supplier</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Nama Supplier</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Alamat</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>No HP</b></td>
					<td style='border: 1px #000; padding: 10px 10px 10px 10px;' align="center"><b>Gambar</b></td>
					<td style='border: 1px #000; padding: 10px 10px 10px 10px;' align="center"><b>Action</b></td>
				</tr>
			
			
				<?php
				if(!(isset($_POST['submit']))){
					
					$cek = mysqli_query($conn,"SELECT supplier.kdSupplier, supplier.NamaSupplier,
					supplier.Alamat, supplier.NoHP, barang.gambar 
					FROM supplier
					RIGHT JOIN barang
					ON supplier.kdSupplier = barang.kdSupplier
					GROUP BY kdSupplier ASC ");
					while ($tampil = mysqli_fetch_array($cek)){
					
					$id = $tampil['kdSupplier'];
					$nama = $tampil['NamaSupplier'];
					$alamat = $tampil['Alamat'];
					$nohp = $tampil['NoHP'];
					$gambar = $tampil['gambar'];
					?>
						<tr>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $id ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $nama ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $alamat ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $nohp ?></td>
							<td align='center'><img src="<?php echo $gambar ?>" width="50px"></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='editsupplier.php?kdSupplier=<?php echo $id ?>'><img src='img/edit.jpg' width='16px'></a>
							</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
							<a href='hapus.php?deletes=<?php echo $id?>'><img src='img/edit.jpg' width='16px' alt='fungsi hapus' onClick="return confirm('apakah kamu yakin?')"></a>
							</td>
						</tr>
						<?php
						}
					} else{
					$cari = $_POST['cari'];
					$cek2 = mysqli_query($conn,"SELECT * FROM supplier WHERE NamaSupplier LIKE '%".$cari."%' OR kdBarang LIKE '%".$cari."%'");
					if(mysqli_num_rows($cek2) > 0){
						while ($tampil = mysqli_fetch_array($cek2)){
							$id = $tampil['kdSupplier'];
							$nama = $tampil['NamaSupplier'];
							$alamat = $tampil['Alamat'];
							$nohp = $tampil['NoHP'];
							$barang = $tampil['kdBarang'];
							?>
								<tr>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $id ?></td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $nama ?></td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $alamat ?></td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $nohp ?></td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
										<a href='editsupplier.php?kdSupplier=<?php echo $id?>'><img src='img/edit.jpg' width='16px' alt='Função Editar'></a>
									</td>
									<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
									<a href='hapus.php?deletes=<?php echo $id?>'><img src='img/edit.jpg' width='16px' alt='fungsi hapus' onClick="return confirm('apakah kamu yakin?')"></a>
									</td>
								</tr>
								<?php
						}
					} else{
						echo "
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Supplier</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Tidak</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Ditemukan!</td>
							</tr>";
					}echo "</table>
					
					";
				} 
				?>
		</div>
	</div>
	
	
</body>

</html>