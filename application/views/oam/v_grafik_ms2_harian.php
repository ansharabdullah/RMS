<script type="text/javascript">
    var ms2;
    var tanggal = new Array();
    var total_lo_premium = new Array();
    var total_lo_pertamax = new Array();
    var total_lo_solar = new Array();
    var lo_premium = new Array();
    var lo_pertamax = new Array();
    var lo_solar = new Array();
    var sesuai_premium = new Array();
    var sesuai_pertamax = new Array();
    var sesuai_solar = new Array();
    var cepat_premium = new Array();
    var cepat_pertamax = new Array();
    var cepat_solar = new Array();
    var cepat_shift_1_premium = new Array();
    var cepat_shift_1_pertamax = new Array();
    var cepat_shift_1_solar = new Array();
    var lambat_premium = new Array();
    var lambat_pertamax = new Array();
    var lambat_solar = new Array();
    var gagal_premium = new Array();
    var gagal_pertamax = new Array();
    var gagal_solar = new Array();
<?php
foreach ($ms2 as $row) {
    ?>
            tanggal.push("<?php echo $row->tanggal ?>");
            total_lo_premium.push(<?php echo $row->TOTAL_LO_PREMIUM ?>);
            total_lo_pertamax.push(<?php echo $row->TOTAL_LO_PERTAMAX ?>);
            total_lo_solar.push(<?php echo $row->TOTAL_LO_SOLAR ?>);
            lo_premium.push(<?php echo $row->TOTAL_LO_PREMIUM ?>);
            lo_pertamax.push(<?php echo $row->TOTAL_LO_PERTAMAX ?>);
            lo_solar.push(<?php echo $row->TOTAL_LO_SOLAR ?>);
            sesuai_premium.push(<?php echo $row->SESUAI_PREMIUM ?>);
            sesuai_pertamax.push(<?php echo $row->SESUAI_PERTAMAX ?>);
            sesuai_solar.push(<?php echo $row->SESUAI_SOLAR ?>);
            cepat_premium.push(<?php echo $row->CEPAT_PREMIUM ?>);
            cepat_pertamax.push(<?php echo $row->CEPAT_PERTAMAX ?>);
            cepat_solar.push(<?php echo $row->CEPAT_SOLAR ?>);
            cepat_shift_1_premium.push(<?php echo $row->CEPAT_SHIFT1_PREMIUM ?>);
            cepat_shift_1_pertamax.push(<?php echo $row->CEPAT_SHIFT1_PERTAMAX ?>);
            cepat_shift_1_solar.push(<?php echo $row->CEPAT_SHIFT1_SOLAR ?>);
            lambat_premium.push(<?php echo $row->LAMBAT_PREMIUM ?>);
            lambat_pertamax.push(<?php echo $row->LAMBAT_PERTAMAX ?>);
            lambat_solar.push(<?php echo $row->LAMBAT_SOLAR ?>);
            gagal_premium.push(<?php echo $row->TIDAK_TERKIRIM_PREMIUM ?>);
            gagal_pertamax.push(<?php echo $row->TIDAK_TERKIRIM_PERTAMAX ?>);
            gagal_solar.push(<?php echo $row->TIDAK_TERKIRIM_SOLAR ?>);
<?php } ?>
    $(function() {
        ms2 = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik',
                zoomType:'x'
            },
            title: {
                text: 'TOTAL LO'
            },
            subtitle: {
                text: 'Bulan <?php echo date("F", mktime(0, 0, 0, $bulan, 1, $tahun)) ?> Tahun <?php echo $tahun ?>'
            },
            xAxis: [{
                    categories:tanggal
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total (%)',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                formatter: function() {
                    return this.x +' <?php echo date('F', mktime(0, 0, 0, $bulan, 1, $tahun)) . " " . $tahun; ?>' + '<br/>' + this.series.name + " : " + this.y + '%' ;
                }
            },
            series: [{
                    type: 'spline',
                    name: 'Premium',
                    color : '#FF002B',
                    data: total_lo_premium,
                    visible: false
                }, {
                    type: 'spline',
                    name: 'Solar',
                    color : '#2C88D4',
                    data: total_lo_solar,
                    visible: false
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    color : '#23C906',
                    data: total_lo_pertamax,
                    visible: false
                }]
        });
    });
    $(document).ready(function(){
        ms2.series[0].setVisible(true);
    });
    
    function filterMs2(tipe)
    {
        if(tipe=="total"){
            ms2.setTitle({text: "TOTAL LO"});
            ms2.series[0].setData(lo_premium);
            ms2.series[1].setData(lo_solar);
            ms2.series[2].setData(lo_pertamax);
        } else if(tipe=="sesuai"){
            ms2.setTitle({text: "SESUAI DENGAN MS2"});
            ms2.series[0].setData(sesuai_premium);
            ms2.series[1].setData(sesuai_solar);
            ms2.series[2].setData(sesuai_pertamax);
        }else if(tipe=="cepat"){
            ms2.setTitle({text: "SEBELUM JADWAL MS2"});
            ms2.series[0].setData(cepat_premium);
            ms2.series[1].setData(cepat_solar);
            ms2.series[2].setData(cepat_pertamax);
        }else if(tipe=="cepat_shift1"){
            ms2.setTitle({text: "CEPAT SHIFT 1 "});
            ms2.series[0].setData(cepat_shift_1_premium);
            ms2.series[1].setData(cepat_shift_1_solar);
            ms2.series[2].setData(cepat_shift_1_pertamax);
        }else if(tipe=="lambat"){
            ms2.setTitle({text: "SETELAH JADWAL MS2"});
            ms2.series[0].setData(lambat_premium);
            ms2.series[1].setData(lambat_solar);
            ms2.series[2].setData(lambat_pertamax);
        }else if(tipe=="gagal"){
            ms2.setTitle({text: "Tidak Terkirim Sesuai Jadwal"});
            ms2.series[0].setData(gagal_premium);
            ms2.series[1].setData(gagal_solar);
            ms2.series[2].setData(gagal_pertamax);
        }
    }
