<?php
include_once 'koneksi.php';

$id_fasilitas_hotel = $_POST['id_fasilitas_hotel'];
$nama_fasilitas_hotel = htmlentities($_POST['nama_fasilitas_hotel']);
$keterangan = htmlentities($_POST['keterangan']);

$insert = mysqli_query($koneksi, "UPDATE fasilitas_hotel SET nama_fasilitas_hotel = '$nama_fasilitas_hotel', keterangan = '$keterangan' WHERE id_fasilitas_hotel = '$id_fasilitas_hotel'");

if ( $insert ) {
	header("Location: data_fasilitas_hotel.php?edit=berhasil&fasilitas_hotel=active");
}else{
	header("Location: edit_fasilitas_hotel.php?edit=gagal&fasilitas_hotel=active");
}


 ?>
