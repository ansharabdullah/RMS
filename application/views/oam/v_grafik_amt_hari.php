<script type="text/javascript">
    var grafik;
    $(document).ready(function(){
        
        $("#form_amt").submit(function(e){
            changeIndikator($("#indikator").val());
            e.preventDefault();
        });
    });
    $(function() {
        grafik = new Highcharts.Chart({ 
            chart: {
                type: 'column',
                renderTo: 'grafik'
            },
            title: {
                text: 'Grafik Awak Mobil Tangki Depot 1 Indikator KM',
                x: -20 //center
            },
            subtitle: {
                text: 'Bulan Januari 2014 (Kilometer)',
                x: -20
            },
            xAxis: {
                categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
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
                    name: 'KM',
                    data: [7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6,7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6,7.0, 6.9, 7.5, 4.5, 6.2, 8.5]
                    
                }]
        });
         
    });
    
   
    function changeIndikator(indikator)
    {
        grafik.setTitle({text: "Grafik Awak Mobil Tangki Depot 1 Indikator " + indikator}); 
        grafik.legend.allItems[0].update({name:indikator});
        grafik.series[0].name=indikator;
        grafik.redraw();
        $("#grafik").hide();
        $("#grafik").slideDown("slow");
    }
    
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Harian Depot 1
                    </header>
                    <div class="panel-body" >
                        <form id="form_amt" class="cmxform form-horizontal tasi-form">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <select class="form-control m-bot2"  id="depot" name="depot">

                                        <option value="">Depot 1</option>
                                        <option value="">Depot 2</option>
                                        <option value="">Depot 3</option>
                                        <option value="">Depot 4</option>
                                        <option value="">Depot 5</option>

                                    </select>
                                </div> 
                                <div class="col-lg-3">
                                    <select class="form-control m-bot2"  id="indikator" name="depot">

                                        <option value="KM">KM</option>
                                        <option value="KL">KL</option>
                                        <option value="Ritase">Ritase</option>
                                        <option value="SPBU">SPBU</option>
                                        <option value="Jumlah Hadir">Jumlah Hadir</option>
                                        <option value="Jumlah Tidak Hadir">Jumlah Tidak Hadir</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <input type="month" name="tahun"  name="tahun" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div id="grafik"></div> 
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Kinerja Awak Mobil Tangki Bulan Januari
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table " >
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th> No </th>
                                        <th>Tanggal</th>
                                        <th>Kilometer (KM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $km = array(7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6, 7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6, 7.0, 6.9, 7.5, 4.5, 6.2, 8.5);
                                    for ($i = 0; $i < 30; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $km[$i] ?></td>
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
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
</script>