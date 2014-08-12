<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Grafik Awak Mobil Tangki',
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
                            window.location = "<?php echo base_url()?>amt/grafik_bulan";
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
                    name: 'SPBU',
                    data: [0.1, 0.5, 2.5, 6.4, 10.5, 12.0, 18.6, 17.2, 14.3, 11.0, 3.9, 2.0]
                }, {
                    name: 'Jml Hadir',
                    data: [0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'Jml Tidak Hadir',
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
                                        <th>SPBU</th>
                                        <th>Jumlah Hadir</th>
                                        <th>Jumlah Tidak Hadir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    $km = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
                                    $kl = array(0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5);
                                    $rit = array(1, 0.8, 2, 11.3, 7, 12, 26, 24.1, 22, 10, 8, 2);
                                    $spbu = array(0.1, 0.5, 2.5, 6.4, 10.5, 12.0, 18.6, 17.2, 14.3, 11.0, 3.9, 2.0);
                                    $hadir = array(0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0);
                                    $tidakHadir = array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8);
                                    for ($i = 0; $i < 12; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $bulan[$i] ?></td>
                                            <td><?php echo $km[$i] ?></td>
                                            <td><?php echo $kl[$i] ?></td>
                                            <td><?php echo $rit[$i] ?></td>
                                            <td><?php echo $spbu[$i] ?></td>
                                            <td><?php echo $hadir[$i] ?></td>
                                            <td><?php echo $tidakHadir[$i] ?></td>
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