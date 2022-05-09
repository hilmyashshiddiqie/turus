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

    <style>
        /* masih kosong */
    </style>
</head>

<body>
<?php
?>
    <div class="wrapper ">
        <!-- tambahan kepala_admin -->
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo">
            <a href="http://turusasri.info/" class="simple-text logo-normal">
                Turus Asri
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <!-- mengatur item-item di side bar -->
                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/profile_admin.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">person</i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/dashboard_adminbaru.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard Admin</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/manajemen_user.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">group</i>
                        <p>Manajemen User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/blog_aktivitas.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">notifications</i>
                        <p>Blog Aktivitas</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                                    <a class="nav-link" href="../login/index.php?p=pemakaian_tagihan">
                                        <i class="material-icons">content_paste</i>
                                        <p>Pemakaian dan Tagihan</p>
                                    </a>
                                </li> -->

                <!-- <li class="nav-item">
                                <a class="nav-link" href="../login/logout.php">
                                    <i class="material-icons">logout</i>
                                    <p>Logout</p>
                                </a>
                            </li> -->
            </ul>
        </div>
    </div>
    <?php
    $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
<!-- and kepala_admin -->

<!-- atas_manj_user -->
        <div class="main-panel">
            <?php 
                $username = $_GET['u'];
                $sa = new air();
                $carilevel = mysqli_query($sa->koneksi(), "SELECT level FROM loginn where username='$username'");
                $level = mysqli_fetch_array($carilevel)
            ?>
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper"><a class="navbar-brand" href="javascript:;"></a></div><button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon icon-bar"></span><span class="navbar-toggler-icon icon-bar"></span><span class="navbar-toggler-icon icon-bar"></span></button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <!--<li class="nav-item dropdown">-->
                                <!--    <a class="nav-link" href="javascript:void(0)" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                <!--        <i class="mr-2 material-icons">person</i>-->
                                <!--        <?= $username ?> (<?= $level['level'] ?>)-->
                                <!--        <p class="d-lg-none d-md-block">Account </p>-->
                                <!--    </a>-->
                                <!--    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">-->
                                <!--        <a class="dropdown-item" href="../turus_android/profile_admin.php?u=087715434710">Profile</a>-->
                                <!--         <div class="dropdown-divider"></div>-->
                                <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                                <!--    </div>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>
                </nav>
            
                <div class="content" id="data-data_user">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ml-4">Data Warga</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row my-4">
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-danger" id="add_data-data_user">
                                                <h7 class="text-justify mt-6">Tambah Data</h7>
                                            </button>
                                        </div>
                                        <div class="col-sm-10 d-flex justify-content-right">
                                            <div class="input-group md-5 mt-2 ml-3.auto">
                                                <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->
                                                <input type="text" id="search" name="search" class="form-control" placeholder="Search" onkeyup='searching_data_user()'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" id="tabeluser-data_user" name="tabel">
                                        <table class="table table-responsive-sm table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Rumah</th>
                                                    <th>No HP</th>
                                                    <th>Status Bayar</th>
                                                    <th>Debit</th>
                                                    <th style="text-align:center">Status Sistem</th>
                                                    <th style="text-align:center">ON/OFF</th>
                                                    <th style="text-align:center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="databody-data_user"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 d-flex justify-content-center">
                                    <!-- <nav aria-label="Page navigation example">
                                        <ul class="pagination" id="tombolnavigasi">
                                            <li class="page-item"><a class="page-link" href="../ta/dashboard_adminbaru.php">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="../ta/dashboard_adminbaru.php">Next</a></li>
                                        </ul>
                                    </nav> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" style="display: none;" id="crud-data_user">
                    <div class="container">
                        <div class="card">
                            <div class="card-header ">
                                <div class="col-md-10 d-flex justify-content-center">
                                    <h4 align="center">Masukkan Data Diri Untuk Menambah Pengguna</h4>
                                </div>
                                <div class="card-body">
                                    <form class="mb-2" id="userform" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="no_pelanggan">No Pelanggan:</label>
                                            <input type="text" class="form-control" id="no_pelanggan" name="no_pelanggan" placeholder="Masukkan No Pelanggan Anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat:</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_rumah">No Rumah:</label>
                                            <input type="text" class="form-control" id="no_rumah" name="no_rumah" placeholder="Masukkan No Rumah Anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">No HP:</label>
                                            <input type="email" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP Anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Tipe:</label>
                                            <select name="tipe" id="tipe" class="custom-select">
                                                <option value="RT">RT</option>
                                                <option value="Kos">Kos</option>
                                            </select>
                                        </div>
                                    </form>
                                    <button type="submit" id="save" name="signup" class="btn btn-success center-block" onclick="sendData_data_user()">Save</button>
                                    <a href="index.php?p=data_user" class="btn btn-danger center-block">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editmodalLabel">Edit data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editform">
                                    <input type="hidden" id="data_id" name="id" value="">
                                    <div class="form-group">
                                        <label for="data_no_pelanggan">No Pelanggan</label>
                                        <input type="text" name="no_pelanggan" id="data_no_pelanggan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="data_nama">Nama</label>
                                        <input type="text" name="nama" id="data_nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="data_alamat">Alamat</label>
                                        <input type="text" name="alamat" id="data_alamat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="data_no_rumah">No Rumah</label>
                                        <input type="text" name="no_rumah" id="data_no_rumah" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="data_no_hp">No HP</label>
                                        <input type="number" class="form-control" id="data_no_hp" name="no_hp" placeholder="Masukkan NO HP Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Tipe</label>
                                        <select name="tipe" id="data_tipe" class="custom-select">
                                            <option value="RT">RT</option>
                                            <option value="Kos">Kos</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="updateData_data_user()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            ?>

            <!-- kaki -->
            <?php ?>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright float-right" style="font-weight:bold;">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made by <a href="http://omahiot.com/" target="_blank">Omah IoT</a>
                        </div>
                    </div>
                </footer>
                <?php
            ?>
            <!-- and kaki -->
        </div>
