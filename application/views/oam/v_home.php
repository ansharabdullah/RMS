<script type="text/javascript">
    $(document).ready(function(){
        //        $("#amtMtBody").hide();
        $("#ms2VolumeBody").hide();
        $("#rencanaBody").hide();
        $("#indikatorKpiBody").hide();
    });
    function showPanel(index)
    {
        if(index == 1){
            $("#amtMtBody").toggle("fast");
        }
        else if(index == 2){
            $("#ms2VolumeBody").toggle("fast");
        }
        else if(index == 3){
            $("#rencanaBody").toggle("fast");
        }
        else if(index == 4){
            $("#indikatorKpiBody").toggle("fast");
        }
    }
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
            <div class="col-lg-12">

                <section class="panel">
                    <a style="cursor: pointer" onclick="showPanel(1)"><div class="revenue-head" style="background-color:teal;">
                            <span style="background-color:teal;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Grafik AMT & MT Perdepot</h3>
                            <span class="rev-combo pull-right" style="background-color:teal;">
                                Agustus 2014
                            </span>
                        </div></a>
                    <div class="panel-body" id="amtMtBody">
                        <section class="panel" >
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter AMT<i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('KM')">KM</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('KL')">KL</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('Ritase')">Ritase</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('SPBU')">SPBU</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('Jumlah Hadir')">Jumlah Hadir</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('Jumlah Tidak Hadir')">Jumlah Tidak Hadir</a></li>
                                </ul>
                            </div>
                            <center>
                                <div id="grafikAmt" style="width: 1000px"></div>
                            </center>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter MT<i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('KM')">KM</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('KL')">KL</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Ritase')">Ritase</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Premium')">Premium</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Pertamax')">Pertamax</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Pertamax Plus')">Pertamax Plus</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Pertamax Dex')">Pertamax Dex</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Solar')">Solar</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Bio Solar')">Bio Solar</a></li>
                                </ul>
                            </div>
                            <center>
                                <div id="grafikMt" style="width: 1000px"></div>
                            </center>
                        </section>
                    </div>
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <section class="panel">
                    <a style="cursor: pointer" onclick="showPanel(3)"><div class="revenue-head" style="background-color:#d9534f;">
                            <span style="background-color:#d9534f;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Realisasi dari Rencana</h3>
                            <span class="rev-combo pull-right" style="background-color:#d9534f;">
                                Agustus 2014
                            </span>
                        </div></a>
                    <div class="panel-body" id="rencanaBody">
                        <section class="panel" >
                            <div class="row">
                                <div class="col-lg-4">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Realisasi dari Rencana Tahun Ini
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
                                <div class="col-lg-4">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Realisasi dari Rencana Hari Ini
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
                    </div>
                </section>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <section class="panel">
                    <a style="cursor: pointer" onclick="showPanel(2)"><div class="revenue-head" style="background-color:steelblue;">
                            <span style="background-color:steelblue;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Grafik KPI MS2 & Volume Perdepot</h3>
                            <span class="rev-combo pull-right" style="background-color:steelblue;">
                                Agustus 2014
                            </span>
                        </div></a>
                    <div class="panel-body" id="ms2VolumeBody">
                        <section class="panel" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikPengiriman" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-5">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikVolume" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <section class="panel">
                    <a style="cursor: pointer" onclick="showPanel(4)"><div class="revenue-head" style="background-color:darkorange;">
                            <span style="background-color:darkorange;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Grafik Indikator KPI Perdepot</h3>
                            <span class="rev-combo pull-right" style="background-color:darkorange;">
                                Agustus 2014
                            </span>
                        </div></a>
                    <div class="panel-body" id="indikatorKpiBody">
                        <section class="panel" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikTagihan" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-lg-5">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikCustomer" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikKeluhan" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-5">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikPenyelesaian" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikPelatihan" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-5">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikIncidents" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikPenyelesaianIncidents" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-5">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div id="grafikAccident" style="width: 500px"></div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                    </div>

                </section>

                </section>

            </div>
        </div>
    </section>
