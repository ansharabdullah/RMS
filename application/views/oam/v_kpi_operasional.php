<script type="text/javascript">
    var kpi;
    var tahun_kpi = new Array();
    var series_kpi = new Array();
    var set = new Array();
    var target = new Array();
    var dataKpi = new Array();
    var arrColorKpi = new Array('#FF002B','#2C88D4','#23C906','#F5A905');
    
<?php

foreach ($tahun_arr as $tahun) {
    $jml = 0;
    $i = 0;
    foreach($depot as $dp){
        $status = 0;
        foreach($kpi as $k)
        {
            if($k->ID_DEPOT == $dp->ID_DEPOT && $k->tahun == $tahun)
            {
                $jml+= $k->rata_rata;
                $status = 1;
                break;
            }

        }
        $i++;
    }
    ?>
        dataKpi.push(<?php echo ($jml / $i);?>);
        tahun_kpi.push("<?php echo $tahun ?>");
    <?php
}
?>
    $(function() {
        kpi = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafikKpi',
                type:'column'
            },
            title: {
                text: 'Nilai KPI Operasional TBBM Pertahun'
            },
            plotOptions: {
               
                column: {
                    point:{
                        events:{
                            click: function(event) {
                                window.location = "<?php echo base_url() ?>kpi/operasional_tahun/"+ this.category;
                            }
                        }
                    },
                    
                    dataLabels: {
                        enabled: true,
                        useHTML: true,
                        formatter: function() {
                            if(this.y < 100 && this.y > 0){
                                return "<span class='btn btn-warning' > <i class='icon-warning-sign'></i></span>"; 
                            }
                        },
                        y: 100
                    }
                }
            },
            xAxis: [{
                    categories: tahun_kpi,
                    gridLineWidth: 0
              
                }],

            yAxis: [{ // Primary yAxis
                    gridLineWidth: 1,
                    min: 0,
                    minRange : 110,
                    labels: {

                        style: {
                            color: '#89A54E'
                        }
                    },
                    title: {
                        text: 'Nilai KPI (%)',
                        style: {
                            color: '#89A54E'
                        }
                    },
                    plotLines:[{
                            value:100,
                            color: '#ff0000',
                            width:2,
                            zIndex:4,
                            label:{text:'Target'}
                        }]
                }],
           

            tooltip: {
                positioner: function () {
                    return { x: 10, y: 0};
                }
            },
            labels: {
                items: [{
                        html: '',
                        style: {
                            left: '40px',
                            top: '8px',
                            color: 'black'
                        }
                    }]
            },
            series: [{
                    name: 'Rata - rata KPI',
                    type: 'column',
                    data: dataKpi
                }]
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                KPI OPERASIONAL
            </header>
            <div class="panel-body">
                <div id="grafikKpi"></div>
                &nbsp;&nbsp;<span class='btn btn-warning' > <i class='icon-warning-sign'></i></span>  <b> = Hasil dibawah target</b>

                <br/><br/><br/><br/>
                <div class="adv-table editable-table " id="tabel-apar">
                    <center>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>No.</th>
                                    <th>TBBM</th>
                                    <?php
                                    foreach ($tahun_arr as $tahun) {
                                        ?>
                                        <th>Tahun <?php echo $tahun ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($depot as $dp) {
                                    ?>

                                    <tr>
                                        <td style="display:none;"></td>
                                        <td><?php echo $i?></td>  
                                        <td><?php echo $dp->NAMA_DEPOT ?></td>
                                        <?php
                                        $total = 0;
                                        while($total < sizeof($tahun_arr))
                                        {
                                            $status = 0;
                                            foreach ($kpi as $k) {
                                                if($k->ID_DEPOT == $dp->ID_DEPOT && $k->tahun == $tahun_arr[$total])
                                                {
                                                ?>
                                                    <td><?php echo round($k->rata_rata,2) ?></td>
                                                <?php
                                                    $status = 1;
                                                    break;
                                                }
                                            }
                                            if($status == 0)
                                            {
                                                 ?>
                                                    <td>0</td>
                                                <?php
                                            }
                                            
                                            $total++;
                                        }
                                        
                                        ?>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </section>
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
   
		  
</script>