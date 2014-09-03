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
        foreach($grafik as $km){
            ?>
             
                kl_mt.push(<?php echo $km->TOTAL_KL_MT ?>);
                km_mt.push(<?php echo $km->TOTAL_KM_MT ?>);
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
                text: '<?php echo $tanggal?>',
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
       
        mt.series[0].setVisible(true);
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
        if(start + limit >= nopol_mt.length)
        {
            $("#selanjutnya").hide();
        }
        $("#sebelum").show();
        setData();
    }
    
    function setData()
    {
        var i = 0;
        for(i = 0 ; i < mt.series.length ; i++)
        {
            mt.series[i].setVisible(false);
        }
        mt.series[0].setVisible(true);
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
    }
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body" id="grafikBody">
                        <div id="grafik"></div><br/><br/>
                        <button class='btn btn-danger' id="sebelum" onclick="sebelumOnClick()"><i class='icon-long-arrow-left'></i> sebelumnya</button>
                        <button class='btn btn-danger' style='float:right;' id="selanjutnya" onclick="selanjutnyaOnClick()">selanjutnya <i class='icon-long-arrow-right'></i></button>
                    </div>
                </section>
                <section class="panel">
                     <header class="panel-heading">
                            Tabel Kinerja Mobil Tangki 24 Agustus Tahun 2014
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
                                     <?php $i = 1;
                                    foreach ($grafik as $row) { ?>
                                        <td style="display:none;"></td>
                                        <td><?php echo $i ?></td>
                                        <td><a href="<?php echo base_url() ?>mt/detail_mt/<?php echo $row->ID_MOBIL; ?>" style ="text-decoration: underline"><?php echo $row->NOPOL; ?></a></td>
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
