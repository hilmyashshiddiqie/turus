<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();

if (isset($_POST['p'])) {
    //login //
    if ($_POST['p'] == "Masuk") {
        $username = $_POST['telp'];
        $password = md5($_POST['password']);

        $q = mysqli_query($conn, "SELECT d.id, u.username as u_username, d.alamat, u.nama as u_nama, u.level, u.password, d.nama as d_nama,
            dt.stand_akhir as dt_stand_akhir, dt.pemakaian as dt_pemakaian
            FROM loginn as u
            LEFT JOIN data_warga as d ON u.id_warga = d.id
            LEFT JOIN data_tagihan as dt ON u.id_warga = dt.id_warga
            WHERE u.username = '$username' AND u.password = '$password'
        ");

        // echo"SELECT username FROM loginn WHERE username=\"$username\" AND password=\"$password\"";
        $j = mysqli_num_rows($q);
        $data = mysqli_fetch_assoc($q);
        // echo $j;
        $pemakaian = null;
        session_start();

        if ($data['level'] == 'user') {
            $idW = $data['id'];
            $q_pemakaian = mysqli_query($conn, "SELECT w.id, s.tanggal,t.pemakaian
                FROM data_warga as w
                INNER JOIN data_tagihan as t ON w.id = t.id_warga
                INNER JOIN data_stand as s ON t.id_stand = s.id
                WHERE w.id = '$idW'
                ORDER BY s.tanggal ASC
            ");
            $q_year = mysqli_query($conn, "SELECT DISTINCT YEAR(tanggal) as tanggal FROM data_stand WHERE id_warga = '$idW'
            ");
            $q_lastTagihan = mysqli_query($conn, "SELECT w.id, s.tanggal,t.pemakaian, s.stand_awal, s.stand_akhir, t.tagihan, t.lunas
                FROM data_warga as w
                INNER JOIN data_tagihan as t ON w.id = t.id_warga
                INNER JOIN data_stand as s ON t.id_stand = s.id
                WHERE w.id = $idW
                AND s.tanggal = (SELECT MAX(ss.tanggal) FROM data_warga as ww
                    INNER JOIN data_tagihan as tt ON ww.id = tt.id_warga
                    INNER JOIN data_stand as ss ON tt.id_stand = ss.id
                    WHERE w.id = $idW)
            ");
            while ($row = mysqli_fetch_assoc($q_pemakaian)) {
                $pemakaian[] = $row;
            }
            while ($row = mysqli_fetch_assoc($q_year)) {
                $year[] = $row;
            }
            $_SESSION['last_tagihan'] = mysqli_fetch_assoc($q_lastTagihan);
            $_SESSION['riwayat_pemakaian'] = $pemakaian;
            $_SESSION['riwayat_year'] = $year;
        }

        if (empty($j)) {
            $msg = "gakbener";
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['data'] = $data;
            $_SESSION['level'] = $data['level'];
            $_SESSION['alamat'] = $data['alamat'];
            $msg = "bener";
        }

        echo json_encode($msg);
    }



    //---------------------------------------------ADMIN USER------------------------------------------------------------------------
    //menampilkan user
    elseif ($_POST['p'] == "read") {
        if (isset($_POST['cari'])) {
            $id = $_POST['cari'];
            $sql = "SELECT * FROM data_warga WHERE id = $id";

            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            echo json_encode($data);
        } else {
            $sql = "SELECT * FROM data_warga";

            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
    }

    // // PEMAKAIAN DAN TAGIHAN
    elseif ($_POST['p'] == "read_pemakaian_tagihan") {
        if (isset($_POST['cari'])) {
            $id = $_POST['cari'];
            $sql = "SELECT * FROM data_tagihan";

            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            echo json_encode($data);
        } else {
            $sql = "SELECT w.id, w.nama, t.stand_awal as t_awal, t.stand_akhir as t_akhir, s.stand_awal as s_awal, s.stand_akhir as akhir, s.tanggal,t.tagihan
                    FROM data_warga as w
                    LEFT JOIN data_tagihan as t ON w.id = t.id_warga
                    LEFT JOIN data_stand as s ON w.id = s.id_warga
            ";

            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
    }

    // AMBIL DATA PEMAKAIAN PER TAHUN BY USER
    elseif ($_POST['p'] == "get_year_pemakaian_byuser") {
        $idyear = $_POST['wh'];
        $idyear_dua = explode("|", $idyear);
        $tahun =  $idyear_dua [0];
        $id_warga = $idyear_dua [1];

        $sql = "SELECT t.lunas, w.id as w_id, t.pemakaian as pemakaian, t.id as t_id, s.id as s_id, w.nama, t.stand_awal as t_awal, t.stand_akhir as t_akhir, s.stand_awal as s_awal, s.stand_akhir as s_akhir, s.tanggal, t.tagihan
                    FROM data_warga as w
                    LEFT JOIN data_stand as s ON w.id = s.id_warga
                    LEFT JOIN data_tagihan as t ON s.id = t.id_stand
                    WHERE w.id = $id_warga AND  tanggal BETWEEN '$tahun-01-01' AND '$tahun-12-31'
            ";

        $query = mysqli_query($conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }

        echo json_encode($data);
    } elseif ($_POST['p'] == "form_konfirmasi_bayar_post") {

        session_start();
        $idLog = $_SESSION['data']['id'];

        $allowedExts = array("jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $folder = "../assets/uploads/";
        $tgl = explode('_', $_POST['tgl_id'])[0];
        $idTagihan = explode('_', $_POST['tgl_id'])[1];
        if ((($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 200000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                $filename = 'bukti_' . $tgl . '_' . $idLog . '_' . $idTagihan . '_' . date("Y-m-d") . '.' . $extension;

                if (file_exists($folder . $filename)) {
                    echo "Bukti pembayaran tanggal " . $tgl . ' sedang diproses';
                } else {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        $folder . $filename
                    );
                    $sql = "UPDATE data_tagihan SET konfirmasi_file='$filename' , konfirmasi_status = 1
                            WHERE id = '$idTagihan'";
                    if (mysqli_query($conn, $sql)) {
                        echo 'jadi';
                    } else {
                        echo 'ERORR';
                    }
                    echo "Bukti pembayaran tanggal " . $tgl . ' terupload';
                }
            }
        } else {
            echo "Invalid file";
        }
    } elseif ($_POST['p'] == "formAddAktivitas") {
        $allowedExts = array("jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $folder = "../assets/uploads/";
        if ((($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 5000000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                $filename = 'aktivitas_' . rand() . date("Y-m-d") . '.' . $extension;

                if (file_exists($folder . $filename)) {
                    echo "File exists, Something went wrong!";
                } else {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        $folder . $filename
                    );
                    try {
                        $judull = $_POST['judul'];
                        $isii = $_POST['isi'];
                        $sql = "INSERT INTO web_utama (judul, berita, gambar) VALUES('$judull', '$isii', '$filename')  ";
                        mysqli_query($conn, $sql);
                        echo "Aktivitas Ditambahkan";
                    } catch (\Throwable $th) {
                        echo "Error: " . $th;
                    }
                }
            }
        } else {
            echo "Invalid file";
        }
    } elseif ($_POST['p'] == "formUbahGambaraktivitas") {
        $allowedExts = array("jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $folder = "../assets/uploads/";
        if ((($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 5000000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                $filename = 'aktivitas_' . rand() . date("Y-m-d") . '.' . $extension;

                if (file_exists($folder . $filename)) {
                    echo "File exists, Something went wrong!";
                } else {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        $folder . $filename
                    );
                    try {
                        $id = $_POST['id'];
                        $sql = "UPDATE web_utama set gambar='$filename' WHERE id='$id'";
                        mysqli_query($conn, $sql);
                        echo "Gambar Aktivitas Diubah";
                    } catch (\Throwable $th) {
                        echo "Error: " . $th;
                    }
                }
            }
        } else {
            echo "Invalid file";
        }
    } elseif ($_POST['p'] == "formUbahAktivitas") {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $isi = $_POST['berita'];
        try {
            $sql = "UPDATE web_utama set judul='$judul', berita='$isi' WHERE id=$id";
            $query = mysqli_query($conn, $sql);
            echo "Aktivitas Diubah";
        } catch (\Throwable $th) {
            echo "Error: " . $th;
        }
    } elseif ($_POST['p'] == "read_aktivitas") {
        if (isset($_POST['cari'])) {
            $id = $_POST['cari'];
            $sql = "SELECT * FROM web_utama";

            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            echo json_encode($data);
        } else {
            $sql = "SELECT * FROM web_utama";

            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
    } else if ($_POST['p'] == 'hapus_aktivitasNow') {
        $id = $_POST['idNe'];

        $sql = "DELETE FROM web_utama WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
        echo "Data Aktivitas terhapus!";
    }
    // MENAMBAHKAN USER 
    elseif ($_POST['p'] == "save") {
        if (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_hp']) && isset($_POST['tipe'])) {
            $nama         = $_POST['nama'];
            $alamat       = $_POST['alamat'];
            $no_hp        = $_POST['no_hp'];
            $tipe         = $_POST['tipe'];
            $no_rumah     = $_POST['no_rumah'];
            $no_pelanggan = $_POST['no_pelanggan'];

            $sql = "INSERT INTO data_warga (nama, alamat, no_hp, tipe, no_pelanggan, no_rumah) VALUES ('$nama', '$alamat', '$no_hp', '$tipe', $no_pelanggan, $no_rumah)";

            $query = mysqli_query($conn, $sql);

            $sql_last = "select last_insert_id()";
            $query_last = mysqli_query($conn, $sql_last);
            $get_last = mysqli_fetch_assoc($query_last);

            $pass_default = md5('0000');
            $lasttID = $get_last['last_insert_id()'];
            $sql_insert_login = "INSERT INTO loginn (username, password, level, id_warga) VALUES ('$no_hp', '$pass_default', 'user', '$lasttID')";
            $query_last = mysqli_query($conn, $sql_insert_login);


            if ($query) {
                $result = [
                    'msg' => 'Berhasil Menambahkan Data',
                    'status' => true,
                    'cek' => [$nama, $alamat, $no_hp, $tipe]
                ];
            } else {
                $result = [
                    'msg' => 'Gagal Menambahkan Data',
                    'status' => false,
                    'cek' => [$nama, $alamat, $no_hp, $tipe]
                ];
            }

            echo json_encode($result);
        } else {
            $result = [
                'msg' => 'Gagal input data. Data Belum Diisikan',
                'status' => false
            ];

            echo json_encode($result);
        }
    }
    //END

    //EDIT USER
    elseif ($_POST['p'] == "edituser") {
        if (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_hp']) && isset($_POST['tipe'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $tipe = $_POST['tipe'];
            $id = $_POST['id'];
            $no_pelanggan = $_POST['no_pelanggan'];
            $no_rumah = $_POST['no_rumah'];

            $sql = "UPDATE data_warga SET nama = '$nama', alamat='$alamat', no_hp= '$no_hp', tipe= '$tipe', no_pelanggan=$no_pelanggan, no_rumah=$no_rumah WHERE id = $id";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                $result = [
                    'msg' => 'Sukses update data',
                    'status' => true,
                    'cek' => [$nama, $alamat, $no_hp, $tipe]
                ];
            } else {
                $result = [
                    'msg' => 'Gagal update data',
                    'status' => false,
                    'cek' => [
                        $nama, $alamat, $no_hp, $tipe
                    ]
                ];
            }

            echo json_encode($result);
        } else {
            $result = [
                'msg' => 'Gagal edit data. Nama dan alamat kosong',
                'status' => false
            ];

            echo json_encode($result);
        }
    }
    //END
    //HAPUS DATA USER
    elseif ($_POST['p'] == "hapus") {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql = "DELETE FROM data_warga WHERE id = $id";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                $result = [
                    'msg' => 'Sukses hapus data',
                    'status' => true
                ];
            } else {
                $result = [
                    'msg' => 'Gagal hapus data',
                    'status' => false,
                ];
            }

            echo json_encode($result);
        } else {
            $result = [
                'msg' => 'Tidak mempunyai akses hapus',
                'status' => false,
            ];

            echo json_encode($result);
        }
    }
    //END

    //SEARCH USER
    elseif ($_POST['p'] == "search") {
        if (isset($_POST['key'])) {
            if ($_POST['key'] == null) {

                if ($_POST['page'] == 0) {
                    $sql = "SELECT * FROM data_warga ";
                } else {
                    $start_from = $_POST['page'];
                    $sql = "SELECT * FROM data_warga ";
                }

                $sql_halaman = "SELECT count(*) as total FROM data_warga";
                $query_halaman = mysqli_query($conn, $sql_halaman);
                $total_halaman = mysqli_fetch_assoc($query_halaman);

                $query = mysqli_query($conn, $sql);

                $data = [];

                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row;
                }

                $result = [
                    'data' => $data,
                    'total' => $total_halaman['total']
                ];

                echo json_encode($result);
            } else {
                $key = $_POST['key'];

                if ($_POST['page'] == 0) {
                    $sql = "SELECT * FROM data_warga WHERE (nama LIKE '%$key%' OR alamat LIKE '%$key%' OR tipe LIKE '%$key%') ";
                } else {
                    $start_from = $_POST['page'];
                    $sql = "SELECT * FROM data_warga WHERE (nama LIKE '%$key%' OR alamat LIKE '%$key%' OR tipe LIKE '%$key%') ";
                }

                $sql_halaman = "SELECT count(*) as total FROM data_warga WHERE (nama LIKE '%$key%' OR alamat LIKE '%$key%' OR tipe LIKE '%$key%')";
                $query_halaman = mysqli_query($conn, $sql_halaman);
                $total_halaman = mysqli_fetch_assoc($query_halaman);

                $query = mysqli_query($conn, $sql);

                $data = [];

                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row;
                }

                // echo json_encode($data);
                $result = [
                    'data' => $data,
                    'total' => $total_halaman['total']
                ];

                echo json_encode($result);
            }
        }
    }
    //END

    //--------------------------------------------------------------------BENDAHARA------------------------------------------------------
    //menampilkan tabel manajemen air
    elseif ($_POST['p'] == "manajemenair") {
        if (isset($_POST['look'])) {
            $id = $_POST['look'];
            $year = date('Y', strtotime($_POST['tahuntag']));
            $sql = "SELECT * FROM data_warga LEFT JOIN data_tagihan ON data_tagihan.id_warga = data_warga.id LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE YEAR(data_stand.tanggal) = $year and data_warga.id = $id GROUP BY data_stand.tanggal, data_warga.id";
            // $sql = "SELECT * FROM data_warga";

            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            echo json_encode($data);
        } else if (isset($_POST['getUser'])) {
            $sql = "SELECT * FROM data_warga";

            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } elseif (isset($_POST['getTagihan'])) {
            $year = date('Y', strtotime($_POST['tahuntag']));
            $id = $_POST["id_warga"];
            $sql = "SELECT *, data_tagihan.id as tagihan_id FROM data_tagihan LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE data_tagihan.id_warga = $id AND YEAR(data_stand.tanggal) = $year";
            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            $year = date('Y', strtotime($_POST['tahuntag']));
            $sql = "SELECT data_warga.*, data_tagihan.*, data_stand.tanggal as tanggal, data_tagihan.id as tagihan_id FROM data_warga LEFT JOIN data_tagihan ON data_tagihan.id_warga = data_warga.id LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE YEAR(data_stand.tanggal) = $year or data_stand.tanggal is null GROUP BY data_stand.tanggal, data_warga.id";

            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
    }
    //SEARCH MANAJEMEN UNTUK BENDAHARA
    elseif ($_POST['p'] == "searchmanajemenair") {
        if (isset($_POST['kunci'])) {
            $nama = $_POST['kunci'];
            if ($_POST['kunci'] == null) {

                if ($_POST['page'] == 0) {
                    $year = date('Y', strtotime($_POST['tahuntag']));

                    $sql = "SELECT data_warga.*, data_tagihan.*, data_stand.tanggal as tanggal, data_tagihan.id as tagihan_id FROM data_warga LEFT JOIN data_tagihan ON data_tagihan.id_warga = data_warga.id LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE YEAR(data_stand.tanggal) = $year or data_stand.tanggal is null AND data_warga.nama LIKE '%$nama%' GROUP BY data_warga.id";
                } else {
                    $start_from = $_POST['page'] * 10;
                    $year = date('Y', strtotime($_POST['tahuntag']));
                    $sql = "SELECT data_warga.*, data_tagihan.*, data_stand.tanggal as tanggal, data_tagihan.id as tagihan_id FROM data_warga LEFT JOIN data_tagihan ON data_tagihan.id_warga = data_warga.id LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE YEAR(data_stand.tanggal) = $year or data_stand.tanggal is null AND data_warga.nama LIKE '%$nama%' GROUP BY data_warga.id";
                }

                $sql_halaman = "SELECT count(*) as total FROM data_warga";
                $query_halaman = mysqli_query($conn, $sql_halaman);
                $total_halaman = mysqli_fetch_assoc($query_halaman);

                $query = mysqli_query($conn, $sql);

                $data = [];

                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row;
                }

                $result = [
                    'data' => $data,
                    'total' => $total_halaman['total']
                ];

                echo json_encode($result);
            } else {
                $kunci = $_POST['kunci'];

                if (
                    $_POST['page'] == 0
                ) {
                    $year = date('Y', strtotime($_POST['tahuntag']));
                    $sql = "SELECT data_warga.*, data_tagihan.*, data_stand.tanggal as tanggal, data_tagihan.id as tagihan_id FROM data_warga LEFT JOIN data_tagihan ON data_tagihan.id_warga = data_warga.id LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE YEAR(data_stand.tanggal) = $year or data_stand.tanggal is null AND data_warga.nama LIKE '%$nama%' GROUP BY data_warga.id";
                } else {
                    $start_from = $_POST['page'] * 10;
                    $year = date('Y', strtotime($_POST['tahuntag']));
                    $sql = "SELECT data_warga.*, data_tagihan.*, data_stand.tanggal as tanggal, data_tagihan.id as tagihan_id FROM data_warga LEFT JOIN data_tagihan ON data_tagihan.id_warga = data_warga.id LEFT JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE YEAR(data_stand.tanggal) = $year or data_stand.tanggal is null AND data_warga.nama LIKE '%$nama%' GROUP BY data_warga.id";
                }

                $sql_halaman = "SELECT count(*) as total FROM data_warga WHERE (nama LIKE '%$kunci%' OR alamat LIKE '%$kunci%' OR tipe LIKE '%$kunci%') GROUP BY data_warga.id";
                $query_halaman = mysqli_query($conn, $sql_halaman);
                $total_halaman = mysqli_fetch_assoc($query_halaman);

                $query = mysqli_query($conn, $sql);

                $data = [];

                while ($row = mysqli_fetch_assoc($query)) {
                    $data[] = $row;
                }

                // echo json_encode($data);
                $result = [
                    'data' => $data,
                    'total' => $total_halaman['total']
                ];

                echo json_encode($result);
            }
        }
    }

    //END
    // BENDAHARA BUKTI BAYAR
    elseif ($_POST['p'] == "bend_bukti_bayar") {
        if (isset($_POST['cari'])) {
            $id = $_POST['cari'];
            $sql = "SELECT * FROM data_tagihan";

            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            echo json_encode($data);
        } else {
            $sql = "SELECT t.id, w.no_rumah, w.no_pelanggan, w.nama, 
            s.tanggal, s.stand_awal, s.stand_akhir, t.pemakaian, 
            t.tagihan, t.konfirmasi_file
            FROM data_warga as w
            INNER JOIN data_tagihan as t ON w.id = t.id_warga
            INNER JOIN data_stand as s ON t.id_stand = s.id
            WHERE t.konfirmasi_status = 1 AND t.lunas !='Sudah'
            ORDER BY s.tanggal ASC
            ";

            $query = mysqli_query($conn, $sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
    } elseif ($_POST['p'] == "post_konfirmBuktiBayar") {
        $idT = $_POST['idTagihan'];
        if ($_POST['wh'] == 'valid') {
            $sql = "UPDATE data_tagihan SET konfirmasi_status = 0
                WHERE id = '$idT'";
            $stText = 'Ditolak';
        } else if ($_POST['wh'] == 'not_valid') {
            $sql = "UPDATE data_tagihan SET konfirmasi_status = 2, lunas='Sudah' 
                WHERE id = '$idT'";
            $stText = 'Diterima';
        }
        mysqli_query($conn, $sql);
        echo "Bukti Pembayaran ini " . $stText . '.';
    }


    // ------------------------------------------ADMIN TAMBAH AKTIVITAS---------------------------------------
    //menambahkan aktivitas
    elseif ($_POST['p'] == 'simpan_aktivitas') {
        $judul = $_POST['judul_aktivitas'];
        $isi = $_POST['isi_aktivitas'];
        $name = $_FILES['file_aktivitas']['name'];
        $tmp_name = $_FILES['file_aktivitas']['tmp_name'];
        $error = $_FILES['file_aktivitas']['error'];
        $size = $_FILES['file_aktivitas']['size'];
        $ex = explode(".", $name);
        $extensi = end($ex);

        if (in_array($extensi, ['jpg', 'png', 'jpeg'])) {
            $nama = str_replace(
                ' ',
                '-',
                $nama
            );
            $simpan = move_uploaded_file(
                $tmp_name,
                'gambar_aktivitas/' . $name
            );
            if ($simpan) {

                $sql = "INSERT INTO web_utama (judul, berita, gambar) VALUES ('$judul','$isi','$name')";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    $result = [
                        'msg' => 'Sukses input data',
                        'status' => true
                    ];
                } else {
                    $result = [
                        'msg' => 'Gagal input data',
                        'status' => false,
                        'cek' => [$tanggal, $alamat, $nama, $stand_air]
                    ];
                }

                echo json_encode($result);
            }
        }
    }
    // edit & update aktivitas
    else if ($_POST['p'] == 'edit_aktivitas') {
        $id = $_POST['id_aktivitas'];
        $judul = $_POST['judul_aktivitas'];
        $isi = $_POST['isi_aktivitas'];

        if (isset($_FILES['file_aktivitas'])) {
            $name = $_FILES['file_aktivitas']['name'];
            $tmp_name = $_FILES['file_aktivitas']['tmp_name'];
            $error = $_FILES['file_aktivitas']['error'];
            $size = $_FILES['file_aktivitas']['size'];
            $ex = explode(".", $name);
            $extensi = end($ex);
            if (in_array(
                $extensi,
                ['jpg', 'png', 'jpeg']
            )) {
                $nama = str_replace(' ', '-', $nama);
                $simpan = move_uploaded_file($tmp_name, 'gambar_aktivitas/' . $name);
                if ($simpan) {

                    $sql = "UPDATE web_utama set judul='$judul', berita='$isi', gambar='$name' WHERE id=$id";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        $result = [
                            'msg' => 'Sukses update data',
                            'status' => true
                        ];
                    } else {
                        $result = [
                            'msg' => 'Gagal update data',
                            'status' => false,
                            'cek' => [
                                $tanggal, $alamat, $nama, $stand_air
                            ]
                        ];
                    }

                    echo json_encode($result);
                }
            }
        } else {
            $sql = "UPDATE web_utama set judul='$judul', berita='$isi' WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                $result = [
                    'msg' => 'Sukses update data',
                    'status' => true
                ];
            } else {
                $result = [
                    'msg' => 'Gagal update data',
                    'status' => false,
                    'cek' => [$tanggal, $alamat, $nama, $stand_air]
                ];
            }

            echo json_encode($result);
        }
    } else if ($_POST['p'] == 'get_aktivitas') {
        $sql = "SELECT * FROM web_utama ";
        $query = mysqli_query($conn, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } elseif ($_POST['p'] == 'get_data_aktivitas') {
        $id = $_POST['id'];

        $sql = "SELECT * FROM web_utama WHERE id=$id ";
        $query = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($query);

        echo json_encode($data);
    }
    //menghapus aktivitas
    else if ($_POST['p'] == 'hapus_aktivitas') {
        $id = $_POST['id_aktivitas'];

        $sql = "DELETE web_utama WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $result = [
                'msg' => 'Sukses hapus data',
                'status' => true
            ];
        } else {
            $result = [
                'msg' => 'Gagal hapus data',
                'status' => false,
                'cek' => [$tanggal, $alamat, $nama, $stand_air]
            ];
        }

        echo json_encode($result);
    }


    //-------------------------------------------PETUGAS------------------------------------------------------
    //PILIH ALAMAT
    elseif ($_POST['p'] == "carialamat") {
        if (isset($_POST['alamat'])) {
            $alamat = $_POST["alamat"];
            $formtanggal = $_POST['tanggal'];
            $tahun = date('Y', strtotime($formtanggal));
            $bulan = date('m', strtotime($formtanggal));
            $tanggal = date('Y-m-d', strtotime($formtanggal));

            $sql = "select data_warga.id as id_warga, nama, alamat, no_pelanggan, no_rumah, data_stand.id as id, coalesce(tanggal,now()) as tanggal, coalesce(stand_awal,0) as stand_awal, coalesce(stand_akhir,0) as stand_akhir from data_warga left join data_stand on data_stand.id_warga = data_warga.id where alamat = '$alamat' and (year(tanggal) = $tahun and month(tanggal) = $bulan or (tanggal is null))";

            $query = mysqli_query($conn, $sql);

            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            if (empty($data)) {
                $id_warga = "SELECT id FROM data_warga WHERE alamat='$alamat'";
                $query_warga = mysqli_query($conn, $id_warga);
                $data_id = [];
                $tahun_sebelumnya = date('Y', strtotime($formtanggal . ' -1 month'));
                $bulan_sebelumnya = date('m', strtotime($formtanggal . ' -1 month'));

                while ($row = mysqli_fetch_assoc($query_warga)) {
                    $data_id[] = $row['id'];
                }

                for ($i = 0; $i < count($data_id); $i++) {
                    $stand_awal_sebelumnya = mysqli_query($conn, "SELECT stand_akhir FROM data_stand WHERE id_warga=$data_id[$i] AND YEAR(tanggal)=$tahun_sebelumnya AND MONTH(tanggal)=$bulan_sebelumnya");

                    if (mysqli_num_rows($stand_awal_sebelumnya) == 0) {
                        $stand_awal = 0;
                    } else {
                        $stand_awal = mysqli_fetch_assoc($stand_awal_sebelumnya)['stand_akhir'];
                    }
                    $sql = "INSERT into data_stand(tanggal,id_warga,stand_awal,stand_akhir) VALUES ('$tanggal',$data_id[$i],$stand_awal, 0)";
                    mysqli_query($conn, $sql);
                }

                $sql_baru = "SELECT data_stand.*, data_warga.nama, data_warga.alamat, data_warga.no_pelanggan, data_warga.no_rumah, data_warga.email, data_warga.tipe FROM data_stand JOIN data_warga ON data_stand.id_warga=data_warga.id WHERE alamat='$alamat' AND YEAR(tanggal)=$tahun AND MONTH(tanggal)=$bulan";

                $query_baru = mysqli_query($conn, $sql_baru);

                $data_baru = [];

                while ($row = mysqli_fetch_assoc($query_baru)) {
                    $data_baru[] = $row;
                }
                echo json_encode($data_baru);
            } else {
                echo json_encode($data);
            }
        }
    } //SEND DATA
    elseif ($_POST['p'] == "savepetugas") {
        if (isset($_POST['simpandatastand']) && $_POST['simpandatastand'] == 'true') {
            $id = $_POST['id_stand'];
            $id_warga = $_POST['id_warga'];
            $data_stand = $_POST['stand_akhir'];

            $tipe = $_POST['tipe'];
            $tanggal = date('Y-m-d');
            $berhasil = true;

            for ($i = 0; $i < count($id); $i++) {
                if ($tipe[$i] == 'Kos') {
                    $tarif = 3500;
                } else {
                    $tarif = 2500;
                }

                $dataInfo = explode('_', $_POST['info']);
                // kalo belom ada data samsek ke sini gaes
                if ($id[$i] == 'null') {

                    $tagihan = (($tarif * $data_stand[$i]) + 10000);
                    // $sql = "UPDATE data_stand SET stand_akhir = $data_stand[$i] where id =";
                    $sql = "INSERT INTO data_stand (id_warga,tanggal,stand_awal,stand_akhir) VALUES ($id_warga[$i],'$tanggal',0,$data_stand[$i])";
                    $querysql = mysqli_query($conn, $sql);
                    if ($querysql) {
                        $id_stand = mysqli_insert_id($conn);
                        $tambahTagihan = "INSERT INTO data_tagihan (id_warga, id_stand, stand_awal, stand_akhir, pemakaian, tarif, aktif, tagihan, lunas) VALUES ($id_warga[$i], $id_stand, 0, $data_stand[$i], $data_stand[$i], $tarif, 'Y', $tagihan, 'belum')";
                        $queryTagihan = mysqli_query($conn, $tambahTagihan);
                    }
                } else {
                    // $tagihan = (($tarif * $data_stand[$i]) + 10000);
                    $sql = "UPDATE data_stand SET stand_akhir = $data_stand[$i] WHERE id = $id[$i]";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        // # apakah data_tagihan dengan id_stand tersebut sudah tersedia 
                        $hasTagihan_SQL = "SELECT * FROM data_tagihan where id_stand = $id[$i]";
                        $hasTagihan_Query = mysqli_query($conn, $hasTagihan_SQL);
                        // 
                        $lastStandAwal_SQL =  "SELECT stand_awal as val FROM data_stand where id = $id[$i]";
                        $lastStandAwal_Query = mysqli_query($conn, $lastStandAwal_SQL);
                        $lastStandAwal = mysqli_fetch_assoc($lastStandAwal_Query)['val'];
                        $pemakaianStand =  $data_stand[$i] - $lastStandAwal;
                        $pemakaianStand = $pemakaianStand < 0 ? $pemakaianStand * -1 : $pemakaianStand;
                        $tagihan = (($tarif * $pemakaianStand) + 10000);
                        // # cek data_tagihan tersebut
                        if (mysqli_num_rows($hasTagihan_Query) == 0) {
                            // $pemakaianStand =  $data_stand[$i] - $lastStandAwal;
                            echo  $sqlTagihan = "INSERT INTO data_tagihan (id_warga, id_stand, stand_awal, stand_akhir, pemakaian, tarif, aktif, tagihan, lunas) VALUES ($id_warga[$i], $id[$i], $lastStandAwal, $data_stand[$i], $pemakaianStand, $tarif, 'Y', $tagihan, 'belum')";
                        } else {
                            echo $sqlTagihan = "UPDATE data_tagihan SET stand_akhir = $data_stand[$i], pemakaian = $data_stand[$i], tagihan = $tagihan WHERE id_warga = $id_warga[$i] AND id_stand = $id[$i]";
                        }
                        $queryTagihan = mysqli_query($conn, $sqlTagihan);
                    }

                    // TODO
                }

                if (!$queryTagihan) {
                    $berhasil = false;
                }
            }

            if ($berhasil) {
                $result = [
                    'msg' => 'Sukses input data',
                    'status' => true
                ];
            } else {
                $result = [
                    'msg' => 'Gagal input data',
                    'status' => false,
                    'cek' => [$pemakaianStand, $tagihan]
                ];
            }

            echo json_encode($result);
            return true;
        }
    } else if ($_POST['p'] == 'detailtagihan') {
        $id     = $_POST['id'];
        $sql    = "SELECT *, data_tagihan.id as id_tagihan FROM data_tagihan JOIN data_warga ON data_warga.id = data_tagihan.id_warga JOIN data_stand ON data_stand.id = data_tagihan.id_stand WHERE data_tagihan.id = $id";
        $query  = mysqli_query($conn, $sql);
        $data   = mysqli_fetch_assoc($query);

        echo json_encode($data);
        // END
    } else if ($_POST['p'] == 'totalpemakaian') {
        $total = "SELECT IFNULL(SUM(pemakaian),0) as pemakaian, month(data_stand.tanggal) as month, year(data_stand.tanggal) as year FROM data_tagihan  RIGHT JOIN data_stand ON data_stand.id = data_tagihan.id_stand GROUP BY month(data_stand.tanggal), year(data_stand.tanggal) ORDER BY data_stand.tanggal DESC LIMIT 12";
        $query  = mysqli_query($conn, $total);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        echo json_encode($data);
        //END
    } else if ($_POST['p'] == 'gantilunas') {
        $id     = $_POST['id'];
        $sql    = "UPDATE data_tagihan SET lunas ='Sudah' WHERE id = $id";
        $query  = mysqli_query($conn, $sql);
        // END
    } else if ($_POST['p'] == 'totalpemasukan') {
        $total = "SELECT IFNULL(SUM(tagihan),0) as tagihan, month(data_stand.tanggal) as month, year(data_stand.tanggal) as year FROM data_tagihan  RIGHT JOIN data_stand ON data_stand.id = data_tagihan.id_stand GROUP BY month(data_stand.tanggal), year(data_stand.tanggal) ORDER BY data_stand.tanggal DESC LIMIT 12";
        $query  = mysqli_query($conn, $total);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        echo json_encode($data);
        //END
    } else if ($_POST['p'] == 'gaugeair') {
        $gaugeair = "SELECT (SUM(pemakaian)) as pemakaian, month(data_stand.tanggal) as month, year(data_stand.tanggal) as year FROM data_tagihan  RIGHT JOIN data_stand ON data_stand.id = data_tagihan.id_stand GROUP BY month(data_stand.tanggal), year(data_stand.tanggal) ORDER BY data_stand.tanggal DESC LIMIT 1";
        $query  = mysqli_query($conn, $gaugeair);
        $data = mysqli_fetch_assoc($query);
        // while ($row = mysqli_fetch_assoc($query)) {
        //     $data[] = $row;
        // }
        echo json_encode($data);
    } else if ($_POST['p'] == 'gaugerupiah') {
        $gaugerupiah = "SELECT (SUM(tagihan)) as tagihan, month(data_stand.tanggal) as month, year(data_stand.tanggal) as year FROM data_tagihan  RIGHT JOIN data_stand ON data_stand.id = data_tagihan.id_stand GROUP BY month(data_stand.tanggal), year(data_stand.tanggal) ORDER BY data_stand.tanggal DESC LIMIT 1";
        $query  = mysqli_query($conn, $gaugerupiah);
        $data = mysqli_fetch_assoc($query);
        // while ($row = mysqli_fetch_assoc($query)) {
        //     $data[] = $row;
        // }
        echo json_encode($data);
        //MNMPILKN DATA KONF BAYAR
    }

    //end
}
