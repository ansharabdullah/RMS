
<section id="main-content">
    <section class="wrapper">
         <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>apms/grafik_apms/<?php echo date("Y")?>"></i> Grafik Kinerja Bulanan APMS</a></li>
                    <li class="active">Grafik Kinerja Harian APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Harian APMS
                    </header>
                    <div class="panel-body" >
                        <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                               echo form_open("apms/apms_grafik_masuk/",$attr);
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
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter APMS<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a style="cursor: pointer" onclick="filterAPMS('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterAPMS('Solar')">Solar</a></li>
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
                                    Tabel Kinerja APMS <?php echo date("F", mktime(0, 0, 0, $bulan, 1, 2005))?> <?php echo $tahun ?>
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
                                                    <th >Premium (KL)</th>
                                                    <th >Solar (KL)</th>
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
                                                        <td><?php echo $km->premium ?></td>
                                                        <td><?php echo $km->solar ?></td>
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
    var apms;
    var hari = new Array();
    var solar = new Array();
    var premium = new Array();
    var premium1 = new Array();
    
    <?php
	$status=0;
	$tampung=0;
	
	$jumlah = 0;
	$bulansekarang = $tahun . "-" . $bulan;
	if ($bulansekarang == date('Y-m',strtotime($tahun . "-" . $bulan))) {
		$jumlah = date('d');
	} else if ($bulan == 1 || $bulan == 3 || $bulan == 5 || $bulan == 7 || $bulan == 8 || $bulan == 10 || $bulan == 12) {
		$jumlah = 31;
	} else if ($bulan == 4 || $bulan == 6 || $bulan == 9 || $bulan == 11) {
		$jumlah = 30;
	} else if ($bulan == 2) {
		$jumlah = 28;
		//jika kabisat
		if (date('L', strtotime($tahun . '-01-01'))) {
			$jumlah = 29;
		}
	}

	for($i=1;$i<=$jumlah;$i++)
	{
		$prem=0;
		$sol=0;
		$status=0;
		$k=0
		?>
		hari.push(<?php echo $i; ?>);
        <?php
		foreach($grafik as $isi){
				if($isi->hari == $i) 
				{ 
					$status =1;
					$prem = $isi->premium;
					$sol = $isi->solar;
				}
				$k++;
		}
		if($status==1 && $k!=0)
		{
					 ?> 
					 premium.push(<?php echo $prem; ?>); 
					 premium1.push(<?php echo $prem; ?>); 
					 solar.push(<?php echo $sol; ?>);
					 <?php
		}
		else if($status == 0 && $k!=0)
		{
					 ?> 
					 premium1.push(0); 
					 premium.push(0); 
					 solar.push(0);
					 <?php
		}
	}
    ?>
    $(function() {
        apms = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik'
            },
            title: {
                text: 'Grafik Kinerja Harian Jumlah Premium APMS'
            },
            subtitle: {
                text: 'Bulan <?php echo date("F", mktime(0, 0, 0, $bulan, 1, 2005))?> Tahun <?php echo $tahun ?>'
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
                            
                            
                         window.location = "<?php echo base_url() ?>apms/grafik_hari_apms/"+ <?php echo $bulan?>+"/"+ hari[this.x]+"/<?php echo $tahun?>";
                            
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
                    data: premium
                }]
        });
    });
    
    
    function filterAPMS(title)
    {
        apms.setTitle({text: 'Grafik Kinerja Harian Jumlah '+title+' APMS'});  
        if(title == "Premium"){
             apms.series[0].setData(premium1);
        }
        else if(title == "Solar"){
            apms.series[0].setData(solar);
            
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
</script>