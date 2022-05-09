<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();
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
</head>

<body>
    <div class="wrapper ">
        <!-- Kepala -->
        <?php kepala_bendahara();
        $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
        <div class="main-panel">
            <?php atas_air(); ?>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js"></script>
        <script src="../node_modules/highcharts.js"></script>
        <script src="../node_modules/exporting.js"></script>
        <script src="../node_modules/export-data.js"></script>
        <script src="../node_modules/accessibility.js"></script>

        <script>
            //MENAMPILKAN TAGIHAN DI MANAJEMEN PEMBAYARAN
            function getmanajemen_air() {
                $.ajax({
                    url: 'olah.php',
                    data: {
                        p: 'manajemenair',
                        tahuntag: $('#tahuntag').val(),
                        getUser: true
                    },
                    method: 'POST',
                    success: function(response) {
                        res = JSON.parse(response);
                        var tabel = "";
                        var buttonshow = "";
                        $("#tagihan-warga-body").empty();
                        var currentUser = 0;
                        $.each(res, function(index, value) {
                            var buttonColumn = function() {
                                var buttontemp = ""
                                $.ajax({
                                    url: 'olah.php',
                                    data: {
                                        p: 'manajemenair',
                                        tahuntag: $('#tahuntag').val(),
                                        getTagihan: true,
                                        id_warga: value.id
                                    },
                                    async: false,
                                    method: 'POST',
                                    success: function(responsetagihan) {
                                        restagihan = JSON.parse(responsetagihan);
                                        var button = {}
                                        $.each(restagihan, function(idx, val) {
                                            for (var bulan = 0; bulan < 12; bulan++) {

                                                if (val.tanggal != null) {
                                                    var tanggal = new Date(val.tanggal);
                                                    // console.log(tanggal.getMonth())
                                                    if (tanggal.getMonth() == bulan) {
                                                        if (val.lunas == 'Sudah') {
                                                            //ADA TANGGAL, ADA BULAN, LUNAS
                                                            button[bulan] = "<td><button class='btn btn-info btn-sm detailTagihanBtn' data-id='" + val.tagihan_id + "'><i class='fas fa-check'></i></button></td>";
                                                        } else {
                                                            //ADA TANGGAL, ADA BULAN, BELUM LUNAS
                                                            button[bulan] = "<td><button class='btn btn-warning btn-sm detailTagihanBtn' data-id='" + val.tagihan_id + "'><i class='fas fa-times'></i></button></td>"
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                        buttontemp = button
                                        button = []

                                    }
                                });

                                return buttontemp
                            }()
                            // console.log(buttonColumn)
                            for (var bulan = 0; bulan < 12; bulan++) {
                                console.log(bulan, buttonColumn[bulan])
                                if (typeof(buttonColumn[bulan]) === "undefined") {
                                    buttonshow += "<td><button class='btn btn-danger btn-sm'  onClick='noTagihan()'><i class='fas fa-times'></i></button></td>"
                                } else {
                                    buttonshow += buttonColumn[bulan]
                                }
                            }

                            tabel +=
                                "<tr><td>" + (index + 1) + "</td><td>" + value.nama + "</td><td>" + value.alamat + "</td><td>" + value.no_rumah + "</td>" +
                                buttonshow + "</tr>";

                            buttonshow = "";
                        });
                        $("#tagihan-warga-body").append(tabel);
                    },

                    error: function(response) {
                        // console.log(response);
                    }
                });
            }

            function getTagihanUser(id) {
                var buttonColumn = "test";
                $.ajax({
                    url: 'olah.php',
                    data: {
                        p: 'manajemenair',
                        tahuntag: $('#tahuntag').val(),
                        getTagihan: true,
                        id_warga: id
                    },
                    method: 'POST',
                    success: function(response) {
                        res = JSON.parse(response);

                        var button = ""
                        $.each(res, function(index, value) {
                            for (var bulan = 0; bulan < 12; bulan++) {

                                if (value.tanggal != null) {
                                    var tanggal = new Date(value.tanggal);
                                    // console.log(tanggal.getMonth())
                                    if (tanggal.getMonth() == bulan) {
                                        if (value.lunas == 'Sudah') {
                                            //ADA TANGGAL, ADA BULAN, LUNAS
                                            button += "<td><button class='btn btn-info btn-sm detailTagihanBtn' data-id='" + value.tagihan_id + "'><i class='fas fa-check'></i></button></td>";
                                        } else {
                                            //ADA TANGGAL, ADA BULAN, BELUM LUNAS
                                            button += "<td><button class='btn btn-warning btn-sm detailTagihanBtn' data-id='" + value.tagihan_id + "'><i class='fas fa-times'></i></button></td>"
                                        }
                                    } else {
                                        // TANGGAL ADA TAPI BULAN GA ADA
                                        button += "<td><button class='btn btn-warning btn-sm'  data-id='" + value.tagihan_id + "' onClick='noTagihan()'><i class='fas fa-times'></i></button></td>"
                                    }
                                } else {
                                    // JIKA DATA TIDAK ADA
                                    button += "<td><button class='btn btn-warning btn-sm'  data-id='" + value.tagihan_id + "' onClick='noTagihan()'><i class='fas fa-times'></i></button></td>"
                                }
                            }
                        });
                        buttonColumn = button
                    },
                    error: function(response) {
                        // console.log(response);
                    }
                });
                return buttonColumn;
            }

            $(document).on('click', '.detailTagihanBtn', function() {
                $('#detailTagihanId').val('');
                $('#detailTagihanId').val($(this).data('id'));
                $.ajax({
                    url: 'olah.php',
                    method: 'post',
                    data: {
                        p: 'detailtagihan',
                        id: $(this).data('id')
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        console.log(response);
                        if (res.lunas == "Sudah") {
                            $("#gantilunas").hide();

                        } else {
                            $("#gantilunas").show();
                        }

                        $('#detailTagihanNama').html('');
                        $('#detailTagihanAlamat').html('');
                        $('#detailTagihanTanggal').html('');
                        $('#detailTagihanStandAwal').html('');
                        $('#detailTagihanStandAkhir').html('');
                        $('#detailTagihanRupiah').html('');
                        $('#detailTagihanPemakaian').html('');
                        $('#detailTagihanStatus').html('');

                        $('#detailTagihanNama').html(res.nama);
                        $('#detailTagihanAlamat').html(res.alamat);
                        $('#detailTagihanTanggal').html(res.tanggal);
                        $('#detailTagihanStandAwal').html(res.stand_awal);
                        $('#detailTagihanStandAkhir').html(res.stand_akhir);
                        $('#detailTagihanRupiah').html(res.tagihan);
                        $('#detailTagihanPemakaian').html(res.pemakaian);
                        $('#detailTagihanStatus').html(res.lunas);
                        $('#detailTagihanModalBend').modal('show');
                    }
                })
            });

            function noTagihan() {
                Swal.fire({
                    title: 'Tidak memiliki data tagihan',
                    type: 'error',
                });

            }
            $('#gantilunas').on('click', function() {
                $.ajax({
                    url: "olah.php",
                    method: "POST",
                    data: {
                        p: "gantilunas",
                        id: $('#detailTagihanId').val(),
                    },
                    success: function(data) {
                        Swal.fire({
                            title: 'Perubahan Berhasil Disimpan',
                            type: 'success',
                        });
                        window.location.reload()
                    }
                })
            });

            $('#tahuntag').on('change', function() {
                getmanajemen_air();
            });
        </script>
</body>

</html>