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
    
    
    
    $(function () {
        $('#grafik').highcharts({
            title: {
                text: 'Grafik Kinerja Awak Mobil Tangki Juli',
                x: -20 //center
            },
            subtitle: {
                text: 'PT. Pertamina Patra Niaga',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Tanggal'
                },
                categories: ['1', '2', '3', '4', '5', '6',
                    '7', '8', '9', '10', '11', '12',
                    '13', '14', '15', '16', '17', '18', '19', '20',
                    '21', '22', '23', '24', '25', '26', '27', '28',
                    '29', '30', '31', '16']
            },
            yAxis: {
                title: {
                    text: 'Kinerja'
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
                    type: 'spline',
                    name: 'KM',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 13.5, 10.2, 6.5, 5.3, 8.3, 13.9, 9.6,5,7,3,4,2,1,3,4,6,7,8,9,2,3,5,6,8,6,5]
                }, {
                    type: 'spline',
                    name: 'KL',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5,3,4,5,6,7,5,2,5,8,9,6,5,4,5,5,6,7,9,13]
                }, {
                    type: 'spline',
                    name: 'Rit',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,3,5,6,8,3,1,8,5,3,4,8,7,3,4,2,1,9,4,5]
                }, {
                    type: 'spline',
                    name: 'Own Use',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5,3,4,5,6,7,5,2,5,8,9,6,5,4,5,5,6,7,9,13]
                }, {
                    type: 'spline',
                    name: 'Premium',
                    data: [-0.11, 0.9, 3.9, 9.4, 12.5, 15.0, 13.6, 15.9, 11.3, 10.0, 2.4, 3.0,7,8,9,11,7,3,6,5,3,9,2,7,3,4,1,5,6,2,3]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [0.2, 0.1, 3.7, 6.3, 15.0, 5.0, 21.8, 20.1, 25.1, 12.1, 9.6, 2.9,3,5,5,8,8,8,8,9,8,12,13,14,12,16,17,10,7,9,10]
                }, {
                    type: 'spline',
                    name: 'pertamax Plus',
                    data: [0.9, 0.2, 3.7, 11.9, 10.0, 19.0, 20.8, 21.1, 10.1, 4.1, 8.2, 3.5,1,4,4,5,7,6,8,4,3,9,6.1,5.1,4.1,5.1,5.1,6,5,9,13]
                }, {
                    type: 'spline',
                    name: 'Pertamax Dex',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,3,5,6,8,3,1,8,5,3,4,8,7,3,4,2,1,9,4,5]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5,3,4,5,6,7,5,2,5,8,9,6,5,4,5,5,6,7,9,13]
                }, {
                    type: 'spline',
                    name: 'Bio Solar',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,3,5,6,8,3,1,8,5,3,4,8,7,3,4,2,1,9,4,5]
                }]
        });
    });
</script>

<section id="main-content">
    <section class="wrapper">
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
                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>mt/edit_mobil/<?php echo $row->ID_MOBIL ?>">
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
                            <input class="btn btn-success" type="submit" value="Simpan"/>
                        </div>
                    </form>

            </section>
  <?php } ?>              

            <section class="panel">
                <div class="panel-body">
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
                        <div class="clearfix">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                                Tambah Kinerja <i class="icon-plus"></i>
                            </a>
                        </div>

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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $i = 1;
                               
                                foreach ($kinerja as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo(DateToIndo($row->tanggal_log_harian)); ?></td>
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
                                    
                                    
                                   <td>
                                   <a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" href="javascript:hapus_kinerja('<?php echo $row->id_kinerja_mt ?>');"><i class="icon-remove"></i></a></td>

                                </tr>
                                <?php $i++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </section>


            <!-- page end-->
        </section>
    </section>
    <!--main content end-->





    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Kinerja</h4>
                </div>
                <div class="modal-body">

                    Apakah anda yakin ?

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                    <a href="#" onclick="ok()" class="btn btn-danger danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="nip" class="control-label col-lg-2">Tanggal</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tanggl" name="tanggal"  type="date" required />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>

                            <label for="km" class="control-label col-lg-2">Kilometer (km)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="km" name="km"  type="number" required />
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="kl" class="control-label col-lg-2">Kiloliter (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="kl" name="kl"  type="number" required />
                            </div>
                            <label for="rit" class="control-label col-lg-2">Ritase (rit)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="rit" name="rit"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ownuse" class="control-label col-lg-2">Own Use (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="kl" name="ou"  type="number" required />
                            </div>
                            <label for="p" class="control-label col-lg-2">Premium (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="p" name="p"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="per" class="control-label col-lg-2">Pertamax (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="per" name="per"  type="number" required />
                            </div>
                            <label for="pp" class="control-label col-lg-2">Pertamax Plus (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="pp" name="pp"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="perdex" class="control-label col-lg-2">Pertamax Dex (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="perdex" name="perdex"  type="number" required />
                            </div>
                            <label for="solar" class="control-label col-lg-2">Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="solar" name="solar"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="bio" class="control-label col-lg-2">Bio Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="bio" name="bio"  type="number" required />
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" type="submit" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="get" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>

                    <div class="modal-body">

                        <div class="form-group ">
                            <label for="nip" class="control-label col-lg-2">Tanggal</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="tanggl" name="tanggal"  type="date" required />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                            <label for="km" class="control-label col-lg-2">Kilometer (km)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="km" name="km"  type="number" required />
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="kl" class="control-label col-lg-2">Kiloliter (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="kl" name="kl"  type="number" required />
                            </div>
                            <label for="rit" class="control-label col-lg-2">Ritase (rit)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="rit" name="rit"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ownuse" class="control-label col-lg-2">Own Use (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="kl" name="ou"  type="number" required />
                            </div>
                            <label for="p" class="control-label col-lg-2">Premium (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="p" name="p"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="per" class="control-label col-lg-2">Pertamax (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="per" name="per"  type="number" required />
                            </div>
                            <label for="pp" class="control-label col-lg-2">Pertamax Plus (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="pp" name="pp"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="perdex" class="control-label col-lg-2">Pertamax Dex (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="perdex" name="perdex"  type="number" required />
                            </div>
                            <label for="solar" class="control-label col-lg-2">Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="solar" name="solar"  type="number" required />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="bio" class="control-label col-lg-2">Bio Solar (kl)</label>
                            <div class="col-lg-4">
                                <input class=" form-control input-sm m-bot15" id="bio" name="bio"  type="number" required />
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" type="submit" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="hapusKinerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                    <a href="#" onclick="klik()" class="btn btn-danger danger">Hapus</a>
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
    $('#ModalHapus').on('show', function() {

    });

    function hapus(id) {
        globalId = id;
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

    function hapus_kinerja(id,id_mobil) {
        global = id;
        globalMobil=id_mobil;
        $('#hapusKinerja').data('id', id).modal('show');
 
    }

    function klik()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_kinerja/" + global + "/" + globalMobil;
        window.location.href = url;
    }
    
     
</script>