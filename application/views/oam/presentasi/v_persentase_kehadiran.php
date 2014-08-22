<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'line',
                zoomType:'xy'
            },
            title: {
                text: 'Persentase Kehadiran',
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
                    text: ''
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: '%'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                    name: 'Baturaja',
                    data: [96,83,89]
                },   {
                    name: 'Lahat',
                    data: [74,74,75]
                }, {
                    name: 'Panjang',
                    data: [97,102,101]
                },   {
                    name: 'target',
                    data: [100,100,100],
                    color: 'red'
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
                            <tr>
                                <td style="display: none;"></td>
                                <td>1</td>
                                <td>Lahat</td>
                                <td>96%</td>
                                <td>83%</td>
                                <td>89%</td>
                            </tr>
                            <tr>
                                <td style="display: none;"></td>
                                <td>2</td>
                                <td>Baturaja</td>
                                <td>74%</td>
                                <td>74%</td>
                                <td>75%</td>
                            </tr>
                            <tr>
                                <td style="display: none;"></td>
                                <td>3</td>
                                <td>Panjang</td>
                                <td>97%</td>
                                <td>102%</td>
                                <td>101%</td>
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