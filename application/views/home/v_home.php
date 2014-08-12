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
                        'Click and drag in the plot area to zoom in' :
                        'Sorot Grafik Untuk Zoom In'
            },
            xAxis: {
                type: 'datetime',
                minRange: 14 * 24 * 3600000 // fourteen days
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
                    pointStart: Date.UTC(2014, 0, 01),
                    data: [<?php
for ($i = 0; $i < 396; $i++) {
    echo rand(0, 10);
    if ($i != 1096)
        echo ",";
}
?>]
                }, {
                    type: 'spline',
                    name: 'KM',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014, 0, 01),
                    data: [<?php
for ($i = 0; $i < 396; $i++) {
    echo rand(0, 10);
    if ($i != 1096)
        echo ",";
}
?>]
                }]
        });
    });

    $(function() {
        $('#grafik1').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Grafik AMT'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' :
                        'Sorot Grafik Untuk Zoom In'
            },
            xAxis: {
                type: 'datetime',
                minRange: 14 * 24 * 3600000 // fourteen days
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
                    pointStart: Date.UTC(2014, 0, 01),
                    data: [<?php
for ($i = 0; $i < 396; $i++) {
    echo rand(0, 10);
    if ($i != 1096)
        echo ",";
}
?>]
                }, {
                    type: 'spline',
                    name: 'KM',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2014, 0, 01),
                    data: [<?php
for ($i = 0; $i < 396; $i++) {
    echo rand(0, 10);
    if ($i != 1096)
        echo ",";
}
?>]
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
                            47
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
                            80
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
                            87%
                        </h1>
                        <p>Traget KL</p>
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
                            123
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
                                        <td>Pegawai1 Hari ini Hidak masuk</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai2 Hari ini Hidak masuk</td>
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
                                        <td>Pegawai1 Hari ini Hidak masuk</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai2 Hari ini Hidak masuk</td>
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
                                        <td>Data AMT hari ini belum diinput</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Data AMT tgl 07-08-2014 belum diupload</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai1 Hari ini Hidak masuk</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai2 Hari ini Hidak masuk</td>
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
                            Kilo Liter Premium (70000/90000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax (95000/100000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Plus (75000/100000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Dex (80000/100000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-primary"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Solar (70000/100000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Bio Solar (90000/90000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Own Use (90000/100000 Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
