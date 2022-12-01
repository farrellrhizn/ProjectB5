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
    <title>Barang || Sembakouu</title>
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
			<h3>Tambah Barang</h3>
			<table border="0px" align="left" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;border-radius:30px;">
				<?php
					if(isset($_POST['tambah'])){
						$cek = mysqli_query($conn,"SELECT MAX(kdBarang) FROM Barang");
						while ($tampil = mysqli_fetch_array($cek)){

						$NamaBarang = addslashes($_POST['NamaBarang']);
						$jenis_barang = addslashes($_POST['jenis_barang']);
						$desk = addslashes($_POST['deskripsi']);

						$HargaBeli = addslashes($_POST['HargaBeli']);
						$HargaJual = addslashes($_POST['HargaJual']);
						$Stok = addslashes($_POST['Stok']);
						$Satuan = addslashes($_POST['Satuan']);

						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'jfif');

						if(!in_array($type2, $tipe_diizinkan)){
							echo 'Format tidak sesuai!';
						}else{
							move_uploaded_file($tmp_name, './img/produk/'.$filename);
						}

						$MaxID = $tampil[0];
						$id = (int) substr($MaxID,1,4);
						$MaxID++;
						$NewID = "".sprintf("%04s",$MaxID++);

						//if(empty($NewID) || ($NewID <= 0)){
							//echo "<b style='color: red'>Isi semua kolom dengan benar!</b>";
						//}else if($NewID > 0){
							//echo "<b style='color: red'>Sudah ada Barang dengan ID itu</b>";
						//}else{
							$insert = mysqli_query($conn, "INSERT INTO barang VALUES ('".$NewID."', '".$NamaBarang."', '".$jenis_barang."', '".$desk."', '".$filename."', '".$HargaBeli."', '".$HargaJual."', '".$Stok."', '".$Satuan."')");
							$insert = mysqli_query($conn, "INSERT INTO admin_logs VALUES ('".$_SESSION['user_global']->NamaAdmin."', 'Menambahkan Barang: ".$NamaBarang."')");
							
							if($insert){
								echo "<b style='color: green'>Barang Berhasil Ditambahkan. ID Barang: $NewID</b>";
							}else{
								echo "<b style='color: red'>Semua kolom telah diisi dengan benar, tetapi terjadi kesalahan saat mengirim ke database, silakan coba lagi nanti!</b>";
							}
						}
						echo "<br /><br />";
					}
				//}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Tanggal Transaksi : </td><td><input type="text" disabled class="input-left" name="NamaBarang" value="<?php echo date('d F Y'); ?>" required></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Nama Pembeli : </td><td><input type="text" class="input-left" name="nama_pembeli" value="<?php if(isset($_POST['nama_pembeli'])){ echo $_POST['nama_pembeli']; } ?>" required></td>
					</tr>
					<tr>
						<br><td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Nama Barang : </td>
						<td>
							<select name="kdBarang" class="input-left" required>
								<option value=""> --Pilih-- </option>
								<?php
									$barang = mysqli_query($conn,"SELECT * FROM barang ORDER BY NamaBarang DESC");
									while($r = mysqli_fetch_array($barang)){
									?>
									<option value="<?php echo $r['NamaBarang'] ?>"><?php echo $r['NamaBarang'] ?></option>
									<?php } ?>
							</select>
						</td></br>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Harga Satuan : <font color="red" style="font-size: 10px;">(Only Numbers)</font>: </td><td><input type="text" class="input-right" value="<?php if(isset($_GET['kdBarang'])){ echo $_POST['HargaJual']; } ?>" name="HargaJual" maxlength="13"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Jumlah : <font color="red" style="font-size: 10px;">(Only Numbers)</font>: </td><td><input type="text" class=" input-right " value="<?php if(isset($_POST['Stok'])){ echo $_POST['Stok'];} ?>" name="Stok" maxlength="13"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Satuan : </td><td><input type="text" disabled class=" input-right" name="Satuan" value="<?php if(isset($_POST['Satuan'])){ echo $_POST['Satuan']; } ?>" required></td>
					</tr>
					
					<input type="submit" name="tambah" value="Tambah" class="btn">
				</form>
				
									</table>
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