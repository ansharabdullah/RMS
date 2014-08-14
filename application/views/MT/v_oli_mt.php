
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
                    <p>Nopol : D8900AD</p>
                    <p>Kapasitas : 16</p>
                    <p>Produk : Pertamax</p>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Oli MT
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <a class="btn btn-info" data-toggle="modal" href="#myModal">
                            Tambah Oli MT <i class="icon-plus"></i>
                        </a>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>KM Awal (KM)</th>
                                <th>KM Akhir (KM)</th>
                                <th>Total Volume</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>1</td>
                                <td>1200</td>
                                <td>1700</td>
                                <td>500</td>
                                <td>Ganti Oli</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>2</td>
                                <td>1700</td>
                                <td>2200</td>
                                <td>500</td>
                                <td>Ganti Oli</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>3</td>
                                <td>2200</td>
                                <td>2700</td>
                                <td>500</td>
                                <td>Ganti Oli</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>4</td>
                                <td>2700</td>
                                <td>3200</td>
                                <td>500</td>
                                <td>Ganti Oli</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>5</td>
                                <td>3200</td>
                                <td>3700</td>
                                <td>500</td>
                                <td>Ganti Oli</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>6</td>
                                <td>3700</td>
                                <td>4200</td>
                                <td>500</td>
                                <td>Ganti Oli</td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a>
                                </td>
                            </tr>
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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                <div class="modal-body">
                    <!-- form tambah-->

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmawal" name="kmawal" minlength="2" type="text" required />
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="kmakhir" class="col-lg-2 col-sm-2 control-label">KM Akhir</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmakhir" name="kmakhir" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="totalvolume" name="totalvolume" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Keterangan" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="keterangan" name="keterangan" minlength="2" type="text" required />
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
                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmawal" name="kmawal" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kmakhir" class="col-lg-2 col-sm-2 control-label">KM Akhir</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="kmakhir" name="kmakhir" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="totalvolume" name="totalvolume" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Keterangan" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="keterangan" name="keterangan" minlength="2" type="text" required />
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
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
