<script type="text/javascript">
    var base,stretch,realisasi;
    realisasi = 0;
    base = 0;
    stretch = 0;
    var data = new Array();
    <?php
        foreach($data as $dt)
        {
            if ($triwulan == 1) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW1_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW1_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW1_BULAN3 ?>);
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW1_BULAN1 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW1_BULAN2 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW1_BULAN3 ?>;
                                    base = <?php echo $dt->TW1_BASE?>;
                                    stretch = <?php echo $dt->TW1_STRETCH?>;
                <?php
            } else if ($triwulan == 2) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW2_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW2_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW2_BULAN3 ?>);
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW2_BULAN1 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW2_BULAN2 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW2_BULAN3 ?>;
                                    base = <?php echo $dt->TW2_BASE?>;
                                    stretch = <?php echo $dt->TW2_STRETCH?>;
                                                                        
                <?php
            } else if ($triwulan == 3) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW3_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW3_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW3_BULAN3 ?>);
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW3_BULAN1 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW3_BULAN2 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW3_BULAN3 ?>;
                                    base = <?php echo $dt->TW3_BASE?>;
                                    stretch = <?php echo $dt->TW3_STRETCH?>;
                                                                        
                <?php
            } else if ($triwulan == 4) {
                ?>
                                    data.push(<?php echo $dt->REALISASI_TW4_BULAN1 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW4_BULAN2 ?>);
                                    data.push(<?php echo $dt->REALISASI_TW4_BULAN3 ?>);
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW4_BULAN1 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW4_BULAN2 ?>;
                                    realisasi = realisasi + <?php echo $dt->REALISASI_TW4_BULAN3 ?>;
                                    base = <?php echo $dt->TW4_BASE?>;
                                    stretch = <?php echo $dt->TW4_STRETCH?>;
                                                                        
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
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cost Per Liter'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            xAxis: {
                categories: [
                    'Base',
                    'Fuel Ritel Realisasi',
                    'Stretch'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
               
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
                    name: 'Cost Per Liter',
                    data: [base,(realisasi/3),stretch]

                }]
        });
    });
    $(function () {
        $('#grafik2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cost Liter'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            xAxis: {
                categories: [
                    '<?php echo $nama_depot?>'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
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
                name: '<?php echo $bulan[0]?>',
                data: [data[0]],
                color:'#FF002B'

            }, {
                name: '<?php echo $bulan[1]?>',
                data: [data[0]],
                color:'#2C88D4'

            }, {
                name: '<?php echo $bulan[2]?>',
                data: [data[0]],
                color:'#23C906'

            }]
        });
    });
</script>
<section id="main-content" >
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                KPI INTERNAL
                <a href="<?php echo base_url()?>presentasi"><button style="float: right" class="btn-danger"><i class="icon-remove"></i></button></a>
            </header>
            <div class="panel-body">
                <div class="row">
                   
                    <div class="col-lg-4">
                                <div id="grafik" style="height:300px;"></div>
                    </div>
                    <div class="col-lg-8">
                                <div id="grafik2" style="height:300px;"></div>
                    </div>
                </div>
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
                                    <th>Cost per Liter</th>
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