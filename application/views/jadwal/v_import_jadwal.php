<script>
    $("#commentForm").submit(function(e) {
        var ext = $("#fileName").val().split('.').pop();
        if (ext == "xls" || ext == "xlsx") {
//                $("#tabelTambahJadwal1").hide();
//                $("#tabelTambahJadwal1").slideDown("slow");
            document.getElementById("commentForm").submit();
        }
        else
        {
            alert("Tipe file yang diupload tidak sesuai (file excel)")
        }
        e.preventDefault();

    });

</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
        </section>
        <section class="panel" id="tambahJadwal">
            <header class="panel-heading">
                Tambah Jadwal
                <a style="float:right;" href="<?php base_url() ?>download/format_oscrms_penjadwalan.xls" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >

                <div class="clearfix" >

                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>jadwal/import_xls/" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                            <div class="col-lg-10">
                                <input type="month" required="required" id="tanggalSIOD" class="form-control"  placeholder="Bulan" name="bulanJadwal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File Jadwal</label>
                            <div class="col-lg-10">
                                <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File Jadwal" name="fileJadwal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" style="float: right;" class="btn btn-danger" value="Upload" name="Submit">
                            </div>
                        </div>
                    </form>
                </div>
        </section>
        <?php if ($error) { ?>
            <div class="alert alert-block alert-danger fade in">
                <strong>Error!</strong> <?php echo $error ?>
            </div>
        <?php } ?>
        <?php if ($jadwal) { ?>
            <section class="panel"id="tabelTambahJadwal1">
                <header class="panel-heading">
                    Tabel Data Jadwal
                </header>
                <div class="panel-body" >
                    <div class="adv-table editable-table " style="overflow-x: scroll">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                            <thead>
                                <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>NIP</th>
                                    <th>Nama Pekerja</th>
                                    <th>Jabatan</th>
                                    <th>No. Polisi</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $e = 0;
                                $data = array();
                                for ($i = 0; $i < sizeof($jadwal); $i++) {
                                    ?>
                                    <tr class="">
                                        <th style="display: none;"></th>
                                        <td><?php echo ($i + 1) ?></td>
                                        <td><?php echo $jadwal[$i]['tanggal_log_harian'] ?></td>
                                        <td><?php echo $jadwal[$i]['nip'] ?></td>
                                        <td><?php echo $jadwal[$i]['nama_pegawai'] ?></td>
                                        <td><?php echo $jadwal[$i]['jabatan'] ?></td>
                                        <td><?php echo $jadwal[$i]['nopol'] ?></td>
                                        <td><?php
                                            if ($jadwal[$i]['status_masuk'] == "Libur") {
                                                echo "<span class='label label-danger'>" . $jadwal[$i]['status_masuk'] . "</span>";
                                            } else {
                                                echo $jadwal[$i]['status_masuk'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($jadwal[$i]['error']) {
                                                echo "<b>" . $jadwal[$i]['status_error'] . "</b>";
                                            } else {
                                                echo "<span class='btn btn-success btn-xs tooltips' >" . $jadwal[$i]['status_error'] . "</span>";
                                            }
                                            ?></td>
                                    </tr>
                                    <?php
                                    $e += $jadwal[$i]['error'];
                                    $tanggal = $jadwal[$i]['tanggal_log_harian'];
                                    $data[$i] = array(
                                        'id_pegawai' => $jadwal[$i]['id_pegawai'],
                                        'id_mobil' => $jadwal[$i]['id_mobil'],
                                        'id_log_harian' => $jadwal[$i]['id_log_harian'],
                                        'status_masuk' => $jadwal[$i]['status_masuk']
                                    );
                                }
                                ?>
                            </tbody>
                        </table>
                        <form method="POST" action="<?php echo base_url() ?>jadwal/simpan_xls/" enctype="multipart/form-data">
                            <?php if ($e != 0) { ?>
                                <div class="col-lg-11">
                                    <div class="alert alert-block alert-danger fade in">
                                        <strong>Error!</strong> Anda harus memperbaiki file excell sesuai dengan format yang telah disediakan agar dapat menyimpan ke database.
                                    </div>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" required="required" id="data_amt" class="form-control" name="data_jadwal" value="<?php echo htmlentities(serialize($data)); ?>">
                                <input type="hidden" name="tanggal" value="<?php echo $tanggal?>">
                            <?php } ?>
                            <input type="submit" style="float: right;" class="btn btn-success" value="Simpan" name="submit" <?php if ($e != 0) echo "disabled='true'" ?>> 
                        </form>
                    </div>
                </div>
                </div>
            </section>
        <?php } ?>
        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
<script>

                    jQuery(document).ready(function() {
                        EditableTable.init();
                    });
</script>