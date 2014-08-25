<script type="text/javascript">
    var ms2 = new Array();

    $(document).ready(function() {

        //masukin array apar ke javascript
        var data;
<?php foreach ($ms2 as $a) { ?>
            data = new Array();
            data['id'] = "<?php echo $a->ID_MS2 ?>";

            data['tanggal'] = "<?php echo $a->TANGGAL ?>";

            data['sesuai_premium'] = "<?php echo $a->SESUAI_PREMIUM ?>";
            data['sesuai_pertamax'] = "<?php echo $a->SESUAI_PERTAMAX ?>";
            data['sesuai_solar'] = "<?php echo $a->SESUAI_SOLAR ?>";

            data['cepat_premium'] = "<?php echo $a->CEPAT_PREMIUM ?>";
            data['cepat_pertamax'] = "<?php echo $a->CEPAT_PERTAMAX ?>";
            data['cepat_solar'] = "<?php echo $a->CEPAT_SOLAR ?>";

            data['cepat_shift1_premium'] = "<?php echo $a->CEPAT_SHIFT1_PREMIUM ?>";
            data['cepat_shift1_pertamax'] = "<?php echo $a->CEPAT_SHIFT1_PERTAMAX ?>";
            data['cepat_shift1_solar'] = "<?php echo $a->CEPAT_SHIFT1_SOLAR ?>";

            data['lambat_premium'] = "<?php echo $a->LAMBAT_PREMIUM ?>";
            data['lambat_pertamax'] = "<?php echo $a->LAMBAT_PERTAMAX ?>";
            data['lambat_solar'] = "<?php echo $a->LAMBAT_SOLAR ?>";

            data['tidak_terkirim_premium'] = "<?php echo $a->TIDAK_TERKIRIM_PREMIUM ?>";
            data['tidak_terkirim_pertamax'] = "<?php echo $a->TIDAK_TERKIRIM_PERTAMAX ?>";
            data['tidak_terkirim_solar'] = "<?php echo $a->TIDAK_TERKIRIM_SOLAR ?>";

            ms2.push(data);
<?php } ?>


    });


    function setDetailMS2(index) {
        $("#id_ms2").val(ms2[index]['id']);
        $("#tanggal_ms2").val(ms2[index]['tanggal']);

        $("#premium1").val(ms2[index]['sesuai_premium']);
        $("#solar1").val(ms2[index]['sesuai_solar']);
        $("#pertamax1").val(ms2[index]['sesuai_pertamax']);

        $("#premium2").val(ms2[index]['cepat_premium']);
        $("#solar2").val(ms2[index]['cepat_solar']);
        $("#pertamax2").val(ms2[index]['cepat_pertamax']);

        $("#premium3").val(ms2[index]['cepat_shift1_premium']);
        $("#solar3").val(ms2[index]['cepat_shift1_solar']);
        $("#pertamax3").val(ms2[index]['cepat_shift1_pertamax']);

        $("#premium4").val(ms2[index]['lambat_premium']);
        $("#solar4").val(ms2[index]['lambat_solar']);
        $("#pertamax4").val(ms2[index]['lambat_pertamax']);

        $("#premium5").val(ms2[index]['tidak_terkirim_premium']);
        $("#solar5").val(ms2[index]['tidak_terkirim_solar']);
        $("#pertamax5").val(ms2[index]['tidak_terkirim_pertamax']);


    }