</section>
<script src="<?php echo base_url() ?>assets/js/grouped-categories.js"></script>
<script type="text/javascript">
    var amt;
    var mt;
    $(function() {
        $('#grafikPengiriman').highcharts({
            chart: {
                zoomType:'y'
            },
            title: {
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance)'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/1";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],
           

            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [92]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [95]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [101]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [89]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [99]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [94,92,94,99,100],
                    color: '#CD0000',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#CD0000',
                        fillColor: '#CD0000'
                    }
                }]
        });
    });

    $(function() {
        $('#grafikVolume').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Rencana volume angkutan vs realisasi'
            },
            
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [92]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [95]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [101]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [89]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [99]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [94,92,94,99,100],
                    color: '#171EE6',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#171EE6',
                        fillColor: '#171EE6'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikTagihan').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Laporan tagihan ongkos angkut'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/3";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [92]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [95]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [101]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [89]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [99]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [94,92,94,99,100],
                    color: '#CD0000',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#CD0000',
                        fillColor: '#CD0000'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikCustomer').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Customer  Satisfaction (Lembaga Penyalur)'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/4";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [4.2]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [3.7]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [4.1]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [3.9]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [4.3]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [3.8,3.8,3.8,3.8,3.8],
                    color: '#49EB5E',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#49EB5E',
                        fillColor: '#49EB5E'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikKeluhan').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Jumlah temuan, keluhan atau komplain terkait pengelolaan MT'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/5";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [4]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [2]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [6]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [3]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [4]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [5,5,5,5,5],
                    color: '#EBDE28',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#EBDE28',
                        fillColor: '#EBDE28'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikPenyelesaian').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Tindak lanjut penyelesaian keluhan atau komplain yang diterima'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/6";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [92]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [95]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [101]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [89]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [99]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [94,92,94,99,100],
                    color: '#CD0000',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#CD0000',
                        fillColor: '#CD0000'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikPelatihan').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Jumlah pekerja pengelola MT  yang mengikuti pelatihan'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/7";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [4]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [7]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [6]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [3]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [5]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [5,5,5,5,5],
                    color: '#5BAD32',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#5BAD32',
                        fillColor: '#5BAD32'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikIncidents').highcharts({
            chart: {
                zoomType: 'y'
            },
            title: {
                text: 'Number of Incidents'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/8";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [1]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [2]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [2]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [1]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [1]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [0,0,0,0,0],
                    color: '#0E50C9',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#0E50C9',
                        fillColor: '#0E50C9'
                    }
                }]
        });
    });
                    
    $(function() {
        $('#grafikPenyelesaianIncidents').highcharts({
            chart: {
                zoomType: 'x',
                type: 'column'
            },
            title: {
                text: 'Waktu penyelesaian Incidents'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/9";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [8]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [7]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [7]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [8]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [9]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [7,7,7,7,7,7,7],
                    color: '#945E12',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#945E12',
                        fillColor: '#945E12'
                    }
                }]
        });
    });
    $(function() {
        $('#grafikAccident').highcharts({
            chart: {
                zoomType: 'x',
                type: 'column' 
            },
            title: {
                text: ' Number of Accident'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }  ,
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_bulan/10";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['2014'],
                    gridLineWidth: 0
                },{
                    categories:['Target Depot 1','Target Depot 2','Target Depot 3','Target Depot 4','Target Depot 5'],
                    opposite:true,
                    labels: {
                        enabled:false
                    }
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Realisasi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    if (this.series.name) { // the pie chart
                        s = '' + this.series.name + ': ' + this.y;
                    } else {
                        s = '' + this.x + ': ' + this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'column',
                    name: 'Depot 1',
                    data: [1]
                }, {
                    type: 'column',
                    name: 'Depot 2',
                    data: [2]
                }, {
                    type: 'column',
                    name: 'Depot 3',
                    data: [2]
                }, {
                    type: 'column',
                    name: 'Depot 4',
                    data: [0]
                }, {
                    type: 'column',
                    name: 'Depot 5',
                    data: [1]

                }
                ,{
                    type: 'line',
                    name: 'Target',
                    yAxis: 0,
                    xAxis:1,
                    data: [0,0,0,0,0],
                    color: '#169412',
                    marker: {
                        lineWidth: 1,
                        lineColor: '#169412',
                        fillColor: '#169412'
                    }
                }]
        });
    });
     
    $(function () {
        amt = new Highcharts.Chart({ 
            chart: {
                type: 'bar',
                renderTo: 'grafikAmt'
            },
            title: {
                text: 'Grafik AMT Indikator KM'
            },
            subtitle: {
                text: 'Source: Wikipedia.org'
            },
            xAxis: {
                categories: ['2014'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
           
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }, 
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>amt/oam_bulanan/";
                        }
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Depot 1',
                    data: [107]
                }, {
                    name: 'Depot 2',
                    data: [133]
                }, {
                    name: 'Depot 3',
                    data: [97]
                }, {
                    name: 'Depot 4',
                    data: [97]
                }, {
                    name: 'Depot 5',
                    data: [97]
                }]
        });
    });
    $(function () {
        mt = new Highcharts.Chart({ 
            chart: {
                type: 'bar',
                renderTo: 'grafikMt'
            },
            title: {
                text: 'Grafik MT Indikator KM'
            },
            subtitle: {
                text: 'Source: Wikipedia.org'
            },
            xAxis: {
                categories: ['2014'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ''
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }, 
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>mt/oam_bulanan/";
                        }
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Depot 1',
                    data: [107]
                }, {
                    name: 'Depot 2',
                    data: [133]
                }, {
                    name: 'Depot 3',
                    data: [97]
                }, {
                    name: 'Depot 4',
                    data: [97]
                }, {
                    name: 'Depot 5',
                    data: [97]
                }]
        });
    });
    function changeAmtTitle(title)
    {
        amt.setTitle({text: "Grafik AMT Indikator " + title});       
        $("#grafikAmt").hide();
        $("#grafikAmt").slideDown("slow");
    }
    function changeMtTitle(title)
    {
        mt.setTitle({text: "Grafik MT Indikator " + title});       
        $("#grafikMt").hide();
        $("#grafikMt").slideDown("slow");
    }
</script>