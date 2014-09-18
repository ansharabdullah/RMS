<script type="text/javascript">
    
    var mt;
    var kl_mt = new Array();
    var km_mt = new Array();
    var premium = new Array();
    var pertamax = new Array();
    var pertamax_plus = new Array();
    var pertamina_dex = new Array();
    var solar = new Array();
    var bio_solar = new Array();
    var total_km_mt = new Array();
    var own_use_mt = new Array();
    var ritase_mt = new Array();
    var bulan_mt = new Array();
    var nomor_bulan = new Array();
    <?php
        foreach($grafik as $km){
            ?>
                kl_mt.push(<?php echo $km->total_kl ?>);
                total_km_mt.push(<?php echo $km->total_km ?>);
                km_mt.push(<?php echo $km->total_km ?>);
                premium.push(<?php echo $km->premium ?>);
                pertamax.push(<?php echo $km->pertamax ?>);
                pertamax_plus.push(<?php echo $km->pertamax_plus ?>);
                pertamina_dex.push(<?php echo $km->pertamina_dex ?>);
                solar.push(<?php echo $km->solar ?>);
                bio_solar.push(<?php echo $km->bio_solar ?>);
                own_use_mt.push(<?php echo $km->own_use ?>);
                ritase_mt.push(<?php echo $km->ritase ?>);
                bulan_mt.push("<?php echo $km->bulan?>");
                nomor_bulan.push("<?php echo date("n",strtotime($km->TANGGAL_LOG_HARIAN))?>");
                
                
                
                
            <?php
        }
    ?>
    $(function() {
       mt = new Highcharts.Chart({ 
            chart: {
                zoomType: 'x',
                renderTo: 'grafik'
            },
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>',
                x: -20
            },
            xAxis: {
                categories:bulan_mt
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
               column: {
                   point:{
                        events: {
                        click: function(event) {
                            
                            
                            window.location = "<?php echo base_url() ?>mt/grafik_bulan_mt/"+ nomor_bulan[this.x]+"/"+ <?php echo $tahun?> ;
                            
                            }
                        }
                    }
                }
            },
            series: [{
                    
                    name: 'KM',
                    type: 'column',
                    data: km_mt

                }]
        });
    });
    
    function filterMt(title)
    {
        mt.setTitle({text: 'Grafik Kinerja Jumlah '+title+' Mobil Tangki'});  
        mt.legend.allItems[0].update({name:title});
        if(title == "KM"){
             mt.series[0].setData(total_km_mt);
        }
        else if(title == "KL"){
            mt.series[0].setData(kl_mt);
            
        }else if(title == "Own Use"){
            mt.series[0].setData(own_use_mt);
                
        }else if(title == "Premium"){
            mt.series[0].setData(premium);
            
        }else if(title == "Pertamax"){
            mt.series[0].setData(pertamax);
            
        }else if(title == "Pertamax Plus") {
            mt.series[0].setData(pertamax_plus);
            
        }else if(title == "Pertamax Dex") {
            mt.series[0].setData(pertamina_dex);
            
        }else if(title == "Solar"){
            mt.series[0].setData(solar);
            
        }else if(title == "Bio Solar"){
            mt.series[0].setData(bio_solar);
        } 
        
    }

    
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                     <header class="panel-heading">
                        Grafik Detail Mobil Tangki
                    </header>
                    <div class="panel-body">
                        <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                 echo form_open("mt/mt_tahun/",$attr);
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="number" name="tahun" minlength="4" max="9999" min="2010" value="" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                            <?php echo form_close()?>
                            <br/><br/>
                        
                         <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter MT<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a style="cursor: pointer" onclick="filterMt('KM')">KM</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('KL')">KL</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Own Use')">Own Use</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax')">Pertamax</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax Plus')">Pertamax Plus</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax Dex')">Pertamax Dex</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Solar')">Solar</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Bio Solar')">Bio Solar</a></li>
                            </ul>
                        </div>
                            <br><br><br>
                        <div id="grafik"></div>

                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Kinerja Mobil Tangki Tahun <?php echo $tahun?>
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Kilometer (KM)</th>
                                        <th>Kiloliter (KL)</th>
                                        <th>Ritase (Rit)</th>
                                        <th>Own Use</th>
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
                                    <td><?php echo $row->bulan; ?></td>
                                    <td><?php echo $row->total_km; ?></td>
                                    <td><?php echo $row->total_kl; ?></td>
                                    <td><?php echo $row->ritase; ?></td>
                                    <td><?php echo $row->own_use; ?></td>
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
