<?php
session_start();

include_once 'koneksi.php';

$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);


$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

if ( mysqli_num_rows($query) == 1 ) {

	$user = mysqli_fetch_array($query, MYSQLI_ASSOC);

	if ( password_verify($password, $user['password']) ) {

			$_SESSION['username'] = $user['username'];
			$_SESSION['level'] = $user['level'];

			header("Location: dashboard.php");
	}else {
		header("Location: login.php?pesan=password_salah");
	}

}else{
	header("Location: login.php?pesan=username_tidak_ada");
}

 ?>
