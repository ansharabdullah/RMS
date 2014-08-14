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
    
        
    function importTable()
    {
        alert("Berhasil disimpan !");
    }
    
    function saveJadwal()
    {
        
        alert("Berhasil disimpan !");
        $("#myModal").modal('toggle');
    }
    
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <a class="btn btn-primary" onclick="showTambahJadwal()">
                    Tambah Jadwal <i class="icon-plus"></i>
                </a>
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >
                <div class="clearfix" id="tambahJadwal">

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
                                <th style="display: none;">-</th>
                                <th>No.</th>
                                <th>Nama Pekerja</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nama = array('Faizal', 'Fadhil', 'Ferdi', 'Gumara', 'Arman', 'Dadang', 'Rasim', 'Enjang', 'Agus', 'Asep', 'Anshar', 'Chepy', 'Firman');
                            $jabatan = array('Sopir', 'Kernet');
                            for ($i = 0; $i < 12; $i++) {
                                $status = rand(0, 2);
                                if ($status > 0) {
                                    $hadir = "<button type='button' class='btn btn-success btn-sm'>hadir</button>";
                                } else {
                                    $hadir = "<button type='button' class='btn btn-warning btn-sm'>tidak hadir</button>";
                                }
                                ?>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td><?php echo ($i + 1) ?></td>
                                    <td><?php echo $nama[$i] ?></td>
                                    <td><?php echo $jabatan[rand(0, 1)] ?></td>
                                    <td><?php echo $hadir ?></td>
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
            <div class="panel-body" >
                <header class="panel-heading">
                    Lihat Jadwal
                </header>
                <div class="clearfix">
                    <form class="cmxform form-horizontal tasi-form">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                                <input type="date" required="required" id="tanggalJadwal" class="form-control"  placeholder="Tanggal" name="tanggalSIOD" onchange="showJadwal()">
                            </div>
                        </div>
                    </form>
                </div>

                <div id="tabelJadwal" style="margin-top: 50px;">
                    <header class="panel-heading">
                        Jadwal (<span id="tglJadwal"></span>)
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
                                        <th>Nama Pekerja</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nama = array('Agus', 'Asep', 'Anshar', 'Chepy', 'Firman', 'Faizal', 'Fadhil', 'Ferdi', 'Gumara', 'Arman', 'Dadang', 'Rasim', 'Enjang');
                                    $jabatan = array('Sopir', 'Kernet');
                                    for ($i = 0; $i < 12; $i++) {
                                        $status = rand(0, 2);
                                        if ($status > 0) {
                                            $hadir = "<button type='button' class='btn btn-success btn-sm'>masuk</button>";
                                        } else {
                                            $hadir = "<button type='button' class='btn btn-warning btn-sm'>libur</button>";
                                        }
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $nama[$i] ?></td>
                                            <td><?php echo $jabatan[rand(0, 1)] ?></td>
                                            <td><?php echo $hadir ?></td>
                                            <td>
                                                <div  style="width: 70px;"> <a data-toggle="modal" href="#myModal"><span  class="btn btn-warning btn-sm tooltips" data-original-title="Ganti Status" data-placement="left" style="float:left"><i class="icon-pencil"></i></span> </a>

                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                            <label for="ou" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="11-08-2014" readonly="readonly" name="own-use" required="required" class="form-control" id="ou" placeholder="Own Use"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Nama pegawai</label>
                                            <div class="col-lg-10">
                                                <input type="text" readonly="readonly" value="Agus" name="premium" required="required" class="form-control"  placeholder="Premium"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertamax" class="col-lg-2 col-sm-2 control-label">Status</label>
                                            <div class="col-lg-10" >
                                                <select class="form-control m-bot15">
                                                    <option value="hadir">Hadir</option>
                                                    <option value="libur">Libur</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                                        <button class="btn btn-success" name="submit"  type="submit" onclick="saveJadwal()">Simpan</button>

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

<!-- END JAVASCRIPTS -->
<script>
    
    jQuery(document).ready(function() {
        EditableTable.init();
    });    
    
</script>
