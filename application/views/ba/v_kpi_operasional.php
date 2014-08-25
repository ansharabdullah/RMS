<script type="text/javascript">
    $( document ).ready(function() {
      $("#filePreview").hide();
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {    
                $("#filePreview").hide();
                $("#filePreview").slideDown("slow");
                var tanggal;
                   // tanggal = formatDate('dd-mm-yyyy', $("#tglForm").val());
                    tanggal = $("#tglForm").val();
                $("#tgl").html(tanggal);
            }
            e.preventDefault();
        });
    });
    
    
</script>



<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                KPI Operasional Depot
                <a style="float:right;" data-placement="left" href="#ModalTambah" data-toggle="modal" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah"> Tambah Data <i class="icon-plus"></i></a>
            
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Bulan</label>
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
                    Tabel KPI Operasional (<span id="tgl"></span>)
                    <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i> Edit KPI</a>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Parameter KPI</th>
                                <th rowspan="2">Target</th>
                                <th rowspan="2">Bobot</th>
                                <th colspan="5">Realisasi</th>
                            </tr>
                            <tr>
                                <td>Realisasi</td>
                                <td>Deviasi</td>
                                <td>Performance Score</td>
                                <td>Normal Score</td>
                                <td>Weighted Score</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rencana pengiriman vs realisasi (MS2 Compliance)*</td>
                                <td>98</td>
                                <td>30.0%</td>
                                <td>X</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Rencana volume angkutan vs realisasi</td>
                                <td>100</td>
                                <td>25.0%</td>
                                <td>X</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan tagihan ongkos angkut (dokumen lengkap dan benar)</td>
                                <td>5</td>
                                <td>5.0%</td>
                                <td>1</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Customer  Satisfaction (Lembaga Penyalur)</td>
                                <td>3,8</td>
                                <td>5.0%</td>
                                <td>1,0</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</td>
                                <td>5</td>
                                <td>5.0%</td>
                                <td>2</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tindak lanjut penyelesaian keluhan atau komplain yang diterima</td>
                                <td>100</td>
                                <td>5.0%</td>
                                <td>30</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jumlah pekerja pengelola MT  yang mengikuti pelatihan</td>
                                <td>5</td>
                                <td>5.0%</td>
                                <td>4</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Number of Incidents</td>
                                <td>0</td>
                                <td>10.0%</td>
                                <td>0</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Waktu penyelesaian Incidents</td>
                                <td>7</td>
                                <td>10.0%</td>
                                <td>0</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Number of Accident</td>
                                <td>0</td>
                                <td></td>
                                <td>0</td>
                                <td>1,54</td>
                                <td>101,57%</td>
                                <td>101,57%</td>
                                <td>30,47%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-body">
                    <div class="form-group ">                                            
                        <label for="ctgl" class="control-label col-lg-4">Bulan</label>
                        <div class="col-lg-8">
                            <input class=" form-control input-sm m-bot15" id="ctglberlaku" name="bulankpi" size="16" type="month" value="" required/>
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parameter KPI</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rencana pengiriman vs realisasi (MS2 Compliance)*</td>
                                <td>
                                    <input type="number" required="required" id="kpitarget1" name="kpitarget1" class="form-control">
                                </td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Rencana volume angkutan vs realisasi</td>
                                <td><input type="number" required="required" id="kpitarget2" name="kpitarget2" class="form-control"></td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan tagihan ongkos angkut (dokumen lengkap dan benar)</td>
                                <td><input type="number" required="required" id="kpitarget3" name="kpitarget3" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal3" name="kpireal3" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Customer  Satisfaction (Lembaga Penyalur)</td>
                                <td><input type="number" required="required" id="kpitarget4" name="kpitarget4" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal4" name="kpireal4" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</td>
                                <td><input type="number" required="required" id="kpitarget5" name="kpitarget5" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal5" name="kpireal5" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tindak lanjut penyelesaian keluhan atau komplain yang diterima</td>
                                <td><input type="number" required="required" id="kpitarget6" name="kpitarget6" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal6" name="kpireal6" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jumlah pekerja pengelola MT  yang mengikuti pelatihan</td>
                                <td><input type="number" required="required" id="kpitarget7" name="kpitarget7" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal7" name="kpireal7" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Number of Incidents</td>
                                <td><input type="number" required="required" id="kpitarget8" name="kpitarget8" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal8" name="kpireal8" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Waktu penyelesaian Incidents</td>
                                <td><input type="number" required="required" id="kpitarget9" name="kpitarget9" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal9" name="kpireal9" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Number of Accident</td>
                                <td><input type="number" required="required" id="kpitarget0" name="kpitarget10" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal10" name="kpireal10" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-body">
                    <div class="form-group ">                                            
                        <label for="ctgl" class="control-label col-lg-4">Bulan</label>
                        <div class="col-lg-8">
                            <input class=" form-control input-sm m-bot15" id="ctglberlaku" name="bulankpi" size="16" type="month" value="" required/>
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parameter KPI</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rencana pengiriman vs realisasi (MS2 Compliance)*</td>
                                <td>
                                    <input type="number" required="required" id="kpitarget1" name="kpitarget1" class="form-control">
                                </td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Rencana volume angkutan vs realisasi</td>
                                <td><input type="number" required="required" id="kpitarget2" name="kpitarget2" class="form-control"></td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan tagihan ongkos angkut (dokumen lengkap dan benar)</td>
                                <td><input type="number" required="required" id="kpitarget3" name="kpitarget3" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal3" name="kpireal3" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Customer  Satisfaction (Lembaga Penyalur)</td>
                                <td><input type="number" required="required" id="kpitarget4" name="kpitarget4" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal4" name="kpireal4" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</td>
                                <td><input type="number" required="required" id="kpitarget5" name="kpitarget5" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal5" name="kpireal5" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tindak lanjut penyelesaian keluhan atau komplain yang diterima</td>
                                <td><input type="number" required="required" id="kpitarget6" name="kpitarget6" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal6" name="kpireal6" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jumlah pekerja pengelola MT  yang mengikuti pelatihan</td>
                                <td><input type="number" required="required" id="kpitarget7" name="kpitarget7" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal7" name="kpireal7" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Number of Incidents</td>
                                <td><input type="number" required="required" id="kpitarget8" name="kpitarget8" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal8" name="kpireal8" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Waktu penyelesaian Incidents</td>
                                <td><input type="number" required="required" id="kpitarget9" name="kpitarget9" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal9" name="kpireal9" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Number of Accident</td>
                                <td><input type="number" required="required" id="kpitarget0" name="kpitarget10" class="form-control"></td>
                                <td><input type="number" required="required" id="kpireal10" name="kpireal10" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
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