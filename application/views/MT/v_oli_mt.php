
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <!-- page start-->

        <section class="panel">
            <header class="panel-heading">
                <i class="icon-beer"></i> Oli MT
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
                Tabel Oli MT
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-y: scroll">
                    <div class="clearfix">
                        <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                            Tambah Oli MT <i class="icon-plus"></i>
                        </a>
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
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                        <td><?php echo $row->KM_AWAL; ?></td>
                                    <td><?php echo $row->TANGGAL_GANTI_OLI; ?></td>
                                    <td><?php echo $row->MERK_OLI; ?></td>
                                    <td><?php echo $row->TOTAL_VOLUME; ?></td>
                                   
                                    <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Oli" href="javascript:hapus('<?php echo $row->ID_OLI ?>');"><i class="icon-remove"></i></a>
                                </td>
                                </tr>
                                <?php $i++;
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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/tambah_oli/">
                <div class="modal-body">
                    <!-- form tambah-->

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal (km)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmawal" name="KM_AWAL" minlength="2" type="text" required />
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="tglganti" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglganti" name="TANGGAL_GANTI_OLI" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="merkoli" class="col-lg-2 col-sm-2 control-label">Merk Oli</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="merkoli" name="MERK_OLI" minlength="2" type="text" required />
                        </div>
                    </div> <div class="form-group">
                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume (Liter)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="totalvolume" name="TOTAL_VOLUME" type="text" required />
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


<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Edit Oli</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                <div class="modal-body">
                    <!-- form tambah-->

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal (km)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmawal" name="kmawal" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tglganti" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglganti" name="tglganti" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="merkoli" class="col-lg-2 col-sm-2 control-label">Merk Oli</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="merkoli" name="merkoli" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume (Liter)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="totalvolume" name="totalvolume" minlength="2" type="text" required />
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
<div class="modal fade" id="HapusOli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Hapus Oli</h4>
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
    $('#HapusOli').on('show', function() {

    });

    function hapus(id) {
        globalId = id;
        $('#HapusOli').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_oli/" + globalId;
        window.location.href = url;
    }
    
</script>
