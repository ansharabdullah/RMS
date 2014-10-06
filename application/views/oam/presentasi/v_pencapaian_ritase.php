<script type="text/javascript">
    var data1 = new Array();
    var data2 = new Array();
    var data3 = new Array();
    var depot = new Array();
<?php
foreach ($depot as $d) {
    $status = 0;
    ?>
        depot.push("<?php echo $d->NAMA_DEPOT?>");
    <?php
    foreach ($data as $dt) {
        if ($dt->ID_DEPOT == $d->ID_DEPOT) {
            if ($triwulan == 1) {
                ?>
                                    data1.push(<?php echo $dt->REALISASI_TW1_BULAN1 ?>);
                                    data2.push(<?php echo $dt->REALISASI_TW1_BULAN2 ?>);
                                    data3.push(<?php echo $dt->REALISASI_TW1_BULAN3 ?>);
                <?php
            } else if ($triwulan == 2) {
                ?>
                                    data1.push(<?php echo $dt->REALISASI_TW2_BULAN1 ?>);
                                    data2.push(<?php echo $dt->REALISASI_TW2_BULAN2 ?>);
                                    data3.push(<?php echo $dt->REALISASI_TW2_BULAN3 ?>);
                                                                        
                <?php
            } else if ($triwulan == 3) {
                ?>
                                    data1.push(<?php echo $dt->REALISASI_TW3_BULAN1 ?>);
                                    data2.push(<?php echo $dt->REALISASI_TW3_BULAN2 ?>);
                                    data3.push(<?php echo $dt->REALISASI_TW3_BULAN3 ?>);
                                                                        
                <?php
            } else if ($triwulan == 4) {
                ?>
                                    data1.push(<?php echo $dt->REALISASI_TW4_BULAN1 ?>);
                                    data2.push(<?php echo $dt->REALISASI_TW4_BULAN2 ?>);
                                    data3.push(<?php echo $dt->REALISASI_TW4_BULAN3 ?>);
                                                                        
                <?php
            }
            $status = 1;
            break;
        }
    }
    if ($status == 0) {
        ?>
                    data1.push(0);
                    data2.push(0);
                    data3.push(0);
        <?php
    }
    
    
}
?>
    $(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pencapaian Ritase'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun?>'
            },
            xAxis: {
                categories: depot
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rit'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: 'Rit'
            },
            plotOptions: {
                column: {
                    borderWidth: 0
                }
            },
            series: [{
                name: '<?php echo $bulan[0]?>',
                data: data1,
                color:'#FF002B'

            }, {
                name: '<?php echo $bulan[1]?>',
                data: data2,
                color:'#2C88D4'

            }, {
                name: '<?php echo $bulan[2]?>',
                data: data3,
                color:'#23C906'

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
                <a href="<?php echo base_url() ?>presentasi"><button style="float: right" class="btn-danger"><i class="icon-remove"></i></button></a>
            </header>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div id="grafik" style="height:300px;"></div>
                            </div>
                        </section>
                    </div>
                </div>

                <?php
                $kpi = array();
                $nama_depot = array();
                foreach ($depot as $d) {
                    array_push($nama_depot, $d->NAMA_DEPOT);
                    $status = 0;
                    $depot = array();
                    foreach ($data as $dt) {
                        if ($dt->ID_DEPOT == $d->ID_DEPOT) {
                            if ($triwulan == 1) {
                                array_push($depot, $dt->REALISASI_TW1_BULAN1);
                                array_push($depot, $dt->REALISASI_TW1_BULAN2);
                                array_push($depot, $dt->REALISASI_TW1_BULAN3);
                            } else if ($triwulan == 2) {
                                array_push($depot, $dt->REALISASI_TW2_BULAN1);
                                array_push($depot, $dt->REALISASI_TW2_BULAN2);
                                array_push($depot, $dt->REALISASI_TW2_BULAN3);
                            } else if ($triwulan == 3) {
                                array_push($depot, $dt->REALISASI_TW3_BULAN1);
                                array_push($depot, $dt->REALISASI_TW3_BULAN2);
                                array_push($depot, $dt->REALISASI_TW3_BULAN3);
                            } else if ($triwulan == 4) {
                                array_push($depot, $dt->REALISASI_TW4_BULAN1);
                                array_push($depot, $dt->REALISASI_TW4_BULAN2);
                                array_push($depot, $dt->REALISASI_TW4_BULAN3);
                            }
                            $status = 1;
                            break;
                        }
                    }
                    if ($status == 0) {

                        array_push($depot, 0);
                        array_push($depot, 0);
                        array_push($depot, 0);
                    }
                    array_push($kpi,$depot);
                }
                ?>

                <div class="adv-table editable-table ">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <?php
                                        foreach($nama_depot as $d)
                                        {
                                            echo "<th>".$d."</th>";
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    foreach($bulan as $b)
                                    {
                                        ?>
                                        <tr>
                                            <td style="display: none;"></td>
                                            <td><?php echo ($no + 1) ?></td>
                                            <td><?php echo $b ?></td>
                                            <?php
                                                foreach($kpi as $k)
                                                {
                                                    echo "<td>".$k[$no]."</td>";
                                                    
                                                }
                                            ?>
                                        </tr> 
                                        <?php
                                        $no++;
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
