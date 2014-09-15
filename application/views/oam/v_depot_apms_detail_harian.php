<script type="text/javascript">
    var apms;
    var premium = new Array(88,144,89);
    var solar = new Array(88,56,24);
    var nama = new Array("Husein Kadir (56.611.01)","Salahoddin (56.611.02)","M.Iksan (56.694.01)");
    $(function() {
        apms = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik',
                type:'bar'
            },
            title: {
                text: 'Grafik Detail Realisasi Penyaluran APMS Harian',
                x: -20 //center
            },
            subtitle: {
                text: '<?php echo $tanggal ?>',
                x: -20
            },
            xAxis: {
                categories: nama
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
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
                borderWidth: 1
            },
            series: [{
                    name: 'Premium',
                    data: premium
                }, {
                    name: 'Solar',
                    data: solar
                }]
        });
    });

    
    
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Grafik Detail Realisasi Penyaluran APMS Harian Depot <?php echo $nama_depot ?>
                    </header>
                    <div class="panel-body" >
                        <?php
                        $attr = array("class" => "cmxform form-horizontal tasi-form");
                        echo form_open("depot/ganti_detail_apms/" . $id_depot . "/" . $nama_depot, $attr);
                        ?>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <input type="date" name="tanggal"  required="required" id="tahunLaporan"  class="form-control"/>
                            </div>

                            <div class=" col-lg-2">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>

                        </div>
                        <?php echo form_close() ?>
                        <br/><br/>
                        <div id="grafik"></div><br/><br/>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Detail Realisasi Penyaluran APMS Harian <?php echo $tanggal ?>
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table " >
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="display:none;"></th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">No.APMS</th>
                                        <th rowspan="2">Nama Pengusaha</th>
                                        <th colspan="2">Premium</th>
                                        <th colspan="2">Solar</th>
                                    </tr>
                                    <tr>
                                        <td>Alokasi APMS perBulan (KL)</td>
                                        <td>Realisasi</td>
                                        <td>Alokasi APMS perBulan (KL)</td>
                                        <td>Realisasi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td style="display: none;"></td>
                                       <td>1</td>
                                       <td>56.611.01</td>
                                       <td>Husein Kadir</td>
                                       <td>184</td>
                                       <td>88</td>
                                       <td>200</td>
                                       <td>88</td>
                                   </tr>
                                    <tr>
                                       <td style="display: none;"></td>
                                       <td>2</td>
                                       <td>56.611.02</td>
                                       <td>Salahoddin</td>
                                       <td>144</td>
                                       <td>144</td>
                                       <td>56</td>
                                       <td>56</td>
                                   </tr>
                                    <tr>
                                       <td style="display: none;"></td>
                                       <td>3</td>
                                       <td>56.694.01</td>
                                       <td>M.Iksan</td>
                                       <td>306</td>
                                       <td>89</td>
                                       <td>50</td>
                                       <td>24</td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>            
        </div>        
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
</script><?php
                                /*
                                 * To change this template, choose Tools | Templates
                                 * and open the template in the editor.
                                 */
                                ?>
