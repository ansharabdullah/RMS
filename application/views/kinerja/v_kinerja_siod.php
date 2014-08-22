<script type="text/javascript">

    $(document).ready(function() {

        $("#signupForm").submit(function(e) {
            var isvalidate = $("#signupForm").valid();
            if (isvalidate)
            {
                var ext = $("#fileSIOD").val().split('.').pop();
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

    function importTable()
    {
        alert("Berhasil disimpan !");
    }

    function downloadCsv()
    {
        alert("Excel berhasil di download");
    }

</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Input Kinerja dari SIOD
                <div style="float:right;">
                    <a  data-placement="left" href="<?php echo base_url() ?>kinerja/manual" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah Manual"><i class="icon-plus"></i></a>
                    <a  data-placement="left" class="btn btn-xs btn-success tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
                </div>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="<?php echo base_url() ?>kinerja/preview" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="date" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tanggal" name="tanggalSIOD" value="2014-05-02">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File SIOD</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="file"  id="fileSIOD" required="required" class="form-control"  placeholder="File SIOD" name="fileSIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10 col-sm-6">
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Upload" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php
        if ($submit == true) {
            $status_simpan = true;
            ?>

            <?php if ($data_kinerja['ERROR'] == true) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Peringatan!</strong> Gagal membaca file SIOD, silahkan coba lagi.
                </div>
                <?php if ($data_kinerja['TANGGAL']['error'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Tanggal error!</strong> Tanggal di file SIOD tidak sesuai dengan tanggal pilihan.
                    </div>
                <?php } ?>
                <?php if ($data_kinerja['SPBU']['error'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>SPBU error!</strong> Gagal membaca sheet <strong>Produk SPBU</strong>.
                    </div>
                <?php } ?>
                <?php if ($data_kinerja['MT']['error'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>MT error!</strong> Gagal membaca sheet <strong>Detail MT Report</strong>.
                    </div>
                <?php } ?>
                <?php if ($data_kinerja['SUPIR']['error'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Supir error!</strong> Gagal membaca sheet <strong>Detail Crew Supir</strong>.
                    </div>
                <?php } ?>
                <?php if ($data_kinerja['KERNET']['error'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Kernet error!</strong> Gagal membaca sheet <strong>Detail Crew Kernet</strong>.
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil membaca file SIOD.
                </div>

                <section class="panel">
                    <header class="panel-heading">
                        Kinerja tanggal <strong><?php echo $data_kinerja['TANGGAL']['tanggal']; ?></strong>
                    </header>
                </section>

                <section class="panel">
                    <header class="panel-heading">
                        Jumlah SPBU : <strong><?php echo $data_kinerja['SPBU']['jumlah']; ?></strong>
                    </header>
                </section>

                <!-- MOBIL  -->
                <section class="panel">
                    <header class="panel-heading">
                        Kinerja Mobil Tangki
                    </header>

                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-y: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>Nopol</th>
                                        <th>Rit</th>
                                        <th>KM</th>
                                        <th>KL</th>
                                        <th>Ownuse</th>
                                        <th>Premium</th>
                                        <th>Pertamax</th>
                                        <th>Pertamax Plus</th>
                                        <th>Bio Solar</th>
                                        <th>Pertamina Dex</th>
                                        <th>Solar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    for ($no = 1; $no <= $data_kinerja['MT']['jumlah']; $no++) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data_kinerja['MT']['nopol'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['ritase'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['total_km'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['total_kl'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['ownuse'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['premium'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['pertamax'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['pertamax_plus'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['bio_solar'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['pertamina_dex'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['MT']['solar'][$no - 1]; ?></td>
                                            <td>
                                                <?php
                                                if ($data_kinerja['MT']['id'][$no - 1] == -1) {
                                                    $status_simpan = false;
                                                    ?>
                                                    <span class="label label-warning">ERROR</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">OK</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


                <!-- SUPIR  -->
                <section class="panel">
                    <header class="panel-heading">
                        Kinerja Crew Supir
                    </header>

                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-y: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Status Tugas</th>
                                        <th>Klas</th>
                                        <th>KM</th>
                                        <th>KL</th>
                                        <th>Rit</th>
                                        <th>SPBU</th>
                                        <th>Pendapatan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    for ($no = 1; $no <= $data_kinerja['SUPIR']['jumlah']; $no++) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['nip'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['nama'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['jabatan'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['status_tugas'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['klasifikasi'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['total_km'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['total_kl'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['ritase'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['jumlah_spbu'][$no - 1]; ?></td>
                                            <td><?php echo $data_kinerja['SUPIR']['pendapatan'][$no - 1]; ?></td>
                                            <td>
                                                <?php
                                                if ($data_kinerja['SUPIR']['id'][$no - 1] == -1) {
                                                    $status_simpan = false;
                                                    ?>
                                                    <span class="label label-warning">ERROR</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">OK</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <?php
                                    $no--;
                                    $noo = 1;
                                    for ($noo = 1; $noo <= $data_kinerja['KERNET']['jumlah']; $noo++) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no + $noo; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['nip'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['nama'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['jabatan'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['status_tugas'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['klasifikasi'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['total_km'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['total_kl'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['ritase'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['jumlah_spbu'][$noo - 1]; ?></td>
                                            <td><?php echo $data_kinerja['KERNET']['pendapatan'][$noo - 1]; ?></td>
                                            <td>
                                                <?php
                                                if ($data_kinerja['KERNET']['id'][$noo - 1] == -1) {
                                                    $status_simpan = false;
                                                    ?>
                                                    <span class="label label-warning">ERROR</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">OK</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="signupForm1" action="<?php echo base_url() ?>kinerja/simpan" method="POST" enctype="multipart/form-data">
                            <input type="hidden" required="required" id="data_kinerja" class="form-control" name="data_kinerja" value="<?php echo htmlentities(serialize($data_kinerja)); ?>">

                            <div class="form-group">
                                <div class="col-lg-12 col-sm-6">
                                    <?php if ($status_simpan == true) { ?>
                                        <input type="submit" style="float: right;" class="btn btn-danger" value="Simpan" name="submit">
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


            <?php } ?>


        <?php } ?>

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
