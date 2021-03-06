<script type="text/javascript">
    var arrBulan = new Array();
    var arrDepot = new Array();
    var series = new Array();
    var data = new Array();
    <?php
        foreach($bulan as $b)
        {
        ?>
            arrBulan.push("<?php echo $b?>");
       <?php     
        }
        foreach($ms2 as $m)
         {
             ?>
                 data.push(<?php echo $m->nilai?>);
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
                text: 'Rencana pengiriman vs realisasi (MS2 Compliance)',
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
            series: [{
                    name:'Nilai',
                    data:data
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
                KPI OPERASIONAL
                <a href="<?php echo base_url()?>presentasi"><button style="float: right" class="btn-danger"><i class="icon-remove"></i></button></a>
            </header>
            <div class="panel-body">
                <div id="grafik" style="height:300px;"></div>
                <br/>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                           <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach($ms2 as $m)
                                {
                                ?>
                                 <tr>
                                    <td style="display: none;"></td>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $bulan[$i - 1];?></td>
                                    <td><?php echo $m->nilai?></td>

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