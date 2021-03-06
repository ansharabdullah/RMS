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
                            window.location = "<?php echo base_url() ?>mt/oam_harian";
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
                    data: [1, 8, 2, 11, 7, 12, 26, 24., 22, 10, 8, 2]
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
                    <header class="panel-heading">
                        Grafik Bulanan Depot 1
                    </header>
                    <div class="panel-body" >
                        <form class ="cmxform form-horizontal tasi-form">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <select class="form-control m-bot2"  id="depot" name="depot">

                                    <option value="">Depot 1</option>
                                    <option value="">Depot 2</option>
                                    <option value="">Depot 3</option>
                                    <option value="">Depot 4</option>
                                    <option value="">Depot 5</option>

                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="tahun" data-mask="9999" name="tahun" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                            </div>

                            <div class=" col-lg-2">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>

                        </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div id="grafik"></div>

                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Kinerja Mobil Tangki Tahun 2014
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table ">
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
