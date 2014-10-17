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
<script>
    var apar = new Array();
    $(document).ready(function(){
       
        
    });
</script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>mt/data_mt">Data Mobil</a></li>
                    <li><a href="<?php echo base_url() ?>mt/detail/<?php echo $dataMobil->id_mobil; ?>/<?php echo date("n")?>/<?php echo date("Y")?>">Detail Mobil</a></li>
                    <li class="active">Apar Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <section class="panel">
            
        <?php if ($pesan==1) {  ?>
            <div class="alert alert-block alert-success fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                <strong>Berhasil! </strong><?php echo $pesan_text;?>
            </div>
        <?php } ?>
            </section>
        <section class="panel">
            <header class="panel-heading">
                <i class="icon-fire-extinguisher"></i> APAR MT   
            </header>
            <div class="panel-body">
                <div class="bio-desk">
                    <div class="bio-row" >
                        <p><span>Nopol </span>: <?php echo $dataMobil->NOPOL; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span></span></p>
                    </div>
                    <div class="bio-row">
                        <p><span>KAPASITAS </span>: <?php echo $dataMobil->KAPASITAS; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span></span></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Kapasitas </span>: <?php echo $dataMobil->PRODUK; ?></p>
                    </div>

                </div>
            </div>
            
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Data APAR  
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-x: scroll">
                    <div class="clearfix">
                        <?php if ($this->session->userdata('id_role') != 5) { ?>
                        <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahApar">
                            Tambah APAR <i class="icon-plus"></i>
                        </a>
                        <?php }?>
                    </div>

                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>Jenis Apar</th>
                                <th>Tanggal Apar</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                <?php $i = 1;
                                $j=0;
                                 
                                foreach ($apar as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><div id="<?php echo 'id_jenis-' . $i; ?>"><?php if($row->ID_JENIS_APAR == "1")echo 'Store Pressure'?>
                                        <?php if($row->ID_JENIS_APAR == "2")echo 'Catridge'?>
                                        <?php if($row->ID_JENIS_APAR == "3")echo 'CO2'?>
                                    </td>
                                    <td><?php echo(DateToIndo($row->TANGGAL_APAR)); ?></td>
                                    <td><div id="<?php echo 'keterangan-' . $i; ?>">
                                    <?php echo $row->KETERANGAN_APAR; ?></td>
                                    
                                       <td> 
                                           <?php if ($this->session->userdata('id_role') != 5) { ?>
                                      
                                        <a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" href="#ModalEditApar"  data-toggle="modal"  onclick="setapar('<?php echo $row->ID_APAR ?>','<?php echo $row->ID_MOBIL ?>','<?php echo $row->ID_JENIS_APAR ?>','<?php echo $row->TANGGAL_APAR ?>','<?php echo $row->KETERANGAN_APAR ?>')"><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" href="#ModalHapusApar" data-placement="top" data-toggle="modal" onclick="hapusapar('<?php echo $row->ID_APAR; ?>')"><i class="icon-remove"></i></a>
                                       <?php } ?>
                                    </td>

                                </tr>
                                <?php
                                $j++;
                                $i++;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <!-- page end-->
    </section>
</section>


<div class="modal fade" id="ModalTambahApar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Tambah APAR</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/apar_mt/<?php echo $id_mobil; ?> " >
                <div class="modal-body">
                    <!-- form tambah-->


                    <div class="form-group">
                        <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Jenis Apar</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="id_jenis" name="ID_JENIS_APAR">
                                <option value="1">Store Pressure</option>
                                <option value="2">Catridge</option>
                                <option value="3">CO2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Tanggal Apar</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="cat" name="TANGGAL_APAR"  type="date" required />
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" placeholder="Keterangan" id="keterangan" name="KETERANGAN_APAR" minlength="2" type="text" required />
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" onclick="this.form.reset()">Batal</button>
                    <input class="btn btn-success" name="simpan" type="submit" value="Simpan"/>
                </div>
            </form> 
        </div>
    </div>
</div>


<div class="modal fade" id="ModalEditApar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="<?php echo base_url()?>mt/apar_mt/<?php echo $id_mobil; ?>" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Edit APAR</h4>
            </div>
                <div class="modal-body">
                    <!-- form edit-->
                    
                    <div class="form-group">
                        <input class=" form-control input-sm m-bot15" id="ID_APAR" name="ID_APAR"  type="hidden" required />
                       <input class=" form-control input-sm m-bot15" id="ID_MOBIL" name="ID_MOBIL"  type="hidden" required />
                       
                         <label class="col-sm-2 control-label col-lg-2" for="apar">Jenis Apar</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="ID_JENIS_APAR" name="ID_JENIS_APAR">
                                <option <?php if($row->ID_JENIS_APAR == "1")echo "selected"?> value="1">Store Pressure</option>
                                <option <?php if($row->ID_JENIS_APAR == "2")echo "selected"?> value="2">Catridge</option>
                                <option <?php if($row->ID_JENIS_APAR == "3")echo "selected"?> value="3">CO2</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="co2" class="col-lg-2 col-sm-2 control-label">Tanggal Apar</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="TANGGAL_APAR" name="TANGGAL_APAR"  type="date" required />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="KETERANGAN_APAR2" name="KETERANGAN_APAR2" minlength="2" type="text" required />
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                   <input class="btn btn-success" name="apar" type="submit" value="Simpan"/>
                </div>
                </form>
        </div>

    </div>
</div>


<div class="modal fade" id="ModalHapusApar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Hapus APAR</h4>
            </div>
            <div class="modal-body">

             <form method="POST" action="<?php echo base_url() ?>mt/apar_mt/<?php echo $id_mobil?>">
                    Apakah anda yakin ?
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
						<input type="hidden" value="" name="ID_APAR2" id="ID_APAR2"></input>
						<input type="submit" value="Hapus" name="deleteapar" class="btn btn-danger danger"></input>
					</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
    
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
        var globalId;
        var globalIdMobil;
    $('#ModalHapusApar').on('show', function() {

    });

    function hapus(id_apar,id_mobil) {
        globalId = id_apar;
        globalIdMobil = id_mobil;
        $('#ModalHapusApar').data('id', id_apar).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_apar/" + globalId + "/" + globalIdMobil;
        window.location.href = url;
    }
    
     function hapusapar(id) {
        $('#ID_APAR2').val(id);
    }
      
      
        var index;
        
       function setapar(id_apar,id_mobil,id_jenis_apar, tanggal_apar, keterangan_apar) {
                                                                $("#ID_APAR").val(id_apar);
                                                                $("#ID_MOBIL").val(id_mobil);
                                                                $("#ID_JENIS_APAR").val(id_jenis_apar);
                                                                $("#TANGGAL_APAR").val(tanggal_apar);
                                                                $("#KETERANGAN_APAR2").val(keterangan_apar);
                                                            }
    
    
   
</script>
