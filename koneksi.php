<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "hotel_iksan_rpl1";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if ( mysqli_connect_error() ) {
    echo "Terjadi kesalahan koneksi pada database";
    echo mysqli_connect_errno();
}

 ?>