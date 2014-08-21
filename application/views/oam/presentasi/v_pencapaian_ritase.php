<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pencapaian Ritase'
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
                data: [2.47,2.20,2.68],
                color:'#FF002B'

            }, {
                name: 'Lahat',
                data: [4.97,2.92,1.87],
                color:'#2C88D4'

            }, {
                name: 'Panjang',
                data: [1.84,1.84,1.94],
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
                                    <td>2,47</td>
                                    <td>2,20</td>
                                    <td>2,68</td>
                                </tr> 
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>4,97</td>
                                    <td>2,92</td>
                                    <td>1,87</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>1,84</td>
                                    <td>1,84</td>
                                    <td>1,94</td>
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