<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();
$username = $_GET['u'];


//warga node 1
if ($username == "08156667121") {

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

                <?php atas_warga(); ?>

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
            <script src="https://kit.fontawesome.com/eeda23eb30.js" crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js"></script>
            <script src="../node_modules/highcharts.js"></script>
            <script src="../node_modules/exporting.j s"></script>
            <script src="../node_modules/export-data.js"></script>
            <script src="../node_modules/accessibility.js"></script>

            <script>
                $(document).ready(function() {
                    getData_data_user();
                    search_data_user();
                    getmanajemen_air();
                })
            </script>

            <script>
                //DASHBORD ADMIN (PEMAKAIAN)
                $(document).ready(function() {

                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "totalpemakaian"
                        },
                        method: "POST",
                        success: function(data) {
                            var res = JSON.parse(data);
                            var bulan = [];
                            var total = [];
                            var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                            $.each(res.reverse(), function(index, value) {
                                bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                total.push(+value.pemakaian);
                            });
                            console.log(bulan, total);
                            Highcharts.chart('grafik_pemakaian_air', {
                                title: {
                                    text: 'Grafik Pemakaian'
                                },
                                subtitle: {
                                    text: 'Source: Omahiot.com'
                                },
                                xAxis: {
                                    categories: bulan
                                },
                                yAxis: {
                                    title: {
                                        text: 'Pemakaian (m3)'
                                    }
                                },
                                series: [{
                                    name: 'Debit Air',
                                    data: total
                                }]
                            });
                        }
                    })
                })
                //DASHBOARD ADMIN PEMASUKAN 
                // $("#GaugeMeterRupiah").gaugeMeter();
                // $(document).ready(function() {
                //     $.ajax({
                //         url: "olah.php",
                //         data: {
                //             p: "gaugeair"
                //         },
                //         method: "POST",
                //         success: function(data) {
                //             var gauge = JSON.parse(data);
                //             // console.log(gauge.pemakaian);
                //             $("#GaugeMeterAir").attr("data-used", gauge.pemakaian ?? 0)
                //             $("#GaugeMeterAir").gaugeMeter();
                //         }
                //     })
                // })

                $(document).ready(function() {
                    setInterval(function() {
                        console.log("refress");
                        $.ajax({
                            url: "olah.php",
                            data: {
                                p: "gaugeair1"
                            },
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                console.log("ajax olah", data.VolPem);
                                volumfloat = parseFloat(data.VolPem);
                                volumround = Math.round(data.VolPem * 100 / 1000);
                                // $("#GaugeMeterAir span").empty().append(data.pemakaian);
                                $("#GaugeMeterAir").gaugeMeter({
                                    percent: volumround,
                                })
                                $("#GaugeMeterAir span").empty().append(volumfloat)
                            }
                        })
                    }, 5000);

                    function grafiksekarang(button, chart, gauge, btn1, btn2) {
                        $("." + button).click(function(e) {
                            e.preventDefault();
                            var param = $("." + button).attr("data-tipe");
                            var tgl1 = $("." + button).attr("data-date");
                            var tgl2 = '';
                            console.log(param, tgl1, tgl2)
                            chartt(param, tgl1, tgl2);
                            $("#" + chart).css("display", "");
                            $("#" + gauge).css("display", "none");
                            $("." + btn1).css("display", "none");
                            $("." + btn2).css("display", "none");
                            $(".cobaair1").css("padding-bottom", "3em");
                        });
                    }

                    grafiksekarang("bvolumewarga", "divchartpemakaianwarga", "GaugeMeterAir", "bvolumewarga", "bvolumewarga2")


                    // $("#formpemakaian").submit(function(e) {
                    //     e.preventDefault();
                    //     tipe = $(this).find("input[name='param']").val();
                    //     tgl1 = $(this).find("input[name='tgl1']").val();
                    //     tgl2 = $(this).find("input[name='tgl2']").val();
                    //     if (tipe == 'VolPem') {
                    //         param = 'VolPem'
                    //         id1 = 'volum'
                    //     } else if (tipe == 'Tur') {
                    //         param = 'Tur'
                    //         id1 = 'kekeruhan'
                    //     }
                    //     console.log(tipe, param, tgl1, tgl2)
                    //     chartt(param, tgl1, tgl2);
                    //     $("#divchart" + id1).css("display", "");
                    //     $("#divform" + id1).css("display", "none");
                    // });


                    $("#formpemakaianwarga").submit(function(e) {
                        e.preventDefault();
                        tipe = $(this).find("input[name='param']").val();
                        tgl1 = $(this).find("input[name='tgl1']").val();
                        tgl2 = $(this).find("input[name='tgl2']").val();
                        console.log('tipe');
                        if (tipe == 'VolPem') {
                            param = 'VolPem'
                            id1 = 'pemakaianwarga'
                        } else if (tipe == 'Tur') {
                            param = 'Tur'
                            id1 = 'kekeruhan'
                        } else if (tipe == 'VolPem') {
                            param = 'VolPem'
                            id1 = 'volum'
                        }

                        console.log(tipe, param, tgl1, tgl2)
                        chartt(param, tgl1, tgl2);
                        $("#divchart" + id1).css("display", "");
                        $("#divform" + id1).css("display", "none");

                    });


                    function charttanggal(button, gauge, forms, btn1, btn2) {
                        $("." + button).click(function(e) {

                            e.preventDefault();
                            $("#" + gauge).css("display", "none");
                            $("#" + forms).css("display", "");
                            $("." + btn1).css("display", "none");
                            $("." + btn2).css("display", "none");
                            $(".cobaair1").css("padding-bottom", "3em");
                        });
                    }
                    charttanggal("bvolumewarga2", "GaugeMeterAir", "divformpemakaianwarga", "bvolumewarga", "bvolumewarga2")

                    function closetanggal(button, gauge, forms, btn1, btn2) {
                        $("#" + button).click(function(e) {

                            e.preventDefault();
                            $("#" + gauge).css("display", "");
                            $("#" + forms).css("display", "none");
                            $("." + btn1).css("display", "");
                            $("." + btn2).css("display", "");
                            $(".cobaair1").css("padding-bottom", "15px");

                        });
                    }
                    closetanggal("cformpemakaianwarga", "GaugeMeterAir", "divformpemakaianwarga", "bvolumewarga", "bvolumewarga2")


                    function closechartvolum(button, gauge, forms, btn1, btn2, btn3) {
                        $("#" + button).click(function(e) {

                            e.preventDefault();
                            $("#" + gauge).css("display", "");
                            $("#" + forms).css("display", "none");
                            $("." + btn1).css("display", "");
                            $("." + btn2).css("display", "");
                            $("#" + btn3).css("display", "none");
                            $(".cobaair1").css("padding-bottom", "15px");

                        });
                    }
                    closechartvolum("closechartpemakaian", "GaugeMeterAir", "divformpemakaianwarga", "bvolumewarga", "bvolumewarga2", "divchartpemakaianwarga")



                    function chartt(param, tgl1, tgl2) {
                        if (param == 'VolTan') {
                            aidi = 'grafik_volume_air'
                            json_path = "olah.php?p=grafik" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                            texttitle = 'Grafik Volume Air'
                            textx = 'm3'
                            sname = 'Volume Air'
                        } else if (param == 'Tur') {
                            aidi = 'grafik_kekeruhan_air'
                            json_path = "olah.php?p=grafik" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                            texttitle = 'Grafik Kekeruhan Air'
                            textx = 'NTU'
                            sname = 'Kekeruan Air'
                        } else if (param == 'VolPem') {
                            aidi = 'grafik_pemakaian_air'
                            json_path = "olah.php?p=grafikwarga" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                            texttitle = 'Grafik Pemakaian Air'
                            textx = 'Pemakaian Air (m3)'
                            sname = 'Pemakaian Air'

                            console.log("Vol pem");
                        } else {
                            texttitle = '?'
                            textx = '?'
                            sname = '?'
                            json_path = '?'
                            aidi = '?'
                        }

                        var options = {
                            title: {
                                text: texttitle
                            },
                            subtitle: {
                                text: 'Source: Omahiot.com'
                            },
                            xAxis: {
                                categories: []
                            },
                            yAxis: {
                                title: {
                                    text: textx
                                }
                            },
                            chart: {
                                type: 'column'
                            },
                            series: [{
                                name: sname,
                                data: [],
                            }]
                        }
                        $.getJSON(json_path, function(json) {
                            options.xAxis.categories = json[0]['data'];
                            options.series[0].data = json[1]['data'];
                            chart = new Highcharts.chart(aidi, options)
                        });
                    }
                    chartt()

                });
            </script>

    </body>

    </html>






