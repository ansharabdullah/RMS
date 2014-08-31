<script type="text/javascript">

    $(document).ready(function() {
        $("#amtWarning").hide();
        $("#mtWarning").hide();
        $("#warning").show();
        $("#warningActive").addClass('active');
        $("#amtActive").removeClass('active');
        $("#mtActive").removeClass('active');
    });

    function amtWarning() {
        $("#amtWarning").show();
        $("#mtWarning").hide();
        $("#warning").hide();
        $("#warningActive").removeClass('active');
        $("#amtActive").addClass('active');
        $("#mtActive").removeClass('active');
    }

    function mtWarning() {
        $("#amtWarning").hide();
        $("#mtWarning").show();
        $("#warning").hide();
        $("#warningActive").removeClass('active');
        $("#amtActive").removeClass('active');
        $("#mtActive").addClass('active');
    }

    function warning() {
        $("#amtWarning").hide();
        $("#mtWarning").hide();
        $("#warning").show();
        $("#warningActive").addClass('active');
        $("#amtActive").removeClass('active');
        $("#mtActive").removeClass('active');
    }

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
                            <?php if($rencana_bulan[0]->total_kl > 0){echo ceil(($kinerja_bulan[0]->total_kl / $rencana_bulan[0]->total_kl) * 100);}else{echo "0";} ?>%
                        </h1>
                        <p>Realisasi KL</p>
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
            <div class="col-lg-8">
                <section class="panel">
                    <div class="panel-body">
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
                        <div id="grafik"></div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4">

                <section class="panel">
                    <div class="revenue-head">
                        <span>
                            <i class="icon-exclamation-sign"></i>
                        </span>
                        <h3>Peringatan </h3>
                        <span class="rev-combo pull-right">
                            <?php echo date("F Y")?>
                        </span>
                    </div>
                    <div class="panel-body" style="height: 350px; overflow-y:scroll">
                        <section class="panel" id="warning" >
                            <header class="panel-heading">
                                Peringatan Bulan Ini
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i = 0 ; $i < sizeof($peringatan);$i++){
                                            ?>
                                                <tr>
                                                    <td><?php echo $peringatan[$i]['tanggal']?></td>
                                                    <td><?php echo $peringatan[$i]['keterangan']?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </section>
                        <section class="panel" id="amtWarning">
                            <header class="panel-heading">
                                Peringatan AMT
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Data AMT hari ini belum diinput</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Data AMT tgl 07-08-2014 belum diupload</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pegawai1 Hari ini tidak masuk</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Pegawai2 Hari ini tidak masuk</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                        <section class="panel" id="mtWarning">
                            <header class="panel-heading">
                                Peringatan MT
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    foreach($peringatan_mt as $pm)
                                    {
                                        if(isset($pm['data']) && sizeof($pm['data']) > 0){
                                        ?>
                                        <tr>
                                            <td><?php echo $pm['title']?></td>
                                            <td><a href="<?php echo $pm['url']?>">
                                                <?php
                                                    foreach($pm['data'] as $data){
                                                        echo $data."<br/>";
                                                    }
                                                ?>
                                            </a></td>
                                        </tr>
                                       <?php
                                        }
                                    }
                                   ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <div class="panel-footer revenue-foot">
                        <ul>
                            <li class="first" id="mtActive">
                                <a href="javascript:;" onclick="mtWarning()">
                                    <i class=" icon-truck"></i>
                                    MT
                                </a>
                            </li>
                            <li id="amtActive">
                                <a href="javascript:;" onclick="amtWarning()">
                                    <i class=" icon-user"></i>
                                    AMT
                                </a>
                            </li>
                            <li class="last" id="warningActive">
                                <a href="javascript:;" onclick="warning()">
                                    <i class="icon-bullseye"></i>
                                    Peringatan
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <div class="panel-body">
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter MT<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a style="cursor: pointer" onclick="filterMt('KM')">KM</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('KL')">KL</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Own Use')">Own Use</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax')">Pertamax</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax Plus')">Pertamax Plus</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax Dex')">Pertamax Dex</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Solar')">Solar</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Bio Solar')">Bio Solar</a></li>
                            </ul>
                        </div>
                        <div id="grafik1"></div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4">
                <section class="panel">
                    <header class="panel-heading">
                        Realisasi dari Rencana Bulan Ini
                    </header>
                    <div class="panel-body">
                        <?php
                            if($rencana_bulan[0]->r_premium > 0)
                            {
                        ?>
                        <p class="text-muted">
                            Kilo Liter Premium (<?php echo $kinerja_bulan[0]->premium ?>/<?php echo $rencana_bulan[0]->r_premium ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->premium / $rencana_bulan[0]->r_premium) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax (<?php echo $kinerja_bulan[0]->pertamax ?>/<?php echo $rencana_bulan[0]->r_pertamax ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax / $rencana_bulan[0]->r_pertamax) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Plus (<?php echo $kinerja_bulan[0]->pertamax_plus ?>/<?php echo $rencana_bulan[0]->r_pertamax_plus ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax_plus / $rencana_bulan[0]->r_pertamax_plus) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Pertamax Dex (<?php echo $kinerja_bulan[0]->pertamina_dex ?>/<?php echo $rencana_bulan[0]->r_pertamina_dex ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-primary"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamina_dex / $rencana_bulan[0]->r_pertamina_dex) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Solar (<?php echo $kinerja_bulan[0]->solar ?>/<?php echo $rencana_bulan[0]->r_solar ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->solar / $rencana_bulan[0]->r_solar) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Bio Solar (<?php echo $kinerja_bulan[0]->bio_solar ?>/<?php echo $rencana_bulan[0]->r_bio_solar ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->bio_solar / $rencana_bulan[0]->r_bio_solar) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                        <p class="text-muted">
                            Kilo Liter Own Use (<?php echo $kinerja_bulan[0]->own_use ?>/<?php echo $rencana_bulan[0]->r_own_use ?> Kl)
                        </p>
                        <div class="progress progress-striped progress-sm active">
                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->own_use / $rencana_bulan[0]->r_own_use) * 100) ?>%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>
                        <?php
                            }else{
                                echo "<span class='btn btn-danger' > <i class='icon-exclamation-sign'></i> Data rencana belum tersedia</span>";
                            }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript">


    var amt;
    var kl_amt = new Array();
    var km_amt = new Array();
    var total_km_amt = new Array();
    var ritase_amt = new Array();
    var spbu = new Array();

    <?php
