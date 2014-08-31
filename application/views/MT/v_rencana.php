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
    
    function loadExcel() {
        $("#filePreview").hide();
        $("#filePreview").slideDown("slow");
    }


</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Input Kinerja dari SIOD
                <div style="float:right;">
                    <a  data-placement="left" href="<?php echo base_url() ?>mt/manual" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah Manual"><i class="icon-plus"></i></a>
                    <a  data-placement="left" href="<?php echo base_url() ?>rencana/hapus" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus Kinerja SIOD"><i class="icon-minus"></i></a>

                    <a  data-placement="left" class="btn btn-xs btn-success tooltips" data-original-title="Download Format" href="<?php echo base_url() ?>downloads/format_oscrms_rencana.xlsx"><i class="icon-download-alt"></i></a>
                </div>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="<?php echo base_url() ?>mt/import_xls_rencana/" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File Excel</label>
                        <div class="col-lg-10">
                            <input type="file" name="fileSIOD" id="fileSIOD" required="required" class="form-control"  placeholder="FileSIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Upload">
                        </div>
                </form>

            </div>
        </section>

        <?php if ($error) { ?>
            <div class="col-lg-12">
                <div class="alert alert-block alert-danger fade in">
                    <strong>Error!</strong> <?php echo $error; ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($mt) { ?>
            <div id="filePreview">
                <section class="panel">
                    <header class="panel-heading">
                        Data dari Excel
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table "  style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Own Use</th>
                                    <th>Premium</th>
                                    <th>Pertamax</th>
                                    <th>Pertamax Plus</th>
                                    <th>Pertamina Dex</th>
                                    <th>Solar</th>
                                    <th>Bio Solar</th>
                                    <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $e = 0;
                                    $data = array();
                                    for ($i = 0; $i < sizeof($mt); $i++) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $mt[$i]['tanggal_log_harian'] ?></td>
                                            <td><?php echo $mt[$i]['r_own_use'] ?></td>
                                            <td><?php echo $mt[$i]['r_premium'] ?></td>
                                            <td><?php echo $mt[$i]['r_pertamax'] ?></td>
                                            <td><?php echo $mt[$i]['r_pertamaxplus'] ?></td>
                                            <td><?php echo $mt[$i]['r_pertaminadex'] ?></td>
                                            <td><?php echo $mt[$i]['r_solar'] ?></td>
                                            <td><?php echo $mt[$i]['r_biosolar'] ?></td>
                                            
                                            <td><?php
                                                if ($mt[$i]['error']) {
                                                    echo "<b>" . $mt[$i]['status_error'] . "</b>";
                                                } else {
                                                    echo $mt[$i]['status_error'];
                                                }
                                                ?></td>
                                        </tr>
                                        <?php
                                        $e += $mt[$i]['error'];
                                        $data[$i] = array(
                                            'tanggal_log_harian' => $mt[$i]['tanggal_log_harian'],
                                            'r_premium' => $mt[$i]['r_premium'],
                                            'r_pertamax' => $mt[$i]['r_pertamax'],
                                            'r_pertamaxplus' => $mt[$i]['r_pertamaxplus'],
                                            'r_pertaminadex' => $mt[$i]['r_pertaminadex'],
                                            'r_solar' => $mt[$i]['r_solar'],
                                            'r_biosolar' => $mt[$i]['r_biosolar'],
                                            
                                        );
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <form method="POST" action="<?php echo base_url() ?>mt/simpan_rencana/" enctype="multipart/form-data">
                            <?php if ($e != 0) { ?>
                                    <div class="col-lg-11">
                                        <div class="alert alert-block alert-danger fade in">
                                            <strong>Error!</strong> Anda harus memperbaiki file excell sesuai dengan format yang telah disediakan agar dapat menyimpan ke database.
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <input type="hidden" required="required" id="data_rencana" class="form-control" name="data_rencana" value="<?php echo htmlentities(serialize($data)); ?>">
                             <?php } ?>
                                   <br>
                                <input type="submit" style="float: right;" class="btn btn-success" value="Simpan" name="submit" <?php if ($e != 0) echo "disabled='true'" ?>> 
                      </form>
                    </div>
                </section>
            </div>
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
