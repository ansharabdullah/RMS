<script type="text/javascript">
    $( document ).ready(function() {
        $("#laporanPreview").hide();
        $("#laporanPreview2").hide();
        hideAll();
        $("#tanggal").show();
        
        
        $("#commentForm").submit(function(e){
            if($("#commentForm").valid())
            {
                previewLaporan();
                previewAwak();
            }
            e.preventDefault();
        });
    });
    
    
    function hideAll()
    {
        
        $("#tanggal").hide();
        $("#tglLaporan").val("");
        $("#bulan").hide();
        $("#bulanLaporan").val("");
        $("#tahun").hide();
        $("#tahunLaporan").val("");
        $("#tglAwal").val("");
        $("#tglAkhir").val("");
        $("#range-tanggal").hide();
    }
    
    function changeWaktu()
    {
        hideAll();
        if($("#jenis").val() == "Harian" || $("#jenis").val() == "10 Hari" )
        {
                
            $("#tanggal").show();
        }
        else if($("#jenis").val() == "Bulanan" || $("#jenis").val() == "Triwulan")
        {
            $("#bulan").show();
        }
        else if($("#jenis").val() == "Tahunan" )
        {
                
            $("#tahun").show();
        }
        else
        {
            $("#range-tanggal").show();
                    
        }
    }
    
    
    function previewLaporan()
    {
        $("#waktu").html($("#jenis").val());
        $("#laporanPreview").hide();
        $("#laporanPreview").slideDown("slow");
        
    }
    
    function previewAwak(){
         $("#laporanPreview2").hide();
        $("#laporanPreview2").slideDown("slow");
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
                Laporan Crew Awak Mobil Tangki dan Mobil Tangki
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm">

                    <div class="form-group" id="jangka">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Jangka Waktu</label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15"  id="jenis" onchange="changeWaktu()">
                                <option value="Harian">Harian</option>
                                <option value="10 Hari">10 Hari</option>
                                <option value="Bulanan">Bulanan</option>
                                <option value="Triwulan">Triwulan</option>
                                <option value="Tahunan">Tahunan</option>
                                <option value="Rentang">Rentang</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="tanggal">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" name="tanggal" required="required" id="tglLaporan"  class="form-control"/>
                        </div>
                    </div>


                    <div class="form-group" id="bulan">
                        <label for="bulanLaporan" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" name="bulan" required="required" id="bulanLaporan"  class="form-control"/>
                        </div>
                    </div>


                    <div class="form-group" id="tahun">
                        <label class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="text" name="tahun" data-mask="9999" required="required" id="tahunLaporan"  class="form-control"/>
                        </div>
                    </div>

                    <div id="range-tanggal">
                        <div class="form-group" id="tanggalAwal">
                            <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal Awal</label>
                            <div class="col-lg-10">
                                <input type="date" name="tanggal-awal" required="required" id="tglAwal"  class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group" id="tanggalAkhir">
                            <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal Akhir</label>
                            <div class="col-lg-10">
                                <input type="date" name="tanggal-akhir" required="required" id="tglAkhir"  class="form-control"/>
                            </div>
                        </div>
                        <br/><br/>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Submit">
                        </div>

                    </div>
                </form>
                <!-- generate laporan-->

            </div>


        </section>

        <section class="panel" id="laporanPreview">
            <header class="panel-heading">
                Laporan <b><span id="waktu">asa</span></b> Kinerja Mobil Tangki
            </header>
            <div class="panel-body" >
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
            </div>

        </section>
        <section class="panel" id="laporanPreview2">
            <header class="panel-heading">
                Laporan <b><span id="waktu"></span></b> Kinerja Awak Mobil Tangki
            </header>
            <div class="panel-body" >
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                        <thead>
                            <tr>
                                <th style="display: none;">-</th>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Kilometer (Km)</th>
                                <th>Kiloliter (Kl)</th>
                                <th>Ritase (Rit)</th>
                                <th>SPBU</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>1</td>
                                <td>Asep</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                <td><?php echo rand(0, 20) ?></td>
                                
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>2</td>
                                <td>Endra</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                               
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>3</td>
                                <td>Firman</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>4</td>
                                <td>Fiqri</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>5</td>
                                <td>Firdaus</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>6</td>
                                <td>Anshar</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>7</td>
                                <td>Abdullah</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>8</td>
                                <td>Dika</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>9</td>
                                <td>Damara</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>10</td>
                                <td>Marata</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>11</td>
                                <td>Udin</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>12</td>
                                <td>Usuf</td>
                                <td><?php echo rand(300, 500) ?></td>
                                <td><?php echo rand(40, 150) ?></td>
                                <td><?php echo rand(2, 5) ?></td>
                                 <td><?php echo rand(0, 20) ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <button style="margin-right:10px;float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan</button>
            </div>

        </section>  
        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>
