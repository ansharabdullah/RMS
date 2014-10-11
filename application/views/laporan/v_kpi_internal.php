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
            data['realisasi_tw1_bulan1'] = "<?php echo $a->REALISASI_TW1_BULAN1 ?>";
            data['realisasi_tw1_bulan2'] = "<?php echo $a->REALISASI_TW1_BULAN2 ?>";
            data['realisasi_tw1_bulan3'] = "<?php echo $a->REALISASI_TW1_BULAN3 ?>";
            data['tw2_base'] = "<?php echo $a->TW2_BASE ?>";
            data['tw2_stretch'] = "<?php echo $a->TW2_STRETCH ?>";
            data['realisasi_tw2_bulan1'] = "<?php echo $a->REALISASI_TW2_BULAN1 ?>";
            data['realisasi_tw2_bulan2'] = "<?php echo $a->REALISASI_TW2_BULAN2 ?>";
            data['realisasi_tw2_bulan3'] = "<?php echo $a->REALISASI_TW2_BULAN3 ?>";
            data['tw3_base'] = "<?php echo $a->TW3_BASE ?>";
            data['tw3_stretch'] = "<?php echo $a->TW3_STRETCH ?>";
            data['realisasi_tw3_bulan1'] = "<?php echo $a->REALISASI_TW3_BULAN1 ?>";
            data['realisasi_tw3_bulan2'] = "<?php echo $a->REALISASI_TW3_BULAN2 ?>";
            data['realisasi_tw3_bulan3'] = "<?php echo $a->REALISASI_TW3_BULAN3 ?>";
            data['tw4_base'] = "<?php echo $a->TW4_BASE ?>";
            data['tw4_stretch'] = "<?php echo $a->TW4_STRETCH ?>";
            data['realisasi_tw4_bulan1'] = "<?php echo $a->REALISASI_TW4_BULAN1 ?>";
            data['realisasi_tw4_bulan2'] = "<?php echo $a->REALISASI_TW4_BULAN2 ?>";
            data['realisasi_tw4_bulan3'] = "<?php echo $a->REALISASI_TW4_BULAN3 ?>";
            kpi.push(data);
