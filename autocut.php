<?php

// $sql_warga = "SELECT node_id FROM data_warga WHERE id=" . $id;
$conn = mysqli_connect("localhost", "root", "", "turus");
$sql_node1 = "SELECT id_warga, lunas FROM data_tagihan WHERE id_warga='1' order by id desc LIMIT 1 ";
$sql_node2 = "SELECT id_warga, lunas FROM data_tagihan WHERE id_warga='2' order by id desc LIMIT 1 ";
$data1 = mysqli_query($conn, $sql_node1);
$data2 = mysqli_query($conn, $sql_node2);
$data_warga1 = mysqli_fetch_row($data1);
$data_warga2 = mysqli_fetch_row($data2);
$id_warga1 = $data_warga1[0];
$lunas1 = $data_warga1[1];
// echo $lunas1;
// exit;
$id_warga2 = $data_warga2[0];
$lunas2 = $data_warga2[1];

if ($lunas1 == 'belum') {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://platform.antares.id:8443/~/antares-cse/antares-id/TutorialLoRa/Coba_2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
    "m2m:cin": {
        "con": "{\\"type\\":\\"downlink\\", \\"data\\":\\"relay_' . $id_warga1 . '_' . ('relay_1_1' == "ON" ? 1 : 0) . '\\"}"
    }
    }
    ',
        CURLOPT_HTTPHEADER => array(
            'X-M2M-Origin: 820546baf2cd4fc0:1742b9fc96097726',
            'Content-Type: application/json;ty=4',
            'Accept: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    // $sql = "SELECT id_warga, status_sistem FROM data_tagihan";
    // $result = mysqli_query($conn,$sql);
    // $data = mysqli_fetch_assoc($result);
    // $sw = $data ['status_sistem'];

    mysqli_query($conn, "UPDATE data_warga SET status_sistem='relay_1_1' WHERE id = $id_warga1");
} 
// else if ($lunas1 != 'belum') {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://platform.antares.id:8443/~/antares-cse/antares-id/TutorialLoRa/Coba_2',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => '{
//     "m2m:cin": {
//         "con": "{\\"type\\":\\"downlink\\", \\"data\\":\\"relay_' . $id_warga1 . '_' . ('relay_1_0' == "ON" ? 1 : 0) . '\\"}"
//     }
//     }
//     ',
//         CURLOPT_HTTPHEADER => array(
//             'X-M2M-Origin: 820546baf2cd4fc0:1742b9fc96097726',
//             'Content-Type: application/json;ty=4',
//             'Accept: application/json'
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
//     echo $response;
    
//     // $sql = "SELECT id_warga, status_sistem FROM data_tagihan";
//     // $result = mysqli_query($conn,$sql);
//     // $data = mysqli_fetch_assoc($result);
//     // $sw = $data ['status_sistem'];
//     mysqli_query($conn, "UPDATE data_warga SET status_sistem='relay_1_0' WHERE id = '$id_warga1'");
// } else if ($lunas2 == 'belum') {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://platform.antares.id:8443/~/antares-cse/antares-id/TutorialLoRa/Coba_2',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => '{
//     "m2m:cin": {
//         "con": "{\\"type\\":\\"downlink\\", \\"data\\":\\"relay_' . $id_warga2 . '_' . ('relay_2_1' == "ON" ? 1 : 0) . '\\"}"
//     }
//     }
//     ',
//         CURLOPT_HTTPHEADER => array(
//             'X-M2M-Origin: 820546baf2cd4fc0:1742b9fc96097726',
//             'Content-Type: application/json;ty=4',
//             'Accept: application/json'
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
//     echo $response;
//     // $sql = "SELECT id_warga, status_sistem FROM data_tagihan";
//     // $result = mysqli_query($conn,$sql);
//     // $data = mysqli_fetch_assoc($result);
//     // $sw = $data ['status_sistem'];

//     mysqli_query($conn, "UPDATE data_warga SET status_sistem='relay_2_1' WHERE id = $id_warga2");
// } else if ($lunas2 != 'belum') {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://platform.antares.id:8443/~/antares-cse/antares-id/TutorialLoRa/Coba_2',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => '{
//     "m2m:cin": {
//         "con": "{\\"type\\":\\"downlink\\", \\"data\\":\\"relay_' . $id_warga2 . '_' . ('relay_2_0' == "ON" ? 1 : 0) . '\\"}"
//     }
//     }
//     ',
//         CURLOPT_HTTPHEADER => array(
//             'X-M2M-Origin: 820546baf2cd4fc0:1742b9fc96097726',
//             'Content-Type: application/json;ty=4',
//             'Accept: application/json'
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
//     echo $response;
//     // $sql = "SELECT id_warga, status_sistem FROM data_tagihan";
//     // $result = mysqli_query($conn,$sql);
//     // $data = mysqli_fetch_assoc($result);
//     // $sw = $data ['status_sistem'];

//     mysqli_query($conn, "UPDATE data_warga SET status_sistem='relay_2_0' WHERE id = $id_warga2");
// }