$i = 0;
for ($date = strtotime($kinerja_amt[0]->TANGGAL_LOG_HARIAN); $date <= strtotime($kinerja_amt[sizeof($kinerja_amt) - 1]->TANGGAL_LOG_HARIAN); $date = strtotime("+1 day", $date)) {
    //echo date("Y-m-d", $date)."";
    if ($kinerja_amt[$i]->TANGGAL_LOG_HARIAN == date("Y-m-d", $date)) {
        ?>
                        kl_amt.push(<?php echo $kinerja_amt[$i]->total_kl ?>);
                        km_amt.push(<?php echo $kinerja_amt[$i]->total_km ?>);
                        total_km_amt.push(<?php echo $kinerja_amt[$i]->total_km ?>);
                        ritase_amt.push(<?php echo $kinerja_amt[$i]->ritase ?>);
                        spbu.push(<?php echo $kinerja_amt[$i]->spbu ?>);
        <?php
        $i++;
    } else {
        ?>
                        kl_amt.push(0);
                        km_amt.push(0);
                        total_km_amt.push(0);
                        ritase_amt.push(0);
                        spbu.push(0);
        <?php
    }
}
?>
    
    var start_tahun_amt = "<?php echo date("Y", strtotime($kinerja_amt[0]->TANGGAL_LOG_HARIAN)); ?>";
    var start_bulan_amt = "<?php echo (date("m", strtotime($kinerja_amt[0]->TANGGAL_LOG_HARIAN)) - 1); ?>";
    var start_tanggal_amt = "<?php echo date("d", strtotime($kinerja_amt[0]->TANGGAL_LOG_HARIAN)); ?>";
    $(function() {
        amt = new Highcharts.Chart({ 
            chart: {
                zoomType: 'x',
                renderTo:'grafik'
            },
            title: {
                text: 'Grafik AMT'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Klik dan tarik di area plot untuk memperbesar gambar' :
                    'Sorot Grafik Untuk Memperbesar'
            },
            xAxis: {
                type: 'datetime',
                minRange: 14 * 24 * 3600000 // ten days
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            legend : {enabled: true},
            series: [{
                    type: 'area',
                    name: 'KM',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(start_tahun_amt, start_bulan_amt, start_tanggal_amt),
                    data: km_amt
                
                }]
        });
    });

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
<?php
$i = 0;
for ($date = strtotime($kinerja_mt[0]->TANGGAL_LOG_HARIAN); $date <= strtotime($kinerja_mt[sizeof($kinerja_mt) - 1]->TANGGAL_LOG_HARIAN); $date = strtotime("+1 day", $date)) {
    //echo date("Y-m-d", $date)."";
    if ($kinerja_mt[$i]->TANGGAL_LOG_HARIAN == date("Y-m-d", $date)) {
        ?>
                        kl_mt.push(<?php echo $kinerja_mt[$i]->total_kl ?>);
                        km_mt.push(<?php echo $kinerja_mt[$i]->total_km ?>);
                        total_km_mt.push(<?php echo $kinerja_mt[$i]->total_km ?>);
                        premium.push(<?php echo $kinerja_mt[$i]->premium ?>);
                        pertamax.push(<?php echo $kinerja_mt[$i]->pertamax ?>);
                        pertamax_plus.push(<?php echo $kinerja_mt[$i]->pertamax_plus ?>);
                        pertamina_dex.push(<?php echo $kinerja_mt[$i]->pertamina_dex ?>);
                        solar.push(<?php echo $kinerja_mt[$i]->solar ?>);
                        bio_solar.push(<?php echo $kinerja_mt[$i]->bio_solar ?>);
                        own_use_mt.push(<?php echo $kinerja_mt[$i]->own_use ?>);
        <?php
        $i++;
    } else {
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
        <?php
    }
}
?>
    var start_tahun = "<?php echo date("Y", strtotime($kinerja_mt[0]->TANGGAL_LOG_HARIAN)); ?>";
    var start_bulan = "<?php echo (date("m", strtotime($kinerja_mt[0]->TANGGAL_LOG_HARIAN)) - 1); ?>";
    var start_tanggal = "<?php echo date("d", strtotime($kinerja_mt[0]->TANGGAL_LOG_HARIAN)); ?>";
    $(function () {
        mt = new Highcharts.Chart({ 
            chart: {
                zoomType: 'x',
                renderTo: 'grafik1'
            },
            title: {
                text: 'Grafik MT'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Klik dan tarik di area plot untuk memperbesar gambar' :
                    'Sorot Grafik Untuk Memperbesar'
            },
            xAxis: {
                type: 'datetime',
                minRange: 14 * 24 * 3600000 // fourteen days
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            legend: {
                enabled: false
            },

            series: [{
                    type: 'area',
                    name: 'KM',
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(start_tahun, start_bulan, start_tanggal),
                    data: km_mt
                
                }]
        });
    });
  
    function filterMt(title)
    {
        mt.legend.allItems[0].update({name:title});
        if(title == "KM"){
             mt.series[0].setData(total_km_mt);
        }
        else if(title == "KL"){
            mt.series[0].setData(kl_mt);
            
        }else if(title == "Own Use"){
            mt.series[0].setData(own_use_mt);
                
        }else if(title == "Premium"){
            mt.series[0].setData(premium);
            
        }else if(title == "Pertamax"){
            mt.series[0].setData(pertamax);
            
        }else if(title == "Pertamax Plus") {
            mt.series[0].setData(pertamax_plus);
            
        }else if(title == "Pertamax Dex") {
            mt.series[0].setData(pertamina_dex);
            
        }else if(title == "Solar"){
            mt.series[0].setData(solar);
            
        }else if(title == "Bio Solar"){
            mt.series[0].setData(bio_solar);
        } 
        
    }
    
    function filterAmt(title)
    {
        amt.legend.allItems[0].update({name:title});
        if(title == "KM"){
             amt.series[0].setData(total_km_amt);
        }
        else if(title == "KL"){
            amt.series[0].setData(kl_amt);
            
        }else if(title == "Ritase"){
            amt.series[0].setData(ritase_amt);
                
        }else if(title == "SPBU"){
            amt.series[0].setData(spbu);
            
        }
        
    }
</script>