<script type="text/javascript">
    $( document ).ready(function() {
        $("#filePreview").hide();
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {    
                $("#filePreview").hide();
                $("#filePreview").slideDown("slow");
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
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="GET" action="<?php echo base_url() ?>mt/cek_presensi/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" required="required" id="tglForm" class="form-control"  placeholder="Tanggal">
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
                                    <th>Jadwal</th>
                                    <th>Kehadiran</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 1;
                                    foreach ($presensi as $row) {
                                        $hadir = "Tidak Hadir";
                                        foreach ($kinerja as $row2) {
                                            if ($row->ID_MOBIL == $row2->ID_MOBIL) {
                                                $hadir = "Hadir";
                                                break;
                                            }
                                        }
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->NOPOL; ?></td>
                                            <td><?php echo $row->KAPASITAS; ?></td>
                                            <td><?php echo $row->TRANSPORTIR; ?></td>
                                            <td><?php echo $row->PRODUK; ?></td>
                                            <td><?php
                                                if ($row->STATUS_MASUK == "Hadir") {
                                                    
                                                } else {
                                                    echo "<span class='label label-danger'>";
                                                }echo $row->STATUS_MASUK;
                                                ?></td>
                                            <td><?php echo $hadir; ?></td>
                                            <td><?php echo $row->ALASAN; ?></td>
                                            <td><a data-placement="top" data-toggle="modal" href="#ModalPresensi" class="btn btn-warning btn-xs tooltips" data-original-title="Edit" onclick="editPresensi('<?php echo $row->TANGGAL_LOG_HARIAN ?>', '<?php echo $hadir ?>', '<?php echo $row->ALASAN ?>', '<?php echo $row->ID_JADWAL ?>', '<?php echo $row->NIP ?>')"><i class="icon-pencil"></i></a></td>
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

<?php } ?>

    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalPresensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Peringatan</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">

                                <div class="form-group ">                                            
                                    <label for="ctglberlaku" class="control-label col-lg-4">Tanggal</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="ctglberlaku" name="tglbelaku" size="16" type="date" value="" required/>
                                        <span class="help-block">Pilih Tanggal</span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cjenis" class="control-label col-lg-4">Status Masuk</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="cjenis" name="jenis">
                                            <option>Hilang</option>
                                            <option>Kecelakaan</option>
                                            <option>Pemeliharaan</option>
                                            <option>Rusak</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cKeterangan" class="control-label col-lg-4">Keterangan</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="cKeterangan" name="Keterangan" minlength="2" type="text" required />
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
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
    
   
		  
</script>