<script type="text/javascript">
    $( document ).ready(function() {
        $("#laporanPreview").hide();
        $("#jangka").hide();
        $("#tanggal").hide();
        $("#formLaporan").submit(function(e){
            previewLaporan();
            e.preventDefault();
        });
    });
    
    
    function showOption(){
        var jenis = $("#kategori").val();
        $("#jangka").hide();
        $("#tanggal").hide();
        if(jenis=="berita")
        { 
            $("#tanggal").show();
        }
        else
        {
            $("#jangka").show();
            $("#tanggal").show();   
        }
    }
    
    function previewLaporan()
    {
        $("#waktu").html($("#jenis").val());
        $("#laporanPreview").hide();
        $("#laporanPreview").slideDown("slow");
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
                Laporan
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="formLaporan">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jenis laporan</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15" id="kategori" onchange="showOption()">
                                <option value="amt">Awak Mobil Tangki (AMT)</option>
                                <option value="mt">Mobil Tangki (MT)</option>
                                <option value="berita">Berita Acara</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="jangka">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jangka Waktu</label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15"  id="jenis">
                                <option value="Harian">Harian</option>
                                <option value="10 Hari">10 Hari</option>
                                <option value="Bulanan">Bulanan</option>
                                <option value="Triwulan">Triwulan</option>
                                <option value="Tahunan">Tahunan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="tanggal">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>

                        <div class="col-lg-10">
                            <input type="date" required="required" id="tglLaporan"  class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Submit">
                        </div>

                    </div>
                </form>
                <!-- generate laporan-->
                <div id="laporanPreview">
                    <header class="panel-heading">
                        Laporan <b><span id="waktu">asa</span></b> Kinerja Mobil Tangki
                    </header>
                    <div class="adv-table editable-table ">
                        <div class="clearfix">

                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>Nopol</th>
                                    <th>Kilometer (Km)</th>
                                    <th>Kiloliter (Kl)</th>
                                    <th>Ritase (Rit)</th>
                                    <th>Own Use</th>
                                    <th>Premium</th>
                                    <th>Pertamax</th>
                                    <th>Pertamax Plus</th>
                                    <th>Pertamax Dex</th>
                                    <th>Solar</th>
                                    <th>Bio Solar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>1</td>
                                    <td>D 6308 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>2</td>
                                    <td>D 1725 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>


                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>3</td>
                                    <td>D 2245 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>4</td>
                                    <td>D 6066 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>5</td>
                                    <td>D 3038 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>6</td>
                                    <td>D 8557 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>7</td>
                                    <td>D 1346 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>8</td>
                                    <td>D 7152 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>9</td>
                                    <td>D 9487 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>10</td>
                                    <td>D 8827 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>11</td>
                                    <td>D 8711 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>12</td>
                                    <td>D 8277 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button style="margin-right:10px;float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan</button>
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
