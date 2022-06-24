<?php 
include_once 'koneksi.php';

$id_kamar = $_POST['id_kamar'];
$tipe_kamar = htmlentities($_POST['tipe_kamar']);
$fasilitas_kamar = htmlentities($_POST['fasilitas_kamar']);
$jumlah_kamar = htmlentities($_POST['jumlah_kamar']);

$update = mysqli_query($koneksi, "UPDATE kamar SET tipe_kamar = '$tipe_kamar', fasilitas_kamar = '$fasilitas_kamar', jumlah_kamar = '$jumlah_kamar' WHERE id_kamar = '$id_kamar'");

if ( $update ) {
    header("Location: data_kamar.php?edit=berhasil&kamar=active");
}else{
    header("Location: data_kamar.php?edit=gagal&kamar=active");
}
?>