<script type="text/javascript">
    var activeIndex = 1;
    //10 indikator KPI (nilai performansi)
    var pengiriman = new Array();
    var volume = new Array();
    var tagihan = new Array();
    var customer_satisfaction = new Array();
    var keluhan = new Array();
    var tindak_lanjut = new Array();
    var pelatihan = new Array();
    var incidents = new Array();
    var penyelesaian_incidents = new Array();
    var accidents = new Array();
    var realisasi_pengiriman = new Array();
    var bulan = new Array();
    var nomor_bulan = new Array();
//    realisasi_pengiriman = pengiriman;
<?php
    $j = 0;
    $index = 0;
    $bulan ="";
    while($j < sizeof($kpi_bulan)) {
        ?>
        nomor_bulan.push(<?php echo date('n',strtotime($kpi_bulan[$j]->tanggal))?>);
        bulan.push("<?php echo strftime('%B',strtotime($kpi_bulan[$j]->tanggal))?>");
        pengiriman.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        realisasi_pengiriman.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        volume.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        tagihan.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        customer_satisfaction.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        keluhan.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        tindak_lanjut.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        pelatihan.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        incidents.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        penyelesaian_incidents.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        accidents.push(<?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?>);
        <?php $index++;?>
        <?php
        $j++;
    }
