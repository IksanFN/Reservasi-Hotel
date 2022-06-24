<?php
include_once('koneksi.php');

$id_kamar = $_GET['id_kamar'];

$hapus = mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar = '$id_kamar'");

if ( $hapus ) {
	header("Location: data_kamar.php?hapus=berhasil&kamar=active");
}else{
	header("Location: data_kamar.php?hapus=gagal&kamar&active");
}


?>
