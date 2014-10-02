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
				<div style="float:right;">
                   <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahManual">
                            Tambah Rencana <i class="icon-plus"></i>
                    </a>
                </div>
            </header>
            <div class="panel-body" >
                
                <div class="clearfix">
                    <form class="cmxform form-horizontal tasi-form" id ="signupForm" method="POST" action="<?php echo base_url() ?>mt/rencana/">
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
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil edit Rencana.
                    </div>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Rencana <strong><?php echo $bulan . ' ' . $tahun; ?></strong>
                    <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalHapusRencana" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Rencana"><i class="icon-remove"></i></a>
                </header>
                <div class="panel-body"  >
                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <div class="clearfix">
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Aksi</th>
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
                                             <td><?php echo $row->TANGGAL?></td>
                                            <td><?php echo $row->K_PREMIUM ?></td>
                                            <td><?php echo $row->K_SOLAR ?></td>
                                            <td>
<a onclick="cekRencana('<?php echo $row->TANGGAL?>','<?php echo $row->K_PREMIUM ?>','<?php echo $row->K_SOLAR ?>','<?php echo $row->ID_RENCANA_APMS ?>')" data-placement="top" data-toggle="modal" href="#ModalRencana" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
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
                </div>
            </section>

                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Peringatan!</strong> Rencana bulan <strong><?php echo $bulan . ' ' . $tahun; ?></strong> belum diimport.
                </div>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil hapus Rencana.
            </div>
    </section>
</section>

<!-- Modal -->
          <!-- modal edit ms2-->
        <div class="modal fade" id="AddModalRencana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>mt/rencana">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambah Rencana</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <div class="panel-body">

                                        <div class="form-group "> 
                                            <label for="tanggal" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input type="text" class=" form-control input-sm m-bot15" id="tanggal_log_harian" name="tanggal_log_harian" value="" placeholder="Tanggal "required readonly/>
                                            </div>
                                            <input type="hidden" class=" form-control input-sm m-bot15" id="id_rencana" name="id_rencana" value="" required/>
                                            <input type="hidden" class=" form-control input-sm m-bot15" name="bln" value="<?php echo $bulan; ?>" required/>
                                       
                                        </div>
                                        <div class="form-group">
                                            <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Premium</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="r_premium" name="r_premium"  type="number" required />
                                            </div>
                                           <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Solar</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="solar" name="solar"  type="number" required />
                                            </div>
                                            
										</div>
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

                <!-- modal edit ms2-->
        <div class="modal fade" id="ModalRencana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>mt/rencana">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Ubah Rencana</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <div class="panel-body">

                                        <div class="form-group "> 
                                            <label for="tanggal" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input type="text" class=" form-control input-sm m-bot15" id="tanggal_log_harian" name="tanggal_log_harian" value="" placeholder="Tanggal "required readonly/>
                                            </div>
                                            <input type="hidden" class=" form-control input-sm m-bot15" id="id_rencana" name="id_rencana" value="" required/>
                                            <input type="hidden" class=" form-control input-sm m-bot15" name="bln" value="<?php echo $bulan; ?>" required/>
                                       
                                        </div>
                                        <div class="form-group">
                                            <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Premium</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="r_premium" name="r_premium"  type="number" required />
                                            </div>
                                           <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Solar</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="solar" name="solar"  type="number" required />
                                            </div>
                                            
										</div>
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
                    <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>mt/hapus_rencana/">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Hapus Rencana</h4>
                        </div>
                        <div class="modal-body">
                            Yakin Hapus Rencana <strong><?php echo $bulan . ' ' . $tahun; ?></strong> ?
                            <input type="hidden" required="required" id="id_rencana" class="form-control" name="id_rencana" value="<?php echo htmlentities(serialize($rencana)); ?>">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-danger" type="submit" name="submit" value="Hapus"/>
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
