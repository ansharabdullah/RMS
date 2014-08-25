
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Harian AMT Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
                        <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm">

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <select class="form-control m-bot2"  id="jenis" >

                                        <option value="">Jumlah KM</option>
                                        <option value="">Jumlah KL</option>

                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
                        <br/><br/>
                        <div id="grafik"></div>

                    </div>
                </section>
                
                <section class="panel">
                    <div class="panel-body" >
                        <div id="filePreview">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Kinerja AMT <?php echo $nama_depot?>
                                </header>
                                <div class="panel-body">
                                    <div class="adv-table editable-table">

                                        <div class="space15"></div>
                                        <table class="table table-bordered table-hover" id="editable-sample">   
                                            <thead>
                                                <tr>
                                                    <th style="display:none;"></th>
                                                    <th >No</th>
                                                    <th >Tanggal</th>
                                                    <th >Jumlah KM</th>
                                                    <th >Jumlah KL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($kinerja_amt as $ka) {
                                                    ?>
                                                    <tr class="">
                                                        <td style="display:none;"></td>
                                                        <td><?php echo $i ?></td>
                                                        <td style="white-space: nowrap"><?php echo date_format(date_create($ka->TANGGAL_LOG_HARIAN),'d F Y');?></td>
                                                        <td><?php echo $ka->total_kl ?> KL</td>
                                                        <td><?php echo $ka->total_km ?> KM</td>
                                                    </tr>
                                                    <?php
                                                    $i++;
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

<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Jumlah KM'
            },
            subtitle: {
                text: 'Bulan <?php echo date("F", mktime(0, 0, 0, $bulan, 1, 2005))?> Tahun <?php echo $tahun?>'
            },
            xAxis: [{
                    categories: [<?php
                        for($i = 0;$i < sizeof($kinerja_amt);$i++)
                        {
                            ?>'<?php echo $kinerja_amt[$i]->tanggal;?>'<?php
                            if($i < sizeof($kinerja_amt) - 1) echo ",";
                        }
                    ?>]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total KM',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    type: 'column',
                    name: 'Jumlah',
                     data: [<?php
                        for($i = 0;$i < sizeof($kinerja_amt);$i++)
                        {
                            echo $kinerja_amt[$i]->total_km;
                            if($i < sizeof($kinerja_amt) - 1) echo ",";
                        }
                    ?>]
                }]
        });
    });
</script>


<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
