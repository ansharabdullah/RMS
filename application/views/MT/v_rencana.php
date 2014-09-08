<?php
function DateToIndo($date) { 
        $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        $tgl   = substr($date, 8, 2); 
        
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
}

?>

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
                Lihat Rencana
                <div style="float:right;">
                    <a  data-placement="left" href="<?php echo base_url() ?>mt/rencana_import/" class="btn btn-success btn-xs tooltips" data-original-title="Import Rencana">Import Rencana</a>
                </div>
            </header>
            <div class="panel-body" >
                <div class="clearfix">
                    <form class="cmxform form-horizontal tasi-form" id ="signupForm" method="GET" action="<?php echo base_url() ?>mt/lihat_rencana/">
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
        <?php if ($rencana) { ?>
            <section class="panel" id="tabelJadwal">
                <header class="panel-heading">
                    Rencana (<?php echo $tanggal; ?>)
                    <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalHapusRencana" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Rencana"><i class="icon-remove"></i></a>
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
                                        <th>Tanggal</th>
                                        <th>Premium</th>
                                        <th>Pertamax</th>
                                        <th>Pertamax Plus</th>
                                        <th>Pertamina Dex</th>
                                        <th>Solar</th>
                                        <th>Bio Solar</th>
                                        <th>Own Use</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($rencana as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo ($i + 1) ?></td>
                                             <td><?php echo(DateToIndo($row->TANGGAL_LOG_HARIAN)); ?></td>
                                            <td><?php echo $row->R_PREMIUM ?></td>
                                            <td><?php echo $row->R_PERTAMAX?></td>
                                            <td><?php echo $row->R_PERTAMAXPLUS ?></td>
                                            <td><?php echo $row->R_PERTAMINADEX ?></td>
                                            <td><?php echo $row->R_SOLAR ?></td>
                                            <td><?php echo $row->R_BIOSOLAR ?></td>
                                            <td><?php echo $row->R_OWN_USE ?></td>
                                            <td>
                                                <div  style="width: 70px;"> <a data-toggle="modal" href="#myModal" onclick="editRencana('<?php echo $row->ID_RENCANA ?>', '<?php echo $row->TANGGAL_LOG_HARIAN ?>', '<?php echo $row->R_PREMIUM ?>', '<?php echo $row->R_PERTAMAX ?>', '<?php echo $row->R_PERTAMAXPLUS ?>', '<?php echo $row->R_PERTAMINADEX ?>', '<?php echo $row->R_SOLAR ?>','<?php echo $row->R_BIOSOLAR ?>','<?php echo $row->R_OWN_USE ?>')"><span  class="btn btn-warning btn-xs tooltips" data-original-title="Ganti Rencana" data-placement="left" style="float:left"><i class="icon-pencil"></i></span> </a>

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
                                <h4 class="modal-title">Edit Rencana</h4>
                            </div>
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>mt/edit_rencana/">

                                    <div class="modal-body">
                                        <input type="hidden" readonly="readonly" value="" name="id_jadwal" required="required" class="form-control"  placeholder="" id="id_jadwal"/>
                                        <input type="hidden" readonly="readonly" value="" name="tanggal_log_harian" required="required" class="form-control"  placeholder="" id="tanggal_log_harian1"/>
                                        <input type="hidden" readonly="readonly" value="" name="nip" required="required" class="form-control"  placeholder="" id="nip"/>
                                        
                                        <div class="form-group">
                                            <label for="ou" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="" readonly="readonly" name="own-use" required="required" class="form-control" id="tanggal_log_harian"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Premium</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="R_PREMIUM" required="required" class="form-control"  placeholder="Nama Pegawai" id="R_PREMIUM"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Pertamax</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="r_pertamax" required="required" class="form-control"  placeholder="Nama Pegawai" id="r_pertamax"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Pertamax Plus</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="r_pertamaxplus" required="required" class="form-control"  placeholder="Nama Pegawai" id="r_pertamaxplus"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Pertamina Dex</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="r_pertaminadex" required="required" class="form-control"  placeholder="Nama Pegawai" id="r_pertaminadex"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Solar</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="r_solar" required="required" class="form-control"  placeholder="Nama Pegawai" id="r_solar"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Bio Solar</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="r_biosolar" required="required" class="form-control"  placeholder="Nama Pegawai" id="r_biosolar"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="premium" class="col-lg-2 col-sm-2 control-label">Own Use</label>
                                            <div class="col-lg-10">
                                                <input type="number" value="" name="r_own_use" required="required" class="form-control"  placeholder="Nama Pegawai" id="r_own_use"/>
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
                    <strong>Error!</strong> Rencana tidak ditemukan.
                </div>
    <?php }
} ?>
    </section>
</section>


        <!-- modal hapus Rencana-->
        <div class="modal fade" id="ModalHapusRencana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>mt/hapus_rencana/">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Hapus Rencana</h4>
                        </div>
                        <div class="modal-body">
                            Yakin Hapus Rencana <strong><?php echo $tanggal; ?></strong> ?
                            <input type="hidden" required="required" id="id_rencana" class="form-control" name="id_rencana" value="<?php echo htmlentities(serialize($rencana)); ?>">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-danger" type="submit" name="submit" value="Hapus"/>
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
function editRencana(id_jadwal, tanggal, R_PREMIUM, r_pertamax, r_pertaminadex, r_pertamaxplus, r_solar, r_biosolar, r_own_use ) {
    $("#R_PREMIUM").val(R_PREMIUM);
    $("#id_jadwal").val(id_jadwal);
    $("#tanggal_log_harian").val(tanggal);
    $("#tanggal_log_harian1").val(tanggal);
    $("#r_pertamax").val(r_pertamax);
    $("#r_pertamaxplus").val(r_pertamaxplus);
    $("#r_pertaminadex").val(r_pertaminadex);
    $("#r_solar").val(r_solar);
    $("#r_biosolar").val(r_biosolar);
    $("#r_own_use").val(r_own_use);
   }
</script>
