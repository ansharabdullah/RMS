<script type="text/javascript">
    var apms;
    var premium = new Array();
    var premium1 = new Array();
    var solar = new Array();
    var bulan_mt = new Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember','Januari');
    var nomor_bulan = new Array(1,2,3,4,5,6,7,8,9,10,11,12);
    <?php
	$status=0;
	$tampung=0;
	for($i=1;$i<13;$i++)
	{
		$tampung=0;
		$status=0;
        foreach($grafik as $isi){
				if($isi->no_bulan == $i)
				{ 
					 ?> 
					 $status = 1;
					 premium.push(<?php echo $isi->premium ?>); 
					 premium1.push(<?php echo $isi->premium ?>); 
					 solar.push(<?php echo $isi->solar ?>);
					 <?php
				}
				else
				{
					if($status==0)
					{
					 ?> 
					 premium.push(0); 
					 premium1.push(0); 
					 solar.push(0);
					 <?php
					}
				}
		}
	}
    ?>
    $(function() {
       apms = new Highcharts.Chart({ 
            chart: {
                zoomType: 'x',
                renderTo: 'grafik'
            },
            title: {
                text: 'Grafik Kinerja Bulanan Jumlah Premium APMS',
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
                enabled: false
            },
            plotOptions: {
               column: {
                   point:{
                        events: {
                        click: function(event) {
                            
                            
                            window.location = "<?php echo base_url() ?>apms/grafik_bulan_apms/"+ nomor_bulan[this.x]+"/"+ <?php echo $tahun?> ;
                            
                            }
                        }
                    }
                }
            },
            series: [{
                    
                    name: 'Jumlah',
                    type: 'column',
                    data: premium

                }]
        });
    });
    
    function filterMt(title)
    {
        apms.setTitle({text: 'Grafik Kinerja Bulanan Jumlah'+title+' APMS'});  
        //apms.legend.allItems[0].update({name:title});
       if(title == "Premium"){
            apms.series[0].setData(premium1);
        }else if(title == "Solar"){
            apms.series[0].setData(solar);
            
        }
    }

    
</script>

<section id="main-content">
    <section class="wrapper">
         <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li class="active">Grafik Kinerja Bulanan APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                     <header class="panel-heading">
                        Grafik Detail APMS
                    </header>
                    <div class="panel-body">
                        <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                 echo form_open("apms/apms_tahun/",$attr);
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
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter APMS<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a style="cursor: pointer" onclick="filterMt('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Solar')">Solar</a></li>
                            </ul>
                        </div>
                            <br><br><br>
                        <div id="grafik"></div>

                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Kinerja APMS Tahun <?php echo $tahun?>
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Premium (KL)</th>
                                        <th>Solar (KL)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($grafik as $row) {?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row->bulan; ?></td>
                                    <td><?php echo $row->premium; ?></td>
                                    <td><?php echo $row->solar; ?></td>
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
