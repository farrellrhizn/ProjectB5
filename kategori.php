<?php
	session_start();
	include('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Sembakouu</title>
  </head>
  <body>

    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logononame50.png" alt="Sembakouu" width="50" height="50" class="">
                Sembakouu
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex" class="ms-auto my-4 my-lg-0" action="index.php" method="POST">
                <input class="form-control me-2" type="search" name="cari" id="cari" placeholder="Cari Barang..." >
                <button type="submit" name="submit" class="btn btn-light" value="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Barang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
			        <li class="nav-item">
                <a class="nav-link active" href="#" style="background-color: #cd5c5c; padding: 5px 10px;">Download APK!</a>
              </li>
            </ul>
			
          </div>
        </div>
      </nav>
      <!-- Akhir Navbar -->
      

    <!-- Awal Carousel-->
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img1.jpg" class="d-block img-fluid" alt="Gambar 1">
          </div>
          <div class="carousel-item">
            <img src="assets/img2.jpg" class="d-block img-fluid" alt="Gambar 2">
          </div>
          <div class="carousel-item">
            <img src="assets/img3.jpg" class="d-block img-fluid" alt="Gambar 3">
          </div>
          <div class="carousel-item active">
            <img src="assets/img4.jpg" class="d-block img-fluid" alt="Gambar 4">
          </div>
          <div class="carousel-item active">
            <img src="assets/img5.jpg" class="d-block img-fluid" alt="Gambar 5">
          </div>
          <div class="carousel-item active">
            <img src="assets/img6.jpg" class="d-block img-fluid" alt="Gambar 6">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
      <!-- Akhir Carsoul -->

      <!-- Awal Kategori -->
      <div class="container mt-5">
        <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px;">
            <h5 class="text-center" style="margin-top: 5px;">KATEGORI</h5>
        </div>
        <div class="row text-center row-container mt-2">
        <?php
          if(!(isset($_POST['jenis_barang']))){
           $query = mysqli_query($conn, "SELECT * FROM kategori ");
           while ($data = mysqli_fetch_array($query)) {
            $jenis = $data['jenis_barang'];
            $gambar2 = $data['gambar'];
            ?> 
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a name="jenis_barang" href="kategori.php?jenis=<?php echo $jenis?>"><img src="img/kategori/<?php echo $gambar2 ?>" class="img-categori mt-3"></a>
                    <p class="mt-2"><?php echo $jenis?></p>
                </div>
            </div>
           <?php 
           } 
           ?>
        </div>
      </div>
      <!-- Akhir Kategori -->

      <!-- Awal Produk -->
      <div class="container mt-2">
	  	  <div class="judul-produk" style="background-color: #fff; padding: 5px 10px;">
            <h5 class="text-center" style="margin-top: 5px;">PRODUK</h5>
        </div>
        <div class="row">
			<?php 
			if(isset($_POST['kategori']) && (isset($_GET['submit'])) && (isset($_GET['cari'])) && (isset($_GET['jenis'])) ){
			$cek = mysqli_query($conn,"SELECT * FROM barang ORDER BY jenis_barang DESC");
        while($tampil = mysqli_fetch_assoc($cek)){		
        $id = $tampil['kdBarang'];
				$nama = $tampil['NamaBarang'];
				$gambar = $tampil['gambar'];
				$HargaJual = $tampil['HargaJual'];
        $Stok = $tampil['Stok'];
        $Satuan = $tampil['Satuan'];
			?>
			  <div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
				  <div class="card text-center">
					  <img src="<?php echo $gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title"><?php echo $nama ?></h6>
                      <div class="icon-bintang" style="color: orange;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      </div>
                      <p class="card-text mt-2"><?php echo 'Rp. ' . number_format($HargaJual,2,',','.'); ?></p>
                      <a>Tersedia : <?php echo $Stok ?> <?php echo $Satuan ?></a>
                      <a href="detailproduk.php?kdBarang=<?php echo $id ?>" name="detail" class="btn btn-primary d-grid">Detail</a>
                </div>
            </div>
          </div>
			<?php
					}
					}else{
            $_GET['jenis'];
            $cek2 = mysqli_query($conn,"SELECT * FROM barang WHERE jenis_barang = '".$_GET['jenis']."' ");
            if(mysqli_num_rows($cek2) > 0){
              while($tampil = mysqli_fetch_assoc($cek2)){		
              $id = $tampil['kdBarang'];
              $nama = $tampil['NamaBarang'];
              $gambar = $tampil['gambar'];
              $HargaJual = $tampil['HargaJual'];
              $Stok = $tampil['Stok'];
              $Satuan = $tampil['Satuan'];
            ?>
              <div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
                <div class="card text-center">
                  <img src="<?php echo $gambar ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h6 class="card-title"><?php echo $nama ?></h6>
                            <div class="icon-bintang" style="color: orange;">
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="card-text mt-2"><?php echo 'Rp. ' . number_format($HargaJual,2,',','.'); ?></p>
                            <a>Tersedia : <?php echo $Stok ?> <?php echo $Satuan ?></a>
                            <a href="detailproduk.php?kdBarang=<?php echo $id ?>" name="detail" class="btn btn-primary d-grid">Detail</a>
                      </div>
                  </div>
                </div>
            
          
            <?php
              }
                }else{
                  echo 'Barang dengan kategori dipilih masih kosong!';
                }
          }
          }
		
         
  ?>
        </div>
      </div>
      <!-- Akhir Produk -->

	  <!-- Footer -->
	<footer class="bg-light p-5 mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 textmd-start text-center pt-2 pb-2">
					<a href="#" class="text-decoration-none">
						<img src="img/logononame50.png" style="width: 40px;">
					</a>
					<span class="ps-1">Copyright @2020 | Created with <i class="fa-solid fa-heart text-danger" ></i> by <a href=" " class="text-decoration-none text-dark fw-bold">Sembakouu</a> </span>
				</div>

				<div class="col-md-6 textmd-end text-center pt-2 pb-2">
					<a href="#" class="text-decoration-none">
						<img src="assets/sosialMedia/facebook.png" class="ms-2" style="width: 32px;">
					</a>
					<a href="#" class="text-decoration-none">
						<img src="assets/sosialMedia/instagram.png" class="ms-2" style="width: 30px;">
					</a>
					<a href="#" class="text-decoration-none">
						<img src="assets/sosialMedia/twitter.png" class="ms-2" style="width: 30px;">
					</a>
					<a href="#" class="text-decoration-none">
						<img src="assets/sosialMedia/linkedin.png" class="ms-2" style="width: 30px;">
					</a>
				</div>
			</div>
		</div>
	</footer>
	  <!-- Akhir Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> 
</body>
</html>