</script>


<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Grafik Harian Depot <?php if (sizeof($kpi) > 0)
    echo $kpi[0]->NAMA_DEPOT; ?>
            </header>
            <div class="panel-body" >
                <?php
                $attr = array("class" => "cmxform form-horizontal tasi-form");
                echo form_open("depot/ganti_kpi_harian/ms2/", $attr);
                ?>
                <div class="form-group">
                    <div class="col-lg-2">
                        <select class="form-control m-bot2"  id="depot" name="depot">
                            <?php
                            foreach ($depot as $d) {
                                ?>
                                <option value="<?php echo $d->ID_DEPOT ?>"><?php echo $d->NAMA_DEPOT ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-lg-3">
                        <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                    </div>

                    <div class=" col-lg-2">
                        <input type="submit" class="btn btn-danger" value="Submit">
                    </div>

                </div>

                <?php echo form_close() ?>
                <br/><br/>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter Grafik<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">

                                        <li><a style="cursor: pointer" onclick="filterMs2('sesuai')">Sesuai MS2</a></li>
                                        <li><a style="cursor: pointer" onclick="filterMs2('cepat')">Sebelum MS2</a></li>
                                        <li><a style="cursor: pointer" onclick="filterMs2('cepat_shift1')">Sebelum Shift 1</a></li>
                                        <li><a style="cursor: pointer" onclick="filterMs2('lambat')">Setelah MS2</a></li>
                                        <li><a style="cursor: pointer" onclick="filterMs2('gagal')">Tidak Terkirim Sesuai Jadwal</a></li>
                                        <li><a style="cursor: pointer" onclick="filterMs2('total')">Total LO</a></li>


                                    </ul>
                        </div>
                        <div id="grafik"></div>
                    </div>
                    <div class="col-lg-5">

                        <div id="grafikKpi"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tabel MS2 Complience Bulan <?php echo date('F Y', mktime(0, 0, 0, $bulan, 1, $tahun))?>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table" style="overflow-x: scroll">

                                <div class="space15"></div>
                                <table class="table table-striped  table-bordered" id="editable-sample">   
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="3">Sesuai Dengan MS2</th>
                                            <th colspan="3">Cepat (Sebelum MS2)</th>
                                            <th colspan="3">Lebih Cepat (Sebelum Shift 1)</th>
                                            <th colspan="3">Lambat (Setelah MS2)</th>
                                            <th colspan="3">Tidak Terkirim Sesuai Jadwal MS2</th>
                                            <th colspan="3">Total LO</th>
                                        </tr>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th>Premium</th>
                                            <th>Solar</th>
                                            <th>Pertamax</th>
                                            <th>Premium</th>
                                            <th>Solar</th>
                                            <th>Pertamax</th>
                                            <th>Premium</th>
                                            <th>Solar</th>
                                            <th>Pertamax</th>
                                            <th>Premium</th>
                                            <th>Solar</th>
                                            <th>Pertamax</th>
                                            <th>Premium</th>
                                            <th>Solar</th>
                                            <th>Pertamax</th>
                                            <th>Premium</th>
                                            <th>Solar</th>
                                            <th>Pertamax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($ms2 as $row) {
                                            ?>
                                            <tr class="">
                                                <td style="display:none;"></td>
                                                <td><?php echo ($i + 1) ?></td>
                                                <td style="white-space: nowrap"><?php echo date('d F Y', strtotime($row->TANGGAL_LOG_HARIAN)) ?></td>
                                                <td><?php echo $row->SESUAI_PREMIUM ?>%</td>
                                                <td><?php echo $row->SESUAI_SOLAR ?>%</td>
                                                <td><?php echo $row->SESUAI_PERTAMAX ?>%</td>  
                                                <td><?php echo $row->CEPAT_PREMIUM ?>%</td>
                                                <td><?php echo $row->CEPAT_SOLAR ?>%</td>
                                                <td><?php echo $row->CEPAT_PERTAMAX ?>%</td>
                                                <td><?php echo $row->CEPAT_SHIFT1_PREMIUM ?>%</td>
                                                <td><?php echo $row->CEPAT_SHIFT1_SOLAR ?>%</td>
                                                <td><?php echo $row->CEPAT_SHIFT1_PERTAMAX ?>%</td> 
                                                <td><?php echo $row->LAMBAT_PREMIUM ?>%</td>
                                                <td><?php echo $row->LAMBAT_SOLAR ?>%</td>
                                                <td><?php echo $row->LAMBAT_PERTAMAX ?>%</td> 
                                                <td><?php echo $row->TIDAK_TERKIRIM_PREMIUM ?>%</td>
                                                <td><?php echo $row->TIDAK_TERKIRIM_SOLAR ?>%</td>
                                                <td><?php echo $row->TIDAK_TERKIRIM_PERTAMAX ?>%</td> 
                                                <td><?php echo $row->TOTAL_LO_PREMIUM ?>%</td>
                                                <td><?php echo $row->TOTAL_LO_SOLAR ?>%</td>
                                                <td><?php echo $row->TOTAL_LO_PERTAMAX ?>%</td>
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
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->

<!-- page end-->

<script type="text/javascript">
    var category = new Array();
    var nilai = new Array();
<?php foreach ($kpi as $k) {
    if ($k->ID_JENIS_KPI_OPERASIONAL < 10) { ?>
                category.push("<?php echo $k->JENIS_KPI_OPERASIONAL ?>");  
                nilai.push(<?php echo $k->PERFORMANCE_SCORE ?>);  
        <?php
    }
}
?>
    $(function () {
        
        $('#grafikKpi').highcharts({

            chart: {
                polar: true,
                type: 'line'
            },

            title: {
                text: "Nilai KPI DEPOT <?php echo $kpi[0]->NAMA_DEPOT; ?>",
                x: -80
            },

            pane: {
                size: '80%'
            },

            xAxis: {
                categories: category,
                tickmarkPlacement: 'on',
                lineWidth: 0
            },

            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },

            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}%</b><br/>'
            },

            legend:{
                enabled:false
            },
            series: [{
                    type:'area',
                    name: 'Nilai KPI',
                    data: nilai,
                    pointPlacement: 'on'
                }]

        });
    });
</script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
   
		  
</script>

