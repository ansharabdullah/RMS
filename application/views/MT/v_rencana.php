<script type="text/javascript">
    $( document ).ready(function() {
        $("#tabelJadwal").hide();
        $("#tambahJadwal").hide();
        $("#filePreview").hide();
        $("#formUpload").submit(function(e){
            var ext = $("#fileName").val().split('.').pop();
            if(ext=="xls" || ext=="xlsx"){
                $("#filePreview").hide();
                $("#filePreview").slideDown("slow");
            }
            else
            {
                alert("Tipe file yang diupload tidak sesuai (file excel)")   
            }
            e.preventDefault();
        });
    });
    
    
    function showJadwal()
    {
        $("#tglJadwal").html($("#tanggalJadwal").val());
        $("#tabelJadwal").hide();
        $("#tabelJadwal").slideDown("slow");
        
    }
    
    function showTambahJadwal()
    {
        $("#tambahJadwal").hide();
        $("#tambahJadwal").slideDown("slow");
    }
    
    function importExcel()
    {
        alert("Excel Berhasil di import !");
    }
    
    function downloadCsv()
    {
        alert("Excel berhasil di download");
    }
    
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/css/datepicker.css" />
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->


        <section class="panel">
            <header class="panel-heading">
                Input Perencanaan Mobil Tangki
              <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>

            </header>
            <header class="panel-heading">
                <a class="btn btn-success" onclick="showTambahJadwal()">
                    Import Excel <i class="icon-plus"></i>
                </a>
            </header>
            <div class="panel-body" id="tambahJadwal">

                <div class="clearfix" >

                    <form class="cmxform form-horizontal tasi-form" id="formUpload">


                        <div class="form-group">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                                <input type="date" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tanggal" name="tanggalSIOD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File Jadwal</label>
                            <div class="col-lg-10">
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
                <div class="adv-table editable-table " id="filePreview">
                    <div class="clearfix">
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th style="white-space: nowrap">Own Use</th>
                                <th>Premium</th>
                                <th>Pertamax</th>
                                <th style="white-space: nowrap">Pertamax Plus</th>
                                <th style="white-space: nowrap">Pertamax Dex</th>
                                <th>Solar</th>
                                <th style="white-space: nowrap">Bio Solar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < 12; $i++) {
//                                $date = date_create("2014-08-" . ($i + 1));
//                                $newDate = date_format($date, "d F Y");
//                                setlocale(LC_ALL, 'IND');
//                                $tgl = strftime("%d %B %Y", strtotime($newDate));
                                $tgl = ($i + 1) . " <span class='bulan'>Agustus</span> 2014";
                                ?>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td><?php echo $i + 1; ?></td>
                                    <td style="white-space: nowrap"><?php echo $tgl; ?></td>
                                    <td><?php echo rand(7, 10) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>

                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <button style="float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">

                <div class="clearfix">

                    <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                        Tambah Perencanaan <i class="icon-plus"></i>
                    </a>

                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Bulan <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#" onclick="changeMonth('Januari')">Januari</a></li>
                            <li><a href="#" onclick="changeMonth('Februari')">Februari</a></li>
                            <li><a href="#" onclick="changeMonth('Maret')">Maret</a></li>
                            <li><a href="#" onclick="changeMonth('April')">April</a></li>
                            <li><a href="#" onclick="changeMonth('Mei')">Mei</a></li>
                            <li><a href="#" onclick="changeMonth('Juni')">Juni</a></li>
                            <li><a href="#" onclick="changeMonth('Juli')">Juli</a></li>
                            <li><a href="#" onclick="changeMonth('Agustus')">Agustus</a></li>
                            <li><a href="#" onclick="changeMonth('September')">September</a></li>
                            <li><a href="#" onclick="changeMonth('Oktober')">Oktober</a></li>
                            <li><a href="#" onclick="changeMonth('November')">November</a></li>
                            <li><a href="#" onclick="changeMonth('Desember')">Desember</a></li>
                        </ul>
                    </div>
                </div>
                <div class="adv-table editable-table " id="tabel-rencana">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th style="white-space: nowrap">Own Use</th>
                                <th>Premium</th>
                                <th>Pertamax</th>
                                <th style="white-space: nowrap">Pertamax Plus</th>
                                <th style="white-space: nowrap">Pertamax Dex</th>
                                <th>Solar</th>
                                <th style="white-space: nowrap">Bio Solar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < 12; $i++) {
//                                $date = date_create("2014-08-" . ($i + 1));
//                                $newDate = date_format($date, "d F Y");
//                                setlocale(LC_ALL, 'IND');
//                                $tgl = strftime("%d %B %Y", strtotime($newDate));
                                $tgl = ($i + 1) . " <span class='bulan'>Agustus</span> 2014";
                                ?>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td><?php echo $i + 1; ?></td>
                                    <td style="white-space: nowrap"><?php echo $tgl; ?></td>
                                    <td><?php echo rand(7, 10) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><?php echo rand(2000, 3000) ?> kl</td>
                                    <td><div  style="width: 50px;"> <a data-toggle="modal" href="#myModal3"><button type="button" class="btn btn-warning btn-sm  btn-xs tooltips" data-original-title="Edit Perencanaan" data-placement="left" style="float:left"><i class="icon-pencil"></i></button> </a>
                                            <a data-toggle="modal" href="#myModal2"><button type="button" class="btn btn-danger btn-sm  btn-xs tooltips" data-original-title="Hapus Perencanaan" data-placement="left" style="float:right"><i class="icon-remove"></i></button></a></div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Tambah Perencanaan Mobil Tangki</h4>
                            </div>
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="tanggal" id="tanggal"  required="required" type="date" size="16" />
                                                <span class="help-block">Pilih Tanggal</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ou" class="col-lg-2 col-sm-2 control-label">Own Use</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="own-use" required="required" class="form-control" id="ou" placeholder="Own Use">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Premium</label>
                                            <div class="col-lg-10">
                                                <input type="number"  name="premium" required="required" class="form-control" id="premium" placeholder="Premium">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamax" class="col-lg-2 col-sm-2 control-label">Pertamax</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="pertamax" required="required" class="form-control" id="pertamax" placeholder="Pertamax">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamaxplus" class="col-lg-2 col-sm-2 control-label">Pertamax Plus</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="pertamax-plus" required="required" class="form-control" id="pertamaxplus" placeholder="Pertamax Plus">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamaxdex" class="col-lg-2 col-sm-2 control-label">Pertamax Dex</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="pertamax-dex"  required="required" class="form-control" id="pertamaxdex" placeholder="Pertamax Dex">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="solar" class="col-lg-2 col-sm-2 control-label">Solar</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="solar" required="required" class="form-control" id="solar" placeholder="Solar">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="biosolar" class="col-lg-2 col-sm-2 control-label">Bio Solar</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="bio-solar" required="required" class="form-control" id="biosolar" placeholder="Bio Solar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                                        <button class="btn btn-success" name="submit"  type="submit" >Simpan</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!---MODAL HAPUS--->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Hapus Perencanaan</h4>
                            </div>
                            <div class="modal-body">

                                Anda yakin?

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
                                <button class="btn btn-danger" type="button">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal EDIT -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Perencanaan Mobil Tangki</h4>
                            </div>
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="tanggal" id="tanggal" value="2014-08-19" required="required" type="date" size="16" />
                                                <span class="help-block">Pilih Tanggal</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ou" class="col-lg-2 col-sm-2 control-label">Own Use (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" name="own-use" value="8" required="required" class="form-control" id="ou" placeholder="Own Use">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Premium (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="2804" name="premium" required="required" class="form-control" id="premium" placeholder="Premium">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamax" class="col-lg-2 col-sm-2 control-label">Pertamax (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="2215" name="pertamax" required="required" class="form-control" id="pertamax" placeholder="Pertamax">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamaxplus" class="col-lg-2 col-sm-2 control-label">Pertamax Plus (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="2369" name="pertamax-plus" required="required" class="form-control" id="pertamaxplus" placeholder="Pertamax Plus">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamaxdex" class="col-lg-2 col-sm-2 control-label">Pertamax Dex (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="2566" name="pertamax-dex"  required="required" class="form-control" id="pertamaxdex" placeholder="Pertamax Dex">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="solar" class="col-lg-2 col-sm-2 control-label">Solar (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="2213" name="solar" required="required" class="form-control" id="solar" placeholder="Solar">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="biosolar" class="col-lg-2 col-sm-2 control-label">Bio Solar (kl)</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="2296" name="bio-solar" required="required" class="form-control" id="biosolar" placeholder="Bio Solar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                                        <button class="btn btn-success" name="submit"  type="submit" >Simpan</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    
    function changeMonth(bulan)
    {
        $(".bulan").html(bulan);
        
        $("#tabel-rencana").hide();
        $("#tabel-rencana").slideDown("slow");
        
    }
    
</script>