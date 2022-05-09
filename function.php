<?php

class air
{
    //koneksi ke database
    function koneksi()
    {
        $conn = mysqli_connect("localhost", "root", "", "turus");
        return $conn;
    }
}

function kaki()
{ ?>
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
<?php }

function atas_profile()
{
    $username = $_GET['u'];
    $sa = new air();
    $carilevel = mysqli_query($sa->koneksi(), "SELECT level FROM loginn where username='$username'");
    $level = mysqli_fetch_array($carilevel);
    $carinama = mysqli_query($sa->koneksi(), "SELECT nama FROM loginn where username='$username'");
    $nama = mysqli_fetch_array($carinama);

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
                    <!--        <a class="dropdown-item" href="../turus_android/profile.php?u=0895367011297">Profile</a>-->
                    <!--        <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="content">
            <div class="container-fluid  d-flex justify-content-center">
                <div class="col-lg-4 col-md-10">
                    <div class="card card-profile">
                        <div class="card-avatar"><a href="javascript:;"><img class="img" src="../assets/img/faces/use.png" /></a></div>
                        <div class="card-body d-flex justify-content-center">
                            <table>
                                <tr>
                                    <td style="font-weight:bold;">Nama :</td>
                                    <td>
                                        <?= $nama[0] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Alamat :</td>
                                    <td>
                                        Tidak Ada
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Level :</td>
                                    <td>
                                        <?= $level[0] ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }

//--------------------------------------------------Admin------------------------------------------------------//
function kepala_admin()
{ ?>
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
<?php }

