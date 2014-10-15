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
    var surat = new Array();
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
                    <li class="active">Surat Mobil</li>
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
                <i class="icon-envelope"></i> Surat MT
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
                Tabel Surat Mobil Tangki
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table" style="overflow-x: scroll ">
                    <div class="clearfix">
                        <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                            Tambah Surat MT <i class="icon-plus"></i>
                        </a>
                    </div>

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Berakhir Surat</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $j=0;
                                foreach ($surat as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php if($row->ID_JENIS_SURAT == "1")echo 'STNK'?>
                                        <?php if($row->ID_JENIS_SURAT == "2")echo 'Pajak'?>
                                        <?php if($row->ID_JENIS_SURAT == "3")echo 'KEUR'?>
                                        <?php if($row->ID_JENIS_SURAT == "4")echo 'TERA'?>
                                    </td>
                                    <td><?php echo(DateToIndo($row->TANGGAL_AKHIR_SURAT)); ?></td>
                                     
                                    <td><?php echo $row->KETERANGAN_SURAT; ?></td>
                                   
                                   <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Surat" href="#ModalEditSurat"  data-toggle="modal"  onclick="ceksurat('<?php echo $row->ID_SURAT ?>','<?php echo $row->ID_MOBIL ?>','<?php echo $row->ID_JENIS_SURAT ?>','<?php echo $row->TANGGAL_AKHIR_SURAT ?>','<?php echo $row->KETERANGAN_SURAT ?>')"><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus" data-placement="top" onclick="hapusSurat('<?php echo $row->ID_SURAT?>')" data-toggle="modal" href="#HapusSurat"><i class="icon-remove"></i></a>
                                       </td>
                                </tr>
                                <?php 
                                $i++;
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/surat_mt/<?php echo $id_mobil; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Surat</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->

                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">Jenis Surat</label>
                        <div class="col-lg-10">
                           <select class="form-control input-sm m-bot15" id="ID_JENIS_SURAT" name="ID_JENIS_SURAT">
                                <option value="1">STNK</option>
                                <option value="2">PAJAK</option>
                                <option value="3">KEUR</option>
                                <option value="4">TERA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">Tanggal Berakhir Surat</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk" name="TANGGAL_AKHIR_SURAT" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kut" name="KETERANGAN_SURAT" type="text" placeholder="Keterangan" required />
                       
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

<div class="modal fade" id="ModalEditSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="<?php echo base_url()?>mt/surat_mt/<?php echo $id_mobil; ?>" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Surat</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->

                   <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="tera">Jenis Surat</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="ID_SURAT" name="ID_SURAT"  type="hidden" required />
                        <input class=" form-control input-sm m-bot15" id="ID_MOBIL" name="ID_MOBIL" type="hidden" required />
                        
                            <select class="form-control input-sm m-bot15" id="ID_JENIS_SURAT" name="ID_JENIS_SURAT">
                                <option <?php if($row->ID_JENIS_SURAT == "1")echo "selected"?> value="1">STNK</option>
                                <option <?php if($row->ID_JENIS_SURAT == "2")echo "selected"?> value="2">PAJAK</option>
                                <option <?php if($row->ID_JENIS_SURAT == "3")echo "selected"?> value="3">KEUR</option>
                                <option <?php if($row->ID_JENIS_SURAT == "4")echo "selected"?> value="4">TERA</option>
                            </select>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">Tanggal Berakhir Surat</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="TANGGAL_AKHIR_SURAT" name="TANGGAL_AKHIR_SURAT" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="KETERANGAN_SURAT" name="KETERANGAN_SURAT" minlength="2" type="text" required />
                           
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" name="editsurat" type="submit" value="Simpan"/>
                </div>
            </form> 

        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="HapusSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Hapus Surat</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="<?php echo base_url() ?>mt/surat_mt/<?php echo $id_mobil?>">
                    Apakah anda yakin ?
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
						<input type="hidden" value="" name="ID_SURAT2" id="ID_SURAT2"></input>
						<input type="submit" value="Hapus" name="deletesurat" class="btn btn-danger danger"></input>
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
        
    $('#HapusSurat').on('show', function() {

    });

    function hapus(id,id_mobil) {
        globalId = id;
         globalIdMobil = id_mobil;
        $('#HapusSurat').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_surat/" + globalId+ "/" + globalIdMobil;
        window.location.href = url;
    }
    
     var index;
        
        function hapusSurat(id) {
        $('#ID_SURAT2').val(id);
    }
        
        function ceksurat(id_surat, id_mobil, id_jenis_surat, tanggal_akhir_surat, keterangan_surat) {
                                                                $("#ID_SURAT").val(id_surat);
                                                                $("#ID_MOBIL").val(id_mobil);
                                                                $("#ID_JENIS_SURAT").val(id_jenis_surat);
                                                                $("#TANGGAL_AKHIR_SURAT").val(tanggal_akhir_surat);
                                                                $("#KETERANGAN_SURAT").val(keterangan_surat);
                                                            }
    
</script>
