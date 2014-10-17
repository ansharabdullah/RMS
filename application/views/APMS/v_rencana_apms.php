<?php
function DateToIndo($date) { 
        $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        
        $result = " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
}

?>


<script type="text/javascript">
    var rencana = new Array();
/* 
    $(document).ready(function() {

        //masukin array apar ke javascript
        var data; */
/* <?php foreach ($rencana as $a) { ?>
            data = new Array();
            data['id_rencana'] = "<?php echo $a->ID_RENCANA ?>";
            data['TANGGAL'] = "<?php echo $a->TANGGAL ?>";
            data['r_premium'] = "<?php echo $a->R_PREMIUM ?>";
            data['r_pertamax'] = "<?php echo $a->R_PERTAMAX ?>";
            data['r_pertamaxplus'] = "<?php echo $a->R_PERTAMAXPLUS ?>";
            data['r_pertaminaplus'] = "<?php echo $a->R_PERTAMINADEX ?>";
            data['r_solar'] = "<?php echo $a->R_SOLAR ?>";
            data['r_biosolar'] = "<?php echo $a->R_BIO_SOLAR ?>";
            data['r_own_use'] = "<?php echo $a->R_OWN_USE ?>";

            

            rencana.push(data);
<?php } ?>


    }); */

    /* function setDetailRencana(index) {
        $("#id_rencana").val(rencana[index]['id_rencana']);
        $("#tanggal_rencana").val(rencana[index]['TANGGAL']);

        $("#premium").val(rencana[index]['r_premium']);
        $("#solar").val(rencana[index]['r_solar']);
        $("#pertamax").val(rencana[index]['r_pertamax']);

        $("#pertamxplus").val(rencana[index]['r_pertamaxplus']);
        $("#pertaminadex").val(rencana[index]['r_pertaminadex']);
        $("#biosolar").val(rencana[index]['r_biosolar']);
        $("#own_use").val(rencana[index]['r_own_use']);


    } */
 

