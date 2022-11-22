<?php 
    include 'config.php';

    if(isset($_GET['idb'])){
        $delete = mysqli_query($conn, "DELETE FROM barang WHERE kdBarang = '".$_GET['idb']."' ");
        header ("Location: listbarang.php");
        echo 'sukses';
    }

    if(isset($_GET['ids'])){
        $delete = mysqli_query($conn, "DELETE FROM supplier WHERE kdSupplier = '".$_GET['ids']."' ");
        header ("Location: listsupplier.php");
    }
?>