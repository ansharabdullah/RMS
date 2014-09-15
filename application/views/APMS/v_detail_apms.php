<?php
function DateToIndo($date) { 
       /*  $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        $tgl   = substr($date, 8, 2); 
        
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun; */
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
   /*  
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
        foreach($kinerja as $km){
            ?>
             
                kl_mt.push(<?php echo $km->total_kl_mt ?>);
                km_mt.push(<?php echo $km->total_km_mt ?>);
                premium.push(<?php echo $km->premium ?>);
                pertamax.push(<?php echo $km->pertamax ?>);
                pertamax_plus.push(<?php echo $km->pertamax_plus ?>);
                pertamina_dex.push(<?php echo $km->pertamina_dex ?>);
                solar.push(<?php echo $km->solar ?>);
                bio_solar.push(<?php echo $km->bio_solar ?>);
                own_use_mt.push(<?php echo $km->own_use ?>);
                ritase_mt.push(<?php echo $km->ritase_mt ?>);
                hari.push(<?php echo $km->hari ?>);
                
            <?php
        }
    ?>
    
    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: 'Bulan Januari 2014',
                x: -20
            },
            xAxis: {
                categories: hari
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
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>mt/grafik_hari_mt";
                        }
                    }
                }
            },
            series: [{
                    name: 'KM',
                    data: km_mt
                }, {
                    name: 'KL',
                    data: kl_mt
                }, {
                    name: 'Premium',
                    data: premium
                }, {
                    name: 'Pertamax',
                    data: pertamax
                }, {
                    name: 'Pertamax Plus',
                    data: pertamax_plus
                }, {
                    name: 'Pertamina Dex',
                    data: pertamina_dex
                }, {
                    name: 'Solar',
                    data: solar
                }, {
                    name: 'Own Use',
                    data: own_use_mt
                }, {
                    name: 'Bio Solar',
                    data: bio_solar
                },
                {
                    name: 'Ritase',
                    data: ritase_mt
                }]
        });
    }); */
    
</script>

<section id="main-content">
    <section class="wrapper">
            <?php foreach ($apms as $row) { ?>
            <!-- page start-->

            <section class="panel" id="ShowProfile">
                <header class="panel-heading">
                    <div class="col-lg-10">Detail APMS
                    </div>
                    <a class="btn btn-warning" onclick="ShowEdit()" ><i class="icon-pencil"></i> Edit</a> 

                    <a class="btn btn-danger" href="javascript:hapus('<?php echo $row->ID_APMS ?>');"><i class="icon-eraser"></i> Hapus</a>

                </header>
                <div class="panel-body bio-graph-primary" >
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">
                                <aside class="profile-nav col-lg-12">
                                    <div class="row">
                                        <div class="bio-row">
											<p><span class="col col-lg-3">Nomor APMS </span>: <?php echo $row->NO_APMS; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Nama Pengusaha </span>: <?php echo $row->NAMA_PENGUSAHA; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Supply Point </span>: <?php echo $row->SUPPLY_POINT; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Nama Transportir </span>: <?php echo $row->NAMA_TRANSPORTIR; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Nomor Perjanjian </span>: <?php echo $row->NO_PERJANJIAN; ?></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span class="col col-lg-3">Tarif Patra Niaga </span>: <?php echo $row->TARIF_PATRA_NIAGA; ?></p>
                                        </div>
										<div class="bio-row">
                                            <p><span class="col col-lg-3">Alamat </span>: <?php echo $row->ALAMAT; ?></p>
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
                    Edit APMS
                </header>
                <div class="panel-body bio-graph-primary" >
                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>apms/edit_apms/<?php echo $row->ID_APMS?>">
                        <div class="panel-body">
                            <input type="hidden" name="id" value="<?php echo $row->ID_APMS?>">
                            <div class="row">
                                <div class="bio-row">
                                    <label for="no_apms" class="control-label col-lg-4">NO. APMS</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NO_APMS ?>" id="no_apms" name="no_apms"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama_pengusaha" class="control-label col-lg-4">Nama Pengusaha</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NAMA_PENGUSAHA ?>" id="nama_pengusaha" name="nama_pengusaha"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="supply_point" class="control-label col-lg-4">Supply Point</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->SUPPLY_POINT ?>" id="supply_point" name="supply_point"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="alamat" class="control-label col-lg-4">No Mesin</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->ALAMAT ?>" id="alamat" name="alamat"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama_transportir" class="control-label col-lg-4">Nama Transportir</label>
                                    <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" value="<?php echo $row->NAMA_TRANSPORTIR ?>" id="nama_transportir" name="nama_transportir"  type="text" required />
                                        
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="no_perjanjian" class="control-label col-lg-4">Nomor Perjanjian</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->NO_PERJANJIAN ?>" id="no_perjanjian" name="no_perjanjian"  type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="tarif" class="control-label col-lg-4">Tarif Patra Niaga</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" value="<?php echo $row->TARIF_PATRA_NIAGA?>" id="tarif" name="tarif"  type="text" required />
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
        var url = "<?php echo base_url(); ?>" + "apms/delete_apms/" + globalId;
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