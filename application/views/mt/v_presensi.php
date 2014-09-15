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
        <section class="panel">
            <header class="panel-heading">
                Presensi Mobil Tangki
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="GET" action="<?php echo base_url() ?>mt/cek_presensi/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" required="required" id="tglForm" class="form-control"  placeholder="Tanggal" name="tanggal">
                            <span class="help-block">Pilih tanggal</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" id="cek" style="float: right;" class="btn btn-warning">Cek</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        
  <?php if ($kinerja) { ?>      
        <div id="filePreview">
            <section class="panel">
                <header class="panel-heading">
                    Tabel Presensi (<?php echo $tanggal ?>)
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
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
                                    <th>Nopol</th>
                                    <th>Kapasitas</th>
                                    <th>Transportir</th>
                                    <th>Produk</th>
                                    <th>Kehadiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 1;
                                    foreach ($mobil as $row) {
                                        $hadir = "Absen";
                                        foreach ($kinerja as $row2) {
                                            if ($row->ID_MOBIL == $row2->ID_MOBIL) {
                                                $hadir = "Hadir";
                                                
                                            }
                                        }
                                        ?>
                                            <td style="display:none;"></td>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->NOPOL; ?></td>
                                            <td><?php echo $row->KAPASITAS; ?></td>
                                            <td><?php echo $row->TRANSPORTIR; ?></td>
                                            <td><?php echo $row->PRODUK; ?></td>
                                            
                                            <td><?php
                                             if ($hadir == "Hadir") {
                                                    echo "<span class='label label-success'>";
                                                } else {
                                                    echo "<span class='label label-danger'>";
                                                }echo $hadir; ?></td>
                                           
                                            <td><a data-placement="top" data-toggle="modal" href="#ModalPresensi" class="btn btn-warning btn-xs tooltips" data-original-title="Edit" onclick="editPresensi('<?php echo $hadir ?>', '<?php echo $row->NOPOL ?>')"><i class="icon-pencil"></i></a></td>
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
   <?php
        } else {
            if ($tanggal) {
                ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Absen Mobil Tangki tidak ditemukan.
                </div>
    <?php }
} ?>
        
    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalPresensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Presensi Mobil Tangki</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url() ?>mt/ubah_presensi/">
                <input type="hidden" name="id_jadwal" id="id_jadwal"/>
                <input type="hidden" name="tanggal_log_harian" id="tanggal_log_harian"/>
                <input type="hidden" name="nopol" id="nopol"/>
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
                                    <label for="cjenis" class="control-label col-lg-4">Kehadiran</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="keterangan_masuk" name="keterangan_masuk">
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
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" value="Simpan"/>
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
                                            $("#nopol").val(nopol);
                                            $("#tanggal").val(tanggal);
                                            $("#keterangan_masuk1").val(keterangan);
                                            $("#keterangan_masuk").val(keterangan);
                                            $("#alasan").val(alasan);
                                            $("#id_jadwal").val(id_jadwal);
                                        }
		  
</script>