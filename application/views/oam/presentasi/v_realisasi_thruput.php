<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'spline',
                zoomType:'xy'
            },
            title: {
                text: 'Volume Angkutan VS Realisasi Thruput',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Januari','Februari','Maret']
            },
            yAxis: {
                title: {
                    text: 'volume'
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
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Panjang',
                data: [99.57,99.72,99.91]
            }, {
                name: 'Lahat',
                data: [100.02,101.07,101.14]
            }, {
                name: 'Baturaja',
                data: [102.06,101.14,99.91]
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
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Wilayah</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td>Panjang</td>
                                    <td>99,57</td>
                                    <td>99,72</td>
                                    <td>99,91</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Lahat</td>
                                    <td>100,02</td>
                                    <td>101,07</td>
                                    <td>101,14</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Baturaja</td>
                                    <td>102,06</td>
                                    <td>101,14</td>
                                    <td>99,91</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
        <?php echo $paging?>
    </section>
</section>