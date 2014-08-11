
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Pengaturan Depot
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                    <div class="row">
                        <label for="cnamadepot" class="control-label col-lg-2">Nama Depot</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="namadepot" name="nama" minlength="2" type="text"  required />
                        </div>
                    </div>

                    <div class="row">
                        <label for="calamatdepot" class="control-label col-lg-2">Alamat Depot</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control input-sm m-bot15" id="alamatdepot" name="alamat" minlength="2" type="text" rows="3" required ></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <label for="cnamaoh" class="control-label col-lg-2">Nama Operation Head (OH)</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="namaoh" name="namaoh" minlength="2" type="text"  required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input style="float:right;" class="btn btn-success" type="submit" value="Simpan"/>    
                        </div>

                    </div>
                </form>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Pengaturan User
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">


                        <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahUser">
                            Tambah User <i class="icon-plus"></i>
                        </a>


                        
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>1</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Firman</td>
                                <td>Site Supervisor</td>
                                <td>SS</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalTambahUser" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Firman</td>
                                <td>Staf OAM</td>
                                <td>Staf OAM</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalTambahUser" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                
                            </tr>
                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Firman</td>
                                <td>Site Supervisor</td>
                                <td>SS</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalTambahUser" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                
                            </tr>
                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Fiqri</td>
                                <td>Pengawas Operasi</td>
                                <td>PO</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalTambahUser" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>

<div class="modal fade" id="ModalTambahUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Setting User</h4>
            </div>
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">

                                    <div class="panel-body">


                                        <div class="form-group ">
                                            <label for="cnama" class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cnama" name="nama" minlength="2" type="text" required />
                                            </div>

                                            <label for="cjabatan" class="control-label col-lg-2">Nama</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan">
                                                    <option>Supir</option>
                                                    <option>Kernet</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <label for="ctempatlahir" class="control-label col-lg-2">Tempat Lahir</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="tempatlahir" minlength="2" type="text" required />
                                            </div>
                                            
                                            <label for="cklas" class="control-label col-lg-2">Klasifikasi</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="cklas" name="klas">
                                                    <option>OAM</option>
                                                    <option>Staf OAM</option>
                                                    <option>SS</option>
                                                    <option>PO</option>
                                                    <option>Supporting</option>
                                                </select>
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

