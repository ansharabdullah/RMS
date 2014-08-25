<script type="text/javascript">

    $(document).ready(function() {
        $("#amtWarning").hide();
        $("#mtWarning").show();
        $("#warning").hide();
        $("#warningActive").addClass('active');
        $("#amtActive").removeClass('active');
        $("#mtActive").removeClass('active');
    });

    function amtWarning() {
        $("#amtWarning").show();
        $("#mtWarning").hide();
        $("#warning").hide();
        $("#warningActive").removeClass('active');
        $("#amtActive").addClass('active');
        $("#mtActive").removeClass('active');
    }

    function mtWarning() {
        $("#amtWarning").hide();
        $("#mtWarning").show();
        $("#warning").hide();
        $("#warningActive").removeClass('active');
        $("#amtActive").removeClass('active');
        $("#mtActive").addClass('active');
    }

    function warning() {
        $("#amtWarning").hide();
        $("#mtWarning").hide();
        $("#warning").show();
        $("#warningActive").addClass('active');
        $("#amtActive").removeClass('active');
        $("#mtActive").removeClass('active');
    }

<?php
$arrTotalKlAmt = "";
$arrTotalKmAmt = "";
for($i  = 0 ; $i < sizeof($kinerja_amt); $i++) {
    $arrTotalKlAmt.= $kinerja_amt[$i]->total_kl;
    $arrTotalKmAmt.= $kinerja_amt[$i]->total_km;
    if($i < sizeof($kinerja_amt) - 1)
    {
         $arrTotalKlAmt.=",";
         $arrTotalKmAmt.=",";
    }
}
?>
    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Grafik AMT'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Klik dan tarik di area plot untuk memperbesar gambar' :
                        'Sorot Grafik Untuk Memperbesar'
            },
            xAxis: {
                type: 'datetime',
                minRange: 10 * 24 * 3600000 // ten days
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            legend : {enabled: true},
           series: [{
                    type: 'spline',
                    name: 'KL',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014, <?php echo date('n')?> - 1, <?php echo $kinerja_mt[0]->tanggal?>),
                    data: [<?php echo $arrTotalKlAmt?>]
                }, {
                    type: 'spline',
                    name: 'KM',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014,<?php echo date('n')?> - 1,<?php echo $kinerja_mt[0]->tanggal?>),
                    data: [<?php echo $arrTotalKmAmt?>]
                }]
        });
    });

<?php
$arrTotalKl = "";
$arrTotalKm = "";
for($i  = 0 ; $i < sizeof($kinerja_mt); $i++) {
    $arrTotalKl.= $kinerja_mt[$i]->total_kl;
    $arrTotalKm.= $kinerja_mt[$i]->total_km;
    if($i < sizeof($kinerja_mt) - 1)
    {
         $arrTotalKl.=",";
         $arrTotalKm.=",";
    }
}
?>
    $(function() {
        $('#grafik1').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Grafik MT'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Klik dan tarik di area plot untuk memperbesar gambar': 
                        'Sorot Grafik Untuk Memperbesar'
            },
            xAxis: {
                type: 'datetime',
                minRange: 10 * 24 * 3600000 // ten days,
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            legend : {enabled: true},
            series: [{
                    type: 'spline',
                    name: 'KL',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014, <?php echo date('n')?> - 1, <?php echo $kinerja_mt[0]->tanggal?>),
                    data: [<?php echo $arrTotalKl?>]
                }, {
                    type: 'spline',
                    name: 'KM',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014,<?php echo date('n')?> - 1,<?php echo $kinerja_mt[0]->tanggal?>),
                    data: [<?php echo $arrTotalKm?>]
                }]
        });
    });
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="icon-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?php echo $total_amt?>
                        </h1>
                        <p>Awak Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                            <?php echo $total_mt?>
                        </h1>
                        <p>Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="icon-star"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                            <?php echo ceil(($kinerja_bulan[0]->total_kl / $rencana_bulan[0]->total_kl) * 100)?>%
                        </h1>
                        <p>Realisasi KL</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="icon-dashboard"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count4">
                            <?php echo $kinerja_bulan[0]->own_use?>
                        </h1>
                        <p>KL (Own Use)</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik"></div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4">

                <section class="panel">
                    <div class="revenue-head">
                        <span>
                            <i class="icon-exclamation-sign"></i>
                        </span>
                        <h3>Peringatan</h3>
                        <span class="rev-combo pull-right">
                            Agustus 2014
                        </span>
                    </div>
                    <div class="panel-body">
                        <section class="panel" id="warning">
                            <header class="panel-heading">
                                Peringatan
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Data AMT hari ini belum diinput</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Data AMT tgl 07-08-2014 belum diupload</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai1 Hari ini tidak masuk</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Pegawai2 Hari ini tidak masuk</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                        <section class="panel" id="amtWarning">
                            <header class="panel-heading">
                                Peringatan AMT
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Data AMT hari ini belum diinput</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Data AMT tgl 07-08-2014 belum diupload</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai1 Hari ini tidak masuk</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Pegawai2 Hari ini tidak masuk</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                        <section class="panel" id="mtWarning">
                            <header class="panel-heading">
                                Peringatan MT
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Data MT hari ini belum diinput</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Data MT tgl 07-08-2014 belum diupload</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Mobil harus segera ganti oli</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mobil Nopol D9009AD Hari ini tidak masuk</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="panel-footer revenue-foot">
                        <ul>
                            <li class="first" id="mtActive">
                                <a href="javascript:;" onclick="mtWarning()">
                                    <i class=" icon-truck"></i>
                                    MT
                                </a>
                            </li>
                            <li id="amtActive">
                                <a href="javascript:;" onclick="amtWarning()">
                                    <i class=" icon-user"></i>
                                    AMT
                                </a>
                            </li>
                            <li class="last" id="warningActive">
                                <a href="javascript:;" onclick="warning()">
                                    <i class="icon-bullseye"></i>
                                    Peringatan
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik1"></div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4">
                <section class="panel">
                    <header class="panel-heading">
                        Realisasi dari Rencana Bulan Ini
                    </header>
                    <div class="panel-body">
                        <p class="text-muted">
                            Kilo Liter Premium (<?php echo $kinerja_bulan[0]->premium?>/<?php echo $rencana_bulan[0]->r_premium?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->premium / $rencana_bulan[0]->r_premium) * 100)?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax (<?php echo $kinerja_bulan[0]->pertamax?>/<?php echo $rencana_bulan[0]->r_pertamax?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax / $rencana_bulan[0]->r_pertamax) * 100)?>95%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Plus (<?php echo $kinerja_bulan[0]->pertamax_plus?>/<?php echo $rencana_bulan[0]->r_pertamax_plus?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax_plus / $rencana_bulan[0]->r_pertamax_plus) * 100)?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Dex (<?php echo $kinerja_bulan[0]->pertamina_dex?>/<?php echo $rencana_bulan[0]->r_pertamina_dex?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-primary"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamina_dex / $rencana_bulan[0]->r_pertamina_dex) * 100)?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Solar (<?php echo $kinerja_bulan[0]->solar?>/<?php echo $rencana_bulan[0]->r_solar?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->solar / $rencana_bulan[0]->r_solar) * 100)?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Bio Solar (<?php echo $kinerja_bulan[0]->bio_solar?>/<?php echo $rencana_bulan[0]->r_bio_solar?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->bio_solar / $rencana_bulan[0]->r_bio_solar) * 100)?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Own Use (<?php echo $kinerja_bulan[0]->own_use?>/<?php echo $rencana_bulan[0]->r_own_use?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->own_use / $rencana_bulan[0]->r_own_use) * 100)?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
