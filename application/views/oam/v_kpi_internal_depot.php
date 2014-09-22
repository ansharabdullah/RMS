<script type="text/javascript">
    var kpi = new Array();

    $(document).ready(function() {

        //masukin array kpi ke javascript
        var data;
<?php foreach ($data_kpi as $a) { ?>
            data = new Array();
            data['id'] = "<?php echo $a->ID_KPI_INTERNAL ?>";

            data['jenis'] = "<?php echo $a->JENIS_KPI_INTERNAL ?>";

            data['bobot'] = "<?php echo $a->BOBOT ?>";

            data['thn_base'] = "<?php echo $a->TAHUN_BASE ?>";
            data['thn_stretch'] = "<?php echo $a->TAHUN_STRETCH ?>";

            data['tw1_base'] = "<?php echo $a->TW1_BASE ?>";
            data['tw1_stretch'] = "<?php echo $a->TW1_STRETCH ?>";

            data['tw2_base'] = "<?php echo $a->TW2_BASE ?>";
            data['tw2_stretch'] = "<?php echo $a->TW2_STRETCH ?>";

            data['tw3_base'] = "<?php echo $a->TW3_BASE ?>";
            data['tw3_stretch'] = "<?php echo $a->TW3_STRETCH ?>";

            data['tw4_base'] = "<?php echo $a->TW4_BASE ?>";
            data['tw4_stretch'] = "<?php echo $a->TW4_STRETCH ?>";

            kpi.push(data);
<?php } ?>


    });


    function setDetailKPI(id) {
        var index = 0;
        for (var i = 0; i < kpi.length; i++) {
            if (id == kpi[i]['id']) {
                index = i;
            }
        }

        $("#id_kpi_internal").val(kpi[index]['id']);
        $("#bobot_kpi").val(kpi[index]['bobot']);

        $("#tahun_base").val(kpi[index]['thn_base']);
        $("#tahun_stretch").val(kpi[index]['thn_stretch']);

        $("#tw1_base").val(kpi[index]['tw1_base']);
        $("#tw1_stretch").val(kpi[index]['tw1_stretch']);

        $("#tw2_base").val(kpi[index]['tw2_base']);
        $("#tw2_stretch").val(kpi[index]['tw2_stretch']);

        $("#tw3_base").val(kpi[index]['tw3_base']);
        $("#tw3_stretch").val(kpi[index]['tw3_stretch']);

        $("#tw4_base").val(kpi[index]['tw4_base']);
        $("#tw4_stretch").val(kpi[index]['tw4_stretch']);

        $("#jenis_data").html(kpi[index]['jenis']);
    }

</script>



