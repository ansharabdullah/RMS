

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="icon-fire-extinguisher"></i> APAR MT   
            </header>
            <div class="panel-body">
                <div class="bio-desk">
                   
                    <p>Nopol : </p>
                    <p>Kapasitas : </p>
                    <p>Produk : </p>
                    
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Data APAR  
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-y: scroll">
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
                                <th>Store Pressure</th>
                                <th>Catridge</th>
                                <th>C02</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <?php $i = 1;
                                foreach ($apar as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    
                                    <td><div id="<?php echo 'apar1-' . $i; ?>"><?php echo $row->STORE_PRESSURE; ?></td>
                                    <td><div id="<?php echo 'apar2-' . $i; ?>"><?php echo $row->CATRIDGE; ?></td>
                                    <td><div id="<?php echo 'apar3-' . $i; ?>"><?php echo $row->CO2; ?></td>
                                    <td><div id="<?php echo 'keterangan-' . $i; ?>"><?php echo $row->KETERANGAN_APAR; ?></td>
                                    <td><div id="<?php echo 'status-' . $i; ?>"><?php if($row->STATUS_APAR == "1")echo 'Aktif'?>
                                                <?php if($row->STATUS_APAR == "0")echo 'Tidak Aktif'?></td>
                                                                                    
                                    <td>
                                        <a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left"  data-toggle="modal"  href="#ModalEditApar" ><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" href="javascript:hapus('<?php echo $row->ID_APAR ?>');"><i class="icon-remove"></i></a>
                                       
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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/tambah_apar/" >
                <div class="modal-body">
                    <!-- form tambah-->


                    <div class="form-group">
                        <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="sp" name="STORE_PRESSURE"  type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="cat" name="CATRIDGE"  type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="co" name="CO2"  type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status" name="STATUS_APAR">
                                <option <?php if($row->STATUS_APAR == "1")echo "selected"?> value="1">Aktif</option>
                                        <option <?php if($row->STATUS_APAR == "0")echo "selected"?> value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="keterangan" name="KETERANGAN_APAR" minlength="2" type="text" required />
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


<div class="modal fade" id="ModalEditApar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Edit APAR</h4>
            </div>
            
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="<?php echo base_url() ?>mt/edit_apar/<?php echo $row->ID_APAR?>" >
                <div class="modal-body">
                    <!-- form edit-->
                    <input type="text" name="id" value="<?php echo $row->ID_APAR?>">
                    <div class="form-group">
                        <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" value="<?php echo $row->STORE_PRESSURE ?>" id="sr" name="store_pressure"  type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" value="<?php echo $row->CATRIDGE ?>" id="catridge" name="catridge"  type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="co2" class="col-lg-2 col-sm-2 control-label">C02</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" value="<?php echo $row->CO2 ?>" id="co2" name="CO2"  type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-lg-2 col-sm-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status_apar" name="STATUS_APAR">
                                <option <?php if ($row->STATUS_APAR == "1") echo "selected" ?> value="1">Aktif</option>
                                <option <?php if ($row->STATUS_APAR == "0") echo "selected" ?> value="0">Tidak Aktif</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" value="<?php echo $row->KETERANGAN_APAR ?>" id="keterangan_apar" name="KETERANGAN_APAR" minlength="2" type="text" required />
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
    $('#ModalHapusApar').on('show', function() {

    });

    function hapus(id) {
        globalId = id;
        $('#ModalHapusApar').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_apar/" + globalId;
        window.location.href = url;
    }
    
</script>
