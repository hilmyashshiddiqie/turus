<?php

include('phpqrcode-master/qrlib.php');
// {
//     //koneksi ke database
//     function koneksi()
//     {
//         $conn = mysqli_connect("localhost", "root", "", "turus");
//         return $conn;
//     }
// }

if (!isset($_GET["id_tagihan"])) {
    echo "Empty ID";
    exit(0);
}

if (!isset($_GET["no_hp"])) {
    echo "Empty No HP";
    exit(0);
}

$id_tagihan = $_GET["id_tagihan"];
$no_hp = $_GET["no_hp"];


$conn = mysqli_connect("localhost", "root", "", "turus");
$query1 = mysqli_query($conn, "SELECT qris_request_date, qris_invoiceid FROM qris where id_tagihan='" . $id_tagihan . "' ORDER BY qris_id DESC LIMIT 1");
$result = mysqli_fetch_row($query1);
$date = $result[0];
$invoice = $result[1];

$query2 = mysqli_query($conn, "SELECT * FROM data_tagihan where id='" . $id_tagihan . "' ORDER BY id DESC LIMIT 1");
$result2 = mysqli_fetch_assoc($query2);
$tagihan_nominal = $result2["tagihan"];

$qris_ok = false;

while (!$qris_ok) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://qris.id/restapi/qris/checkpaid_qris.php?do=checkStatus&apikey=139139220105256&mID=195216047669&invid=' . $invoice . '&trxvalue=' . $tagihan_nominal . '&trxdate=' . $date,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $qris_res = json_decode($response, 1);

    if (!isset($qris_res["data"]["qris_status"])) {
        sleep(15);
        continue;
    } else {
        $qris_ok = true;
    }

    $invoiceid = $qris_res["data"]["qris_status"];

    if ($invoiceid == "paid") {
        $query1 = mysqli_query($conn, "UPDATE data_tagihan SET lunas='Sudah' where id=" . $id_tagihan);
    }
}

header("Location: tagihan.php?u=" . $no_hp);
