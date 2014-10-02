<script type="text/javascript">
    var amt = new Array();
    var mt = new Array();

    $(document).ready(function() {
        $("#amt").show();
        $("#mt").hide();

        //masukin array apar ke javascript
        var data;
<?php foreach ($AMT as $a) { ?>
            data = new Array();
            data['id'] = "<?php echo $a->ID_PEGAWAI ?>";
            data['nip'] = "<?php echo $a->NIP ?>";
            data['no_pekerja'] = "<?php echo $a->NO_PEKERJA ?>";
            data['nama_pegawai'] = "<?php echo $a->NAMA_PEGAWAI ?>";
            data['jabatan'] = "<?php echo $a->JABATAN ?>";
            data['transportir'] = "<?php echo $a->TRANSPORTIR_ASAL ?>";
            data['klas'] = "<?php echo $a->KLASIFIKASI ?>";
            amt.push(data);
<?php } ?>
<?php foreach ($MT as $a) { ?>
            data = new Array();
            data['id'] = "<?php echo $a->ID_MOBIL ?>";
            data['nopol'] = "<?php echo $a->NOPOL ?>";
            mt.push(data);
<?php } ?>

    });

    function showKinerjaAMT() {
        $("#amt").fadeIn("slow");
        $("#mt").hide();

    }

    function showKinerjaMT() {
        $("#mt").fadeIn("slow");
        $("#amt").hide();
    }

    function setDetailPegawai(index) {
        $("#id_pegawai").val(amt[index]['id']);
        $("#nip_pegawai").val(amt[index]['nip']);
        $("#nama_pegawai").val(amt[index]['nama_pegawai']);
        $("#jabatan").val(amt[index]['jabatan']);
        $("#klas_pegawai").val(amt[index]['klas']);
    }

    function setDetailMobil(index) {
        $("#id_mobil").val(mt[index]['id']);
        $("#nopol_mobil").val(mt[index]['nopol']);
    }

</script>


