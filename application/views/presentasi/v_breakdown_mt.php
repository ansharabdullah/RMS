<script type="text/javascript">
      var data = new Array();
      var base = 0;
    <?php
        foreach($data as $dt)
        {
            if ($triwulan == 1) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW1_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW1_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW1_BULAN3 ?>);
                                     base = <?php echo $dt->TW1_BASE?>;
                <?php
            } else if ($triwulan == 2) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW2_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW2_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW2_BULAN3 ?>);
                                     base = <?php echo $dt->TW2_BASE?>;
                                                                        
                <?php
            } else if ($triwulan == 3) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW3_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW3_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW3_BULAN3 ?>);
                                     base = <?php echo $dt->TW3_BASE?>;
                                                                        
                <?php
            } else if ($triwulan == 4) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW4_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW4_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW4_BULAN3 ?>);
                                     base = <?php echo $dt->TW4_BASE?>;
                                                                        
                <?php
            }
        }
        if(sizeof($data) == 0)
        {
            ?>
                data.push(0,0,0);
            <?php
            
        }
    ?>
    $(function () {
        $('#grafik').highcharts({
            chart:{
                
                type:'line',
                zoomType:'xy'
            },
            title: {
                text: 'Breakdown Occurance MT',
                x: -20 //center
            },
             subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            xAxis: {
                categories: [
                    '<?php echo $bulan[0]?>',
                    '<?php echo $bulan[1]?>',
                    '<?php echo $bulan[2]?>'
                ]
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
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                    name: '<?php echo $nama_depot?>',
                    data: [data]
                },{
                    name: 'Target',
                    data: [base,base,base],
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
                <div id="grafik" style="height:300px;"></div>
                <br/>
                <?php
                    $data_ = array();
                    foreach($data as $d)
                    {
                         if ($triwulan == 1) {
                             array_push($data_,$dt->REALISASI_TW1_BULAN1 );
                             array_push($data_,$dt->REALISASI_TW1_BULAN2 );
                             array_push($data_,$dt->REALISASI_TW1_BULAN3 );
                        } else if ($triwulan == 2) {
                             array_push($data_,$dt->REALISASI_TW2_BULAN1 );
                             array_push($data_,$dt->REALISASI_TW2_BULAN2 );
                             array_push($data_,$dt->REALISASI_TW2_BULAN3 );
                        } else if ($triwulan == 3) {
                             array_push($data_,$dt->REALISASI_TW3_BULAN1 );
                             array_push($data_,$dt->REALISASI_TW3_BULAN2 );
                             array_push($data_,$dt->REALISASI_TW3_BULAN3 );
                        } else if ($triwulan == 4) {
                             array_push($data_,$dt->REALISASI_TW4_BULAN1 );
                             array_push($data_,$dt->REALISASI_TW4_BULAN2 );
                             array_push($data_,$dt->REALISASI_TW4_BULAN3 );
                        }
                    }
                    if(sizeof($data) == 0)
                    {
                             array_push($data_,0);
                             array_push($data_,0);
                             array_push($data_,0);
                    }
                ?>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Breakdown Occurance MT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>1</td>
                                    <td><?php echo $bulan[0]?></td>
                                    <td><?php echo $data_[0]?></td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>2</td>
                                    <td><?php echo $bulan[1]?></td>
                                    <td><?php echo $data_[1]?></td>
                                </tr>
                                <tr>
                                    <td style="display: none;"></td>
                                    <td>3</td>
                                    <td><?php echo $bulan[2]?></td>
                                    <td><?php echo $data_[2]?></td>
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