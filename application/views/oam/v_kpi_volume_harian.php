<script type="text/javascript">
    var volume;
    var tanggal = new Array();
    var premium = new Array();
    var r_premium = new Array();
    var solar = new Array();
    var r_solar = new Array();
    var pertamax = new Array();
    var r_pertamax = new Array();
    var bio_solar = new Array();
    var r_biosolar = new Array();
    var realisasi = new Array();
    var rencana = new Array();
<?php
foreach ($volume as $row) {
    ?>
            tanggal.push("<?php echo $row->tanggal ?>");
            premium.push(<?php echo $row->premium ?>);
            r_premium.push(<?php echo $row->R_PREMIUM ?>);
            realisasi.push(<?php echo $row->premium ?>);
            rencana.push(<?php echo $row->R_PREMIUM ?>);
            pertamax.push(<?php echo $row->pertamax ?>);
            r_pertamax.push(<?php echo $row->R_PERTAMAX ?>);
            solar.push(<?php echo $row->solar ?>);
            r_solar.push(<?php echo $row->R_SOLAR ?>);
            bio_solar.push(<?php echo $row->premium ?>);
            r_biosolar.push(<?php echo $row->R_BIOSOLAR ?>);
<?php } ?>
    $(function() {
        volume = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik',
                zoomType:'x'
            },
            title: {
                text: 'Grafik Pencapaian Premium'
            },
            subtitle: {
                text: 'Bulan <?php echo strftime("%B", mktime(0, 0, 0, $bulan, 1, $tahun)) ?> Tahun <?php echo $tahun ?>'
            },
            xAxis: [{
                    categories: tanggal
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
                shared: true
            },
            series: [{
                    name: 'Rencana',
                    type: 'spline',
                    color : '#FF002B',
                    data: rencana
                },{
                    name: 'Realisasi',
                    type: 'column',
                    color : '#2C88D4',
                    data: realisasi
                    
                }]
        });
    });
   
    function filterVolume(tipe)
    {
        volume.setTitle({text: "Grafik Pencapaian "+tipe});
        if(tipe == "Premium"){
            volume.series[0].setData(r_premium);
            volume.series[1].setData(premium);
        }else if(tipe == "Pertamax"){
            volume.series[0].setData(r_pertamax);
            volume.series[1].setData(pertamax);
        }else if(tipe == "Solar"){
            volume.series[0].setData(r_solar);
            volume.series[1].setData(solar);
        }else if(tipe == "Bio Solar"){
            volume.series[0].setData(r_biosolar);
            volume.series[1].setData(bio_solar);
        }
       
    }

</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Grafik Rencana Volume vs Realisasi Harian Depot <?php echo $volume[0]->NAMA_DEPOT ?>
            </header>
            <div class="panel-body" >
                <?php
                $attr = array("class" => "cmxform form-horizontal tasi-form");
                echo form_open("kpi/ganti_kpi_harian/volume/", $attr);
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
                        <input type="month" name="bulan"  required="required" id="tahunLaporan"  class="form-control"/>
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

                                <li><a style="cursor: pointer" onclick="filterVolume('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterVolume('Pertamax')">Pertamax</a></li>
                                <li><a style="cursor: pointer" onclick="filterVolume('Solar')">Solar</a></li>
                                <li><a style="cursor: pointer" onclick="filterVolume('Bio Solar')">Bio Solar</a></li>


                            </ul>
                        </div>
                        <br/><br/><br/>
                        <div id="grafik"></div>
                    </div>
                    <div class="col-lg-5">

                        <br/><br/><br/>
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
                            Tabel Rencana Volume vs Realisasi Harian Depot <?php echo $volume[0]->NAMA_DEPOT ?> Bulan <?php echo strftime("%B", mktime(0, 0, 0, $bulan, 1, $tahun)) ?> Tahun <?php echo $tahun ?>
                        </header>
                        <div class="panel-body">
                            <div class="space15">
                            </div>
                            <table class="table table-striped  table-bordered" id="editable-sample">
                           <thead>
                                    <tr>
                                        <th style="display: none;"></th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Tanggal</th>
                                        <th colspan="2">Premium</th>
                                        <th colspan="2">Bio Solar</th>
                                        <th colspan="2">Pertamax</th>
                                        <th colspan="2">Solar</th>
                                        <th rowspan="2">Pencapaian</th>
                                    </tr>
                                    <tr>
                                        <th style="display: none;"></th>
                                        <th>Rencana</th>
                                        <th>Realisasi</th>
                                        <th>Rencana</th>
                                        <th>Realisasi</th>
                                        <th>Rencana</th>
                                        <th>Realisasi</th>
                                        <th>Rencana</th>
                                        <th>Realisasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($volume as $v) {
//                                                                $pencapaian = (($v->premium / $v->R_PREMIUM) + ($v->bio_solar/$v->R_BIOSOLAR) + ($v->pertamax / $v->R_PERTAMAX) + ($v->solar / $v->R_SOLAR)) / 4 * 100;
                                        ?>
                                        <tr>
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td style="white-space: nowrap"><?php echo date('d F Y', strtotime($v->TANGGAL_LOG_HARIAN)) ?></td>
                                            <td><?php echo $v->R_PREMIUM ?></td>
                                            <td><?php echo $v->premium ?></td>
                                            <td><?php echo $v->R_BIOSOLAR ?></td>
                                            <td><?php echo $v->bio_solar ?></td>
                                            <td><?php echo $v->R_PERTAMAX ?></td>
                                            <td><?php echo $v->pertamax ?></td>
                                            <td><?php echo $v->R_SOLAR ?></td>
                                            <td><?php echo $v->solar ?></td>
                                            <td></td>
                                        </tr>
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

