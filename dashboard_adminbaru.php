<?php
include "function.php";
$sa = new air();
$conn = $sa->koneksi();
$username = $_GET['u'];

//LOGIN UNTUK ADMIN KE-1 DENGAN NO.HP 087715434710 (ADMIN 2 = 085740266236)
if ($username == '087715434710') {
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
        <meta name="description" content="CoreUI - Open Source Bootstrap \\ Template">
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
        <link rel="stylesheet" href="../css/GaugeMeter.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    </head>

    <body>
        <div class="wrapper ">

            <?php kepala_admin();
            $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
            <div class="main-panel">
                <?php atas_admin(); ?>
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
            <!-- <script src="../node_modules/GaugeMeter.js"></script> -->
            <script src="../node_modules/bootstrap.min.js"></script>
            <script src="../node_modules/pace.min.js"></script>
            <script src="../node_modules/perfect-scrollbar-0.4.5.min.js"></script>
            <script src="../node_modules/Chart.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <script src="https://kit.fontawesome.com/eeda23eb30.js" crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js"></script>
            <script src="../node_modules/highcharts.js"></script>
            <script src="../node_modules/exporting.js"></script>
            <script src="../node_modules/export-data.js"></script>
            <script src="../node_modules/accessibility.js"></script>
            <script src="../node_modules/js-fluid-meter.js"></script>
            <script src="../node_modules/liquidFillGauge.js"></script>
            <script src="../node_modules/d3.v3.min.js"></script>
            <script src="../js/main.js"></script>
            <script src="../js/fluid-meter.js"></script>


            <!-- <script>
                $('input[name="dateranges"]').daterangepicker({
                    opens: 'left'
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "totalpemakaian",
                            date_start: start.format('YYYY-MM-DD'),
                            date_end: end.format('YYYY-MM-DD'),
                        },
                        method: "POST",
                        success: function(data) {
                            console.log(data);
                            z

                        }
                    });

                });

                $(document).ready(function() {
                    getData_data_user();
                    search_data_user();
                    getmanajemen_air();


                });
            </script> -->

            //mengatur gauss di dashboard admin
            <script>
                qtgl = '<?php echo json_encode($data_pakai); ?>';
                p_tgl = []
                p_val = []

                for (i = 0; i < qtgl.length; i++) {
                    p_tgl[i] = qtgl[i]['tanggal']
                    p_val[i] = Number(qtgl[i]['pemakaian'])
                }

                Highcharts.chart('grafik_warga', {
                    title: {
                        text: ''
                    },
                    yAxis: {
                        title: {
                            text: 'Pemakaian Air'
                        }
                    },

                    xAxis: {
                        categories: p_tgl
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    series: [{
                        name: 'Pemakaian Air',
                        data: p_val
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            </script>
            <script>
                //mengatur gauss volume air
                // $("#GaugeMeterRupiah").gaugeMeter();
                $(document).ready(function() {
                    // var fm = new FluidMeter();
                    // fm.init({
                    //     targetContainer: document.getElementById("fluid-meter"),
                    //     fillPercentage: 0,
                    //     options: {
                    //         fontSize: "30px",
                    //         drawPercentageSign: true,
                    //         drawBubbles: false,
                    //         size: 300,
                    //         borderWidth: 19,
                    //         backgroundColor: "#e2e2e2",
                    //         foregroundColor: "#fafafa",
                    //         foregroundFluidLayer: {
                    //             fillStyle: "#16E1FF",
                    //             angularSpeed: 30,
                    //             maxAmplitude: 5,
                    //             frequency: 30,
                    //             horizontalSpeed: -20
                    //         },
                    //         backgroundFluidLayer: {
                    //             fillStyle: "#4F8FC6",
                    //             angularSpeed: 100,
                    //             maxAmplitude: 3,
                    //             frequency: 22,
                    //             horizontalSpeed: 20
                    //         }
                    //     }
                    // });

                    var config3 = liquidFillGaugeDefaultSettings();
                    config3.textVertPosition = 0.50;
                    config3.waveAnimateTime = 10000;
                    config3.waveHeight = 0.05;
                    config3.waveAnimate = true;
                    config3.waveOffset = 0.25;
                    config3.valueCountUp = false;
                    config3.displayPercent = true;
                    config3.minValue = 0;
                    config3.maxValue = 1000
                    config3.textSize = 0.7;
                    var gauge4 = loadLiquidFillGauge("fillgauge6", 0, config3);



                    setInterval(function() {
                        console.log("refresh");
                        $.ajax({
                            url: "olah.php",
                            data: {
                                p: "volumtandon"
                            },
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                console.log("ajax olah", data.VolTan);
                                volumfloat = parseFloat(data.VolTan);
                                volumround = Math.round(data.VolTan * 100 / 1000);
                                // $("#GaugeMeterAir span").empty().append(data.pemakaian);
                                // $("#GaugeMeterVolum").gaugeMeter({
                                //     percent: volumround,
                                // })
                                // $("#GaugeMeterVolum span").empty().append(volumfloat + "<u>m3</u>")

                                gauge4.update(data.VolTan)
                                // fm.setPercentage(data.jsn)
                            }
                        });
                        //mengatur gauss kekeruhan air
                        $.ajax({
                            url: "olah.php",
                            data: {
                                p: "kekeruhan"
                            },
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                console.log("ajax kekeruhan", data.Tur);
                                kekeruhanfloat = parseFloat(data.Tur);
                                kekeruhanround = Math.round(data.Tur * 100 / 5000);
                                $("#GaugeMeterKekeruhan").gaugeMeter({
                                    percent: kekeruhanround,
                                })
                                $("#GaugeMeterKekeruhan span").empty().append(kekeruhanfloat + "<u>NTU</u>");
                                // $("#GaugeMeterKekeruhan span").css("font-size", "50px");
                                // var tag = JSON.parse(data);
                                // // console.log(tag.tagihan);
                                // $("#GaugeMeterRupiah").attr("data-used", data.tagihan)
                                // $("#GaugeMeterRupiah").gaugeMeter();
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
                            $(".c1coba").css("padding-bottom", "3em");
                            $("#" + gauge).css("display", "none");
                            $("." + btn1).css("display", "none");
                            $("." + btn2).css("display", "none");
                            $(".c2coba").css("padding-bottom", "3em");
                        });
                    }

                    grafiksekarang("bvolume", "divchartvolum", "fillgauge6", "bvolume", "bvolume2")
                    grafiksekarang("gkeruh", "divchartkekeruhan", "GaugeMeterKekeruhan", "gkeruh", "gkeruh2")

                    $("#formvolum,#formkekeruhan").submit(function(e) {
                        e.preventDefault();
                        tipe = $(this).find("input[name='param']").val();
                        tgl1 = $(this).find("input[name='tgl1']").val();
                        tgl2 = $(this).find("input[name='tgl2']").val();
                        if (tipe == 'VolTan') {
                            param = 'VolTan'
                            id1 = 'volum'
                        } else if (tipe == 'Tur') {
                            param = 'Tur'
                            id1 = 'kekeruhan'
                        }
                        console.log(tipe, param, tgl1, tgl2)
                        chartt(param, tgl1, tgl2);
                        $("#divchart" + id1).css("display", "");
                        $("#divform" + id1).css("display", "none");
                    });

                    $("#formvolum,#formkekeruhan").submit(function(e) {
                        e.preventDefault();
                        tipe = $(this).find("input[name='param']").val();
                        tgl1 = $(this).find("input[name='tgl1']").val();
                        tgl2 = $(this).find("input[name='tgl2']").val();
                        if (tipe == 'VolTan') {
                            param = 'VolTan'
                            id1 = 'volum'
                        } else if (tipe == 'Tur') {
                            param = 'Tur'
                            id1 = 'kekeruhan'
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
                            $(".c1coba").css("padding-bottom", "3em");
                            $(".c2coba").css("padding-bottom", "3em");
                        });
                    }
                    charttanggal("bvolume2", "fillgauge6", "divformvolum", "bvolume", "bvolume2")
                    charttanggal("gkeruh2", "GaugeMeterKekeruhan", "divformkekeruhan", "gkeruh", "gkeruh2")

                    function closetanggal(button, gauge, forms, btn1, btn2) {
                        $("#" + button).click(function(e) {

                            e.preventDefault();
                            $("#" + gauge).css("display", "");
                            $("#" + forms).css("display", "none");
                            $("." + btn1).css("display", "");
                            $("." + btn2).css("display", "");
                            $(".c1coba").css("padding-bottom", "15px");
                            $(".c2coba").css("padding-bottom", "15px");

                        });
                    }
                    closetanggal("cformvolum", "fillgauge6", "divformvolum", "bvolume", "bvolume2")
                    closetanggal("cformkekeruhan", "GaugeMeterKekeruhan", "divformkekeruhan", "gkeruh", "gkeruh2")

                    function closechartvolum(button, gauge, forms, btn1, btn2, btn3) {
                        $("#" + button).click(function(e) {

                            e.preventDefault();
                            $("#" + gauge).css("display", "");
                            $("#" + forms).css("display", "none");
                            $("." + btn1).css("display", "");
                            $("." + btn2).css("display", "");
                            $("#" + btn3).css("display", "none");
                            $(".c1coba").css("padding-bottom", "15px");
                            $(".c2coba").css("padding-bottom", "15px");

                        });
                    }
                    closechartvolum("closechartvolum", "fillgauge6", "divformvolum", "bvolume", "bvolume2", "divchartvolum")
                    closechartvolum("closechartkekeruhan", "GaugeMeterKekeruhan", "divformkekeruhan", "gkeruh", "gkeruh2", "divchartkekeruhan")


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
                        } else if (param == 'pemakaian') {
                            aidi = 'grafik_admin_air'
                            json_path = "olah.php?p=grafik" + "&param=" + param + "&tgl1=" + tgl1 + "&tgl2=" + tgl2;
                            texttitle = 'Grafik Pemakaian Air'
                            textx = 'Pemakaian Air (m3)'
                            sname = 'Pemakaian Air'
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

                })

                //mengatur grafik pemakaian air
                $(document).ready(function() {
                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "totalpemakaian"
                        },
                        method: "POST",
                        success: function(data) {
                            console.log(data);

                            var res = JSON.parse(data);
                            var bulan = [];
                            var total = [];
                            var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                            $.each(res.reverse(), function(index, value) {
                                bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                total.push(+value.pemakaian);
                            });
                            console.log(bulan, total);
                            Highcharts.chart('grafik_admin_air', {
                                title: {
                                    text: 'Grafik Pemakaian'
                                },
                                subtitle: {
                                    text: 'Source: Omahiot1.com'
                                },
                                xAxis: {
                                    categories: bulan
                                },
                                yAxis: {
                                    title: {
                                        text: 'Pemakaian (m3)'
                                    }
                                },
                                chart: {
                                    type: 'column'
                                },
                                series: [{
                                    name: 'Debit Air',
                                    data: total,
                                }]
                            });
                        }
                    })

                    $("#formpemakaian").submit(function(e) {
                        e.preventDefault();
                        param = $(this).find("input[name='param']").val();
                        tgl1 = $(this).find("input[name='tgl1']").val();
                        tgl2 = $(this).find("input[name='tgl2']").val();
                        console.log(param, tgl1, tgl2)
                        chartt(param, tgl1, tgl2);
                        // $(this).css("display", "none");
                        $(".pkeruh").css("display", "none");
                        $('#grafik_admin_air').css("display", "");
                        $("#divchartpemakaianair").css("display", "");
                        $("#divformpemakaian").css("display", "none");
                        $(".closeadminair").css("display", "");
                    });

                    $("#closechartpemakaianair").click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: "olah.php",
                            data: {
                                p: "totalpemakaian"
                            },
                            method: "POST",
                            success: function(data) {
                                console.log(data);

                                var res = JSON.parse(data);
                                var bulan = [];
                                var total = [];
                                var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                                $.each(res.reverse(), function(index, value) {
                                    bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                    total.push(+value.pemakaian);
                                });
                                console.log(bulan, total);
                                Highcharts.chart('grafik_admin_air', {
                                    title: {
                                        text: 'Grafik Pemakaian'
                                    },
                                    subtitle: {
                                        text: 'Source: Omahiot1.com'
                                    },
                                    xAxis: {
                                        categories: bulan
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Pemakaian (m3)'
                                        }
                                    },
                                    chart: {
                                        type: 'column'
                                    },
                                    series: [{
                                        name: 'Debit Air',
                                        data: total,
                                    }]
                                });
                            }
                        })
                        $(".pkeruh").css("display", "");
                        $('.closeadminair').css("display", "none");
                    });

                    $(".pkeruh").click(function(e) {
                        e.preventDefault();
                        $("#grafik_admin_air").css("display", "none");
                        $("#divformpemakaian").css("display", "");
                        $(".pkeruh").css("display", "none");
                    });

                    function closepemakaian(button, chart, form, btn1) {
                        $("#" + button).click(function(e) {
                            e.preventDefault();
                            // var param = $("." + button).attr("data-tipe");
                            // var tgl1 = $("." + button).attr("data-date");
                            // var tgl2 = '';
                            // console.log(param, tgl1, tgl2)
                            // chartt(param, tgl1, tgl2);
                            $("#" + chart).css("display", "");
                            $("#" + form).css("display", "none");
                            $("." + btn1).css("display", "");

                        });
                    }
                    closepemakaian("cformpemakaian", "grafik_admin_air", "divformpemakaian", "pkeruh")

                    // function closechartpemakaian(button, chart, forms, btn1,btn2) {
                    //     $("#" + button).click(function(e) {

                    //         e.preventDefault();
                    //         $("#" + chart).css("display", "none");
                    //         $("#" + forms).css("display", "none");
                    //         $("." + btn1).css("display", "");
                    //         $("#" + btn2).css("display", "none");

                    //     });
                    // }
                    // closechartpemakaian("closechartpemakaianair", "grafik_admin_air", "divformpemakaian", "pkeruh", "divchartpemakaianair")


                    function chartt(param, tgl1, tgl2) {

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
                        } else if (param == 'pemakaian') {
                            console.log("Pemakaian Air");

                            aidi = 'grafik_admin_air'
                            json_path = "olah.php?p=totalpemakaian" + "&date_start=" + tgl1 + "&date_end=" + tgl2;
                            texttitle = 'Grafik Pemakaian Air'
                            textx = 'Pemakaian Air (m3)'
                            sname = 'Pemakaian Air'

                            $.ajax({
                                url: "olah.php",
                                type: "POST",
                                data: {
                                    p: 'totalpemakaian',
                                    date_start: tgl1,
                                    date_end: tgl2
                                },
                                success: function(data) {
                                    console.log(data);


                                    var res = JSON.parse(data);
                                    var bulan = [];
                                    var total = [];
                                    var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                                    $.each(res.reverse(), function(index, value) {
                                        bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                        total.push(+value.pemakaian);
                                    });
                                    console.log(bulan, total);

                                    var option_pemakaian = {
                                        title: {
                                            text: 'Grafik Pemakaian'
                                        },
                                        subtitle: {
                                            text: 'Source: Omahiot1.com'
                                        },
                                        xAxis: {
                                            categories: bulan
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Pemakaian (m3)'
                                            }
                                        },
                                        chart: {
                                            type: 'column'
                                        },
                                        series: [{
                                            name: 'Debit Air',
                                            data: total,
                                        }]
                                    };

                                    new Highcharts.chart(aidi, option_pemakaian)


                                }
                            })
                        } else {
                            texttitle = '?'
                            textx = '?'
                            sname = '?'
                            json_path = '?'
                            aidi = '?'
                        }


                        // $.getJSON(json_path, function(json) {
                        //     console.log(json);
                        //     options.xAxis.categories = json[0]['data'];
                        //     options.series[0].data = json[1]['data'];
                        //     chart = new Highcharts.chart(aidi, options)
                        // });
                    }
                    chartt()
                })

                //mengatur grafik pemasukan rupiah
                $(document).ready(function() {
                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "totalpemasukan"
                        },
                        method: "POST",
                        success: function(data) {
                            var res = JSON.parse(data);
                            var bulan = [];
                            var total = [];
                            var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                            $.each(res.reverse(), function(index, value) {
                                bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                total.push(+value.tagihan);
                            });
                            console.log(bulan, total);
                            Highcharts.chart('grafik_admin_rupiah', {
                                title: {
                                    text: 'Grafik Pemasukan'
                                },
                                subtitle: {
                                    text: 'Source: Omahiot.com'
                                },
                                xAxis: {
                                    categories: bulan
                                },
                                yAxis: {
                                    title: {
                                        text: 'Pendapatan (Rp.)'
                                    }
                                },
                                series: [{
                                    name: 'Pendapatan',
                                    data: total
                                }]
                            });
                        }
                    })
                })
            </script>
    </body>

    </html>

    //LOGIN UNTUK ADMIN KE-2 DENGAN NO.HP 085740266236
