<script type="text/javascript">
    var start = 0;
    var limit = 5;
    var apms;
    var premium = new Array();
    var solar = new Array();
    var nama = new Array();
<?php
	$tampung_premium;
	$tampung_solar;
	foreach ($nama_apms as $apms) {
		$status=0;
		?>
		nama.push("<?php echo $apms->NAMA_PENGUSAHA.' '.str_replace('.','',$apms->NO_APMS) ?>");
		<?php
		foreach ($grafik as $km) {
			if($apms->NO_APMS == $km->NO_APMS)
			{
				$status=1;
				$tampung_premium=$km->premium;
				$tampung_solar=$km->solar;
			}
		}
		if($status==1)
		{
			?>
			premium.push(<?php echo $tampung_premium ?>);
			solar.push(<?php echo $tampung_solar  ?>);
			<?php
		}
		else
		{
			?>
			premium.push(0);
			solar.push(0);
			<?php
		}
	}
?>
    //var nama = new Array("Husein Kadir (56.611.01)","Salahoddin (56.611.02)","M.Iksan (56.694.01)");
    $(function() {
        apms = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik',
                type:'bar'
            },
            title: {
                text: 'Grafik Detail Realisasi Penyaluran APMS Harian',
                x: -20 //center
            },
            subtitle: {
                text: '<?php echo $hari.' '.$nama_bulan.' '.$tahun ?>',
                x: -20
            },
            xAxis: {
                categories: nama
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
             plotOptions: {
                series: {
                    point:{
                        events:{
                            click: function(event) {
                              $("#myModal").modal('toggle');
                            }
                        }
                    }
                    
                }
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                borderWidth: 1
            },
            series: [{
                    name: 'Premium',
                    data: premium
                }, {
                    name: 'Solar',
                    data: solar
                }]
        });
    });
	
        $(document).ready(function(){
            $("#sebelum").hide();
            if(nama.length < limit)
            {
                $("#selanjutnya").hide();
            }
			setData();
            apms.series[0].setVisible(true);
        });
    
    
        function sebelumOnClick()
        {
            $("#sebelum").show();
            start -=limit;
            if(start - limit < 0)
            {
                start = 0;
                $("#sebelum").hide();
            }
            else
            {
                start = start - limit;
            }
            $("#selanjutnya").show();
            setData();
        }
    
        function selanjutnyaOnClick()
        {
            $("#selanjutnya").show();
            start += limit;
            if(start + limit >= nama.length)
            {
                $("#selanjutnya").hide();
            }
            $("#sebelum").show();
            
            setData();
        }
    
        function setData()
        {
            
            apms.xAxis[0].setCategories(nama.slice(start,start + limit));
            apms.series[0].setData(premium.slice(start,start + limit));
            apms.series[1].setData(solar.slice(start,start + limit));
		}
</script>

<section id="main-content">
    <section class="wrapper">
         <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>apms/grafik_apms/<?php echo date("Y")?>"></i> Grafik Kinerja Bulanan APMS</a></li>
                    <li><a href="<?php echo base_url(); ?>apms/grafik_bulan_apms/<?php echo $bulan?>/<?php echo $tahun ?>"></i> Grafik Kinerja Harian APMS</a></li>
                    <li class="active">Grafik Kinerja Detail APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Detail Harian APMS 
                    </header>
                    <div class="panel-body" >
                         <?php
                        $attr = array("class" => "cmxform form-horizontal tasi-form");
                        echo form_open("apms/apms_grafik_hari/", $attr);
                        ?>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <input type="date" name="tanggal"  required="required" id="tahunLaporan"  class="form-control"/>
                            </div>

                            <div class=" col-lg-2">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>

                        </div>
                        <?php echo form_close() ?>
                        
                        <br/><br/>
                        <div id="grafik"></div><br/><br/>
                        <button class='btn btn-danger' id="sebelum" onclick="sebelumOnClick()"><i class='icon-long-arrow-left'></i> sebelumnya</button>
                        <button class='btn btn-danger' style='float:right;' id="selanjutnya" onclick="selanjutnyaOnClick()">selanjutnya <i class='icon-long-arrow-right'></i></button>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Kinerja APMS Detail Harian <?php echo $hari.' '.$nama_bulan;?> <?php echo $tahun ?>
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>ID APMS</th>
                                        <th>Nama Pengusaha</th>
                                        <th>Premium (KL)</th>
                                        <th>Solar (KL)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($nama_apms as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url() ?>apms/detail_apms/<?php echo $row->ID_APMS; ?>/<?php echo $bulan?>/<?php echo $tahun?>" style ="text-decoration: underline"><?php echo $row->NO_APMS; ?></a></td>
									<td><?php echo $row->NAMA_PENGUSAHA ?></td>
                                    <td><?php 
										$stat=0;
										foreach ($grafik as $km) {
											if($row->NO_APMS == $km->NO_APMS)
											{
												$stat=1;
												echo $km->premium; 
											}
										}
										if($stat==0)
										{
											echo "0";
										}
										?>
									</td>
                                    <td><?php 
										$stat=0;
										foreach ($grafik as $km) {
											if($row->NO_APMS == $km->NO_APMS)
											{
												$stat=1;
												echo $km->solar; 
											}
										}
										
										if($stat==0)
										{
											echo "0";
										}
										?>
										</td>
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
