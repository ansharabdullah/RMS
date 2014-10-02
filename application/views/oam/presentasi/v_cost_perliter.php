<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cost Per Liter'
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
                    name: 'Cost Per Liter',
                    data: [7,3.5]

                }]
        });
    });
    $(function () {
        $('#grafik2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cost Liter'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            xAxis: {
                categories: [
                    'Panjang',
                    'Lahat',
                    'Baturaja',
                    'SUMBAGSEL APMS'
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
                name: 'Januari',
                data: [6,3.5,4.4,0.10],
                color:'#FF002B'

            }, {
                name: 'Februari',
                data: [4.3,4.6,5.9,0.32],
                color:'#2C88D4'

            }, {
                name: 'Maret',
                data: [4.0,5.2,4.9,0.10],
                color:'#23C906'

            }]
        });
    });
</script>
<section id="main-content" >
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
                                <div id="grafik"  style="height:300px;"></div>
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
                                    <th>Panjang</th>
                                    <th>Lahat</th>
                                    <th>Baturaja</th>
                                    <th>SUMBAGSEL APMS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>6</td>
                                    <td>3,5</td>
                                    <td>4,4</td>
                                    <td>0,10</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>4,3</td>
                                    <td>4,6</td>
                                    <td>5,9</td>
                                    <td>0,32</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>4,0</td>
                                    <td>5,2</td>
                                    <td>4,9</td>
                                    <td>0,10</td>
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