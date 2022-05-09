<?php

include('antares-php.php');
$antares = new antares_php();
$antares->set_key('820546baf2cd4fc0:1742b9fc96097726');
//ganti koneksi
$link = mysqli_connect("localhost", "root", "", "turus");
$yourdata = $antares->get('Coba_1', 'TutorialLoRa');
// $yourall = $antares->get_all('Coba_2', 'TutorialLoRa');
// for ($i = 0; $i < 1; $i++) {
//echo json_encode($yourdata,JSON_PRETTY_PRINT);
// }

$yourdata = $yourdata[count($yourdata) - 1];
$counter = date("Y-m-d H:i:s", strtotime('+5 hours'));
$tur = $yourdata["data"]["Tur"];
// SENG TUR ERROR DITT!!!!!!!! PAS UP DATABASE
// MARI KITA COBA
$ting = $yourdata["data"]["Ting"];
$vol = $yourdata["data"]["VT"];


//inijuga
$query1 = "INSERT INTO core (id,tanggal,Tur,Ting,VolTan) VALUES ('','$counter','$tur','$ting','$vol')";
$q = mysqli_query($link, $query1) or die(mysqli_error($link));


exit(0);
