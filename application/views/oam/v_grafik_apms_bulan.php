<script type="text/javascript">
    var activeIndex = 1;
    //10 indikator KPI (nilai performansi)
    var laporan_pembayaran = new Array();
    var pembayaran = new Array();
    var penyaluran = new Array();
    var kehandalan = new Array();
    var realisasi_penyaluran = new Array();
    var progres_pembayaran = new Array();
    var transportir = new Array();
    var customer_apms = new Array();
    var pelanggaran = new Array();
    var accidents = new Array();
    var bulan = new Array();
    var nomor_bulan = new Array();
//    realisasi_pengiriman = pengiriman;
<?php
    $j = 0;
    $index = 0;
    for($i = 1 ; $i < date('n') ; $i++)
    {
        ?>
        nomor_bulan.push(<?php echo $i ?>);
        bulan.push("<?php echo strftime('%B',strtotime($tahun.'-'.$i.'-01'))?>");
        <?php
        $status = 0;
        if($j < sizeof($kpi_bulan))
        {
            if($i == date('n',strtotime($kpi_bulan[$j]->tanggal))) {
            ?>
                laporan_pembayaran.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                pembayaran.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                penyaluran.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                kehandalan.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                realisasi_penyaluran.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                progres_pembayaran.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                transportir.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                customer_apms.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                pelanggaran.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
                accidents.push(<?php echo $detail_kpi[$index]->NORMAL_SCORE?>);
                <?php $index++;?>
            <?php
            $j++;
            $status = 1;
            }
        }
        if($status == 0)
        {
            ?>
                laporan_pembayaran.push(0);
                pembayaran.push(0);
                penyaluran.push(0);
                kehandalan.push(0);
                realisasi_penyaluran.push(0);
                progres_pembayaran.push(0);
                transportir.push(0);
                customer_apms.push(0);
                pelanggaran.push(0);
                accidents.push(0);
            <?php
            
        }
    }
?>
    var kpi;
    $(function() {
         kpi = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik2'
            },
            title: {
                text: 'Laporan progres pembayaran ongkos angkut <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: false,
                        useHTML: true,
                        
                        y: 100
                    },
                    point:{
                        events:{
                            click: function(event) {
                               if(activeIndex == 2)
                                {
                                    window.location = "<?php echo base_url() ?>depot/apms_depot_harian/<?php echo $id_depot?>/"+nomor_bulan[this.x]+"/<?php echo $tahun?>";
                                
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
                    }
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
                    data: laporan_pembayaran
                }]
        });
    });
    
    function filter(title,index){
        activeIndex = index;
        kpi.setTitle({text: title+' Depot <?php echo $nama_depot?>'});
        switch (index) {
            case 1:
                kpi.series[0].setData(pembayaran);break;
            case 2:
                kpi.series[0].setData(penyaluran);break;
            case 3:
                kpi.series[0].setData(kehandalan);break;
            case 4:
                kpi.series[0].setData(realisasi_penyaluran);break;
            case 5:
                kpi.series[0].setData(progres_pembayaran);break;
            case 6:
                kpi.series[0].setData(transportir);break;
            case 7:
                kpi.series[0].setData(customer_apms);break;
            case 8:
                kpi.series[0].setData(pelanggaran);break;
            case 9:
                kpi.series[0].setData(accidents);break;
        }
    }
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
                <section class="panel">
                        <header class="panel-heading">
                            Grafik KPI APMS Bulanan Depot <?php echo $nama_depot?>
                        </header>
                        <div class="panel-body" >
                            <?php $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                echo form_open("depot/changeGrafikApmsBulan/",$attr);
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

                                    <li><a style="cursor: pointer" onclick="filter('Laporan progres pembayaran ongkos angkut',1)">Laporan progres pembayaran ongkos angkut</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Laporan realisasi penyaluran VS LO Planing',2)">Laporan realisasi penyaluran VS LO Planing</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Laporan Kehandalan & Ketersediaan Alat angkut',3)">Laporan Kehandalan & Ketersediaan Alat angkut</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Realisasi penyaluran VS Alokasi',4)">Realisasi penyaluran VS Alokasi</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Progress Pembayaran Ongkos Angkut Transportir',5)">Progress Pembayaran Ongkos Angkut Transportir</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Customer Transportir APMS',6)">Customer Transportir APMS</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Customer  APMS',7)">Customer  APMS</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Pelanggaran atas Integritas Kinerja',8)">Pelanggaran atas Integritas Kinerja</a></li>
                                    <li><a style="cursor: pointer" onclick="filter('Number of Accidents',9)"> Number of Accidents</a></li>

                                </ul>
                            </div>
                        <br/><br/><br/>
                            <div id="grafik2"></div>

                                    &nbsp;&nbsp;<span class='btn btn-warning'> <i class='icon-warning-sign'></i></span>  <b> = Hasil dibawah target</b>
                        </div>
            </section>
                <section class="panel">
                        <header class="panel-heading">
                            Key Performance Indicator (KPI) Depot <?php echo $nama_depot?> (Tahun <?php echo $tahun?>)
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
                                        <th style="white-space: nowrap">Score</th>
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
                                            <td><?php echo $detail_kpi[$index]->JENIS_KPI_APMS?></td>
                                            <td><?php echo $detail_kpi[$index]->NORMAL_SCORE?></td>
                                        </tr>
                                        <?php
                                            $index++;
                                            $temp = $index;
                                            for($i = $index ; $i < ($temp + 8);$i++)
                                            {
                                                ?>
                                                <tr >
                                                    <td><?php echo $detail_kpi[$i]->JENIS_KPI_APMS?></td>
                                                    <td><?php echo $detail_kpi[$index]->NORMAL_SCORE?></td>
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