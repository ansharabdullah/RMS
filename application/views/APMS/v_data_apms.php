
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
		<?php if ($pesan==1) {  ?>
            <div class="alert alert-block alert-success fade in">
                <strong>Berhasil! </strong><?php echo $pesan_text;?> 
            </div>
        <?php } ?>
        
        <?php if ($pesan==2) { ?>
            <div class="alert alert-block alert-danger fade in">
                <strong>Error!</strong> 
            </div>
        <?php } ?>
		<div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li class="active">Data APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <section class="panel">
            <header class="panel-heading">
                Data APMS
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-x: scroll">
                    <div class="clearfix">


                        <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahManual">
                            Tambah APMS <i class="icon-plus"></i>
                        </a>

                        <!-- filter tidak ada di APMS
						<div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                <li><a href="javascript:FilterData('aktif.');">Aktif</a></li>
                                <li><a href="javascript:FilterData('peringatan');">Dalam Peringatan</a></li>
                                <li><a href="javascript:FilterData('tidak aktif');">Tidak Aktif</a></li>
                            </ul>
                        </div>
						-->
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No</th>
                                <th>NO. APMS</th>
                                <th>Nama Pengusaha</th>
                                <th>Alamat</th>
                                <th>Nama Transportir</th>
                                <th>Tarif Patra Niaga</th>
                            </tr>
                        </thead>
                        <tbody>
							<tr class="">
                                <?php $i = 1;
                                foreach ($apms as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
									<td><a href="<?php echo base_url()?>apms/detail_apms/<?php echo $row->ID_APMS; ?>" style ="text-decoration: underline"><?php echo $row->NO_APMS; ?></a></td>
                                    <td><?php echo $row->NAMA_PENGUSAHA; ?></td>
                                    <td><?php echo $row->ALAMAT; ?></td>
                                    <td><?php echo $row->NAMA_TRANSPORTIR; ?></td>
                                    <td><?php echo $row->TARIF_PATRA_NIAGA; ?></td>
                                 
                                </tr>
                                <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!-- buat insert apms
-->
<div class="modal fade" id="ModalTambahManual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah APMS</h4>
            </div>
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>apms/data_apms/">

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">

                                    <div class="panel-body">


                                        <div class="form-group ">
                                            <label for="no_apms" class="control-label col-lg-2">NO. APMS</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="no_apms" name="no_apms" minlength="2" type="text" required />
                                            </div>

                                            <label for="nama_pengusaha" class="control-label col-lg-2">Nama Pengusaha</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="nama_pengusaha" name="nama_pengusaha" minlength="2" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="alamat" class="control-label col-lg-2">Alamat (Kabupaten)</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="alamat" name="alamat" minlength="2" type="text" required />
                                            </div>
											
                                            <label for="tarif" class="control-label col-lg-2">Tarif Patra Niaga</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="tarif" name="tarif" type="number" value="100" required />
                                            </div>
                                        </div>
										<div class="form-group ">
                                            <label for="supply_point" class="control-label col-lg-2">Supply Point</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="supply_point" name="supply_point" minlength="2" type="text" required />
                                            </div>
                                            <label for="nama_transportir" class="control-label col-lg-2">Nama Transportir</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="nama_transportir" name="nama_transportir" minlength="2" type="text" required />
                                            </div>
                                        </div>
										<div class="form-group ">
                                            <label for="ship_to" class="control-label col-lg-2">Ship-To</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control input-sm m-bot15" id="ship_to" name="ship_to" minlength="2" type="text" required />
                                            </div>
                                        </div>
										<div class="form-group ">
                                            <label for="no_perjanjian" class="control-label col-lg-2">No. Perjanjian</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control input-sm m-bot15" id="no_perjanjian" name="no_perjanjian" minlength="2" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="reset" data-dismiss="modal" class="btn btn-default" value="Batal">
                        <input class="btn btn-success" type="submit" name="simpan" value="Simpan"/>
                    </div>
                </form>
            </div>
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

