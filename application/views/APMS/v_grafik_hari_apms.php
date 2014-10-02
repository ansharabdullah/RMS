<script type="text/javascript">
    var start = 0;
    var limit = 5;
    var apms;
    var premium = new Array();
    var solar = new Array();
    var id_apms = new Array();
<?php
foreach ($grafik as $km) {
    ?>
                    premium.push(<?php echo $km->premium ?>);
                    solar.push(<?php echo $km->solar ?>);
                    id_apms.push(<?php echo str_replace('.','',$km->NO_APMS) ?>);
    <?php
}
?>
    
       
        $(function() {
            apms = new Highcharts.Chart({ 
                chart: {
                    renderTo:'grafik',
                    type:'bar'
                },
                title: {
                    text: 'Grafik Detail Kinerja Harian APMS',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Tanggal <?php echo $hari ?> <?php echo date("F", mktime(0, 0, 0, $bulan, 1, 2005))?> <?php echo $tahun ?>',
                    x: -20
                },
                xAxis: {
                    categories: id_apms.slice(start,start + limit)
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
                        data: premium.slice(start,start + limit),
                        visible: false
                    }, 
                    {
                        name: 'Solar',
                        data: solar.slice(start,start + limit),
                        visible: false
                    }]
            });
        });

    
        $(document).ready(function(){
            $("#sebelum").hide();
            if(id_apms.length < limit)
            {
                $("#selanjutnya").hide();
            }
       
            apms.series[0].setVisible(true);
        });
    
    
        function sebelumOnClick()
        {
            $("#sebelum").show();
            start -=limit;
            if(start - limit < 0)
            {
                start = 0;
                $("#sebelum").hide();
            }
            else
            {
                start = start - limit;
            }
            $("#selanjutnya").show();
            setData();
        }
    
        function selanjutnyaOnClick()
        {
            $("#selanjutnya").show();
            start += limit;
            if(start + limit >= id_apms.length)
            {
                $("#selanjutnya").hide();
            }
            $("#sebelum").show();
            
            setData();
        }
    
        function setData()
        {
            
            apms.xAxis[0].setCategories(id_apms.slice(start,start + limit));
            apms.series[0].setData(premium.slice(start,start + limit));
            apms.series[1].setData(solar.slice(start,start + limit));
        }
</script>

<section id="main-content">
    <section class="wrapper">
         <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>apms/grafik_apms/<?php echo date("Y")?>"></i> Grafik Kinerja Bulanan APMS</a></li>
                    <li><a href="<?php echo base_url(); ?>apms/grafik_bulan_apms/<?php echo $bulan?>/<?php echo $tahun ?>"></i> Grafik Kinerja Harian APMS</a></li>
                    <li class="active">Grafik Kinerja Detail APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Detail Harian APMS 
                    </header>
                    <div class="panel-body" >
                         <?php
                        $attr = array("class" => "cmxform form-horizontal tasi-form");
                        echo form_open("apms/apms_grafik_hari/", $attr);
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
                        <button class='btn btn-danger' id="sebelum" onclick="sebelumOnClick()"><i class='icon-long-arrow-left'></i> sebelumnya</button>
                        <button class='btn btn-danger' style='float:right;' id="selanjutnya" onclick="selanjutnyaOnClick()">selanjutnya <i class='icon-long-arrow-right'></i></button>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Kinerja APMS <?php echo $bulan ?> <?php echo date("F", mktime(0, 0, 0, $hari, 1, 2005))?> <?php echo $tahun ?>
                    </header>
                    <div class="panel-body">

                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>ID APMS</th>
                                        <th>Premium (KL)</th>
                                        <th>Solar (KL)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($grafik as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url() ?>apms/detail_apms/<?php echo $row->NO_APMS; ?>/<?php echo $hari?>/<?php echo $tahun?>" style ="text-decoration: underline"><?php echo $row->NO_APMS; ?></a></td>
                                    <td><?php echo $row->premium; ?></td>
                                    <td><?php echo $row->solar; ?></td>
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
