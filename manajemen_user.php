<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();
$username = $_GET['u'];
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

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
        body {
            padding: 2em;
        }

        .toggle-switch {
            background: #ccc;
            width: 50px;
            height: 20px;
            overflow: hidden;
            border-radius: 3px;
            display: inline-block;
            vertical-align: middle;
            margin: 0 10px;
        }

        .toggle-switch:after {
            content: " ";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #3498DB;
            border: 3px solid #fff;
            border-top: 0;
            border-bottom: 0;
            margin-left: -3px;
            transition: all 0.1s ease-in-out;
        }

        .active .toggle-switch:after {
            margin-left: 30px;
        }

        .toggle-label {
            display: inline-block;
            line-height: 30px;
        }

        .toggle-label-off {
            color: #3498DB;
        }

        .active .toggle-label-off {
            color: #000;
            font-size: small;
        }

        .active .toggle-label-on {
            color: #3498DB;
        }
    </style>
</head>

<body>
    <div class="wrapper ">
        <?php kepala_admin();
        $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
        <div class="main-panel">
            <?php atas_manj_user(); ?>
            <?php kaki(); ?>
        </div>

        <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
        <!-- <script src="../assets/js/plugins/jquery.dataTables.min.js"></script> -->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

        <!-- <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

        <!-- MANAJEMEN USER -->
        <script>
            $(document).ready(function() {
                getData_data_user();
                // search_data_user();
                <?php if (isset($_GET['p']) && $_GET['p'] == 'tag_user') { ?>
                    getmanajemen_air();
                <?php } ?>
            })
            $("#add_data-data_user").click(function() {
                $("#data-data_user").hide();
                $("#crud-data_user").show();
            });

            // $(function(){
            // $('.toggle').on('click', function(event){
            //     event.preventDefault();
            //     $(this).toggleClass('active');
            // });
            // });

            //SEARCH USER DATA DI MENEJEMEN USER
            function search_data_user(key = null) {
                $.ajax({
                    url: 'olah.php',
                    method: 'post',
                    data: {
                        key: key,
                        p: 'search',
                        page: "<?php echo $page; ?>"
                    },
                    success: function(response) {
                        // console.log(response);
                        res = JSON.parse(response);
                        var data = "";
                        var hal = <?php echo $page; ?>;
                        $('#databody-data_user').empty();

                        $.each(res.data, function(index, val) {
                            if (val.status_sistem == 'ON') {
                                a = 'active';
                            } else {
                                a = '';
                            }
                            data += "<tr><td>" + (hal + (index + 1)) + "</td><td>" + val.nama + "</td><td align='center'>" + val.no_rumah + "</td><td>" + val.no_hp + "</td><td align='center'>" + val.status_bayar + "</td><td align='center'>" + val.debit + "</td><td><div class='toggle " + a + "' id='valen" + val.id + "' name='toggle-switch'><div class='toggle-label toggle-label-off'>OFF</div><div class='toggle-switch' data-id='" + val.id + "' data-status_sistem='" + val.status_sistem + "'></div><div class='toggle-label toggle-label-on'>ON</div></div></td><td align ='center'><button type='button' id='edit-user' data-user=" + val.nama + " class='btn btn-primary edit-user' data-id='" + val.id + "' data-nama= '" + val.nama + "' data-alamat= '" + val.alamat +
                                "' data-no_hp= '" + val.no_hp + "' data-tipe= '" + val.tipe + "' data-no_pelanggan='" + val.no_pelanggan + "' data-no_rumah='" + val.no_rumah + "'><i class='fa fa-pencil' aria-hidden='true'></i></button><button id='hapus-user' data-user=" + val.nama + " class='btn btn-danger hapus-user' data-id= '" + val.id + "'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></tr>"
                        });

                        $('#databody-data_user').append(data);
                        // paginasi
                        $('#tombolnavigasi').empty();
                        var total_halaman = res.total;
                        for (var indexhalaman = 0; indexhalaman < total_halaman; indexhalaman++) {
                            $('#tombolnavigasi').append('<li class="page-item"><a class="page-link" href="index.php?p=data_user&page=' + indexhalaman + '">' + (indexhalaman + 1) + '</a></li>');
                        }
                    }
                })
            }

            function searching_data_user() {
                var key = $('#search').val();
                search_data_user(key);
            }
            //END

            //MENAMBAHKAN USER DI MANAJEMEN USER
            function sendData_data_user() {
                var form_empty = false;
                $('#userform input').each(function() {
                    if ($(this).val() === "") {
                        form_empty = true;
                    }
                })
                if (form_empty) {
                    alert("Data Belum Terisi")
                } else {

                    var dataForm = $('#userform').serialize() + '&p=save';
                    $.ajax({
                        url: 'olah.php',
                        data: dataForm,
                        method: 'POST',
                        success: function(response) {
                            Swal.fire({
                                title: 'Data berhasil ditambahkan',
                                type: 'success',
                            }).then((result) => {
                                window.location.reload();
                            })
                        },
                        error: function(response) {
                            // console.log(response);
                            // res = JSON.parse(response);
                            // alert(res.msg);
                        }
                    });
                }
            }
            //END

            //MENAMPILKAN USER DI MENEJEMEN USER
            function getData_data_user() {
                $.ajax({
                    url: 'olah.php',
                    data: {
                        p: 'read'
                    },
                    method: 'POST',
                    success: function(response) {
                        // console.log(response);
                        res = JSON.parse(response);
                        var list = "";
                        var hal = 0;
                        var clr = "";

                        $.each(res, function(index, val) {
                            if (val.status_sistem == 'ON') {
                                a = 'active';
                            } else {
                                a = '';
                            }
                            //tambahan agar kolomnya berwarna merah
                            if (val.status_bayar == 'belum') {
                                list += "<tr style='background-color:rgba(255, 99, 71, 0.4)'><td>" + (clr + (hal + (index + 1))) + "</td><td>" + val.nama + "</td><td align='center'>" +
                                    val.no_rumah + "</td><td>" + val.no_hp + "</td><td align='center'>" + val.status_bayar + "</td><td align='center'>" + val.debit + "</td><td><div class='toggle " + a + "' id='valen" + val.id + "'><div class='toggle-label toggle-label-off'>OFF</div><div class='toggle-switch' data-id='" + val.id + "' data-status_sistem='" + val.status_sistem + "'></div><div class='toggle-label toggle-label-on'>ON</div></div></td><td align='center'><button type='button' id='edit-user' data-user=" + val.nama + " class='btn btn-primary edit-user' data-id='" + val.id + "' data-nama= '" + val.nama + "' data-alamat= '" + val.alamat + "' data-no_hp= '" + val.no_hp + "' data-tipe= '" + val.tipe + "' data-no_pelanggan='" + val.no_pelanggan + "' data-no_rumah='" + val.no_rumah + "'><i class='fa fa-pencil' aria-hidden='true'></i></button><button id='hapus-user' data-user=" + val.nama + " class='btn btn-danger hapus-user' data-id= '" + val.id + "'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></tr>"
                            } else {
                                list += "<tr><td>" + (clr + (hal + (index + 1))) + "</td><td>" + val.nama + "</td><td align='center'>" +
                                    val.no_rumah + "</td><td>" + val.no_hp + "</td><td align='center'>" + val.status_bayar + "</td><td align='center'>" + val.debit + "</td><td><div class='toggle " + a + "' id='valen" + val.id + "'><div class='toggle-label toggle-label-off'>OFF</div><div class='toggle-switch' data-id='" + val.id + "' data-status_sistem='" + val.status_sistem + "' onclick='switchonoff(this)'></div><div class='toggle-label toggle-label-on'>ON</div></div></td><td align='center'><button type='button' id='edit-user' data-user=" + val.nama + " class='btn btn-primary edit-user' data-id='" + val.id + "' data-nama= '" + val.nama + "' data-alamat= '" + val.alamat + "' data-no_hp= '" + val.no_hp + "' data-tipe= '" + val.tipe + "' data-no_pelanggan='" + val.no_pelanggan + "' data-no_rumah='" + val.no_rumah + "'><i class='fa fa-pencil' aria-hidden='true'></i></button><button id='hapus-user' data-user=" + val.nama + " class='btn btn-danger hapus-user' data-id= '" + val.id + "'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></tr>"
                            }
                        });
                        $("#tabeluser tbody").append(list);
                        $('#databody-data_user').append(list);
                    },
                    error: function(response) {
                        // console.log(response);
                    }
                });
            }
            // END

            //EDIT USER & UPDATE
            $(document).on('click', '.edit-user', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var alamat = $(this).data('alamat');
                var no_hp = $(this).data('no_hp');
                var tipe = $(this).data('tipe');
                var no_pelanggan = $(this).data('no_pelanggan');
                var no_rumah = $(this).data('no_rumah');
                $('#data_id').val(id);
                $('#data_nama').val(nama);
                $('#data_alamat').val(alamat);
                $('#data_no_hp').val(no_hp);
                $('#data_tipe').val(tipe);
                $('#data_no_pelanggan').val(no_pelanggan);
                $('#data_no_rumah').val(no_rumah);
                $('#editmodal').modal('show');
            });

            function updateData_data_user() {
                // console.log("oke");
                var data = $('#editform').serialize() + '&p=edituser';
                $.ajax({
                    url: 'olah.php',
                    method: 'post',
                    data: data,
                    success: function(response) {
                        // console.log(response);
                        $('#editmodal').modal('hide');
                        // Swal.fire({
                        //     position: 'middle',
                        //     icon: 'success',
                        //     title: 'Data berhasil diedit',
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })
                        // search();
                        window.location.reload();
                    }
                })
            }
            //END

            //SWITCH
            function switchonoff(i) {
                var id = $(i).attr("data-id");
                var stat = $(i).attr("data-status_sistem");
                if ($('#valen' + id).hasClass("active")) {
                    var stat = 'OFF';
                    $('#valen' + id).attr('data-status_sistem', stat);
                    $('#valen' + id).removeClass('active');
                    Swal("Done!", "sistem berhasil dimatikan", "success");
                } else {
                    var stat = 'ON';
                    $('#valen' + id).attr('data-status_sistem', stat);
                    $('#valen' + id).addClass('active');
                    Swal("Done!", "sistem berhasil dinyalakan", "success");
                }
                // // console.log(id);
                // // console.log(stat);

                $.ajax({
                    url: 'olah.php',
                    method: 'post',
                    data: {
                        id: id,
                        status_sistem: stat,
                        p: 'switch',
                    },
                    // success: function(result) { }
                })
            }
            //END

            //HAPUS DATA USER
            $(document).on('click', '.hapus-user', function() {
                console.log($(this).data('id'));
                var id_data = $(this).data('id');
                if (Swal.fire({
                        title: 'Apakah Anda yakin?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'olah.php',
                                method: 'post',
                                data: {

                                    id: id_data,
                                    p: 'hapus',
                                },
                                success: function(response) {
                                    // console.log(response);
                                    Swal.fire({
                                        title: 'Data berhasil dihapus',
                                        type: 'success',
                                    }).then((result) => {
                                        window.location.reload();
                                    })
                                }
                            })
                        }
                    })) {}
            });
            //END
            $(function() {
                var rect = $("svg").find("rect")
                var ellipse = $("svg").find("ellipse");
                $("svg").on('click', () => {
                    rect.toggleClass("checked");
                    if (rect.hasClass("checked")) {
                        // TweenLite.to(ellipse, 0.25, {attr: {"cx": 60.911, "rx":1.108, "ry":8.17}})
                    } else {
                        // TweenLite.to(ellipse, 0.25, {attr: {"cx": 28.911, "rx":9.028, "ry": 9.028}})
                    }
                })
            });
        </script>
        //
        <!-- END -->
</body>

</html>