<?php
} elseif ($username == '085740266236') {
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
        <meta name="description" content="CoreUI - Open Source Bootstrap \\ Template">
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
            <?php kepala_admin();
            $page = (isset($_GET['page'])) ? $_GET['page'] : 0; ?>
            <div class="main-panel">

                <?php atas_admin(); ?>
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
                $(document).ready(function() {
                    getData_data_user();
                    search_data_user();
                    getmanajemen_air();
                })
            </script>

            <script>
                qtgl = '<?php echo json_encode($data_pakai); ?>';
                p_tgl = []
                p_val = []

                for (i = 0; i < qtgl.length; i++) {
                    p_tgl[i] = qtgl[i]['tanggal']
                    p_val[i] = Number(qtgl[i]['pemakaian'])
                }
                Highcharts.chart('grafik_warga', {
                    title: {
                        text: ''
                    },
                    yAxis: {
                        title: {
                            text: 'Pemakaian Air'
                        }
                    },

                    xAxis: {
                        categories: p_tgl
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    series: [{
                        name: 'Pemakaian Air',
                        data: p_val
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            </script>

            <script>
                //mengatur gauss pemakaian air
                // $("#GaugeMeterRupiah").gaugeMeter();
                $(document).ready(function() {
                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "gaugeair"
                        },
                        method: "POST",
                        success: function(data) {
                            var gauge = JSON.parse(data);
                            // console.log(gauge.pemakaian);
                            $("#GaugeMeterAir").attr("data-used", gauge.pemakaian ?? 0)
                            $("#GaugeMeterAir").gaugeMeter();
                        }
                    })
                    //mengatur gauss pemasukan rupiah
                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "gaugerupiah"
                        },
                        method: "POST",
                        success: function(data) {
                            var tag = JSON.parse(data);
                            // console.log(tag.tagihan);
                            $("#GaugeMeterRupiah").attr("data-used", tag.tagihan ?? 0)
                            $("#GaugeMeterRupiah").gaugeMeter();
                        }
                    })
                })
                ////mengatur grafik pemakaian air
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
                            Highcharts.chart('grafik_admin_air', {
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
                //mengatur grafik pemasukan rupiah
                $(document).ready(function() {
                    $.ajax({
                        url: "olah.php",
                        data: {
                            p: "totalpemasukan"

                        },
                        method: "POST",
                        success: function(data) {
                            var res = JSON.parse(data);
                            var bulan = [];
                            var total = [];
                            var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                            $.each(res.reverse(), function(index, value) {
                                bulan.push(ketbulan[+value.month - 1] + " " + value.year);
                                total.push(+value.tagihan);
                            });
                            console.log(bulan, total);
                            Highcharts.chart('grafik_admin_rupiah', {
                                title: {
                                    text: 'Grafik Pemasukan'
                                },
                                subtitle: {
                                    text: 'Source: Omahiot.com'
                                },
                                xAxis: {
                                    categories: bulan
                                },
                                yAxis: {
                                    title: {
                                        text: 'Pendapatan (Rp.)'
                                    }
                                },
                                series: [{
                                    name: 'Pendapatan',
                                    data: total
                                }]
                            });
                        }
                    })
                })
            </script>
    </body>

    </html>

    //SELAIN 2 ADMIN DI ATAS AKAN DIALIHKAN KE HALAMAN LOGIN
<?php } else {
    header("Location:../ta/login.php");
}
?>