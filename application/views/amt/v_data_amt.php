
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <?php if ($success ) { ?>
            <div class="alert alert-block alert-success fade in">
                <strong>Berhasil!</strong> <?php echo $success ?>
            </div>
        <?php } ?>
        
        <?php if ($error) { ?>
            <div class="alert alert-block alert-danger fade in">
                <strong>Error!</strong> <?php echo $error ?>
            </div>
        <?php } ?>
        <section class="panel">
            <header class="panel-heading">
                Data Crew AMT
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-x: scroll">
                    <div class="clearfix">


                        <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahManual">
                            Tambah AMT <i class="icon-plus"></i>
                        </a>

                        <a class="btn btn-success" href="<?php echo base_url() ?>amt/import_amt">
                            Import Excel <i class="icon-plus"></i>
                        </a>

                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                <li><a href="javascript:FilterData('aktif.');">Aktif</a></li>
                                <li><a href="javascript:FilterData('peringatan');">Dalam Peringatan</a></li>
                                <li><a href="javascript:FilterData('tidak aktif');">Tidak Aktif</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Klasifikasi</th>
                                <th>Tanggal Masuk</th>
                                <th>Transportir Asal</th>
                                <th>No Telp</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($amt as $row) {
                                ?>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI; ?>/<?php echo date("n")?>/<?php echo date("Y")?>" style ="text-decoration: underline"><?php echo $row->NIP; ?></a></td>

                                    <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                    <td><?php echo $row->JABATAN; ?></td>
                                    <td><?php echo $row->KLASIFIKASI; ?></td>
                                    <td><?php echo $row->TANGGAL_MASUK; ?></td>
                                    <td><?php echo $row->TRANSPORTIR_ASAL; ?></td>
                                    <td><?php echo $row->NO_TELEPON; ?></td>
                                    <td><span class="label label-success"><?php echo $row->STATUS; ?>.</span></td>
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

<div class="modal fade" id="ModalTambahManual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah AMT</h4>
            </div>
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>amt/tambah_pegawai/">

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">

                                    <div class="panel-body">


                                        <div class="form-group ">
                                            <label for="nip" class="control-label col-lg-2">NIP</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cnip" name="nip" minlength="2" type="text" required />
                                            </div>

                                            <div class="col-lg-4">
                                                <input type="checkbox"> On Call
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="nama_pegawai" class="control-label col-lg-2">Nama</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cnama" name="nama_pegawai" minlength="2" type="text" required />
                                            </div>

                                            <label for="jabatan" class="control-label col-lg-2">Jabatan</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan">
                                                    <option value="SUPIR">Supir</option>
                                                    <option value="KERNET">Kernet</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <label for="cklas" class="control-label col-lg-2">Klasifikasi</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cklas" name="klasifikasi">
                                                    <option value="8">8</option>
                                                    <option value="16">16</option>
                                                    <option value="24">24</option>
                                                    <option value="32">32</option>
                                                    <option value="40">40</option>
                                                </select>
                                            </div>

                                            <label for="cstatus" class="control-label col-lg-2">Status</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cstatus" name="status">
                                                    <option value="AKTIF">Aktif</option>
                                                    <option value="TIDAK AKTIF">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="ctempatlahir" class="control-label col-lg-2">Tempat Lahir</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="tempat_lahir" minlength="2" type="text"/>
                                            </div>

                                            <label for="ctgllahir" class="control-label col-lg-2">Tanggal Lahir</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctgllahir" name="tanggal_lahir" size="16" type="date" value=""/>
                                                <span class="help-block">Pilih tanggal</span>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cktp" class="control-label col-lg-2">No. KTP</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cktp" minlength="2" type="text" name="no_ktp" />
                                            </div>

                                            <label for="csim" class="control-label col-lg-2">No. SIM</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="csim" name="no_sim" minlength="2" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="ctelp" class="control-label col-lg-2">No. Telp</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctelp" name="no_telepon" minlength="2" type="text" />
                                            </div>

                                            <label for="ctransportir" class="control-label col-lg-2">Transportir Asal</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctransportir" name="transportir_asal" minlength="2" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group ">

                                            <label for="ctglmasuk" class="control-label col-lg-2">Tanggal Masuk</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctglmasuk" name="tanggal_masuk" type="date" size="16" type="text" value="" />
                                                <span class="help-block">Pilih tanggal</span>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="calamat" class="control-label col-lg-2">Alamat</label>
                                            <div class="col-lg-10">
                                                <textarea class=" form-control input-sm m-bot15" id="calamat" name="alamat" minlength="2" type="text" ></textarea>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Image Upload</label>
                                            <div class="col-md-9">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">

                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                            <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                            <input type="file" class="default" name="photo"/>
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                                <span class="label label-danger">NOTE!</span>
                                                <span>
                                                    Gambar yang dilampirkan 
                                                    hanya dapat dilihat dalam  
                                                    Firefox, Chrome, Opera, 
                                                    Safari terbaru dan Internet Explorer 10


                                                </span>
                                            </div>
                                        </div>





                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="reset" data-dismiss="modal" class="btn btn-default" value="Batal">
                        <input class="btn btn-success" type="submit" value="Simpan"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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



</script>