<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>kinerja">Kinerja</a></li>
                    <li class="active">Input Manual</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Tambah Kinerja Manual
            </header>
            <div class="panel-body">
                <a class="btn btn-primary" onclick="showKinerjaAMT()">
                    <i class="icon-user"></i> Kinerja AMT
                </a>

                <a class="btn btn-primary" onclick="showKinerjaMT()">
                    <i class="icon-truck"></i> Kinerja MT
                </a>
            </div>
        </section>
        <?php if ($KLIK_SIMPAN == true) { ?>
            <?php if ($KLIK_SIMPAN_PEGAWAI == true) { ?>
                <?php if ($error_id_log_harian == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> ID log harian tidak ditemukan.
                    </div>
                <?php } ?>
                <?php if ($error_id_kinerja_amt == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Kinerja AMT untuk tanggal yang dipilih telah diinput, tidak dapat input dua kali.
                    </div>
                <?php } ?>
                <?php if ($error_koefisien == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Koefisien performansi untuk tahun yang dipilih tidak ditemukan.
                    </div>
                <?php } ?>
                <?php if ($error_tanggal == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Tanggal yang dipilih melebihi hari ini.
                    </div>
                <?php } ?>

                <?php if ($error_id_log_harian == false && $error_id_kinerja_amt == false && $error_koefisien == false && $error_tanggal == false) { ?>
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil input kinerja AMT.
                    </div>
                <?php } ?>
            <?php } else if ($KLIK_SIMPAN_MOBIL == true) { ?>
                <?php if ($error_id_log_harian == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> ID log harian tidak ditemukan.
                    </div>
                <?php } ?>
                <?php if ($error_id_kinerja_mt == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Kinerja MT untuk tanggal yang dipilih telah diinput, tidak dapat input dua kali.
                    </div>
                <?php } ?>
                <?php if ($error_tanggal == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Tanggal yang dipilih melebihi hari ini.
                    </div>
                <?php } ?>
                <?php if ($error_id_log_harian == false && $error_id_kinerja_mt == false&& $error_tanggal == false) { ?>
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil input kinerja MT.
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <section class="panel" id="amt">
            <header class="panel-heading">
                Input Kinerja Awak Mobil Tangki
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table">

                    <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Transportir Asal</th>
                                <th>Klasifikasi</th>
                                <th>Kinerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($AMT as $row) {
                                ?>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->NIP; ?></td>
                                    <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                    <td><?php echo $row->JABATAN; ?></td>
                                    <td><?php echo $row->TRANSPORTIR_ASAL; ?></td>
                                    <td><?php echo $row->KLASIFIKASI; ?></td>
                                    <td><a data-toggle="modal" data-placement="left" href="#amtModal" onclick="setDetailPegawai('<?php echo ($no - 1) ?>')" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
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

        <section class="panel" id="mt">
            <header class="panel-heading">
                Input Kinerja Mobil Tangki
            </header>
            <div class="panel-body">                
                <div class="adv-table editable-table">

                    <div class="adv-table editable-table">

                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Nopol</th>
                                    <th>Transportir</th>
                                    <th>Kapasitas</th>
                                    <th>Produk</th>
                                    <th>kategori</th>
                                    <th>Status</th>
                                    <th>Kinerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($MT as $row) {
                                    ?>
                                    <tr class="">
                                        <th style="display: none;"></th>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->NOPOL; ?></td>
                                        <td><?php echo $row->TRANSPORTIR; ?></td>
                                        <td><?php echo $row->KAPASITAS; ?></td>
                                        <td><?php echo $row->PRODUK; ?></td>
                                        <td><?php echo $row->KATEGORI_MOBIL; ?></td>
                                        <td><?php echo $row->STATUS_MOBIL; ?></td>

                                        <td><a data-toggle="modal" data-placement="left" href="#mtModal" onclick="setDetailMobil('<?php echo ($no - 1) ?>')" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
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
<!-- Modal -->
<div class="modal fade" id="amtModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Atur Kinerja Awak Mobil Tangki</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>kinerja/simpan_manual">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" required readonly>

                        <label for="nip_pegawai" class="col-lg-2 col-sm-2 control-label">NIP</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai" required readonly>
                        </div>

                        <label for="nama_pegawai" class="col-lg-2 col-sm-2 control-label">Nama</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jabatan" class="col-lg-2 col-sm-2 control-label">Jabatan</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required readonly>
                        </div>

                        <label for="klas_pegawai" class="col-lg-2 col-sm-2 control-label">Klas</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="klas_pegawai" name="klas_pegawai" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="date" size="16" name="tgl" required/>
                            <span class="help-block">Pilih Tanggal</span>
                        </div>

                        <label for="status_tugas" class="control-label col-lg-2">Status Tugas</label>
                        <div class="col-lg-4">
                            <select class="form-control input-sm m-bot15" id="status_tugas" name="status_tugas">
                                <option value="SUPIR">SUPIR</option>
                                <option value="KERNET">KERNET</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="km_pegawai" class="col-lg-2 col-sm-2 control-label">Kilometer (km)</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="km_pegawai" placeholder="Kilometer (km)" name="km_pegawai" min="0" required>
                        </div>

                        <label for="kl_pegawai" class="col-lg-2 col-sm-2 control-label">Kiloliter (kl)</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="kl_pegawai" placeholder="Kiloliter (kl)" name="kl_pegawai" min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rit_pegawai" class="col-lg-2 col-sm-2 control-label">Ritase (rit)</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="rit_pegawai" placeholder="Ritase (rit)" name="rit_pegawai" min="0" required>
                        </div>

                        <label for="spbu_pegawai" class="col-lg-2 col-sm-2 control-label">Jumlah SPBU</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" id="spbu_pegawai" name="spbu_pegawai" placeholder="Jumlah SPBU" min="0" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" name="submit_pegawai" value="Simpan">
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