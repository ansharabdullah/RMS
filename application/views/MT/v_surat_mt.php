
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

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
                    
                    <p>Nopol : </p>
                    <p>Kapasitas :</p>
                    <p>Produk : </p>
                    
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
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->ID_JENIS_SURAT; ?></td>
                                    <td><?php echo $row->TANGGAL_AKHIR_SURAT; ?></td>
                                   <td><?php echo $row->KETERANGAN_SURAT; ?></td>
                                   
                                   <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Surat" href="javascript:hapus('<?php echo $row->ID_SURAT ?>');"><i class="icon-remove"></i></a>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/tambah_surat/">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Surat</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->

                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">Jenis Surat</label>
                        <div class="col-lg-10">
                           <select class="form-control input-sm m-bot15" id="status" name="ID_JENIS_SURAT">
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
                            <input class=" form-control input-sm m-bot15" id="stnk" name="TANGGAL_AKHIR_SURAT" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk" name="KETERANGAN_SURAT" minlength="2" type="text" required />
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

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Surat</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->

                   <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="tera">Tera</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15">
                                <option>STNK Per Tahun</option>
                                <option>Pajak</option>
                                <option>Keur</option>
                                <option>Tera</option>
                                
                            </select></div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">Tanggal Berakhir Surat</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk" name="stnk" minlength="2" type="date" required />
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
    $('#HapusSurat').on('show', function() {

    });

    function hapus(id) {
        globalId = id;
        $('#HapusSurat').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_surat/" + globalId;
        window.location.href = url;
    }
    
</script>
