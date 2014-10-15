<script type="text/javascript">
    $(document).ready(function(){
        //        $("#amtMtBody").hide();
        //        $("#ms2VolumeBody").hide();
        //        $("#rencanaBody").hide();
        //        $("#indikatorKpiBody").hide();
    });
    function showPanel(index)
    {
        if(index == 1){
            $("#amtMtBody").toggle("slow");
        }
        else if(index == 2){
            $("#ms2VolumeBody").toggle("slow");
        }
        else if(index == 3){
            $("#rencanaBody").toggle("slow");
        }
        else if(index == 4){
            $("#indikatorKpiBody").toggle("slow");
        }
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
                            <?php if ($rencana_bulan[0]->total_kl > 0) {
                                echo ceil(($kinerja_bulan[0]->total_kl / $rencana_bulan[0]->total_kl) * 100);
                            } else {
                                echo "0";
                            } ?>%
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
                    <a style="cursor: pointer" onclick="showPanel(1)"><div class="revenue-head" style="background-color:teal;">
                            <span style="background-color:teal;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Grafik AMT & MT Perdepot</h3>
                            <span class="rev-combo pull-right" style="background-color:teal;">
<?php echo strftime('%B %Y',strtotime(date('F Y'))); ?>
                            </span>
                        </div></a>
                    <div class="panel-body" id="amtMtBody">
                        <section class="panel" >
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter AMT<i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('KM')">KM</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('KL')">KL</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('Ritase')">Ritase</a></li>
                                    <li><a style="cursor: pointer" onclick="changeAmtTitle('SPBU')">SPBU</a></li>
                                </ul>
                            </div>
                        <br/><br/><br/>
                            <center>
                                <div id="grafikAmt" style="width: 1000px"></div>
                            </center>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter MT<i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('KM')">KM</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('KL')">KL</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Ritase')">Ritase</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Premium')">Premium</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Pertamax')">Pertamax</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Pertamax Plus')">Pertamax Plus</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Pertamax Dex')">Pertamax Dex</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Solar')">Solar</a></li>
                                    <li><a style="cursor: pointer" onclick="changeMtTitle('Bio Solar')">Bio Solar</a></li>
                                </ul>
                            </div>
                        <br/><br/><br/>
                            <center>
                                <div id="grafikMt" style="width: 1000px"></div>
                            </center>
                        </section>
                    </div>
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <section class="panel">
                    <a style="cursor: pointer" onclick="showPanel(3)"><div class="revenue-head" style="background-color:#d9534f;">
                            <span style="background-color:#d9534f;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Realisasi dari Rencana</h3>
                            <span class="rev-combo pull-right" style="background-color:#d9534f;">
<?php echo strftime('%B %Y',strtotime(date('F Y'))); ?>
                            </span>
                        </div></a>
                    <div class="panel-body" id="rencanaBody">
                        <section class="panel" >
                            <div class="row">
                                <div class="col-lg-4">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Realisasi dari Rencana Tahun Ini
                                        </header>
                                        <div class="panel-body">
<?php
if ($kinerja_tahun[0]->premium != NULL && $rencana_tahun[0]->r_premium != NULL) {
    ?>

                                                <p class="text-muted">
                                                    Kilo Liter Premium (<?php echo $kinerja_tahun[0]->premium ?>/<?php echo $rencana_tahun[0]->r_premium ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->premium / $rencana_tahun[0]->r_premium) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Pertamax (<?php echo $kinerja_tahun[0]->pertamax ?>/<?php echo $rencana_tahun[0]->r_pertamax ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->pertamax / $rencana_tahun[0]->r_pertamax) * 100) ?>95%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Pertamax Plus (<?php echo $kinerja_tahun[0]->pertamax_plus ?>/<?php echo $rencana_tahun[0]->r_pertamax_plus ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->pertamax_plus / $rencana_tahun[0]->r_pertamax_plus) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Pertamax Dex (<?php echo $kinerja_tahun[0]->pertamina_dex ?>/<?php echo $rencana_tahun[0]->r_pertamina_dex ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-primary"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->pertamina_dex / $rencana_tahun[0]->r_pertamina_dex) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Solar (<?php echo $kinerja_tahun[0]->solar ?>/<?php echo $rencana_tahun[0]->r_solar ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->solar / $rencana_tahun[0]->r_solar) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Bio Solar (<?php echo $kinerja_tahun[0]->bio_solar ?>/<?php echo $rencana_tahun[0]->r_bio_solar ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->bio_solar / $rencana_tahun[0]->r_bio_solar) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Own Use (<?php echo $kinerja_tahun[0]->own_use ?>/<?php echo $rencana_tahun[0]->r_own_use ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_tahun[0]->own_use / $rencana_tahun[0]->r_own_use) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <?php
                                            } else {
                                                echo "<span class='btn btn-danger' > <i class='icon-exclamation-sign'></i> BELUM TERSEDIA</span>";
                                            }
                                            ?>
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
                                            if ($kinerja_bulan[0]->premium != NULL && $rencana_bulan[0]->r_premium != NULL) {
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
                                                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax / $rencana_bulan[0]->r_pertamax) * 100) ?>95%">
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
                                            } else {
                                                echo "<span class='btn btn-danger' > <i class='icon-exclamation-sign'></i> BELUM TERSEDIA</span>";
                                            }
                                            ?>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-4">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Realisasi dari Rencana Hari Ini
                                        </header>
                                        <div class="panel-body">
