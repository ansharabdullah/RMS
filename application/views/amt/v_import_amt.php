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
                <button type="button" style="float: right;" class="btn btn-xs btn-success tooltips" data-original-title="Download Format" data-placement="left" onclick="downloadCsv()"><i class="icon-download-alt"></i></button>
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
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Uploadzxcxzc">
                        </div>
                </form>

            </div>
        </section>


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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <form method="POST" action="<?php echo base_url() ?>amt/simpan_xls/" enctype="multipart/form-data">
                            <input type="hidden" required="required" id="data_amt" class="form-control" name="data_amt" value="<?php echo htmlentities(serialize($amt)); ?>">
                            <input type="submit" style="float: right;" class="btn btn-success" value="Simpan" name="submit">
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

