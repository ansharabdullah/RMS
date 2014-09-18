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
             plotOptions: {
                series: {
                    point:{
                        events:{
                            click: function(event) {
                              $("#myModal").modal('toggle');
                            }
                        }
                    }
                    
                }
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"  style="width: 70%;">
                <div class="modal-content"  >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Detail Pengiriman APMS</h4>
                    </div>
                    <div class="modal-body" style="overflow-x:scroll;">
                        <table  class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>Plan GI Order</th>
                                    <th>No.APMS</th>
                                    <th>Lokasi</th>
                                    <th>No.LO</th>
                                    <th>Tanggal Delivery</th>
                                    <th>Order Number</th>
                                    <th>Tanggal Order Number</th>
                                    <th>Custom Number</th>
                                    <th>Description</th>
                                    <th>Ship From</th>
                                    <th>Produk</th>
                                    <th>Kap (KL)</th>
                                    <th>Pengiriman Kapal</th>
                                    <th>Pengisian BBM</th>
                                    <th>Kapal Datang</th>
                                    <th>Kapal Berangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display:none;"></td>
                                    <td>03.01.2013</td>
                                    <td>56.61</td>
                                    <td style="white-space: nowrap">Desa Sawah Mulyo Kec. Sangkapura Bawean Gresik </td>
                                    <td>8034245167</td>
                                    <td>02.01.2013</td>
                                    <td>444403</td>
                                    <td>28.12.2012</td>
                                    <td>728382</td>
                                    <td>A040900001</td>
                                    <td  style="white-space: nowrap">Depot Tg Wangi</td>
                                    <td>Premium</td>
                                    <td>8</td>
                                    <td>Jayanti</td>
                                    <td>Premium</td>
                                    <td>11.01.2013</td>
                                    <td>17.01.2013</td>
                                </tr>
                                <tr>
                                    <td style="display:none;"></td>
                                    <td>03.01.2013</td>
                                    <td>56.61</td>
                                    <td>Desa Sawah Mulyo Kec. Sangkapura Bawean Gresik </td>
                                    <td>8034245167</td>
                                    <td>02.01.2013</td>
                                    <td>444403</td>
                                    <td>28.12.2012</td>
                                    <td>728382</td>
                                    <td>A040900001</td>
                                    <td>Depot Tg Wangi</td>
                                    <td>Premium</td>
                                    <td>8</td>
                                    <td>Jayanti</td>
                                    <td>Premium</td>
                                    <td>11.01.2013</td>
                                    <td>17.01.2013</td>
                                </tr>
                                <tr>
                                    <td style="display:none;"></td>
                                    <td>03.01.2013</td>
                                    <td>56.61</td>
                                    <td>Desa Sawah Mulyo Kec. Sangkapura Bawean Gresik </td>
                                    <td>8034245167</td>
                                    <td>02.01.2013</td>
                                    <td>444403</td>
                                    <td>28.12.2012</td>
                                    <td>728382</td>
                                    <td>A040900001</td>
                                    <td>Depot Tg Wangi</td>
                                    <td>Premium</td>
                                    <td>8</td>
                                    <td>Jayanti</td>
                                    <td>Premium</td>
                                    <td>11.01.2013</td>
                                    <td>17.01.2013</td>
                                </tr>
                                <tr>
                                    <td style="display:none;"></td>
                                    <td>03.01.2013</td>
                                    <td>56.61</td>
                                    <td>Desa Sawah Mulyo Kec. Sangkapura Bawean Gresik </td>
                                    <td>8034245167</td>
                                    <td>02.01.2013</td>
                                    <td>444403</td>
                                    <td>28.12.2012</td>
                                    <td>728382</td>
                                    <td>A040900001</td>
                                    <td>Depot Tg Wangi</td>
                                    <td>Solar</td>
                                    <td>8</td>
                                    <td>Jayanti</td>
                                    <td>Solar</td>
                                    <td>11.01.2013</td>
                                    <td>17.01.2013</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
