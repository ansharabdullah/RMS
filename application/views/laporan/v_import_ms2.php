<script type="text/javascript">
    $(document).ready(function() {

        $("#commentForm").submit(function(e) {
            var isvalidate = $("#commentForm").valid();
            if (isvalidate)
            {
                var ext = $("#fileMS2").val().split('.').pop();
                if (ext == "xls" || ext == "xlsx") {
                    //$("#filePreview").hide();
                    //$("#filePreview").slideDown("slow");
                    //$("#filePreview1").slideDown("slow");
                    //$("#tgl").html($("#tanggalSIOD").val());
                    //$("#tgl1").html($("#tanggalSIOD").val());
                } else if (ext == "") {
                    e.preventDefault();
                } else {
                    alert("Tipe file yang diupload tidak sesuai (file excel)");
                    e.preventDefault();
                }
            }
        });

    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->



        <section class="panel">
            <header class="panel-heading">
                Import Data MS2 Dari Excel
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" href="<?php echo base_url() ?>downloads/format_oscrms_ms2.xlsx"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url() ?>laporan/import_ms2" role="form" id="commentForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="blnms2" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="blnms2" name="blnms2" class="form-control"  placeholder="Bulan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileMS2" class="col-lg-2 col-sm-2 control-label">File Excel MS2</label>
                        <div class="col-lg-10">
                            <input type="file"  id="fileMS2" required="required" class="form-control"  placeholder="File MS2" name="fileMS2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="upload" style="float: right;" class="btn btn-danger" value="Upload">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if ($klik_upload == true) { ?>
            <?php if ($cek_ada == 0) { ?>
                <?php if ($ms2['error'] == false) { ?>
                    <?php $simpan = true; ?>
                    <section class="panel">
                        <header class="panel-heading">
                            Tabel MS2 Complience <strong><?php echo $nama_bulan; ?></strong>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table" style="overflow-x: scroll">

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
                                            <td style="display:none;"></td>
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
                                        <?php
                                        $no = 0;
                                        for ($no = 0; $no < $ms2['jumlah']; $no++) {
                                            ?>
                                            <tr class="">
                                                <td style="display:none;"></td>
                                                <td><?php echo ($no + 1); ?></td>

                                                <?php
                                                if ($ms2['id_log_harian'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="ID log tidak ditemukan">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo date("d-m-Y", strtotime($ms2['tanggal'][$no])); ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['sesuai_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['sesuai_premium'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['sesuai_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['sesuai_solar'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['sesuai_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['sesuai_pertamax'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['cepat_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['cepat_premium'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['cepat_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['cepat_solar'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['cepat_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['cepat_pertamax'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['cepat_shift1_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['cepat_shift1_premium'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['cepat_shift1_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['cepat_shift1_solar'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['cepat_shift1_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['cepat_shift1_pertamax'][$no]; ?>%</td>
                                                <?php } ?>


                                                <?php
                                                if ($ms2['lambat_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['lambat_premium'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['lambat_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['lambat_solar'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['lambat_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['lambat_pertamax'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['tidak_terkirim_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['tidak_terkirim_premium'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['tidak_terkirim_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['tidak_terkirim_solar'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['tidak_terkirim_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['tidak_terkirim_pertamax'][$no]; ?>%</td>
                                                <?php } ?>
                                                    
                                                    <?php
                                                if ($ms2['total_lo_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['total_lo_premium'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['total_lo_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['total_lo_solar'][$no]; ?>%</td>
                                                <?php } ?>

                                                <?php
                                                if ($ms2['total_lo_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $ms2['total_lo_pertamax'][$no]; ?>%</td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>
                                            
                                            <tr>
                                            <td style="display:none;"></td>
                                            <td colspan="2"><strong><font size="2">Rata-rata</font></strong></td>
                                            <td colspan="3"><strong><font size="2"><?php echo $ms2['rata_sesuai'];?>%</font></strong></td>
                                            <td colspan="3"><strong><font size="2"><?php echo $ms2['rata_cepat'];?>%</font></strong></td>
                                            <td colspan="3"><strong><font size="2"><?php echo $ms2['rata_cepat_shift1'];?>%</font></strong></td>
                                            <td colspan="3"><strong><font size="2"><?php echo $ms2['rata_lambat'];?>%</font></strong></td>
                                            <td colspan="3"><strong><font size="2"><?php echo $ms2['rata_tidak_terkirim'];?>%</font></strong></td>
                                            <td colspan="3"><strong><font size="2"><?php echo $ms2['rata_total_lo'];?>%</font></strong></td>
                                                                                      
                                        </tr>
                                        <tr>
                                            <td style="display:none;"></td>
                                            <td colspan="2"><strong><font size="3">Hasil</font></strong></td>
                                            <td colspan="9"><strong><font size="3"><?php echo $ms2['hasil_akhir'];?>%</font></strong></td>
                                            <td colspan="9"></td>
                                                                                      
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>


                    <section class="panel">
                        <div class="panel-body">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm1" action="<?php echo base_url() ?>laporan/import_ms2" method="POST" enctype="multipart/form-data">
                                <input type="hidden" required="required" id="data_ms2" class="form-control" name="data_ms2" value="<?php echo htmlentities(serialize($ms2)); ?>">

                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-6">
                                        <?php if ($simpan == true) { ?>
                                            <input type="submit" style="float: right;" class="btn btn-success" value="Simpan" name="simpan">
                                        <?php } else { ?>
                                            <div class="alert alert-block alert-danger fade in">
                                                <strong>Error!</strong> Terdapat beberapa data yang salah, tidak dapat disimpan.
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                <?php } else { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Gagal membaca file MS2.
                    </div>
                <?php } ?>    
            <?php } else { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Bulan yang dipilih telah di input.
                </div>
            <?php } ?>

        <?php } else if ($klik_simpan == true) { ?>
            <?php if ($simpan_error == true) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Gagal simpan MS2 ke database.
                </div>
            <?php } else { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil simpan MS2 ke database.
                </div>
            <?php } ?>
        <?php } ?>

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

