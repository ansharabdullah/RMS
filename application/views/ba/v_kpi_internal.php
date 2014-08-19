
<script type="text/javascript">
    $( document ).ready(function() {
        $("#tambahkpi").hide();
        $("#cekkpi").hide();
        $("#previewtambahkpi").hide();
        $("#previewcekkpi").hide();
        
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {    
                $("#previewtambahkpi").hide();
                $("#previewtambahkpi").fadeIn("slow");
            }
            e.preventDefault();
        });
        
        $("#signupForm").submit(function(e){
            var isvalidate=$("#signupForm").valid();
            if(isvalidate)
            {    
                $("#previewcekkpi").hide();
                $("#previewcekkpi").fadeIn("slow");
                $("#tgl").html($("#tglForm").val());
            }
            e.preventDefault();
        });
        
        
        
    });
    
    
    function importTable()
    {
        alert("Berhasil disimpan !");
    }
    
    
    function showTambahKPI()
    {
        $("#tambahkpi").fadeIn("slow");
        $("#cekkpi").hide();
        $("#previewtambahkpi").hide();
        $("#previewcekkpi").hide();
    }
    
    function showCekKPI()
    {
        $("#cekkpi").fadeIn("slow");
        $("#tambahkpi").hide();
        $("#previewtambahkpi").hide();
        $("#previewcekkpi").hide();
    }
    
</script>

<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                KPI Internal Depot
            </header>
            <div class="panel-body">
                <a class="btn btn-primary" onclick="showTambahKPI()">
                    Tambah KPI <i class="icon-plus"></i>
                </a>

                <a class="btn btn-warning" onclick="showCekKPI()">
                    Cek KPI Iternal <i class="icon-check"></i>
                </a>
            </div>
        </section>


        <section class="panel" id="tambahkpi">
            <header class="panel-heading">
                Tambah KPI Iternal
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body">
                <div class="clearfix" >

                    <form class="cmxform form-horizontal tasi-form" id="commentForm">
                        <div class="form-group">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                            <div class="col-lg-10 col-sm-6">
                                <input type="number" min="2000" maxlength="4" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tahun" name="tanggalSIOD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">Jenis Data</label>
                            <div class="col-lg-10 col-sm-6">
                                <select class="form-control input-sm m-bot15" id="jenis" name="jenis">
                                    <option>Total</option>
                                    <option>Triwulan 1</option>
                                    <option>Triwulan 2</option>
                                    <option>Triwulan 3</option>
                                    <option>Triwulan 4</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File Jadwal</label>
                            <div class="col-lg-10 col-sm-6">
                                <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File SIOD" name="fileSIOD">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" style="float: right;" class="btn btn-danger" value="Upload">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="panel" id="previewtambahkpi">
            <header class="panel-heading">
                KPI Internal
            </header>
            <div class="panel-body">
                Preview Tambah KPI Internal
            </div>
        </section>


        <section class="panel" id="cekkpi">
            <header class="panel-heading">
                Cek KPI Internal
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" id="tglForm" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">Jenis Data</label>
                        <div class="col-lg-10 col-sm-6">
                            <select class="form-control input-sm m-bot15" id="jeniss" name="jeniss">
                                <option>Total</option>
                                <option>Triwulan 1</option>
                                <option>Triwulan 2</option>
                                <option>Triwulan 3</option>
                                <option>Triwulan 4</option>
                            </select>
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

        <section class="panel" id="previewcekkpi">
            <header class="panel-heading">
                KPI Internal Tahun <span id="tgl"></span>
            </header>
            <div class="panel-body">
                Preview KPI Internal
            </div>
        </section>

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