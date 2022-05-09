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
            <?php atas_bendahara(); ?>
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

        <script>
            $(document).ready(function() {
                getData_data_user();
                search_data_user_blm_byr();
                <?php if (isset($_GET['p']) && $_GET['p'] == 'tag_user') { ?>
                    getmanajemen_air();
                <?php } ?>
            })
        </script>

        <!-- <script>
            qtgl = <?php echo json_encode($data_pakai); ?>

            p_tgl = [];
            p_val = [];

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
        </script> -->

        <script>
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
            //     $.ajax({
            //         url: "olah.php",
            //         data: {
            //             p: "gaugerupiah"
            //         },
            //         method: "POST",
            //         success: function(data) {
            //             var tag = JSON.parse(data);
            //             // console.log(tag.tagihan);
            //             $("#GaugeMeterRupiah").attr("data-used", tag.tagihan ?? 0)
            //             $("#GaugeMeterRupiah").gaugeMeter();
            //         }
            //     })
            // })
            //DASHBORD ADMIN (PEMAKAIAN)
            // $(document).ready(function() {

            //     $.ajax({
            //         url: "olah.php",
            //         data: {
            //             p: "totalpemakaian"
            //         },
            //         method: "POST",
            //         success: function(data) {
            //             var res = JSON.parse(data);
            //             var bulan = [];
            //             var total = [];
            //             var ketbulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            //             $.each(res.reverse(), function(index, value) {
            //                 bulan.push(ketbulan[+value.month - 1] + " " + value.year);
            //                 total.push(+value.pemakaian);
            //             });
            //             console.log(bulan, total);
            //             Highcharts.chart('grafik_admin_air', {
            //                 title: {
            //                     text: 'Grafik Pemakaian'
            //                 },
            //                 subtitle: {
            //                     text: 'Source: Omahiot.com'
            //                 },
            //                 xAxis: {
            //                     categories: bulan
            //                 },
            //                 yAxis: {
            //                     title: {
            //                         text: 'Pemakaian (m3)'
            //                     }
            //                 },
            //                 series: [{
            //                     name: 'Debit Air',
            //                     data: total
            //                 }]
            //             });
            //         }
            //     })
            // })
            //DASHBOARD ADMIN(RUPIAH)
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
                        Highcharts.chart('grafik_admin_pemasukan', {
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

                $("#formpemasukan").submit(function(e) {
                    e.preventDefault();
                    param = $(this).find("input[name='param']").val();
                    tgl1 = $(this).find("input[name='tgl1']").val();
                    tgl2 = $(this).find("input[name='tgl2']").val();
                    console.log(param, tgl1, tgl2)
                    chartt(param, tgl1, tgl2);
                    // $(this).css("display", "none");
                    $(".ppemasukan").css("display", "none");
                    $('#grafik_admin_pemasukan').css("display", "");
                    $("#divchartpemasukan").css("display", "");
                    $("#divformpemasukan").css("display", "none");
                    $(".closepemasukan").css("display", "");
                });

                $(".ppemasukan").click(function(e) {
                    e.preventDefault();
                    $("#grafik_admin_pemasukan").css("display", "none");
                    $("#divformpemasukan").css("display", "");
                    $(".ppemasukan").css("display", "none");
                });

                $('#closechartpemasukan').click(function(e) {
                    e.preventDefault();
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
                            Highcharts.chart('grafik_admin_pemasukan', {
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
                    $(".ppemasukan").css("display", "");
                    $('.closepemasukan').css("display", "none");
                });

                function closepemasukan(button, chart, form, btn1) {
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
                closepemasukan("cformpemasukan", "grafik_admin_pemasukan", "divformpemasukan", "ppemasukan")

                function chartt(param, tgl1, tgl2) {
                    texttitle = null;
                    textx = null;
                    sname = null;

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

                    } else if (param == 'pemasukan') {
                        console.log("Pemasukan Air");
                        aidi = 'grafik_admin_pemasukan'
                        json_path = "olah.php?p=totalpemasukan" + "&date_start=" + tgl1 + "&date_end=" + tgl2;
                        texttitle = 'Grafik Pemasukan'
                        textx = 'Pemasukan (m3)'
                        sname = 'Pemasukan'

                        $.ajax({
                            url: "olah.php",
                            type: "POST",
                            data: {
                                p: 'totalpemasukan',
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
                                    total.push(+value.tagihan);
                                });
                                console.log(bulan, total);

                                var option_pemasukan = {
                                    title: {
                                        text: 'Grafik Pemasukan'
                                    },
                                    subtitle: {
                                        text: 'Source: Omahiot1.com'
                                    },
                                    xAxis: {
                                        categories: bulan
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Pemasukan'
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

                                new Highcharts.chart(aidi, option_pemasukan)


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

            //MENAMPILKAN DATA WARGA BELUM BAYAR
            function getData_data_user() {
                $.ajax({
                    url: 'olah.php',
                    data: {
                        p: 'read_blm_byr'
                    },
                    method: 'POST',
                    success: function(response) {
                        // console.log(response);
                        res = JSON.parse(response);
                        var list = "";
                        var hal = 0;

                        $.each(res, function(index, val) {
                            list += "<tr><td>" + (hal + (index + 1)) + "</td><td>" + val.nama + "</td><td>" +
                                val.no_rumah + "</td><td>" + val.no_hp + "</td><td>" + val.tagihan + "</td></tr>"
                        });
                        // $("#databody-data_user_blm_byr").append(list);

                    },
                    error: function(response) {
                        // console.log(response);
                    }
                });
            }

            //SEARCH USER DATA BLM BAYAR DI DASHBOARD BENDAHARA
            function search_data_user_blm_byr(key = null) {
                $.ajax({
                    url: 'olah.php',
                    method: 'post',
                    data: {
                        key: key,
                        p: 'search2',
                        page: "<?php echo $page; ?>"
                    },
                    success: function(response) {
                        // console.log(response);
                        res = JSON.parse(response);
                        var data = "";
                        var hal = <?php echo $page; ?>;
                        $('#databody-data_user_blm_byr').empty();

                        $.each(res.data, function(index, val) {
                            data += "<tr><td>" + (hal + (index + 1)) + "</td><td>" + val.nama + "</td><td>" + val.no_rumah + "</td><td>" + val.no_hp + "</td><td>" + val.tagihan + "</td></tr>"
                        });
                        $('#databody-data_user_blm_byr').append(data);
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
                var key = $('#search2').val();
                search_data_user_blm_byr(key);
            }
            //END
        </script>
</body>

</html>