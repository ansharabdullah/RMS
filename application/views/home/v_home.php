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
            title: {
                text: 'Grafik Awak Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                borderWidth: 1
            },
            series: [{
                    name: 'KM',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'KL',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'RIT',
                    data: [1, 0.8, 2, 11.3, 3, 12, 26, 24.1, 22, 10, 8, 2]
                }, {
                    name: 'SPBU',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'Jml Hadir',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'Jml Tidak Hadir',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
        });
    });

    $(function() {
        $('#grafik1').highcharts({
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: '2014',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                borderWidth: 1
            },
            series: [{
                    name: 'KM',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'KL',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'RIT',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'Own Use',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }, {
                    name: 'Premium',
                    data: [3.9, 4.2, 5.7, 8.5, 12.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }, {
                    name: 'Pertamax',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 09.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }, {
                    name: 'Pertamax Plus',
                    data: [3.9, 4.2, 5.7, 12.0, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }, {
                    name: 'Pertamax Dex',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 20, 14.2, 10.3, 6.6, 4.8]
                }, {
                    name: 'Solar',
                    data: [3.9, 4.2, 5.7, 8.5, 13, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }, {
                    name: 'Bio Solar',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 14, 16.6, 14.2, 10.3, 6.6, 4.8]
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
                            Kilo Liter Premium
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Plus
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Dex
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-primary"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Solar
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Bio Solar
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Own Use
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
