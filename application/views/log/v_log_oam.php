<script type="text/javascript">
    $(document).ready(function () {
        $("#EditProfile").hide();
        $("#EditPass").hide();
    });

    function ShowProfile() {
        $("#ShowProfile").fadeIn("slow");
        $("#EditProfile").hide();
        $("#EditPass").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
        $("#btnEditPass").removeClass("active");
    }

</script>

<section id="main-content">
    <section class="wrapper">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
            <li class="active"> Log Sistem</li>
        </ul>
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Tabel Log Sistem Bulan <b><?php echo date('M-Y', strtotime($bulan)) ?></b>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table "  style="overflow-x: scroll">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url() ?>log/pilih_bulan/">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <input type="month" name="bulan" data-mask="9999" placeholder="bulan" required="required" id="tahunLaporan"  class="form-control"/>
                            </div>
                            <div class=" col-lg-2">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>

                        </div>
                    </form>
                    <div class="clearfix">
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                <li><a href="javascript:FilterData('edit');">Edit</a></li>
                                <li><a href="javascript:FilterData('tambah');">Tambah</a></li>
                                <li><a href="javascript:FilterData('hapus');">Hapus</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Depot</th>
                                <th>User</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                                <th>Kata Kunci</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($log as $row) {
                                ?>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('d-M-Y h:i:s', strtotime($row->TANGGAL_LOG)) ?></td>
                                    <td><?php echo $row->NAMA_DEPOT ?></td>
                                    <td><?php echo $row->NAMA_PEGAWAI ?></td>
                                    <td><?php echo $row->JABATAN ?></td>
                                    <td><?php echo $row->KETERANGAN ?></td>
                                    <td>
                                        <?php if (strtoupper($row->KEYWORD) == "TAMBAH") { ?>
                                            <span class="label label-success"><?php echo strtoupper($row->KEYWORD) ?></span></td>
                                    <?php } else if (strtoupper($row->KEYWORD) == "EDIT") { ?>
                                <span class="label label-warning"><?php echo strtoupper($row->KEYWORD) ?></span></td>
                            <?php } else if (strtoupper($row->KEYWORD) == "HAPUS") { ?>
                                <span class="label label-danger"><?php echo strtoupper($row->KEYWORD) ?></span></td>
                            <?php } ?>
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
    </section>
</section>
<!--main content end-->



<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function () {
        EditableTable.init();
    });

    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }



</script>