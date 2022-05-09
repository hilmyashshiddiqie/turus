<?php

include('antares-php.php');
$antares = new antares_php();
$antares->set_key('820546baf2cd4fc0:1742b9fc96097726');
//ganti koneksi
$link = mysqli_connect("localhost", "root", "", "turus");
$yourall = $antares->get('Coba_2', 'TutorialLoRa');




$yourall = $yourall[count($yourall) - 1];


$counter = date("Y-m-d H:i:s", strtotime('+5 hours'));
$nodenum = $yourall["data"]["NdNum"];
$frmin = $yourall["data"]["FRMin"];
$vol = $yourall["data"]["VPe"];
//inijuga


$query1 = "INSERT INTO node (id,tanggal,NodeNum,FRMin,VolPem) VALUES ('','$counter','$nodenum','$frmin','$vol')";
$q = mysqli_query($link, $query1) or die(mysqli_error($link));

exit(0);
