<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();
$username = $_GET['u'];

// if ($username == "") {
//     header("Location:Login.php");
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

            <?php atas_konfirmasi(); ?>

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
        <script src="../node_modules/exporting.j s"></script>
        <script src="../node_modules/export-data.js"></script>
        <script src="../node_modules/accessibility.js"></script>

        <script>
            $(document).ready(function() {
                // getData_data_user();
                // search_data_user();
                // getmanajemen_air();

                $("#form_konfirmasi_bayar_post").on('submit', function(e) {
                    e.preventDefault();
                    // console.log("oke");
                    var fileData = new FormData();
                    fileData.append('file', $('#file_bukti_bayar')[0].files[0]);
                    fileData.append('p', 'form_konfirmasi_bayar_post');
                    fileData.append('tgl_id', $("select[name=tgl_konfirmasi_bayar]").val());
                    fileData.append('u', $("input[name=u]").val());
                    // var user = $('input[name=u]').val();

                    $.ajax({
                        url: 'olah.php',
                        data: fileData,
                        method: 'POST',
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(response) {
                            alert(response)
                            location.href="https://turusasri.info/turus_android/konfirmasi_bayar.php?u="+user;
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    })
                })
                $("#formAddAktivitas").on('submit', function(e) {
                    e.preventDefault();
                    var fileData = new FormData();
                    fileData.append('file', $('#file_aktivitas')[0].files[0]);
                    fileData.append('p', 'formAddAktivitas')
                    fileData.append('judul', $("input[name=aJudulAktv]").val())
                    fileData.append('isi', $("#aIsiAktv").val())

                    $.ajax({
                        url: 'olah.php',
                        data: fileData,
                        method: 'POST',
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(response) {
                            alert(response)
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    })
                })

                $("#formUbahGambarAktivitas").on('submit', function(e) {
                    e.preventDefault();
                    var fileData = new FormData();
                    fileData.append('file', $('#file_Ubahaktivitas')[0].files[0]);
                    fileData.append('p', 'formUbahGambaraktivitas')
                    fileData.append('id', $("input[name=idNya]").val())

                    $.ajax({
                        url: 'olah.php',
                        data: fileData,
                        method: 'POST',
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(response) {
                            alert(response)
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    })
                })

                $("#formUbahAktivitas").on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'olah.php',
                        data: {
                            p: 'formUbahAktivitas',
                            id: $("input[name=idNya]").val(),
                            judul: $("input[name=edit_judul_aktivitas]").val(),
                            berita: $("#editIsiAktivitas").val()
                        },
                        method: 'POST',
                        success: function(response) {
                            alert(response)
                            location.reload();
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    })
                })
                $('#ubahAktivitasGambar').on('show.bs.modal', function(event) {
                    var mod = $(event.relatedTarget) // Button that triggered the modal
                    data = mod.data('key') // Extract info from data-* attributes
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    // console.log(data.tanggal)
                    modal.find('#idNya').val(data.id)
                    $('#gambarAktivitas').attr('src', '../assets/uploads/' + data.gambar);
                })

                $('#mdlDetailAktivitas').on('show.bs.modal', function(event) {
                    var mod = $(event.relatedTarget) // Button that triggered the modal
                    data = mod.data('key') // Extract info from data-* attributes
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    // console.log(data.tanggal)

                    modal.find('#idNya').val(data.id)
                    modal.find('#editJudulAktivitas').val(data.judul)
                    modal.find('#editIsiAktivitas').val(data.berita)


                })


                $(document).on('click', '#aktvHapus', function(e) {
                    if (confirm("Hapus data ini?")) {
                        $.ajax({
                            url: 'olah.php',
                            data: {
                                p: 'hapus_aktivitasNow',
                                idNe: e.target.dataset.id
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
            })

            function getData_aktivitas() {
                $.ajax({
                    url: 'olah.php',
                    data: {
                        p: 'read_aktivitas'

                    },
                    method: 'POST',
                    success: function(response) {
                        // console.log(response);
                        res = JSON.parse(response);
                        var list = "";

                        $.each(res, function(index, val) {
                            list +=
                                "<tr><td>" + (index + 1) + "</td><td>" + val.judul + "</td><td>" + val.berita + "</td><td>" + val.gambar + "<a href='javascript:void(0)' data-key='" + JSON.stringify(val) + "' data-toggle='modal' data-target='#ubahAktivitasGambar'>Lihat</a></td><td align='center'><button class='btn btn-primary' data-toggle='modal' data-target='#mdlDetailAktivitas' data-key= '" + JSON.stringify(val) + "'>Detail</button><a class='btn btn-danger ml-3' href='javascript:void(0)' id='aktvHapus' data-id='" + val.id + "' >Hapus</a></td></tr>"

                        });

                        $("#getData_aktivitas").append(list);

                        // $('#tombolnavigasi').empty();
                        // var total_halaman = res.total / 10;
                        // for (var indexhalaman = 0; indexhalaman < total_halaman; indexhalaman++) {
                        //     $('#tombolnavigasi').append('<li class="page-item"><a class="page-link" href="http://localhost/turusasri/login/index.php?p=data_user&page=' + indexhalaman + '">' + (indexhalaman + 1) + '</a></li>');
                        // }
                    },
                    error: function(response) {
                        // console.log(response);
                    }
                });
            }
            $(document).ready(function() {
                // get_konfirmasi_tagihan();
                // getData_tagBelum_user();
                // getData_pemakaian_tagihan();
                // getData_aktivitas()
                // bend_bayar_bukti();
            })
        </script>

</body>

</html>
<?php
