<?php 
    include 'config.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM barang WHERE kdBarang = '".$_GET['idk']."' ");
        echo '<script>window.location="listbarang.php"</script>';
    }

    if(isset($_GET['idp'])){
        $delete = mysqli_query($conn, "DELETE FROM supplier WHERE kdSupplier = '".$_GET['idp']."' ");
        echo '<script>window.location="listsupplier.php"</script>';
    }
?>