</script>
<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <div class="panel-heading">
                MS2 Complience
                <a style="float: right;" class="btn btn-xs btn-success" href="<?php echo base_url() ?>ba/import_ms2">Import MS2</a>
            </div>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url() ?>ba/ms2" role="form" id="commentForm" method="post">
                    <div class="form-group">
                        <label for="blnms2" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="blnms2" name="blnms2" class="form-control"  placeholder="Tanggal">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="submit" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if ($submit == true) { ?>
            <?php if ($status_ms2 > 0) { ?>
                <?php if ($edit == true) { ?>
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil edit MS2.
                    </div>
                <?php } ?>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel MS2 Complience <strong><?php echo $bulan . ' ' . $tahun; ?></strong>

                        <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalHapusMs2" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus MS2"><i class="icon-remove"></i></a>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " style="overflow-y: scroll">

                            <div class="space15"></div>
                            <table class="table table-bordered table-hover" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Tanggal</th>
                                        <th colspan="3">Sesuai Dengan MS2</th>
                                        <th colspan="3">Cepat (Sebelum MS2)</th>
                                        <th colspan="3">Lebih Cepat (Sebelum Shift 1)</th>
                                        <th colspan="3">Lambat (Setelah MS2)</th>
                                        <th colspan="3">Tidak Terkirim Sesuai Jadwal MS2</th>
                                        <th colspan="3">Total LO</th>
                                        <th rowspan="2" width="150px">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Pertamax</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Pertamax</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Pertamax</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Pertamax</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Pertamax</th>
                                        <th>Premium</th>
                                        <th>Solar</th>
                                        <th>Pertamax</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ms2 as $row) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->TANGGAL; ?></td>
                                            <td><?php echo $row->SESUAI_PREMIUM; ?>%</td>
                                            <td><?php echo $row->SESUAI_SOLAR; ?>%</td>    
                                            <td><?php echo $row->SESUAI_PERTAMAX; ?>%</td>
                                            <td><?php echo $row->CEPAT_PREMIUM; ?>%</td>
                                            <td><?php echo $row->CEPAT_SOLAR; ?>%</td>    
                                            <td><?php echo $row->CEPAT_PERTAMAX; ?>%</td>
                                            <td><?php echo $row->CEPAT_SHIFT1_PREMIUM; ?>%</td>
                                            <td><?php echo $row->CEPAT_SHIFT1_SOLAR; ?>%</td>    
                                            <td><?php echo $row->CEPAT_SHIFT1_PERTAMAX; ?>%</td>
                                            <td><?php echo $row->LAMBAT_PREMIUM; ?>%</td>
                                            <td><?php echo $row->LAMBAT_SOLAR; ?>%</td>    
                                            <td><?php echo $row->LAMBAT_PERTAMAX; ?>%</td>
                                            <td><?php echo $row->TIDAK_TERKIRIM_PREMIUM; ?>%</td>
                                            <td><?php echo $row->TIDAK_TERKIRIM_SOLAR; ?>%</td>    
                                            <td><?php echo $row->TIDAK_TERKIRIM_PERTAMAX; ?>%</td>
                                            <td><?php echo ($row->SESUAI_PREMIUM + $row->CEPAT_PREMIUM + $row->CEPAT_SHIFT1_PREMIUM + $row->LAMBAT_PREMIUM + $row->TIDAK_TERKIRIM_PREMIUM); ?>%</td>
                                            <td><?php echo ($row->SESUAI_SOLAR + $row->CEPAT_SOLAR + $row->CEPAT_SHIFT1_SOLAR + $row->LAMBAT_SOLAR + $row->TIDAK_TERKIRIM_SOLAR); ?>%</td>
                                            <td><?php echo ($row->SESUAI_PERTAMAX + $row->CEPAT_PERTAMAX + $row->CEPAT_SHIFT1_PERTAMAX + $row->LAMBAT_PERTAMAX + $row->TIDAK_TERKIRIM_PERTAMAX); ?>%</td>
                                            <td>
                                                <a data-placement="top" data-toggle="modal" href="#ModalMs2" onclick="setDetailMS2('<?php echo ($no - 1) ?>')" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            <?php } else { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Peringatan!</strong> MS2 bulan <strong><?php echo $bulan . ' ' . $tahun; ?></strong> belum diimport.
                </div>
            <?php } ?>
        <?php } else if ($hapus == true) { ?>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil hapus MS2.
            </div>
        <?php } ?>










    </section>
</section>
<!--main content end-->