<!-- and atas_manj_user -->

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

        <!-- MANAJEMEN USER -->
        <script>
            $(document).ready(function() {
                getData_data_user();
                search_data_user();
                <?php if (isset($_GET['p']) && $_GET['p'] == 'tag_user') { ?>
                    getmanajemen_air();
                <?php } ?>
            })
            $("#add_data-data_user").click(function() {
                $("#data-data_user").hide();
                $("#crud-data_user").show();
            });
            // tambahan
            // $(function(){
            //      <?php
            //         $button =  new EJ\ToggleButton('check12');
            //         echo $button ->showRoundedCorner(true)->defaultText('Play')->activeText('Pause')->size('mini')->render();
            //         ?>})
           
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
                            data += "<tr><td>" + (hal + (index + 1)) + "</td><td>" + val.nama + "</td><td>" + val.no_rumah + "</td><td>" + val.no_hp + "</td><td>" + val.status_bayar + "</td><td>" + val.debit + "</td><td>" + val.lunas + "</td><td class='btnsht'><label for='check12'>Toggle</label><td align ='center'></td><button type='button' id='edit-user' data-user=" + val.nama + " class='btn btn-primary edit-user' data-id='" + val.id + "' data-nama= '" + val.nama + "' data-alamat= '" + val.alamat +"' data-no_hp= '" + val.no_hp + "' data-tipe= '" + val.tipe + "' data-no_pelanggan='" + val.no_pelanggan + "' data-no_rumah='" + val.no_rumah + "'> <i class='fa fa-pencil' aria-hidden='true'></i></button><button id='hapus-user' data-user=" + val.nama + " class='btn btn-danger hapus-user' data-id= '" + val.id + "'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></tr>"
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

                        $.each(res, function(index, val) {
                            list +="<tr><td>" + (hal + (index + 1)) + "</td><td>" + val.nama + "</td><td>" 
                                + val.no_rumah + "</td><td>" + val.no_hp + "</td><td>" + val.status_bayar + "</td><td>" + val.debit + "</td><td class='btnsht'><span id='check12-wrapper' class='e-tbtn-wrap e-widget'><lebel for='check12'><input type='checkbox' id='check12' class='e-togglebutton e-js e-chkbx-hidden e-tbtb' name='check12'></label><button class='e-togglebutton e-btn e-btn e-select e-ntouch e-btn-mini e-txt e-corner e-active' role='button' tabindex='0' type='button' data-role='none' aria-pressed='true'>Pause</button></span></td><td align='center'><button type='button' id='edit-user' data-user=" + val.nama + " class='btn btn-primary edit-user' data-id='" + val.id + "' data-nama= '" + val.nama + "' data-alamat= '" + val.alamat + " data-no_hp= '" + val.no_hp + "' data-tipe= '" + val.tipe + "' data-no_pelanggan='" + val.no_pelanggan + "' data-no_rumah='" + val.no_rumah + "'>Edit</button><button id='hapus-user' data-user=" + val.nama + " class='btn btn-danger hapus-user' data-id= '" + val.id + "'>Hapus</button></td></tr>"
                        });
                        $("#tabeluser tbody").append(list);

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

            //BUTTON ON
            $("#chkbx").click(function(){
            if($("input:checked")){
                $('body').toggleClass('bk')
            } 
            })
            //END

            //BUTTON OFF
            $(document).on('click', '.btn_off', function() {
                console.log($(this).data('id'));
                var id_data = $(this).data('id');
                if (Swal.fire({
                        title: 'Apakah Anda yakin mematikan sistem?',
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
                                    p: 'off',
                                },
                                success: function(response) {
                                    // console.log(response);
                                    Swal.fire({
                                        title: 'Sistem Berhasil Dimatikan',
                                        type: 'success',
                                    }).then((result) => {
                                        window.location.reload();
                                    })
                                }
                            })
                        }
                    })) {
                }
            });
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
                    })) {
                }
            });
            //END
            $(function(){
                var rect = $("svg").find("rect")
                var ellipse = $("svg").find("ellipse");
                $("svg").on('click', ()=>{
                    rect.toggleClass("checked");
                    if(rect.hasClass("checked")){
                    // TweenLite.to(ellipse, 0.25, {attr: {"cx": 60.911, "rx":1.108, "ry":8.17}})
                    } else {
                    // TweenLite.to(ellipse, 0.25, {attr: {"cx": 28.911, "rx":9.028, "ry": 9.028}})
                    }
                })
            })
            
        </script>
        <!-- END -->
</body>
</html>