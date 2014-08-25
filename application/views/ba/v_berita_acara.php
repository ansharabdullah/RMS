<script type="text/javascript">
    $(document).ready(function() {
        $("#filePreview").hide();
        $("#formSiod").submit(function(e) {

            $("#filePreview").hide();
            $("#filePreview").slideDown("slow");
            $("#tgl").html($("#tglForm").val());

            e.preventDefault();
        });
    });


</script>
<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <div class="panel-heading">
                Berita Acara
            </div>
            <div class="panel-body" >
                <div class="col-lg-12">                    
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>ba/ms2">MS2 Complience</a>
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>ba/frm">Tarif Interpolasi dan FRM</a>
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>ba/kpi_operasional">KPI Operasional</a>                    
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>ba/kpi_internal">KPI Internal</a>
                </div>
            </div>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="tglForm" class="form-control"  placeholder="Tanggal">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-12" >
                            <div class="col-lg-4" style="float:right;">
                                <button type="submit"  class="btn btn-success">Generate</button>
                                <button type="submit"  class="btn btn-warning">Cek</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <div id="filePreview">
            <section class="panel">
                <header class="panel-heading">
                    Tabel MS2 Complience (<span id="tgl"></span>)
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table " style="overflow-y: scroll">

                        <div class="space15"></div>
                        <table class="table table-striped table-hover" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Tanggal</th>
                                    <th colspan="3">Sesuai Dengan MS2</th>
                                    <th colspan="3">Cepat (Sebelum MS2)</th>
                                    <th colspan="3">Lebih Cepat (Sebelum Shift 1)</th>
                                    <th colspan="3">Lambat (Setelah MS2)</th>
                                    <th colspan="3">Tidak Terkirim Sesuai Jadwal MS2</th>
                                    <th colspan="3">Total LO</th>
                                    <th rowspan="2" width="150px">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Premium</th>
                                    <th>Solar</th>
                                    <th>Pertamax</th>
                                    <th>Premium</th>
                                    <th>Solar</th>
                                    <th>Pertamax</th>
                                    <th>Premium</th>
                                    <th>Solar</th>
                                    <th>Pertamax</th>
                                    <th>Premium</th>
                                    <th>Solar</th>
                                    <th>Pertamax</th>
                                    <th>Premium</th>
                                    <th>Solar</th>
                                    <th>Pertamax</th>
                                    <th>Premium</th>
                                    <th>Solar</th>
                                    <th>Pertamax</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>1</td>
                                    <td>1 Agustus 2014</td>
                                    <td>46%</td>
                                    <td>45%</td>    
                                    <td>20%</td>
                                    <td>33%</td>
                                    <td>23%</td>
                                    <td>28%</td>
                                    <td>20%</td>
                                    <td>23%</td>
                                    <td>29%</td>
                                    <td>21%</td>
                                    <td>33%</td>
                                    <td>40%</td>
                                    <td>0%</td>
                                    <td>1%</td>
                                    <td>8%</td>
                                    <td>100%</td>
                                    <td>102%</td>
                                    <td>96%</td>
                                    <td>
                                        <a data-placement="top" data-toggle="modal" href="#ModalMs2" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        <a data-placement="top" data-toggle="modal" href="#ModalHapus" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>2</td>
                                    <td>2 Agustus 2014</td>
                                    <td>46%</td>
                                    <td>45%</td>    
                                    <td>20%</td>
                                    <td>33%</td>
                                    <td>23%</td>
                                    <td>28%</td>
                                    <td>20%</td>
                                    <td>23%</td>
                                    <td>29%</td>
                                    <td>21%</td>
                                    <td>33%</td>
                                    <td>40%</td>
                                    <td>0%</td>
                                    <td>1%</td>
                                    <td>8%</td>
                                    <td>100%</td>
                                    <td>102%</td>
                                    <td>96%</td>
                                    <td>
                                        <a data-placement="top" data-toggle="modal" href="#ModalMs2" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        <a data-placement="top" data-toggle="modal" href="#ModalHapus" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>3</td>
                                    <td>3 Agustus 2014</td>
                                    <td>46%</td>
                                    <td>45%</td>    
                                    <td>20%</td>
                                    <td>33%</td>
                                    <td>23%</td>
                                    <td>28%</td>
                                    <td>20%</td>
                                    <td>23%</td>
                                    <td>29%</td>
                                    <td>21%</td>
                                    <td>33%</td>
                                    <td>40%</td>
                                    <td>0%</td>
                                    <td>1%</td>
                                    <td>8%</td>
                                    <td>100%</td>
                                    <td>102%</td>
                                    <td>96%</td>
                                    <td>
                                        <a data-placement="top" data-toggle="modal" href="#ModalMs2" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        <a data-placement="top" data-toggle="modal" href="#ModalHapus" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                    </td>
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



<!-- modal edit ms2-->
<div class="modal fade" id="ModalMs2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ubah MS2</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form-group "> 
                                    <p>Sesuai Dengan MS2</p>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="premium1" name="premium1" size="16" type="number" value="" placeholder="Premium"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="solar1" name="solar1" size="16" type="number" value="" placeholder="Solar"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="pertamax1" name="pertamax1" size="16" type="number" value="" placeholder="Pertamax"required/>
                                    </div>
                                </div>

                                <div class="form-group "> 
                                    <p>Cepat (Sebelum Jadwal MS2)</p>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="premium2" name="premium2" size="16" type="number" value="" placeholder="Premium"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="solar2" name="solar2" size="16" type="number" value="" placeholder="Solar"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="pertamax2" name="pertamax2" size="16" type="number" value="" placeholder="Pertamax"required/>
                                    </div>
                                </div>

                                <div class="form-group "> 
                                    <p>Lebih Cepat (Sebelum Shift 1)</p>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="premium3" name="premium3" size="16" type="number" value="" placeholder="Premium"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="solar3" name="solar3" size="16" type="number" value="" placeholder="Solar"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="pertamax3" name="pertamax3" size="16" type="number" value="" placeholder="Pertamax"required/>
                                    </div>
                                </div>

                                <div class="form-group "> 
                                    <p>Lambat (Setelah MS2)</p>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="premium4" name="premium4" size="16" type="number" value="" placeholder="Premium"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="solar4" name="solar4" size="16" type="number" value="" placeholder="Solar"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="pertamax4" name="pertamax4" size="16" type="number" value="" placeholder="Pertamax"required/>
                                    </div>
                                </div>

                                <div class="form-group "> 
                                    <p>Tidak Terkirim Sesuai</p>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="premium5" name="premium5" size="16" type="number" value="" placeholder="Premium"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="solar5" name="solar5" size="16" type="number" value="" placeholder="Solar"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="pertamax5" name="pertamax5" size="16" type="number" value="" placeholder="Pertamax"required/>
                                    </div>
                                </div>


                                <div class="form-group "> 
                                    <p>Total LO</p>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="premium6" name="premium6" size="16" type="number" value="" placeholder="Premium"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="solar6" name="solar6" size="16" type="number" value="" placeholder="Solar"required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="pertamax6" name="pertamax6" size="16" type="number" value="" placeholder="Pertamax"required/>
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

<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus MS2</h4>
            </div>
            <div class="modal-body">

                Apakah Anda yakin?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success" type="button">OK</button>
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