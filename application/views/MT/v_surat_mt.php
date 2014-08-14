
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
                    <p>Nopol : D8900AD</p>
                    <p>Kapasitas : 16</p>
                    <p>Produk : Pertamax</p>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Surat Mobil Tangki
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <a class="btn btn-info" data-toggle="modal" href="#myModal">
                            Tambah Surat MT <i class="icon-plus"></i>
                        </a>
                    </div>

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>Tera</th>
                                <th>STNK Per Tahun</th>
                                <th>STNK 5 Tahun</th>
                                <th>KIR LLD</th>
                                <th>KIR Pertamina</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>1</td>
                                <td>23-08-2014</td>
                                <td>23-08-2014</td>
                                <td>23-08-2014</td>
                                <td>23-08-2014</td>
                                <td>23-08-2014</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus surat" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>2</td>
                                <td>23-01-2014</td>
                                <td>23-01-2014</td>
                                <td>23-08-2014</td>
                                <td>23-01-2014</td>
                                <td>23-01-2014</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus surat" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>3</td>
                                <td>23-08-2013</td>
                                <td>23-01-2013</td>
                                <td>23-08-2014</td>
                                <td>23-01-2013</td>
                                <td>23-01-2013</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus surat" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>4</td>
                                <td>23-01-2012</td>
                                <td>23-01-2012</td>
                                <td>23-08-2014</td>
                                <td>23-01-2012</td>
                                <td>23-01-2012</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus surat" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>5</td>
                                <td>23-01-2011</td>
                                <td>23-01-2011</td>
                                <td>23-08-2014</td>
                                <td>23-01-2011</td>
                                <td>23-01-2011</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus surat" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>6</td>
                                <td>23-01-2010</td>
                                <td>23-01-2010</td>
                                <td>23-08-2019</td>
                                <td>23-01-2010</td>
                                <td>23-01-2010</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit surat" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus surat" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Surat</h4>
            </div>
            <div class="modal-body">
                <!-- form tambah-->
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="tera">Tera</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tera" name="tera" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">STNK Per Tahun</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk" name="stnk" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk5" class="col-lg-2 col-sm-2 control-label">STNK 5 Tahun</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk5" name="stnk5" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kirlld" class="col-lg-2 col-sm-2 control-label">KIR LLD</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kirlld" name="kirlld" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kirp" class="col-lg-2 col-sm-2 control-label">KIR Pertamina</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kirp" name="kirp" minlength="2" type="date" required />
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
</div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Edit Surat</h4>
            </div>
            <div class="modal-body">
                <!-- form tambah-->
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="tera">Tera</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tera" name="tera" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk" class="col-lg-2 col-sm-2 control-label">STNK Per Tahun</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk" name="stnk" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stnk5" class="col-lg-2 col-sm-2 control-label">STNK 5 Tahun</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="stnk5" name="stnk5" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kirlld" class="col-lg-2 col-sm-2 control-label">KIR LLD</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kirlld" name="kirlld" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kirp" class="col-lg-2 col-sm-2 control-label">KIR Pertamina</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kirp" name="kirp" minlength="2" type="date" required />
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
</div>
<!-- modal -->
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button class="btn btn-danger" type="button"> Yes</button>
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
</script>
