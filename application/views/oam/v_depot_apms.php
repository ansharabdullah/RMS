<!DOCTYPE html>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
      

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan APMS Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
                         <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                 echo form_open("depot/apms_tahun/".$id_depot."/".$nama_depot,$attr);
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
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter APMS<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a style="cursor: pointer" onclick="filterApms('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterApms('Solar')">Solar</a></li>
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
                        Data APMS Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-x: scroll" >
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th rowspan="2">No.</th> 
                                        <th rowspan="2">Bulan</th>
                                        <th colspan="2">Premium</th>
                                        <th colspan="2">Solar</th>
                                    </tr>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>Alokasi</th>
                                        <th>Total pengiriman</th>
                                        <th>Alokasi</th>
                                        <th>Total pengiriman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bulan = array("Januari","Februari","Maret","April");
                                    $premium = array(448,468,712,634);
                                    $alokasi_premium = array(559,559,712,634);
                                    $solar = array(260,112,178,306);
                                    $alokasi_solar = array(294,294,178,306);
                                    for($i = 0 ; $i < 4; $i++)
                                    {
                                    ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1)?></td>
                                            <td><?php echo $bulan[$i]?></td>
                                            <td><?php echo $alokasi_premium[$i]?></td>
                                            <td><?php echo $premium[$i]?></td>
                                            <td><?php echo $alokasi_solar[$i]?></td>
                                            <td><?php echo $solar[$i]?></td>
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


<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<script type="text/javascript">
    
    var apms;
    var premium = new Array(448,468,712,634);
    var solar = new Array(260,112,178,306);
    var bulan = new Array('Januari','Februari','Maret','April');
    var nomor_bulan = new Array(1,2,3,4);
    var total_premium = new Array(448,468,712,634);
    var alokasi_premium = new Array(559,559,712,634);
    var alokasi_solar = new Array(294,294,178,306);
    var total_alokasi_premium = new Array(559,559,712,634);
    $(function() {
        apms = new Highcharts.Chart({ 
            chart: {
                zoomType: 'x',
                renderTo: 'grafik'
            },
            title: {
                text: 'Grafik Realisasi Penyaluran Premium APMS Depot <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            plotOptions: {
                column: {
                   point:{
                      events:{
                        click: function(event) {
                                window.location = "<?php echo base_url() ?>depot/apms_depot_harian/<?php echo $id_depot?>/"+ nomor_bulan[this.x]+"/<?php echo $tahun?>";
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
            tooltip: {
                shared: true
            },
            legend: {
                enabled : true
            },
            series: [{
                    name: 'Premium',
                    type: 'column',
                    data: total_premium

                },{
                    name: 'Alokasi Premium',
                    type: 'line',
                    data: alokasi_premium
                }]
        });
    });
    
    function filterApms(title)
    {
        apms.setTitle({text: 'Grafik Realisasi Penyaluran '+title+' APMS Depot <?php echo $nama_depot?>'});  
        apms.legend.allItems[0].update({name:title}); 
        apms.legend.allItems[1].update({name:'Alokasi '+ title});
        if(title == "Premium"){
            apms.series[0].setData(premium);
            apms.series[1].setData(total_alokasi_premium);
        }else if(title == "Solar"){
            apms.series[0].setData(solar);
            apms.series[1].setData(alokasi_solar);
        }
        
    }
</script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>