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
    var oli = new Array();
    $(document).ready(function(){
        var ap;
        <?php
             foreach($oli as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_OLI?>";
                 ap['KM_AWAL'] = "<?php echo $a->KM_AWAL?>";
                 ap['MERK_OLI'] = "<?php echo $a->MERK_OLI?>";
                 ap['TANGGAL_GANTI_OLI'] = "<?php echo $a->TANGGAL_GANTI_OLI?>";
                 ap['TOTAL_VOLUME'] = "<?php echo $a->TOTAL_VOLUME?>";
                 
                 oli.push(ap);
                 <?php
             }
                        ?>
        
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
                    <li class="active">Oli Mobil</li>
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
                <i class="icon-beer"></i> Oli MT
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
                Tabel Oli MT
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-x: scroll">
                    <div class="clearfix">
                        <?php if ($this->session->userdata('id_role') != 5) { ?>
                        <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                            Tambah Oli MT <i class="icon-plus"></i>
                        </a>
                        <?php }?>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>KM Awal (Km)</th>
                                <th>Tanggal Ganti</th>
                                <th>Merk Oli</th>
                                <th>Total Volume (Liter)</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                           
                               <?php $i = 1;
                               $j=0;
                                foreach ($oli as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->KM_AWAL; ?></td>
                                    <td><?php echo(DateToIndo($row->TANGGAL_GANTI_OLI)); ?></td>
                                    <td><?php echo $row->MERK_OLI; ?></td>
                                    <td><?php echo $row->TOTAL_VOLUME; ?></td>
                                   <td>
                                       <?php if ($this->session->userdata('id_role') != 5) { ?>
                                    <a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Oli" href="#ModalEditOli"  data-toggle="modal"  onclick="cekoli('<?php echo $row->ID_OLI ?>','<?php echo $row->ID_MOBIL ?>','<?php echo $row->MERK_OLI ?>','<?php echo $row->KM_AWAL ?>','<?php echo $row->TANGGAL_GANTI_OLI ?>','<?php echo $row->TOTAL_VOLUME ?>')"><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus" data-placement="top" onclick="hapusoli('<?php echo $row->ID_OLI?>')" data-toggle="modal" href="#HapusOli"><i class="icon-remove"></i></a>
                                   <?php }?>    
                                   </td>
                                </tr>
                                <?php $i++;
                                $j++;
                            } ?>
                             
                        </tbody>
                    </table>
                </div>                
            </div>
        </section>
        <!-- page end-->
    </section>
</section>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Tambah Oli</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/oli_mt/<?php echo $id_mobil; ?> ">
                <div class="modal-body">
                    <!-- form tambah-->

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal (km)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmawal" placeholder="KM Awal" name="KM_AWAL" type="number" required />
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="tglganti" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglganti" name="TANGGAL_GANTI_OLI" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="merkoli" class="col-lg-2 col-sm-2 control-label">Merk Oli</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="merkoli" placeholder="Merk Oli" name="MERK_OLI"  type="text" required />
                        </div>
                    </div> <div class="form-group">
                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume (Liter)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="totalvolume" placeholder="Total Volume" name="TOTAL_VOLUME" type="number" required />
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


<!-- Modal -->
<div class="modal fade" id="ModalEditOli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="<?php echo base_url()?>mt/oli_mt/<?php echo $id_mobil; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Oli</h4>
                </div>
            <div class="modal-body">
                    <!-- form tambah-->
                         <input class=" form-control input-sm m-bot15" id="ID_OLI" name="ID_OLI"  type="hidden" required />
                        <input class=" form-control input-sm m-bot15" id="ID_MOBIL" name="ID_MOBIL" type="hidden" required />
                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal (km)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="KM_AWAL" name="KM_AWAL" minlength="2" type="number" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tglganti" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="TANGGAL_GANTI_OLI" name="TANGGAL_GANTI_OLI" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="merkoli" class="col-lg-2 col-sm-2 control-label">Merk Oli</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="MERK_OLI" name="MERK_OLI" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume (Liter)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="TOTAL_VOLUME" name="TOTAL_VOLUME" minlength="2" type="number" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" name="oli" type="submit" value="Simpan"/>
                </div>
            </form> 
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="HapusOli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Hapus Oli</h4>
            </div>
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url() ?>mt/oli_mt/<?php echo $id_mobil?>">
                    Apakah anda yakin ?
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
						<input type="hidden" value="" name="ID_OLI2" id="ID_OLI2"></input>
						<input type="submit" value="Hapus" name="deleteoli" class="btn btn-danger danger"></input>
					</div>
					</form>
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
        
    $('#HapusOli').on('show', function() {

    });
    
   
    function hapus(id,id_mobil) {
        globalId = id;
        globalIdMobil = id_mobil;
        $('#HapusOli').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_oli/" + globalId+ "/" + globalIdMobil;
        window.location.href = url;
    }
    
    var index;
        
        function setDetail(index){
            var action = "<?php echo base_url()?>mt/edit_oli/"+oli[index]['id']+"/"+<?php echo $id_mobil?>;
           
            
            $("#KM_AWAL").val(oli[index]['KM_AWAL']);
            $("#MERK_OLI").val(oli[index]['MERK_OLI']);
            $("#TANGGAL_GANTI_OLI").val(oli[index]['TANGGAL_GANTI_OLI']);
            $("#TOTAL_VOLUME").val(oli[index]['TOTAL_VOLUME']);
            $("#form-edit").attr("action",action ); 
           
        }
         function hapusoli(id) {
        $('#ID_OLI2').val(id);
    }
        function cekoli(id_oli, id_mobil, merk_oli, km_awal, tanggal_ganti_oli,total_volume) {
                                                                $("#ID_OLI").val(id_oli);
                                                                $("#ID_MOBIL").val(id_mobil);
                                                                $("#MERK_OLI").val(merk_oli);
                                                                $("#KM_AWAL").val(km_awal);
                                                                $("#TANGGAL_GANTI_OLI").val(tanggal_ganti_oli);
                                                                $("#TOTAL_VOLUME").val(total_volume);
                                                            }
    
</script>
