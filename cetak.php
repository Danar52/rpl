<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$karyawan = query("SELECT * FROM karyawan ORDER BY nik ASC");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <h1>Data Karyawan</h1>
    <table border="1" cellpadding="10" cellspacsing="0">
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Dept.</th>
        </tr>';

    $i = 1;
    foreach ( $karyawan as $row) {
        $html .= '<tr>
            <td>'.$i++.'</td>
            <td>'.$row["nik"].'</td>
            <td>'.$row["nama"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["departemen"].'</td>
        </tr>';
    }
$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>