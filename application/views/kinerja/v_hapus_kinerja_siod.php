<script type="text/javascript">

    $(document).ready(function() {

        $("#signupForm1").submit(function(e) {
            var isvalidate = $("#signupForm1").valid();
            if (isvalidate)
            {
                var tanggal = new Date($("#tanggalSIOD").val());
                var hasil = tanggal.getDate() + "-" + (tanggal.getMonth() + 1) + "-" + tanggal.getFullYear();
                $("#tanggal").html(hasil);
                $("#tanggal_hapus").val($("#tanggalSIOD").val());
                $('#ModalHapus').modal('show')
                e.preventDefault();
            }
        });
    });

</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Hapus Semua Kinerja               
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="<?php echo base_url() ?>kinerja/hapus" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="date" required="required" id="tanggal_cek" class="form-control"  placeholder="Tanggal" name="tanggal_cek" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10 col-sm-6">
                            <input type="submit" style="float: right;" class="btn btn-warning" value="Cek" name="cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- page end-->

        <?php if ($klik_hapus == true) { ?>
            <?php if ($status_hapus == true) { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil hapus semua kinerja.
                </div>    


            <?php } else { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data kinerja tidak ditemukan.
                </div>
            <?php } ?>
        <?php } else if ($klik_cek == true) { ?>
            <?php if ($status_hapus == false) { ?>                
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data kinerja tidak ditemukan.
                </div>
            <?php } else { ?>
                <section class="panel">
                    <header class="panel-heading">
                        Kinerja tanggal <strong><?php echo $tanggal; ?></strong>
                    </header>
                </section>

                <section class="panel">
                    <header class="panel-heading">
                        Jumlah SPBU : <strong><?php echo $alokasi_spbu; ?></strong>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kinerja_mt as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->NOPOL; ?></td>
                                            <td><?php echo $row->RITASE_MT; ?></td>
                                            <td><?php echo $row->TOTAL_KM_MT; ?></td>
                                            <td><?php echo $row->TOTAL_KL_MT; ?></td>
                                            <td><?php echo $row->OWN_USE; ?></td>
                                            <td><?php echo $row->PREMIUM; ?></td>
                                            <td><?php echo $row->PERTAMAX; ?></td>
                                            <td><?php echo $row->PERTAMAX_PLUS; ?></td>
                                            <td><?php echo $row->BIO_SOLAR; ?></td>
                                            <td><?php echo $row->PERTAMINA_DEX; ?></td>
                                            <td><?php echo $row->SOLAR; ?></td>
                                        </tr>
                                        <?php $no++;
                                    }
                                    ?>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kinerja_amt as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->NIP; ?></td>
                                            <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                            <td><?php echo $row->JABATAN; ?></td>
                                            <td><?php echo $row->STATUS_TUGAS; ?></td>
                                            <td><?php echo $row->KLASIFIKASI; ?></td>
                                            <td><?php echo $row->TOTAL_KM; ?></td>
                                            <td><?php echo $row->TOTAL_KL; ?></td>
                                            <td><?php echo $row->RITASE_AMT; ?></td>
                                            <td><?php echo $row->SPBU; ?></td>
                                            <td><?php echo $row->PENDAPATAN; ?></td>

                                        </tr>
                                        <?php $no++;
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="signupForm1" action="#" method="POST">
                            <input type="hidden" required="required" id="tanggalSIOD" class="form-control" name="tanggalSIOD" value="<?php echo $tanggal_cek; ?>">
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-6">
                                    <input type="submit" style="float: right;" class="btn btn-danger" value="Hapus" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

    <?php } ?>
<?php } ?>
    </section>
</section>


<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Konfirmasi hapus kinerja</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>kinerja/hapus">
                <div class="modal-body">
                    <input type="hidden" name="tanggal_hapus" id="tanggal_hapus" value="">
                    Yakin hapus semua kinerja pada tanggal <strong><span id="tanggal"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-danger" type="submit" name="submit" value="Hapus">
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