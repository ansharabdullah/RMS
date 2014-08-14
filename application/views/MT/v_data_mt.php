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
            </div>

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

                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>1</td>
                        <td><a href="<?php echo base_url() ?>mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left"> D9808AD</a></td>
                        <td>PT Masoem</td>
                        <td>16</td>
                        <td class="center">Pertamax</td>
                        <td>KHT124147KL</td>
                        <td>LKI0342349HG</td>
                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>2</td>
                        <td><a href="<?php echo base_url() ?>mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9870AD</a></td>
                        <td>PT Masoem</td>
                        <td>8</td>
                        <td class="center">Premium</td>
                        <td>UIB12417AOB</td>
                        <td>LKI0342349HG</td>
                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>3</td>
                        <td><a href="<?php echo base_url() ?>mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9880AF</a></td>
                        <td>PT Masoem</td>
                        <td>8</td>
                        <td class="center">Solar</td>
                        <td>LWQ8213124YT</td>
                        <td>MIT9831247GTR</td>

                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>4</td>
                        <td><a href="<?php echo base_url() ?>mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9800AD</td>
                        <td>PT Incot</td>
                        <td>8</td>
                        <td class="center">Premium</td>
                        <td>GTR21247PO</td>
                        <td>NBC0342349ERT</td>

                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>5</td>
                        <td><a href="<?php echo base_url() ?>mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9000AU</td>
                        <td>PT Patra</td>
                        <td>8</td>
                        <td class="center">Premium</td>
                        <td>OAT124147KL</td>
                        <td>QW0342349HG</td>

                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>6</td>
                        <td><a href="<?php echo base_url() ?>mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9800AF</td>
                        <td>PT Patra</td>
                        <td>8</td>
                        <td class="center">Bio Solar</td>
                        <td>KHT12SDALO </td>
                        <td>PUI0349124JG</td>

                    </tr>


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

