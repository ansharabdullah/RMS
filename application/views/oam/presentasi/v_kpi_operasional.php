<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'spline',
                zoomType:'xy'
            },
            title: {
                text: 'KPI Operasional',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Rata - rata 2013','Januari','Februari','Maret']
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
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Panjang',
                data: [100,106,107,107]
            }, {
                name: 'Lahat',
                data: [105,109,101,101]
            }, {
                name: 'Baturaja',
                data: [107,103,103,103]
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
                                    <th>Rata - Rata 2013</th>
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
                                    <td>100</td>
                                    <td>106</td>
                                    <td>107</td>
                                    <td>107</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Lahat</td>
                                    <td>105</td>
                                    <td>109</td>
                                    <td>101</td>
                                    <td>101</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Baturaja</td>
                                    <td>107</td>
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
        <?php echo $paging?>
    </section>
</section>