<script type="text/javascript">
    $( document ).ready(function() {
        $("#laporanPreview").hide();
    });
    
    function previewLaporan()
    {
        $("#waktu").html($("#jenis").val());
        $("#laporanPreview").hide();
        $("#laporanPreview").show("slow");
    }
    
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
                Laporan Kinerja Awak Mobil Tangki
            </header>
            <div class="panel-body" >
                <form class="form-horizontal" action="#" role="form" id="formSiod">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jangka Waktu</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15" onchange="previewLaporan()" id="jenis">
                                <option value="Harian">Harian</option>
                                <option value="10 Hari">10 Hari</option>
                                <option value="Bulanan">Bulanan</option>
                                <option value="Triwulan">Triwulan</option>
                                <option value="Tahunan">Tahunan</option>
                            </select>
                        </div>
                    </div>
                </form>
                <!-- generate laporan-->
                <div id="laporanPreview">
                    <header class="panel-heading">
                        Laporan <b><span id="waktu">asa</span></b> Kinerja Awak Mobil Tangki
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
                                <th>KM</th>
                                <th>KL</th>
                                <th>Rit</th>
                                <th>SPBU</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>1</td>
                                <td><a data-toggle="modal" href="#ModalTambahKinerja" style ="text-decoration: underline">07/08/2014</a></td>
                                <td>30</td>
                                <td>10</td>
                                <td>8</td>
                                <td>24</td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td><a data-toggle="modal" href="#ModalTambahKinerja" style ="text-decoration: underline">08/08/2014</a></td>
                                <td>20</td>
                                <td>10</td>
                                <td>3</td>
                                <td>4</td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td><a data-toggle="modal" href="#ModalTambahKinerja" style ="text-decoration: underline">09/08/2014</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td><a data-toggle="modal" href="#ModalTambahKinerja" style ="text-decoration: underline">10/08/2014</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>5</td>
                                <td><a data-toggle="modal" href="#ModalTambahKinerja" style ="text-decoration: underline">11/08/2014</a></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>

                            <tr class="">

                                <td style="display:none;"></td>
                                <td>6</td>
                                <td><a data-toggle="modal" href="#ModalTambahKinerja" style ="text-decoration: underline">12/08/2014</a></td>                                
                                <td>55</td>
                                <td>32</td>
                                <td>2</td>
                                <td>1</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

                    <button style="margin-right:10px;float: right;" onclick="importTable()" type="button" class="btn btn-success">Import</button>
                    <br/><br/><br/>
                </div>
            </div>
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
