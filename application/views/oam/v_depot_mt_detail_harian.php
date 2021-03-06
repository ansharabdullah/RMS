<script type="text/javascript">
    var start = 0;
    var limit = 5;
    var mt;
    var kl_mt = new Array();
    var km_mt = new Array();
    var total_km_mt = new Array();
    var premium = new Array();
    var pertamax = new Array();
    var pertamax_plus = new Array();
    var pertamina_dex = new Array();
    var solar = new Array();
    var bio_solar = new Array();
    var own_use_mt = new Array();
    var ritase_mt = new Array();
    var nopol_mt = new Array(); 
<?php
foreach($mt as $m)
{
    $status = 0;
    foreach ($grafik as $km) {
        if($m->ID_MOBIL == $km->ID_MOBIL)
        {
            $status = 1;
        ?>

                        kl_mt.push(<?php echo $km->TOTAL_KL_MT ?>);
                        km_mt.push(<?php echo $km->TOTAL_KM_MT ?>);
                        total_km_mt.push(<?php echo $km->TOTAL_KM_MT ?>);
                        premium.push(<?php echo $km->PREMIUM ?>);
                        pertamax.push(<?php echo $km->PERTAMAX ?>);
                        pertamax_plus.push(<?php echo $km->PERTAMAX_PLUS ?>);
                        pertamina_dex.push(<?php echo $km->PERTAMINA_DEX ?>);
                        solar.push(<?php echo $km->SOLAR ?>);
                        bio_solar.push(<?php echo $km->BIO_SOLAR ?>);
                        own_use_mt.push(<?php echo $km->OWN_USE ?>);
                        ritase_mt.push(<?php echo $km->RITASE_MT ?>);
                        nopol_mt.push("<?php echo $km->NOPOL ?>");

        <?php
            break;
        }
    }
    if($status == 0)
    {
        ?>

                        kl_mt.push(0);
                        km_mt.push(0);
                        total_km_mt.push(0);
                        premium.push(0);
                        pertamax.push(0);
                        pertamax_plus.push(0);
                        pertamina_dex.push(0);
                        solar.push(0);
                        bio_solar.push(0);
                        own_use_mt.push(0);
                        ritase_mt.push(0);
                        nopol_mt.push("<?php echo $m->NOPOL ?>");

        <?php
        
    }
}
?>
    
       
        $(function() {
            mt = new Highcharts.Chart({ 
                chart: {
                    renderTo:'grafik',
                    type:'bar'
                },
                title: {
                    text: 'Grafik Mobil Tangki',
                    x: -20 //center
                },
                subtitle: {
                    text: '<?php echo $tanggal ?>',
                    x: -20
                },
                xAxis: {
                    categories: nopol_mt.slice(start,start + limit)
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
                        data: km_mt.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'KL',
                        data: kl_mt.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Premium',
                        data: premium.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Pertamax',
                        data: pertamax.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Pertamax Plus',
                        data: pertamax_plus.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Pertamina Dex',
                        data: pertamina_dex.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Solar',
                        data: solar.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Own Use',
                        data: own_use_mt.slice(start,start + limit),
                        visible: false
                    }, {
                        name: 'Bio Solar',
                        data: bio_solar.slice(start,start + limit),
                        visible: false
                    },
                    {
                        name: 'Ritase',
                        data: ritase_mt.slice(start,start + limit),
                        visible: false
                    }]
            });
        });

    
    
       $(document).ready(function(){
            $("#sebelum").hide();
            if(nopol_mt.length < limit)
            {
                $("#selanjutnya").hide();
            }
       
            mt.series[1].setVisible(true);
        });
    
    
        function sebelumOnClick()
        {
            $("#sebelum").show();
            start = start-limit;
            if(start <= 0)
            {
                start = 0;
                $("#sebelum").hide();
            }
            $("#selanjutnya").show();
            setData();
        }
    
        function selanjutnyaOnClick()
        {
            $("#selanjutnya").show();
            start += limit;
            if(start + limit >= nopol_mt.length)
            {
                $("#selanjutnya").hide();
            }
            $("#sebelum").show();
            
            setData();
        }
    
        function setData()
        {
            var hide_arr = new Array();
            var i;
            for(i = 0 ; i < 10 ; i++)
            {
                if( mt.series[i].visible == false)
                {
                    hide_arr.push(i);
                }
                 mt.series[i].setVisible(true);
            }
            mt.xAxis[0].setCategories(nopol_mt.slice(start,start + limit));
            mt.series[0].setData(km_mt.slice(start,start + limit));
            mt.series[1].setData(kl_mt.slice(start,start + limit));
            mt.series[2].setData(premium.slice(start,start + limit));
            mt.series[3].setData(pertamax.slice(start,start + limit));
            mt.series[4].setData(pertamax_plus.slice(start,start + limit));
            mt.series[5].setData(pertamina_dex.slice(start,start + limit));
            mt.series[6].setData(solar.slice(start,start + limit));
            mt.series[7].setData(own_use_mt.slice(start,start + limit));
            mt.series[8].setData(bio_solar.slice(start,start + limit));
            mt.series[9].setData(ritase_mt.slice(start,start + limit));
            for(i = 0 ; i < hide_arr.length ; i++)
            {
                 mt.series[hide_arr[i]].setVisible(false);
            }
            
        }
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
         <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>depot/mt_depot/<?php echo $id_depot?>/<?php echo $tahun?>">Kinerja MT Bulanan</a></li>
                    <li><a href="<?php echo base_url();?>depot/mt_depot_harian/<?php echo $id_depot?>/<?php echo $no_bulan?>/<?php echo $tahun?>">Kinerja MT Harian</a></li>
                    <li class="active">Detail Kinerja MT Harian</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Detail Harian MT TBBM <?php echo $nama_depot ?>
                    </header>
                    <div class="panel-body" >
                        <?php
                        $attr = array("class" => "cmxform form-horizontal tasi-form");
                        echo form_open("depot/ganti_detail_mt/" . $id_depot , $attr);
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
                        Tabel Kinerja Mobil Tangki <?php echo $tanggal ?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " >
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Nopol</th>
                                        <th>Produk</th>
                                        <th>Kapasitas</th>
                                        <th>Kilometer (KM)</th>
                                        <th>Kiloliter (KL)</th>
                                        <th>Ritase (Rit)</th>
                                        <th>Premium</th>
                                        <th>Pertamax</th>
                                        <th>Pertamax Plus</th>
                                        <th>Pertamax Dex</th>
                                        <th>Solar</th>
                                        <th>Bio Solar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($mt as $m)
                                    {
                                        $status = 0;
                                        foreach ($grafik as $row) { 
                                            if($m->ID_MOBIL == $row->ID_MOBIL)
                                            {
                                                $status = 1;
                                                ?>
                                                <tr>
                                                <td style="display:none;"></td>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row->NOPOL; ?></td>
                                                <td><?php echo $row->KAPASITAS; ?></td>
                                                <td><?php echo $row->PRODUK; ?></td>
                                                <td><?php echo $row->TOTAL_KM_MT; ?></td>
                                                <td><?php echo $row->TOTAL_KL_MT; ?></td>
                                                <td><?php echo $row->RITASE_MT; ?></td>
                                                <td><?php echo $row->PREMIUM; ?></td>
                                                <td><?php echo $row->PERTAMAX; ?></td>
                                                <td><?php echo $row->PERTAMAX_PLUS; ?></td>
                                                <td><?php echo $row->PERTAMINA_DEX; ?></td>
                                                <td><?php echo $row->SOLAR; ?></td>
                                                <td><?php echo $row->BIO_SOLAR; ?></td>

                                                </tr>
                                                <?php
                                                break;
                                            }
                                        }
                                        if($status == 0)
                                        {?>
                                            <tr>
                                                <td style="display:none;"></td>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $m->NOPOL; ?></td>
                                                <td><?php echo $m->KAPASITAS; ?></td>
                                                <td><?php echo $m->PRODUK; ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                         <?php   
                                        }
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
