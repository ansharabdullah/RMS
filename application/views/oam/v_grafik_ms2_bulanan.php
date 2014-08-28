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
                    type: 'column',
                    name: 'Rencana pengiriman vs realisasi (MS2 Compliance',
                    data: [92,99,101,98,95,92,89,90]
                }, {
                    type: 'column',
                    name: 'Rencana volume angkutan vs realisasi',
                    data: [98,89,92,97,100,98,99,96]
                }, {
                    type: 'column',
                    name: 'Laporan tagihan ongkos angkut ',
                    data: [92,98,94,98,98,95,92,94]
                }, {
                    type: 'column',
                    name: 'Customer  Satisfaction (Lembaga Penyalur)',
                    data: [98,98,95,92,94,89,92,95]
                }, {
                    type: 'column',
                    name: 'Jumlah temuan, keluhan atau komplain terkait pengelolaan MT',
                    data: [95,92,94,89,92,95,92,99]
                },{
                    type: 'column',
                    name: 'Tindak lanjut penyelesaian keluhan atau komplain yang diterima',
                    data: [94,89,92,95,97,98,94,98]
                }, {
                    type: 'column',
                    name: 'Jumlah pekerja pengelola MT  yang mengikuti pelatihan',
                    data: [94,98,98,95,92,96,94,97]
                }, {
                    type: 'column',
                    name: 'Number of Incidents',
                    data: [93,89,94,96,92,98,99,94]
                }, {
                    type: 'column',
                    name: 'Waktu penyelesaian Incidents',
                    data: [93,92,96,99,91,96,98,94]
                }, {
                    type: 'column',
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
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance) Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                        events: {
                            click: function(event) {
                                window.location = "<?php echo base_url() ?>depot/grafik_hari/1";
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
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'Realisasi',
                    type: 'column',
                    data: [92,99,101,98,95,92,89,90]

                }, {
                    name: 'Target',
                    type: 'line',
                    data: [91,98,95,96,97,95,85,89]
                }]
        });
    });

</script>


                        <div id="grafik2"></div>

