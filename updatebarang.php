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
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
	include('config.php');
	
?>
<?php
if(isset($_POST['simpan']) ){
						$conn->autocommit(false);
						try{
							$foto_tmp = $_FILES['image']['tmp_name'];
							$nama_foto = $_FILES['image']['name'];

							$NamaBarang = addslashes($_POST['NamaBarang']);
							$jenis_barang = addslashes($_POST['jenis_barang']);
							$desk = addslashes($_POST['deskripsi']);
							$gambar = $nama_foto;
							$gambarlawas = addslashes($_POST['gambarlawas']);
							$HargaBeli = addslashes($_POST['HargaBeli']);
							$HargaJual = addslashes($_POST['HargaJual']);
							$Stok = addslashes($_POST['Stok']);
							$Satuan = addslashes($_POST['Satuan']);
							$kdSupplier = addslashes($_POST['kdSupplier']);

							
							
						//if(empty($NewID) || ($NewID <= 0)){
							//echo "<b style='color: red'>Isi semua kolom dengan benar!</b>";
						//}else if($NewID > 0){
							//echo "<b style='color: red'>Sudah ada Barang dengan ID itu</b>";
						//}else{
							if($nama_foto==""){
								mysqli_query($conn, "UPDATE barang SET `NamaBarang` = '".$NamaBarang."', `jenis_barang` = '".$jenis_barang."', `deskripsi` = '".$desk."',  `gambar` = '".$gambarlawas."', `HargaBeli` = '".$HargaBeli."', `HargaJual` = '".$HargaJual."', `Stok` = '".$Stok."', `Satuan` = '".$Satuan."', `kdSupplier` = '".$kdSupplier."' WHERE kdBarang = '".$_POST['kdBarang']."' ");
								mysqli_query($conn,"INSERT INTO admin_logs VALUES ('', '".$_SESSION['user_global']->NamaAdmin."', 'Mengedit Barang: ".$NamaBarang."')");
								$conn->commit();
								echo "<div class='alert alert-success fade in block-inner'>
								<button type='button' class='close' data-dismiss='alert'></button>
								Edit Barang Berhasil! - Dialihkan dalam 5 detik...<script type='text/javascript' language='JavaScript'>
								setTimeout(function () { location.href = 'listbarang.php';
								}, 5000);
								</script>
								</div>";
							}else{
								mysqli_query($conn, "UPDATE barang SET `NamaBarang` = '".$NamaBarang."', `jenis_barang` = '".$jenis_barang."', `deskripsi` = '".$desk."',  `gambar` = 'http://localhost/img/produk/".$gambar."', `HargaBeli` = '".$HargaBeli."', `HargaJual` = '".$HargaJual."', `Stok` = '".$Stok."', `Satuan` = '".$Satuan."', `kdSupplier` = '".$kdSupplier."' WHERE kdBarang = '".$_POST['kdBarang']."' ");
								mysqli_query($conn,"INSERT INTO admin_logs VALUES ('', '".$_SESSION['user_global']->NamaAdmin."', 'Mengedit Barang: ".$NamaBarang."')");
								$check_upload = move_uploaded_file($foto_tmp, './img/produk/' . $nama_foto);
								$conn->commit();
								echo "<div class='alert alert-success fade in block-inner'>
								<button type='button' class='close' data-dismiss='alert'></button>
								Edit Barang Berhasil! - Dialihkan dalam 5 detik...<script type='text/javascript' language='JavaScript'>
								setTimeout(function () { location.href = 'listbarang.php';
								}, 5000);
								</script>
								</div>";
							}
						}catch(Exception $e){
							$conn->rollback();
							$response['message'] = $e->getMessage();
							echo "<script>
							alert('Ubah Barang Gagal!'); 
							</script>";
						}
					}
						?>