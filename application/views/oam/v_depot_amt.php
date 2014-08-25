<!DOCTYPE html>
<script type="text/javascript">
    $(function() {
        $('#grafik2').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KL AMT Depot <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo date('Y');?>'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/amt_depot_harian/<?php echo $id_depot?>/<?php echo $nama_depot?>/"+arrBulan[this.index]+"/<?php echo date('Y')?>";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: [<?php
                        for($i = 0;$i < sizeof($kinerja_amt);$i++)
                        {
                            ?>'<?php echo $kinerja_amt[$i]->bulan;?>'<?php
                            if($i < sizeof($kinerja_amt) - 1) echo ",";
                        }
                    ?>]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
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
                    name: 'KM',
                    type: 'column',
                    data: [<?php
                        for($i = 0;$i < sizeof($kinerja_amt);$i++)
                        {
                            echo $kinerja_amt[$i]->total_kl;
                            if($i < sizeof($kinerja_amt) - 1) echo ",";
                        }
                    ?>]

                }]
        });
    });
    var arrBulan = new Array();
    <?php
            foreach($kinerja_amt as $ka ){
        ?>
             arrBulan.push(<?php echo $ka->no_bulan?>);
        <?php
            }
    ?>
    $(function() {
        $('#grafik1').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM AMT Depot <?php echo $nama_depot?>'
            },
            subtitle: {
                text: 'Tahun <?php echo date('Y');?>'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/amt_depot_harian/<?php echo $id_depot?>/<?php echo $nama_depot?>/"+arrBulan[this.index]+"/<?php echo date('Y')?>";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: [<?php
                        for($i = 0;$i < sizeof($kinerja_amt);$i++)
                        {
                            ?>'<?php echo $kinerja_amt[$i]->bulan;?>'<?php
                            if($i < sizeof($kinerja_amt) - 1) echo ",";
                        }
                    ?>]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
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
                    name: 'KM',
                    type: 'column',
                    data: [<?php
                        for($i = 0;$i < sizeof($kinerja_amt);$i++)
                        {
                            echo $kinerja_amt[$i]->total_km;
                            if($i < sizeof($kinerja_amt) - 1) echo ",";
                        }
                    ?>]

                }]
        });
    });
</script>

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
                            <?php if($rencana_bulan[0]->total_kl > 0)echo ceil(($kinerja_bulan[0]->total_kl / $rencana_bulan[0]->total_kl) * 100) ?>%
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
                            <?php echo $kinerja_bulan[0]->own_use ?>
                        </h1>
                        <p>KL (Own Use)</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Jumlah KL Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >

                        <div id="grafik2"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Jumlah KM Depot <?php echo $nama_depot?>
                    </header>
                    <div class="panel-body" >

                        <div id="grafik1"></div>

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
                            <center><h3>DAFTAR AWAK MOBIL TANGKI</h3></center>
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
