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
    <title>Laporan || Sembakouu</title>
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
			<h1>Laporan Perbulan</h1>
			<div class="box">
				<form action="" method="POST">
					<a>Bulan : </a><input type="month" name="bln" value="Laporan Perhari" class="input-laporan">
					<input type="submit" name="cari" value="Submit" class="input-group-btn">
				</form>
				<form action="cetak.php" method="POST">
					<input type="submit" name="cetak" value="Cetak" class="input-laporan-btn">
				</form>
			</div>
			<div class="box">
			<table align="center">
				<tr>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>No</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Kode Transaksi</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Kode Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Jumlah</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Total Harga</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Waktu</b></td>
				</tr>
			
			
				<?php
				$no = 1;
				if(!(isset($_POST['cari']))){
					$cek = mysqli_query($conn,"SELECT penjualan.kdPenjualan, detail_penjualan.kdBarang, 
					detail_penjualan.Jumlah, detail_penjualan.TotalHarga, penjualan.Waktu
					FROM detail_penjualan
					JOIN penjualan
					ON detail_penjualan.kdPenjualan = penjualan.kdPenjualan
					ORDER BY penjualan.kdPenjualan ASC");
					while ($tampil = mysqli_fetch_array($cek)){
					
					$kdPenjualan = $tampil['kdPenjualan'];
					$kdBarang = $tampil['kdBarang'];
					$Jumlah = $tampil['Jumlah'];
					$TotalHarga = $tampil['TotalHarga'];
					$Waktu = $tampil['Waktu'];
					?>
						<tr>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $no++ ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $kdPenjualan ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $kdBarang ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $Jumlah ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo 'Rp. ' . number_format($TotalHarga,2,',','.'); ?></td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $Waktu ?></td>
						</tr>
						<?php }
					} else{		
						function tgl_indo($tanggal){
							$bln = array (
								1 =>   'Januari',
								'Februari',
								'Maret',
								'April',
								'Mei',
								'Juni',
								'Juli',
								'Agustus',
								'September',
								'Oktober',
								'November',
								'Desember'
							);
							$pecahkan = explode('-', $tanggal);
							
							// variabel pecahkan 0 = tanggal
							// variabel pecahkan 1 = bulan
							// variabel pecahkan 2 = tahun
						 
							return $pecahkan[2] . ' ' . $bln[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
						}			
						$bln = $_POST['bln'];
						$cek2 = mysqli_query($conn, "SELECT penjualan.kdPenjualan, detail_penjualan.kdBarang, 
							detail_penjualan.Jumlah, detail_penjualan.TotalHarga, penjualan.Waktu
							FROM detail_penjualan
							JOIN penjualan
							ON detail_penjualan.kdPenjualan = penjualan.kdPenjualan
							WHERE penjualan.Waktu LIKE '%".$bln."%' 
							ORDER BY penjualan.kdPenjualan ASC"); 
						if(mysqli_num_rows($cek2) > 0){
							while ($tampil = mysqli_fetch_array($cek2)){
								$kdPenjualan = $tampil['kdPenjualan'];
								$kdBarang = $tampil['kdBarang'];
								$Jumlah = $tampil['Jumlah'];
								$TotalHarga = $tampil['TotalHarga'];
								$Waktu = $tampil['Waktu'];
								?>
									<tr>
										<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $no++ ?></td>
										<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $kdPenjualan ?></td>
										<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $kdBarang ?></td>
										<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $Jumlah ?></td>
										<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo 'Rp. ' . number_format($TotalHarga,2,',','.'); ?></td>
										<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'><?php echo $Waktu ?></td>
									</tr>
							<?php }
					} else{
						echo "
							<tr>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Laporan</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Tidak</td>
								<td style='border: 1px #000; padding: 10px 50px 10px 50px;' align='center'>Ditemukan!</td>
							</tr>";
					}echo "</table>
					<center><a href='Listitem.php'><br /><br />Complete list of items</a></center>
					";
				}
				?>
		</div>
              </table>
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