
<section id="main-content">
    <section class="wrapper">
        <section class="panel" id="cekkoefisien">        
            <header class="panel-heading">
                Tambah Koefisien Performansi
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" id="tambahJadwal">
                <div class="clearfix" >

                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>amt/import_koefisien_xls/" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                            <div class="col-lg-10">
                                <input type="number" min="2010" maxlength="4" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tahun" name="tahun">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File Jadwal</label>
                            <div class="col-lg-10">
                                <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File Koefisien" name="fileKoef">
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
        <?php if ($error) { ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Error!</strong> <?php echo $error; ?>
            </div>
        <?php } ?>
        <?php if ($koefisien) { ?>
            <section class="panel" id="PreviewTambahKoefisien">
                <header class="panel-heading">
                    Data Koefisien Performansi
                </header>

                <div class="panel-body">
                    <div class="adv-table editable-table " style="overflow-x: scroll">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Jabatan</th>
                                    <th>Koefisien KM</th>
                                    <th>Koefisien KL</th>
                                    <th>Koefisien Ritase</th>
                                    <th>Koefisien Jumlah SPBU</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php for ($i = 0; $i < count($koefisien) / 4; $i++) { ?>
                                    <tr class="">
                                        <td><?php echo ($i + 1) ?></td>
                                        <td><?php echo $koefisien[$i * 4]['jenis_jabatan'] ?></td>
                                        <td><?php echo $koefisien[$i]['nilai'] ?></td>
                                        <td><?php echo $koefisien[$i + 1]['nilai'] ?></td>
                                        <td><?php echo $koefisien[$i + 2]['nilai'] ?></td>
                                        <td><?php echo $koefisien[$i + 3]['nilai'] ?></td>
                                        <td>
                                            <?php
                                            if ($koefisien[$i * 4]['status_error'] != "Sukses") {
                                                echo "<b>" . $koefisien[$i * 4]['status_error'] . "</b>";
                                            } else {
                                                echo "<span class='btn btn-success btn-xs tooltips' >" . $koefisien[$i * 4]['status_error'] . "</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                        <?php
                        $e = 0;
                        for ($i = 0; $i < count($koefisien); $i++) {
                            $e += $koefisien[$i]['error'];
                            $data[$i] = array(
                                'id_jenis_penilaian' => $koefisien[$i]['id_jenis_penilaian'],
                                'id_log_harian' => $koefisien[$i]['id_log_harian'],
                                'nilai' => $koefisien[$i]['nilai']
                            );
                        }
                        ?>
                    </div><br />

                    <form method="POST" action="<?php echo base_url() ?>amt/simpan_koefisien/" enctype="multipart/form-data">
                        <?php if ($e != 0) { ?>
                            <div class="col-lg-11">
                                <div class="alert alert-block alert-danger fade in">
                                    <strong>Error!</strong> Anda harus memperbaiki file excell sesuai dengan format yang telah disediakan agar dapat menyimpan ke database.
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" required="required" id="data" class="form-control" name="data" value="<?php echo htmlentities(serialize($data)); ?>">
                        <?php } ?>
                        <input type="submit" style="float: right;" class="btn btn-success" value="Simpan" name="submit" <?php if ($e != 0) echo "disabled='true'" ?>> 
                    </form>
                </div>  
            </section>
        </section>
    </section>
<?php } ?>