<?php } ?>


    });


    function setDetailKPI(id,type) {
        if(type==0){
            //edit semua
            $("#kolom_realisasi").show();
            $("#kolom_bobot").show();
            $("#kolom_stretch").show();
            
            document.getElementById("edit_bobot").readOnly = false;
            document.getElementById("edit_base").readOnly = false;
            document.getElementById("edit_stretch").readOnly = false;
            document.getElementById("edit_bulan1").readOnly = false;
            document.getElementById("edit_bulan2").readOnly = false;
            document.getElementById("edit_bulan3").readOnly = false;
        }else if(type==1){
            //edit bobot, base dan stretch tapi realisasi tampil sebagai readonly
            $("#kolom_realisasi").show();
            $("#kolom_bobot").show();
            $("#kolom_stretch").show();
            
            document.getElementById("edit_bobot").readOnly = false;
            document.getElementById("edit_base").readOnly = false;
            document.getElementById("edit_stretch").readOnly = false;
            document.getElementById("edit_bulan1").readOnly = true;
            document.getElementById("edit_bulan2").readOnly = true;
            document.getElementById("edit_bulan3").readOnly = true;
        }else if(type==2){
            //edit base saja dan tampil base saja
            $("#kolom_realisasi").hide();
            $("#kolom_bobot").hide();
            $("#kolom_stretch").hide();
            
            document.getElementById("edit_bobot").readOnly = true;
            document.getElementById("edit_base").readOnly = false;
            document.getElementById("edit_stretch").readOnly = true;
            document.getElementById("edit_bulan1").readOnly = true;
            document.getElementById("edit_bulan2").readOnly = true;
            document.getElementById("edit_bulan3").readOnly = true;
        }else if(type==3){
            //edit base dan stretch
            $("#kolom_realisasi").hide();
            $("#kolom_bobot").hide();
            $("#kolom_stretch").show();
            
            document.getElementById("edit_bobot").readOnly = true;
            document.getElementById("edit_base").readOnly = false;
            document.getElementById("edit_stretch").readOnly = false;
            document.getElementById("edit_bulan1").readOnly = true;
            document.getElementById("edit_bulan2").readOnly = true;
            document.getElementById("edit_bulan3").readOnly = true;
        }else if(type==4){
            //edit bobot, base dan stretch tapi realisasi tidak tampil
            $("#kolom_realisasi").hide();
            $("#kolom_bobot").show();
            $("#kolom_stretch").show();
            
            document.getElementById("edit_bobot").readOnly = false;
            document.getElementById("edit_base").readOnly = false;
            document.getElementById("edit_stretch").readOnly = false;
            document.getElementById("edit_bulan1").readOnly = true;
            document.getElementById("edit_bulan2").readOnly = true;
            document.getElementById("edit_bulan3").readOnly = true;
        }
        
        var index = 0;
        for (var i = 0; i < kpi.length; i++) {
            if (id == kpi[i]['id']) {
                index = i;
            }
        }

        $("#id_kpi_internal").val(kpi[index]['id']);

<?php if ($jenis_kpi == 'Triwulan I') { ?>
            $("#edit_bobot").val(kpi[index]['bobot']);
            $("#edit_base").val(kpi[index]['tw1_base']);
            $("#edit_stretch").val(kpi[index]['tw1_stretch']);
            $("#edit_bulan1").val(kpi[index]['realisasi_tw1_bulan1']);
            $("#edit_bulan2").val(kpi[index]['realisasi_tw1_bulan2']);
            $("#edit_bulan3").val(kpi[index]['realisasi_tw1_bulan3']);
<?php } else if ($jenis_kpi == 'Triwulan II') { ?>
            $("#edit_bobot").val(kpi[index]['bobot']);
            $("#edit_base").val(kpi[index]['tw2_base']);
            $("#edit_stretch").val(kpi[index]['tw2_stretch']);
            $("#edit_bulan1").val(kpi[index]['realisasi_tw2_bulan1']);
            $("#edit_bulan2").val(kpi[index]['realisasi_tw2_bulan2']);
            $("#edit_bulan3").val(kpi[index]['realisasi_tw2_bulan3']);
<?php } else if ($jenis_kpi == 'Triwulan III') { ?>
            $("#edit_bobot").val(kpi[index]['bobot']);
            $("#edit_base").val(kpi[index]['tw3_base']);
            $("#edit_stretch").val(kpi[index]['tw3_stretch']);
            $("#edit_bulan1").val(kpi[index]['realisasi_tw3_bulan1']);
            $("#edit_bulan2").val(kpi[index]['realisasi_tw3_bulan2']);
            $("#edit_bulan3").val(kpi[index]['realisasi_tw3_bulan3']);
<?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
            $("#edit_bobot").val(kpi[index]['bobot']);
            $("#edit_base").val(kpi[index]['tw4_base']);
            $("#edit_stretch").val(kpi[index]['tw4_stretch']);
            $("#edit_bulan1").val(kpi[index]['realisasi_tw4_bulan1']);
            $("#edit_bulan2").val(kpi[index]['realisasi_tw4_bulan2']);
            $("#edit_bulan3").val(kpi[index]['realisasi_tw4_bulan3']);
<?php } else if ($jenis_kpi == 'Tahun') { ?>
            //untuk tahun
            $("#edit_bobot").val(kpi[index]['bobot']);
            $("#edit_base").val(kpi[index]['thn_base']);
            $("#edit_stretch").val(kpi[index]['thn_stretch']);
            $("#edit_bulan1").val(0);
            $("#edit_bulan2").val(0);
            $("#edit_bulan3").val(0);
<?php } ?>
        $("#jenis_data").html(kpi[index]['jenis']);
    }

</script>



