<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pencapaian KM'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            xAxis: {
                categories: [
                    'Januari',
                    'Februari',
                    'Maret'
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
                name: 'Baturaja',
                data: [185.07,190.55,214.35],
                color:'#FF002B'

            }, {
                name: 'Lahat',
                data: [238.66,191.13,161.07],
                color:'#2C88D4'

            }, {
                name: 'Panjang',
                data: [305.14,333.51,332.82],
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
            </header>
            <div class="panel-body">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik"></div>
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
                                    <th>Panjang</th>
                                    <th>Lahat</th>
                                    <th>Baturaja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>185,07</td>
                                    <td>190,55</td>
                                    <td>214,35</td>
                                </tr> 
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>238,66</td>
                                    <td>191,13</td>
                                    <td>161,07</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>305,14</td>
                                    <td>333,51</td>
                                    <td>332,82</td>
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