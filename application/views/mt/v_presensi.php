<?php
function DateToIndo($date) { 
        $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        $tgl   = substr($date, 8, 2); 
        
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
}

?>

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
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                   <li class="active">Presensi Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
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
        
  <?php if ($presensi) { ?>      
        <div id="filePreview">
            <section class="panel">
                <header class="panel-heading">
                    Tabel Presensi <?php echo DateToIndo($tanggal)?>
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
                        <div class="adv-table editable-table " style="overflow-x: scroll; overflow-y:hidden">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample" >
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>No</th>
                                    <th>Nopol</th>
                                    <th>Kapasitas</th>
                                    <th>Transportir</th>
                                    <th>Produk</th>
                                    <th>Kehadiran</th>
                                    <th>Alasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 1;
                                    $jml_absen = 0;
                                    foreach ($presensi as $row) {
                                        $hadir = "Absen";
                                        $text = "<span class='label label-danger'>Absen</span>";
                                        
                                            foreach ($kinerja as $row2) {
                                                if ($row->ID_MOBIL == $row2->ID_MOBIL) {
                                                    $text = "<span class='label label-success'>Hadir</span>";
                                                    $hadir = "Hadir";
                                                    break;
                                                }
                                            }
                                        ?>
                                            <td style="display:none;"></td>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->NOPOL; ?></td>
                                            <td><?php echo $row->KAPASITAS; ?></td>
                                            <td><?php echo $row->TRANSPORTIR; ?></td>
                                            <td><?php echo $row->PRODUK; ?></td>
                                           <td><?php echo $text; ?></td>
                                            <td><?php echo $row->ALASAN_MT ?></td>
                                           <td><?php if ($hadir != "Hadir") { ?>
                                                    <a data-placement="top" data-toggle="modal" href="#ModalPresensi" class="btn btn-warning btn-xs tooltips" data-original-title="Edit" onclick="editPresensi('<?php echo $row->TANGGAL_LOG_HARIAN ?>',  '<?php echo $row->ID_JADWAL ?>', '<?php echo $row->NOPOL ?>','<?php echo $row->ALASAN_MT ?>')"><i class="icon-pencil"></i></a>
                                                <?php 
                                                    if(trim($row->ALASAN_MT) == "")
                                                    {
                                                        $jml_absen++;
                                                    }
                                                }else{ ?>
                                                    <span class='label label-success'>Ok</span>
                                                <?php }?> </td></tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>

                            </tbody>
                        </table>
                     </div>
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
                    <strong>Error!</strong> Absen Mobil Tangki <strong><?php echo DateToIndo($tanggal)?></strong> tidak ditemukan dan jadwal belum diinput.
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
            <form class="cmxform form-horizontal tasi-form" id="formPresensi" method="post" action="<?php echo base_url() ?>mt/ubah_presensi/">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form-group ">                                            
                                    <label for="ctglberlaku" class="control-label col-lg-4">Tanggal Presensi</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="tanggal" name="tanggal" size="16" type="date" value="" required readonly/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cjenis" class="control-label col-lg-4">NOPOL</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" type="text" name="nopol" id="nopol" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="alasan" class="control-label col-lg-4">Alasan</label>
                                    <div class="col-lg-8">
                                        <textarea class=" form-control input-sm m-bot15" required="required" id="alasan" name="alasan" minlength="2" type="text" required ></textarea>
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
    
   function editPresensi(tanggal, id_jadwal, nopol,alasan) {
        $("#nopol").val(nopol);
        $("#tanggal").val(tanggal);
        $("#alasan").val(alasan);
        $("#formPresensi").attr('action', '<?php echo base_url() ?>mt/ubah_presensi/<?php echo $jml_absen;?>/'+id_jadwal);
    }
		  
</script>