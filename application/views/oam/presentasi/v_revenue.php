<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Revenue'
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
                    data: [1953552,4594879]

                }]
        });
    });
    $(function () {
        $('#grafik2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Revenue'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            xAxis: {
                categories: [
                    'Lahat',
                    'Baturaja',
                    'Panjang',
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
                data: [49132,69174,551468,865535],
                color:'#FF002B'

            }, {
                name: 'Februari',
                data: [46053,61552,513797,850069],
                color:'#2C88D4'

            }, {
                name: 'Maret',
                data: [51273,69847,620478,846500],
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
                KPI OPERASIONAL
            </header>
            <div class="panel-body">
                <div class="row">
                   
                    <div class="col-lg-4">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik"></div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-8">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik2"></div>
                            </div>
                        </section>
                    </div>
                </div>
                <br/><br/>
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
                                    <td>49.132</td>
                                    <td>69.174</td>
                                    <td>551.468</td>
                                    <td>865.535</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>46.053</td>
                                    <td>61.552</td>
                                    <td>513.797</td>
                                    <td>850.069</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>51.273</td>
                                    <td>69.847</td>
                                    <td>620.478</td>
                                    <td>846.500</td>
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