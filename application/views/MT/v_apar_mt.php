
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

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
                    <p>Nopol : D8900AD</p>
                    <p>Kapasitas : 16</p>
                    <p>Produk : Pertamax</p>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel APAR MT   
            </header>

            <div class="panel-body">
<<<<<<< HEAD
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <a class="btn btn-info" data-toggle="modal" href="#myModal">
                            Tambah APAR <i class="icon-plus"></i>
                        </a>
                    </div>

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>Store Pressure</th>
                                <th>Catridge</th>
                                <th>C02</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>1</td>
                                <td>23/02/2014</td>
                                <td>23/08/2014</td>
                                <td>23/02/2014</td>
                                <td></td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>2</td>
                                <td>22/02/2013</td>
                                <td>22/02/2013</td>
                                <td>22/02/2013</td>
                                <td></td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>3</td>
                                <td>21/02/2012</td>
                                <td>21/02/2012</td>
                                <td>21/02/2012</td>
                                <td></td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>4</td>
                                <td>20/02/2011</td>
                                <td>20/02/2011</td>
                                <td>20/02/2011</td>
                                <td></td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>5</td>
                                <td>19/02/2010</td>
                                <td>19/02/2010</td>
                                <td>19/02/2010</td>
                                <td></td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>6</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td></td>
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

=======
                <a class="btn btn-info" data-toggle="modal" href="#myModal">
                    Tambah APAR <i class="icon-plus"></i>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Form Tambah APAR</h4>
                            </div>
                            <div class="modal-body">
                                <!-- form tambah-->
                                <form class="form-horizontal" role="form">

                                    <div class="form-group">
                                        <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="sp" name="sp"  type="date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="cat" name="cat"  type="date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="co" name="co"  type="date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Status</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control input-sm m-bot15" id="status" name="status"  type="text" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                        <input class="btn btn-success" type="submit" value="Simpan"/>
                                    </div>
                                </form> 
                            </div>
>>>>>>> cc6b7489f914833b4441c012e94a0ffc63f7e5c9

        </section>

        <!-- page end-->
    </section>
</section>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Tambah APAR</h4>
            </div>
            <div class="modal-body">
                <!-- form tambah-->
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                    <div class="form-group">
                        <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="sp" name="sp" minlength="2" type="date" required />
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="cat" name="cat" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="co" name="co" minlength="2" type="date" required />
=======
                </div>
                <!-- modal -->

                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                        <tr>
                            <th style="display:none;"></th>
                            <th>No.</th>
                            <th>Store Pressure</th>
                            <th>Catridge</th>
                            <th>C02</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>1</td>
                            <td>23/02/2014</td>
                            <td>23/08/2014</td>
                            <td>23/02/2014</td>
                            <td><span class="label label-success">Aktif.</span></td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>2</td>
                            <td>22/02/2013</td>
                            <td>22/02/2013</td>
                            <td>22/02/2013</td>
                           <td><span class="label label-default">Tidak Aktif</span></td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>3</td>
                            <td>21/02/2012</td>
                            <td>21/02/2012</td>
                            <td>21/02/2012</td>
                            <td><span class="label label-default">Tidak Aktif</span></td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>4</td>
                            <td>20/02/2011</td>
                            <td>20/02/2011</td>
                            <td>20/02/2011</td>
                            <td><span class="label label-default">Tidak Aktif</span></td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>5</td>
                            <td>19/02/2010</td>
                            <td>19/02/2010</td>
                            <td>19/02/2010</td>
                           <td><span class="label label-default">Tidak Aktif</span></td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>6</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td><span class="label label-default">Tidak Aktif</span></td>
                            <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Form Edit APAR</h4>
                        </div>
                        <div class="modal-body">
                            <!-- form tambah-->
                            <form class="form-horizontal" role="form">

                                <div class="form-group">
                                    <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="sp" name="sp"  type="date" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="cat" name="cat"  type="date" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="co" name="co"  type="date" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="norangka" class="col-lg-2 col-sm-2 control-label">Status</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control input-sm m-bot15" id="status" name="status"  type="text" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                    <input class="btn btn-success" type="submit" value="Simpan"/>
                                </div>
                            </form> 
>>>>>>> cc6b7489f914833b4441c012e94a0ffc63f7e5c9
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="keterangan" name="keterangan" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
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
                <h4 class="modal-title">Form Edit APAR</h4>
            </div>
            <div class="modal-body">
                <!-- form tambah-->
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                    <div class="form-group">
                        <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="sp" name="sp" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="cat" name="cat" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="co" name="co" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="keterangan" name="keterangan" minlength="2" type="date" required />
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

<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
