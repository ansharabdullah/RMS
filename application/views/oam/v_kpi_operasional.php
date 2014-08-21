<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'bar'
            },
            title: {
                text: 'KPI Operasional',
                x: -20 //center
            },
            subtitle: {
                text: 'Kategori Pertahun',
                x: -20
            }, 
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>kpi/operasional_bulan/2014/";
                        }
                    }
                }
            },
            xAxis: {
                categories: ['Tahun 2014']
            },
            yAxis: {
                title: {
                    text: 'rata - rata'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: ''
            },
            series: [{
                    name: 'Depot 1',
                    data: [106],
                    color:'#FF002B'
                }, {
                    name: 'Depot 2',
                    data: [109],
                    color:'#2C88D4'
                }, {
                    name: 'Depot 3',
                    data: [103],
                    color:'#23C906'
                }, {
                    name: 'Depot 4',
                    data: [109]
                }, {
                    name: 'Depot 5',
                    data: [103],
                    color:'#F5A905'
               
                }]
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                KPI OPERASIONAL
            </header>
            <div class="panel-body">
                <div id="grafik"></div>
                <br/><br/>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Depot</th>
                                    <th>Tahun 2014</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Depot 1</td>
                                    <td>106</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Depot 2</td>
                                    <td>109</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Depot 3</td>
                                    <td>103</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Depot 4</td>
                                    <td>109</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Depot 5</td>
                                    <td>103</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
    </section>
</section>