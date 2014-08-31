<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Pencapaian Premium'
            },
            subtitle: {
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
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
            legend:{
                enabled:false
            },
            series: [{
                    type: 'spline',
                    data: [99,98,97,96,95,99,94,98,97,95,98,101,93,94,98,99,102,95,96,97,98,94,95,101,99,98,97,93,94,99,98]
                }]
        });
    });
   

</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Rencana Volume vs Realisasi Harian Depot 1
                    </header>
                    <div class="panel-body" >
                        <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm">

                            <div class="form-group">
                                <div class="col-lg-2">
                                    <select class="form-control m-bot2"  id="depot" >

                                        <option value="">Depot 1</option>
                                        <option value="">Depot 2</option>
                                        <option value="">Depot 3</option>
                                        <option value="">Depot 4</option>
                                        <option value="">Depot 5</option>

                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
                        <br/><br/>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Filter Grafik<i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left">

                                        <li><a style="cursor: pointer" onclick="changeAmtTitle('Premium')">Premium</a></li>
                                        <li><a style="cursor: pointer" onclick="changeAmtTitle('Pertamax')">Pertamax</a></li>
                                        <li><a style="cursor: pointer" onclick="changeAmtTitle('Solar')">Solar</a></li>
                                        <li><a style="cursor: pointer" onclick="changeAmtTitle('Bio Solar')">Bio Solar</a></li>


                                    </ul>
                                </div>
                                <div id="grafik"></div>
                            </div>
                            <div class="col-lg-5">

                                <div id="grafikKpi"></div>
                            </div>
                        </div>
                </section>

                <section class="panel">
                    <div class="panel-body" >
                        <div id="filePreview">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Rencana Volume vs Realisasi Harian Depot 1 Bulan Januari 2014
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <center>
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="display: none;"></th>
                                                            <th rowspan="2">No</th>
                                                            <th rowspan="2">Bulan</th>
                                                            <th colspan="2">Premium</th>
                                                            <th colspan="2">Bio Solar</th>
                                                            <th colspan="2">Pertamax</th>
                                                            <th colspan="2">Solar</th>
                                                        </tr>
                                                        <tr>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>1 Januari 2014</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8899281</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>2 Januari 2014</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8899281</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>3 Januari 2014</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8099281</td>
                                                            <td>8899281</td>
                                                            <td>8899281</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
                <!-- page end-->

<script type="text/javascript">
    $(function () {

        $('#grafikKpi').highcharts({

            chart: {
                polar: true,
                type: 'line'
            },

            title: {
                text: 'Nilai KPI DEPOT 1',
                x: -80
            },

            pane: {
                size: '80%'
            },

            xAxis: {
                categories: ['MS2','Volume','Laporan tagihan Ongkos','Customer Satisfaction','Keluhan & Komplain',
                    'Penyelesaian keluhan','Pekerja Mengikuti Pelatihan','Number Of Incidents',
                    'Penyelesaian Incidents','Number Of Accidents'],
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
                    data: [101.57,101.59,120,97.37,120,100,140,80,120],
                    pointPlacement: 'on'
                }]

        });
    });
</script>