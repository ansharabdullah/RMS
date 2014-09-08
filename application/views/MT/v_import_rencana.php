<script type="text/javascript">
    $(document).ready(function() {

        $("#commentForm").submit(function(e) {
            var isvalidate = $("#commentForm").valid();
            if (isvalidate)
            {
                var ext = $("#fileRencana").val().split('.').pop();
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
                Import Data Rencana Dari Excel
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" href="<?php echo base_url() ?>downloads/format_oscrms_rencana.xlsx"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url() ?>mt/import_rencana" role="form" id="commentForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="blnrencana" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="blnrencana" name="blnrencana" class="form-control"  placeholder="Bulan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileRencana" class="col-lg-2 col-sm-2 control-label">File Excel Rencana</label>
                        <div class="col-lg-10">
                            <input type="file"  id="fileRencana" required="required" class="form-control"  placeholder="File Rencana" name="fileRencana">
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
                <?php if ($rencana['error'] == false) { ?>
                    <?php $simpan = true; ?>
                    <section class="panel">
                        <header class="panel-heading">
                            Tabel Rencana <strong><?php echo $nama_bulan; ?></strong>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table" style="overflow-x: scroll">

                                <table class="table table-bordered table-hover" id="editable-sample">   
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Premium</th>
                                            <th>Pertamax</th>
                                            <th>Pertamax Plus</th>
                                            <th>Pertamax Dex</th>
                                            <th>Solar</th>
                                            <th>Bio Solar</th>
                                            <th>Own Use</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        for ($no = 0; $no < $rencana['jumlah']; $no++) {
                                            ?>
                                            <tr class="">
                                                <td style="display:none;"></td>
                                                <td><?php echo ($no + 1); ?></td>

                                                <?php
                                                if ($rencana['id_log_harian'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="ID log tidak ditemukan">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo date("d-m-Y", strtotime($rencana['tanggal'][$no])); ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($rencana['r_premium'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_premium'][$no]; ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($rencana['r_pertamax'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_pertamax'][$no]; ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($rencana['r_pertamaxplus'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_pertamaxplus'][$no]; ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($rencana['r_pertaminadex'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_pertaminadex'][$no]; ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($rencana['r_solar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_solar'][$no]; ?></td>
                                                <?php } ?>

                                                <?php
                                                if ($rencana['r_biosolar'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_biosolar'][$no]; ?></td>
                                                <?php } ?>
                                                    <?php 
                                                 if ($rencana['r_own_use'][$no] == -1) {
                                                    $simpan = false;
                                                    ?>
                                                    <td><span class="label label-warning tooltips" data-placement="top" data-original-title="Data yang dibaca bukan angka">ERROR</span></td>
                                                <?php } else { ?>
                                                    <td><?php echo $rencana['r_own_use'][$no]; ?></td>
                                                <?php } ?>

                                               
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>


                    <section class="panel">
                        <div class="panel-body">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm1" action="<?php echo base_url() ?>mt/import_rencana" method="POST" enctype="multipart/form-data">
                                <input type="hidden" required="required" id="data_rencana" class="form-control" name="data_rencana" value="<?php echo htmlentities(serialize($rencana)); ?>">

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
                        <strong>Error!</strong> Gagal membaca file rencana.
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
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil simpan rencana ke database.
            </div>
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