<section id="main-content">
    <section class="wrapper">     

        <section class="panel" >
            <header class="panel-heading">
                KPI Internal Depot <?php echo $nama_depot?>
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url(); ?>depot/kpi_internal/<?php echo $depot?>">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" name="tahun" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="cek" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>

       

        <?php if ($error_kpi < 365) { ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Error!</strong> KPI Internal tahun <strong><?php echo $tahun_kpi; ?></strong> tidak ditemukan.
            </div>
        <?php } else { ?>
            <section class="panel">
                <header class="panel-heading">
                    KPI Internal Tahun <strong><?php echo $tahun_kpi; ?></strong>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table " style="overflow-x: scroll">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th rowspan="3">KELOMPOK KPI</th>
                                    <th rowspan="3" colspan="2">INDIKATOR KINERJA UTAMA</th>
                                    <th rowspan="3">ASPEK</th>
                                    <th rowspan="3">Satuan</th>
                                    <th rowspan="3">Frekuensi Monitoring</th>
                                    <th rowspan="3">Bobot</th>
                                    <th colspan="10">TARGET</th>
                                </tr>
                                <tr>
                                    <td colspan="2">KPI <?php echo $tahun_kpi; ?></td>
                                    <td colspan="2">TW I</td>
                                    <td colspan="2">TW II</td>
                                    <td colspan="2">TW III</td>
                                    <td colspan="2">TW IV</td>
                                </tr>
                                <tr>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="49">Individual Performance Contract</td>
                                    <td colspan="17"><strong>Financial</strong></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">1</td>
                                    <td><strong>Revenue</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Terminal Storage Management</td>
                                    <td>Min</td>
                                    <td>USD</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[0]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[0]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                 
                                </tr> 
                                <tr>
                                    <td rowspan="4">2</td>
                                    <td><strong>Laba Usaha</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Laba usaha Own fleet management</td>
                                    <td>Min</td>
                                    <td>USD</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[1]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[1]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                  
                                </tr>
                                <tr>
                                    <td>b. Laba usaha Fuel Retail Fleet Management (APMS/SPBB)</td>
                                    <td>Min</td>
                                    <td>USD</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[2]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[2]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>c. Laba Usaha  Terminal Storage</td>
                                    <td>Min</td>
                                    <td>USD</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[3]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[3]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                  
                                </tr>
                                <tr>
                                    <td rowspan="4">3</td>
                                    <td><strong>Cost Effectiveness</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Cost / Liter Fleet Management Fleet Management (SPBU/SPDN)</td>
                                    <td>Max</td>
                                    <td>USD/KL</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[4]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[4]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>b. Cost / MT Gas & Aviation  Fleet Management (SPBE)</td>
                                    <td>Max</td>
                                    <td>USD/MT</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[5]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[5]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>c. Cost effectiveness Terminal Storage </td>
                                    <td>Max</td>
                                    <td>USD/KL</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[6]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[6]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><strong>Collection Period</strong></td>
                                    <td>Max</td>
                                    <td>by date</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[7]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[7]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="17"><strong>II. Operational Excellence</strong></td>
                                </tr>
                                <tr>
                                    <td rowspan="4">5</td>
                                    <td><strong>Terminal Losses</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Total Loss</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[8]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[8]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>b. Discharge Loss</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[9]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[9]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                  
                                </tr>
                                <tr>
                                    <td>c. Working Loss</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[10]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[10]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td rowspan="6">6</td>
                                    <td><strong>Volume Thruput BBM</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Fleet Management</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Fuel Retail (APMS/SPBB)</td>
                                    <td>Min</td>
                                    <td>KL</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[11]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[11]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>- Fuel Retail (SPBU/SPDN)</td>
                                    <td>Min</td>
                                    <td>KL</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[12]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[12]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>- Gas & Aviation (SPBE)</td>
                                    <td>Min</td>
                                    <td>MT</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[13]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[13]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>b. Terminal Storage (BBM/Depot)</td>
                                    <td>Min</td>
                                    <td>KL</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[14]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[14]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td rowspan="10">7</td>
                                    <td><strong>Operasional Target</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Rata -Rata Pencapaian  ritase mobil tangki</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Fuel Retail (SPBU/SPDN)</td>
                                    <td>Min</td>
                                    <td>Rit</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[15]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[15]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>- Gas & Aviation (SPBE)</td>
                                    <td>Min</td>
                                    <td>Rit</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[16]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[16]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>b. Rata - Rata pencapaian kilometer mobil tangki</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Fuel Retail (SPBU/SPDN)</td>
                                    <td>Min</td>
                                    <td>KM</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[17]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[17]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>- Gas & Aviation (SPBE)</td>
                                    <td>Min</td>
                                    <td>KM</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[18]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[18]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>c. Pemenuhan Jadwal kerja  awak mobil tangki (AMT)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Fuel Retail (SPBU/SPDN)</td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[19]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[19]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>

                                <tr>
                                    <td>- Gas & Aviation (SPBE)</td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[20]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[20]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td rowspan="4">8</td>
                                    <td><strong>Service Level Agreement</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Fuel Retail Fleet Management (BBM/BBK)</td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[21]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[21]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>b. Gas & Aviation Fleet Management (SPBE)</td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[22]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[22]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>c. Fuel Retail Fleet Management (APMS)</td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[23]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[23]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td rowspan="7">9</td>
                                    <td><strong>Kegagalan Operasi (Availability & Reliability)</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Breakdown Occurences</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- APMS/SPBB</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[24]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[24]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>- Mobil tangki milik</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[25]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[25]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                 
                                </tr>

                                <tr>
                                    <td>- Mobil tangki kelola</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[26]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[26]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>

                                <tr>
                                    <td>b. Terminal Storage (BBM/Depot)</td>
                                    <td>Max</td>
                                    <td>Kasus</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[27]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[27]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>

                                <tr>
                                    <td>c. Fuel Retail Fleet Management (APMS)</td>
                                    <td>Max</td>
                                    <td>Kasus</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[28]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[28]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td colspan="17"><strong>III. Operational Other</strong></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">10</td>
                                    <td><strong>Accident</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>a. Angka Penurunan Insiden</td>
                                    <td>Max</td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[29]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[29]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td colspan="17"><strong>IV. Business Development / Customer Satisfaction</strong></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td><strong>Progress Pelaksaan Pekerjaan (BD/Non BD)</strong></td>
                                    <td></td>
                                    <td>%</td>
                                    <td>Triwulan</td>
                                    <td><?php echo $data_kpi[30]->BOBOT; ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[30]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td rowspan="4">Boundary KPIs</td>
                                    <td>1</td>
                                    <td>TRIR Patra Niaga</td>
                                    <td></td>
                                    <td>Ratio</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[31]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[31]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>NOA Patra Niaga</td>
                                    <td></td>
                                    <td># cases</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[32]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[32]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>GCG compliance</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[33]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[33]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>External Audit Opinion</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[34]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[34]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td rowspan="7">Other Operational Metrics</td>
                                    <td>1</td>
                                    <td>Proper PPN</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[35]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[35]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                  
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Learning index</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[36]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[36]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Follow up audit findings</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[37]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[37]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                   
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Akurasi dan kelengkapan Laporan Keuangan</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[38]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[38]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                 
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Utilisasi ERP (MySAP)</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[39]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[39]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                 
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>Knowledge & Innovation Program</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[40]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[40]->TW4_STRETCH, 0, ',', '.'); ?></td>
                            
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Penyelesaian OFI to AFI PQA</td>
                                    <td></td>
                                    <td>%</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo number_format($data_kpi[41]->TAHUN_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TAHUN_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW1_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW1_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW2_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW2_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW3_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW3_STRETCH, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW4_BASE, 0, ',', '.'); ?></td>
                                    <td><?php echo number_format($data_kpi[41]->TW4_STRETCH, 0, ',', '.'); ?></td>
                                  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php } ?>



    </section>
