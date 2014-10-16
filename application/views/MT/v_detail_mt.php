<?php
function DateToIndo($date) { 
        $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        $tgl   = substr($date, 8, 2); 
        
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
}

?>

<script type="text/javascript">
    $( document ).ready(function() {
        $("#ShowProfile").show();
        $("#ShowEdit").hide();
    });
    
    function ShowProfile(){
        $("#ShowProfile").show();
        $("#ShowEdit").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
    }
    function ShowEdit(){
        $("#ShowProfile").hide();
        $("#ShowEdit").show();
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
    }
    
   
</script>
<script type="text/javascript">
    
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
    var hari = new Array();
    
     <?php
	$status=0;
	$tampung=0;
	$jumlah = 0;
	$bulansekarang = $tahun . "-" . $bulan;
	if ($bulansekarang == date('Y-m',strtotime($tahun . "-" . $bulan))) {
		$jumlah = date('d');
	} else if ($bulan == 1 || $bulan == 3 || $bulan == 5 || $bulan == 7 || $bulan == 8 || $bulan == 10 || $bulan == 12) {
		$jumlah = 31;
	} else if ($bulan == 4 || $bulan == 6 || $bulan == 9 || $bulan == 11) {
		$jumlah = 30;
	} else if ($bulan == 2) {
		$jumlah = 28;
		//jika kabisat
		if (date('L', strtotime($tahun . '-01-01'))) {
			$jumlah = 29;
		}
	}
        for($i=1;$i<=$jumlah;$i++)
	{
		$rit=0;
                $km=0;
                $kl=0;
                $ownuse=0;
                $prem=0;
                $pertamax=0;
                $pertamaxplus=0;
                $pertaminadex=0;
                $sol=0;
                $bio=0;
		$status=0;
		$k=0;
		?>
               hari.push(<?php echo $i; ?>);
        <?php
		foreach($kinerja as $isi){
				if($isi->hari == $i) 
				{ 
					$status =1;
					$rit = $isi->ritase_mt;
                                        $km = $isi->total_km_mt;
                                        $kl = $isi->total_kl_mt;
                                        $ownuse = $isi->own_use;
                                        //$prem = $isi->premium;
                                        //$pertamax = $isi->pertamax;
                                        //$pertamaxplus = $isi->pertamax_plus;
                                        //$pertaminadex = $isi->pertamina_dex;
                                        //$bio = $isi->bio_solar;
					$sol = $isi->solar;
				}
				$k++;
		}
		if($status==1&&$k!=0)
		{
					 ?> 
                                       
                                        ritase_mt.push(<?php echo $rit ?>);
					total_km_mt.push(<?php echo $km ?>);
                                        kl_mt.push(<?php echo $kl ?>);
                                        km_mt.push(<?php echo $km ?>);
                                        //premium.push(<?php echo $prem ?>);
                                        //pertamax.push(<?php echo $pertamax ?>);
                                        //pertamax_plus.push(<?php echo $pertamaxplus ?>);
                                        //pertamina_dex.push(<?php echo $pertaminadex ?>);
                                        //bio_solar.push(<?php echo $bio ?>);
                                        own_use_mt.push(<?php echo $ownuse ?>);
                                         solar.push(<?php echo $sol ?>);

					 <?php
		}else if($status==0&&$k!=0)
		{
					 ?> 
                                        ritase_mt.push(0);
					total_km_mt.push(0);
                                        kl_mt.push(0);
                                        km_mt.push(0);
                                        //premium.push(0);
                                        //pertamax.push(0);
                                        //pertamax_plus.push(0);
                                        //pertamina_dex.push(0);
                                        //bio_solar.push(0);
                                        own_use_mt.push(0); 
                                        solar.push(0);
					 <?php
		}
	}
    ?>
    
     
    
    $(function() {
        mt = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik'
            },
            title: {
                text: 'Grafik Kinerja Harian Jumlah KM Mobil Tangki'
            },
            subtitle: {
                text: 'Bulan <?php echo date("F", mktime(0, 0, 0, $bulan, 1, 2005))?> Tahun <?php echo $tahun ?>'
            },
            xAxis: [{
                    categories: hari
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Total',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            plotOptions: {
                  series: {
                    cursor:'pointer',
                    point:{
                      events:{
                        click: function(event) {
                            
                            }
                        }
                    }
                }
            },

            tooltip: {
                shared: true
            },
            legend: {
                enabled:false
            },
            series: [{
                    type: 'spline',
                    name: 'Jumlah',
                    data: km_mt,
                    visible : false,
                    tooltip:{
                        valueSuffix:" KM"
                    }
                }]
        });
    });
    
    
    function filterMt(title)
    {
        mt.setTitle({text: 'Grafik Kinerja Harian Jumlah '+title+' Mobil Tangki'});  
        mt.series[0].remove(true);
        if(title == "KM"){
             //mt.series[0].setData(total_km_mt);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: total_km_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KM"
                    }

                }
             );
        }
        else if(title == "KL"){
            //mt.series[0].setData(kl_mt);
            mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: kl_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Ritase"){
            mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: ritase_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" Rit"
                    }

                }
             );
        }else if(title == "Own Use"){
            //mt.series[0].setData(own_use_mt);
              mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: own_use_mt,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );  
        }else if(title == "Premium"){
            //mt.series[0].setData(premium);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: premium,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Pertamax"){
            //mt.series[0].setData(pertamax);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: pertamax,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Pertamax Plus") {
           // mt.series[0].setData(pertamax_plus);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: pertamax_plus,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Pertamax Dex") {
            //mt.series[0].setData(pertamina_dex);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: pertamina_dex,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Solar"){
            //mt.series[0].setData(solar);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: solar,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        }else if(title == "Bio Solar"){
            //mt.series[0].setData(bio_solar);
             mt.addSeries({
                    name: 'Jumlah',
                    type: 'spline',
                    data: bio_solar,
                    color : '#7cb5ec' ,
                    tooltip:{
                        valueSuffix:" KL"
                    }

                }
             );
        } 
        
    }
    
     $(document).ready(function(){
            mt.series[0].setVisible(true);
        });
    
