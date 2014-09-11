<script type="text/javascript">
    var arrBulan = new Array();
    var arrDepot = new Array();
    var series = new Array();
    var data;
    <?php
        foreach($bulan as $b)
        {
        ?>
            arrBulan.push("<?php echo $b?>");
       <?php     
        }
        foreach($depot as $d)
        {
            ?>
                data = new Array();
            <?php
             foreach($kpi as $k)
             {
                 if($k->ID_DEPOT == $d->ID_DEPOT)
                 {
                     ?>
                         data.push(<?php echo $k->nilai?>);
                     <?php
                     
                 }
             }
         ?>
             series.push({
                 name:'<?php echo $d->NAMA_DEPOT?>',
                 data: data
             });
             arrDepot.push("<?php echo $d->NAMA_DEPOT?>");
        <?php   
            
        }
    ?>
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'spline',
                zoomType:'xy'
            },
            title: {
                text: 'KPI Operasional',
                x: -20 //center
            },
            subtitle: {
                text: 'Tahun <?php echo date('Y')?>',
                x: -20
            },
            xAxis: {
                categories: arrBulan
            },
            yAxis: {
                title: {
                    text: 'nilai'
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
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Wilayah</th>
                                    <th><?php echo $bulan[0]?></th>
                                    <th><?php echo $bulan[1]?></th>
                                    <th><?php echo $bulan[2]?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach($depot as $d)
                                    {
                                        ?>
                                         <tr>
                                            <td style="display: none;"></td>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $d->NAMA_DEPOT?></td>
                                            <?php
                                                foreach($kpi as $k)
                                                {
                                                    if($k->ID_DEPOT == $d->ID_DEPOT)
                                                    {
                                                        ?>
                                                            <td><?php echo $k->nilai?></td>
                                                        <?php
                                                        
                                                    }
                                                    
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
        <?php echo $paging?>
    </section>
</section>