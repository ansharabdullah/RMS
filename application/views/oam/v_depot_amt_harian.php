
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Harian AMT Depot 1
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
                                    Tabel
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
                                                $km = array(46, 45, 54, 45, 45, 48, 52, 53, 49, 46, 52, 50, 46, 47, 48, 49, 52, 51, 48, 47, 47, 48, 49, 53, 48, 47, 45, 46, 48, 49);
                                                $kl = array(53, 49, 46, 52, 50, 46, 47, 48, 49, 52, 51, 48, 47, 47, 48, 49, 53, 48, 47, 45, 54, 47, 45, 48, 52, 53, 47, 48, 49, 52);
                                                for ($i = 0; $i < 30; $i++) {
                                                    ?>
                                                    <tr class="">
                                                        <td style="display:none;"></td>
                                                        <td><?php echo ($i + 1) ?></td>
                                                        <td style="white-space: nowrap"><?php echo ($i + 1) ?> Januari 2014</td>
                                                        <td><?php echo $kl[$i] ?> KL</td>
                                                        <td><?php echo $km[$i] ?> KM</td>
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
                text: 'Bulan Januari Tahun 2014'
            },
            xAxis: [{
                    categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]
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
                    data: [46, 45, 54, 45, 45, 48, 52, 53, 49, 46, 52, 50, 46, 47, 48, 49, 52, 51, 48, 47, 47, 48, 49, 53, 48, 47, 45, 46, 48, 49]
                }]
        });
    });
</script>


<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
