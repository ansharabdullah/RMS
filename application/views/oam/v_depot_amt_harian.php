
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>depot/amt_depot/<?php echo $id_depot?>/<?php echo $tahun?>">Kinerja AMT Bulanan</a></li>
                    <li class="active">Kinerja AMT Harian</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Harian AMT TBBM <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
<!--                        <form class="cmxform form-horizontal tasi-form" action="" role="form" method="POST">-->
                            <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                               echo form_open("depot/amt_hari/".$id_depot,$attr);
                            ?>
                            <div class="form-group">
<!--                                <div class="col-lg-6">
                                    <select class="form-control m-bot2"  id="jenis" >

                                        <option value="">Jumlah KM</option>
                                        <option value="">Jumlah KL</option>

                                    </select>
                                </div>-->
                                <div class="col-lg-3">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                            <?php echo form_close()?>
                        <br/><br/>
                         <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter AMT<i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">
                                    <li><a style="cursor: pointer" onclick="filterAmt('KM')">KM</a></li>
                                    <li><a style="cursor: pointer" onclick="filterAmt('KL')">KL</a></li>
                                    <li><a style="cursor: pointer" onclick="filterAmt('Ritase')">Ritase</a></li>
                                    <li><a style="cursor: pointer" onclick="filterAmt('SPBU')">SPBU</a></li>
                                </ul>
                            </div>
                        <br/><br/><br/>
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

                                        <div class="space15"></div>
                                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;"></th>
                                                    <th >No</th>
                                                    <th >Tanggal</th>
                                                    <th >Jumlah KM</th>
                                                    <th >Jumlah KL</th>
                                                    <th >Jumlah Ritase</th>
                                                    <th >Jumlah SPBU</th>
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
                                                        <td style="white-space: nowrap"><?php echo strftime('%d %B %Y',strtotime($ka->TANGGAL_LOG_HARIAN));?></td>
                                                        <td><?php echo $ka->total_km ?> KM</td>
                                                        <td><?php echo $ka->total_kl ?> KL</td>
                                                        <td><?php echo $ka->ritase ?> Rit</td>
                                                        <td><?php echo $ka->spbu ?> </td>
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
    
    var tanggal = new Array();
    var amt;
    var total_km = new Array();
    var km = new Array();
    var total_kl = new Array();
    var ritase = new Array();
    var spbu = new Array();
    <?php
        foreach($kinerja_amt as $ka){
            ?>
                tanggal.push("<?php echo $ka->tanggal;?>");
                total_km.push(<?php echo $ka->total_km?>);
                km.push(<?php echo $ka->total_km?>);
                total_kl.push(<?php echo $ka->total_kl?>);
                ritase.push(<?php echo $ka->ritase?>);
                spbu.push(<?php echo $ka->spbu?>);
            <?php
        }
    ?>
    $(function() {
       amt = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM Awak Mobil Tangki TBBM <?php echo $nama_depot?>'
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
                                window.location = "<?php echo base_url() ?>depot/amt_depot_detail/<?php echo $id_depot?>/"+tgl;
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
                    type: 'spline',
                    name: 'Jumlah',
                     data: km
                }]
        });
    });
    
    function filterAmt(title)
    {
        amt.setTitle({text: 'Grafik Kinerja Jumlah '+title+' Awak Mobil Tangki TBBM <?php echo $nama_depot?>'});  
        if(title == "KM"){
             amt.series[0].setData(total_km);
        }else if(title == "KL"){
            amt.series[0].setData(total_kl);
            
        }else if(title == "Ritase"){
            amt.series[0].setData(ritase);
                
        }else if(title == "SPBU"){
            amt.series[0].setData(spbu);
            
        }
        
    }
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