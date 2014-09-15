<script type="text/javascript">
    var activeIndex = 1;
    //10 indikator KPI (nilai performansi)
    var laporan_pembayaran = new Array(110,100,110,120);
    var pembayaran = new Array(110,100,110,120);
    var penyaluran = new Array(95,100,90,100);
    var kehandalan = new Array(85,95,90,100);
    var realisasi_penyaluran = new Array(93,95,100,120);
    var progres_pembayaran = new Array(120,110,120,115);
    var transportir = new Array(120,110,100,120);
    var customer_apms = new Array(90,100,110,100);
    var pelanggaran = new Array(100,90,95,100);
    var accidents = new Array(100,90,100,100);
    var bulan = new Array("Januari","Februari","Maret","April");
    var nomor_bulan = new Array(1,2,3,4);
//    realisasi_pengiriman = pengiriman;

    var kpi;
    $(function() {
         kpi = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik2'
            },
            title: {
                text: 'Laporan progres pembayaran ongkos angkut <?php echo $kpi_bulan[0]->nama_depot?>'
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
                                    window.location = "<?php echo base_url() ?>depot/grafik_hari/"+title+"/<?php echo $id_depot?>/"+nomor_bulan[this.x]+"/<?php echo $tahun?>";
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
        kpi.setTitle({text: title+' Depot 1'});
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
                            Grafik KPI APMS Bulanan Depot <?php echo $kpi_bulan[0]->nama_depot?>
                        </header>
                        <div class="panel-body" >
                            <?php $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                echo form_open("depot/changeGrafikBulan/",$attr);
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
                                        <th style="white-space: nowrap">Score</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="9" style="display:none;"></td>
                                    <td rowspan="9">1</td>
                                    <td rowspan="9">Januari</td>
                                    <td rowspan="9">103 %</td>
                                    <td>Laporan progres pembayaran ongkos angkut</td>
                                    <td>102 %</td>
                                </tr>
                                <tr>
                                    <td>Laporan realisasi penyaluran VS LO Planing</td>
                                    <td>101 %</td>
                                </tr>
                                <tr>
                                    <td>Laporan Kehandalan & Ketersediaan Alat angkut</td>
                                    <td>100 %</td>
                                </tr>
                                <tr>
                                    <td>Realisasi penyaluran VS Alokasi</td>
                                    <td>102 %</td>
                                </tr>
                                <tr>
                                    <td>Progress Pembayaran Ongkos Angkut Transportir</td>
                                    <td>102 %</td>
                                </tr>
                                <tr>
                                    <td>Customer Transportir APMS</td>
                                    <td>100 %</td>
                                </tr>
                                <tr>
                                    <td>Customer  APMS</td>
                                    <td>97 %</td>
                                </tr>
                                <tr>
                                    <td>Pelanggaran atas Integritas Kinerja</td>
                                    <td>101 %</td>
                                </tr>
                                <tr>
                                    <td>Number of Accidents</td>
                                    <td>100 %</td>
                                </tr>
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