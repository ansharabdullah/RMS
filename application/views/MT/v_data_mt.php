<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Data MT   
            </header>
            <div class="panel-body">
                <a href="#ModalManual" data-toggle="modal" class="btn btn-primary">
                    Tambah MT <i class="icon-plus"></i>
                </a>

                <a href="<?php echo base_url() ?>mt/import_csv" rel="stylesheet" class="btn btn-success"> Import Excel <i class="icon-plus"></i></a>

                <div class="adv-table editable-table " style="overflow-y: scroll" >
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th >No.</th> 
                                <th>Nopol</th>
                                <th>Transpotir</th>
                                <th>Kapasitas</th>
                                <th>Produk</th>
                                <th>No Mesin</th>
                                <th>No Rangka</th>
                                <th>Jenis Tangki</th>
                                <th>Status</th>
                                <th>GPS</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <?php $i = 1;
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="<?php echo base_url() ?>mt/detail_mt/<?php echo $row->ID_MOBIL; ?>" style ="text-decoration: underline"><?php echo $row->NOPOL; ?></a></td>

                                    <td><?php echo $row->TRANSPORTIR; ?></td>
                                    <td><?php echo $row->KAPASITAS; ?></td>
                                    <td><?php echo $row->PRODUK; ?></td>
                                    <td><?php echo $row->NO_MESIN; ?></td>
                                    <td><?php echo $row->NO_RANGKA; ?></td>
                                    <td><?php echo $row->JENIS_TANGKI; ?></td>
                                    <td><?php echo $row->STATUS_MOBIL; ?></td>
                                    <td><?php echo $row->GPS; ?></td>


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
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>mt/tambah_pegawai/">

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="bio-row">
                                                    <label for="nopol" class="control-label col-lg-4">Nopol</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="nop" name="nopol"  type="text" required />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nama" class="control-label col-lg-4">No Rangka</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="cama" name="no_rangka"  type="text" required />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="ckap" class="control-label col-lg-4">Kapasitas</label>
                                                    <div class="col-lg-6">
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
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="cmesin" name="no_mesin"  type="text" required />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="cpro" class="control-label col-lg-4">Produk</label>
                                                    <div class="col-lg-6">
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
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="cjk" name="jenis_kendaraan"  type="text" required />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="calamat" class="control-label col-lg-4">Transportir</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="calamat" name="transportir"  type="text" required />
                                                    </div>
                                                </div> 
                                                <div class="bio-row">
                                                    <label for="ctglmasuk" class="control-label col-lg-4">Rasio</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="crasio" name="rasio" type="text" required/>
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="cjenistangki" class="control-label col-lg-4">Jenis Tangki</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control input-sm m-bot15" id="cjenistangki" name="jenis_tangki">
                                                            <option value="Alumunium Aweco">Alumunium Aweco</option>
                                                            <option value="Carbon Steel">Carbon Steel</option>
                                                            <option value="Steel">Steel</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="kompartemen" class="control-label col-lg-4">Kompartemen</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="kompartemen" name="kompartemen" type="text" size="16" type="text" required/>
                                                    </div>
                                                </div>

                                                <div class="bio-row">
                                                    <label for="status" class="control-label col-lg-4">Status</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control input-sm m-bot15" id="cstatus" name="status_mobil">
                                                            <option  value="SEWA">Sewa</option>
                                                            <option value="HAK MILIK">Hak Milik</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="gps" class="control-label col-lg-4">GPS</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control input-sm m-bot15" id="gps" name="gps">
                                                            <option value="OK">OK</option>
                                                            <option value="NO">NO</option>

                                                        </select></div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="sensor" class="control-label col-lg-4">Sensor Overfill</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control input-sm m-bot15" id="sensor" name="sensor_overfill">
                                                            <option value="0">OK</option>
                                                            <option value="1">NO</option>
                                                        </select></div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="standar_volume" class="control-label col-lg-4">Standar Volume</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control input-sm m-bot15" id="standar_volume" name="standar_volume">
                                                            <option value="OK">OK</option>
                                                            <option value="NO">NO</option>
                                                        </select></div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="volume" class="control-label col-lg-4">Volume 1</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control input-sm m-bot15" id="volume" name="volume_1">
                                                            <option value="OK">OK</option>
                                                            <option value="NO">NO</option>
                                                        </select></div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="segel" class="control-label col-lg-4">Jumlah Segel</label>
                                                    <div class="col-lg-6">
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
                                                    <label for="nip" class="control-label col-lg-4">Komp 1</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="k1" name="rk2_komp1"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 2</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="k2" name="krk2_komp2"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 3</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="k3" name="rk2_komp3"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 4</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="k4" name="rk2_komp4"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 5</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="k5" name="rk2_komp5"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 6</label>
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
                                                    <label for="nip" class="control-label col-lg-4">Komp 1</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="ke1" name="k_komp1"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 2</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="ke2" name="k_komp2"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 3</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="ke3" name="k_komp3"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 4</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="ke4" name="k_komp4"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 5</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="ke5" name="k_komp5"  type="number"  />
                                                    </div>
                                                </div>
                                                <div class="bio-row">
                                                    <label for="nip" class="control-label col-lg-4">Komp 6</label>
                                                    <div class="col-lg-6">
                                                        <input class=" form-control input-sm m-bot15" id="ke6" name="k_komp6"  type="number"  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <input class="btn btn-success" type="submit" value="Simpan"/>
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

