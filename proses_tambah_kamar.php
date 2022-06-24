<?php 
include_once 'koneksi.php';

$tipe_kamar = htmlentities($_POST['tipe_kamar']);
$fasilitas_kamar = htmlentities($_POST['fasilitas_kamar']);
$jumlah_kamar = htmlentities($_POST['jumlah_kamar']);


$insert = mysqli_query($koneksi, "INSERT INTO kamar (tipe_kamar, fasilitas_kamar, jumlah_kamar) VALUES('$tipe_kamar', '$fasilitas_kamar', '$jumlah_kamar')");

if ( $insert ) {
	header("Location: data_kamar.php?tambah=berhasil&kamar=active");
}else{
	header("Location: data_kamar.php?tambah=gagal&kamar=active");
}

?>
