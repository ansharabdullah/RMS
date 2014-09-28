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
    $( document ).ready(function() {
        $("#ShowProfile").show();
        $("#ShowEdit").hide();
    });
    
    function ShowProfile(){
        $("#ShowProfile").show();
        $("#ShowEdit").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
    }
    function ShowEdit(){
        $("#ShowProfile").hide();
        $("#ShowEdit").show();
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
    }
    
   
</script>
<script type="text/javascript">
    var apms;
    var hari = new Array();
    var premium = new Array();
    var solar = new Array();
	var total = new Array();
	
	<?php
		$i =1;
		$status =0;
		$tampung =0;
		while($i<=30)
		{ 	
			?>
			hari.push(<?php echo $i; ?>);
			<?php
			$status = 0;
			foreach($grafix as $isi)
			{
				if($isi->hari == $i)
				{
					if($isi->BAHAN_BAKAR == 'Premium')
					{
						$status = 1;
						$tampung = $isi->jumlah;
					}
				}
			}
			if($status == 1)
			{
				?> premium.push(<?php echo $tampung ?>); <?php
			}
			else
			{
				?> premium.push(0); <?php
			}
			$status=0;
			foreach($grafix as $isi)
			{
				if($isi->hari == $i)
				{
					if($isi->BAHAN_BAKAR == 'Solar')
					{
						$status = 2;
						$tampung = $isi->jumlah;
					}
				}
			}
			if($status == 2)
			{
				?> solar.push(<?php echo $tampung ?>); <?php
			}
			else
			{	
				?> solar.push(0); <?php
			}
			
			
			$i = $i + 1;
		}
	?>
	
	
	
	//var premium = new Array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
	//var total_solar = new Array(1,7,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
	//var total = new Array(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60);
    $(function() {
        apms = new Highcharts.Chart({ 
            chart: {
                renderTo: 'grafik'
            },
            title: {
                text: 'Grafik Realisasi Penyaluran Jumlah APMS'
            },
            subtitle: {
                text: 'Bulan <?php echo date("F", mktime(0, 0, 0, $bulan, 1, 2005))?> Tahun <?php echo $tahun ?>'
            },
            plotOptions: {
                column: {
                   point:{
                      events:{
                        click: function(event) {
                            }
                        }
                    }
                }
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
                        text: 'Realisasi (KL)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                enabled : false
            },
            series: [{
                    name: 'jumlah',
                    type: 'spline',
                    data: premium,
                    visible : false
					}]
                
        });
    });
    
    function filterAPMS(title)
    {
        apms.setTitle({text: 'Grafik Realisasi Penyaluran '+title+' APMS'});  
        //apms.legend.allItems[0].update({name:title});
        if(title == "Premium"){
            apms.series[0].setData(premium);
        }else if(title == "Solar"){
            apms.series[0].setData(solar);
        }
        
    }
	 $(document).ready(function(){
            apms.series[0].setVisible(true);
        });
</script>