//warga node 2
<?php } elseif ($username == '082246342716') {

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
    
                    <?php atas_warga(); ?>
    
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
                <script src="https://kit.fontawesome.com/eeda23eb30.js" crossorigin="anonymous"></script>
    
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js"></script>
                <script src="../node_modules/highcharts.js"></script>
                <script src="../node_modules/exporting.j s"></script>
                <script src="../node_modules/export-data.js"></script>
                <script src="../node_modules/accessibility.js"></script>
    
                <script>
                    $(document).ready(function() {
                        getData_data_user();
                        search_data_user();
                        getmanajemen_air();
                    })
                </script>
    
                <script>
                    //DASHBORD ADMIN (PEMAKAIAN)
                    $(document).ready(function() {
    
                        $.ajax({
                            url: "olah.php",
                            data: {
                                p: "totalpemakaian"
                            },
                            method: "POST",
                            success: function(data) {
                                var res = JSON.parse(data);
                                var bulan = [];
                                var total = [];
                                var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    
                                $.each(res.reverse(), function(index, value) {
                                    bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                    total.push(+value.pemakaian);
                                });
                                console.log(bulan, total);
                                Highcharts.chart('grafik_pemakaian_air', {
                                    title: {
                                        text: 'Grafik Pemakaian'
                                    },
                                    subtitle: {
                                        text: 'Source: Omahiot.com'
                                    },
                                    xAxis: {
                                        categories: bulan
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Pemakaian (m3)'
                                        }
                                    },
                                    series: [{
                                        name: 'Debit Air',
                                        data: total
                                    }]
                                });
                            }
                        })
                    })
                    //DASHBOARD ADMIN PEMASUKAN 
                    // $("#GaugeMeterRupiah").gaugeMeter();
                    // $(document).ready(function() {
                    //     $.ajax({
                    //         url: "olah.php",
                    //         data: {
                    //             p: "gaugeair"
                    //         },
                    //         method: "POST",
                    //         success: function(data) {
                    //             var gauge = JSON.parse(data);
                    //             // console.log(gauge.pemakaian);
                    //             $("#GaugeMeterAir").attr("data-used", gauge.pemakaian ?? 0)
                    //             $("#GaugeMeterAir").gaugeMeter();
                    //         }
                    //     })
                    // })
    
                    $(document).ready(function() {
                        setInterval(function() {
                            console.log("refress");
                            $.ajax({
                                url: "olah.php",
                                data: {
                                    p: "gaugeair2"
                                },
                                type: "POST",
                                dataType: 'json',
                                success: function(data) {
                                    console.log("ajax olah", data.VolPem);
                                    volumfloat = parseFloat(data.VolPem);
                                    volumround = Math.round(data.VolPem * 100 / 1000);
                                    // $("#GaugeMeterAir span").empty().append(data.pemakaian);
                                    $("#GaugeMeterAir").gaugeMeter({
                                        percent: volumround,
                                    })
                                    $("#GaugeMeterAir span").empty().append(volumfloat)
                                }
                            })
                        }, 5000);
    
                        function grafiksekarang(button, chart, gauge, btn1, btn2) {
                            $("." + button).click(function(e) {
                                e.preventDefault();
                                var param = $("." + button).attr("data-tipe");
                                var tgl1 = $("." + button).attr("data-date");
                                var tgl2 = '';
                                console.log(param, tgl1, tgl2)
                                chartt(param, tgl1, tgl2);
                                $("#" + chart).css("display", "");
                                $("#" + gauge).css("display", "none");
                                $("." + btn1).css("display", "none");
                                $("." + btn2).css("display", "none");
                            });
                        }
    
                        grafiksekarang("bvolumewarga", "divchartpemakaianwarga", "GaugeMeterAir", "bvolumewarga", "bvolumewarga2")
    
    
                        // $("#formpemakaian").submit(function(e) {
                        //     e.preventDefault();
                        //     tipe = $(this).find("input[name='param']").val();
                        //     tgl1 = $(this).find("input[name='tgl1']").val();
                        //     tgl2 = $(this).find("input[name='tgl2']").val();
                        //     if (tipe == 'VolPem') {
                        //         param = 'VolPem'
                        //         id1 = 'volum'
                        //     } else if (tipe == 'Tur') {
                        //         param = 'Tur'
                        //         id1 = 'kekeruhan'
                        //     }
                        //     console.log(tipe, param, tgl1, tgl2)
                        //     chartt(param, tgl1, tgl2);
                        //     $("#divchart" + id1).css("display", "");
                        //     $("#divform" + id1).css("display", "none");
                        // });
    
    
                        $("#formpemakaianwarga").submit(function(e) {
                            e.preventDefault();
                            tipe = $(this).find("input[name='param']").val();
                            tgl1 = $(this).find("input[name='tgl1']").val();
                            tgl2 = $(this).find("input[name='tgl2']").val();
                            console.log('tipe');
                            if (tipe == 'VolPem') {
                                param = 'VolPem'
                                id1 = 'pemakaianwarga'
                            } else if (tipe == 'Tur') {
                                param = 'Tur'
                                id1 = 'kekeruhan'
                            } else if (tipe == 'VolPem') {
                                param = 'VolPem'
                                id1 = 'volum'
                            }
    
                            console.log(tipe, param, tgl1, tgl2)
                            chartt(param, tgl1, tgl2);
                            $("#divchart" + id1).css("display", "");
                            $("#divform" + id1).css("display", "none");
    
                        });
    
    
                        function charttanggal(button, gauge, forms, btn1, btn2) {
                            $("." + button).click(function(e) {
    
                                e.preventDefault();
                                $("#" + gauge).css("display", "none");
                                $("#" + forms).css("display", "");
                                $("." + btn1).css("display", "none");
                                $("." + btn2).css("display", "none");
                            });
                        }
                        charttanggal("bvolumewarga2", "GaugeMeterAir", "divformpemakaianwarga", "bvolumewarga", "bvolumewarga2")
    
                        function closetanggal(button, gauge, forms, btn1, btn2) {
                            $("#" + button).click(function(e) {
    
                                e.preventDefault();
                                $("#" + gauge).css("display", "");
                                $("#" + forms).css("display", "none");
                                $("." + btn1).css("display", "");
                                $("." + btn2).css("display", "");
    
                            });
                        }
                        closetanggal("cformpemakaianwarga", "GaugeMeterAir", "divformpemakaianwarga", "bvolumewarga", "bvolumewarga2")
    
    
                        function closechartvolum(button, gauge, forms, btn1, btn2, btn3) {
                            $("#" + button).click(function(e) {
    
                                e.preventDefault();
                                $("#" + gauge).css("display", "");
                                $("#" + forms).css("display", "none");
                                $("." + btn1).css("display", "");
                                $("." + btn2).css("display", "");
                                $("#" + btn3).css("display", "none");
    
                            });
                        }
                        closechartvolum("closechartpemakaian", "GaugeMeterAir", "divformpemakaianwarga", "bvolumewarga", "bvolumewarga2", "divchartpemakaianwarga")
    
    
    
                        function chartt(param, tgl1, tgl2) {
                            if (param == 'VolTan') {
                                aidi = 'grafik_volume_air'
                                json_path = "olah.php?p=grafik" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                                texttitle = 'Grafik Volume Air'
                                textx = 'm3'
                                sname = 'Volume Air'
                            } else if (param == 'Tur') {
                                aidi = 'grafik_kekeruhan_air'
                                json_path = "olah.php?p=grafik" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                                texttitle = 'Grafik Kekeruhan Air'
                                textx = 'NTU'
                                sname = 'Kekeruan Air'
                            } else if (param == 'VolPem') {
                                aidi = 'grafik_pemakaian_air'
                                json_path = "olah.php?p=grafikwarga2" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                                texttitle = 'Grafik Pemakaian Air'
                                textx = 'Pemakaian Air (m3)'
                                sname = 'Pemakaian Air'
    
                                console.log("Vol pem");
                            } else {
                                texttitle = '?'
                                textx = '?'
                                sname = '?'
                                json_path = '?'
                                aidi = '?'
                            }
    
                            var options = {
                                title: {
                                    text: texttitle
                                },
                                subtitle: {
                                    text: 'Source: Omahiot.com'
                                },
                                xAxis: {
                                    categories: []
                                },
                                yAxis: {
                                    title: {
                                        text: textx
                                    }
                                },
                                chart: {
                                    type: 'column'
                                },
                                series: [{
                                    name: sname,
                                    data: [],
                                }]
                            }
                            $.getJSON(json_path, function(json) {
                                options.xAxis.categories = json[0]['data'];
                                options.series[0].data = json[1]['data'];
                                chart = new Highcharts.chart(aidi, options)
                            });
                        }
                        chartt()
    
                    });
                </script>
    
        </body>
    
        </html>

    <?php } else {
    header("Location:../ta/login.php");
}
?>