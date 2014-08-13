
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Data Crew AMT
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        

                            <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahManual">
                                Tambah AMT <i class="icon-plus"></i>
                            </a>

                            <a class="btn btn-success" href="<?php echo base_url() ?>amt/import_amt">
                                Import CSV <i class="icon-plus"></i>
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

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>1</td>
                                <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">3205190001</a></td>
                                <td>Firman</td>
                                <td>Supir</td>
                                <td>8</td>
                                <td>20 Mei 2010</td>
                                <td>PT. Patra Niaga</td>
                                <td>085222198675</td>
                                <td><span class="label label-success">Aktif.</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">3205190002</a></td>
                                <td>Fiqri</td>
                                <td>Supir</td>
                                <td>16</td>
                                <td>12 Agustus 2012</td>
                                <td>PT. Incot</td>
                                <td>0852220183675</td>
                                <td><span class="label label-success">Aktif.</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">3205190003</a></td>
                                <td>Firdaus</td>
                                <td>Kernet</td>
                                <td>24</td>
                                <td>13 Januari 2011</td>
                                <td>PT. Ma'soem</td>
                                <td>085773029675</td>
                                <td><span class="label label-default">Tidak Aktif</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">3205190004</a></td>
                                <td>Anshar</td>
                                <td>Supir</td>
                                <td>8</td>
                                <td>10 Oktober 2010</td>
                                <td>PT. Patra Niaga</td>
                                <td>085728339125</td>
                                <td><span class="label label-warning">Peringatan</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>5</td>
                                <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">3205190005</a></td>
                                <td>Abdullah</td>
                                <td>Kernet</td>
                                <td>24</td>
                                <td>14 Februari 2010</td>
                                <td>PT. Incot</td>
                                <td>085977543175</td>
                                <td><span class="label label-warning">Peringatan</span></td>
                            </tr>

                            <tr class="">

                                <td style="display:none;"></td>
                                <td>6</td>
                                <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">3205190006</a></td>                                

                                <td>Chepy</td>
                                <td>Kernet</td>
                                <td>40</td>
                                <td>30 September 2013</td>
                                <td>PT. Ma'soem</td>
                                <td>085200986675</td>
                                <td><span class="label label-success">Aktif.</span></td>
                            </tr>
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
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

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
                                            <label for="cnama" class="control-label col-lg-2">Nama</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cnama" name="nama" minlength="2" type="text" required />
                                            </div>

                                            <label for="cjabatan" class="control-label col-lg-2">Jabatan</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan">
                                                    <option>Supir</option>
                                                    <option>Kernet</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <label for="cklas" class="control-label col-lg-2">Klasifikasi</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cklas" name="klas">
                                                    <option>8</option>
                                                    <option>16</option>
                                                    <option>24</option>
                                                    <option>32</option>
                                                    <option>40</option>
                                                </select>
                                            </div>

                                            <label for="cstatus" class="control-label col-lg-2">Status</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cstatus" name="status">
                                                    <option>Aktif</option>
                                                    <option>Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="ctempatlahir" class="control-label col-lg-2">Tempat Lahir</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="tempatlahir" minlength="2" type="text" required />
                                            </div>

                                            <label for="ctgllahir" class="control-label col-lg-2">Tanggal Lahir</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctgllahir" name="tgllahir" size="16" type="date" value="" required/>
                                                <span class="help-block">Pilih tanggal</span>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cktp" class="control-label col-lg-2">No. KTP</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cktp" name="ktp" minlength="2" type="text" required />
                                            </div>

                                            <label for="csim" class="control-label col-lg-2">No. SIM</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="csim" name="sim" minlength="2" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="ctelp" class="control-label col-lg-2">No. Telp</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctelp" name="telp" minlength="2" type="text" required />
                                            </div>

                                            <label for="ctransportir" class="control-label col-lg-2">Transportir Asal</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctransportir" name="transportir" minlength="2" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">

                                            <label for="ctglmasuk" class="control-label col-lg-2">Tanggal Masuk</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctglmasuk" name="tglmasuk" type="date" size="16" type="text" value="" required/>
                                                <span class="help-block">Pilih tanggal</span>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="calamat" class="control-label col-lg-2">Alamat</label>
                                            <div class="col-lg-10">
                                                <textarea class=" form-control input-sm m-bot15" id="calamat" name="alamat" minlength="2" type="text" required ></textarea>
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
                                                            <input type="file" class="default"/>
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                                <span class="label label-danger">NOTE!</span>
                                                <span>
                                                    Attached image thumbnail is
                                                    supported in Latest Firefox, Chrome, Opera,
                                                    Safari and Internet Explorer 10 only
                                                </span>
                                            </div>
                                        </div>





                                    </div>
                                </section>
                            </div>
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