function atas_admin()
{
    $username = $_GET['u'];
    $sa = new air();
    $carilevel = mysqli_query($sa->koneksi(), "SELECT level FROM loginn where username='$username'");
    $level = mysqli_fetch_array($carilevel);
    $getcoredate = mysqli_query($sa->koneksi(), "SELECT DATE(tanggal) as tgl FROM `core` ORDER BY id DESC LIMIT 1");
    $resgetcoredate = mysqli_fetch_row($getcoredate);
    $showgetcoredate = $resgetcoredate[0];
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
    <!-- mengatur tampilan gauss dan grafik di dashboard admin -->
    <div class="content">
        <div class="content">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary" style="z-index:11;">
                            <h4>Volume Air</h4>
                        </div>
                        <div class="card-body c2coba">
                            <div class="tab-content">
                                <div class="chart d-flex justify-content-center p-0 gvolum align-content-center">
                                    <div class="chart-wrapper" style="margin-top:40px;">
                                        <!-- <div class="GaugeMeter" id="GaugeMeterVolum" data-percent="" data-total="" data-theme="DarkBlue-LightBlue" data-animate_text_colors="true" data-animate_gauge_colors="true" data-min="0" data-label="Meter Kubik" data-text-size="0.15" data-style="Arch" data-width="18" data-back="#dcdcdc" data-color="#ffd700" data-size="380" data-append=" m3" data-showvalue=true>
                                        </div> -->
                                        <!-- <div id="fluid-meter" class="mx-auto"></div> -->
                                        <div class="chart d-flex justify-content-center p-0 gvolum align-content-center">
                                            <svg id="fillgauge6" width="90%" height="250"></svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="divchartvolum" style="display: none;">
                                    <div class="chart">
                                        <div id="grafik_volume_air"></div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button id="closechartvolum" name="closechartvolum" class="btn btn-success btn-sm">Close</button>
                                    </div>
                                </div>
                                <div id="divformvolum" style="display: none;">
                                    <form id="formvolum" class="form">
                                        <input type="hidden" name="param" value="VolTan">
                                        <input type="date" name="tgl1" id="tgl1" class="form-control">
                                        <input type="date" name="tgl2" id="tgl2" class="form-control">
                                        <div class="form-group text-center">
                                            <button id="sformvolum" name="bformvolum" class="btn btn-success btn-sm" data-identifier="volum">Send</button>
                                            <button id="cformvolum" name="cformvolum" class="btn btn-danger btn-sm">Close</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-center" style="margin-top:53px;">
                                    <i class="fa-solid fa-chart-column fa-2x pr-2 bvolume" data-date="<?= $showgetcoredate ?>" data-tipe="VolTan" style="z-index:2;"></i>
                                    <i class="fa-solid fa-calendar-days fa-2x pr-2 bvolume2" style="z-index:2;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-danger" style="z-index:11;">
                            <h4>Kekeruhan Air</h4>
                        </div>
                        <div class="card-body c1coba">
                            <div class="tab-content">
                                <div class="chart d-flex justify-content-center p-0">
                                    <div class="chart-wrapper p-0">
                                        <div class="GaugeMeter" id="GaugeMeterKekeruhan" data-percent="" data-total="" data-theme="LightRed-DarkRed" data-animate_text_colors="true" data-animate_gauge_colors="true" data-min="0" data-label="Nephelometric Turbidity Unit" data-text-size="0.15" data-style="Arch" data-width="18" data-back="#dcdcdc" data-color="#ffd700" data-size="380" data-append=" m3" data-showvalue=true style="width:100px">
                                        </div>
                                    </div>
                                </div>
                                <div id="divchartkekeruhan" style="display: none;">
                                    <div class="chart">
                                        <div id="grafik_kekeruhan_air"></div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button id="closechartkekeruhan" name="closechartkekeruhan" class="btn btn-success btn-sm">Close</button>
                                    </div>
                                </div>
                                <div id="divformkekeruhan" style="display: none;">
                                    <form id="formkekeruhan" class="form">
                                        <input type="hidden" name="param" value="Tur">
                                        <input type="date" name="tgl1" id="tgl1" class="form-control">
                                        <input type="date" name="tgl2" id="tgl2" class="form-control">
                                        <div class="form-group text-center">
                                            <button id="sformkekeruhan" name="bformkekeruhan" class="btn btn-success btn-sm" data-identifier="kekeruhan">Send</button>
                                            <button id="cformkekeruhan" name="cformkekeruhan" class="btn btn-danger btn-sm">Close</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-center" style="margin-top:-45px;">
                                    <i class="fa-solid fa-chart-column fa-2x pr-2 gkeruh" data-date="<?= $showgetcoredate ?>" data-tipe="Tur" style="z-index:2;"></i>
                                    <i class="fa-solid fa-calendar-days fa-2x pr-2 gkeruh2" style="z-index:2;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <h4>Grafik Pemakaian</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="chart">
                                    <div id="grafik_admin_air"></div>
                                </div>
                                <div id="divformpemakaian" style="display: none;">
                                    <form id="formpemakaian" class="form">
                                        <input type="hidden" name="param" id="parampemakaian" value="pemakaian">
                                        <input type="date" name="tgl1" id="tgl1" class="form-control">
                                        <input type="date" name="tgl2" id="tgl2" class="form-control">
                                        <div class="form-group text-center">
                                            <button id="sformpemakaian" name="sformpemakaian" class="btn btn-success btn-sm" data-identifier="pemakaian">Send</button>
                                            <button id="cformpemakaian" name="cformpemakaian" class="btn btn-danger btn-sm">Close</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- <center><input type="text" name="dateranges" value="01/01/2021 - 01/15/2021" /></center> -->
            <!-- <div class="d-flex justify-content-center">
                                    <i class="fa-solid fa-calendar-days fa-2x pr-2 pkeruh"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <h4>Grafik Pemakaian</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="divchartpemakaianair">
                                    <div id="grafik_admin_air"></div>
                                    <div class="form-group text-center closeadminair" style="display: none;">
                                        <button id="closechartpemakaianair" name="closechartpemakaianair" class="btn btn-success btn-sm">Close</button>
                                    </div>
                                </div>
                                <!-- <div id="divchartpemakaianair" style="display: none;">
                                    <div class="chartpemakaian">
                                        <div id="grafik_admin_air"></div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button id="closechartpemakaianair" name="closechartpemakaianair" class="btn btn-success btn-sm">Close</button>
                                    </div>
                                </div> -->
                                <div id="divformpemakaian" style="display: none;">
                                    <form id="formpemakaian" class="form">
                                        <input type="hidden" name="param" id="parampemakaian" value="pemakaian">
                                        <input type="date" name="tgl1" id="tgl1" class="form-control">
                                        <input type="date" name="tgl2" id="tgl2" class="form-control">
                                        <div class="form-group text-center">
                                            <button id="sformpemakaian" name="sformpemakaian" class="btn btn-success btn-sm" data-identifier="pemakaian">Send</button>
                                            <button id="cformpemakaian" name="cformpemakaian" class="btn btn-danger btn-sm">Close</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- <center><input type="text" name="dateranges" value="01/01/2021 - 01/15/2021" /></center> -->
                                <div class="d-flex justify-content-center">
                                    <i class="fa-solid fa-calendar-days fa-2x pr-2 pkeruh"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

function atas_manj_user()
{
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
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Nama</th>
                                        <th style="text-align:center">No Rumah</th>
                                        <th style="text-align:center">No HP</th>
                                        <th style="text-align:center">Status Bayar</th>
                                        <th style="text-align:center">Debit</th>
                                        <th width="145px" style="text-align:center">ON/OFF</th>
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
                        <a href="manajemen_user.php?u=087715434710" class="btn btn-danger center-block">Close</a>
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
<?php }

function atas_blog()
{
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
    <!-- Tag User -->
    <div class="content">
        <div class="content" id="tag">
            <div class="card card-nav-tabs">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="row d-flex align-items-center">
                        <div class="col-8">
                            <h3 class="card-title ml-4.auto">Blog Aktivitas</h3>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#mdlAddAktivitas" class="btn btn-success"><i class="fas fa-plus mr-2"></i> Tambah</a>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#mdlAddAktivitas" class="btn btn-success"><i class="fas fa-plus mr-2"></i> Tambah</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="row mt-4">
                        <div class="input-group mt-3 md-5 d-flex justify-content-center">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" id="search_tag_user" name="search" class="form-control" placeholder="Search" onkeyup='searching_tag_user()'>
                        </div>
                    </div> -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">Judul</th>
                                    <th width="500px" style="text-align:center">Isi</th>
                                    <th width="250px" style="text-align:center">Gambar</th>
                                    <th colspan="2" style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="getData_aktivitas"></tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-3 d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="tombolnavigasi-belum">
                                <li class="page-item"><a class="page-link" href="../turus_android/dashboard_adminbaru.php">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="../turus_android/dashboard_adminbaru.php">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="modal fade" id="mdlAddAktivitas" tabindex="-1" aria-labelledby="detailTagihanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailTagihanModalLabel">
                                    Detail Aktivitas
                                    <span id="idStatusLunas"></span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id='formAddAktivitas'>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="sunting_judul_aktivitas" name='aJudulAktv'>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Tulis Sesuatu :</label>
                                        <textarea class="form-control" rows="5" id="aIsiAktv" name='aIsiAktv'></textarea>
                                    </div>
                                    <label for="exampleFormControlFile1">Upload Foto</label>
                                    <input type="file" class="form-control-file" name='file_aktivitas' id="file_aktivitas" required>
                                </div>
                                <div class="modal-footer">
                                    <div class="mt-3 form-group pull-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <div class="mt-3 form-group pull-right.auto">
                                        <button class="btn btn-success" type='submit'>Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="mdlDetailAktivitas" tabindex="-1" aria-labelledby="detailTagihanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailTagihanModalLabel">
                                    Detail Aktivitas
                                    <span id="idStatusLunas"></span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id='formUbahAktivitas'>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="idNya" name='idNya'>
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="editJudulAktivitas" name='edit_judul_aktivitas'>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Tulis Sesuatu :</label>
                                        <textarea class="form-control" rows="5" id="editIsiAktivitas" name='edit_isi_aktivitas'></textarea>
                                    </div>
                                    <!-- <label for="exampleFormControlFile1">Upload Bukti Pembayaran</label>
                                    <input type="file" class="form-control-file" name='file_bukti_bayar' id="file_bukti_bayar" required> -->
                                </div>
                                <div class="modal-footer">
                                    <div class="mt-3 form-group pull-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <div class="mt-3 form-group pull-right">
                                        <button class="btn btn-primary" type='submit'>Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ubahAktivitasGambar" tabindex="-1" aria-labelledby="detailTagihanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailTagihanModalLabel">
                                    Ubah Gambar
                                    <span id="idStatusLunas"></span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formUbahGambarAktivitas">
                                <div class="modal-body">
                                    <div class="text-center mb-5">
                                        <img src="" id="gambarAktivitas" width="360px" alt="">
                                    </div>
                                    <input type="hidden" class="form-control" id="idNya" name='idNya'>
                                    <label for="exampleFormControlFile1">Upload Foto Ubah</label>
                                    <input type="file" class="form-control-file" name='file_Ubahaktivitas' id="file_Ubahaktivitas" required>
                                </div>
                                <div class="modal-footer">
                                    <div class="mt-3 form-group pull-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <div class="mt-3 form-group pull-right">
                                        <button class="btn btn-primary" type='submit'>Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

//------------------------------------Warga------------------------------------//
function kepala_warga()
{ ?>
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo">
            <a href="http://turusasri.info/" class="simple-text logo-normal">
                Turus Asri
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/profile_warga.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">person</i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/dashboard_wargabaru.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard Warga</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/tagihan.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">payments</i>
                        <p>Tagihan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/konfirmasi_bayar.php?u=<?= $_GET['u']; ?>">
                        <i class="material-icons">receipt long</i>
                        <p>Konfirmasi Bayar</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="../login/logout.php">
                            <i class="material-icons">logout</i>
                            <p>Logout</p>
                        </a>
                    </li> -->
            </ul>
        </div>
    </div>
<?php }

function atas_warga()
{
    $username = $_GET['u'];
    $sa = new air();
    $carilevel = mysqli_query($sa->koneksi(), "SELECT level FROM loginn where username='$username'");
    $level = mysqli_fetch_array($carilevel);
    $getcoredate = mysqli_query($sa->koneksi(), "SELECT DATE(tanggal) as tgl FROM `node` ORDER BY id DESC LIMIT 1");
    $resgetcoredate = mysqli_fetch_row($getcoredate);
    $showgetcoredate = $resgetcoredate[0];
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
                    <!--        <a class="dropdown-item" href="../turus_android/profile_warga.php">Profile</a>-->
                    <!--        <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="content">
        <div class="content"> -->
    <!-- <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <h4>Pemakaian Air</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="chart d-flex justify-content-center">
                                    <div class="chart-wrapper">
                                        <div class="GaugeMeter" id="GaugeMeterAir" data-label="Meter Kubik" data-min=0 data-total=10000 data-text=null data-text_size=0.15 data-append=" m3" data-size="380" data-width="15" data-style="Arch" data-color=null data-back=null data-theme=Green-Gold-Red data-animate_gauge_colors=false data-animate_text_colors=1 data-label=null data-showvalue=true style="width:100px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

    <div class="content">
        <div class="content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary" style="z-index:11;">
                            <h4>Pemakaian Air</h4>
                        </div>
                        <div class="card-body cobaair1">
                            <div class="tab-content">
                                <div class="chart d-flex justify-content-center p-0 gvolum align-content-centerr">
                                    <div class="chart-wrapper">
                                        <div class="GaugeMeter" id="GaugeMeterAir" data-percent="" data-total="" data-theme="DarkBlue-LightBlue" data-animate_text_colors="true" data-animate_gauge_colors="true" data-min="0" data-label="Meter Kubik" data-text-size="0.15" data-style="Arch" data-width="18" data-back="#dcdcdc" data-color="#ffd700" data-size="380" data-append=" m3" data-showvalue=true>
                                        </div>
                                    </div>
                                </div>
                                <div id="divchartpemakaianwarga" style="display: none;">
                                    <div class="chart">
                                        <div id="grafik_pemakaian_air"></div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button id="closechartpemakaian" name="closechartpemakaian" class="btn btn-success btn-sm">Close</button>
                                    </div>
                                </div>
                                <div id="divformpemakaianwarga" style="display: none;">
                                    <form id="formpemakaianwarga" class="form">
                                        <input type="hidden" name="param" value="VolPem">
                                        <input type="date" name="tgl1" id="tgl1" class="form-control">
                                        <input type="date" name="tgl2" id="tgl2" class="form-control">
                                        <div class="form-group text-center">
                                            <button id="sformpemakaianwarga" name="sformpemakaianwarga" class="btn btn-success btn-sm" data-identifier="pemakaian">Send</button>
                                            <button id="cformpemakaianwarga" name="cformpemakaianwarga" class="btn btn-danger btn-sm">Close</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-center" style="margin-top:-45px;">
                                    <i class="fa-solid fa-chart-column fa-2x pr-2 bvolumewarga" data-date="<?= $showgetcoredate ?>" data-tipe="VolPem" style="z-index:2;"></i>
                                    <i class="fa-solid fa-calendar-days fa-2x pr-2 bvolumewarga2" style="z-index:2;"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <h4>Grafik Pemakaian</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="chart">
                                    <div id="grafik_admin_air"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
<?php }

function atas_tagihan()
{
    $username = $_GET['u'];
    $sa = new air();
    $conn = $sa->koneksi();
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
                    <!--        <a class="dropdown-item" href="../turus_android/profile_warga.php">Profile</a>-->
                    <!--         <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="content" id="tag">
            <div class="card card-nav-tabs mb-5">
                <div class="card-header card-header-tabs card-header-primary">
                    <h3 class="card-title ml-4">Tagihan Terakhir</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $tahun = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $q = mysqli_query($conn, "SELECT d.id, u.username as u_username, d.alamat, u.nama as u_nama, u.level, u.password, d.nama as d_nama, dt.stand_akhir as dt_stand_akhir, dt.pemakaian as dt_pemakaian
                        FROM loginn as u LEFT JOIN data_warga as d ON u.id_warga = d.id
                        LEFT JOIN data_tagihan as dt ON u.id_warga = dt.id_warga
                        WHERE u.username = '$username'
                    ");

                        // echo"SELECT username FROM loginn WHERE username=\"$username\" AND password=\"$password\"";
                        $j = mysqli_num_rows($q);
                        $data = mysqli_fetch_assoc($q);
                        $idW = $data['id'];
                        $q_year = mysqli_query($conn, "SELECT DISTINCT YEAR(tanggal) as tanggal FROM data_stand WHERE id_warga = '$idW'");
                        $q_lastTagihan = mysqli_query($conn, "SELECT data_tagihan.id as id_tagihan, data_warga.no_hp, data_warga.id, data_stand.tanggal,data_tagihan.pemakaian, data_stand.stand_awal, data_stand.stand_akhir, data_tagihan.tagihan, data_tagihan.lunas FROM data_warga INNER JOIN data_tagihan ON data_warga.id = data_tagihan.id_warga INNER JOIN data_stand ON data_tagihan.id_stand = data_stand.id WHERE data_warga.id = '$idW'
                        ORDER BY data_stand.tanggal DESC");
                        $last_tagihan = mysqli_fetch_assoc($q_lastTagihan);

                        $arrayDate = explode('-', $last_tagihan['tanggal']);
                        $dateString = $arrayDate[2] . ' ' . $tahun[number_format($arrayDate[1] - 1)] . ' ' . $arrayDate[0];

                        $is_lunas = strtoupper($last_tagihan['lunas']) == 'SUDAH' ? true : false;
                        $no_hpwarga = $last_tagihan["no_hp"];

                        $lunas = [
                            'text' => $last_tagihan['lunas'] == 'Sudah' ? 'Lunas' : 'Belum Lunas',
                            'badge' => $last_tagihan['lunas'] == 'Sudah' ? 'success' : 'danger'
                        ];
                        ?>
                        <div class="col">
                            <table class="table table-striped">
                                <tbody>
                                    <tr id="tabel1">
                                        <td style="width:50%">
                                            Tanggal Input
                                        </td>
                                        <td>
                                            : <?php echo $dateString ?>
                                        </td>
                                        <td>
                                            <span id="detailLastTanggalInput"></span>
                                        </td>
                                    </tr>
                                    <tr id="tabel2">
                                        <td style="width:50%">
                                            Bulan Pemakaian
                                        </td>
                                        <td>
                                            : <?php echo $tahun[number_format($arrayDate[1] - 1)] ?>
                                        </td>
                                        <td>
                                            <span id="detailLastBulanPemakaian"></span>
                                        </td>
                                    </tr>
                                    <tr id="tabel3">
                                        <td style="width:30%">
                                            Stand Awal (m<sup>3</sup>)
                                        </td>
                                        <td>
                                            : <?php echo $last_tagihan['stand_awal'] ?>
                                        </td>
                                        <td>
                                            <span id="detailLastTagihanStandAwal"></span>
                                        </td>
                                    </tr>
                                    <tr id="tabel4">
                                        <td style="width:30%">
                                            Stand Akhir (m<sup>3</sup>)
                                        </td>
                                        <td>
                                            : <?php echo $last_tagihan['stand_akhir'] ?>
                                        </td>
                                        <td>
                                            <span id="detailLastTagihanStandAkhir"></span>
                                        </td>
                                    </tr>
                                    <tr id="tabel5">
                                        <td style="width:30% ">
                                            Jumlah Pemakaian
                                        </td>
                                        <td>
                                            : <?php echo $last_tagihan['pemakaian'] ?>
                                        </td>
                                        <td>
                                            <span id="detailLastPemakaian"></span>
                                        </td>
                                    </tr>
                                    <tr id="tabel6">
                                        <td style="width:30%">
                                            Status
                                        </td>
                                        <td>
                                            : <span class="badge badge-<?php echo $lunas['badge'] ?>"><?php echo $lunas['text'] ?></span>
                                        </td>
                                        <td>
                                            <span id="detailLastTotalTagihan"></span>
                                        </td>
                                    </tr>
                                    <tr id="tabel7" style="color:#ff0000; font-size:5">
                                        <td style="width:30%">
                                            <font size="4"><b>Total Tagihan<b>
                                        </td>
                                        <td>
                                            <font size="4"><b> : Rp. <?php echo number_format($last_tagihan['tagihan'], 2, ',', '.') ?><b>
                                        </td>
                                        <td>
                                            <span id="detailLastTotalTagihan"></span>
                                        </td>
                                    </tr>
                                    <?php
                                    if (!$is_lunas) {
                                    ?>
                                        <tr>
                                            <td>

                                                <button type="button" id="formbayar" name="formbayar" class="btn btn-danger btn-sm" data-identifier="bayar">
                                                    Bayar
                                                </button>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td id="qr" style="display: none; zoom: 0.25;">
                                            <div id="qrcode">
                                                <iframe id="iframe_qr" data-src="qris.php?id_tagihan=<?php echo $last_tagihan['id_tagihan']; ?>" width="2000" height="1500" frameborder="0"></iframe>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    if (!$is_lunas) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div id="ctagihan" style="display: none;">
                                                    <button id="cformtagihan" name="cformtagihan" class="btn btn-danger btn-sm">Close</button>
                                                </div>
                                                <div id="cbayar">
                                                    <a href="invoice.php?id_tagihan=<?php echo $last_tagihan['id_tagihan']; ?>&no_hp=<?php echo $no_hpwarga; ?>"><button id="cekbayar" name="cekbayar" class="btn btn-danger btn-sm">Cek Bayar</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div id="qrcode"></div> -->
                        <!-- <div class="col-6 mt-5">
                        <!-- <p class="h4 mb-4"><span class="text-muted">
                                <span class="text-dark">Tanggal</span>
                                <span class="text-dark font-weight-bold float-right"><?php echo $dateString ?></span>
                        </p> -->
                        <!-- <p class="h4"><span class="text-muted">
                            <span class="text-dark">Status</span>
                            <span class="text-dark font-weight-bold font- float-right">
                                <span class="badge badge-<?php echo $lunas['badge'] ?>"><?php echo $lunas['text'] ?></span>
                            </span> -->
                        <!-- </p>
                    <hr>
                    <p class="h3"><span class="text-muted">
                            <font size="4" color="#ff0000"><b>Total Tagihan<b>
                        </span><span class="float-right">Rp <span id="detailLastTotalTagihan"><?php echo number_format($_SESSION['last_tagihan']['tagihan'], 2, ',', '.') ?></span></span></font>
                    </p> -->
                        <!-- </div>  -->
                    </div>
                </div>
            </div>
            <div class="card card-nav-tabs mt-5">
                <div class="card-header card-header-tabs card-header-primary">
                    <h3 class="card-title ml-4">Pemakaian dan Tagihan</h3>
                </div>
                <div class="card-body">
                    <div class="row mt-4">

                        <div class="input-group mt-3 mb-5 md-5 d-flex justify-content-center">
                            <div class="form-group">
                                <label for="pilih_tagihan"><b>Tahun Aktif<b></label>
                                <select name="year" id="year_select" class="custom-select" onchange="year_select(this);">
                                    <option value="" disabled selected>Pilih Tahun</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($q_year)) {
                                        $year[] = $row;
                                    }
                                    for ($i = 0; $i < count($year); $i++) {
                                    ?>
                                        <option value="<?php echo $year[$i]['tanggal'] ?>|<?= $idW ?>"><?php echo $year[$i]['tanggal'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Bulan</th>
                                <th>Status</th>
                                <th colspan="2" style="text-align:center">Aksi</th>
                            </tr>
                            <tbody id="pemakaian_tagihan_byuser"></tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-3 d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="tombolnavigasitag">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="modal fade" id="detailTagihanModal" tabindex="-1" aria-labelledby="detailTagihanModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailTagihanModalLabel">
                                        Detail Tagihan
                                        <span id="idStatusLunas"></span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td style="width:50%">
                                                    Tanggal Input
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <span id="detailTanggalInput"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">
                                                    Bulan Pemakaian
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <span id="detailBulanPemakaian"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">
                                                    Stand Awal (m<sup>3</sup>)

                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <span id="detailTagihanStandAwal"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">
                                                    Stand Akhir (m<sup>3</sup>)

                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <span id="detailTagihanStandAkhir"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">
                                                    Jumlah Pemakaian
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <span id="detailPemakaian"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <p class="h3"><span class="text-muted">
                                            <font size="5" color="#ff0000"><b>Total Tagihan<b>
                                        </span><span class="float-right">Rp <span id="detailTotalTagihan"></span></span></font>
                                    </p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

function atas_konfirmasi()
{
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
                    <!--        <a class="dropdown-item" href="../turus_android/profile_warga.php">Profile</a>-->
                    <!--         <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <h3 class="card-title ml-4">Konfirmasi Bayar</h3>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <?php
                        $sa = new air();
                        $conn = $sa->koneksi();
                        $q = mysqli_query($conn, "SELECT d.id, u.username as u_username, d.alamat, u.nama as u_nama, u.level, u.password, d.nama as d_nama,
                        dt.stand_akhir as dt_stand_akhir, dt.pemakaian as dt_pemakaian
                        FROM loginn as u LEFT JOIN data_warga as d ON u.id_warga = d.id
                        LEFT JOIN data_tagihan as dt ON u.id_warga = dt.id_warga
                        WHERE u.username = '$username'
                        ");
                        // echo"SELECT username FROM loginn WHERE username=\"$username\" AND password=\"$password\"";
                        $j = mysqli_num_rows($q);
                        $data = mysqli_fetch_assoc($q);
                        $idWW = $data['id'];
                        $sql = "SELECT s.tanggal, t.id
                                        FROM data_warga as w    
                                        LEFT JOIN data_stand as s ON w.id = s.id_warga
                                        LEFT JOIN data_tagihan as t ON s.id = t.id_stand
                                        WHERE w.id = $idWW AND t.konfirmasi_status = 0 OR t.konfirmasi_status = 5";
                        $query = mysqli_query($conn, $sql);
                        $data = [];
                        while ($row = mysqli_fetch_assoc($query)) {
                            $data[] = $row;
                        }
                        if (count($data) > 0) {
                        ?>
                            <form id="form_konfirmasi_bayar_post">
                                <div class="form-group">
                                    <label for="pilih_tagihan">Pilih Tanggal Tagihan :</label>
                                    <select name="tgl_konfirmasi_bayar" id="id_konfirmasiBayarWarga" required class="custom-select">
                                        <option value="" disabled selected>-- Pilih Tanggal --</option>
                                        <?php
                                        for ($i = 0; $i < count($data); $i++) {
                                        ?>
                                            <option value="<?php echo $data[$i]['tanggal'] . '_' . $data[$i]['id'] ?>"><?php echo $data[$i]['tanggal'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name='u' value='<?= $username ?>'>
                                <label for="exampleFormControlFile1">Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control-file" name='file_bukti_bayar' id="file_bukti_bayar" required>
                                <div class="mt-3 form-group pull-right">
                                    <button class="btn btn-success" id="simpann" type='submit'>Upload</button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <h2 class="text-center text-success font-weight-bold mt-5"> Tidak ada tagihan tersedia. </h2>
                            <h5 class="text-center text-dark mb-5">
                                Tagihan anda sudah Lunas semua atau sedang ada tagihan yang dalam proses konfirmasi
                            </h5>
                            <div class="text-center">
                                <small class="text-secondary"><em>Nb: Silahkan cek proses konfirmasi tagihan pada menu Tagihan</em></small>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php }
function atas_profile_warga()
{
    $username = $_GET['u'];
    $sa = new air();

    $carilevel = mysqli_query($sa->koneksi(), "SELECT level FROM loginn where username='$username'");
    $level = mysqli_fetch_array($carilevel);
    $carinama = mysqli_query($sa->koneksi(), "SELECT nama FROM loginn where username='$username'");
    $nama = mysqli_fetch_array($carinama);
    $carialamat = mysqli_query($sa->koneksi(), "SELECT alamat FROM data_warga where no_hp='$username'");
    $alamat = mysqli_fetch_array($carialamat);
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
                    <!--        <a class="dropdown-item" href="../turus_android/profile_warga.php">Profile</a>-->
                    <!--         <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="content">
            <div class="container-fluid  d-flex justify-content-center">
                <div class="col-lg-4 col-md-10">
                    <div class="card card-profile">
                        <div class="card-avatar"><a href="javascript:;"><img class="img" src="../assets/img/faces/use.png" /></a></div>
                        <div class="card-body d-flex justify-content-center">
                            <table>
                                <tr>
                                    <td style="font-weight:bold;">Nama :</td>
                                    <td>
                                        <?= $nama[0] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Alamat :</td>
                                    <td>
                                        <?= $alamat[0] ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td class="h6 font-weight-bold text-primary">Tipe</td>
                                    <td class="h6 font-weight-bold text-primary">: <?php echo $_SESSION['data']['tipe'] ?></td>
                                </tr> -->
                                <tr>
                                    <td style="font-weight:bold;">Level :</td>
                                    <td>
                                        <?= $level[0] ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

//------------------------------------Petugas------------------------------------//
function kepala_petugas()
{ ?>
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo">
            <a href="http://turusasri.info/" class="simple-text logo-normal">
                Turus Asri
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/profile_petugas.php?u=0895367011297">
                        <i class="material-icons">person</i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/dashboard_petugas.php?u=0895367011297">
                        <i class="material-icons">content_paste</i>
                        <p>Cek Meter</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="../login/logout.php">
                        <i class="material-icons">logout</i>
                        <p>Logout</p>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
<?php }

function atas_petugas()
{
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
                    <!--        <a class="dropdown-item" href="../turus_android/profile_petugas.php?u=0895367011297">Profile</a>-->
                    <!--         <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="content">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h2 class="card-title">Form Stand Air Warga</h2>
                    <h7 class>Isikan form di bawah ini</h7>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div>
                                    <!-- <form class="form-inline" > -->
                                    <div class="form-group">
                                        <label><b>Tanggal</b></label>
                                    </div>
                                    <div class="form-group" style="margin-top:-1.5em">
                                        <input type="date" class="form-control" name="tanggal" id="tanggal_controlling" value="2022-04-12" required>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Alamat</b></label>
                                        <select name="pilihalamat" id="pilihalamat" class="custom-select" placeholder='Alamat' onchange="changeNama_petugas()">
                                            <option selected>-- PILIH ALAMAT --</option>
                                            <option value="Turus Asri">Turus Asri</option>
                                            <!-- <option value="Turus Asri I">Turus Asri I</option> -->
                                            <option value="Turus Asri II">Turus Asri II</option>
                                            <option value="Turus Asri III">Turus Asri III</option>
                                            <option value="Turus Asri IV">Turus Asri IV</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <form id="data_stand_formpetugas">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="myTable">
                                                    <tr class="table-info" style="text-align:center">
                                                        <td><b>No</b></td>
                                                        <td><b>Nama</b></td>
                                                        <td><b>Alamat</b></td>
                                                        <td><b>No rumah</b></td>
                                                        <td><b>Stand awal (m<sup>3</sup>)</b></td>
                                                        <td><b>Stand akhir (m<sup>3</sup>)</b></td>
                                                        <td><b>Foto Bukti</b></td>
                                                    </tr>
                                                    <tbody id="petugasbody">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                        <div class="mt-3 form-group">
                                            <button class="btn btn-success simpanbtn" type='button'>Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

//------------------------------------Bendahara------------------------------------//

function kepala_bendahara()
{ ?>
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo">
            <a href="http://turusasri.info/" class="simple-text logo-normal">
                Turus Asri
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/profile_ben.php?u=08157785211">
                        <i class="material-icons">person</i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/dashboard_bendahara.php?u=08157785211">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard Bendahara</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/manajemen_air.php?u=08157785211">
                        <i class="material-icons">content_paste</i>
                        <p>Manajemen Pembayaran </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../turus_android/konfirmasi_pembayaran.php?u=08157785211">
                        <i class="material-icons">content_paste</i>
                        <p>Konfirmasi Pembayaran </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="../login/logout.php">
                        <i class="material-icons">logout</i>
                        <p>Logout</p>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
<?php }

function atas_bendahara()
{
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
                    <!--        <a class="dropdown-item" href="../turus_android/profile_ben.php?u=08157785211">Profile</a>-->
                    <!--         <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="row">
            <!-- <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <h4>Pemakaian Air</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="chart d-flex justify-content-center">
                                <div class="chart-wrapper">
                                    <div class="GaugeMeter" id="GaugeMeterAir" data-label="Meter Kubik" data-min=0 data-total=10000 data-text=null data-text_size=0.15 data-append=" m3" data-size="380" data-width="15" data-style="Arch" data-color=null data-back=null data-theme=Green-Gold-Red data-animate_gauge_colors=false data-animate_text_colors=1 data-label=null data-showvalue=true>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <h4>Grafik Pemakaian</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="chart">
                                <div id="grafik_admin_air"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-danger">
                        <h4>Pemasukan</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="chart d-flex justify-content-center">
                                <div class="chart-wrapper">
                                    <div class="GaugeMeter" id="GaugeMeterRupiah" data-label="Rupiah" data-min=0 data-total=100000000 data-text=null data-text_size=0.1 data-append=",00" data-size="380" data-width="15" data-style="Arch" data-theme=Green-Gold-Red data-animate_gauge_colors="1" data-animate_text_colors="1" data-showvalue=true>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-danger">
                        <h4>Grafik Pemasukan</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="divchartpemasukan">
                                <div id="grafik_admin_pemasukan"></div>
                                <div class="form-group text-center closepemasukan" style="display: none;">
                                    <button id="closechartpemasukan" name="closechartpemasukan" class="btn btn-success btn-sm">Close</button>
                                </div>
                            </div>
                            <div id="divformpemasukan" style="display: none;">
                                <form id="formpemasukan" class="form">
                                    <input type="hidden" name="param" id="parampemasukan" value="pemasukan">
                                    <input type="date" name="tgl1" id="tgl1" class="form-control">
                                    <input type="date" name="tgl2" id="tgl2" class="form-control">
                                    <div class="form-group text-center">
                                        <button id="sformpemasukan" name="sformpemasukan" class="btn btn-success btn-sm" data-identifier="pemasukan">Send</button>
                                        <button id="cformpemasukan" name="cformpemasukan" class="btn btn-danger btn-sm">Close</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <center><input type="text" name="dateranges" value="01/01/2021 - 01/15/2021" /></center> -->
                            <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-calendar-days fa-2x pr-2 ppemasukan"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content" id="data-data_user_blm_byr">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ml-4">Data Warga Belum Bayar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-sm-10 d-flex justify-content-right">
                                <div class="input-group md-5 mt-2 ml-3.auto">
                                    <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->
                                    <input type="text" id="search2" name="search2" class="form-control" placeholder="Search" onkeyup='searching_data_user()'>
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
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody id="databody-data_user_blm_byr"></tbody>
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

    <?php }

function atas_pembayaran()
{
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
                        <!--        <a class="dropdown-item" href="../turus_android/profile_ben.php?u=08157785211">Profile</a>-->
                        <!--         <div class="dropdown-divider"></div>-->
                        <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                        <!--    </div>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="content">
                <div class="card card-nav-tabs mt-5">
                    <div class="card-header card-header-tabs card-header-primary">
                        <h3 class="card-title ml-4">Konfirmasi Bukti Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Warga</th>
                                    <th>No Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th colspan="2" style="text-align:center">Aksi</th>
                                </tr>
                                <tbody id="bendahara_bayar"></tbody>
                                <div id="kosongBuktiBayar"></div>
                            </table>
                            <!-- detailBendBuktiBayar -->
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination" id="tombolnavigasitag">
                                    <li class="page-item"><a class="page-link" href="../turus_android/dashboard_bendahara.php?u=08157785211">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="../turus_android/dashboard_bendahara.php?u=08157785211">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="modal fade" id="detailBendBuktiBayar" tabindex="-1" aria-labelledby="detailTagihanModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailTagihanModalLabel">
                                        Konfirmasi Bukti Pembayaran
                                        <span id="idStatusLunas"></span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6>Detail Warga</h6>
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            No Rumah
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_noRumah"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            No Pelanggan
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_noPelanggan"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nama Warga
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_namaWarga"></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <h6>Detail Tagihan</h6>
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Tanggal Input
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_tanggal"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Bulan Pemakaian
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_bulan"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Stand Awal (m<sup>3</sup>)
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_s_awal"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Stand Akhir (m<sup>3</sup>)
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_s_akhir"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Jumlah Pemakaian
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <span id="d_pemakaian"></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="h5"><span class="text-danger">
                                                    <span>Total Tagihan</span>
                                                    <span class="float-right font-weight-bold mr-5">
                                                        Rp
                                                        <span id="d_tagihan"></span>
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-center my-4">Bukti Bayar</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <a href="" id="aHrefBuktiBayar" target="_blank">
                                                    <img src="" id="gambarBuktiBayar" style="width:100%" height="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnKonfirmasBuktiBayar_bend1" data-id='12039999' data-status='1' class="btn btn-danger">Bukti Tidak Valid</button>
                                    <button type="button" id="btnKonfirmasBuktiBayar_bend2" data-id='' data-status='2' class="btn btn-success">Ya, Bukti Valid</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php function atas_air()
    {
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
                        <!--        <a class="dropdown-item" href="../turus_android/profile_ben.php?u=08157785211">Profile</a>-->
                        <!--         <div class="dropdown-divider"></div>-->
                        <!--        <a class="dropdown-item" href="../login/logout.php">Log out</a>-->
                        <!--    </div>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="content" id="tag">
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo isset($_GET['sp']) ? '' : 'active' ?>" href="../turus_android/manajemen_air.php">Tagihan Warga & Kelola Air</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                    <a class="nav-link <?php echo $_GET['sp'] == 'batas_bayar' ? 'active' : '' ?>" href="../login/index.php?p=tag_user&sp=batas_bayar">Batas Pembayaran</a>
                                </li>
                                    <li class="nav-item ">
                                    <a class="nav-link <?php echo $_GET['sp'] == 'belum_bayar' ? 'active' : '' ?>" href="../login/index.php?p=tag_user&sp=belum_bayar">Data Belum Bayar</a>
                                </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <?php
                                if (isset($_GET['sp'])) {
                                    if ($_GET['sp'] == 'belum_bayar') {
                                ?>
                        <div class="class" id="tagih">
                            <div class="row mt-4">
                                <div class="input-group mt-3 md-5 d-flex justify-content-center">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" id="search_tag_user" name="search" class="form-control" placeholder="Search" onkeyup='searching_tag_user()'>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Pemakaian</th>
                                            <th>Tagihan</th>
                                            <th colspan="2" style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="belum-bayar-body"></tbody>
                                </table>
                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination" id="tombolnavigasi-belum">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <?php
                                    } else if ($_GET['sp'] == 'batas_bayar') {
                    ?>
                        <div class="class" id="tagih">
                            <div class="row mt-4">
                                <div class="input-group mt-3 md-5 d-flex justify-content-center">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" id="search_tag_user" name="search" class="form-control" placeholder="Search" onkeyup='searching_tag_user()'>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="batas-bayar-body"></tbody>
                                </table>
                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination" id="tombolnavigasi-batas">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <?php
                                    }
                                } else {
                    ?> -->
                        <div class="class" id="tagih">
                            <div class="row mt-4 mb-3">
                                <!-- <div class="input-group mt-3 md-5 d-flex justify-content-center">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" id="searchmanajemen_air" name="search" class="form-control" placeholder="Search" onkeyup='searchingmanajemen_air()'>
                        </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td rowspan="2" style="text-align:center">No</td>
                                        <td rowspan="2" style="text-align:center">Nama Warga</td>
                                        <td rowspan="2" style="text-align:center">Alamat</td>
                                        <td rowspan="2" style="text-align:center">No. Rumah</td>
                                        <!-- <td rowspan="2" style="text-align:center">Status Pembayaran</td> -->
                                        <td colspan="12" style="text-align:center">
                                            <input type="month" name="tahuntag" id="tahuntag" value="<?= date('Y-m'); ?>" class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jan</td>
                                        <td>Feb</td>
                                        <td>Mar</td>
                                        <td>Apr</td>
                                        <td>Mei</td>
                                        <td>Jun</td>
                                        <td>Jul</td>
                                        <td>Agust</td>
                                        <td>Sept</td>
                                        <td>Okt</td>
                                        <td>Nov</td>
                                        <td>Des</td>
                                    </tr>
                                    <tbody id="tagihan-warga-body"></tbody>
                                </table>
                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination" id="tombolnavigasitag">
                                        <li class="page-item"><a class="page-link" href="../turus_android/dashboard_bendahara.php?u=08157785211">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="../turus_android/dashboard_bendahara.php?u=08157785211">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <?php
                                }
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailTagihanModalBend" tabindex="-1" aria-labelledby="detailTagihanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailTagihanModalLabel">Detail Tagihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="detailTagihanId">
                        <h3 id="detailTagihanNama"></h3>
                        <h6 id="detailTagihanAlamat"></h6>
                        <hr>
                        <h5 id="detailTagihanTanggal"></h5>
                        <table class="table d-flex justify">
                            <tr>
                                <td>Stand Awal (m<sup>3
                                    </sup>)</td>
                                <td>Stand Akhir (m<sup>3
                                    </sup>)</td>
                                <td>Pemakaian (m<sup>3
                                    </sup>)
                                </td>
                                <td>Tagihan (Rp)</td>
                            </tr>
                            <tr>
                                <td id="detailTagihanStandAwal"></td>
                                <td id="detailTagihanStandAkhir"></td>
                                <td id="detailTagihanPemakaian"></td>
                                <td id="detailTagihanRupiah"></td>
                            </tr>
                        </table>
                        <p class="h3"><span class="text-muted"></span><span class="right"><span id="detailTagihanStatus"></span></span></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="gantilunas" class="btn btn-primary">Tandai Lunas</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>