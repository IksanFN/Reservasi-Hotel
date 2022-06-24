<?php 

include_once 'koneksi.php';

$id_fasilitas_hotel = $_GET['id_fasilitas_hotel'];

$hapus = mysqli_query($koneksi, "DELETE FROM fasilitas_hotel WHERE id_fasilitas_hotel = '$id_fasilitas_hotel'");

if ( $hapus ) {
    header("Location: data_fasilitas_hotel.php?hapus=berhasil&fasilitas_hotel=active");
}else{
    header("Location: data_fasilitas_hotel.php?hapus=gagal&fasilitas_hotel=active");
}

?>