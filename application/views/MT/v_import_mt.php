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
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>mt/data_mt">Data Mobil</a></li>
                    <li class="active">Import Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Import Data MT Dari Excel
                <a href="<?php echo base_url() ?>downloads/format_oscrms_mt.xlsx" type="button" style="float: right;" class="btn btn-xs btn-success tooltips" data-original-title="Download Format" data-placement="left"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>mt/import_xls_mt/" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">File Excel</label>
                        <div class="col-lg-10">
                            <input type="file" name="fileMT" id="fileName" required="required" class="form-control"  placeholder="File MT">
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
                                    <th>Nopol</th>
                                    <th>No Rangka</th>
                                    <th>No Mesin</th>
                                    <th>Kapasitas</th>
                                    <th>Produk</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Transportir</th>
                                    <th>Rasio</th>
                                    <th>Jenis Tangki</th>
                                    <th>Status Mobil</th>
                                    <th>GPS</th>
                                    <th>Sensor Overfill</th>
                                    <th>Standar Volume</th>
                                    <th>Volume 1</th>
                                    <th>Kategori Mobil</th>
                                    <th>Jumlah Segel</th>
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
                                            <td><?php echo $mt[$i]['nopol'] ?></td>
                                            <td><?php echo $mt[$i]['no_rangka'] ?></td>
                                            <td><?php echo $mt[$i]['no_mesin'] ?></td>
                                            <td><?php echo $mt[$i]['kapasitas'] ?></td>
                                            <td><?php echo $mt[$i]['produk'] ?></td>
                                            <td><?php echo $mt[$i]['jenis_kendaraan'] ?></td>
                                            <td><?php echo $mt[$i]['transportir'] ?></td>
                                            <td><?php echo $mt[$i]['rasio'] ?></td>
                                            <td><?php echo $mt[$i]['jenis_tangki'] ?></td>
                                            <td><?php echo $mt[$i]['status_mobil'] ?></td>
                                            <td><?php echo $mt[$i]['gps'] ?></td>
                                            <td><?php echo $mt[$i]['sensor_overfill'] ?></td>
                                            <td><?php echo $mt[$i]['standar_volume'] ?></td>
                                            <td><?php echo $mt[$i]['volume_1'] ?></td>
                                            <td><?php echo $mt[$i]['kategori_mobil'] ?></td>
                                            <td><?php echo $mt[$i]['standar_volume'] ?></td>
                                            
                                            
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
                                            'nopol' => $mt[$i]['nopol'],
                                            'transportir' => $mt[$i]['transportir'],
                                            'id_depot' => $mt[$i]['id_depot'],
                                            'kapasitas' => $mt[$i]['kapasitas'],
                                            'produk' => $mt[$i]['produk'],
                                            'kategori_mobil' => $mt[$i]['kategori_mobil'],
                                            'jenis_tangki' => $mt[$i]['jenis_tangki'],
                                            'no_rangka' => $mt[$i]['no_rangka'],
                                            'no_mesin' => $mt[$i]['no_mesin'],
                                            'status_mobil' => $mt[$i]['status_mobil'],
                                            'gps' => $mt[$i]['gps'],
                                            'jenis_kendaraan' => $mt[$i]['jenis_kendaraan'],
                                            'rasio' => $mt[$i]['rasio'],
                                            'sensor_overfill' => $mt[$i]['sensor_overfill'],
                                            'standar_volume' => $mt[$i]['standar_volume'],
                                            'volume_1' => $mt[$i]['volume_1'],
                                            'jumlah_segel' => $mt[$i]['jumlah_segel'],
                                            'rk1_komp1' => $mt[$i]['rk1_komp1'],
                                            'rk1_komp2' => $mt[$i]['rk1_komp2'],
                                            'rk1_komp3' => $mt[$i]['rk1_komp3'],
                                            'rk1_komp4' => $mt[$i]['rk1_komp4'],
                                            'rk1_komp5' => $mt[$i]['rk1_komp5'],
                                            'rk1_komp6' => $mt[$i]['rk1_komp6'],
                                            'rk2_komp1' => $mt[$i]['rk2_komp1'],
                                            'rk2_komp2' => $mt[$i]['rk2_komp2'],
                                            'rk2_komp3' => $mt[$i]['rk2_komp3'],
                                            'rk2_komp4' => $mt[$i]['rk2_komp4'],
                                            'rk2_komp5' => $mt[$i]['rk2_komp5'],
                                            'rk2_komp6' => $mt[$i]['rk2_komp6'],
                                            'k_komp1' => $mt[$i]['k_komp1'],
                                            'k_komp2' => $mt[$i]['k_komp2'],
                                            'k_komp3' => $mt[$i]['k_komp3'],
                                            'k_komp4' => $mt[$i]['k_komp4'],
                                            'k_komp5' => $mt[$i]['k_komp5'],
                                            'k_komp6' => $mt[$i]['k_komp6'],
                                            
                                        );
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <form method="POST" action="<?php echo base_url() ?>mt/simpan_xls/" enctype="multipart/form-data">
                           <br>
                                 <?php if ($e != 0) { ?>
                                    <div class="col-lg-11">
                                        <div class="alert alert-block alert-danger fade in">
                                            <strong>Error!</strong> Anda harus memperbaiki file excell sesuai dengan format yang telah disediakan agar dapat menyimpan ke database.
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <input type="hidden" required="required" id="data_mt" class="form-control" name="data_mt" value="<?php echo htmlentities(serialize($data)); ?>">
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();

    });

</script>

