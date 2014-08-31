<script type="text/javascript">
    var activeIndex = 1;
    //10 indikator KPI (nilai performansi)
    var pengiriman = new Array(101.57,100.8,101.57,103.2,103.1,98.9,99.3,100.29);
    var volume = new Array(101.59,103.2,103.1,98.9,99.3,100.29,100.8,101.57);
    var tagihan = new Array(120,101.4,101.57,100.8,101.57,103.2,101.59,98.9);
    var customer_satisfaction = new Array(100.8,101.57,103.2,103.1,98.9,99.3,101.4,103.2);
    var keluhan = new Array(103.1,98.9,99.3,100.29,100.8,101.57,103.2,101.59);
    var tindak_lanjut = new Array(100.8,101.57,103.2,103.2,103.1,98.9,99.3,100.29);
    var pelatihan = new Array(101.4,101.57,100.8,101.57,103.2,101.59,103.2,101.59);
    var incidents = new Array(100.8,101.57,103.2,103.1,98.9,99.3,100.29,101.57);
    var penyelesaian_incidents = new Array(101.4,101.57,100.8,101.57,103.2,101.59,103.2,101.59);
    var accidents = new Array(98.9,99.3,100.29,100.8,101.57,101.57,100.8,101.57);
    var realisasi_pengiriman = new Array(101.57,100.8,101.57,103.2,103.1,98.9,99.3,100.29);
    var bulan = new Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus');
    var kpi;
    $(function() {
         kpi = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik2'
            },
            title: {
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance) Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        useHTML: true,
                        formatter: function() {
                            if(this.y < 100){
                                return "<span class='btn btn-danger' > <i class='icon-exclamation-sign'></i></span>"; 
                            }
                        },
                        y: 0
                    }
                },
                series: {
                    events: {
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
                                window.location = "<?php echo base_url() ?>depot/grafik_hari/"+title+"/1/1/";
                            }
                        }
                    }
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
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KPI Bulanan Depot 1
                    </header>
                    <div class="panel-body" >
                        <?php $attr = array("class"=>"cmxform form-horizontal tasi-form");
                            echo form_open("depot/changeGrafikBulan/",$attr);
                        ?>

                            <div class="form-group">
                                <div class="col-lg-2">
                                    <select class="form-control m-bot2"  id="depot" name="depot">

                                        <option value="">Depot 1</option>
                                        <option value="">Depot 2</option>
                                        <option value="">Depot 3</option>
                                        <option value="">Depot 4</option>
                                        <option value="">Depot 5</option>
                                       
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="tahun" data-mask="9999" name="tahun" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
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
                        <div id="grafik2"></div>
                        
                                &nbsp;&nbsp;<span class='btn btn-danger' > <i class='icon-exclamation-sign'></i></span>  <b> = Hasil dibawah target</a>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <header class="panel-heading">
                            Key Performance Indicator (KPI) Depot 1 (Tahun 2014)
                        </header>
                        <div class="adv-table editable-table " style="overflow-x: scroll;">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th style="white-space: nowrap">Rencana pengiriman vs realisasi (MS2 Compliance)</th>
                                        <th style="white-space: nowrap">Rencana volume angkutan vs realisasi</th>
                                        <th style="white-space: nowrap">Laporan tagihan ongkos angkut </th>
                                        <th style="white-space: nowrap">Customer  Satisfaction (Lembaga Penyalur)</th>
                                        <th style="white-space: nowrap">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</th>
                                        <th style="white-space: nowrap">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</th>
                                        <th style="white-space: nowrap">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</th>
                                        <th style="white-space: nowrap">Number of Incidents</th>
                                        <th style="white-space: nowrap">Waktu penyelesaian Incidents</th>
                                        <th style="white-space: nowrap">Number of Accident</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    for ($i = 0; $i < 8; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $bulan[$i] ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>            
        </div>        
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
</script>