?>
    var kpi;
    $(function() {
         kpi = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik2'
            },
            title: {
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance) <?php echo $kpi_bulan[0]->nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        useHTML: true,
                        formatter: function() {
                            if(this.y < 100){
                                return "<span class='btn btn-warning'> <i class='icon-warning-sign'></i></span>"; 
                            }
                        },
                        y: 100
                    },
                    point:{
                        events:{
                            click: function(event) {
                               if(activeIndex < 3)
                                {
                                    var title;
                                    if(activeIndex == 1)
                                    {
                                        title = "ms2";
                                    }
                                    else
                                    {
                                        title = "volume";
                                    }
                                    window.location = "<?php echo base_url() ?>kpi/operasional_depot/"+title+"/<?php echo $id_depot?>/"+nomor_bulan[this.x]+"/<?php echo $tahun?>";
                                }
                            }
                        }
                    }
                    
                },
             series: {
                 groupPadding: 0
                }
            },
            xAxis: [{
                    categories: bulan
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    
                     plotLines:[{
                            value:100,
                            color: '#ff0000',
                            width:2,
                            zIndex:4,
                            label:{text:'Target'}
                        }]
                }],
            tooltip: {
                 positioner: function () {
                    return { x: 10, y: 35 };
                 }
            },
            legend:{
                 enabled: false
            },
            series: [{
                    name: 'Realisasi',
                    type: 'column',
                    data: pengiriman
                }]
        });
    });
    
    function filter(title,index){
        activeIndex = index;
        kpi.setTitle({text: title+' Depot 1'});
        switch (index) {
            case 1:
                kpi.series[0].setData(realisasi_pengiriman);break;
            case 2:
                kpi.series[0].setData(volume);break;
            case 3:
                kpi.series[0].setData(tagihan);break;
            case 4:
                kpi.series[0].setData(customer_satisfaction);break;
            case 5:
                kpi.series[0].setData(keluhan);break;
            case 6:
                kpi.series[0].setData(tindak_lanjut);break;
            case 7:
                kpi.series[0].setData(pelatihan);break;
            case 8:
                kpi.series[0].setData(incidents);break;
            case 9:
                kpi.series[0].setData(penyelesaian_incidents);break;
            case 10:
                kpi.series[0].setData(accidents);break;
        }
    }
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
                <section class="panel">
                        <header class="panel-heading">
                            Grafik KPI Bulanan Depot <?php echo $kpi_bulan[0]->nama_depot?>
                        </header>
                        <div class="panel-body" >
                            <?php $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                echo form_open("kpi/changeGrafikBulan/",$attr);
                            ?>

                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <select class="form-control m-bot2"  id="depot" name="depot">
                                        <?php
                                            foreach($depot as $d)
                                            {
                                                ?>
                                            <option value="<?php echo $d->ID_DEPOT?>"><?php echo $d->NAMA_DEPOT?></option>
                                                <?php
                                            }
                                        ?>

                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="number" value="<?php echo date('Y')?>" name="tahun" maxlength="4" minlength="4" min="2010"  placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                    </div>

                                    <div class=" col-lg-2">
                                        <input type="submit" class="btn btn-danger" value="Submit">
                                    </div>

                                </div>
                            <?php echo form_close();?>
                            <br/><br/>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter Grafik<i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">

                                    <li><a style="cursor: pointer" onclick="filter('Rencana pengiriman vs realisasi (MS2 Compliance)',1)">Rencana pengiriman vs realisasi (MS2 Compliance)</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Rencana volume angkutan vs realisasi',2)">Rencana volume angkutan vs realisasi</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Laporan tagihan ongkos angkut',3)">Laporan tagihan ongkos angkut </a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Customer  Satisfaction (Lembaga Penyalur)',4)">Customer  Satisfaction (Lembaga Penyalur)</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Jumlah temuan, keluhan atau komplain terkait pengelolaan MT',5)">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Tindak lanjut penyelesaian keluhan atau komplain yang diterima',6)">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Jumlah pekerja pengelola MT  yang mengikuti pelatihan',7)">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Number of Incidents',8)">Number of Incidents</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Waktu penyelesaian Incidents',9)">Waktu penyelesaian Incidents</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Number of Accident',10)">Number of Accident</a></li>

                                </ul>
                            </div>
                        <br/><br/><br/>
                            <div id="grafik2"></div>

                                    &nbsp;&nbsp;<span class='btn btn-warning'> <i class='icon-warning-sign'></i></span>  <b> = Hasil dibawah target</b>
                        </div>
            </section>
                <section class="panel">
                        <header class="panel-heading">
                            Key Performance Indicator (KPI) Depot <?php echo $kpi_bulan[0]->nama_depot?> (Tahun <?php echo $tahun?>)
                        </header>
                    <div class="panel-body">
                        <div class="space15">
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>KPI</th>
                                        <th>Indikator</th>
                                        <th style="white-space: nowrap">Target</th>
                                        <th style="white-space: nowrap">Realisasi</th>
                                        <th style="white-space: nowrap">Deviasi</th>
                                        <th style="white-space: nowrap">Performance Score</th>
                                        <th style="white-space: nowrap">Weighted Score</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <?php
                                    $j = 0;
                                    $index = 0;
                                    $bulan ="";
                                    while($j < sizeof($kpi_bulan)) {
                                        ?>
                                        <tr >
                                            <td rowspan="10" style="display:none;"></td>
                                            <td rowspan="10"><?php echo ($j + 1) ?></td>
                                            <td rowspan="10"><?php echo strftime('%B',strtotime($kpi_bulan[$j]->tanggal));?></td>
                                            <td rowspan="10"><?php echo round($kpi_bulan[$j]->total,2)?>%</td>
                                            <td><?php echo $detail_kpi[$index]->JENIS_KPI_OPERASIONAL?></td>
                                            <td><?php echo $detail_kpi[$index]->TARGET?></td>
                                            <td><?php echo $detail_kpi[$index]->REALISASI?></td>
                                            <td><?php echo $detail_kpi[$index]->DEVIASI?></td>
                                            <td><?php echo $detail_kpi[$index]->PERFORMANCE_SCORE?></td>
                                            <td><?php echo $detail_kpi[$index]->WEIGHTED_SCORE?></td>
                                        </tr>
                                        <?php
                                            $index++;
                                            $temp = $index;
                                            for($i = $index ; $i < ($temp + 9);$i++)
                                            {
                                                ?>
                                                <tr >
                                                    <td><?php echo $detail_kpi[$i]->JENIS_KPI_OPERASIONAL?></td>
                                                    <td><?php echo $detail_kpi[$i]->TARGET?></td>
                                                    <td><?php echo $detail_kpi[$i]->REALISASI?></td>
                                                    <td><?php echo $detail_kpi[$i]->DEVIASI?></td>
                                                    <td><?php echo $detail_kpi[$i]->PERFORMANCE_SCORE?></td>
                                                    <td><?php echo $detail_kpi[$i]->WEIGHTED_SCORE?></td>
                                                </tr>
                                                <?php
                                                $index++;
                                            }
                                        $j++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </section>
    </section>
</section>

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