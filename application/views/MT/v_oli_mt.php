
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

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
            <div class="panel-body">
                <a class="btn btn-info" data-toggle="modal" href="#myModal">
                    Oli MT <i class="icon-plus"></i>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Form Tambah Oli</h4>
                            </div>
                            <div class="modal-body">
                                <!-- form tambah-->
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="kmawal" name="kmawal"  type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kmakhir" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti Oli</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="kmakhir" name="kmakhir"  type="date" required />
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="Keterangan" class="col-lg-2 col-sm-2 control-label">Merk Oli</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="merk" name="merk"  type="text" required />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Total Volume</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="totalvolume" name="totalvolume"  type="text" required />
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

                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th>No.</th>
                            <th>KM Awal (KM)</th>
                            <th>Tanggal Ganti Oli</th>
                            <th>Merk Oli</th>
                            <th>Total Volume (Liter)</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>1</td>
                            <td>12200</td>
                            <td>23-08-2014</td>
                            <td>Federal</td>
                            <td>3</td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>2</td>
                            <td>10200</td>
                            <td>23-08-2013</td>
                            <td>Federal</td>
                            <td>3</td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>3</td>
                           <td>9200</td>
                            <td>23-08-2012</td>
                            <td>Federal</td>
                            <td>3</td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>4</td>
                            <td>7200</td>
                            <td>13-08-2012</td>
                            <td>Federal</td>
                            <td>3</td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>5</td>
                            <td>6200</td>
                            <td>12-08-2011</td>
                            <td>Federal</td>
                            <td>3</td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>6</td>
                           <td>5200</td>
                            <td>13-08-2010</td>
                            <td>Federal</td>
                            <td>3</td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit oli" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus oli" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                    </tbody>
                </table>
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
                        <div class="modal-body">
                            <!-- form tambah-->
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label col-lg-2" for="kmawal">KM Awal</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="kmawal" name="kmawal"  type="text" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kmakhir" class="col-lg-2 col-sm-2 control-label">KM Akhir</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="kmakhir" name="kmakhir"  type="text" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Total Volume" class="col-lg-2 col-sm-2 control-label">Merk Oli</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="merk" name="merk"  type="text" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tv" class="col-lg-2 col-sm-2 control-label">Total Volume</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="tv" name="tv"  type="text" required />
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
        </section>

        <!-- page end-->
    </section>
</section>



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
