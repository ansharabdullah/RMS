<script type="text/javascript">
$(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    'Depot 1',
                    'Depot 2',
                    'Depot 3',
                    'Depot 4',
                    'Depot 5',
                    'Depot 6',
                    'Depot 7',
                    'Depot 8',
                    'Depot 9',
                    'Depot 10'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Rencana pengiriman vs realisasi (MS2 Compliance)*',
                data: [99.54, 99.2, 100.02, 90.98, 103.9, 97.32, 100.00, 98.42, 99.1, 100.21]
    
            }, {
                name: 'Rencana volume angkutan vs realisasi',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5]
    
            }, {
                name: 'Laporan tagihan ongkos angkut (dokumen lengkap dan benar)',
                data: [1, 2, 1, 3, 2, 1, 1, 1, 1, 2]
    
            }, {
                name: 'Customer  Satisfaction (Lembaga Penyalur)',
                data: [3.7, 3.8, 3.7, 3.6, 3.6, 3.9, 3.4, 3.7, 3.8, 3.8]
    
            },{
                name: 'Jumlah temuan, keluhan atau komplain terkait pengelolaan MT',
                data: [0, 0, 1, 2, 1, 0, 0, 0, 2, 3]
    
            }, {
                name: 'Tindak lanjut penyelesaian keluhan atau komplain yang diterima',
                data: [100, 98, 97, 95, 98, 100, 98, 96, 90, 95]
    
            }, {
                name: 'Jumlah pekerja pengelola MT  yang mengikuti pelatihan',
                data: [7, 6, 6, 4, 7, 3, 3, 5, 6, 7]
    
            }, {
                name: 'Number of Incidents',
                data: [2, 1, 2, 3, 2, 1, 0, 0, 1, 2]
    
            }, {
                name: 'Waktu penyelesaian Incidents',
                data: [7, 5, 6, 7, 7, 7, 6, 7, 7, 7]
    
            }, {
                name: 'Number of Accident',
                data: [0, 0, 1, 0, 0, 1, 1, 0, 0, 0]
    
            }]
        });
    });
    

		</script>


<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Grafik
            </header>
            <div class="panel-body">
                <div id="grafik" style="height:1000px;">
                    
                </div>
            </div>
        </section>
    </section>
</section>
