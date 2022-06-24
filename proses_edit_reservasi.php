<?php 
include_once 'koneksi.php';

$id_kamar = $_POST['id_kamar'];
$id_reservasi = $_POST['id_reservasi'];
$nama_tamu = $_POST['nama_tamu'];
$email = $_POST['email'];
$no_handphone = $_POST['no_handphone'];
$tanggal_cek_in = $_POST['tanggal_cek_in'];
$tanggal_cek_out = $_POST['tanggal_cek_out'];
$status = $_POST['status'];
$jumlah_kaamr = $_POST['jumlah_kamar'];

$update = mysqli_query($koneksi, "UPDATE reservasi SET id_kamar = '$id_kamar', nama_tamu = '$nama_tamu', email = '$email', no_handphone = '$no_handphone', tanggal_cek_in = '$tanggal_cek_in', tanggal_cek_out = '$tanggal_cek_out', status = '$status', jumlah_kamar = '$jumlah_kamar' WHERE id_reservasi = '$id_reservasi'");

if ( $update ) {
    header("Location: data_reservasi.php?edit=berhasil&reservasi=active");
}else{
    header("Location: data_reservasi.php?edit=gagal&reservasi&active");
}