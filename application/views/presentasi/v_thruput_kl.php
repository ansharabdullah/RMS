<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Thruput KL'
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
                    data: [354384,411950]

                }]
        });
    });
    $(function () {
        $('#grafik2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Thruput KL'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            xAxis: {
                categories: [
                    '<?php echo $nama_depot?>'
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
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Januari',
                data: [14850],
                color:'#FF002B'

            }, {
                name: 'Februari',
                data: [13750],
                color:'#2C88D4'

            }, {
                name: 'Maret',
                data: [17250],
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
                                <div id="grafik"></div>
                    </div>
                    <div class="col-lg-8">
                                <div id="grafik2"></div>
                    </div>
                </div>
                <br/>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Thruput KL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>14.850</td>
                                </tr> 
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>13.750</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>17.250</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
        <?php echo $paging ?>
    </section>
</section>