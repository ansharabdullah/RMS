<?php
function DateToIndo($date) { 
        $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        $tgl   = substr($date, 8, 2); 
        
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
}

?>

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
    var hari = new Array();
    var nomor_bulan = new Array();
    
    <?php
        foreach($grafik as $km){
            ?>
             
                kl_mt.push(<?php echo $km->total_kl ?>);
                km_mt.push(<?php echo $km->total_km ?>);
                premium.push(<?php echo $km->premium ?>);
                pertamax.push(<?php echo $km->pertamax ?>);
                pertamax_plus.push(<?php echo $km->pertamax_plus ?>);
                pertamina_dex.push(<?php echo $km->pertamina_dex ?>);
                solar.push(<?php echo $km->solar ?>);
                bio_solar.push(<?php echo $km->bio_solar ?>);
                own_use_mt.push(<?php echo $km->own_use ?>);
                ritase_mt.push(<?php echo $km->ritase ?>);
                hari.push(<?php echo $km->hari ?>)
                nomor_bulan.push("<?php echo date("n",strtotime($km->TANGGAL_LOG_HARIAN))?>");
                
            <?php
        }
    ?>
    
    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: 'Bulan Januari 2014',
                x: -20
            },
            xAxis: {
                categories: hari
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
                    cursor:'pointer',
                    point:{
                        events: {
                        click: function(event) {
                            
                            
                            window.location = "<?php echo base_url() ?>mt/grafik_hari_mt/"+ nomor_bulan[this.x]+"/"+ hari[this.x]+"/<?php echo date('Y')?>";
                            
                            }
                        }
                    }
                }
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
                        <div id="grafik"></div> 
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                            Tabel Kinerja Mobil Tangki Bulan Agustus 2014
                        </header>
                    <div class="panel-body">
                        
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No </th>
                                        <th>Tanggal</th>
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
                                    <td><?php echo (DateToIndo($row->TANGGAL_LOG_HARIAN)); ?></td>
                                    <td><?php echo $row->total_km; ?></td>
                                    <td><?php echo $row->total_kl; ?></td>
                                    <td><?php echo $row->ritase; ?></td>
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
		  	
</script>