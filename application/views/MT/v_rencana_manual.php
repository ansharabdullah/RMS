<script type="text/javascript">
   
    var mt = new Array();

    $(document).ready(function() {

        //masukin array apar ke javascript
        var data;
<?php foreach ($mt as $a) { ?>
            data = new Array();
            data['id'] = "<?php echo $a->ID_RENCANA ?>";
            data['tanggal'] = "<?php echo $a->TANGGAL_LOG_HARIAN ?>";
            data['r_own_use'] = "<?php echo $a->R_OWN_USE ?>";
            data['r_premium'] = "<?php echo $a->R_PREMIUM ?>";
            data['r_pertamax'] = "<?php echo $a->R_PERTAMAX ?>";
            data['r_perttamaxplus'] = "<?php echo $a->R_PERTAMAXPLUS ?>";
            data['r_pertaminadex'] = "<?php echo $a->R_PERTAMINADEX ?>";
            data['r_solar'] = "<?php echo $a->R_SOLAR ?>";
            data['r_biosolar'] = "<?php echo $a->R_BIOSOLAR ?>";
           
            mt.push(data);
<?php }?>

</script>


<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Tambah Kinerja Manual
            </header>
          
        </section>
        <?php if ($KLIK_SIMPAN == true) { ?>
            if ($KLIK_SIMPAN_RENCANA == true) { ?>
                <?php if ($error_id_log_harian == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> ID log harian tidak ditemukan.
                    </div>
                <?php } ?>
                <?php if ($error_id_rencana == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Kinerja MT untuk tanggal yang dipilih telah diinput, tidak dapat input dua kali.
                    </div>
                <?php } ?>
                <?php if ($error_id_log_harian == false && $error_id_rencana == false) { ?>
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil input kinerja MT.
                    </div>
                <?php } ?>
        <?php } ?>

        <section class="panel" id="mt">
            <header class="panel-heading">
                Input Rencana
            </header>
            <div class="panel-body">                
                <div class="adv-table editable-table">

                    <div class="adv-table editable-table">

                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Ownuse</th>
                                    <th>Premium</th>
                                    <th>Pertamax</th>
                                    <th>Pertamax Plus</th>
                                    <th>Pertamina Dex</th>
                                    <th>Solar</th>
                                    <th>Bio Solar</th>
                                    <th>AKsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($mt as $row) {
                                    ?>
                                    <tr class="">
                                        <th style="display: none;"></th>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->TANGGAL_LOG_HARIAN; ?></td>
                                        <td><?php echo $row->R_OWN_USE; ?></td>
                                        <td><?php echo $row->R_PREMIUM; ?></td>
                                        <td><?php echo $row->R_PERTAMAX; ?></td>
                                        <td><?php echo $row->R_PERTAMAXPLUS; ?></td>
                                        <td><?php echo $row->R_PERTAMINADEX; ?></td>
                                        <td><?php echo $row->R_SOLAR; ?></td>
                                        <td><?php echo $row->R_BIOSOLAR; ?></td>

                                        <td><a data-toggle="modal" data-placement="left" href="#mtModal" onclick="setDetail('<?php echo ($no - 1) ?>')" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                </div>
        </section>
        <!-- page end-->
    </section>
</section>




<!-- Modal -->
<div class="modal fade" id="mtModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Atur Kinerja Mobil Tangki</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url() ?>kinerja/simpan_manual">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_mobil" name="id_mobil" required readonly>

                        <label for="tgl_mobil" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="date" size="16" name="tgl_mobil" required/>
                            <span class="help-block">Pilih Tanggal</span>
                        </div>

                        <label for="nopol_mobil" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="nopol_mobil" name="nopol_mobil" placeholder="Nopol" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="km_mobil" class="col-lg-2 col-sm-2 control-label">Kilometer (km)</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="km_mobil" placeholder="Kilometer (km)" name="km_mobil" min="0" required>
                        </div>

                        <label for="kl_mobil" class="col-lg-2 col-sm-2 control-label">Kiloliter (kl)</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="kl_mobil" placeholder="Kiloliter (kl)" name="kl_mobil" min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rit_mobil" class="col-lg-2 col-sm-2 control-label">Ritase (rit)</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="rit" placeholder="Ritase (rit)" name="rit_mobil" min="0" required>
                        </div>

                        <label for="ou_mobil" class="col-lg-2 col-sm-2 control-label">Own Use</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="ou_mobil" placeholder="Own Use"  name="ou_mobil" min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="premium_mobil" class="col-lg-2 col-sm-2 control-label">Premium</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="premium_mobil" placeholder="Premium" name="premium_mobil" min="0" required>
                        </div>

                        <label for="pertamax_mobil" class="col-lg-2 col-sm-2 control-label">Pertamax</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="pertamax_mobil" placeholder="Pertamax"  name="pertamax_mobil" min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pertamaxplus_mobil" class="col-lg-2 col-sm-2 control-label">Pertamax Plus</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="pertamaxplus_mobil" placeholder="Pertamax Plus"  name="pertamaxplus_mobil" min="0" required>
                        </div>

                        <label for="pertaminadex_mobil" class="col-lg-2 col-sm-2 control-label">Pertamina Dex</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="pertamaxdex_mobil" placeholder="Pertamina Dex" name="pertaminadex_mobil" min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="solar_mobil" class="col-lg-2 col-sm-2 control-label">Solar</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="solar_mobil" placeholder="Solar"  name="solar_mobil" min ="0" required>
                        </div>

                        <label for="biosolar_mobil" class="col-lg-2 col-sm-2 control-label">Bio Solar</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="biosolar_mobil" placeholder="Bio Solar"  name="biosolar_mobil" min="0" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" name="submit_mobil" value="Simpan">
                </div>
            </form>

        </div>
    </div>
</div>



<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
                                        jQuery(document).ready(function() {
                                            EditableTable.init();
                                        });



</script>