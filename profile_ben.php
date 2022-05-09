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
    <link rel="stylesheet" href="../css/gauge.css">

</head>

<body>

    <div class="wrapper ">

        <?php kepala_bendahara();
        $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
        <div class="main-panel">

            <?php atas_profile(); ?>

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

</body>

</html>