</section>
<!--main content end-->


<?php if ($error_kpi >= 365) { ?>

    <!-- modal edit ms2-->
    <div class="modal fade" id="ModalEditKPI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>laporan/kpi_internal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Ubah KPI Internal Depot</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

                                    <div class="form-group "> 
                                        <input class=" form-control input-sm m-bot15" id="id_kpi_internal" name="id_kpi_internal" mi="0" type="hidden" value="" required readonly/>

                                        <p><span id="jenis_data"></span></p>

                                        <div class="col-lg-6">
                                            Tahun <input class=" form-control input-sm m-bot15" name="tahun" min="0" type="number" value="<?php echo $tahun_kpi; ?>" placeholder="Tahun" required readonly/>
                                        </div>
                                        <div class="col-lg-6">
                                            Bobot <input class=" form-control input-sm m-bot15" id="bobot_kpi" name="bobot_kpi" mi="0" type="number" value="" placeholder="Bobot" required/>
                                        </div>
                                    </div>

                                    <div class="form-group "> 
                                        <p>Total Tahun</p>

                                        <div class="col-lg-6">
                                            Base <input class=" form-control input-sm m-bot15" id="tahun_base" name="tahun_base" min="0" type="number" value="" placeholder="Base" required/>
                                        </div>
                                        <div class="col-lg-6">
                                            Stretch <input class=" form-control input-sm m-bot15" id="tahun_stretch" name="tahun_stretch" min="0" type="number" value="" placeholder="Stretch" required/>
                                        </div>
                                    </div>

                                    <div class="form-group "> 
                                        <p>Triwulan I</p>

                                        <div class="col-lg-6">
                                            Base <input class=" form-control input-sm m-bot15" id="tw1_base" name="tw1_base" min="0" type="number" value="" placeholder="Base" required/>
                                        </div>
                                        <div class="col-lg-6">
                                            Stretch <input class=" form-control input-sm m-bot15" id="tw1_stretch" name="tw1_stretch" min="0" type="number" value="" placeholder="Stretch" required/>
                                        </div>
                                    </div>

                                    <div class="form-group "> 
                                        <p>Triwulan II</p>

                                        <div class="col-lg-6">
                                            Base <input class=" form-control input-sm m-bot15" id="tw2_base" name="tw2_base" min="0" type="number" value="" placeholder="Base" required/>
                                        </div>
                                        <div class="col-lg-6">
                                            Stretch <input class=" form-control input-sm m-bot15" id="tw2_stretch" name="tw2_stretch" min="0" type="number" value="" placeholder="Stretch" required/>
                                        </div>
                                    </div>

                                    <div class="form-group "> 
                                        <p>Triwulan III</p>

                                        <div class="col-lg-6">
                                            Base <input class=" form-control input-sm m-bot15" id="tw3_base" name="tw3_base" min="0" type="number" value="" placeholder="Base" required/>
                                        </div>
                                        <div class="col-lg-6">
                                            Stretch <input class=" form-control input-sm m-bot15" id="tw3_stretch" name="tw3_stretch" min="0" type="number" value="" placeholder="Stretch" required/>
                                        </div>
                                    </div>

                                    <div class="form-group "> 
                                        <p>Triwulan IV</p>

                                        <div class="col-lg-6">
                                            Base <input class=" form-control input-sm m-bot15" id="tw4_base" name="tw4_base" min="0" type="number" value="" placeholder="Base" required/>
                                        </div>
                                        <div class="col-lg-6">
                                            Stretch <input class=" form-control input-sm m-bot15" id="tw4_stretch" name="tw4_stretch" min="0" type="number" value="" placeholder="Stretch" required/>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                        <input class="btn btn-success" type="submit" name="edit" value="Simpan"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>