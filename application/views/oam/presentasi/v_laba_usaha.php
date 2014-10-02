<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laba Usaha OAM RKAP VS Realisasi'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            xAxis: {
                categories: [
                    'OAM RKAP',
                    'Fuel Ritel Realisasi'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
               
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Revenue',
                    data: [57365,293575]

                }]
        });
    });
    $(function () {
        $('#grafik2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laba Usaha'
            },
            xAxis: {
                categories: [
                    'Lahat',
                    'Baturaja',
                    'Panjang',
                    'SUMBAGSEL APMS'
                ]
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Januari',
                data: [-66542,17664,13105,18026],
                color:'#FF002B'

            }, {
                name: 'Februari',
                data: [102974,7625,-5922,17208],
                color:'#2C88D4'

            }, {
                name: 'Maret',
                data: [159595,2641,6734,20466],
                color:'#23C906'

            }]
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                KPI INTERNAL
                <a href="<?php echo base_url()?>presentasi"><button style="float: right" class="btn-danger"><i class="icon-remove"></i></button></a>
            </header>
            <div class="panel-body">
                <div class="row">
                   
                    <div class="col-lg-4">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik" style="height:300px;"></div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-8">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik2" style="height:300px;"></div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Lahat</th>
                                    <th>Baturaja</th>
                                    <th>Panjang</th>
                                    <th>SUMBAGSEL APMS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>(66.542)</td>
                                    <td>17.664</td>
                                    <td>13.105</td>
                                    <td>18.026</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>102.974</td>
                                    <td>7.625</td>
                                    <td>(5.922)</td>
                                    <td>17.208</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>159.595</td>
                                    <td>2.641</td>
                                    <td>6.734</td>
                                    <td>20.466</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
        <?php echo $paging ?>
            </div>
        </section>
    </section>
</section>