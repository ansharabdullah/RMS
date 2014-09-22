
<section id="main-content">
    <section class="wrapper">
         <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>mt/grafik_mt/<?php echo date("Y")?>"></i> Grafik Kinerja Tahunan</a></li>
                    <li class="active">Grafik Kinerja Bulanan</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Harian MT
                    </header>
                    <div class="panel-body" >
                        <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                               echo form_open("mt/mt_masuk/",$attr);
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
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
                    <div class="panel-body" >
                        <div id="filePreview">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Kinerja Mobil Tangki <?php echo date("F", mktime(0, 0, 0, $bulan_mt, 1, 2005))?> <?php echo $tahun ?>
                                </header>
                                <div class="panel-body">

                                        <div class="space15"></div>
                                        <div class="adv-table editable-table " style="overflow-x: scroll">
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
                                                    <th >Pertamax Dex</th>
                                                    <th >Solar</th>
                                                    <th >Bio Solar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($grafik as $km) {
                                                    ?>
                                                    <tr class="">
                                                        <td style="display:none;"></td>
                                                        <td><?php echo $i ?></td>
                                                        <td style="white-space: nowrap"><?php echo date_format(date_create($km->TANGGAL_LOG_HARIAN),'d F Y');?></td>
                                                        <td><?php echo $km->total_km ?> KM</td>
                                                        <td><?php echo $km->total_kl ?> KL</td>
                                                        <td><?php echo $km->own_use ?></td>
                                                        <td><?php echo $km->premium ?></td>
                                                        <td><?php echo $km->pertamax ?></td>
                                                        <td><?php echo $km->pertamax_plus ?></td>
                                                        <td><?php echo $km->pertamina_dex ?></td>
                                                        <td><?php echo $km->solar ?></td>
                                                        <td><?php echo $km->bio_solar ?></td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                       </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
                <!-- page end-->
            </div>            
        </div>        
    </section>
</section>

<script type="text/javascript">
    var mt;
    var hari = new Array();
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
    
    <?php
        foreach($grafik as $km){
            ?>
                hari.push("<?php echo $km->hari;?>");
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
            <?php
        }
    ?>
    $(function() {
        mt = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik'
            },
            title: {
                text: 'Grafik Kinerja Harian Jumlah KM Mobil Tangki'
            },
            subtitle: {
                text: 'Bulan <?php echo date("F", mktime(0, 0, 0, $bulan_mt, 1, 2005))?> Tahun <?php echo $tahun ?>'
            },
            xAxis: [{
                    categories: hari
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            plotOptions: {
                  series: {
                    cursor:'pointer',
                    point:{
                      events:{
                        click: function(event) {
                            
                            
                            window.location = "<?php echo base_url() ?>mt/grafik_hari_mt/"+ <?php echo $bulan_mt?>+"/"+ hari[this.x]+"/<?php echo $tahun?>";
                            
                            }
                        }
                    }
                }
            },

            tooltip: {
                shared: true
            },
            legend: {
                enabled:false
            },
            series: [{
                    type: 'spline',
                    name: 'Jumlah',
                    data: km_mt
                }]
        });
    });
    
    
    function filterMt(title)
    {
        mt.setTitle({text: 'Grafik Kinerja Harian Jumlah '+title+' Mobil Tangki'});  
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


<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
   
		  
</script>