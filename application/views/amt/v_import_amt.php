<script type="text/javascript">
    $(document).ready(function() {
        $("#commentForm").submit(function(e) {
            var isvalidate = $("#commentForm").valid();
            if (isvalidate)
            {
                var ext = $("#fileName").val().split('.').pop();
                if (ext == "xls" || ext == "xlsx") {
                    //$("#filePreview").hide();
                    //$("#filePreview").slideDown("slow");
                    document.getElementById("commentForm").submit();
                }
                else
                {
                    alert("Tipe file yang diupload tidak sesuai (Excel)")
                }
            }
            e.preventDefault();
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
                Import Data AMT Dari Excel
                <a href="<?php echo base_url() ?>downloads/format_oscrms_amt.xlsx" type="button" style="float: right;" class="btn btn-xs btn-success tooltips" data-original-title="Download Format" data-placement="left"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>amt/import_xls/" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">File Excel</label>
                        <div class="col-lg-10">
                            <input type="file" name="fileAMT" id="fileName" required="required" class="form-control"  placeholder="File AMT">
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
        <?php if ($amt) { ?>
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
                                        <th style="display: none;"></th>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>No Pekerja</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Klasifikasi</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No. KTP</th>
                                        <th>No. SIM</th>
                                        <th>No. Telp</th>
                                        <th>Transportir Asal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $e = 0;
                                    $data = array();
                                    for ($i = 0; $i < sizeof($amt); $i++) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $amt[$i]['nip'] ?></td>
                                            <td><?php echo $amt[$i]['no_pekerja'] ?></td>
                                            <td><?php echo $amt[$i]['nama_pegawai'] ?></td>
                                            <td><?php echo $amt[$i]['jabatan'] ?></td>
                                            <td><?php echo $amt[$i]['klasifikasi'] ?></td>
                                            <td><?php echo $amt[$i]['tempat_lahir'] ?></td>
                                            <td><?php echo $amt[$i]['tanggal_lahir'] ?></td>
                                            <td><?php echo $amt[$i]['no_ktp'] ?></td>
                                            <td><?php echo $amt[$i]['no_sim'] ?></td>
                                            <td><?php echo $amt[$i]['no_telepon'] ?></td>
                                            <td><?php echo $amt[$i]['transportir_asal'] ?></td>
                                            <td><?php
                                                if ($amt[$i]['error']) {
                                                    echo "<b>" . $amt[$i]['status_error'] . "</b>";
                                                } else {
                                                    echo $amt[$i]['status_error'];
                                                }
                                                ?></td>
                                        </tr>
                                        <?php
                                        $e += $amt[$i]['error'];
                                        $data[$i] = array(
                                            'nip' => $amt[$i]['nip'],
                                            'no_pekerja' => $amt[$i]['no_pekerja'],
                                            'id_depot' => $amt[$i]['id_depot'],
                                            'nama_pegawai' => $amt[$i]['nama_pegawai'],
                                            'jabatan' => $amt[$i]['jabatan'],
                                            'klasifikasi' => $amt[$i]['klasifikasi'],
                                            'tempat_lahir' => $amt[$i]['tempat_lahir'],
                                            'tanggal_lahir' => $amt[$i]['tanggal_lahir'],
                                            'no_ktp' => $amt[$i]['no_ktp'],
                                            'no_sim' => $amt[$i]['no_sim'],
                                            'no_telepon' => $amt[$i]['no_telepon'],
                                            'transportir_asal' => $amt[$i]['transportir_asal'],
                                            'alamat' => $amt[$i]['alamat'],
                                            'tanggal_masuk' => $amt[$i]['tanggal_masuk'],
                                            'status' => 'AKTIF'
                                        );
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <form method="POST" action="<?php echo base_url() ?>amt/simpan_xls/" enctype="multipart/form-data">
    <?php if ($e != 0) { ?>
                                <div class="col-lg-11">
                                    <div class="alert alert-block alert-danger fade in">
                                        <strong>Error!</strong> Anda harus memperbaiki file excell sesuai dengan format yang telah disediakan agar dapat menyimpan ke database.
                                    </div>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" required="required" id="data_amt" class="form-control" name="data_amt" value="<?php echo htmlentities(serialize($data)); ?>">
    <?php } ?>
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();

    });

</script>

