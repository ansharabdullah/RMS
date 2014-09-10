<!DOCTYPE html>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Kinerja AMT
                    </header>
                    <div class="panel-body" >
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
                        Awak Mobil Tangki
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
                text: 'Grafik Kinerja Jumlah KM AMT'
            },
            subtitle: {
                text: 'Tahun <?php echo $tahun;?>'
            },
            plotOptions: {
                column: {
                   point:{
                      events:{
                        click: function(event) {
                                window.location = "<?php echo base_url() ?>amt/amt_depot_harian/<?php echo $id_depot?>/<?php echo $nama_depot?>/"+ nomor_bulan[this.x]+"/<?php echo date('Y')?>";
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
        amt.setTitle({text: 'Grafik Kinerja Jumlah '+title+' AMT'});  
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