<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType:'xy'
            },
            title: {
                text: 'Key Performance Indicator (KPI) Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                column: {
                    groupPadding:.05
                }
            },
            xAxis: [{
                    categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus'],
                    gridLineWidth: 0
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Performansi',
                        style: {
                            color: '#89A54E'
                        }
                    }
                }],


            tooltip: {
                formatter: function () {
                    var s;
                    s = '' + this.series.name + ': ' + this.y + ' %';
                    return s;
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    type: 'spline',
                    name: 'Rencana pengiriman vs realisasi (MS2 Compliance',
                    data: [92,99,101,98,95,92,89,90]
                }, {
                    type: 'spline',
                    name: 'Rencana volume angkutan vs realisasi',
                    data: [98,89,92,97,100,98,99,96]
                }, {
                    type: 'spline',
                    name: 'Laporan tagihan ongkos angkut ',
                    data: [92,98,94,98,98,95,92,94]
                }, {
                    type: 'spline',
                    name: 'Customer  Satisfaction (Lembaga Penyalur)',
                    data: [98,98,95,92,94,89,92,95]
                }, {
                    type: 'spline',
                    name: 'Jumlah temuan, keluhan atau komplain terkait pengelolaan MT',
                    data: [95,92,94,89,92,95,92,99]
                },{
                    type: 'spline',
                    name: 'Tindak lanjut penyelesaian keluhan atau komplain yang diterima',
                    data: [94,89,92,95,97,98,94,98]
                }, {
                    type: 'spline',
                    name: 'Jumlah pekerja pengelola MT  yang mengikuti pelatihan',
                    data: [94,98,98,95,92,96,94,97]
                }, {
                    type: 'spline',
                    name: 'Number of Incidents',
                    data: [93,89,94,96,92,98,99,94]
                }, {
                    type: 'spline',
                    name: 'Waktu penyelesaian Incidents',
                    data: [93,92,96,99,91,96,98,94]
                }, {
                    type: 'spline',
                    name: ' Number of Accident',
                    data: [94,89,92,95,92,99,92,98]
                
                }]
        });
    });
    $(function() {
        $('#grafik2').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Rencana Volume vs realisasi  Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/grafik_hari/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus']
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
                shared: true
            },
            
            series: [{
                    name: 'Pencapaian PREMIUM',
                    type: 'column',
                    data: [92,99,101,98,95,92,89,90]

                }, {
                    name: 'Pencapaian BIOSOLAR',
                    type: 'column',
                    data: [98,95,92,89,90,92,99,101]

                },{
                    name: 'Pencapaian PERTAMAX',
                    type: 'column',
                    data: [95,92,89,90,92,99,101,98]

                }, {
                    name: 'Pencapaian SOLAR',
                    type: 'column',
                    data: [101,98,95,92,92,99,89,90]

                
                }]
        });
    });

</script>


<div id="grafik2"></div>
<br>
<br>
<br>
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
                            <td>Januari</td>
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
                            <td>Februari</td>
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
                            <td>Maret</td>
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

