<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Rencana Volume vs Realisasi Harian Depot 1 '
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
            series: [{
                    type: 'spline',
                    name: 'Pencapaian PREMIUM',
                    data: [99,98,97,96,95,89,90,98,97,95,98,101,93,94,98,99,102,89,91,89,92,94,95,101,99,98,97,93,94]
                }, {
                    type: 'spline',
                    name: 'Pencapaian BIOSOLAR',
                    data: [93,94,95,95,98,97,99,91,89,92,94,95,101,99,98,97,89,91,89,92,94,95,101,99,98,97,98,101,97]
                }, {
                    type: 'spline',
                    name: 'Pencapaian PERTAMAX',
                    data: [95,89,90,98,97,95,98,101,93,94,95,95,98,97,99,91,89,92,94,95,101,99,98,97,96,95,89,90,98]
                }, {
                    type: 'spline',
                    name: 'Pencapaian SOLAR',
                    data: [98,99,102,89,91,89,92,94,95,101,99,98,97,96,95,89,90,98,97,95,98,101,93,94,95,95,98,97,99]
                }]
        });
    });
   

</script>


<div id="grafik"></div>
</div>
</section>

<section class="panel">
    <div class="panel-body" >
        <div id="filePreview">
            <section class="panel">
                <header class="panel-heading">
                    Tabel MS2 Complience Bulan Januari 2014
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