</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                   <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                   <li class="active">Rencana APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <section class="panel" id="LihatJadwal">
            <header class="panel-heading">
                Lihat Rencana
            </header>
            <div class="panel-body" >
                
                <div class="clearfix">
                    <form class="cmxform form-horizontal tasi-form" id ="signupForm" method="POST" action="<?php echo base_url() ?>apms/rencana/">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                            <div class="col-lg-10">
                                <input type="month" required="required" id="bln" name="bln" class="form-control"  placeholder="tahun - bulan">
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" name="cek" style="float: right;" class="btn btn-warning" value="Cek">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
                    	<?php if ($pesan==1) {  ?>
							<div class="alert alert-block alert-success fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
											<i class="icon-remove"></i>
										</button>
								<strong>Berhasil! </strong><?php echo $pesan_text;?>
							</div>
						<?php } ?>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Rencana <strong>Bulan <?php echo $nama_bulan . ' ' . $tahun; ?></strong>
                </header>
                <div class="panel-body"  >
                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <div class="clearfix">
				<?php
				foreach($STATUS_RENCANA as $ka)
				{
					if($ka->STATUS_KUOTA_APMS==0)
					{
					?>
				 <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Peringatan!</strong> Rencana bulan <strong><?php echo $nama_bulan . ' ' . $tahun; ?></strong> belum diisi!
                </div>
				
				<div style="float:left;">
                   <a class="btn btn-primary" data-toggle="modal" href="#AddModalRencana">
                            Tambah Rencana <i class="icon-plus"></i>
                    </a>
                </div>
					<?php
					}
					else
					{
					
					?>
				
				
				<div style="float:right;">
                    <a class="btn btn-warning" data-toggle="modal" href="#ModalEDIT"><i class="icon-pencil"></i> Edit</a> 

                    <a class="btn btn-danger" data-toggle="modal" href="#ModalHapusRencana"><i class="icon-eraser"></i> Hapus</a>
                </div>
					<?php
					
					}
				}
				?>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>No. APMS</th>
                                        <th>Nama Pengusaha</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <!--<th>Aksi</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($apms as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $i ?></td>
                                             <td><?php echo $row->NO_APMS?></td>
                                             <td><?php echo $row->NAMA_PENGUSAHA?></td>
                                            <td><?php echo $row->K_PREMIUM ?></td>
                                            <td><?php echo $row->K_SOLAR ?></td>
                                           <!-- <td>
<a onclick="cekRencana('<?php //echo $row->TANGGAL?>','<?php //echo $row->K_PREMIUM ?>','<?php //echo $row->K_SOLAR ?>','<?php //echo $row->ID_RENCANA_APMS ?>')" data-placement="top" data-toggle="modal" href="#ModalRencana" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td> -->
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

    </section>
</section>

<!-- Modal -->
          <!-- modal edit ms2-->
        <div class="modal fade" id="AddModalRencana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>apms/rencana_apms/<?php echo $tahun;?>/<?php echo $bulan;?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambah Rencana</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <div class="panel-body">

                                        <div class="form-group "> 
                                            <label for="tanggal" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                                            <div class="col-lg-10">
                                                <input type="text" class=" form-control input-sm m-bot15" id="tanggal_log_harian" name="tanggal_log_harian" value="<?php echo $nama_bulan.' '.$tahun;?>" placeholder="Tanggal "required readonly/>
                                            </div>
                                       
                                        </div>
										
										<?php
										$k=0;
											foreach($no_apms as $no){
											
										?>
                                            <input type="hidden" class=" form-control input-sm m-bot15" name="<?php echo 'I_'.$k; ?>" value="<?php echo $no->ID_APMS; ?>"/>
											<div class="form-group">
												<label for="nomesin" class="col-lg-8 col-sm-8 control-label"><?php echo 'APMS '.$no->NAMA_PENGUSAHA.' '.$no->NO_APMS?></label>
											</div>
											<div class="form-group">
												<label for="nomesin" class="col-lg-2 col-sm-2 control-label">Premium</label>
												<div class="col-lg-4">
													<input class=" form-control input-sm m-bot15" id="<?php echo 'P_'.$k ?>" name="<?php echo 'P_'.$k ?>"  type="number" required />
												</div>
											   <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Solar</label>
												<div class="col-lg-4">
													<input class=" form-control input-sm m-bot15" id="<?php echo 'R_'.$k ?>" name="<?php echo 'R_'.$k ?>"  type="number" required />
												</div>	
											</div>
										<?php
										$k++;
											}
										?>
											
                                      </div>
                                </section>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-success" type="submit" name="simpan" value="Simpan"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                <!-- modal edit ms2-->
        <div class="modal fade" id="ModalEDIT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>apms/rencana_apms/<?php echo $tahun;?>/<?php echo $bulan;?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Ubah Rencana</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <div class="panel-body">
										 <div class="form-group "> 
                                            <label for="tanggal" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                                            <div class="col-lg-10">
                                                <input type="text" class=" form-control input-sm m-bot15" id="tanggal_log_harian" name="tanggal_log_harian" value="<?php echo $nama_bulan.' '.$tahun;?>" placeholder="Tanggal "required readonly/>
                                            </div>
                                       
                                        </div>
										
										<?php
										$k=0;
											foreach($apms as $no){
											
										?>
                                            <input type="hidden" class=" form-control input-sm m-bot15" name="<?php echo 'I_'.$k; ?>" value="<?php echo $no->ID_RENCANA_APMS; ?>"/>
											<div class="form-group">
												<label for="nomesin" class="col-lg-8 col-sm-8 control-label"><?php echo 'APMS '.$no->NAMA_PENGUSAHA.' '.$no->NO_APMS?></label>
											</div>
											<div class="form-group">
												<label for="nomesin" class="col-lg-2 col-sm-2 control-label">Premium</label>
												<div class="col-lg-4">
													<input class=" form-control input-sm m-bot15" id="<?php echo 'P_'.$k ?>" name="<?php echo 'P_'.$k ?>"  type="number" value="<?php echo $no->K_PREMIUM ?>" required />
												</div>
											   <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Solar</label>
												<div class="col-lg-4">
													<input class=" form-control input-sm m-bot15" id="<?php echo 'R_'.$k ?>" name="<?php echo 'R_'.$k ?>"  type="number" value="<?php echo $no->K_SOLAR ?>" required />
												</div>	
											</div>
										<?php
										$k++;
											}
										?>
                                        
                                      </div>
                                </section>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-success" type="submit" name="edit" value="Simpan"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalHapusRencana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>apms/rencana_apms/<?php echo $tahun;?>/<?php echo $bulan;?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Hapus Rencana APMS</h4>
                        </div>
                        <div class="modal-body">
                            Yakin Hapus Rencana <strong><?php echo $bulan . ' ' . $tahun; ?></strong> ?
							<?php
							foreach($STATUS_RENCANA as $ka)
							{
							?>
                            <input type="hidden" required="required" id="id_rencana" class="form-control" name="id_rencana" value="<?php echo $ka->ID_LOG_HARIAN?>">
							<?php
							}
							?>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-danger" type="submit" name="hapus" value="Simpan"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal hapus Rencana-->
        
 

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

  jQuery(document).ready(function() {
   EditableTable.init();
      });
   
function cekRencana(tanggal, r_premium, r_solar, id_rencana) {
	$("#id_rencana").val(id_rencana);
    $("#tanggal_log_harian").val(tanggal);
    $("#r_premium").val(r_premium);
    $("#solar").val(r_solar);
}
</script>
