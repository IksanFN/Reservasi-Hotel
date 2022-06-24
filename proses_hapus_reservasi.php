<?php 
include_once 'koneksi.php';

$id_reservasi = $_GET['id_reservasi'];

$hapus = mysqli_query($koneksi, "DELETE FROM reservasi WHERE id_reservasi = '$id_reservasi'");

if ( $hapus ) {
    header("Location: data_reservasi.php?hapus=berhasil&reservasi=active");
}else{
    header("Location: data_reservasi.php?hapus=gagal&reservasi&active");
}

?>