<?php
if ($kinerja_hari[0]->premium != NULL && $rencana_hari[0]->premium != NULL) {
    ?>
                                                <p class="text-muted">
                                                    Kilo Liter Premium (<?php echo $kinerja_hari[0]->premium ?>/<?php echo $rencana_hari[0]->r_premium ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->premium / $rencana_hari[0]->r_premium) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Pertamax (<?php echo $kinerja_hari[0]->pertamax ?>/<?php echo $rencana_hari[0]->r_pertamax ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->pertamax / $rencana_hari[0]->r_pertamax) * 100) ?>95%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Pertamax Plus (<?php echo $kinerja_hari[0]->pertamax_plus ?>/<?php echo $rencana_hari[0]->r_pertamax_plus ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->pertamax_plus / $rencana_hari[0]->r_pertamax_plus) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Pertamax Dex (<?php echo $kinerja_hari[0]->pertamina_dex ?>/<?php echo $rencana_hari[0]->r_pertamina_dex ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-primary"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->pertamina_dex / $rencana_hari[0]->r_pertamina_dex) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Solar (<?php echo $kinerja_hari[0]->solar ?>/<?php echo $rencana_hari[0]->r_solar ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->solar / $rencana_hari[0]->r_solar) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Bio Solar (<?php echo $kinerja_hari[0]->bio_solar ?>/<?php echo $rencana_hari[0]->r_bio_solar ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->bio_solar / $rencana_hari[0]->r_bio_solar) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>

                                                <p class="text-muted">
                                                    Kilo Liter Own Use (<?php echo $kinerja_hari[0]->own_use ?>/<?php echo $rencana_hari[0]->r_own_use ?> Kl)
                                                </p>
                                                <div class="progress progress-striped progress-sm active">
                                                    <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="110" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_hari[0]->own_use / $rencana_hari[0]->r_own_use) * 100) ?>%">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>
    <?php
} else {
    echo "<span class='btn btn-danger' > <i class='icon-exclamation-sign'></i> BELUM TERSEDIA</span>";
}
?>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        </section>
                    </div>
                </section>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <section class="panel">
                    <a style="cursor: pointer" onclick="showPanel(2)"><div class="revenue-head" style="background-color:steelblue;">
                            <span style="background-color:steelblue;">
                                <i class="icon-exclamation-sign"></i>
                            </span>
                            <h3>Grafik KPI</h3>
                            <span class="rev-combo pull-right" style="background-color:steelblue;">
<?php echo strftime('%B %Y',strtotime(date('F Y'))); ?>
                            </span>
                        </div></a>
                    <div id="ms2VolumeBody">
                        <section class="panel" >
                            <div class="panel-body">
                                <div id="grafikKpi"></div>
                                &nbsp;&nbsp;<span class='btn btn-warning' > <i class='icon-warning-sign'></i></span>  <b> = Hasil dibawah target</b>
                                   <br/><br/><br/>
                                <div id="grafikKpiApms"></div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </div>
<?php echo strftime('%B %Y',strtotime(date('F Y'))); ?>


    </section>

</div>
</div>
</section>
</section>
<script src="<?php echo base_url() ?>assets/js/grouped-categories.js"></script>
<script type="text/javascript">
    var amt;
    var kpi;
    var tahun_kpi = new Array();
    var series_kpi = new Array();
    var series_kpi_apms = new Array();
    var set = new Array();
    var target = new Array();
    var set_apms = new Array();
    var arrColorKpi = new Array('#FF002B','#2C88D4','#23C906','#F5A905');
