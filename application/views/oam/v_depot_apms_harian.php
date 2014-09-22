
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
<!--                        <form class="cmxform form-horizontal tasi-form" action="" role="form" method="POST">-->
                            <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                               echo form_open("depot/apms_hari/".$id_depot."/".$nama_depot,$attr);
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                            <?php echo form_close()?>
                        <br/><br/>
                        <div id="grafik"></div>

                    </div>
                </section>
                
                <section class="panel">
                    <div class="panel-body" >
                        <div id="filePreview">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tabel Realisasi Penyaluran Harian APMS <?php echo $nama_depot?>
                                </header>
                                <div class="panel-body">

                                        <div class="space15"></div>
                                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;"></th>
                                                    <th >No</th>
                                                    <th >Tanggal</th>
                                                    <th >Jumlah Premium</th>
                                                    <th >Jumlah Solar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="display:none;"></td>
                                                    <td>1</td>
                                                    <td>6 <?php echo strftime("%B Y", mktime(0, 0, 0, $bulan, 1, $tahun))?></td>
                                                    <td>321</td>
                                                    <td>168</td>
                                                </tr>
                                                <tr>
                                                    <td style="display:none;"></td>
                                                    <td>2</td>
                                                    <td>20 <?php echo strftime("%B Y", mktime(0, 0, 0, $bulan, 1, $tahun))?></td>
                                                    <td>313</td>
                                                    <td>138</td>
                                                </tr>
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
    
    var tanggal = new Array(6,20);
    var apms;
    var premium = new Array(321,313);
    var solar = new Array(168,138);
    $(function() {
       apms = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik'
            },
            title: {
                text: 'Grafik Realisasi Penyaluran Harian APMS Depot <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Bulan <?php echo strftime("%B", mktime(0, 0, 0, $bulan, 1, $tahun))?> Tahun <?php echo $tahun?>'
            },
            plotOptions: {
                series: {
                   point:{
                      events:{
                        click: function(event) {
                               var tgl = '<?php echo $tahun."-".$bulan."-";?>'+this.category;
                                window.location = "<?php echo base_url() ?>depot/apms_depot_detail/<?php echo $id_depot?>/<?php echo $nama_depot?>/"+tgl;
                            }
                        }
                    }
                }
            },
            xAxis: [{
                    categories: tanggal
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Jumlah',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
               enabled:false
            },
            series: [{
                    type: 'column',
                    name: 'Premium',
                     data: premium
                },{
                    type: 'column',
                    name: 'Solar',
                     data: solar
                }]
        });
    });
    
</script>


<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
   
		  
</script>