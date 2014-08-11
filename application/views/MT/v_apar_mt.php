
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
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
                APAR MT   
            </header>
            <div class="panel-body">
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
                                            <input type="date" class="form-control" id="inputJK" placeholder="Store Pressure">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                                        <div class="col-lg-10">
                                            <input type="date" class="form-control" id="nomesin" placeholder="Catridge">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                                        <div class="col-lg-10">
                                            <input type="date" class="form-control" id="inputKompartemen4" placeholder="C02">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                                        <div class="col-lg-10">
                                            <input type="keterangan" class="form-control" id="inputKompartemen4" placeholder="Keterangan">
                                        </div>
                                    </div>
                                </form> 
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                <button class="btn btn-success" type="button">Simpan</button>
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
                            <td>23/02/2009</td>
                            <td>23/08/2009</td>
                            <td>23/02/2009</td>
                            <td></td>
                            <td><a class="btn btn-warning tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>2</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td></td>
                            <td><a class="btn btn-warning tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>3</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td></td>
                            <td><a class="btn btn-warning tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>4</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td></td>
                            <td><a class="btn btn-warning tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>5</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td></td>
                            <td><a class="btn btn-warning tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>6</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td>23/02/2009</td>
                            <td></td>
                            <td><a class="btn btn-warning tooltips" data-original-title="Edit Apar" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                            <a class="btn btn-danger tooltips" data-original-title="Hapus Apar" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" class="btn btn-warning" style="float:left;"><i class=" icon-circle-arrow-lef"></i> Kembali</a>
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
                            <form class="form-horizontal" role="form">

                                <div class="form-group">
                                    <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Store Pressure</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" id="inputJK" placeholder="Store Pressure">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Catridge</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" id="nomesin" placeholder="Catridge">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="norangka" class="col-lg-2 col-sm-2 control-label">C02</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" id="inputKompartemen4" placeholder="C02">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="norangka" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                                    <div class="col-lg-10">
                                        <input type="keterangan" class="form-control" id="inputKompartemen4" placeholder="Keterangan">
                                    </div>
                                </div>
                            </form> 
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                            <button class="btn btn-success" type="button">Simpan</button>
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
                            <form class="form-horizontal" role="form">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                            <button class="btn btn-success" type="button">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                
                            </div>
                            <div class="modal-body">

                                Apakah anda yakin akan menghapus Data APAR Mobil Tangki?

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                <button class="btn btn-warning" type="button"> Yes</button>
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