<?php if ($submit == true) { ?>
    <?php if ($status_ms2 > 0) { ?>

        <!-- modal edit ms2-->
        <div class="modal fade" id="ModalMs2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url() ?>ba/edit_ms2">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Ubah MS2</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <div class="panel-body">

                                        <div class="form-group "> 
                                            <label for="tanggal" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                                <input type="text" class=" form-control input-sm m-bot15" id="tanggal_ms2" name="tanggal_ms2" value="" placeholder="Tanggal "required readonly/>
                                            </div>
                                            <input type="hidden" class=" form-control input-sm m-bot15" id="id_ms2" name="id_ms2" value="" required/>
                                            <input type="hidden" class=" form-control input-sm m-bot15" name="blnms2" value="<?php echo $blnms2; ?>" required/>
                                        </div>

                                        <div class="form-group "> 
                                            <p>Sesuai Dengan MS2</p>

                                            <div class="col-lg-4">
                                                Premium <input class=" form-control input-sm m-bot15" id="premium1" name="premium1" min="0" type="number" value="" placeholder="Premium"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Solar <input class=" form-control input-sm m-bot15" id="solar1" name="solar1" mi="0" type="number" value="" placeholder="Solar"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Pertamax <input class=" form-control input-sm m-bot15" id="pertamax1" name="pertamax1" min="0" type="number" value="" placeholder="Pertamax"required/>
                                            </div>
                                        </div>

                                        <div class="form-group "> 
                                            <p>Cepat (Sebelum Jadwal MS2)</p>
                                            <div class="col-lg-4">
                                                Premium <input class=" form-control input-sm m-bot15" id="premium2" name="premium2" min="0" type="number" value="" placeholder="Premium"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Solar <input class=" form-control input-sm m-bot15" id="solar2" name="solar2" min="0" type="number" value="" placeholder="Solar"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Pertamax <input class=" form-control input-sm m-bot15" id="pertamax2" name="pertamax2" min="0" type="number" value="" placeholder="Pertamax"required/>
                                            </div>
                                        </div>

                                        <div class="form-group "> 
                                            <p>Lebih Cepat (Sebelum Shift 1)</p>
                                            <div class="col-lg-4">
                                                Premium <input class=" form-control input-sm m-bot15" id="premium3" name="premium3" min="0" type="number" value="" placeholder="Premium"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Solar <input class=" form-control input-sm m-bot15" id="solar3" name="solar3" min="0" type="number" value="" placeholder="Solar"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Pertamax <input class=" form-control input-sm m-bot15" id="pertamax3" name="pertamax3" min="0" type="number" value="" placeholder="Pertamax"required/>
                                            </div>
                                        </div>

                                        <div class="form-group "> 
                                            <p>Lambat (Setelah MS2)</p>
                                            <div class="col-lg-4">
                                                Premium <input class=" form-control input-sm m-bot15" id="premium4" name="premium4" min="0" type="number" value="" placeholder="Premium"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Solar <input class=" form-control input-sm m-bot15" id="solar4" name="solar4" min="0" type="number" value="" placeholder="Solar"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Pertamax <input class=" form-control input-sm m-bot15" id="pertamax4" name="pertamax4" min="0" type="number" value="" placeholder="Pertamax"required/>
                                            </div>
                                        </div>

                                        <div class="form-group "> 
                                            <p>Tidak Terkirim Sesuai</p>
                                            <div class="col-lg-4">
                                                Premium <input class=" form-control input-sm m-bot15" id="premium5" name="premium5" min="0" type="number" value="" placeholder="Premium"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Solar <input class=" form-control input-sm m-bot15" id="solar5" name="solar5" min="0" type="number" value="" placeholder="Solar"required/>
                                            </div>
                                            <div class="col-lg-4">
                                                Pertamax <input class=" form-control input-sm m-bot15" id="pertamax5" name="pertamax5" min="0" type="number" value="" placeholder="Pertamax"required/>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-success" type="submit" name="submit" value="Simpan"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal hapus ms2-->
        <div class="modal fade" id="ModalHapusMs2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>ba/hapus_ms2">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Konfirmasi Hapus MS2</h4>
                        </div>
                        <div class="modal-body">
                            Yakin Hapus  MS2 Complience <strong><?php echo $bulan . ' ' . $tahun; ?></strong> ?
                            <input type="hidden" required="required" id="id_ms2" class="form-control" name="id_ms2" value="<?php echo htmlentities(serialize($ms2)); ?>">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-danger" type="submit" name="submit" value="Hapus"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
