<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();
$username = $_GET['u'];

// if ($username == "") {
//     header("Location:login.php");
// } else if ($username == '087715434710') {
//     header("Location:login.php");
// } else if ($username == '085740266236') {
//     header("Location:login.php");
// } else if ($username == '0895367011297') {
//     header("Location:login.php");
// } else if ($username == '08157785211') {
//     header("Location:login.php");
// } else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">


    <title>Tirta Turus Asri</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
    <link href="../node_modules/simple-line-icons-master/simple-line-icons.min.css" rel="stylesheet">
    <link href="../node_modules/pace.min.css" rel="stylesheet">
    <link href="../node_modules/animate.css" rel="stylesheet">
    <link rel="caap" sizes="76x76" href="../assets/img/caap.jpeg">
    <link rel="icon" type="image/png" href="../assets/img/caap.jpeg">
    <link href="../node_modules/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <link href="../node_modules/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/gauge.css">

</head>

<body>

    <div class="wrapper ">

        <?php kepala_warga();
        $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
        <div class="main-panel">

            <?php atas_tagihan(); ?>

            <?php kaki(); ?>
        </div>

        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../node_modules/GaugeMeter.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="../assets/js/plugins/moment.min.js"></script>
        <script src="../assets/js/plugins/sweetalert2.js"></script>
        <script src="../assets/js/plugins/jquery.validate.min.js"></script>
        <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
        <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
        <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
        <script src="../assets/js/plugins/fullcalendar.min.js"></script>
        <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <script src="../assets/js/plugins/arrive.min.js"></script>
        <script src="../assets/js/plugins/chartist.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
        <!-- <script src="../node_modules/jquery-3.5.1.min.js"></script> -->
        <script src="../node_modules/GaugeMeter.js"></script>
        <script src="../node_modules/bootstrap.min.js"></script>
        <script src="../node_modules/pace.min.js"></script>
        <script src="../node_modules/perfect-scrollbar-0.4.5.min.js"></script>
        <script src="../node_modules/Chart.min.js"></script>
        <script src="../node_modules/d3.v3.min.js"></script>
        <script src="../node_modules/liquidFillGauge.js" language="JavaScript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js"></script>
        <script src="../node_modules/highcharts.js"></script>
        <script src="../node_modules/exporting.js"></script>
        <script src="../node_modules/export-data.js"></script>
        <script src="../node_modules/accessibility.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->
        <script src="../node_modules/jquery.qrcode.js"></script>
        <script src="../node_modules/qrcode.js"></script>



        <!-- TAGIHAN -->
        <script>
            $(document).ready(function() {

                // $("#qrcode").children().css({
                //     "width": "100px",
                //     "height": "100px"
                // });

                // jQuery('#qrcode').qrcode({
                //     render: "table",
                //     text: "http://jetienne.com"
                // });f

                getData_data_user();
                search_data_user();
                <?php if (isset($_GET['p']) && $_GET['p'] == 'tag_user') { ?>
                    getmanajemen_air();
                <?php } ?>
            })

            $("#formbayar").click(function() {
                $("#qr").css("display", "");
                $("#formbayar").css("display", "none");
                $("#ctagihan").css("display", "");
                $("#cbayar").css("display", "none");
                $("#tabel1").css("display", "none");
                $("#tabel2").css("display", "none");
                $("#tabel3").css("display", "none");
                $("#tabel4").css("display", "none");
                $("#tabel5").css("display", "none");
                $("#tabel6").css("display", "none");
                $("#tabel7").css("display", "none");

                let link_iframe = $("#iframe_qr").attr("data-src");
                $("#iframe_qr").attr("src", link_iframe);
            });

            $("#cformtagihan").click(function() {
                $("#qr").css("display", "none");
                $("#formbayar").css("display", "");
                $("#ctagihan").css("display", "none");
                $("#cbayar").css("display", "");
                $("#tabel1").css("display", "");
                $("#tabel2").css("display", "");
                $("#tabel3").css("display", "");
                $("#tabel4").css("display", "");
                $("#tabel5").css("display", "");
                $("#tabel6").css("display", "");
                $("#tabel7").css("display", "");

                $("#iframe_qr").attr("src", "");
            });

            $(document).on('click', '.detailTagihanModal', function(event) {

                var data = ($(this).data('tagihan')).split(',')
                var modal = $('#detailTagihanModal')
                console.log(data)

                function rupiah(nom) {
                    var reverse = nom.toString().split('').reverse().join('')
                    ribuan = reverse.match(/\d{1,3}/g)
                    ribuan = ribuan.join('.').split('').reverse().join('')

                    return ribuan
                }

                tgl = data[2].split('-')
                bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

                modal.find('#detailTagihanStandAwal').text((data[0] == 'undefined' || data[0] == '') ? 'null' : data[0])
                modal.find('#detailTagihanStandAkhir').text((data[1] == 'undefined' || data[1] == '') ? 'null' : data[1])
                modal.find('#detailTotalTagihan').text((data[4] == 'undefined' || data[4] == '') ? '0' : rupiah(data[4]))
                document.getElementById('idStatusLunas').innerHTML = (data[3] == 'undefined' || data[3] == '') ? "<span class='badge badge-danger'>Belum Lunas</span>" : (data[3] == 'Sudah') ? "<span class='badge badge-success'>Lunas</span>" : "<span class='badge badge-danger'>Belum Lunas</span>"
                modal.find('#detailTanggalInput').text((data[2] == 'undefined' || data[2] == '') ? 'null' : data[2])
                modal.find('#detailPemakaian').text((data[5] == 'undefined' || data[5] == '') ? '0' : data[5])
                modal.find('#detailBulanPemakaian').text((data[2] == 'undefined' || data[2] == '') ? '0' : bulan[Number(tgl[1]) - 1])

            })

            function bend_bayar_bukti() {
                $.ajax({
                    url: 'olah.php',
                    data: {
                        p: 'bend_bukti_bayar'
                    },
                    method: 'POST',
                    success: function(response) {
                        // console.log(response)
                        res = JSON.parse(response);
                        var list = "";
                        $.each(res, function(index, val) {
                            list +=
                                "<tr><td>" + (index + 1) + "</td><td>" + val.nama + "</td><td>" + val.no_pelanggan + "</td><td>" + val.tanggal + "</td><td align='center'><button class = 'detailBendBuktiBayar btn btn-info' data-toggle='modal' data-target='#detailBendBuktiBayar' data-user='" + JSON.stringify(val) + "' data-id=" + val.id + ">Detail</button></td></tr>"
                            console.log(val);
                        });
                        $("#bendahara_bayar").append(list);
                        // $('#tombolnavigasi').empty();
                        // var total_halaman = res.total / 10;
                        // for (var indexhalaman = 0; indexhalaman < total_halaman; indexhalaman++) {
                        //     $('#tombolnavigasi').append('<li class="page-item"><a class="page-link" href="http://localhost/turusasri/login/index.php?p=data_user&page=' + indexhalaman + '">' + (indexhalaman + 1) + '</a></li>');
                        // }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
            $(document).on('click', '.detailBendBuktiBayar', function(event) {
                console.log("woi")
                // var mod = $(event.relatedTarget) // Button that triggered the modal
                // data = mod.data('user') // Extract info from data-* attributes
                // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                // var modal = $(this)
                // // console.log(data.tanggal)
                var data = ($(this).data('user'))
                console.log(data)
                // var modal = $('#detailBendBuktiBayar')


                function rupiah(nom) {
                    var reverse = nom.toString().split('').reverse().join('')
                    ribuan = reverse.match(/\d{1,3}/g)
                    ribuan = ribuan.join('.').split('').reverse().join('')

                    return ribuan
                }


                bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

                $('#d_noRumah').text(data.no_rumah)
                $('#d_noPelanggan').text(data.no_pelanggan)
                $('#d_namaWarga').text(data.nama)
                $('#d_tanggal').text(data.tanggal)
                $('#d_bulan').text(bulan[data.tanggal.split('-')[1] - 1])
                $('#d_s_awal').text(data.stand_awal)
                $('#d_s_akhir').text(data.stand_akhir)
                $('#d_pemakaian').text(data.pemakaian)
                $('#d_tagihan').text(rupiah(data.tagihan))
                $('#aHrefBuktiBayar').attr('href', '../assets/uploads/' + data.konfirmasi_file);
                $('#gambarBuktiBayar').attr('src', '../assets/uploads/' + data.konfirmasi_file);
                $('#btnKonfirmasBuktiBayar_bend1').attr('data-id', data.id)
                $('#btnKonfirmasBuktiBayar_bend2').attr('data-id', data.id)

            })

            $('#btnKonfirmasBuktiBayar_bend1').on('click', function() {
                if (confirm("Bukti ini tidak valid? klik oke untuk iya")) {
                    $.ajax({
                        url: 'olah.php',
                        data: {
                            p: 'post_konfirmBuktiBayar',
                            wh: 'valid',
                            idTagihan: $('#btnKonfirmasBuktiBayar_bend1').attr('data-id')
                        },
                        method: 'POST',
                        success: function(response) {
                            alert(response)
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                } else {
                    txt = "You pressed Cancel!";
                }
            })
            $('#btnKonfirmasBuktiBayar_bend2').on('click', function() {
                if (confirm("Bukti ini valid? klik oke untuk iya")) {
                    $.ajax({
                        url: 'olah.php',
                        data: {
                            p: 'post_konfirmBuktiBayar',
                            wh: 'not_valid',
                            idTagihan: $('#btnKonfirmasBuktiBayar_bend1').attr('data-id')
                        },
                        method: 'POST',
                        success: function(response) {
                            alert(response)
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                } else {
                    txt = "You pressed Cancel!";
                }
            })

            function year_select(sel) {
                // alert(sel.value);
                $.ajax({
                    url: 'olah_dua.php',
                    data: {
                        p: 'get_year_pemakaian_byuser',
                        wh: sel.value
                    },
                    method: 'POST',
                    success: function(response) {
                        // console.log('response');
                        res = JSON.parse(response);
                        var list = "";

                        $.each(res, function(index, val) {
                            tgl = val.tanggal.split('-')
                            bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                            if (val.lunas == 'Sudah') {
                                bdge = 'success'
                                txt = 'Sudah'
                            } else {
                                if (val.konfirmasi_status == 1) {
                                    bdge = 'warning'
                                    txt = 'Proses Konfirmasi'
                                } else if (val.konfirmasi_status == 0) {
                                    bdge = 'danger'
                                    txt = 'Bukti Ditolak'
                                } else if (val.konfirmasi_status == 2) {
                                    bdge = 'danger'
                                    txt = 'Belum Bayar'
                                } else {
                                    bdge = 'danger'
                                    txt = 'Belum Bayar'
                                }
                                console.log(val);
                            }
                            list +=
                                "<tr><td>" + (index + 1) + "</td><td>" + tgl[2] + '/' + tgl[1] + '/' + tgl[0] + "</td><td>" + bulan[Number(tgl[1]) - 1] + "</td><td><span class='badge badge-" + bdge + "'>" + txt + "</span></td><td align='center'><button id='hapus-user' data-tagihan='" + val.s_awal + "," + val.s_akhir + "," + val.tanggal + "," + val.lunas + "," + val.tagihan + "," + val.pemakaian + "' data-toggle='modal' data-target='#detailTagihanModal' class='btn btn-danger detailTagihanModal' data-id= '" + val.w_id + "'>Detail</button></td></tr>"

                        });

                        // $("#pemakaian_tagihan_body").replaceWith('');    
                        $("#pemakaian_tagihan_byuser").append(list);
                        console.log(list);


                        // $('#tombolnavigasi').empty();
                        // var total_halaman = res.total / 10;
                        // for (var indexhalaman = 0; indexhalaman < total_halaman; indexhalaman++) {
                        //     $('#tombolnavigasi').append('<li class="page-item"><a class="page-link" href="http://localhost/turusasri/login/index.php?p=data_user&page=' + indexhalaman + '">' + (indexhalaman + 1) + '</a></li>');
                        // }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
        </script>

</body>

</html>
<?php
