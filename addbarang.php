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
	<script src="dist/sweetalert2.all.min.js"></script>
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
				<li><a href="logout.php" id="logout">Logout</a></li>
			</ul>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Barang</h3>
			<div class="box">
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
						$kdSupplier = addslashes($_POST['kdSupplier']);

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
							$insert = mysqli_query($conn, "INSERT INTO barang VALUES ('".$NewID."', '".$NamaBarang."', '".$jenis_barang."', '".$desk."', 'http://localhost/img/produk/".$filename."', '".$HargaBeli."', '".$HargaJual."', '".$Stok."', '".$Satuan."', '".$kdSupplier."')");
							$insert = mysqli_query($conn, "INSERT INTO admin_logs VALUES ('', '".$_SESSION['user_global']->NamaAdmin."', 'Menambahkan Barang: ".$NamaBarang."')");
							
							if($insert){
								?>
								<script>
								Swal.fire({
									title: 'Berhasil!',
									text: 'Barang Berhasil Ditambahkan. ID Barang: <?php echo $NewID ?>',
									icon: 'success'
								}).then((result) => {
									window.location="listbarang.php";
								})
								</script>
								<?php
								
							}else{
								echo "<b style='color: red'>Semua kolom telah diisi dengan benar, tetapi terjadi kesalahan saat mengirim ke database, silakan coba lagi nanti!</b>";
							}
						}
					}
				//}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Nama Barang : </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" name="NamaBarang" value="<?php if(isset($_POST['NamaBarang'])){ echo $_POST['NamaBarang']; }?>" placeholder="Nama Barang..." maxlength="255" required></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Jenis Barang : </td>
						<td>
							<select name="jenis_barang" class="datepicker-trigger input-control hasDatepicker" onchange="exibeMsg(this.value);">
								<option value="Sembako">Sembako</option>
								<option value="Alat Tulis">Alat Tulis</option>
								<option value="Minuman">Minuman</option>
								<option value="Makanan">Makanan</option>
								<option value="Makanan Ringan">Makanan Ringan</option>
								<option value="Perlengkapan Mencuci">Perlengkapan Mencuci</option>
								<option value="Bumbu Dapur">Bumbu Dapur</option>
								<option value="Kebutuhan Rumah Tangga">Kebutuhan Rumah Tangga</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Deskripsi : </td><td><textarea type="text" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['deskripsi'])){ echo $_POST['deskripsi']; }?>" placeholder="Deskripsi Barang..." name="deskripsi" required></textarea></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Gambar : </td><td><input type="file" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['gambar'])){ echo $_POST['gambar']; }?>" name="gambar" maxlength="255" required></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Harga Beli <font color="red" style="font-size: 10px;">(Only Numbers)</font>: </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['HargaBeli'])){ echo $_POST['HargaBeli']; }else{ echo 0; } ?>" name="HargaBeli" maxlength="13"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Harga Jual <font color="red" style="font-size: 10px;">(Only Numbers)</font>: </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['HargaJual'])){ echo $_POST['HargaJual']; }else{ echo 0; } ?>" name="HargaJual" maxlength="13"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Stok <font color="red" style="font-size: 10px;">(Only Numbers)</font>: </td><td><input type="text" class="datepicker-trigger input-control hasDatepicker" value="<?php if(isset($_POST['Stok'])){ echo $_POST['Stok']; }else{ echo 0; } ?>" name="Stok" maxlength="13"></td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Satuan : </td>
						<td>
							<select name="Satuan" class="datepicker-trigger input-control hasDatepicker" onchange="exibeMsg(this.value);">
								<option value="Kilogram">Kilogram</option>
								<option value="Liter">Liter</option>
								<option value="Pcs">Pcs</option>
								<option value="Ons">Ons</option>
								<option value="Paket">Paket</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align="right">Nama Supplier : </td>
						<td>
							<select name="kdSupplier" class="datepicker-trigger input-control hasDatepicker">
								<option value=""> --Pilih-- </option>
								<?php
									$sup = mysqli_query($conn,"SELECT * FROM supplier ORDER BY kdSupplier DESC");
									while($s = mysqli_fetch_array($sup)){
									?>
									<option value="<?php echo $s['kdSupplier'] ?>"><?php echo $s['NamaSupplier'] ?></option>
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