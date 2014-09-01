<script type="text/javascript">
    var mt;
    var kl_mt = new Array();
    var km_mt = new Array();
    var total_km_mt = new Array();
    var premium = new Array();
    var pertamax = new Array();
    var pertamax_plus = new Array();
    var pertamina_dex = new Array();
    var solar = new Array();
    var bio_solar = new Array();
    var own_use_mt = new Array();
    var ritase_mt = new Array();
    var nopol_mt = new Array();
    <?php
        foreach($grafik as $km){
            ?>
             
                kl_mt.push(<?php echo $km->total_kl_mt ?>);
                km_mt.push(<?php echo $km->total_km_mt ?>);
                premium.push(<?php echo $km->premium ?>);
                pertamax.push(<?php echo $km->pertamax ?>);
                pertamax_plus.push(<?php echo $km->pertamax_plus ?>);
                pertamina_dex.push(<?php echo $km->pertamina_dex ?>);
                solar.push(<?php echo $km->solar ?>);
                bio_solar.push(<?php echo $km->bio_solar ?>);
                own_use_mt.push(<?php echo $km->own_use ?>);
                ritase_mt.push(<?php echo $km->ritase_mt ?>);
                nopol_mt.push("<?php echo $km->nopol ?>");
                
            <?php
        }
    ?>
    
    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: '24 Agustus 2014 ',
                x: -20
            },
            xAxis: {
                categories: nopol_mt
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
            series: [{
                    name: 'KM',
                    data: km_mt
                }, {
                    name: 'KL',
                    data: kl_mt
                }, {
                    name: 'Premium',
                    data: premium
                }, {
                    name: 'Pertamax',
                    data: pertamax
                }, {
                    name: 'Pertamax Plus',
                    data: pertamax_plus
                }, {
                    name: 'Pertamina Dex',
                    data: pertamina_dex
                }, {
                    name: 'Solar',
                    data: solar
                }, {
                    name: 'Own Use',
                    data: own_use_mt
                }, {
                    name: 'Bio Solar',
                    data: bio_solar
                },
                {
                    name: 'Ritase',
                    data: ritase_mt
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
                        <div id="grafik"></div> </div>
                </section>
                <section class="panel">
                     <header class="panel-heading">
                            Tabel Kinerja Mobil Tangki 24 Agustus Tahun 2014
                        </header>
                    <div class="panel-body">
                       
                        <div class="adv-table editable-table " >
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Nopol</th>
                                        <th>Produk</th>
                                        <th>Kapasitas</th>
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
                                     <?php $i = 1;

                                    foreach ($grafik as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url() ?>mt/detail_mt/<?php echo $row->id_mobil; ?>" style ="text-decoration: underline"><?php echo $row->nopol; ?></a></td>
                                    <td><?php echo $row->kapasitas; ?></td>
                                    <td><?php echo $row->produk; ?></td>
                                   <td><?php echo $row->total_km_mt; ?></td>
                                    <td><?php echo $row->total_kl_mt; ?></td>
                                    <td><?php echo $row->ritase_mt; ?></td>
                                    <td><?php echo $row->premium; ?></td>
                                    <td><?php echo $row->pertamax; ?></td>
                                    <td><?php echo $row->pertamax_plus; ?></td>
                                    <td><?php echo $row->pertamina_dex; ?></td>
                                    <td><?php echo $row->solar; ?></td>
                                    <td><?php echo $row->bio_solar; ?></td>
                                    
                                    </tr>
                                    <?php
                                    $i++;
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
		  	
</script><?php
                                    /*
                                     * To change this template, choose Tools | Templates
                                     * and open the template in the editor.
                                     */
                                    ?>
