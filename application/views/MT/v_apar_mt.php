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
        var ap;
        <?php
             foreach($apar as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_APAR?>";
                 ap['TANGGAL_APAR'] = "<?php echo $a->TANGGAL_APAR?>";
                 ap['ID_JENIS_APAR'] = "<?php echo $a->ID_JENIS_APAR?>";
                 ap['KETERANGAN_APAR'] = "<?php echo $a->KETERANGAN_APAR?>";
                 ap['STATUS_APAR'] = "<?php echo $a->STATUS_APAR?>";
                 
                 apar.push(ap);
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
                    <li><a href="<?php echo base_url() ?>mt/detail_mt/<?php echo $dataMobil->id_mobil; ?>/<?php echo date("n")?>/<?php echo date("Y")?>">Detail Mobil</a></li>
                    <li class="active">Apar Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
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
                        <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahApar">
                            Tambah APAR <i class="icon-plus"></i>
                        </a>
                    </div>

                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>Jenis Apar</th>
                                <th>Tanggal Apar</th>
                                <th>Keterangan</th>
                                <th>Status</th>
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
                                    <td><div id="<?php echo 'status-' . $i; ?>"><?php if($row->STATUS_APAR == "0")echo 'Aktif'?>
                                                <?php if($row->STATUS_APAR == "1")echo 'Tidak Aktif'?></td>
                                                                                    
                                    <td>
                                        
                                        <a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" href="#ModalEditApar"  data-toggle="modal"  onclick="setDetail('<?php echo $j ?>')" ><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" href="javascript:hapus('<?php echo $row->ID_APAR; ?>','<?php echo $id_mobil; ?>')"><i class="icon-remove"></i></a>
                                       
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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/tambah_apar/<?php echo $id_mobil; ?> " >
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
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status" name="STATUS_APAR">
                                <option value="0">Aktif</option>
                                <option value="1">Tidak Aktif</option>
                               
                            </select>
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
                    <input class="btn btn-success" type="submit" value="Simpan"/>
                </div>
            </form> 
        </div>
    </div>
</div>


<div class="modal fade" id="ModalEditApar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Edit APAR</h4>
            </div>
            
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="" >
                <div class="modal-body">
                    <!-- form edit-->
                    
                    <div class="form-group">
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
                        <label for="status" class="col-lg-2 col-sm-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="STATUS_APAR" name="STATUS_APAR">
                                <option <?php if ($row->STATUS_APAR == "0") echo "selected" ?> value="0">Aktif</option>
                                <option <?php if ($row->STATUS_APAR == "1") echo "selected" ?> value="1">Tidak Aktif</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="KETERANGAN_APAR" name="KETERANGAN_APAR" minlength="2" type="text" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                   <button class="btn btn-success" type="submit">Simpan</button>
                </div>
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

                Apakah anda yakin?

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
      
      
        var index;
        
        function setDetail(index){
            var action = "<?php echo base_url()?>mt/edit_apar/"+apar[index]['id']+"/"+<?php echo $id_mobil?>;
           
            
            $("#ID_JENIS_APAR").val(apar[index]['ID_JENIS_APAR']);
            $("#TANGGAL_APAR").val(apar[index]['TANGGAL_APAR']);
            $("#KETERANGAN_APAR").val(apar[index]['KETERANGAN_APAR']);
            $("#STATUS_APAR").val(apar[index]['STATUS_APAR']);
            $("#form-edit").attr("action",action ); 
           
        }
    
    
   
</script>
