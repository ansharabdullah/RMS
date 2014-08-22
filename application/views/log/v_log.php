<script type="text/javascript">
    $(document).ready(function() {
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

        <!-- page start-->
        <div class="row">
            <section class="panel">
                <header class="panel-heading">
                    Tabel Log
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
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
                                        <td><?php echo $row->TANGGAL_LOG ?></td>
                                        <td><?php echo $row->NAMA_PEGAWAI ?></td>
                                        <td><?php echo $row->JABATAN ?></td>
                                        <td><?php echo $row->KETERANGAN ?></td>
                                        <td><span class="label label-success"><?php echo $row->KEYWORD ?></span></td>
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
    </section>
</section>
<!--main content end-->



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