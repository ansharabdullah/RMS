<script>
$(document).ready(function() {
   $("#error").hide();
});

function myFunction()
{
var x=document.getElementById("nopol");
var i=0;
var status=0;
var nopolcek=new Array(<?php echo '"'.implode('", "',$nopolcek).'"'; ?>);
var jumlahbaris=<?php echo $jumlahbaris; ?>;

x.value=x.value.toUpperCase();
x.value=x.value.split(' ').join('')

for(i=0;i<jumlahbaris ; i++){
if(nopolcek[i] == x.value){
        status = 1;
    }
}
if(status == 1){
    $("#error").show();
    //$("#submit").hide();
    //$('#submit').attr('disabled', 'disabled');
    document.getElementById("submit").disabled = true;
    
}else{
    $("#error").hide();
    //$("#submit").show();
    //$('#submit').attr('enabled', 'enabled');
    document.getElementById("submit").disabled = false;
}



}
</script>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li class="active">Data Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <?php if ($pesan==1) {  ?>
            <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil Tambah Mobil.
                    </div>
        <?php } ?>
        <?php if ($pesan==3) {  ?>
            <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil Hapus Mobil.
                    </div>
        <?php } ?>
        
        <?php if ($pesan==2) { ?>
            <div class="alert alert-block alert-danger fade in">
                <strong>Error!</strong> 
            </div>
        <?php } ?>
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Data MT   
            </header>
           
            <div class="panel-body">
                <a href="#ModalManual" data-toggle="modal" class="btn btn-primary">
                    Tambah MT <i class="icon-plus"></i>
                </a>

                <a href="<?php echo base_url() ?>mt/import_mt" rel="stylesheet" class="btn btn-success"> Import Excel <i class="icon-plus"></i></a>

                <div class="adv-table editable-table " style="overflow-x: scroll" >
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th >No.</th> 
                                <th>Nopol</th>
                                <th>Transpotir</th>
                                <th>Kapasitas(KL)</th>
                                <th>Produk</th>
                                <th>No Mesin</th>
                                <th>No Rangka</th>
                                <th>Jenis Tangki</th>
                                <th>Status</th>
                                <th>GPS</th>

                            </tr>
                        </thead>
                        <tbody>
                                <?php $i = 1;
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="<?php echo base_url() ?>mt/detail/<?php echo $row->ID_MOBIL; ?>/<?php echo date("n")?>/<?php echo date("Y")?>" style ="text-decoration: underline"><?php echo $row->NOPOL; ?></a></td>

                                    <td><?php echo $row->TRANSPORTIR; ?></td>
                                    <td><?php echo $row->KAPASITAS; ?></td>
                                    <td><?php echo $row->PRODUK; ?></td>
                                    <td><?php echo $row->NO_MESIN; ?></td>
                                    <td><?php echo $row->NO_RANGKA; ?></td>
                                    <td><?php echo $row->JENIS_TANGKI; ?></td>
                                    <td><?php echo $row->STATUS_MOBIL; ?></td>
                                    
                                    <td>
                                    <?php if($row->GPS == "0")echo 'OK'?><?php if($row->GPS == "1")echo 'NO'?>
                                    </td>


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
<div class="modal fade" id="ModalManual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah MT</h4>
            </div>
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>mt/data_mt/">

                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="nopol" class="control-label col-lg-4">Nopol</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" onchange="myFunction()" id="nopol" name="nopol" placeholder="Nopol" type="text" required />
                                        <div id="error" style="color:red; font-size:10px;">Nopol sudah ada!</div>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">No Rangka</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="cama" name="no_rangka" placeholder="No rangka"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="ckap" class="control-label col-lg-4">Kapasitas</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="ckap" name="kapasitas">
                                            <option value="8">8</option>
                                            <option value="16">16</option>
                                            <option value="24">24</option>
                                            <option value="32">32</option>
                                            <option value="40">40</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">No Mesin</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="cmesin" placeholder="No mesin" name="no_mesin"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cpro" class="control-label col-lg-4">Produk</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="cpro" name="produk">

                                            <option value="Premium">Premium</option>
                                            <option value="Pertamax">Pertamax</option>
                                            <option value="Pertamax Dex">Pertamax Dex</option>
                                            <option value="Pertamax Plus">Pertamax Plus</option>
                                            <option value="Solar">Solar</option>
                                            <option value="Bio Solar">Bio Solar</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">Jenis Kendaraan</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="cjk" placeholder="Jenis_Kendaraan" name="jenis_kendaraan"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="calamat" class="control-label col-lg-4">Transportir</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="calamat" placeholder="Transportir" name="transportir"  type="text" required />
                                    </div>
                                </div> 
                                <div class="bio-row">
                                    <label for="ctglmasuk" class="control-label col-lg-4">Rasio</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="crasio" placeholder="Rasio" name="rasio" type="number" required/>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cjenistangki" class="control-label col-lg-4">Jenis Tangki</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="cjenistangki" name="jenis_tangki">
                                            <option value="Alumunium Aweco">Alumunium Aweco</option>
                                            <option value="Carbon Steel">Carbon Steel</option>
                                            <option value="Steel">Steel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="status" class="control-label col-lg-4">Status</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="cstatus" name="status_mobil">
                                            <option  value="SEWA">Sewa</option>
                                            <option value="HAK MILIK">Hak Milik</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="gps" class="control-label col-lg-4">GPS</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="gps" name="gps">
                                            <option value="OK">OK</option>
                                            <option value="NO">NO</option>

                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="sensor" class="control-label col-lg-4">Sensor Overfill</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="sensor" name="sensor_overfill">
                                            <option value="0">OK</option>
                                            <option value="1">NO</option>
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="standar_volume" class="control-label col-lg-4">Standar Volume</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="standar_volume" name="standar_volume">
                                            <option value="OK">OK</option>
                                            <option value="NO">NO</option>
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="volume" class="control-label col-lg-4">Volume 1</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="volume" name="volume_1">
                                            <option value="OK">OK</option>
                                            <option value="NO">NO</option>
                                        </select></div>
                                </div>
                                <div class="bio-row">
                                    <label for="segel" class="control-label col-lg-4">Jumlah Segel</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="segel" name="jumlah_segel">
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                        </select>
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
                                            <input class=" form-control input-sm m-bot15" id="komp1" name="rk1_komp1"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp2</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="komp2" name="rk1_komp2"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp3</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="komp3" name="rk1_komp3"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp4</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="komp4" name="rk1_komp4"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp5</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="komp5" name="rk1_komp5"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp6</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="komp6" name="rk1_komp6"  type="number"  />
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
                                        <label for="nip" class="control-label col-lg-4">Komp1</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="k1" name="rk2_komp1"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp2</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="k2" name="krk2_komp2"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp3</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="k3" name="rk2_komp3"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp4</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="k4" name="rk2_komp4"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp5</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="k5" name="rk2_komp5"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp6</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="k6" name="rk2_komp6"  type="number"  />
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
                                        <label for="nip" class="control-label col-lg-4">Komp1</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ke1" name="k_komp1"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp2</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ke2" name="k_komp2"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp3</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ke3" name="k_komp3"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp4</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ke4" name="k_komp4"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp5</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ke5" name="k_komp5"  type="number"  />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">Komp6</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ke6" name="k_komp6"  type="number"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" onclick="this.form.reset()" >Batal</button>
                        <input class="btn btn-success" id="submit" name="simpan" type="submit" value="Simpan"/>
                    </div>
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
</script>

