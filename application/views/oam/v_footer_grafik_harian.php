

                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik2"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik3"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik4"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik5"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body" >
                        <div id="filePreview">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel MS2 Complience Bulan Januari 2014
                                </header>
                                <div class="panel-body">
                                    <div class="adv-table editable-table" style="overflow-y: scroll">

                                        <div class="space15"></div>
                                        <table class="table table-bordered table-hover" id="editable-sample">   
                                            <thead>
                                                <tr>
                                                    <th style="display:none;"></th>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Tanggal</th>
                                                    <th colspan="3">Sesuai Dengan MS2</th>
                                                    <th colspan="3">Cepat (Sebelum MS2)</th>
                                                    <th colspan="3">Lebih Cepat (Sebelum Shift 1)</th>
                                                    <th colspan="3">Lambat (Setelah MS2)</th>
                                                    <th colspan="3">Tidak Terkirim Sesuai Jadwal MS2</th>
                                                    <th colspan="3">Total LO</th>
                                                </tr>
                                                <tr>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                    <th>Premium</th>
                                                    <th>Solar</th>
                                                    <th>Pertamax</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sesuai1 = array(46,45,54,45,45,48,52,53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,46,48,49);
                                                    $sesuai2 = array(53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,54,47,45,48,52,53,47,48,49,52);
                                                    $sesuai3 = array(46,52,50,46,47,48,49,52,51,48,47,47,48,46,52,50,46,47,48,49,52,48,47,47,48,49,48,47,47,48);
                                                    $sebelum1 = array(11,21,19,24,18,23,24,24,32,18,31,29,27,26,25,22,23,19,37,32,21,24,25,28,31,20,21,24,18,22);
                                                    $sebelum2 = array(29,27,26,25,22,23,19,37,32,21,24,25,28,31,20,21,19,24,18,23,24,24,32,18,31,29,22,23,19,21);
                                                    $sebelum3 = array(23,19,37,32,21,24,25,28,31,20,21,19,24,18,23,19,24,18,23,24,24,32,18,31,29,27,28,31,20,21);
                                                    $cepat1 = array(31,21,19,24,18,23,24,22,23,19,37,32,21,24,32,38,31,29,27,26,25,24,25,28,31,20,21,24,28,22);
                                                    $cepat2 = array(29,27,26,25,22,23,39,37,32,21,24,25,28,31,20,21,29,24,38,23,24,24,32,38,31,29,22,23,39,21);
                                                    $cepat3 = array(23,41,37,32,21,24,25,28,31,20,21,39,24,38,23,39,24,38,23,24,24,32,18,31,29,27,28,31,20,21);
                                                    $lambat1 = array(29,27,26,25,22,23,39,37,32,21,24,25,28,31,20,21,29,24,38,23,24,24,32,38,31,29,22,23,39,21);
                                                    $lambat2 =  array(31,21,19,24,18,23,24,22,23,19,37,32,21,24,32,38,31,29,27,26,25,24,25,28,31,20,21,24,28,22);
                                                    $lambat3 = array(23,41,37,32,21,24,25,28,31,20,21,39,24,38,23,39,24,38,23,24,24,32,18,31,29,27,28,31,20,21);
                                                    $gagal1 = array(46,45,54,45,45,48,52,53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,46,48,49);
                                                    $gagal2 = array(53,49,46,52,50,46,47,48,49,52,51,48,47,47,48,49,53,48,47,45,54,47,45,48,52,53,47,48,49,52);
                                                    $gagal3 = array(46,52,50,46,47,48,49,52,51,48,47,47,48,46,52,50,46,47,48,49,52,48,47,47,48,49,48,47,47,48);
                                                    $total1 = array(100,90,93,95,98,100,98,99,90,100,98,96,98,100,100,99,96,100,97,98,100,95,94,100,98,97,93,98,96,98,100);
                                                    $total2 = array(100,98,96,98,100,100,99,96,100,97,98,100,95,94,100,93,95,98,100,98,99,90,100,98,96,98,100,97,98,100,98);
                                                    $total3 = array(100,100,99,96,100,97,98,100,99,98,100,98,97,93,98,96,98,100,100,99,96,100,97,98,100,98,99,99,96,100,97);
                                                    for($i = 0 ; $i < 30 ; $i++)
                                                    {
                                                    ?>
                                                        <tr class="">
                                                            <td style="display:none;"></td>
                                                            <td><?php echo ($i + 1)?></td>
                                                            <td style="white-space: nowrap"><?php echo ($i + 1)?> Januari 2014</td>
                                                            <td><?php echo $sesuai1[$i]?>%</td>
                                                            <td><?php echo $sesuai2[$i]?>%</td>
                                                            <td><?php echo $sesuai3[$i]?>%</td>
                                                            <td><?php echo $sebelum1[$i]?>%</td>
                                                            <td><?php echo $sebelum2[$i]?>%</td>
                                                            <td><?php echo $sebelum3[$i]?>%</td>
                                                            <td><?php echo $cepat1[$i]?>%</td>
                                                            <td><?php echo $cepat2[$i]?>%</td>
                                                            <td><?php echo $cepat3[$i]?>%</td>
                                                            <td><?php echo $lambat1[$i]?>%</td>
                                                            <td><?php echo $lambat2[$i]?>%</td>
                                                            <td><?php echo $lambat3[$i]?>%</td>
                                                            <td><?php echo $gagal1[$i]?>%</td>
                                                            <td><?php echo $gagal2[$i]?>%</td>
                                                            <td><?php echo $gagal3[$i]?>%</td>
                                                            <td><?php echo $total1[$i]?>%</td>
                                                            <td><?php echo $total2[$i]?>%</td>
                                                            <td><?php echo $total3[$i]?>%</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
                <!-- page end-->
            </div>            
        </div>        
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>
