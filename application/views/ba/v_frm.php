<script type="text/javascript">
    $( document ).ready(function() {
        $("#filePreview").hide();
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {    
                $("#filePreview").hide();
                $("#filePreview").slideDown("slow");
                $("#tgl").html($("#tglForm").val());
            }
            e.preventDefault();
        });
    });
    
    
</script>



<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Tarif Interpolasi dan FRM
            </header>
            <div class ="panel-body">
                <a style="float:right;" data-placement="left" href="#ModalTambah" data-toggle="modal" class="btn btn-primary tooltips" data-original-title="Tambah"> Tambah Data <i class="icon-plus"></i></a>
            </div>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="tglForm" class="form-control"  placeholder="Tanggal">
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-warning">Cek</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        
        <div id="filePreview">
            <section class="panel">
                <header class="panel-heading">
                    Tabel Tarif Interpolasi dan FRM (<span id="tgl"></span>)
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">

                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Harga FRM</th>
                                    <th>Tarif Interpolasi (Rp./Ltr)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>1</td>
                                    <td>1 - 14 Agustus 2014</td>
                                    <td>30</td>
                                    <td>32</td>
                                    <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>2</td>
                                    <td>15 - 31 Agustus 2014</td>
                                    <td>31</td>
                                    <td>33</td>
                                    <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">

                                <div class="form-group ">
                                    <label for="cfrm" class="control-label col-lg-4">Harga FRM</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="cfrm" name="frm" minlength="2" type="text" required />
                                    </div>


                                </div>


                                <div class="form-group ">
                                    <label for="cinterpolasi" class="control-label col-lg-4">Tarif Interpolasi (Rp./Ltr)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="cinterpolasi" name="interpolasi" minlength="2" type="text" required />
                                    </div>


                                </div>


                            </div>
                        </section>
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



<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">

                                <div class="form-group ">
                                    <label for="cbulan" class="control-label col-lg-2">Bulan</label>
                                    <div class="col-lg-10">
                                        <input type="month" required="required" id="bln" class="form-control"  placeholder="bulan">
                                    </div>


                                </div>


                                <div class="form-group ">
                                    <label for="cfrm" class="control-label col-lg-12">Harga FRM</label></br>
                                    <label for="cfrm1" class="control-label col-lg-2">1-14</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cfrm1" name="frm1" minlength="2" type="text" required />
                                    </div>

                                    <label for="cfrm2" class="control-label col-lg-2">15-akhir</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cfrm2" name="frm2" minlength="2" type="text" required />
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="cinterpolasi" class="control-label col-lg-12">Tarif Interpolasi (Rp./Ltr)</label></br>
                                    <label for="cinterpolasi1" class="control-label col-lg-2">1-14</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cinterpolasi1" name="interpolasi1" minlength="2" type="text" required />
                                    </div>

                                    <label for="cinterpolasi" class="control-label col-lg-2">15-akhir</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cinterpolasi2" name="interpolasi2" minlength="2" type="text" required />
                                    </div>
                                </div>


                            </div>
                        </section>
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