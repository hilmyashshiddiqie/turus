<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();

//node
$q1 = mysqli_query($conn, "SELECT VolPem,tanggal,NodeNum FROM node WHERE date(tanggal) = LAST_DAY(CURDATE()) AND NodeNum='1' order by id DESC LIMIT 1 ");
$q2 = mysqli_query($conn, "SELECT VolPem,tanggal,NodeNum FROM node WHERE date(tanggal) = LAST_DAY(CURDATE()) AND NodeNum='2' order by id DESC LIMIT 1 ");
$r1 = mysqli_fetch_row($q1);
$r2 = mysqli_fetch_row($q2);
$volpem1 = $r1[0];
$tanggal1 = $r1[1];
$nodenum1 = $r1[2];
$volpem2 = $r2[0];
$tanggal2 = $r2[1];
$nodenum2 = $r2[2];


echo $volpem1;
echo $tanggal1;
echo $nodenum1;
echo $volpem2;
echo $tanggal2;
echo $nodenum2;
echo "<br>";

$qstand1 = mysqli_query($conn, "INSERT INTO `data_stand` (`id`, `id_warga`, `tanggal`, `stand_awal`, `stand_akhir`, `foto_bukti`) VALUES ('', '$nodenum1', '$tanggal1', '0', '$volpem1', '0')");

$qstand2 = mysqli_query($conn, "INSERT INTO `data_stand` (`id`, `id_warga`, `tanggal`, `stand_awal`, `stand_akhir`, `foto_bukti`) VALUES ('', '$nodenum2', '$tanggal2', '0', '$volpem2', '0')");

//stand
$q11 = mysqli_query($conn, "SELECT id, id_warga, stand_awal, stand_akhir FROM data_stand WHERE id_warga='1' ORDER BY id DESC LIMIT 1");
$q22 = mysqli_query($conn, "SELECT id, id_warga, stand_awal, stand_akhir FROM data_stand WHERE id_warga='2' ORDER BY id DESC LIMIT 1");
$r11 = mysqli_fetch_row($q11);
$r22 = mysqli_fetch_row($q22);

$id1 = $r11[0];
$id_warga1 = $r11[1];
$stand_awal1 = $r11[2];
$stand_akhir1 = $r11[3];

echo $id_warga1;
echo "<br>";

$id2 = $r22[0];
$id_warga2 = $r22[1];
$stand_awal2 = $r22[2];
$stand_akhir2 = $r22[3];

$biaya1 = 2500 * $stand_akhir1;
$biaya2 = 2500 * $stand_akhir2;

echo $biaya1;
echo $biaya2;

$tagihan1 = mysqli_query($conn, "INSERT INTO `data_tagihan` (`id_warga`,`id_stand`,`stand_awal`,`stand_akhir`,`pemakaian`,`tarif`,`aktif`,`tagihan`,`lunas`,`konfirmasi_status`,`konfirmasi_file`) VALUES ('$id_warga1', '$id1', '$stand_awal1', '$stand_akhir1','$stand_akhir1', '2500', 'Y', '$biaya1','belum', '0', '')");

$tagihan2 = mysqli_query($conn, "INSERT INTO `data_tagihan` (`id_warga`,`id_stand`,`stand_awal`,`stand_akhir`,`pemakaian`,`tarif`,`aktif`,`tagihan`,`lunas`,`konfirmasi_status`,`konfirmasi_file`) VALUES ('$id_warga2', '$id2', '$stand_awal2', '$stand_akhir2','$stand_akhir2', '2500', 'Y', '$biaya2','belum', '0', '')");

