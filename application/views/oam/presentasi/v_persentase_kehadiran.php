<script type="text/javascript">
    var series = new Array();
     <?php
        foreach($data as $d)
        {
    ?>   
            
            series.push({
                name:'<?php echo $d[0]?>',
                data:[<?php echo $d[1][0]?>,<?php echo $d[1][1]?>,<?php echo $d[1][1]?>]
            });
    <?php  
        }
    ?>
        series.push({
            name: 'target',
            data: [100,100,100],
            color: 'red'
        });
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
                text: 'Tahun <?php echo $tahun?>',
                x: -20
            },
            xAxis: {
                categories: ['<?php echo $bulan[0]?>','<?php echo $bulan[1]?>','<?php echo $bulan[2]?>']
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
            series: series
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
                <div id="grafik" style="height:300px;"></div>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Wilayah</th>
                                    <th><?php echo $bulan[0]?></th>
                                    <th><?php echo $bulan[1]?></th>
                                    <th><?php echo $bulan[2]?></th>
                                </tr>
                            </thead>
                            <?php
                            $i = 0;
                                foreach($data as $d)
                                {
                            ?>   
                                    <tr>
                                        <td style="display: none;"></td>
                                        <td><?php echo ($i + 1)?></td>
                                        <td><?php echo $d[0] ?></td>
                                        <td><?php echo $d[1][0] ?></td>
                                        <td><?php echo $d[1][1] ?></td>
                                        <td><?php echo $d[1][2] ?></td>
                                    </tr>
                            <?php  
                                    $i++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </center>
                </div>
        <?php echo $paging ?>
            </div>
        </section>
    </section>
</section>