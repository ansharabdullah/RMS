<!DOCTYPE html>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
       <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="icon-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?php echo $total_amt ?>
                        </h1>
                        <p>Awak Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                            <?php echo $total_mt ?>
                        </h1>
                        <p>Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="icon-star"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                              <?php if ($rencana_bulan[0]->total_kl > 0) {
                                echo ceil(($kinerja_bulan[0]->total_kl / $rencana_bulan[0]->total_kl) * 100);
                            } else {
                                echo "0";
                            } ?>%
                        </h1>
                        <p>Traget KL</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="icon-dashboard"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count4">
                           <?php if($kinerja_bulan[0]->own_use  > 0){
                                echo $kinerja_bulan[0]->own_use ;
                            } else {
                                echo "0";
                            }?>
                        </h1>
                        <p>KL (Own Use)</p>
                    </div>
                </section>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan MT TBBM <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
                         <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                 echo form_open("depot/mt_tahun/".$id_depot,$attr);
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="number" name="tahun" minlength="4" maxlength="4" min="2010" value="<?php echo date('Y')?>" required="required" id="tahunLaporan"  class="form-control"/>
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
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamina Dex')">Pertamina Dex</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Solar')">Solar</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Bio Solar')">Bio Solar</a></li>
                            </ul>
                        </div>
                        <br/><br/><br/>
                        <div id="grafik"></div>

                    </div>
                </section>
            </div>
        </div>
        <div class ="row">
            <div class="col-lg-12">
                <section class="panel">
                     <header class="panel-heading">
                        Data MT TBBM <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-x: scroll" >
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th >No</th>
                                            <th >Tanggal</th>
                                            <th >Jumlah KM</th>
                                            <th >Jumlah KL</th>
                                            <th >Own Use</th>
                                            <th >Premium</th>
                                            <th >Pertamax</th>
                                            <th >Pertamax Plus</th>
                                            <th >Pertamina Dex</th>
                                            <th >Solar</th>
                                            <th >Bio Solar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($kinerja_mt as $km) {
                                            ?>
                                            <tr class="">
                                                <td style="display:none;"></td>
                                                <td><?php echo $i ?></td>
                                                <td style="white-space: nowrap"><?php echo strftime('%B',strtotime($km->TANGGAL_LOG_HARIAN));?></td>
                                               <td><?php echo $km->total_km ?> KM</td>
                                                 <td><?php echo $km->total_kl ?> KL</td>
                                                <td><?php echo $km->own_use ?> KL</td>
                                                <td><?php echo $km->premium ?> KL</td>
                                                <td><?php echo $km->pertamax ?> KL</td>
                                                <td><?php echo $km->pertamax_plus ?> KL</td>
                                                <td><?php echo $km->pertamina_dex ?> KL</td>
                                                <td><?php echo $km->solar ?> KL</td>
                                                <td><?php echo $km->bio_solar ?> KL</td>
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


<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

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
    var bulan = new Array();
    var nomor_bulan = new Array();
    
    <?php
        foreach($kinerja_mt as $km){
            ?>
              kl_mt.push(<?php echo $km->total_kl ?>);
                km_mt.push(<?php echo $km->total_km ?>);
                total_km_mt.push(<?php echo $km->total_km ?>);
                premium.push(<?php echo $km->premium ?>);
                pertamax.push(<?php echo $km->pertamax ?>);
                pertamax_plus.push(<?php echo $km->pertamax_plus ?>);
                pertamina_dex.push(<?php echo $km->pertamina_dex ?>);
                solar.push(<?php echo $km->solar ?>);
                bio_solar.push(<?php echo $km->bio_solar ?>);
                own_use_mt.push(<?php echo $km->own_use ?>);
                 bulan.push("<?php echo strftime("%B",strtotime($km->TANGGAL_LOG_HARIAN))?>");
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
                text: 'Grafik Kinerja Jumlah KM MT TBBM <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            plotOptions: {
                column: {
                   point:{
                      events:{
                        click: function(event) {
                                window.location = "<?php echo base_url() ?>depot/mt_depot_harian/<?php echo $id_depot?>/"+ nomor_bulan[this.x]+"/<?php echo $tahun?>";
                            }
                        }
                    }
                }
            },
            xAxis: [{
                    categories: bulan
                }],
            yAxis: [{// Primary yAxis
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
            legend:{
                enabled : false
            },
            tooltip: {
                shared: true
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: km_mt,
                    tooltip:{
                        valueSuffix : " KM"
                    }

                }]
        });
    });
    
    function filterMt(title)
    {
        mt.setTitle({text: 'Grafik Kinerja Jumlah '+title+' MT TBBM <?php echo $nama_depot?>'});  
        //mt.legend.allItems[0].update({name:title});
        mt.series[0].remove(true);
       
        if(title == "KM"){
             //mt.series[0].setData(total_km_mt);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: total_km_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KM"
                    }

                }
             );
        }
        else if(title == "KL"){
            //mt.series[0].setData(kl_mt);
            mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: kl_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Own Use"){
            //mt.series[0].setData(own_use_mt);
              mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: own_use_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );  
        }else if(title == "Premium"){
            //mt.series[0].setData(premium);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: premium,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Pertamax"){
            //mt.series[0].setData(pertamax);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: pertamax,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Pertamax Plus") {
           // mt.series[0].setData(pertamax_plus);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: pertamax_plus,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Pertamina Dex") {
            //mt.series[0].setData(pertamina_dex);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: pertamina_dex,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Solar"){
            //mt.series[0].setData(solar);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: solar,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Bio Solar"){
            //mt.series[0].setData(bio_solar);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'column',
                    data: bio_solar,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        } 
        
    }
</script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>