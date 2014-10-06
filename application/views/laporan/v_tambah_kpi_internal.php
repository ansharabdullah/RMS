<script>

    $(document).ready(function() {
        $("#inputan").hide();
    });

    function setting() {
        var tahun = $("#tahun").val();
        var jenis = $("#jenis").val();
        if (tahun >= 2010) {
            if (jenis == "Triwulan I") {
                $("#jenis_tw1").html('Triwulan I');
                $("#jenis_tw2").html('Triwulan I');
                $("#bln1").html('Januari');
                $("#bln2").html('Februari');
                $("#bln3").html('Maret');
            } else if (jenis == "Triwulan II") {
                $("#jenis_tw1").html('Triwulan II');
                $("#jenis_tw2").html('Triwulan II');
                $("#bln1").html('April');
                $("#bln2").html('Mei');
                $("#bln3").html('Juni');
            } else if (jenis == "Triwulan III") {
                $("#jenis_tw1").html('Triwulan III');
                $("#jenis_tw2").html('Triwulan III');
                $("#bln1").html('Juli');
                $("#bln2").html('Agustus');
                $("#bln3").html('September');
            } else if (jenis == "Triwulan IV") {
                $("#jenis_tw1").html('Triwulan IV');
                $("#jenis_tw2").html('Triwulan IV');
                $("#bln1").html('Oktober');
                $("#bln2").html('November');
                $("#bln3").html('Desember');
            }
            $("#inputan").show();
        } else {
            $("#inputan").hide();
        }
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
                    <li><a href="<?php echo base_url(); ?>laporan/kpi_internal">KPI Internal</a></li>
                    <li class="active">Tambah</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>


        <section class="panel" >
            <header class="panel-heading">
                Tambah KPI Internal Depot
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url();?>laporan/tambah_kpi_internal">
                    <div class="form-group">
                        <label for="tahun" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" id="tahun" onchange="setting()"  name="tahun" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis" class="col-lg-2 col-sm-2 control-label">Jenis</label>
                        <div class="col-lg-10 col-sm-6">
                            <select name="jenis" id="jenis" onchange="setting()" class="form-control">
                                <option value="Triwulan I"> Triwulan I </option>
                                <option value="Triwulan II"> Triwulan II </option>
                                <option value="Triwulan III"> Triwulan III </option>
                                <option value="Triwulan IV"> Triwulan IV </option>
                            </select>    
                        </div>
                    </div>
                    <div id="inputan">
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
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span id="jenis_tw1"></span></td>
                                        <td colspan="3"><span id="jenis_tw2"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Base</td>
                                        <td>Stretch</td>
                                        <td><span id="bln1"></span></td>
                                        <td><span id="bln2"></span></td>
                                        <td><span id="bln3"></span></td>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="50">Individual Performance Contract</td>
                                        <td colspan="11"><strong>I. Financial</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Fleet Management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="35" name="id_index_35" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_35" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_35" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_35" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_35" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_35" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_35" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage Management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="36" name="id_index_36" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_36" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_36" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_36" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_36" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_36" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_36" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Laba usaha Own fleet management</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="37" name="id_index_37" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_37" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_37" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_37" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_37" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_37" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_37" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>b. Laba usaha Fuel Retail Fleet Management (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="38" name="id_index_38" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_38" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_38" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_38" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_38" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_38" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_38" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>c. Laba Usaha  Terminal Storage</td>
                                        <td>Min</td>
                                        <td>USD</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="39" name="id_index_39" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_39" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_39" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_39" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_39" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_39" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_39" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Cost / Liter Fleet Management Fleet Management (SPBU/SPDN)</td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="40" name="id_index_40" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_40" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_40" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_40" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_40" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_40" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_40" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>b. Cost / MT Gas & Aviation  Fleet Management (SPBE)</td>
                                        <td>Max</td>
                                        <td>USD/MT</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="41" name="id_index_41" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_41" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_41" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_41" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_41" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_41" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_41" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>c. Cost effectiveness Terminal Storage </td>
                                        <td>Max</td>
                                        <td>USD/KL</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="42" name="id_index_42" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_42" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_42" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_42" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_42" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_42" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_42" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><strong>Collection Period</strong></td>
                                        <td>Max</td>
                                        <td>by date</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="43" name="id_index_43" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_43" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_43" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_43" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_43" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_43" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_43" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="11"><strong>II. Operational Excellence</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Total Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="44" name="id_index_44" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_44" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_44" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_44" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_44" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_44" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_44" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>b. Discharge Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="45" name="id_index_45" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_45" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_45" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_45" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_45" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_45" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_45" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>c. Working Loss</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="46" name="id_index_46" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_46" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_46" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_46" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_46" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_46" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_46" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (APMS/SPBB)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="47" name="id_index_47" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_47" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_47" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_47" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_47" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_47" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_47" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="48" name="id_index_48" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_48" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_48" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_48" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_48" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_48" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_48" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>MT</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="49" name="id_index_49" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_49" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_49" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_49" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_49" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_49" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_49" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Min</td>
                                        <td>KL</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="50" name="id_index_50" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_50" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_50" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_50" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_50" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_50" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_50" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="51" name="id_index_51" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_51" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_51" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_51" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_51" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_51" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_51" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>Rit</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="52" name="id_index_52" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_52" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_52" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_52" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_52" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_52" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_52" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="53" name="id_index_53" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_53" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_53" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_53" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_53" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_53" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_53" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>KM</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="54" name="id_index_54" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_54" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_54" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_54" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_54" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_54" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_54" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>- Fuel Retail (SPBU/SPDN)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="55" name="id_index_55" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_55" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_55" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_55" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_55" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_55" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_55" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>- Gas & Aviation (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="56" name="id_index_56" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_56" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_56" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_56" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_56" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_56" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_56" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Fuel Retail Fleet Management (BBM/BBK)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="57" name="id_index_57" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_57" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_57" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_57" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_57" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_57" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_57" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>b. Gas & Aviation Fleet Management (SPBE)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="58" name="id_index_58" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_58" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_58" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_58" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_58" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_58" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_58" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Min</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="59" name="id_index_59" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_59" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_59" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_59" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_59" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_59" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_59" required="required" class="form-control"/></td>
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
                                    </tr>
                                    <tr>
                                        <td>- APMS/SPBB</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="60" name="id_index_60" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_60" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_60" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_60" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_60" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_60" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_60" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>- Mobil tangki milik</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="61" name="id_index_61" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_61" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_61" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_61" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_61" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_61" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_61" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>- Mobil tangki kelola</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="62" name="id_index_62" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_62" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_62" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_62" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_62" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_62" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_62" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>b. Terminal Storage (BBM/Depot)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="63" name="id_index_63" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_63" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_63" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_63" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_63" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_63" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_63" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>c. Fuel Retail Fleet Management (APMS)</td>
                                        <td>Max</td>
                                        <td>Kasus</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="64" name="id_index_64" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_64" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_64" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_64" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_64" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_64" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_64" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="11"><strong>III. Operational Other</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td>a. Angka Penurunan Insiden</td>
                                        <td>Max</td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="65" name="id_index_65" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_65" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_65" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_65" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_65" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_65" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_65" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="11"><strong>IV. Business Development / Customer Satisfaction</strong></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td><strong>Progress Pelaksaan Pekerjaan (BD/Non BD)</strong></td>
                                        <td></td>
                                        <td>%</td>
                                        <td>Triwulan</td>

                                        <td>
                                            <input type="hidden" min="0" value="66" name="id_index_66" required="required" class="form-control"/>
                                            <input type="number" min="0" value="0" name="bobot_index_66" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_66" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_66" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan1_index_66" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan2_index_66" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="bulan3_index_66" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">Boundary KPIs</td>
                                        <td>1</td>
                                        <td>TRIR Patra Niaga</td>
                                        <td></td>
                                        <td>Ratio</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="67" name="id_index_67" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_67" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_67" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_67" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_67" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_67" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_67" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>NOA Patra Niaga</td>
                                        <td></td>
                                        <td># cases</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="68" name="id_index_68" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_68" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_68" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_68" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_68" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_68" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_68" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>GCG compliance</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="69" name="id_index_69" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_69" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_69" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_69" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_69" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_69" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_69" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>External Audit Opinion</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="70" name="id_index_70" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_70" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_70" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_70" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_70" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_70" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_70" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="7">Other Operational Metrics</td>
                                        <td>1</td>
                                        <td>Proper PPN</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="71" name="id_index_71" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_71" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_71" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_71" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_71" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_71" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_71" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Learning index</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="72" name="id_index_72" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_72" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_72" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_72" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_72" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_72" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_72" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Follow up audit findings</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="73" name="id_index_73" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_73" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_73" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_73" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_73" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_73" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_73" required="required" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Akurasi dan kelengkapan Laporan Keuangan</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="74" name="id_index_74" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_74" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_74" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_74" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_74" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_74" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_74" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Utilisasi ERP (MySAP)</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="75" name="id_index_75" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_75" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_75" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_75" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_75" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_75" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_75" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Knowledge & Innovation Program</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="76" name="id_index_76" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_76" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_76" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_76" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_76" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_76" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_76" required="required" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Penyelesaian OFI to AFI PQA</td>
                                        <td></td>
                                        <td>%</td>
                                        <td></td>

                                        <td>
                                            <input type="hidden" min="0" value="77" name="id_index_77" required="required" class="form-control"/>
                                            <input type="hidden" min="0" value="0" name="bobot_index_77" required="required" class="form-control"/>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="base_index_77" required="required" class="form-control"/></td>
                                        <td><input type="number" min="0" value="0" name="stretch_index_77" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan1_index_77" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan2_index_77" required="required" class="form-control"/></td>
                                        <td><input type="hidden" min="0" value="0" name="bulan3_index_77" required="required" class="form-control"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="submit" name="tambah" style="float: right;" class="btn btn-primary" value="Simpan">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>

        <?php if ($status_tambah == true) { ?>
            <?php if ($status_ada == true) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> KPI Internal <strong><?php echo $jenis_kpi; ?></strong> tahun <strong><?php echo $tahun_kpi; ?></strong> telah diinput.
                </div>
            <?php } else { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil tambah KPI Internal <strong><?php echo $jenis_kpi; ?></strong> tahun <strong><?php echo $tahun_kpi; ?></strong>.
                </div>
            <?php } ?>
        <?php } ?>

    </section>
</section>
<!--main content end-->
