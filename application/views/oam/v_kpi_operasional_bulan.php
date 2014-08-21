<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'column'
            },
            title: {
                text: 'KPI Operasional',
                x: -20 //center
            },
            subtitle: {
                text: 'Kategori Bulan',
                x: -20
            }, 
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>kpi/operasional_depot/2014/1/"+(this.index + 1);
                        }
                    }
                }
            },
            xAxis: {
                categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus']
            },
            yAxis: {
                title: {
                    text: 'rata - rata'
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
            series: [{
                    name: 'Depot 1',
                    data: [106,104,107,105,100,102,105,101],
                    color:'#FF002B'
                }, {
                    name: 'Depot 2',
                    data: [109,102,99,106,102,105,101,104],
                    color:'#2C88D4'
                }, {
                    name: 'Depot 3',
                    data: [103,105,104,102,105,101,106,108],
                    color:'#23C906'
                }, {
                    name: 'Depot 4',
                    data: [109,107,106,105,108,106,108,107]
                }, {
                    name: 'Depot 5',
                    data: [103,106,105,108,106,108,105,104],
                    color:'#F5A905'
               
                }]
        });
    });
    $(function () {
        $('#grafik2').highcharts({
            chart:{
                type:'spline',
                zoomType:'xy'
            },
            title: {
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance)',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus']
            },
            yAxis: {
                title: {
                    text: 'nilai'
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
            series: [{
                    name: 'Depot 1',
                    data: [101,102,101,100,99,101,102,101],
                    color:'#FF002B'
                }, {
                    name: 'Depot 2',
                    data: [99,101,102,101,101,98,100,101],
                    color:'#2C88D4'
                }, {
                    name: 'Depot 3',
                    data: [101,102,101,101,99,100,101,102],
                    color:'#23C906'
                }, {
                    name: 'Depot 4',
                    data: [102,103,99,100,102,102,99,101]
                }, {
                    name: 'Depot 5',
                    data: [103,99,100,102,102,99,101,100],
                    color:'#F5A905'
               
                }]
        });
    });
    $(function () {
        $('#grafik3').highcharts({
            chart:{
                type:'spline',
                zoomType:'xy'
            },
            title: {
                text: 'Volume Angkutan vs Realisasi Thruput',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus']
            },
            yAxis: {
                title: {
                    text: 'nilai'
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
            series: [{
                    name: 'Depot 1',
                    data: [103,99,100,102,102,99,101,100],
                    color:'#FF002B'
                }, {
                    name: 'Depot 2',
                    data: [99,101,102,101,101,98,100,101],
                    color:'#2C88D4'
                }, {
                    name: 'Depot 3',
                    data: [101,102,101,101,99,100,101,102],
                    color:'#23C906'
                }, {
                    name: 'Depot 4',
                    data: [101,102,101,100,99,101,102,101]
                }, {
                    name: 'Depot 5',
                    data: [102,103,99,100,102,102,99,101],
                    color:'#F5A905'
               
                }]
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                KPI OPERASIONAL
            </header>
            <div class="panel-body">
                <div id="grafik"></div>
                <br/><br/>
                <div class="row">

                    <div class="col-lg-6">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik2"></div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik3"></div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Depot</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Depot 1</td>
                                    <td>106</td>
                                    <td>106</td>
                                    <td>106</td>
                                    <td>106</td>
                                    <td>106</td>
                                    <td>106</td>
                                    <td>106</td>
                                    <td>106</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Depot 2</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Depot 3</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Depot 4</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                    <td>109</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Depot 5</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                    <td>103</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
    </section>
</section>