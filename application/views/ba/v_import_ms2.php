<script type="text/javascript">
    $( document ).ready(function() {
        $("#filePreview").hide();
        $("#formSiod").submit(function(e){
            var ext = $("#fileName").val().split('.').pop();
            if(ext=="xls"||ext=="xlsx"){
                $("#filePreview").hide();
                $("#filePreview").slideDown("slow");
            }
            else
            {
                alert("Tipe file yang diupload tidak sesuai (excel)")   
            }
            e.preventDefault();
        });
    });
    
    function importTable()
    {
        alert("Berhasil disimpan !");
    }
    
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->



        <section class="panel">
            <header class="panel-heading">
                Import Data MS2 Dari Excel
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >
                <form class="form-horizontal" action="#" role="form" id="formSiod">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="tglForm" class="form-control"  placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">File Excel</label>
                        <div class="col-lg-10">
                            <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File SIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-danger">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="panel" id="filePreview">
            <header class="panel-heading">
                Tabel MS2 Complience (<span id="tgl"></span>)
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table" style="overflow-y: scroll">

                    <div class="space15"></div>
                    <table class="table table-bordered table-hover" id="editable-sample">   
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
                            </tr>
                        </tbody>
                    </table>
                </div>
                </br>
                <button style="float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan</button>

            </div>
        </section>


    </section>
    <!-- page end-->
</section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>

