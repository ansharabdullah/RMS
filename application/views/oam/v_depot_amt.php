<!DOCTYPE html>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="icon-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?php echo $total_amt ?>
                        </h1>
                        <p>Awak Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                            <?php echo $total_mt ?>
                        </h1>
                        <p>Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="icon-star"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                              <?php if ($rencana_bulan[0]->total_kl > 0) {
                                echo ceil(($kinerja_bulan[0]->total_kl / $rencana_bulan[0]->total_kl) * 100);
                            } else {
                                echo "0";
                            } ?>%
                        </h1>
                        <p>Traget KL</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="icon-dashboard"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count4">
                            <?php if($kinerja_bulan[0]->own_use  > 0){
                                echo $kinerja_bulan[0]->own_use ;
                            } else {
                                echo "0";
                            }?>
                        </h1>
                        <p>KL (Own Use)</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Kinerja AMT Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >
                         <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                                 echo form_open("depot/amt_tahun/".$id_depot."/".$nama_depot,$attr);
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="number" name="tahun" minlength="4" maxlength="4" min="2010" value="<?php echo date('Y')?>" required="required" id="tahunLaporan"  class="form-control"/>
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
                        <div id="grafik2"></div>

                    </div>
                </section>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Awak Mobil Tangki Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body">
                        <div class="space15">
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Klasifikasi</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Transportir Asal</th>
                                    <th>No Telp</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($amt as $row) { ?>
                                    <tr class="">
                                        <td style="display:none;"></td>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI; ?>" style ="text-decoration: underline"><?php echo $row->NIP; ?></a></td>

                                        <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                        <td><?php echo $row->JABATAN; ?></td>
                                        <td><?php echo $row->KLASIFIKASI; ?></td>
                                        <td><?php echo $row->TANGGAL_MASUK; ?></td>
                                        <td><?php echo $row->TRANSPORTIR_ASAL; ?></td>
                                        <td><?php echo $row->NO_TELEPON; ?></td>
                                        <td><span class="label label-success"><?php echo $row->STATUS; ?>.</span></td>
                                    </tr>
                                    <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<script type="text/javascript">
    
    var amt;
    var total_km = new Array();
    var km = new Array();
    var total_kl = new Array();
    var ritase = new Array();
    var spbu = new Array();
    var bulan = new Array();
    var nomor_bulan = new Array();
    <?php
        foreach($kinerja_amt as $ka){
            ?>
            total_km.push(<?php echo $ka->total_km?>);
            km.push(<?php echo $ka->total_km?>);
            total_kl.push(<?php echo $ka->total_kl?>);
            ritase.push(<?php echo $ka->ritase?>);
            spbu.push(<?php echo $ka->spbu?>);
            bulan.push("<?php echo $ka->bulan?>");
            nomor_bulan.push("<?php echo date("n",strtotime($ka->TANGGAL_LOG_HARIAN))?>");
            <?php
        }
    ?>
    $(function() {
        amt = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik2'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM AMT Depot <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun;?>'
            },
            plotOptions: {
                column: {
                   point:{
                      events:{
                        click: function(event) {
                                window.location = "<?php echo base_url() ?>depot/amt_depot_harian/<?php echo $id_depot?>/<?php echo $nama_depot?>/"+ nomor_bulan[this.x]+"/<?php echo date('Y')?>";
                            }
                        }
                    }
                }
            },
            legend:{
                 enabled: false
            },
            xAxis: [{
                    categories: bulan
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
             series: [{
                    name: 'Jumlah',
                    type: 'column',
                    data: km

                }]
        });
    });
    
    
    function filterAmt(title)
    {
        amt.setTitle({text: 'Grafik Kinerja Jumlah '+title+' AMT Depot <?php echo $nama_depot?>'});  
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