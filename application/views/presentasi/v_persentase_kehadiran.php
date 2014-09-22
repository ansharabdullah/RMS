<script type="text/javascript">
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'line',
                zoomType:'xy'
            },
            title: {
                text: 'Persentase Kehadiran',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun 2014',
                x: -20
            },
            xAxis: {
                categories: ['Januari','Februari','Maret']
            },
            yAxis: {
                title: {
                    text: ''
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: '%'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                    name: '<?php echo $nama_depot?>',
                    data: [96,83,89]
               
                },   {
                    name: 'target',
                    data: [100,100,100],
                    color: 'red'
                }]
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                KPI INTERNAL
                <a href="<?php echo base_url()?>presentasi"><button style="float: right" class="btn-danger"><i class="icon-remove"></i></button></a>
            </header>
            <div class="panel-body">
                <div id="grafik"></div>
                <br/>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Persentase Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>96 %</td>
                                </tr> 
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>83 %</td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>89 %</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
        <?php echo $paging ?>
    </section>
</section>