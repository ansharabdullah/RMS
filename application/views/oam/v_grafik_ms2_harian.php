<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Sesuai Dengan MS2'
            },
            subtitle: {
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total (%)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    type: 'spline',
                    name: 'Premium',
                    data: [46,45,54,45,45,48,52,53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,46,48,49]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,54,47,45,48,52,53,47,48,49,52]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [46,52,50,46,47,48,49,52,51,48,47,47,48,46,52,50,46,47,48,49,52,48,47,47,48,49,48,47,47,48]
                }]
        });
    });
    $(function() {
        $('#grafik2').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Cepat (Sebelum Jadwal MS2)'
            },
            subtitle: {
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total (%)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    type: 'spline',
                    name: 'Premium',
                    data: [11,21,19,24,18,23,24,24,32,18,31,29,27,26,25,22,23,19,37,32,21,24,25,28,31,20,21,24,18,22]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [29,27,26,25,22,23,19,37,32,21,24,25,28,31,20,21,19,24,18,23,24,24,32,18,31,29,22,23,19,21]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [23,19,37,32,21,24,25,28,31,20,21,19,24,18,23,19,24,18,23,24,24,32,18,31,29,27,28,31,20,21]
                }]
        });
    });
    $(function() {
        $('#grafik3').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Lambat (Setelah Jadwal MS2)'
            },
            subtitle: {
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total (%)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    type: 'spline',
                    name: 'Premium',
                    data: [31,21,19,24,18,23,24,22,23,19,37,32,21,24,32,38,31,29,27,26,25,24,25,28,31,20,21,24,28,22]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [29,27,26,25,22,23,39,37,32,21,24,25,28,31,20,21,29,24,38,23,24,24,32,38,31,29,22,23,39,21]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [23,41,37,32,21,24,25,28,31,20,21,39,24,38,23,39,24,38,23,24,24,32,18,31,29,27,28,31,20,21]
                }]
        });
    });
    $(function() {
        $('#grafik4').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Tidak Terkirim Sesuai Jadwal MS2'
            },
            subtitle: {
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total (%)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    type: 'spline',
                    name: 'Premium',
                    data: [46,45,54,45,45,48,52,53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,46,48,49]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,54,47,45,48,52,53,47,48,49,52]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [46,52,50,46,47,48,49,52,51,48,47,47,48,46,52,50,46,47,48,49,52,48,47,47,48,49,48,47,47,48]
                }]
        });
    });
    $(function() {
        $('#grafik5').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'TOTAL LO'
            },
            subtitle: {
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total (%)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    type: 'spline',
                    name: 'Premium',
                    data: [100,90,93,95,98,100,98,99,90,100,98,96,98,100,100,99,96,100,97,98,100,95,94,100,98,97,93]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [100,98,96,98,100,100,99,96,100,97,98,100,95,94,100,93,95,98,100,98,99,90,100,98,96,98,100]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [100,100,99,96,100,97,98,100,99,98,100,98,97,93,98,96,98,100,100,99,96,100,97,98,100,98,99]
                }]
        });
    });