<section id="main-content">
    <section class="wrapper">       
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/triwulan">Laporan Triwulan</a></li>
                    <li class="active">KPI Internal</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


        <section class="panel" >
            <header class="panel-heading">
                KPI Internal Depot
                <a style="float:right;" data-placement="left" href="<?php echo base_url(); ?>laporan/tambah_kpi_internal" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah KPI Internal"> Tambah Data <i class="icon-plus"></i></a>
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url(); ?>laporan/kpi_internal">
                    <div class="form-group">
                        <label for="tahun" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" name="tahun" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis" class="col-lg-2 col-sm-2 control-label">Jenis</label>
                        <div class="col-lg-10 col-sm-6">
                            <select name="jenis" class="form-control">
                                <option value="Triwulan I"> Triwulan I </option>
                                <option value="Triwulan II"> Triwulan II </option>
                                <option value="Triwulan III"> Triwulan III </option>
                                <option value="Triwulan IV"> Triwulan IV </option>
                                <option value="Tahun"> Tahun </option>
                                <option value="Total"> Total </option>
                            </select>    
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

        <?php if ($edit_kpi == true) { ?>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil edit KPI Internal.
            </div>
        <?php } ?>

        <?php if ($status_ada_kpi == 0) { ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Error!</strong> KPI Internal <strong><?php echo $jenis_kpi; ?></strong> tahun <strong><?php echo $tahun_kpi; ?></strong> tidak ditemukan.
            </div>
        <?php } else { ?>
            <section class="panel">               
                <?php $index = 0; ?>

                <?php if ($jenis_kpi == "Tahun") { ?>
                    <header class="panel-heading">
                        KPI Internal <strong><?php echo $jenis_kpi; ?></strong> Tahun <strong><?php echo $tahun_kpi; ?></strong>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="3">KELOMPOK KPI</th>
                                        <th rowspan="3" colspan="2">INDIKATOR KINERJA UTAMA</th>
                                        <th rowspan="3">ASPEK</th>
                                        <th rowspan="3">Satuan</th>
                                        <th rowspan="3">Frekuensi Monitoring</th>
                                        <th rowspan="3">Bobot</th>
                                        <th colspan="2">TARGET</th>
                                        <th rowspan="3">Aksi</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">KPI <?php echo $tahun_kpi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Base</td>
                                        <td>Stretch</td>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="50">Individual Performance Contract</td>
                                        <td colspan="9"><strong>I. Financial</strong></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">1</td>
                                        <td><strong>Revenue</strong></td>
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
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage Management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>a. Laba usaha Own fleet management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Laba usaha Fuel Retail Fleet Management (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Laba Usaha  Terminal Storage</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>a. Cost / Liter Fleet Management Fleet Management (SPBU/SPDN)</td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Cost / MT Gas & Aviation  Fleet Management (SPBE)</td>
                                        <td>Max</td>
                                        <td>USD/MT</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Cost effectiveness Terminal Storage </td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><strong>Collection Period</strong></td>
                                        <td>Max</td>
                                        <td>by date</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="9"><strong>II. Operational Excellence</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Total Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Discharge Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Working Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>MT</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>a. Fuel Retail Fleet Management (BBM/BBK)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Gas & Aviation Fleet Management (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- APMS/SPBB</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Mobil tangki milik</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>- Mobil tangki kelola</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="9"><strong>III. Operational Other</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Angka Penurunan Insiden</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="9"><strong>IV. Business Development / Customer Satisfaction</strong></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td><strong>Progress Pelaksaan Pekerjaan (BD/Non BD)</strong></td>
                                        <td></td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',4)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">Boundary KPIs</td>
                                        <td>1</td>
                                        <td>TRIR Patra Niaga</td>
                                        <td></td>
                                        <td>Ratio</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>NOA Patra Niaga</td>
                                        <td></td>
                                        <td># cases</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>GCG compliance</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>External Audit Opinion</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td>WTP</td>
                                        <td>--</td>
                                        <td></td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td rowspan="7">Other Operational Metrics</td>
                                        <td>1</td>
                                        <td>Proper PPN</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?>/green</td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Learning index</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Follow up audit findings</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Akurasi dan kelengkapan Laporan Keuangan</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Utilisasi ERP (MySAP)</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Knowledge & Innovation Program</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Penyelesaian OFI to AFI PQA</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>
                                        
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',3)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } else if ($jenis_kpi == "Total") { ?>
                    <header class="panel-heading">
                        KPI Internal <strong><?php echo $jenis_kpi; ?></strong> Tahun <strong><?php echo $tahun_kpi; ?></strong>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="3">KELOMPOK KPI</th>
                                        <th rowspan="3" colspan="2">INDIKATOR KINERJA UTAMA</th>
                                        <th rowspan="3">ASPEK</th>
                                        <th rowspan="3">Satuan</th>
                                        <th rowspan="3">Frekuensi Monitoring</th>
                                        <th rowspan="3">Bobot</th>
                                        <th colspan="2">KPI <?php echo $tahun_kpi; ?></th>
                                        <th colspan="5">TRIWULAN I</th>
                                        <th colspan="5">TRIWULAN II</th>
                                        <th colspan="5">TRIWULAN III</th>
                                        <th colspan="5">TRIWULAN IV</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">TARGET</td>
                                        <td colspan="2">TARGET</td>
                                        <td colspan="3">REALISASI</td>
                                        <td colspan="2">TARGET</td>
                                        <td colspan="3">REALISASI</td>
                                        <td colspan="2">TARGET</td>
                                        <td colspan="3">REALISASI</td>
                                        <td colspan="2">TARGET</td>
                                        <td colspan="3">REALISASI</td>
                                    </tr>
                                    <tr>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <td>Januari</td>
                                        <td>Februari</td>
                                        <td>Maret</td>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <td>April</td>
                                        <td>Mei</td>
                                        <td>Juni</td>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <td>Juli</td>
                                        <td>Agustus</td>
                                        <td>September</td>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <td>Oktober</td>
                                        <td>November</td>
                                        <td>Desember</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="50">Individual Performance Contract</td>
                                        <td colspan="28"><strong>I. Financial</strong></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">1</td>
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
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage Management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Laba usaha Fuel Retail Fleet Management (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Laba Usaha  Terminal Storage</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Cost / MT Gas & Aviation  Fleet Management (SPBE)</td>
                                        <td>Max</td>
                                        <td>USD/MT</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Cost effectiveness Terminal Storage </td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><strong>Collection Period</strong></td>
                                        <td>Max</td>
                                        <td>by date</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="28"><strong>II. Operational Excellence</strong></td>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Discharge Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Working Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>MT</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Gas & Aviation Fleet Management (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Mobil tangki milik</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>- Mobil tangki kelola</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="29"><strong>III. Operational Other</strong></td>
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
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="29"><strong>IV. Business Development / Customer Satisfaction</strong></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td><strong>Progress Pelaksaan Pekerjaan (BD/Non BD)</strong></td>
                                        <td></td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_STRETCH, 2, ',', '.'); ?></td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                        <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">Boundary KPIs</td>
                                        <td>1</td>
                                        <td>TRIR Patra Niaga</td>
                                        <td></td>
                                        <td>Ratio</td>
                                        <td></td>
                                        <td></td>

                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>NOA Patra Niaga</td>
                                        <td></td>
                                        <td># cases</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>GCG compliance</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>External Audit Opinion</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td>WTP</td>
                                        <td>--</td>                                            
                                        <td>WTP</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>WTP</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td>WTP</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td>WTP</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td rowspan="7">Other Operational Metrics</td>
                                        <td>1</td>
                                        <td>Proper PPN</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?>/green</td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?>/green</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?>/green</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?>/green</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?>/green</td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Learning index</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Follow up audit findings</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Akurasi dan kelengkapan Laporan Keuangan</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Utilisasi ERP (MySAP)</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Knowledge & Innovation Program</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Penyelesaian OFI to AFI PQA</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TAHUN_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>                                            
                                        <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        
                                        <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                        <td>--</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                        


                                        <?php $index++; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } else { ?>
                    <header class="panel-heading">
                        KPI Internal <strong><?php echo $jenis_kpi; ?></strong> Tahun <strong><?php echo $tahun_kpi; ?></strong>
                        <form style="float:right;" class="cmxform form-horizontal tasi-form" method="post" action="<?php echo base_url(); ?>laporan/kpi_internal">
                            <input class=" form-control input-sm m-bot15" name="tahun" min="0" type="hidden" value="<?php echo $tahun_kpi; ?>" placeholder="Tahun" required readonly/>
                            <input class=" form-control input-sm m-bot15" name="jenis" min="0" type="hidden" value="<?php echo $jenis_kpi; ?>" placeholder="Bobot" required readonly/>
                            <input type="submit"  name="sinkron" data-placement="left" class="btn btn-primary btn-xs tooltips" data-original-title="Sinkronisasi Data" value="Sinkronisasi">
                        </form>                    
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="3">KELOMPOK KPI</th>
                                        <th rowspan="3" colspan="2">INDIKATOR KINERJA UTAMA</th>
                                        <th rowspan="3">ASPEK</th>
                                        <th rowspan="3">Satuan</th>
                                        <th rowspan="3">Frekuensi Monitoring</th>
                                        <th rowspan="3">Bobot</th>
                                        <th colspan="2">TARGET</th>
                                        <th colspan="3">REALISASI</th>
                                        <th rowspan="3">Aksi</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $jenis_kpi; ?></td>
                                        <td colspan="3"><?php echo $jenis_kpi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td>Januari</td>
                                            <td>Februari</td>
                                            <td>Maret</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td>April</td>
                                            <td>Mei</td>
                                            <td>Juni</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td>Juli</td>
                                            <td>Agustus</td>
                                            <td>September</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td>Oktober</td>
                                            <td>November</td>
                                            <td>Desember</td>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="50">Individual Performance Contract</td>
                                        <td colspan="12"><strong>I. Financial</strong></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">1</td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Fleet Management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage Management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>a. Laba usaha Own fleet management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Laba usaha Fuel Retail Fleet Management (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Laba Usaha  Terminal Storage</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>a. Cost / Liter Fleet Management Fleet Management (SPBU/SPDN)</td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Cost / MT Gas & Aviation  Fleet Management (SPBE)</td>
                                        <td>Max</td>
                                        <td>USD/MT</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Cost effectiveness Terminal Storage </td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><strong>Collection Period</strong></td>
                                        <td>Max</td>
                                        <td>by date</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="12"><strong>II. Operational Excellence</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Total Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Discharge Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Working Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>MT</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>a. Fuel Retail Fleet Management (BBM/BBK)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>b. Gas & Aviation Fleet Management (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
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
                                    </tr>
                                    <tr>
                                        <td>- APMS/SPBB</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>- Mobil tangki milik</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>- Mobil tangki kelola</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',1)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="12"><strong>III. Operational Other</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Angka Penurunan Insiden</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td colspan="12"><strong>IV. Business Development / Customer Satisfaction</strong></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td><strong>Progress Pelaksaan Pekerjaan (BD/Non BD)</strong></td>
                                        <td></td>
                                        <td>%</td>
                                        <td>Triwulan</td>
                                        <td><?php echo $data_kpi[$index]->BOBOT; ?></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW1_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW2_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW3_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN1, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN2, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->REALISASI_TW4_BULAN3, 2, ',', '.'); ?></td>
                                        <?php } ?>

                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',0)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">Boundary KPIs</td>
                                        <td>1</td>
                                        <td>TRIR Patra Niaga</td>
                                        <td></td>
                                        <td>Ratio</td>
                                        <td></td>
                                        <td></td>

                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>NOA Patra Niaga</td>
                                        <td></td>
                                        <td># cases</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>GCG compliance</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>External Audit Opinion</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td>WTP</td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td>WTP</td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td>WTP</td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td>WTP</td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td rowspan="7">Other Operational Metrics</td>
                                        <td>1</td>
                                        <td>Proper PPN</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?>/green</td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?>/green</td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?>/green</td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?>/green</td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Learning index</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Follow up audit findings</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Akurasi dan kelengkapan Laporan Keuangan</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Utilisasi ERP (MySAP)</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Knowledge & Innovation Program</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td>--</td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',2)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Penyelesaian OFI to AFI PQA</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>
                                        <td></td>
                                        <?php if ($jenis_kpi == 'Triwulan I') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW1_STRETCH, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan II') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW2_STRETCH, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan III') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW3_STRETCH, 2, ',', '.'); ?></td>
                                        <?php } else if ($jenis_kpi == 'Triwulan IV') { ?>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_BASE, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($data_kpi[$index]->TW4_STRETCH, 2, ',', '.'); ?></td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-placement="top" data-toggle="modal" href="#ModalEditKPI" onclick="setDetailKPI('<?php echo $data_kpi[$index]->ID_KPI_INTERNAL; ?>',3)" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                        </td>

                                        <?php $index++; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </section>
        <?php } ?>
    </section>
</section>
<!--main content end-->


<?php if ($status_ada_kpi > 0) { ?>
    <?php if ($jenis_kpi != "Total") { ?>
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
                                                Jenis <input class=" form-control input-sm m-bot15" name="jenis" min="0" type="text" value="<?php echo $jenis_kpi; ?>" placeholder="Bobot" required readonly/>
                                            </div>
                                        </div>

                                        <div class="form-group "> 
                                            <p>TARGET <?php echo $jenis_kpi; ?></p>

                                            <div class="col-lg-4" id="kolom_bobot">
                                                Bobot <input class=" form-control input-sm m-bot15" id="edit_bobot" name="edit_bobot" mi="0" type="number" value="" placeholder="Bobot" required/>
                                            </div>
                                            <div class="col-lg-4" id="kolom_base">
                                                Base <input class=" form-control input-sm m-bot15" id="edit_base" name="edit_base" min="0" type="number" value="" placeholder="Base" required/>
                                            </div>
                                            <div class="col-lg-4" id="kolom_stretch">
                                                Stretch <input class=" form-control input-sm m-bot15" id="edit_stretch" name="edit_stretch" min="0" type="number" value="" placeholder="Stretch" required/>
                                            </div>
                                        </div>

                                        <div class="form-group " id="kolom_realisasi"> 
                                            <p>REALISASI <?php echo $jenis_kpi; ?></p>

                                            <div class="col-lg-4">
                                                <?php if ($jenis_kpi == "Triwulan I") { ?>
                                                    Januari
                                                <?php } else if ($jenis_kpi == "Triwulan II") { ?>
                                                    April
                                                <?php } else if ($jenis_kpi == "Triwulan III") { ?>
                                                    Juli
                                                <?php } else if ($jenis_kpi == "Triwulan IV") { ?>
                                                    Oktober
                                                <?php } ?>
                                                <input class=" form-control input-sm m-bot15" id="edit_bulan1" name="edit_bulan1" mi="0" type="number" value="" placeholder="Realisasi Bulan" required/>
                                            </div>
                                            <div class="col-lg-4">
                                                <?php if ($jenis_kpi == "Triwulan I") { ?>
                                                    Februari
                                                <?php } else if ($jenis_kpi == "Triwulan II") { ?>
                                                    Mei
                                                <?php } else if ($jenis_kpi == "Triwulan III") { ?>
                                                    Agustus
                                                <?php } else if ($jenis_kpi == "Triwulan IV") { ?>
                                                    November
                                                <?php } ?>
                                                <input class=" form-control input-sm m-bot15" id="edit_bulan2" name="edit_bulan2" mi="0" type="number" value="" placeholder="Realisasi Bulan" required/>
                                            </div>
                                            <div class="col-lg-4">
                                                <?php if ($jenis_kpi == "Triwulan I") { ?>
                                                    Maret
                                                <?php } else if ($jenis_kpi == "Triwulan II") { ?>
                                                    Juni
                                                <?php } else if ($jenis_kpi == "Triwulan III") { ?>
                                                    September
                                                <?php } else if ($jenis_kpi == "Triwulan IV") { ?>
                                                    Desember
                                                <?php } ?>
                                                <input class=" form-control input-sm m-bot15" id="edit_bulan3" name="edit_bulan3" mi="0" type="number" value="" placeholder="Realisasi Bulan" required/>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                            <input class="btn btn-success" type="submit" name="edit_triwulan" value="Simpan"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
<?php } ?>