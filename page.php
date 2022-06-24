<?php 
include_once 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM reservasi ORDER BY ASC");

$hasil = mysqli_fetch_assoc($query);

// var_dump($hasil);

?>
<pre>
  <?php print_r($hasil); ?>
</pre>