<section id="main-content">
	
    <section class="wrapper">
	<?php if ($pesan==1) {  ?>
            <div class="alert alert-block alert-success fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                <strong>Berhasil! </strong><?php echo $pesan_text;?>
            </div>
        <?php } ?>
        
        <?php if ($pesan==2) { ?>
            <div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                <strong>Error!</strong> 
            </div>
        <?php } ?>
            <?php foreach ($apms as $row) { ?>
            <!-- page start-->
			<div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>apms/data_apms/"></i>Data APMS</a></li>
                    <li class="active">Detail APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            <section class="panel" id="ShowProfile">
                <header class="panel-heading">
                    <div class="col-lg-10">Detail APMS
                    </div>
                    <a class="btn btn-warning" onclick="ShowEdit()" ><i class="icon-pencil"></i> Edit</a> 

                    <a class="btn btn-danger" href="javascript:hapus('<?php echo $row->ID_APMS ?>');"><i class="icon-eraser"></i> Hapus</a>

                </header>
                <div class="panel-body bio-graph-primary" >
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">
                                <aside class="profile-nav col-lg-12">
                                    <div class="row">
                                        <div class="bio-row">
											<p><span class="col col-lg-3">Nomor APMS </span>: <?php echo $row->NO_APMS; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Nama Pengusaha </span>: <?php echo $row->NAMA_PENGUSAHA; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Supply Point </span>: <?php echo $row->SUPPLY_POINT; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Nama Transportir </span>: <?php echo $row->NAMA_TRANSPORTIR; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Nomor Perjanjian </span>: <?php echo $row->NO_PERJANJIAN; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Tarif Patra Niaga </span>: <?php echo $row->TARIF_PATRA_NIAGA; ?></p>
                                        </div>
										<div class="bio-row">
                                            <p><span class="col col-lg-3">Alamat </span>: <?php echo $row->ALAMAT; ?></p>
                                        </div>
										<div class="bio-row">
                                            <p><span class="col col-lg-3">Ship-To </span>: <?php echo $row->SHIP_TO; ?></p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel" id="ShowEdit">
                <header class="panel-heading">
                    Edit APMS
                </header>
                <div class="panel-body bio-graph-primary" >
                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>apms/detail_apms/<?php echo $row->ID_APMS?>">
                        <div class="panel-body">
                            <input type="hidden" name="id" value="<?php echo $row->ID_APMS?>">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="no_apms" class="control-label col-lg-4">NO. APMS</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NO_APMS ?>" id="no_apms" name="no_apms"  type="text" readonly />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama_pengusaha" class="control-label col-lg-4">Nama Pengusaha</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NAMA_PENGUSAHA ?>" id="nama_pengusaha" name="nama_pengusaha"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="supply_point" class="control-label col-lg-4">Supply Point</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->SUPPLY_POINT ?>" id="supply_point" name="supply_point"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="alamat" class="control-label col-lg-4">No Mesin</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->ALAMAT ?>" id="alamat" name="alamat"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama_transportir" class="control-label col-lg-4">Nama Transportir</label>
                                    <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" value="<?php echo $row->NAMA_TRANSPORTIR ?>" id="nama_transportir" name="nama_transportir"  type="text" required />
                                        
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="no_perjanjian" class="control-label col-lg-4">Nomor Perjanjian</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NO_PERJANJIAN ?>" id="no_perjanjian" name="no_perjanjian"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="tarif" class="control-label col-lg-4">Tarif Patra Niaga</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->TARIF_PATRA_NIAGA?>" id="tarif" name="tarif"  type="number" required />
                                    </div>
                                </div>
								<div class="bio-row">
                                    <label for="ship_to" class="control-label col-lg-4">Ship-To</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->SHIP_TO?>" id="ship_to" name="ship_to"  type="text" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-default" onclick="ShowProfile()"value="Batal" />
                            <input class="btn btn-success" type="submit" value="Simpan" name="simpan"/>
                        </div>
                    </form>
				</div>
            </section>
  <?php } ?>              

			<section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12"><header class="panel-heading">
                            Grafik Bulanan APMS
                        </header>
                        <div class="panel-body" >
                            <!--                        <form class="cmxform form-horizontal tasi-form" action="" role="form" method="POST">-->
                            <?php
                                //$attr = array("class"=>"cmxform form-horizontal tasi-form");
                               //echo form_open("apms/apms_bulan/".$id_mobil,$attr);
                               
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
							<div class="btn-group pull-right">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Filter APMS<i class="icon-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-left">
										<li><a style="cursor: pointer" onclick="filterAPMS('Premium')">Premium</a></li>
										<li><a style="cursor: pointer" onclick="filterAPMS('Solar')">Solar</a></li>
									</ul>
							</div>
                        <br><br><br>
							<div class="col-lg-12">
								<div id="grafik"></div>
							</div>
						</div>
					</div>
				</div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    Tabel Kinerja APMS  
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                                Tambah Kinerja <i class="icon-plus"></i>
                            </a>
                        </div>

                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>No. Delivery</th>
                                    <th>Tanggal Delivery</th>
                                    <th>Tanggal Plan GI</th>
                                    <th>Bahan Bakar</th>
                                    <th>Volume (KL)</th>
                                    <th>Nomor Order</th>
                                    <th>Tanggal Order</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Tanggal Kapal Datang</th>
                                    <th>Tanggal Kapal Berangkat</th>
                                    <th>Description</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<tr>
                                    <?php $i = 1;
                               
                                foreach ($kinerja as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->NO_DELIVERY; ?></td>
                                    <td><?php echo $row->DATE_DELIVERY; ?></td>
                                    <td><?php echo $row->DATE_PLAN_GI; ?></td>
                                    <td><?php echo $row->BAHAN_BAKAR; ?></td>
                                    <td><?php echo $row->JUMLAH; ?></td>
                                    <td><?php echo $row->ORDER_NUMBER; ?></td>
                                    <td><?php echo $row->DATE_ORDER; ?></td>
                                    <td><?php echo $row->PENGIRIMAN_KAPAL; ?></td>
                                    <td><?php echo $row->DATE_KAPAL_DATANG; ?></td>
                                    <td><?php echo $row->DATE_KAPAL_BERANGKAT; ?></td>
                                    <td><?php echo $row->DESCRIPTION; ?></td>
                                    
                                    
                                   <td><a onclick="editKinerja('<?php echo $row->ID_KINERJA_APMS ?>','<?php echo $row->ID_LOG_HARIAN ?>','<?php echo $row->NO_DELIVERY ?>', '<?php echo $row->DATE_DELIVERY ?>', '<?php echo $row->DATE_PLAN_GI ?>', '<?php echo $row->BAHAN_BAKAR ?>', '<?php echo $row->JUMLAH ?>', '<?php echo $row->ORDER_NUMBER ?>', '<?php echo $row->DATE_ORDER ?>', '<?php echo $row->PENGIRIMAN_KAPAL ?>', '<?php echo $row->DATE_KAPAL_DATANG ?>', '<?php echo $row->DATE_KAPAL_BERANGKAT ?>','<?php echo $row->DESCRIPTION ?>')" data-placement="top" data-toggle="modal" href="#Modal" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                   </td>
                                </tr>
                                <?php $i++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>s
            </section>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
	<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus APMS</h4>
                </div>
                <div class="modal-body">

                    Apakah anda yakin ?

                </div>
                    <form method="POST" action="<?php echo base_url() ?>apms/data_apms">
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">No</button>
						<input type="hidden" value="<?php echo $row->ID_APMS ?>" name="ID_APMS"></input>
						<input type="submit" value="Hapus" name="simpan" class="btn btn-danger danger"></input>
					</div>
					</form>
            </div>
        </div>
    </div>
	
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="mymodalform" method="post" action="<?php echo base_url() ?>apms/detail_apms/<?php echo $row->ID_APMS?>">
				<input type="hidden" name="id" value="<?php echo $row->ID_APMS?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>
                    <div class="modal-body">
						<div class="row">
                            <div class="col-lg-12">
                                <section class="panel">

                                    <div class="panel-body">
										<div class="form-group ">
											<label for="NO_DELIVERY" class="control-label col-lg-2">No. Delivery</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="no_delivery" name="no_delivery" type="text" required />
												
											</div>

											<label for="tgl_delivery" class="control-label col-lg-2">Tanggal Delivery</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_delivery" name="tgl_delivery"  type="date" required/>
												<span class="help-block">Pilih Tanggal</span>
											</div>
										</div>
										<div class="form-group ">
											<label for="ps" class="control-label col-lg-2">Bahan Bakar</label>
											<div class="col-lg-4">
												<select class="form-control input-sm m-bot15" id="bh" name="bh">
													<option value="Premium">Premium
													</option>
													<option value="Solar">Solar</option>
												</select>
											</div>
											<label for="jml" class="control-label col-lg-2">Jumlah (KL)</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="jml" name="jml"  type="number" required />
											</div>
										</div>
										<div class="form-group ">
											<label for="tgl_plan_gi1" class="control-label col-lg-2">Tanggal Plan GI</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_plan_gi" name="tgl_plan_gi"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
											 <label for="nomor_order" class="control-label col-lg-2">Nomor Order</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="nomor_order" name="nomor_order"  type="text" required />
											</div>
										</div>
										<div class="form-group ">
											<label for="tgl_order" class="control-label col-lg-2">Tanggal Order</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_order" name="tgl_order"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
											<label for="tgl_kirim" class="control-label col-lg-2">Tanggal Pengiriman</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_kirim" name="tgl_kirim"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
										</div>
										<div class="form-group ">
											<label for="tgl_kpl_dtg" class="control-label col-lg-2">Tanggal Kapal Datang</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_kpl_dtg" name="tgl_kpl_dtg"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
											<label for="tgl_kpl_brkt" class="control-label col-lg-2">Tanggal Kapal Berangkat</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_kpl_brkt" name="tgl_kpl_brkt"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
										</div>
										<div class="form-group ">
											<label for="des" class="control-label col-lg-2">Description</label>
											<div class="col-lg-10">
												<textarea class=" form-control input-sm m-bot15" id="des" name="des" required ></textarea>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input type="submit" class="btn btn-success" name="simpan1" id="simpan1" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
	
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="Modalform" method="POST" action="<?php echo base_url() ?>apms/detail_apms/<?php echo $row->ID_APMS?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ">
							<input id="id_kinerja_apms" name="id_kinerja_apms" type="hidden" value="" />
							<input id="id_log" name="id_log" type="hidden" value="" />
							<input type="hidden" name="id" value="<?php echo $row->ID_APMS?>">
                            <label for="NO_DELIVERY" class="control-label col-lg-2">No. Delivery</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="no_delivery1" name="no_delivery1" type="text" readonly />
                                
                            </div>

                            <label for="tgl_delivery" class="control-label col-lg-2">Tanggal Delivery</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tgl_delivery1" name="tgl_delivery1"  type="date" required />
								<span class="help-block">Pilih Tanggal</span>
                            </div>
						</div>
                        <div class="form-group ">
                            <label for="ps" class="control-label col-lg-2">Bahan Bakar</label>
                            <div class="col-lg-4">
								<select class="form-control input-sm m-bot15" id="bh1" name="bh1">
									<option value="Premium">Premium
									</option>
									<option value="Solar">Solar</option>
								</select>
							</div>
							<label for="jml" class="control-label col-lg-2">Jumlah (KL)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="jml1" name="jml1"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="tgl_plan_gi1" class="control-label col-lg-2">Tanggal Plan GI</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tgl_plan_gi1" name="tgl_plan_gi1"  type="date" required />
								<span class="help-block">Pilih Tanggal</span>
                            </div>
							 <label for="nomor_order" class="control-label col-lg-2">Nomor Order</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="nomor_order1" name="nomor_order1"  type="text" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="tgl_order" class="control-label col-lg-2">Tanggal Order</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tgl_order1" name="tgl_order1"  type="date" required />
								<span class="help-block">Pilih Tanggal</span>
                            </div>
							<label for="tgl_kirim" class="control-label col-lg-2">Tanggal Pengiriman</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tgl_kirim1" name="tgl_kirim1"  type="date" required />
								<span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
						<div class="form-group ">
                            <label for="tgl_kpl_dtg" class="control-label col-lg-2">Tanggal Kapal Datang</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tgl_kpl_dtg1" name="tgl_kpl_dtg1"  type="date" required />
								<span class="help-block">Pilih Tanggal</span>
                            </div>
							<label for="tgl_kpl_brkt" class="control-label col-lg-2">Tanggal Kapal Berangkat</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tgl_kpl_brkt1" name="tgl_kpl_brkt1"  type="date" required />
								<span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
						<div class="form-group ">
                            <label for="des" class="control-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <textarea class=" form-control input-sm m-bot15" id="des1" name="des1" required ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input type="submit" class="btn btn-success" name="simpan2" id="simpan2" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal -->
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

    <!--script for this page only-->
    <script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

    jQuery(document).ready(function() {
        EditableTable.init();
    });
    
	//kinerja
	function editKinerja(id_kinerja_apms,id_log_harian,no_delivery, tgl_delivery, tgl_plan_gi, bh, jml, nomor_order, tgl_order, tgl_kirim,tgl_kpl_dtg,tgl_kpl_brgkt,des) {
		$("#id_log").val(id_log_harian);
		$("#id_kinerja_apms").val(id_kinerja_apms);
		$("#no_delivery1").val(no_delivery);
		$("#tgl_delivery1").val(tgl_delivery);
		$("#tgl_plan_gi1").val(tgl_plan_gi);
		$("#bh1").val(bh);
		$("#jml1").val(jml);
		$("#nomor_order1").val(nomor_order);
		$("#tgl_order1").val(tgl_order);
		$("#tgl_kirim1").val(tgl_kirim);
		$("#tgl_kpl_dtg1").val(tgl_kpl_dtg);
		$("#tgl_kpl_brkt1").val(tgl_kpl_brgkt);
		$("#des1").val(des);
	}
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
    var globalId;
    $('#ModalHapus').on('show', function() {

    });

    function hapus(id) {
        globalId = id;
        $('#ModalHapus').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "apms/delete_apms/" + globalId;
        window.location.href = url;
    }
    
    
    var global;
    var globalMobil;
    $('#hapusKinerja').on('show', function() {

    });

    function hapus_kinerja(id,id_mobil) {
        global = id;
        globalMobil=id_mobil;
        $('#hapusKinerja').data('id', id).modal('show');
 
    }

    
</script>