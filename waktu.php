<?php
function waktu () {
    date_default_timezone_set('Asia/Jakarta');
    $day = date('l');
    $moon = date('F');
    $tahun = date('Y');
    $tanggal = date('d');

    switch ($day) {
        case 'Sunday':
            $hari = "Minggu";
            break;
        case 'Monday':
            $hari = "Senin";
            break;
        case 'Tuesday':
            $hari = "Selasa";
            break;
        case 'Wednesday':
            $hari = "Rabu";
            break;
        case 'Thursday':
            $hari = "Kamis";
            break;
        case 'Friday':
            $hari = "Jum'at";
            break;
        case 'Saturday':
            $hari = "Sabtu";
            break;
        default:
            $hari = '';
            break;
    }

    switch ($moon) {
        case 'January':
            $bulan = 'Januari';
            break;
        case 'February':
            $bulan = 'Februari';
            break;
        case 'March':
            $bulan = 'Maret';
            break;
        case 'April':
            $bulan = 'April';
            break;
        case 'May':
            $bulan = 'Mei';
            break;
        case 'June':
            $bulan = 'Juni';
            break;
        case 'July':
            $bulan = 'Juli';
            break;
        case 'August':
            $bulan = 'Agustus';
            break;
        case 'September':
            $bulan = 'September';
            break;
        case 'October':
            $bulan = 'Oktober';
            break;
        case 'November':
            $bulan = 'November';
            break;
        case 'December':
            $bulan = 'Desember';
            break;
        default:
            $bulan = '';
            break;
    }

    $waktu = $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
    return $waktu;

}
?>
