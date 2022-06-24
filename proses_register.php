<?php 

include_once 'koneksi.php';

$username = htmlentities($_POST['username']);
$password = trim($_POST['password']);
$level = $_POST['level'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

if ( mysqli_num_rows($query) == 0 ) {
     
    $passwordAcak = password_hash($password, PASSWORD_BCRYPT);
            
    $insert = mysqli_query($koneksi, "INSERT INTO user(username, password, level) VALUES('$username', '$passwordAcak', '$level')");
            
    if ( $insert ) {
        header("Location: login.php?pesan=register_berhasil");
    } else {
        header("Location: register.php?pesan=register_gagal");
    }
            
}else{
  header("Location: register.php?pesan=username_sudah_ada");
}
 ?>