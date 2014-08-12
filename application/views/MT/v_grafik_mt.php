<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
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
                borderWidth: 1
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>mt/grafik_bulan_mt";
                        }
                    }
                }
            },
            series: [{
                    name: 'KM',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'KL',
                    data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'RIT',
                    data: [1, 0.8, 2, 11.3, 7, 12, 26, 24.1, 22, 10, 8, 2]
                }, {
                    name: 'Premium',
                    data: [0.1, 0.5, 2.5, 6.4, 10.5, 12.0, 18.6, 17.2, 14.3, 11.0, 3.9, 2.0]
                }, {
                    name: 'Pertamax',
                    data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'Pertamax Plus',
                    data: [1, 0.8, 2, 11.3, 7, 12, 26, 24.1, 22, 10, 8, 2]
                }, {
                    name: 'Pertamax Dex',
                    data: [0.1, 0.5, 2.5, 6.4, 10.5, 12.0, 18.6, 17.2, 14.3, 11.0, 3.9, 2.0]
                }, {
                    name: 'Solar',
                    data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'Bio Solar',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
        });
    });

    
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik"></div>
                        <div class="adv-table editable-table " style="margin-top: 50px;">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Kilometer (KM)</th>
                                        <th>Kiloliter (KL)</th>
                                        <th>Ritase (Rit)</th>
                                        <th>Premium</th>
                                        <th>Pertamax</th>
                                        <th>Pertamax Plus</th>
                                        <th>Pertamax Dex</th>
                                        <th>Solar</th>
                                        <th>Bio Solar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    $km = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
                                    $kl = array(0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5);
                                    $rit = array(1, 0.8, 2, 11.3, 7, 12, 26, 24.1, 22, 10, 8, 2);
                                    $premium = array(0.1, 0.5, 2.5, 6.4, 10.5, 12.0, 18.6, 17.2, 14.3, 11.0, 3.9, 2.0);
                                    $pertamax = array(0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0);
                                    $pertamaxplus = array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8);
                                    $pertamaxdex = array(2.8, 3.9, 4.7, 7.5, 9.9, 13.2, 15.0, 12.6, 10.2, 11.3, 4.6, 2.8);
                                    $solar = array(3.1, 3.0, 2.3, 4.5, 12.2, 14.2, 17.3, 18.6, 20.2, 17.3, 12.6, 6.8);
                                    $biosolar = array(1.9, 2.2, 3.7, 5.5, 3.9, 10.2, 12.0, 18.6, 15.2, 12.3, 9.6, 10.8);

                                    for ($i = 0; $i < 12; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $bulan[$i] ?></td>
                                            <td><?php echo $km[$i] ?></td>
                                            <td><?php echo $kl[$i] ?></td>
                                            <td><?php echo $rit[$i] ?></td>
                                            <td><?php echo $premium[$i] ?></td>
                                            <td><?php echo $pertamax[$i] ?></td>
                                            <td><?php echo $pertamaxplus[$i] ?></td>
                                            <td><?php echo $pertamaxdex[$i] ?></td>
                                            <td><?php echo $solar[$i] ?></td>
                                            <td><?php echo $biosolar[$i] ?></td>
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
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
</script>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
            ${demo.css}
        </style>
        <script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: 'Snow depth at Vikjafjellet, Norway'
                    },
                    subtitle: {
                        text: 'Irregular time data in Highcharts JS'
                    },
                    xAxis: {
                        type: 'datetime',
                        dateTimeLabelFormats: { // don't display the dummy year
                            month: '%e. %b',
                            year: '%b'
                        },
                        title: {
                            text: 'Date'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Snow depth (m)'
                        },
                        min: 0
                    },
                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br>',
                        pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
                    },

                    series: [{
                            name: 'Winter 2007-2008',
                            // Define the data points. All series have a dummy year
                            // of 1970/71 in order to be compared on the same x axis. Note
                            // that in JavaScript, months start at 0 for January, 1 for February etc.
                            data: [
                                [Date.UTC(1970,  9, 27), 0   ],
                                [Date.UTC(1970, 10, 10), 0.6 ],
                                [Date.UTC(1970, 10, 18), 0.7 ],
                                [Date.UTC(1970, 11,  2), 0.8 ],
                                [Date.UTC(1970, 11,  9), 0.6 ],
                                [Date.UTC(1970, 11, 16), 0.6 ],
                                [Date.UTC(1970, 11, 28), 0.67],
                                [Date.UTC(1971,  0,  1), 0.81],
                                [Date.UTC(1971,  0,  8), 0.78],
                                [Date.UTC(1971,  0, 12), 0.98],
                                [Date.UTC(1971,  0, 27), 1.84],
                                [Date.UTC(1971,  1, 10), 1.80],
                                [Date.UTC(1971,  1, 18), 1.80],
                                [Date.UTC(1971,  1, 24), 1.92],
                                [Date.UTC(1971,  2,  4), 2.49],
                                [Date.UTC(1971,  2, 11), 2.79],
                                [Date.UTC(1971,  2, 15), 2.73],
                                [Date.UTC(1971,  2, 25), 2.61],
                                [Date.UTC(1971,  3,  2), 2.76],
                                [Date.UTC(1971,  3,  6), 2.82],
                                [Date.UTC(1971,  3, 13), 2.8 ],
                                [Date.UTC(1971,  4,  3), 2.1 ],
                                [Date.UTC(1971,  4, 26), 1.1 ],
                                [Date.UTC(1971,  5,  9), 0.25],
                                [Date.UTC(1971,  5, 12), 0   ]
                            ]
                        }, {
                            name: 'Winter 2008-2009',
                            data: [
                                [Date.UTC(1970,  9, 18), 0   ],
                                [Date.UTC(1970,  9, 26), 0.2 ],
                                [Date.UTC(1970, 11,  1), 0.47],
                                [Date.UTC(1970, 11, 11), 0.55],
                                [Date.UTC(1970, 11, 25), 1.38],
                                [Date.UTC(1971,  0,  8), 1.38],
                                [Date.UTC(1971,  0, 15), 1.38],
                                [Date.UTC(1971,  1,  1), 1.38],
                                [Date.UTC(1971,  1,  8), 1.48],
                                [Date.UTC(1971,  1, 21), 1.5 ],
                                [Date.UTC(1971,  2, 12), 1.89],
                                [Date.UTC(1971,  2, 25), 2.0 ],
                                [Date.UTC(1971,  3,  4), 1.94],
                                [Date.UTC(1971,  3,  9), 1.91],
                                [Date.UTC(1971,  3, 13), 1.75],
                                [Date.UTC(1971,  3, 19), 1.6 ],
                                [Date.UTC(1971,  4, 25), 0.6 ],
                                [Date.UTC(1971,  4, 31), 0.35],
                                [Date.UTC(1971,  5,  7), 0   ]
                            ]
                        }, {
                            name: 'Winter 2009-2010',
                            data: [
                                [Date.UTC(1970,  9,  9), 0   ],
                                [Date.UTC(1970,  9, 14), 0.15],
                                [Date.UTC(1970, 10, 28), 0.35],
                                [Date.UTC(1970, 11, 12), 0.46],
                                [Date.UTC(1971,  0,  1), 0.59],
                                [Date.UTC(1971,  0, 24), 0.58],
                                [Date.UTC(1971,  1,  1), 0.62],
                                [Date.UTC(1971,  1,  7), 0.65],
                                [Date.UTC(1971,  1, 23), 0.77],
                                [Date.UTC(1971,  2,  8), 0.77],
                                [Date.UTC(1971,  2, 14), 0.79],
                                [Date.UTC(1971,  2, 24), 0.86],
                                [Date.UTC(1971,  3,  4), 0.8 ],
                                [Date.UTC(1971,  3, 18), 0.94],
                                [Date.UTC(1971,  3, 24), 0.9 ],
                                [Date.UTC(1971,  4, 16), 0.39],
                                [Date.UTC(1971,  4, 21), 0   ]
                            ]
                        }]
                });
            });
    

        </script>
    </head>
    <body>
        <script src="../../js/highcharts.js"></script>
        <script src="../../js/modules/exporting.js"></script>

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </body>
</html>