</script>


                        <div id="grafik"></div>
 </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik2"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik3"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik4"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik5"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body" >
                        <div id="filePreview">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel MS2 Complience Bulan Januari 2014
                                </header>
                                <div class="panel-body">
                                    <div class="adv-table editable-table" style="overflow-y: scroll">

                                        <div class="space15"></div>
                                        <table class="table table-bordered table-hover" id="editable-sample">   
                                            <thead>
                                                <tr>
                                                    <th style="display:none;"></th>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Tanggal</th>
                                                    <th colspan="3">Sesuai Dengan MS2</th>
                                                    <th colspan="3">Cepat (Sebelum MS2)</th>
                                                    <th colspan="3">Lebih Cepat (Sebelum Shift 1)</th>
                                                    <th colspan="3">Lambat (Setelah MS2)</th>
                                                    <th colspan="3">Tidak Terkirim Sesuai Jadwal MS2</th>
                                                    <th colspan="3">Total LO</th>
                                                </tr>
                                                <tr>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sesuai1 = array(46,45,54,45,45,48,52,53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,46,48,49);
                                                    $sesuai2 = array(53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,54,47,45,48,52,53,47,48,49,52);
                                                    $sesuai3 = array(46,52,50,46,47,48,49,52,51,48,47,47,48,46,52,50,46,47,48,49,52,48,47,47,48,49,48,47,47,48);
                                                    $sebelum1 = array(11,21,19,24,18,23,24,24,32,18,31,29,27,26,25,22,23,19,37,32,21,24,25,28,31,20,21,24,18,22);
                                                    $sebelum2 = array(29,27,26,25,22,23,19,37,32,21,24,25,28,31,20,21,19,24,18,23,24,24,32,18,31,29,22,23,19,21);
                                                    $sebelum3 = array(23,19,37,32,21,24,25,28,31,20,21,19,24,18,23,19,24,18,23,24,24,32,18,31,29,27,28,31,20,21);
                                                    $cepat1 = array(31,21,19,24,18,23,24,22,23,19,37,32,21,24,32,38,31,29,27,26,25,24,25,28,31,20,21,24,28,22);
                                                    $cepat2 = array(29,27,26,25,22,23,39,37,32,21,24,25,28,31,20,21,29,24,38,23,24,24,32,38,31,29,22,23,39,21);
                                                    $cepat3 = array(23,41,37,32,21,24,25,28,31,20,21,39,24,38,23,39,24,38,23,24,24,32,18,31,29,27,28,31,20,21);
                                                    $lambat1 = array(29,27,26,25,22,23,39,37,32,21,24,25,28,31,20,21,29,24,38,23,24,24,32,38,31,29,22,23,39,21);
                                                    $lambat2 =  array(31,21,19,24,18,23,24,22,23,19,37,32,21,24,32,38,31,29,27,26,25,24,25,28,31,20,21,24,28,22);
                                                    $lambat3 = array(23,41,37,32,21,24,25,28,31,20,21,39,24,38,23,39,24,38,23,24,24,32,18,31,29,27,28,31,20,21);
                                                    $gagal1 = array(46,45,54,45,45,48,52,53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,46,48,49);
                                                    $gagal2 = array(53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,54,47,45,48,52,53,47,48,49,52);
                                                    $gagal3 = array(46,52,50,46,47,48,49,52,51,48,47,47,48,46,52,50,46,47,48,49,52,48,47,47,48,49,48,47,47,48);
                                                    $total1 = array(100,90,93,95,98,100,98,99,90,100,98,96,98,100,100,99,96,100,97,98,100,95,94,100,98,97,93,98,96,98,100);
                                                    $total2 = array(100,98,96,98,100,100,99,96,100,97,98,100,95,94,100,93,95,98,100,98,99,90,100,98,96,98,100,97,98,100,98);
                                                    $total3 = array(100,100,99,96,100,97,98,100,99,98,100,98,97,93,98,96,98,100,100,99,96,100,97,98,100,98,99,99,96,100,97);
                                                    for($i = 0 ; $i < 30 ; $i++)
                                                    {
                                                    ?>
                                                        <tr class="">
                                                            <td style="display:none;"></td>
                                                            <td><?php echo ($i + 1)?></td>
                                                            <td style="white-space: nowrap"><?php echo ($i + 1)?> Januari 2014</td>
                                                            <td><?php echo $sesuai1[$i]?>%</td>
                                                            <td><?php echo $sesuai2[$i]?>%</td>
                                                            <td><?php echo $sesuai3[$i]?>%</td>
                                                            <td><?php echo $sebelum1[$i]?>%</td>
                                                            <td><?php echo $sebelum2[$i]?>%</td>
                                                            <td><?php echo $sebelum3[$i]?>%</td>
                                                            <td><?php echo $cepat1[$i]?>%</td>
                                                            <td><?php echo $cepat2[$i]?>%</td>
                                                            <td><?php echo $cepat3[$i]?>%</td>
                                                            <td><?php echo $lambat1[$i]?>%</td>
                                                            <td><?php echo $lambat2[$i]?>%</td>
                                                            <td><?php echo $lambat3[$i]?>%</td>
                                                            <td><?php echo $gagal1[$i]?>%</td>
                                                            <td><?php echo $gagal2[$i]?>%</td>
                                                            <td><?php echo $gagal3[$i]?>%</td>
                                                            <td><?php echo $total1[$i]?>%</td>
                                                            <td><?php echo $total2[$i]?>%</td>
                                                            <td><?php echo $total3[$i]?>%</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
                <!-- page end-->