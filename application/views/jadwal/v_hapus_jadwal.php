<script type="text/javascript">

    $(document).ready(function () {
        $("#signupForm").submit(function (e) {
            var isvalidate = $("#signupForm").valid();
            if (isvalidate)
            {
                $("#tgl").html($("#tglForm").val());
                document.getElementById("commentForm").submit();
            }
            e.preventDefault();
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
                    <li><a href="<?php echo base_url(); ?>jadwal"> Penjadwalan</a></li>
                    <li class="active">Hapus Penjadwalan</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

        <section class="panel" id="LihatJadwal">
            <header class="panel-heading">
                Hapus Jadwal
            </header>
            <div class="panel-body" >
                <div class="clearfix">
                    <form class="cmxform form-horizontal tasi-form" id ="signupForm" method="GET" action="<?php echo base_url() ?>jadwal/hapus_jadwal_preview/">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                            <div class="col-lg-10">
                                <input type="month" required="required" id="bulanJadwal" class="form-control"  placeholder="Bulan" name="bulan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" style="float: right;" class="btn btn-warning" value="Cek">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php if (!$jadwal) { ?>
            <div class="alert alert-block alert-danger fade in">
                <strong>Error!</strong> Jadwal tidak ditemukan.
            </div>
        <?php } ?>
        <?php if ($jadwal) { ?>
            <section class="panel" id="tabelJadwal">
                <header class="panel-heading">
                    Hapus Jadwal (<b><?php echo date("M-Y", strtotime($tanggal)); ?></b>)
                </header>
                <div class="panel-body"  >
                    <div class="panel-body" >
                        <div class="adv-table editable-table "  style="overflow-x: scroll">
                            <div class="clearfix">
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>No Polisi</th>
                                        <th>Jadwal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($jadwal as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo date("d-M-Y", strtotime($row->TANGGAL_LOG_HARIAN)) ?></td>
                                            <td><?php echo $row->NIP ?></td>
                                            <td><?php echo $row->NAMA_PEGAWAI ?></td>
                                            <td><?php echo $row->JABATAN ?></td>
                                            <td><?php echo $row->NOPOL ?></td>
                                            <td><?php
                                                if ($row->STATUS_MASUK == "Libur")
                                                    echo "<b>" . $row->STATUS_MASUK . "</b>";else {
                                                    echo $row->STATUS_MASUK;
                                                }
                                                ?></td>
                                        </tr>

                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br />

                        <form method="POST" action="<?php echo base_url() ?>jadwal/penjadwalan/">
                            <input name="bulan"  type="hidden" value="<?php echo $tanggal ?>">
                            <input style="float:right" data-placement="left" class="btn btn-danger btn-sm tooltips" name="delete_jadwal" data-original-title="Hapus jadwal bulan ini" type="submit" value="Hapus">
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Jadwal</h4>
                            </div>
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>jadwal/edit_jadwal/">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="ou" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="" readonly="readonly" name="own-use" required="required" class="form-control" id="tanggal_log_harian" placeholder="Own Use"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Nama pegawai</label>
                                            <div class="col-lg-10">
                                                <input type="text" readonly="readonly" value="" name="nama_pegawai" required="required" class="form-control"  placeholder="Nama Pegawai" id="nama_pegawai"/>
                                            </div>
                                        </div>
                                        <input type="hidden" readonly="readonly" value="" name="id_jadwal" required="required" class="form-control"  placeholder="" id="id_jadwal"/>
                                        <input type="hidden" readonly="readonly" value="" name="tanggal_log_harian" required="required" class="form-control"  placeholder="" id="tanggal_log_harian1"/>
                                        <div class="form-group">
                                            <label for="pertamax" class="col-lg-2 col-sm-2 control-label">Jadwal</label>
                                            <div class="col-lg-10" >
                                                <select class="form-control m-bot15" name="status_masuk" id="status_masuk">
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Libur">Libur</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                                        <input class="btn btn-success" name="submit"  type="submit" value="Simpan">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

    jQuery(document).ready(function () {
        EditableTable.init();
    });

    function editJadwal(id_jadwal, tanggal, nama_pegawai, status) {
        $("#id_jadwal").val(id_jadwal);
        $("#tanggal_log_harian").val(tanggal);
        $("#tanggal_log_harian1").val(tanggal);
        $("#nama_pegawai").val(nama_pegawai);
        $("#status_masuk").val(status);
    }
</script>
