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
                                 echo form_open("depot/apms_tahun/".$id_depot,$attr);
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
                     <div class="panel-body">

                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    foreach ($grafik as $row) {?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i ?></td>
                                    <td><?php  
										if ($row->no_bulan == '01') {
											$nama_bulan = 'Januari';
										} else if ($row->no_bulan == '02') {
											$nama_bulan = 'Februari';
										} else if ($row->no_bulan == '03') {
											$nama_bulan = 'Maret';
										} else if ($row->no_bulan == '04') {
											$nama_bulan = 'April';
										} else if ($row->no_bulan == '05') {
											$nama_bulan = 'Mei';
										} else if ($row->no_bulan == '06') {
											$nama_bulan = 'Juni';
										} else if ($row->no_bulan == '07') {
											$nama_bulan = 'Juli';
										} else if ($row->no_bulan == '08') {
											$nama_bulan = 'Agustus';
										} else if ($row->no_bulan == '09') {
											$nama_bulan = 'September';
										} else if ($row->no_bulan == '10') {
											$nama_bulan = 'Oktober';
										} else if ($row->no_bulan == '11') {
											$nama_bulan = 'November';
										} else if ($row->no_bulan == '12') {
											$nama_bulan = 'Desember';
										}
										echo $nama_bulan;
										
									?></td>
									<td>
										<?php 
											$stat=0;
											foreach($grafik_kuota as $kuota)
											{
												if($kuota->no_bulan == $row->no_bulan)
												{
													$stat=1;
													echo $kuota->k_premium;
												}
											}
											if($stat==0)
											{
												echo "0";
											}
										?>
									</td>
                                    <td><?php echo $row->premium; ?></td>
									<td>
										<?php
										$stat = 0;										
										foreach($grafik_kuota as $kuota)
											{
												if($kuota->no_bulan == $row->no_bulan)
												{
													$stat =1;
													echo $kuota->k_solar;
												}
											}
											
											if($stat==0)
											{
												echo "0";
											}
										?>
									
									</td>
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


<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>
<script type="text/javascript">
    var apms;
    var premium = new Array();
    var premium1 = new Array();
    var solar = new Array();
    var k_premium = new Array();
    var k_premium1 = new Array();
    var k_solar = new Array();
    var bulan_mt = new Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember','Januari');
    var nomor_bulan = new Array(1,2,3,4,5,6,7,8,9,10,11,12);
    <?php
	$status=0;
	$tampung=0;
	$k = $grafik_max->no_bulan;
	for($i=1;$i<=$k;$i++)
	{
		$tampung_solar=0;
		$tampung_premium=0;
		$status=0;
        foreach($grafik as $isi){
				if($isi->no_bulan == $i)
				{ 
					 $status = 1;
					 $tampung_solar = $isi->solar;
					 $tampung_premium = $isi->premium;
				}
		}
		if($status==0)
		{
		 ?>
		 premium.push(0); 
		 premium1.push(0); 
		 solar.push(0);
		 <?php
		}else
		{
		 ?> 
		 premium.push(<?php echo $tampung_premium ?>); 
		 premium1.push(<?php echo $tampung_premium ?>); 
		 solar.push(<?php echo $tampung_solar ?>);
		 <?php
		}
		$tampung_solar=0;
		$tampung_premium=0;
		$status=0;
        foreach($grafik_kuota as $isi){
				if($isi->no_bulan == $i)
				{ 
					 $status = 1;
					 $tampung_solar = $isi->k_solar;
					 $tampung_premium = $isi->k_premium;
				}
		}
		if($status==0)
		{
		 ?>
		 k_premium.push(0); 
		 k_premium1.push(0); 
		 k_solar.push(0);
		 <?php
		}else
		{
		 ?> 
		 k_premium.push(<?php echo $tampung_premium ?>); 
		 k_premium1.push(<?php echo $tampung_premium ?>); 
		 k_solar.push(<?php echo $tampung_solar ?>);
		 <?php
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
                enabled: true
            },
            plotOptions: {
               column: {
                   point:{
                        events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/apms_depot_harian/<?php echo $id_depot?>/"+ nomor_bulan[this.x]+"/"+ <?php echo $tahun?> ;
                            
                            }
                        }
                    }
                }
            },
            series: [{
                    name: 'Premium',
                    type: 'column',
                    data: premium

                },{
                    name: 'Alokasi Premium',
                    type: 'line',
                    data: k_premium
                }]
        });
    });
    
    function filterApms(title)
    {
        apms.setTitle({text: 'Grafik Kinerja Bulanan Jumlah '+title+' APMS'});  
        apms.legend.allItems[0].update({name:title});
        apms.legend.allItems[1].update({name:'Alokasi '+title});
       if(title == "Premium"){
            apms.series[0].setData(premium1);
            apms.series[1].setData(k_premium1);
        }else if(title == "Solar"){
            apms.series[0].setData(solar);
            apms.series[1].setData(k_solar);
            
        }
    }

    
</script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>