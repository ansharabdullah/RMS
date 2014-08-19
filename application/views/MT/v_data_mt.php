<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Data MT   
            </header>
            <div class="panel-body">
                <a href="<?php echo base_url() ?>mt/tambah_mt" rel="stylesheet" class="btn btn-primary">
                    Tambah MT <i class="icon-plus"></i>
                </a>

                <a href="<?php echo base_url() ?>mt/import_csv" rel="stylesheet" class="btn btn-success"> Import Excel <i class="icon-plus"></i></a>

                <div class="adv-table editable-table " >
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th >No.</th> 
                                <th>Nopol</th>
                                <th>Transpotir</th>
                                <th>Kapasitas</th>
                                <th>Produk</th>
                                <th>No Mesin</th>
                                <th>No Rangka</th>
                                <th>Jenis Tangki</th>
                                <th>Status</th>
                                <th>GPS</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <?php $i = 1;
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="<?php echo base_url() ?>mt/detail_mt/<?php echo $row->ID_MOBIL; ?>" style ="text-decoration: underline"><?php echo $row->NOPOL; ?></a></td>

                                    <td><?php echo $row->TRANSPORTIR; ?></td>
                                    <td><?php echo $row->KAPASITAS; ?></td>
                                    <td><?php echo $row->PRODUK; ?></td>
                                    <td><?php echo $row->NO_MESIN; ?></td>
                                    <td><?php echo $row->NO_RANGKA; ?></td>
                                    <td><?php echo $row->JENIS_TANGKI; ?></td>
                                    <td><?php echo $row->STATUS_MOBIL; ?></td>
                                    <td><?php echo $row->GPS; ?></td>


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



<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

