<?php 
include_once 'koneksi.php';

$id_kamar = htmlentities($_POST['id_kamar']);
$namaTamu = htmlentities($_POST['nama_tamu']);
$email = htmlentities($_POST['email']);
$no_handphone = htmlentities($_POST['no_handphone']);
$tanggal_cek_in = htmlentities($_POST['tanggal_cek_in']);
$tanggal_cek_out = htmlentities($_POST['tanggal_cek_out']);
$jumlah_kamar = htmlentities($_POST['jumlah_kamar']);

if (empty($namaTamu) OR empty($email) OR empty($id_kamar) OR empty($no_handphone)) {
    header("Location: reservasi.php?form=kosong");
}

$insert = mysqli_query($koneksi, "INSERT INTO reservasi(id_kamar, nama_tamu, email, no_handphone, tanggal_cek_in, tanggal_cek_out, status, jumlah_kamar) VALUES('$id_kamar', '$namaTamu', '$email', '$no_handphone', '$tanggal_cek_in', '$tanggal_cek_out', 'Cek In', '$jumlah_kamar')");

if ( $insert ) :
    $id = mysqli_insert_id($koneksi);

    $query = mysqli_query($koneksi, "SELECT *, reservasi.jumlah_kamar AS jumlah_kamar_yang_dipesan FROM reservasi INNER JOIN kamar ON reservasi.id_kamar = kamar.id_kamar WHERE id_reservasi = '$id'");

    $hasil = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_once 'view/header.php'; ?>

    <title>Reservasi</title>
</head>
<body>
    
    <div class="container my-5">
    <div class="button-group text-center m-4 d-print-none">
            <p>Berhasil melakukan reservasi! berikut detailnya:</p>
            <a href="reservasi.php" class="btn btn-primary px-4">Kembali</a>
            <a onclick="window.print();" href="#" class="btn px-4 btn-outline-primary"><i class="fa-solid fa-print"></i>Print</a>
    </div>
        <table class="table table-stripped bg-white table-bordered">
            <tbody>
                <tr>
                    <td colspan="2" class="text-center">Data Reservasi</td>
                </tr>
                <tr>
                    <td>ID Reservasi</td>
                    <td><?php echo $hasil['id_reservasi']; ?></td>
                </tr>
                <tr>
                    <td>Nama Tamu</td>
                    <td><?php echo $hasil['nama_tamu']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $hasil['email']; ?></td>
                </tr>
                <tr>
                    <td>No Handphone</td>
                    <td><?php echo $hasil['no_handphone']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Cek In</td>
                    <td><?php echo $hasil['tanggal_cek_in']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Cek Out</td>
                    <td><?php echo $hasil['tanggal_cek_out']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $hasil['status']; ?></td>
                </tr>
                <tr>
                    <td>Tipe Kamar</td>
                    <td><?php echo $hasil['tipe_kamar']; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Kamar</td>
                    <td><?php echo $hasil['jumlah_kamar_yang_dipesan']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include_once 'view/footer.php'; ?>
</body>
</html>
<?php else: ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
        <p class="mb-0">Terjadi kesalahan, gagal melakukan reservasi.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <p><?php echo mysqli_error($koneksi); ?></p>
<?php endif; ?>