</script>

<section id="main-content">
    <section class="wrapper">
       <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>mt/data_mt">Data Mobil</a></li>
                    <li class="active">Detail Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
            <?php foreach ($mt as $row) { ?>

            <section class="panel">
                <div class="panel-body">
                    <a href="<?php echo base_url() ?>mt/surat_mt/<?php echo $row->ID_MOBIL; ?>" rel="stylesheet" class="btn btn-primary"><i class="icon-envelope"></i> Surat</a>
                    <a href="<?php echo base_url() ?>mt/apar_mt/<?php echo $row->ID_MOBIL; ?>" rel="stylesheet" class="btn btn-primary"><i class="icon-fire-extinguisher"></i> APAR</a>
                    <a href="<?php echo base_url() ?>mt/ban_mt/<?php echo $row->ID_MOBIL; ?>" rel="stylesheet" class="btn btn-primary"> <i class=" icon-circle"></i> Ban</a>
                    <a href="<?php echo base_url() ?>mt/oli_mt/<?php echo $row->ID_MOBIL; ?>" rel="stylesheet" class="btn btn-primary"> <i class=" icon-beer"></i> Oli</a>

                </div>
            </section>


            <!-- page start-->
            <section class="panel"> 
                    <?php if ($pesan==1) {  ?>
                        <div class="alert alert-block alert-success fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                            <strong>Berhasil! </strong><?php echo $pesan_text;?>
                                </div>
                <?php } ?></section>

            <section class="panel" id="ShowProfile">
              
                <header class="panel-heading">
                    <div class="col-lg-10">Detail MT
                    </div>
                    <a class="btn btn-warning" onclick="ShowEdit()" ><i class="icon-pencil"></i> Edit</a> 

                    <a class="btn btn-danger" href="javascript:hapus('<?php echo $row->ID_MOBIL ?>');"><i class="icon-eraser"></i> Hapus</a>

                </header>
                <div class="panel-body bio-graph-primary" >
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">
                                <aside class="profile-nav col-lg-12">
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>Nopol </span>: <?php echo $row->NOPOL; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Nomor Rangka </span>: <?php echo $row->NO_RANGKA; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Kapasitas </span>: <?php echo $row->KAPASITAS; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Nomor Mesin </span>: <?php echo $row->NO_MESIN; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Produk </span>: <?php echo $row->PRODUK; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Jenis Kendaraan </span>: <?php echo $row->JENIS_KENDARAAN; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Transportir </span>: <?php echo $row->TRANSPORTIR; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Jenis Tangki</span>: <?php echo $row->JENIS_TANGKI; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Status</span>: <?php echo $row->STATUS_MOBIL; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>GPS </span>: <?php if($row->GPS == "1")echo 'Ok'?>
                                                <?php if($row->GPS == "0")echo 'No'?>
                                            </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Sensor Overfill </span>: <?php if($row->SENSOR_OVERFILL == "1")echo 'Ok'?>
                                                <?php if($row->SENSOR_OVERFILL == "0")echo 'No'?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Volume 1 </span>: <?php if($row->VOLUME_1 == "1")echo 'Ok'?>
                                                <?php if($row->VOLUME_1 == "0")echo 'No'?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Standar Volume </span>: <?php if($row->STANDAR_VOLUME == "1")echo 'Ok'?>
                                                <?php if($row->STANDAR_VOLUME == "0")echo 'No'?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Kategori </span>: <?php echo $row->KATEGORI_MOBIL; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Rasio </span>: <?php echo $row->RASIO; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Jumlah Segel </span>: <?php echo $row->JUMLAH_SEGEL; ?></p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="panel-body">
                                <aside class="profile-nav col-lg-12">
                                    <header class="panel-heading">
                                        Ruang Kosong Tangki (t1)

                                    </header>&nbsp
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>Komp 1</span>: <?php echo $row->RK1_KOMP1; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 2</span>: <?php echo $row->RK1_KOMP2; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 3</span>: <?php echo $row->RK1_KOMP3; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 4</span>: <?php echo $row->RK1_KOMP4; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 5</span>: <?php echo $row->RK1_KOMP5; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 6</span>: <?php echo $row->RK1_KOMP6; ?></p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="panel-body">
                                <aside class="profile-nav col-lg-12">
                                    <header class="panel-heading">
                                        Ruang Kosong Tangki (t2)

                                    </header>&nbsp
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>Komp 1</span>: <?php echo $row->RK2_KOMP1; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 2</span>: <?php echo $row->RK2_KOMP2; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 3</span>: <?php echo $row->RK2_KOMP3; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 4</span>: <?php echo $row->RK2_KOMP4; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 5</span>: <?php echo $row->RK2_KOMP5; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 6</span>: <?php echo $row->RK2_KOMP6; ?></p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="panel-body">
                                <aside class="profile-nav col-lg-12">
                                    <header class="panel-heading">
                                        Kepekaan

                                    </header>&nbsp
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>Komp 1</span>: <?php echo $row->K_KOMP1; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 2</span>: <?php echo $row->K_KOMP2; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 3</span>: <?php echo $row->K_KOMP3; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 4</span>: <?php echo $row->K_KOMP4; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 5</span>: <?php echo $row->K_KOMP5; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>Komp 6</span>: <?php echo $row->K_KOMP6; ?></p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel" id="ShowEdit">
                <header class="panel-heading">
                    Edit MT  
                </header>
                <div class="panel-body bio-graph-primary" >
                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>mt/detail/<?php echo $row->ID_MOBIL.'/'.$bulan.'/'.$tahun?>">
                        <div class="panel-body">
                            <input type="hidden" name="id" value="<?php echo $row->ID_MOBIL?>">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="nopol" class="control-label col-lg-4">Nopol</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NOPOL ?>" id="nop" name="nopol"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">No Rangka</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NO_RANGKA ?>" id="cama" name="no_rangka"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="ckap" class="control-label col-lg-4">Kapasitas</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="ckap" name="kapasitas">
                                            <option <?php if($row->KAPASITAS == "8")echo "selected"?> value="8">8</option>
                                            <option <?php if($row->KAPASITAS == "16")echo "selected"?> value="16">16</option>
                                            <option <?php if($row->KAPASITAS == "24")echo "selected"?> value="24">24</option>
                                            <option <?php if($row->KAPASITAS == "32")echo "selected"?> value="32">32</option>
                                            <option <?php if($row->KAPASITAS == "40")echo "selected"?> value="40">40</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">No Mesin</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NO_MESIN ?>" id="cmesin" name="no_mesin"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cpro" class="control-label col-lg-4">Produk</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="cpro" name="produk">
                                            
                                            <option <?php if($row->PRODUK == "Premium")echo "selected"?> value="Premium">Premium</option>
                                            <option <?php if($row->PRODUK == "Pertamax")echo "selected"?> value="Pertamax">Pertamax</option>
                                            <option <?php if($row->PRODUK == "Pertamax Dex")echo "selected"?> value="Pertamax Dex">Pertamax Dex</option>
                                            <option <?php if($row->PRODUK == "Pertamax Plus")echo "selected"?> value="Pertamax Plus">Pertamax Plus</option>
                                            <option <?php if($row->PRODUK == "Solar")echo "selected"?> value="Solar">Solar</option>
                                           <option <?php if($row->PRODUK == "Bio_Solar")echo "selected"?> value="Bio Solar">Bio Solar</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">Jenis Kendaraan</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->JENIS_KENDARAAN ?>" id="cjk" name="jenis_kendaraan"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="calamat" class="control-label col-lg-4">Transportir</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->TRANSPORTIR ?>" id="calamat" name="transportir"  type="text" required />
                                    </div>
                                </div> 
                                <div class="bio-row">
                                    <label for="ctglmasuk" class="control-label col-lg-4">Rasio</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RASIO ?>" id="crasio" name="rasio" type="number" required/>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cjenistangki" class="control-label col-lg-4">Jenis Tangki</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="cjenistangki" name="jenis_tangki">
                                            <option <?php if($row->JENIS_TANGKI == "Alumunium Aweco")echo "selected"?> value="Alumunium Aweco">Alumunium Aweco</option>
                                            <option <?php if($row->JENIS_TANGKI == "Carbon Steel")echo "selected"?> value="Carbon Steel">Carbon Steel</option>
                                            <option <?php if($row->JENIS_TANGKI == "Steel")echo "selected"?> value="Steel">Steel</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="bio-row">
                                    <label for="status" class="control-label col-lg-4">Status</label>
                                    <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="cstatus" name="status_mobil">
                                       <option <?php if($row->STATUS_MOBIL == "Sewa")echo "selected"?> value="Sewa">Sewa</option>
                                            <option <?php if($row->STATUS_MOBIL == "Hak Milik")echo "selected"?> value="Hak Milik">Hak Milik</option>
                                          
                                    </select>
                                </div>
                                </div>
                                <div class="bio-row">
                                    <label for="gps" class="control-label col-lg-4">GPS</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="gps" name="gps">
                                            <option <?php if($row->GPS == "1")echo "selected"?> value="1">OK</option>
                                            <option <?php if($row->GPS == "0")echo "selected"?> value="0">NO</option>
                                            
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="sensor" class="control-label col-lg-4">Sensor Overfill</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="sensor" name="sensor_overfill">
                                           <option <?php if($row->SENSOR_OVERFILL == "0")echo "selected"?> value="0">OK</option>
                                            <option <?php if($row->SENSOR_OVERFILL == "1")echo "selected"?> value="1">NO</option>
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="standar_volume" class="control-label col-lg-4">Standar Volume</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="standar_volume" name="standar_volume">
                                             <option <?php if($row->STANDAR_VOLUME == "OK")echo "selected"?> value="OK">OK</option>
                                            <option <?php if($row->STANDAR_VOLUME == "NO")echo "selected"?> value="NO">NO</option>
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="volume" class="control-label col-lg-4">Volume 1</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="volume" name="volume_1">
                                             <option <?php if($row->VOLUME_1 == "OK")echo "selected"?> value="OK">OK</option>
                                            <option <?php if($row->VOLUME_1 == "NO")echo "selected"?> value="NO">NO</option>
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="segel" class="control-label col-lg-4">Jumlah Segel</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="segel" name="jumlah_segel">
                                           <option <?php if($row->JUMLAH_SEGEL == "4")echo "selected"?> value="4">4</option>
                                            <option <?php if($row->JUMLAH_SEGEL == "6")echo "selected"?> value="6">6</option>
                                            <option <?php if($row->JUMLAH_SEGEL == "8")echo "selected"?> value="8">8</option>
                                            <option <?php if($row->JUMLAH_SEGEL == "10")echo "selected"?> value="10">10</option>
                                            <option <?php if($row->JUMLAH_SEGEL == "12")echo "selected"?> value="12">12</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <header class="panel-heading">
                            Ruang Kosong Tangki (t1)  
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp1</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK1_KOMP1 ?>" id="komp1" name="rk1_komp1"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp2</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK1_KOMP2 ?>" id="komp2" name="rk1_komp2"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp3</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK1_KOMP3 ?>" id="komp3" name="rk1_komp3"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp4</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK1_KOMP4 ?>" id="komp4" name="rk1_komp4"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp5</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK1_KOMP5 ?>" id="komp5" name="rk1_komp5"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp6</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK1_KOMP6 ?>" id="komp6" name="rk1_komp6"  type="number"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <header class="panel-heading">
                            Ruang Kosong Tangki (t2)  
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 1</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK2_KOMP1 ?>" id="k1" name="rk2_komp1"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 2</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK2_KOMP2 ?>" id="k2" name="krk2_komp2"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 3</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK2_KOMP3 ?>" id="k3" name="rk2_komp3"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 4</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK2_KOMP4 ?>" id="k4" name="rk2_komp4"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 5</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK2_KOMP5 ?>" id="k5" name="rk2_komp5"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 6</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->RK2_KOMP6 ?>" id="k6" name="rk2_komp6"  type="number"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <header class="panel-heading">
                            Kepekaan  
                        </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 1</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->K_KOMP1 ?>" id="ke1" name="k_komp1"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 2</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->K_KOMP2 ?>" id="ke2" name="k_komp2"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 3</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->K_KOMP3 ?>" id="ke3" name="k_komp3"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 4</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->K_KOMP4 ?>" id="ke4" name="k_komp4"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 5</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->K_KOMP5 ?>" id="ke5" name="k_komp5"  type="number"  />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">Komp 6</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->K_KOMP6 ?>" id="ke6" name="k_komp6"  type="number"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="reset" class="btn btn-default" onclick="ShowProfile()"value="Batal" />
                            <input class="btn btn-success" type="submit" value="Simpan" name="simpan"/>
                        </div>
                    </form>

            </section>
  <?php } ?>              
            
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12"><header class="panel-heading">
                            Grafik Harian MT
                        </header>
                        <div class="panel-body" >
                            <!--                        <form class="cmxform form-horizontal tasi-form" action="" role="form" method="POST">-->
                            <?php
                                $attr = array("class"=>"cmxform form-horizontal tasi-form");
                               echo form_open("mt/mt_hari/".$id_mobil,$attr);
                               
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                            <?php echo form_close()?>
                    <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter MT<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a style="cursor: pointer" onclick="filterMt('KM')">KM</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('KL')">KL</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Ritase')">Ritase</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Own Use')">Own Use</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Premium')">Premium</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax')">Pertamax</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax Plus')">Pertamax Plus</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Pertamax Dex')">Pertamax Dex</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Solar')">Solar</a></li>
                                <li><a style="cursor: pointer" onclick="filterMt('Bio Solar')">Bio Solar</a></li>
                            </ul>
                        </div>
                        <br><br><br>
                    <div class="col-lg-12">
                        <div id="grafik"></div>
                    </div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    Tabel Kinerja MT
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        
                        <div class="adv-table editable-table " style="overflow-x: scroll; overflow-y:hidden">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Km</th>
                                    <th>Kl</th>
                                    <th>Rit </th>
                                    <th>Own Use</th>
                                    <th>Premium</th>
                                    <th>Pertamax</th>
                                    <th>Pertamax Plus</th>
                                    <th>Pertamax Dex</th>
                                    <th>Solar</th>
                                    <th>Bio Solar</th>
                                    <th>Kehadiran</th>

                                    <th colspan='2' >Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php
                                        $status=0;
                                            $i = 1;

                                            $jumlah = 0;
                                            $bulansekarang = date('Y') . "-" . date('m');
                                             if ($bulansekarang == date('Y-m',strtotime($tahun . "-" . $bulan))) {
                                                $jumlah = date('d');
                                             }else if ($bulan == 1 || $bulan == 3 || $bulan == 5 || $bulan == 7 || $bulan == 8 || $bulan == 10 || $bulan == 12) {
                                                $jumlah = 31;
                                            } else if ($bulan == 4 || $bulan == 6 || $bulan == 9 || $bulan == 11) {
                                                $jumlah = 30;
                                            } else if ($bulan == 2) {
                                                $jumlah = 28;
                                                //jika kabisat
                                                if (date('L', strtotime($tahun . '-01-01'))) {
                                                    $jumlah = 29;
                                                }
                                            }

                                 for ($i = 1; $i <= $jumlah; $i++) {
                                     foreach ($kinerja as $row) {
                                        $status = 0;
                                         if ($i == $row->hari) {
                                            $status = 1;
                                             break;
                                                    } else {
                                                        $status = 0;
                                                    }
                                                }
                                                if ($status == 1) {
                                                    ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('d M Y',  strtotime($row->tanggal_log_harian)); ?></td>
                                    <td><?php echo $row->total_km_mt; ?></td>
                                    <td><?php echo $row->total_kl_mt; ?></td>
                                    <td><?php echo $row->ritase_mt; ?></td>
                                    <td><?php echo $row->own_use; ?></td>
                                    <td><?php echo $row->premium; ?></td>
                                    <td><?php echo $row->pertamax; ?></td>
                                    <td><?php echo $row->pertamax_plus; ?></td>
                                    <td><?php echo $row->pertamina_dex; ?></td>
                                    <td><?php echo $row->solar; ?></td>
                                    <td><?php echo $row->bio_solar; ?></td>
                                    <td><span class="label label-success">Hadir</span></td>
                                    
                                   <td>
                                    <a onclick="editKinerja('<?php echo $id_mobil ?>','<?php echo $row->id_kinerja_mt ?>','<?php echo $row->tanggal_log_harian ?>','<?php echo $row->total_km_mt ?>','<?php echo $row->total_kl_mt ?>','<?php echo $row->ritase_mt ?>','<?php echo $row->own_use ?>','<?php echo $row->premium ?>','<?php echo $row->pertamax ?>','<?php echo $row->pertamax_plus ?>','<?php echo $row->pertamina_dex ?>','<?php echo $row->solar ?>','<?php echo $row->bio_solar ?>')" data-placement="top" data-toggle="modal" href="#MyModal" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a><br>

                                    </td>
                                   <td>
                                       <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus" data-placement="top" onclick="hapusKinerja('<?php echo $row->id_kinerja_mt?>','<?php echo date('d M Y',  strtotime($row->tanggal_log_harian))?>')" data-toggle="modal" href="#ModalHapusKinerja"><i class="icon-remove"></i></a>       

                                   </td>
                                    </tr>
                                <?php
                                                } else {
                                                    $day = 0;
                                                    if ($i < 10) {
                                                        $day = $day . $i;
                                                    } else {
                                                        $day = $i;
                                                    }
                                                    $tanggal = $tahun . "-" . $bulan . "-" . $day;
                                                    ?>
                                                    <tr class="">
                                                        <td style="display:none;"></td>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo date('d M Y',  strtotime($tanggal)) ?></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td><span class="label label-danger">Absen</span></td>
                                                        <td colspan ="2">
                                                            <a onclick="tambahKinerja('<?php echo date('d M Y',  strtotime($tanggal))?>','<?php echo $id_mobil?>')" data-placement="top" data-toggle="modal" href="#Modal" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                            </tbody>
                        </table>
                       </div>
                    </div>
                </div>


            </section>


            <!-- page end-->
        </section>
    </section>
    <!--main content end-->





    <div class="modal fade" id="ModalHapusKinerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Kinerja</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url() ?>mt/detail/<?php echo $id_mobil.'/'.$bulan.'/'.$tahun ?>">
                    Apakah anda yakin akan menghapus data kinerja mobil tanggal <span id="tanggal_log" name="tanggal_log"></span> ?
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
						<input type="hidden" value="" name="id_kinerja_mt" id="id_kinerja_mt"></input>
                                                <input type="hidden" value="" name="tanggal" id="tanggal_log_hari"></input>
						<input type="submit" value="Hapus" name="hapuskinerja" class="btn btn-danger danger"></input>
					</div>
					</form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>mt/detail/<?php echo $id_mobil.'/'.$bulan.'/'.$tahun?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="nip" class="control-label col-lg-2">Tanggal</label>
                            <div class="col-lg-10">
                                <input class=" form-control input-sm m-bot15" id="tanggal_kinerja" name="tanggal_kinerja" type="date" required readonly/>
                                
                            </div>
                                <input class=" form-control input-sm m-bot15" id="id_kinerja" name="id_kinerja_mt" minlength="1" type="hidden" required readonly/>
                                <input class=" form-control input-sm m-bot15" id="id_mobil" name="id_mobil" minlength="1" type="hidden" required />
                                 

                        </div>
                        <div class="form-group ">
                            <label for="kl" class="control-label col-lg-2">Kilometer (km)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="km" name="total_km_mt"  type="number" required />
                            </div>
                             <label for="km" class="control-label col-lg-2">Kiloliter (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="kl" name="total_kl_mt"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ownuse" class="control-label col-lg-2">Own Use (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="own_use" name="own_use"  type="number" required />
                            </div>
                            <label for="p" class="control-label col-lg-2">Premium (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="premium" name="premium"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="per" class="control-label col-lg-2">Pertamax (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="pertamax" name="pertamax"  type="number" required />
                            </div>
                            <label for="pp" class="control-label col-lg-2">Pertamax Plus (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="pertamax_plus" name="pertamax_plus"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="perdex" class="control-label col-lg-2">Pertamax Dex (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="pertamina_dex" name="pertamina_dex"  type="number" required />
                            </div>
                            <label for="solar" class="control-label col-lg-2">Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="solar" name="solar"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="bio" class="control-label col-lg-2">Bio Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="bio_solar" name="bio_solar"  type="number" required />
                            </div>
                             
                            <label for="rit" class="control-label col-lg-2">Ritase (rit)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="rit" name="ritase_mt"  type="number" required />
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" name="simpan2" type="submit" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="POST" action="<?php echo base_url() ?>mt/detail/<?php echo $id_mobil.'/'.$bulan.'/'.$tahun?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="nip" class="control-label col-lg-2">Tanggal</label>
                            <div class="col-lg-10">
                                
                                <input class=" form-control input-sm m-bot15" id="ttanggal_kinerja" name="tanggal_kinerja" size="16" type="text" value="" readonly/>
                                
                            </div>
                                <input class=" form-control input-sm m-bot15" id="tid_kinerja" name="id_kinerja_mt" minlength="1" type="hidden" required readonly/>
                                <input class=" form-control input-sm m-bot15" id="tid_mobil" name="id_mobil" minlength="1" type="hidden" required />
                                 

                        </div>
                        <div class="form-group ">
                            <label for="km" class="control-label col-lg-2">Kilometer (km)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mkm" name="total_km_mt"  type="number" required />
                            </div>
                            <label for="kl" class="control-label col-lg-2">Kiloliter (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mkl" name="total_kl_mt"  type="number" required />
                            </div>
                             
                        </div>
                        <div class="form-group ">
                            <label for="ownuse" class="control-label col-lg-2">Own Use (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mown_use" name="own_use"  type="number" required />
                            </div>
                            <label for="p" class="control-label col-lg-2">Premium (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mpremium" name="premium"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="per" class="control-label col-lg-2">Pertamax (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mpertamax" name="pertamax"  type="number" required />
                            </div>
                            <label for="pp" class="control-label col-lg-2">Pertamax Plus (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mpertamax_plus" name="pertamax_plus"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="perdex" class="control-label col-lg-2">Pertamax Dex (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mpertamina_dex" name="pertamina_dex"  type="number" required />
                            </div>
                            <label for="solar" class="control-label col-lg-2">Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="msolar" name="solar"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="bio" class="control-label col-lg-2">Bio Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mbio_solar" name="bio_solar"  type="number" required />
                            </div>
                             
                            <label for="rit" class="control-label col-lg-2">Ritase (rit)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="mrit" name="ritase_mt"  type="number" required />
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" name="simpan1" type="submit" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Hapus Mobil Tangki</h4>
                </div>
                <div class="modal-body">

                    Apakah anda yakin ?

                </div>
                <div class="modal-footer">
                   <form action="<?php echo base_url() ?>mt/data_mt/" method="POST">
                                            <input type="hidden" name="id_mobil" id="h_id_mobil" value=""/>
                                            <input type="hidden" name="nopol" id="h_nopol" value=""/>
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input type="Submit" class="btn btn-danger danger" name="delete" value="Hapus"/>
                                            
                                        </form>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

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
    
    var globalId;
    var globalId2;
    $('#ModalHapus').on('show', function() {

    });

    function hapus(id,id2) {
        globalId = id;
        globalId2 = id2;
        $("#h_id_mobil").val(globalId);
        $("#h_nopol").val(globalId2);
        $('#ModalHapus').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_mobil/" + globalId;
        window.location.href = url;
    }
    
    
    var global;
    var globalMobil;
    $('#hapusKinerja').on('show', function() {

    });

   function hapusKinerja(id,no) {
        $('#id_kinerja_mt').val(id);
        $('#tanggal_log').html(no);
        $('#tanggal_log_hari').val(no);
    }

    function klik()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_kinerja/" + global + "/" + globalMobil;
        window.location.href = url;
    }
    
    function editKinerja(id_mobil,id_kinerja, tanggal, km, kl, ritase,own_use, premium,pertamax,pertamax_plus,pertamina_dex,solar,bio_solar) {
                     
                                                $("#id_mobil").val(id_mobil);
                                                $("#id_kinerja").val(id_kinerja);
                                                $("#tanggal_kinerja").val(tanggal);
                                                $("#km").val(km);
                                                $("#kl").val(kl);
                                                $("#rit").val(ritase);
                                                $("#own_use").val(own_use);
                                                $("#premium").val(premium);
                                                $("#pertamax").val(pertamax);
                                                $("#pertamax_plus").val(pertamax_plus);
                                                $("#pertamina_dex").val(pertamina_dex);
                                                $("#solar").val(solar);
                                                $("#bio_solar").val(bio_solar);
                                            }
    function tambahKinerja(tanggal,id_mobil) {
                                                $("#ttanggal_kinerja").val(tanggal);
                                                $("#tid_mobil").val(id_mobil);
                                                $("#tid_kinerja").val("");
                                                $("#mkm").val("");
                                                $("#mkl").val("");
                                                $("#mrit").val("ritase");
                                                $("#mown_use").val("");
                                                $("#mpremium").val("");
                                                $("#mpertamax").val("");
                                                $("#mpertamax_plus").val("");
                                                $("#mpertamina_dex").val("");
                                                $("#msolar").val("");
                                                $("#mbio_solar").val("");
                                            }
    
     
</script>