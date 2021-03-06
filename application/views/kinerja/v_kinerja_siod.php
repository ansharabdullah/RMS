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

</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>kinerja">Kinerja</a></li>
                    <li class="active">Import SIOD</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Input Kinerja dari SIOD
                <div style="float:right;">
                    <a  data-placement="left" href="#ModalLibur"  data-toggle="modal" class="btn btn-danger btn-xs tooltips" data-original-title="Libur"><i class="icon-check-minus"></i></a>
                    <a  data-placement="left" href="<?php echo base_url() ?>kinerja/manual" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah Manual"><i class="icon-plus"></i></a>
                    <a  data-placement="left" href="<?php echo base_url() ?>kinerja/cek" class="btn btn-warning btn-xs tooltips" data-original-title="Cek Kinerja SIOD"><i class="icon-check-sign"></i></a>
                    <a  data-placement="left" class="btn btn-xs btn-success tooltips" data-original-title="Download Format" href="<?php echo base_url() ?>downloads/format_oscrms_siod.xlsx"><i class="icon-download-alt"></i></a>
                </div>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="<?php echo base_url() ?>kinerja" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="date" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tanggal" name="tanggalSIOD" value="">
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
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Upload" name="cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php
        if ($data_kinerja['submit'] == true) {
            $status_simpan = true;
            ?>

            <?php if ($data_kinerja['ERROR'] == true) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Peringatan!</strong> Gagal membaca file SIOD, silahkan coba lagi.
                </div>
                <?php if ($data_kinerja['ID_LOG_HARIAN'] < 0) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Log harian error!</strong> ID log harian tidak ditemukan.
                    </div>
                <?php } else if ($data_kinerja['STATUS_INPUT_HARIAN'] == 1) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error input!</strong> Kinerja tanggal yang dipilih telah diinput, proses input SIOD hanya bisa dilakukan satu kali.
                    </div>
                <?php } else if ($data_kinerja['TANGGAL']['error'] == true) { ?>

                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Tanggal error!</strong> Tanggal di file SIOD tidak sesuai dengan tanggal pilihan.
                    </div>
                <?php } else { ?>
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
                    <?php if ($data_kinerja['SUPIR']['koefisien_error'] == true) { ?>
                        <div class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <strong>Koefisien error!</strong> Koefisien performansi awak mobil tangki (Supir) tidak ditemukan.
                        </div>
                    <?php } ?>
                    <?php if ($data_kinerja['KERNET']['koefisien_error'] == true) { ?>
                        <div class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <strong>Koefisien error!</strong> Koefisien performansi awak mobil tangki (Kernet) tidak ditemukan.
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
                        <div class="adv-table editable-table " style="overflow-x: scroll">
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
                                        <th>Keterangan</th>
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
                                                if ($data_kinerja['MT']['data_error'][$no - 1] == true) {
                                                    $status_simpan = false;
                                                    ?>
                                                    <span class="label label-warning" >ERROR</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">OK</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php echo implode(', ', $data_kinerja['MT']['pesan_error'][$no - 1]); ?>
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
                        <div class="adv-table editable-table " style="overflow-x: scroll">
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
                                        <th>Keterangan</th>
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
                                                if ($data_kinerja['SUPIR']['data_error'][$no - 1] == true) {
                                                    $status_simpan = false;
                                                    ?>
                                                    <span class="label label-warning" >ERROR</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">OK</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php echo implode(', ', $data_kinerja['SUPIR']['pesan_error'][$no - 1]); ?>
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
                                                if ($data_kinerja['KERNET']['data_error'][$noo - 1] == true) {
                                                    $status_simpan = false;
                                                    ?>
                                                    <span class="label label-warning" >ERROR</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">OK</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php echo implode(', ', $data_kinerja['KERNET']['pesan_error'][$noo - 1]); ?>
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
                        <form class="cmxform form-horizontal tasi-form" id="signupForm1" action="<?php echo base_url() ?>kinerja" method="POST" enctype="multipart/form-data">
                            <input type="hidden" required="required" id="data_kinerja" class="form-control" name="data_kinerja" value="<?php echo htmlentities(serialize($data_kinerja)); ?>">

                            <div class="form-group">
                                <div class="col-lg-12 col-sm-6">
                                    <?php if ($status_simpan == true) { ?>
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


            <?php } ?>


        <?php } ?>

        <?php if ($data_kinerja['simpan'] == true) { ?>
            <?php if ($data_kinerja['error_simpan'] == true) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Gagal simpan kinerja ke database.
                </div>
            <?php } else { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil simpan kinerja ke database.
                </div>
            <?php } ?>

        <?php } ?>
                
        <?php if($data_kinerja['simpan_libur'] == true){?>
            <?php if($data_kinerja['status_ganti_libur'] == "berhasil"){?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil ubah tanggal <strong><?php echo $data_kinerja['tglLibur']; ?></strong> menjadi hari <strong><?php echo $data_kinerja['statusLibur']; ?></strong>.
                </div>
            <?php }else{ ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Gagal ubah tanggal <strong><?php echo $data_kinerja['tglLibur']; ?></strong> menjadi hari <strong><?php echo $data_kinerja['statusLibur']; ?></strong>.
                </div>
            <?php } ?>
        <?php } ?>

        <!-- page end-->
    </section>
</section>


<div class="modal fade" id="ModalLibur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>kinerja/siod">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Pengaturan Libur</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="tgllibur" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-4">
                            <input class=" form-control input-sm m-bot15" id="tglLibur" name="tglLibur" type="date" size="16" required/>
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="statusLibur" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-4">
                            <select class="form-control input-sm m-bot15" id="statusLibur" name="statusLibur">
                                <option value="Libur">Libur</option>
                                <option value="Kerja">Kerja</option>
                            </select>
                        </div>
                    </div>
                </div>

                
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                    <input class="btn btn-warning" type="submit" name="simpan_libur" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

    jQuery(document).ready(function() {
        EditableTable.init();
    });

</script>
