<?php 
include_once 'koneksi.php';

$nama_fasilitas_hotel = htmlentities($_POST['nama_fasilitas_hotel']);
$keterangan = htmlentities($_POST['keterangan']);

// Upload Gambar
$ekstensi = [
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpg',
    'png' => 'image/png'
];
$namaGambar = $_FILES['gambar'] ['name'];
$namaFolder = "assets/img/";
$size = $_FILES['gambar'] ['size'];
$tempatAsal = $_FILES['gambar'] ['tmp_name'];
$tipe = $_FILES['gambar'] ['type'];
$error = $_FILES['gambar'] ['error'];

// Jika tidak ada file yang di upload
if ($error == 4) {
    header("Location: tambah_fasilitas_hotel.php?gambar=tidak_ada");
}elseif (!in_array($tipe, $ekstensi)) {
    header("Location: tambah_fasilitas_hotel.php?gambar=tipe_salah");
}elseif ($size > 1000000) {
    header("Location: tambah_fasilitas_hotel.php?gambar=ukuran_terlalu_besar");
}elseif ($error == 0) {
    $namaUnik = uniqid();
    $namaUnik .= '.';
    $namaUnik .= $namaGambar;
    $folderMove = "$namaFolder/$namaUnik";
    move_uploaded_file($tempatAsal, $folderMove);
}

$insert = mysqli_query($koneksi, "INSERT INTO fasilitas_hotel (nama_fasilitas_hotel, keterangan, gambar) VALUES('$nama_fasilitas_hotel', '$keterangan', '$namaUnik')");

if ( $insert ) {
    header("Location: data_fasilitas_hotel.php?tambah=berhasil&fasilitas_hotel=active");
}else{
    header("Location: data_fasilitas_hotel.php?tambah=gagal&fasilitas_hotel=active");
}
?>