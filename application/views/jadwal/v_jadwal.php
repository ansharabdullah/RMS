<script type="text/javascript">

    $(document).ready(function() {
        $("#signupForm").submit(function(e) {
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
        <section class="panel" id="LihatJadwal">
            <header class="panel-heading">
                Lihat Jadwal
                <div style="float:right;">
                    <a  data-placement="left" href="<?php echo base_url() ?>jadwal/hapus_jadwal/" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Jadwal"><i class="icon-minus"></i></a>
                    <a  data-placement="left" href="<?php echo base_url() ?>jadwal/import_penjadwalan/" class="btn btn-primary btn-xs tooltips" data-original-title="Import Jadwal"><i class="icon-plus"></i></a>
                </div>
            </header>
            <div class="panel-body" >
                <div class="clearfix">
                    <form class="cmxform form-horizontal tasi-form" id ="signupForm" method="GET" action="<?php echo base_url() ?>jadwal/lihat_jadwal/">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                                <input type="date" required="required" id="tanggalJadwal" class="form-control"  placeholder="Tanggal" name="tanggal">
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
        <?php if ($jadwal) { ?>
            <section class="panel" id="tabelJadwal">
                <header class="panel-heading">
                    Jadwal (<?php echo $tanggal; ?>)
                </header>
                <div class="panel-body"  >
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
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>No Polisi</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
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
                                            <td>
                                                <div  style="width: 70px;"> <a data-toggle="modal" href="#myModal" onclick="editJadwal('<?php echo $row->ID_JADWAL ?>', '<?php echo $row->TANGGAL_LOG_HARIAN ?>', '<?php echo $row->NAMA_PEGAWAI ?>', '<?php echo $row->STATUS_MASUK ?>', '<?php echo $row->NIP ?>')"><span  class="btn btn-warning btn-xs tooltips" data-original-title="Ganti Jadwal" data-placement="left" style="float:left"><i class="icon-pencil"></i></span> </a>

                                            </td>
                                        </tr>

                                        <?php
                                        $i++;
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
                                        <input type="hidden" readonly="readonly" value="" name="nip" required="required" class="form-control"  placeholder="" id="nip"/>
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

        <?php
        } else {
            if ($tanggal) {
                ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Jadwal tidak ditemukan.
                </div>
    <?php }
} ?>
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

                                                    jQuery(document).ready(function() {
                                                        EditableTable.init();
                                                    });

                                                    function editJadwal(id_jadwal, tanggal, nama_pegawai, status, nip) {
                                                        $("#nip").val(nip);
                                                        $("#id_jadwal").val(id_jadwal);
                                                        $("#tanggal_log_harian").val(tanggal);
                                                        $("#tanggal_log_harian1").val(tanggal);
                                                        $("#nama_pegawai").val(nama_pegawai);
                                                        $("#status_masuk").val(status);
                                                    }
</script>
