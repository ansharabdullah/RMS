
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <section class="panel">
            <header class="panel-heading">
                Pengaturan User OAM
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
                                <th>Username</th>
                                <th>Password</th>
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
                                <td>firman</td>
                                <td>************</td>
                                <td>SS</td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#Modaledit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#Modaldelete" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>

                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Firman</td>
                                <td>firman</td>
                                <td>************</td>
                                <td>Staf OAM</td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#Modaledit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#Modaldelete" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>

                            </tr>
                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Firman</td>
                                <td>firman</td>
                                <td>************</td>
                                <td>SS</td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#Modaledit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#Modaldelete" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>

                            </tr>
                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td>firman.fiqri@gmail.com</td>
                                <td>Fiqri</td>
                                <td>firman</td>
                                <td>************</td>
                                <td>PO</td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#Modaledit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#Modaldelete" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
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

<!-- modal -->
<div class="modal fade" id="Modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Hapus User</h4>
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

<div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit User</h4>
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
                                                <input class=" form-control input-sm m-bot15" id="cemail" name="email" minlength="2" type="text" required />
                                            </div>

                                            <label for="cjabatan" class="control-label col-lg-2">Nama</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cnama" name="nama" minlength="2" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cnama" class="control-label col-lg-2">Username</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="username" name="username" minlength="2" type="text" required />
                                            </div>

                                            <label for="cjabatan" class="control-label col-lg-2">Password</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="password" name="password" minlength="2" type="password" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <label for="ctempatlahir" class="control-label col-lg-2">Hak Akses</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="ha" name="ha">
                                                    <option>Staf OAM</option>
                                                    <option>SS</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
</div>

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
                                                <input class=" form-control input-sm m-bot15" id="cemail" name="email" minlength="2" type="text" required />
                                            </div>

                                            <label for="cjabatan" class="control-label col-lg-2">Nama</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="cnama" name="nama" minlength="2" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cnama" class="control-label col-lg-2">Username</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="username" name="username" minlength="2" type="text" required />
                                            </div>

                                            <label for="cjabatan" class="control-label col-lg-2">Password</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="password" name="password" minlength="2" type="password" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <label for="ctempatlahir" class="control-label col-lg-2">Hak Akses</label>
                                            <div class="col-lg-4">
                                                <select class="form-control input-sm m-bot15" id="ha" name="ha">
                                                    <option>Staf OAM</option>
                                                    <option>SS</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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

