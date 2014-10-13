<script type="text/javascript">
    $(document).ready(function() {
        $("#filePreview").hide();
        $("#commentForm").submit(function(e) {
            var isvalidate = $("#commentForm").valid();
            if (isvalidate)
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
                    <li><a href="<?php echo base_url(); ?>amt/"> AMT</a></li>
                    <li class="active">Presensi</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <?php if ($feedback) { ?>
            <?php if ($feedback == 1) { ?>
                <div class="alert alert-block alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Berhasil!</strong> <?php echo $pesan ?>
                </div>
            <?php }else if ($feedback == 2) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> <?php echo $pesan ?>
                </div>
            <?php } ?>
        <?php } ?>
        <section class="panel">
            <header class="panel-heading">
                Presensi Awak Mobil Tangki
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>amt/presensi_pertanggal/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" required="required" id="tglForm" class="form-control"  placeholder="Tanggal" name="tanggal">
                            <span class="help-block">Pilih tanggal</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-warning">Cek</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if ($presensi) { ?>
            <div id="filePreview">
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Presensi (<b><?php echo date('d-M-Y',  strtotime($tanggal)) ?></b>)
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <div class="clearfix">

                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:FilterData('');">Semua</a></li>
                                        <li><a href="javascript:FilterData('hadir');">Hadir</a></li>
                                        <li><a href="javascript:FilterData('absen');">Absen</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Klasifikasi</th>
                                        <th>Jadwal</th>
                                        <th>Kehadiran</th>
                                        <th>Alasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($presensi as $row) {
                                        $hadir = "Absen";
                                        $text = "<span class='label label-danger'>Absen</span>";
                                        foreach ($kinerja as $row2) {
                                            if ($row->ID_PEGAWAI == $row2->ID_PEGAWAI) {
                                                $text = "<span class='label label-success'>Hadir</span>";
                                                $hadir = "Hadir";
                                                break;
                                            }
                                        }
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->NIP; ?></td>
                                            <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                            <td><?php echo $row->JABATAN; ?></td>
                                            <td><?php echo $row->KLASIFIKASI; ?></td>
                                            <td><?php
                                                if ($row->STATUS_MASUK == "Hadir") {
                                                    echo "<span class='label label-success'>";
                                                } else {
                                                    echo "<span class='label label-danger'>";
                                                }echo $row->STATUS_MASUK;
                                                ?></td>
                                            <td><?php echo $text; ?></td>
                                            <td><?php echo $row->ALASAN_MT ?></td>
                                            <td>
                                                <?php if ($row->STATUS_MASUK != $hadir) { ?>
                                                    <?php if ($this->session->userdata('id_role') != 5) { ?>
                                                    <a data-placement="top" data-toggle="modal" href="#ModalPresensi" class="btn btn-warning btn-xs tooltips" data-original-title="Edit" onclick="editPresensi('<?php echo $row->TANGGAL_LOG_HARIAN ?>', '<?php echo $hadir ?>', '<?php echo $row->ALASAN_MT ?>', '<?php echo $row->ID_JADWAL ?>', '<?php echo $row->NIP ?>')"><i class="icon-pencil"></i></a>
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <span class='label label-success'>Ok</span>
                                                <?php }?>
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
                </section>
            </div>
        <?php }else{
            $a = date('d-M-Y', strtotime($tanggal));
            ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Error!</strong> <?php echo "Presensi tanggal <b>$a</b> tidak ditemukan. Jadwal belum diinputkan."; ?>
            </div>
        <?php } ?>







    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalPresensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Presensi Crew Awak Mobil Tangki</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url() ?>amt/presensi/<?php echo $tanggal?>">
                <input type="hidden" name="id_jadwal" id="id_jadwal"/>
                <input type="hidden" name="tanggal_log_harian" id="tanggal_log_harian"/>
                <input type="hidden" name="nip" id="nip"/>
                <input type="hidden" name="keterangan_masuk" id="keterangan_masuk1"/>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form-group ">                                            
                                    <label for="ctglberlaku" class="control-label col-lg-4">Tanggal</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="tanggal" name="tanggal" size="16" type="date" value="" required readonly/>
                                        <span class="help-block">Pilih tanggal</span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cjenis" class="control-label col-lg-4">Keterangan</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="keterangan_masuk" name="keterangan_masuk" disabled="true">
                                            <option value="Hadir">Hadir</option>
                                            <option value="Absen">Absen</option>
                                            <option value="Libur">Libur</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Ijin">Ijin</option>
                                            <option value="Alfa">Alfa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="alasan" class="control-label col-lg-4">Alasan</label>
                                    <div class="col-lg-8">
                                        <textarea class=" form-control input-sm m-bot15" id="alasan" name="alasan" minlength="2" type="text" required ></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <input class="btn btn-success" type="submit" name="edit_presensi" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>



<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
                                                   jQuery(document).ready(function() {
                                                       EditableTable.init();
                                                   });

                                                   function FilterData(par) {
                                                       jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
                                                       jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
                                                   }

                                                   function editPresensi(tanggal, keterangan, alasan, id_jadwal, nip) {
                                                       $("#tanggal_log_harian").val(tanggal);
                                                       $("#nip").val(nip);
                                                       $("#tanggal").val(tanggal);
                                                       $("#keterangan_masuk1").val(keterangan);
                                                       $("#keterangan_masuk").val(keterangan);
                                                       $("#alasan").val(alasan);
                                                       $("#id_jadwal").val(id_jadwal);
                                                   }



</script>