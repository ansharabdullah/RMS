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
        var ap;
        <?php
             foreach($surat as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_SURAT?>";
                 ap['ID_JENIS_SURAT'] = "<?php echo $a->ID_JENIS_SURAT?>";
                 ap['TANGGAL_AKHIR_SURAT'] = "<?php echo $a->TANGGAL_AKHIR_SURAT?>";
                 ap['KETERANGAN_SURAT'] = "<?php echo $a->KETERANGAN_SURAT?>";
                 
                 surat.push(ap);
                 <?php
             }
                        ?>
        
    });
</script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
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
                <div class="adv-table editable-table" style="overflow-y: scroll ">
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
                                <th>keterangan</th>
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
                                   <td> <?php if($row->KETERANGAN_SURAT == "0")echo 'Aktif'?>
                                        <?php if($row->KETERANGAN_SURAT == "1")echo 'Tidak AKtif'?>
                                    </td>
                                   
                                   <td><a class="btn btn-warning btn-xs tooltips" href="#ModalEditSurat"  data-toggle="modal"  onclick="setDetail('<?php echo $j ?>')" ><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Surat" href="javascript:hapus('<?php echo $row->ID_SURAT ?>','<?php echo $id_mobil; ?>');"><i class="icon-remove"></i></a>
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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/tambah_surat/<?php echo $id_mobil; ?>">
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
                            <input class=" form-control input-sm m-bot15" id="stnk" name="TANGGAL_AKHIR_SURAT" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk" placeholder="Keterangan Surat" name="KETERANGAN_SURAT" minlength="2" type="text" required />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" onclick="this.form.reset()">Batal</button>
                    <input class="btn btn-success" type="submit" value="Simpan"/>
                </div>
            </form> 

        </div>
    </div>
</div>

<div class="modal fade" id="ModalEditSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Surat</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->

                   <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="tera">Jenis Surat</label>
                        <div class="col-lg-10">
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
                    <input class="btn btn-success" type="submit" value="Simpan"/>
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

                Apakah anda yakin ?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                <a href="#" onclick="ok()" class="btn btn-danger danger">Hapus</a>
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
        
        function setDetail(index){
            var action = "<?php echo base_url()?>mt/edit_surat/"+surat[index]['id']+"/"+<?php echo $id_mobil?>;
           
            
            $("#ID_JENIS_SURAT").val(surat[index]['ID_JENIS_SURAT']);
            $("#TANGGAL_AKHIR_SURAT").val(surat[index]['TANGGAL_AKHIR_SURAT']);
            $("#KETERANGAN_SURAT").val(surat[index]['KETERANGAN_SURAT']);
            $("#form-edit").attr("action",action ); 
           
        }
    
</script>
