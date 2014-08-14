<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType:'xy'
            },
            title: {
                text: 'Key Performance Indicator (KPI) Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }
            },
            xAxis: [{
                    categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus'],
                    gridLineWidth: 0
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Performansi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    s = '' + this.series.name + ': ' + this.y + ' %';
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'spline',
                    name: 'Rencana pengiriman vs realisasi (MS2 Compliance',
                    data: [92,99,101,98,95,92,89,90]
                }, {
                    type: 'spline',
                    name: 'Rencana volume angkutan vs realisasi',
                    data: [98,89,92,97,100,98,99,96]
                }, {
                    type: 'spline',
                    name: 'Laporan tagihan ongkos angkut ',
                    data: [92,98,94,98,98,95,92,94]
                }, {
                    type: 'spline',
                    name: 'Customer  Satisfaction (Lembaga Penyalur)',
                    data: [98,98,95,92,94,89,92,95]
                }, {
                    type: 'spline',
                    name: 'Jumlah temuan, keluhan atau komplain terkait pengelolaan MT',
                    data: [95,92,94,89,92,95,92,99]
                },{
                    type: 'spline',
                    name: 'Tindak lanjut penyelesaian keluhan atau komplain yang diterima',
                    data: [94,89,92,95,97,98,94,98]
                }, {
                    type: 'spline',
                    name: 'Jumlah pekerja pengelola MT  yang mengikuti pelatihan',
                    data: [94,98,98,95,92,96,94,97]
                }, {
                    type: 'spline',
                    name: 'Number of Incidents',
                    data: [93,89,94,96,92,98,99,94]
                }, {
                    type: 'spline',
                    name: 'Waktu penyelesaian Incidents',
                    data: [93,92,96,99,91,96,98,94]
                }, {
                    type: 'spline',
                    name: ' Number of Accident',
                    data: [94,89,92,95,92,99,92,98]
                
                }]
        });
    });
    $(function() {
        $('#grafik2').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance) Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                        events: {
                            click: function(event) {
                                window.location = "<?php echo base_url() ?>depot/grafik_hari";
                            }
                        }
                    }
            },
            xAxis: [{
                    categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus']
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
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
                    name: 'Realisasi',
                    type: 'column',
                    data: [92,99,101,98,95,92,89,90]

                }, {
                    name: 'Target',
                    type: 'spline',
                    data: [91,98,95,96,97,95,85,89]
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
                    <header class="panel-heading">
                        Grafik Bulanan Depot 1
                    </header>
                    <div class="panel-body" >
                        <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm">

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <select class="form-control m-bot2"  id="jenis" >

                                        <option value="">Rencana pengiriman vs realisasi (MS2 Compliance)</option>
                                        <option value="">Rencana volume angkutan vs realisasi</option>
                                        <option value="">Laporan tagihan ongkos angkut </option>
                                        <option value="">Customer  Satisfaction (Lembaga Penyalur)</option>
                                        <option value="">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</option>
                                        <option value="">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</option>
                                        <option value="">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</option>
                                        <option value="">Number of Incidents</option>
                                        <option value="">Waktu penyelesaian Incidents</option>
                                        <option value="">Number of Accident</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="tahun" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
                        <!--<div class="btn-group pull-left">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a href="#" onclick="">Rencana pengiriman vs realisasi (MS2 Compliance)</a></li>
                                <li><a href="#" onclick="">Rencana volume angkutan vs realisasi</a></li>
                                <li><a href="#" onclick="">Laporan tagihan ongkos angkut </a></li>
                                <li><a href="#" onclick="">Customer  Satisfaction (Lembaga Penyalur)</a></li>
                                <li><a href="#" onclick="">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</a></li>
                                <li><a href="#" onclick="">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</a></li>
                                <li><a href="#" onclick="">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</a></li>
                                <li><a href="#" onclick="">Number of Incidents</a></li>
                                <li><a href="#" onclick="">Waktu penyelesaian Incidents</a></li>
                                <li><a href="#" onclick="">Number of Accident</a></li>
                            </ul>
                        </div>-->
                        <br/><br/>
                        <div id="grafik2"></div>

                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <header class="panel-heading">
                            Key Performance Indicator (KPI) Depot 1 (Tahun 2014)
                        </header>
                        <div class="adv-table editable-table " style="overflow: scroll;">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th style="white-space: nowrap">Rencana pengiriman vs realisasi (MS2 Compliance)</th>
                                        <th style="white-space: nowrap">Rencana volume angkutan vs realisasi</th>
                                        <th style="white-space: nowrap">Laporan tagihan ongkos angkut </th>
                                        <th style="white-space: nowrap">Customer  Satisfaction (Lembaga Penyalur)</th>
                                        <th style="white-space: nowrap">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</th>
                                        <th style="white-space: nowrap">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</th>
                                        <th style="white-space: nowrap">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</th>
                                        <th style="white-space: nowrap">Number of Incidents</th>
                                        <th style="white-space: nowrap">Waktu penyelesaian Incidents</th>
                                        <th style="white-space: nowrap">Number of Accident</th>
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

                                    for ($i = 0; $i < 8; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $bulan[$i] ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
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
