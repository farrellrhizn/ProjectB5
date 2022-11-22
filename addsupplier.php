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
				<li><a href="transaksi.php">Transaksi</a></li>
				<li><a href="laporan.php">Laporan</a></li>
				<li><a href="logout.php" onClick="return confirm('apakah kamu yakin?')">Logout</a></li>
			</ul>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Supplier</h3>
			<div class="box">
				<?php
					if(isset($_POST['tambah'])){
						$cek = mysqli_query($conn,"SELECT MAX(kdSupplier) FROM supplier");
						$barang = mysqli_query($conn,"SELECT * FROM supplier RIGHT JOIN barang USING (kdBarang)
						ORDER BY kdSupplier DESC");

						while ($tampil = mysqli_fetch_array($cek)){

						$NamaSupplier = addslashes($_POST['NamaSupplier']);
						$Alamat = addslashes($_POST['Alamat']);
						$NoHP = addslashes($_POST['NoHP']);
						$kdBarang = addslashes($_POST['kdBarang']);

						$MaxID = $tampil[0];
						$id = (int) substr($MaxID,1,4);
						$MaxID++;
						$NewID = "".sprintf("%04s",$MaxID++);

						//if(empty($NewID) || ($NewID <= 0)){
							//echo "<b style='color: red'>Isi semua kolom dengan benar!</b>";
						//}else if($NewID > 0){
							//echo "<b style='color: red'>Sudah ada Barang dengan ID itu</b>";
						//}else{
							$insert = mysqli_query($conn, "INSERT INTO supplier VALUES ('".$NewID."', '".$NamaSupplier."', '".$Alamat."', '".$NoHP."', '".$kdBarang."')");
							$insert = mysqli_query($conn, "INSERT INTO admin_logs VALUES ('".$_SESSION['user_global']->NamaAdmin."', 'Menambahkan Supplier: ".$NamaSupplier."')");
							
							if($insert){
								echo "<b style='color: green'>Supplier Berhasil Ditambahkan. ID Supplier: $NewID</b>";
							}else{
								echo "<b style='color: red'>Semua kolom telah diisi dengan benar, tetapi terjadi kesalahan saat mengirim ke database, silakan coba lagi nanti!</b>";
							}
						}
						echo "<br /><br />";
					}
				//}
				?>
				<form action="" method="POST">
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Nama Supplier : </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" name="NamaSupplier" value="<?php if(isset($_POST['NamaSupplier'])){ echo $_POST['NamaSupplier']; }?>" placeholder="Nama Supplier..." maxlength="255" required></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Alamat : </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['Alamat'])){ echo $_POST['Alamat']; }?>" placeholder="Alamat..." name="Alamat" required></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">No HP : </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['NoHP'])){ echo $_POST['NoHP']; }?>" placeholder="No HP..." name="NoHP" maxlength="12" required></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Kode Barang : </td>
						<td>
							<select name="kdBarang" class="datepicker-trigger input-control hasDatepicker" required>
								<option value=""> --Pilih-- </option>
								<?php
									$barang = mysqli_query($conn,"SELECT * FROM barang ORDER BY kdBarang DESC");
									while($r = mysqli_fetch_array($barang)){
									?>
									<option value="<?php echo $r['kdBarang'] ?>"><?php echo $r['NamaBarang'] ?></option>
									<?php } ?>
							</select>
						</td>
					</tr>
					<input type="submit" name="tambah" value="Tambah" class="btn">
				</form>
			</div>
		</div>
		<!-- Footer -->
	<footer class="container">
		<div class="pull-right">
			<a href="" target="_blank">Group B5</a>
		</div>
		<div class="pull-left">
			<span>Copyright &copy; 2022 - Sembakouu.</span> © <a href="https://www.instagram.com/farishasan_13/" target="_blank">Developer</a>
		</div>
	</footer>
	</div>
</body>
</html>