<?php
foreach ($kpi['tahun'] as $tahun) {
    ?>
                    tahun_kpi.push("<?php echo $tahun ?>");
    <?php
}
$i = 0;
foreach ($kpi['data'] as $data) {
    ?>
                    set = new Array();
    <?php
    foreach ($data['kpi'] as $dt) {
        ?>
                            set.push(<?php echo round($dt, 2) ?>);
                            set_apms.push(<?php echo rand(97, 105)?>);
                            target.push(100);
        <?php
    }
    ?>
                    series_kpi.push({
                        name:'<?php echo $data['depot'] ?>',
                        color : arrColorKpi[<?php echo $i ?>],
                        id : '<?php echo $data['id_depot'] ?>',
                        data: set
                    });
    <?php
    $i++;
}
?>
         $(function() {
            kpi = new Highcharts.Chart({ 
                chart: {
                    renderTo:'grafikKpi',
                    type:'column'
                },
                title: {
                    text: 'Nilai KPI Depot Pertahun'
                },
                plotOptions: {
               
                    column: {
                        point:{
                            events:{
                                click: function(event) {
                                    window.location = "<?php echo base_url() ?>depot/grafik_bulan/"+ this.series.options.id +"/"+this.category;
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
                    },
                    
                    valueSuffix:' %'
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
                series: series_kpi
            });
        });
<?php

$i = 0;
foreach($depot_apms as $dp)
{
    ?>
        set = new Array();
    <?php
    foreach ($tahun_arr as $tahun) {
        $status = 0;
        foreach($kpi_apms as $k_apms)
        {
            if($k_apms->ID_DEPOT == $dp->ID_DEPOT && $k_apms->tahun == $tahun)
            {
                ?>
                 set.push(<?php echo $k_apms->rata_rata?>);
                <?php
                $status = 1;
                break;
            }

        }
        if($status == 0)
        {
            ?>
                set.push(0);
            <?php
            
        }
    }
    ?>
     series_kpi_apms.push({
        name:'<?php echo $dp->NAMA_DEPOT ?>',
        color : arrColorKpi[<?php echo $i ?>],
        id : '<?php echo $dp->ID_DEPOT ?>',
        data: set
    });   
        <?php
    $i++;
}
?>
         var apms;
        $(function() {
            apms = new Highcharts.Chart({ 
                chart: {
                    renderTo:'grafikKpiApms',
                    type:'column'
                },
                title: {
                    text: 'Nilai KPI APMS Depot Pertahun'
                },
                plotOptions: {
               
                    column: {
                        point:{
                            events:{
                                click: function(event) {
                                    window.location = "<?php echo base_url() ?>depot/grafik_apms_bulan/"+ this.series.options.id +"/"+this.category;
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
                    },
                    valueSuffix:' %'
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
                series: series_kpi_apms
            });
        });
        var arrKmAmt = new Array();
        var arrKlAmt = new Array();
        var arrRitaseAmt = new Array();
        var arrSpbuAmt = new Array();
        var arrColorAmt = new Array('#FF002B','#2C88D4','#23C906','#F5A905');
        var arrTahun = new Array();
        var id_depot_amt = new Array();
<?php
$tahun = "";
for ($j = 0; $j < sizeof($kinerja_amt); $j++) {
    if ($kinerja_amt[$j]->tahun != $tahun) {
        $tahun = $kinerja_amt[$j]->tahun;
        ?>arrTahun.push('<?php echo $tahun ?>');<?php
    }
}
for ($i = 0; $i < sizeof($depot); $i++) {
    ?>
                    arrKmAmt.push({
                        name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                        color : arrColorAmt[<?php echo $i ?>],
                        data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_amt); $j++) {
        if ($kinerja_amt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_amt[$j]->total_km;
            if ($j < sizeof($kinerja_amt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KM'
                                }
                            });
                            arrKlAmt.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColorAmt[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_amt); $j++) {
        if ($kinerja_amt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_amt[$j]->total_kl;
            if ($j < sizeof($kinerja_amt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrRitaseAmt.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColorAmt[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_amt); $j++) {
        if ($kinerja_amt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_amt[$j]->ritase;
            if ($j < sizeof($kinerja_amt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' Rit'
                                }
                            });
                            arrSpbuAmt.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColorAmt[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_amt); $j++) {
        if ($kinerja_amt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_amt[$j]->spbu;
            if ($j < sizeof($kinerja_amt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' SPBU'
                                }
                            });
                            id_depot_amt.push(<?php echo $depot[$i]->ID_DEPOT ?>);
    <?php
}
?>
        $(function () {
            amt = new Highcharts.Chart({ 
                chart: {
                    type: 'column',
                    renderTo: 'grafikAmt'
                },
                title: {
                    text: 'Grafik AMT Indikator KM'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories:arrTahun,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' KM'
                },
           
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }, 
                    column: {
                        point:{
                            events: {
                                click: function(event) {
                                    window.location = "<?php echo base_url() ?>depot/amt_depot/"+id_depot_amt[this.series.index]+"/"+this.category;
                                }
                            }
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: arrKmAmt
            });
        });
    
        /*---------GRAFIK MT---------*/
        
        var mt;
        var arrKm = new Array();
        var arrKl = new Array();
        var arrRitase = new Array();
        var arrPremium = new Array();
        var arrPertamax = new Array();
        var arrPertamaxPlus = new Array();
        var arrSolar = new Array();
        var arrBioSolar = new Array();
        var arrPertamaxDex = new Array();
        var arrColor = new Array('#FF002B','#2C88D4','#23C906','#F5A905');
        var tahun = new Array();
        var id_depot = new Array();
    
<?php
$tahun = "";
for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
    if ($kinerja_mt[$j]->tahun != $tahun) {
        $tahun = $kinerja_mt[$j]->tahun;
        ?>tahun.push('<?php echo $tahun ?>');<?php
    }
}
for ($i = 0; $i < sizeof($depot); $i++) {
    ?>
                    arrKm.push({
                        name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                        color : arrColor[<?php echo $i ?>],
                        data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->total_km;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KM'
                                }
                            });
                            arrKl.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->total_kl;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrRitase.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->ritase;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' Rit'
                                }
                            });
                            arrPremium.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->premium;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrPertamax.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->pertamax;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrPertamaxPlus.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->pertamax_plus;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrPertamaxDex.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->pertamina_dex;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrSolar.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->solar;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            arrBioSolar.push({
                                name:'<?php echo $depot[$i]->NAMA_DEPOT ?>',
                                color : arrColor[<?php echo $i ?>],
                                data:[
    <?php
    for ($j = 0; $j < sizeof($kinerja_mt); $j++) {
        if ($kinerja_mt[$j]->ID_DEPOT == $depot[$i]->ID_DEPOT) {
            echo $kinerja_mt[$j]->bio_solar;
            if ($j < sizeof($kinerja_mt) - 1)
                echo ",";
        }
    }
    ?>
                                ],
                        tooltip: {
                            valueSuffix: ' KL'
                                }
                            });
                            id_depot.push(<?php echo $depot[$i]->ID_DEPOT ?>);
    <?php
}
?>
        $(function () {
            mt = new Highcharts.Chart({ 
                chart: {
                    type: 'column',
                    renderTo: 'grafikMt'
                },
                title: {
                    text: 'Grafik MT Indikator KM'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: tahun,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' KM'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }, 
                    column: {
                        point:{
                            events: {
                                click: function(event) {
                                    window.location = "<?php echo base_url() ?>depot/mt_depot/"+id_depot[this.series.index]+"/"+this.category;
                                }
                            }
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: arrKm
            });
        });
        function changeAmtTitle(title)
        {
            amt.setTitle({text: "Grafik AMT Indikator " + title});      
            var series = amt.series.length; 
            while(amt.series.length > 0)
                amt.series[0].remove(true);
            var i = 0;
            for(i = 0 ; i < series ; i++)
            {    
                if(title == "KL"){
                    amt.addSeries(arrKlAmt[i]);
                }else if(title == "KM"){
                    amt.addSeries(arrKmAmt[i]);
                }else if (title == "Ritase"){
                    amt.addSeries(arrRitaseAmt[i]);
                }else if(title == "SPBU"){
                    amt.addSeries(arrSpbuAmt[i]);
                }
            }
        }
        function changeMtTitle(title)
        {
            mt.setTitle({text: "Grafik MT Indikator " + title});
            var series = mt.series.length; 
            while(mt.series.length > 0)
                mt.series[0].remove(true);
            var i = 0;
            for(i = 0 ; i < series ; i++)
            {    
                if(title == "KL"){
                    mt.addSeries(arrKl[i]);
                }else if(title == "KM"){
                    mt.addSeries(arrKm[i]);

                }else if(title == "Ritase"){
                    mt.addSeries(arrRitase[i]);

                } else if(title == "Premium"){
                    mt.addSeries(arrPremium[i]);

                } else if(title == "Pertamax"){
                    mt.addSeries(arrPertamax[i]);

                }else if(title == "Pertamax Plus"){
                    mt.addSeries(arrPertamaxPlus[i]);

                }else if(title == "Pertamax Dex"){
                    mt.addSeries(arrPertamaxDex[i]);

                }else if(title == "Solar"){
                    mt.addSeries(arrSolar[i]);

                }else if(title == "Bio Solar"){
                    mt.addSeries(arrBioSolar[i]);

                }
            }
        }
</script>