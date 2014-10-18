<script type="text/javascript">
    var mt = new Array();
    var amt = new Array();

    $(document).ready(function() {
        $("#signupForm2").submit(function(e) {
            var isvalidate = $("#signupForm2").valid();
            if (isvalidate)
            {
                var tanggal = new Date($("#tanggalSIOD").val());
                var hasil = tanggal.getDate() + "-" + (tanggal.getMonth() + 1) + "-" + tanggal.getFullYear();
                $("#tanggal").html(hasil);
                $("#tanggal_hapus").val($("#tanggalSIOD").val());
                $('#ModalHapus').modal('show')
                e.preventDefault();
            }
        });


        //masukin array apar ke javascript
        var data;
<?php foreach ($kinerja_mt as $a) { ?>
            data = new Array();
            data['id_kinerja_mt'] = "<?php echo $a->ID_KINERJA_MT ?>";

            data['nopol'] = "<?php echo $a->NOPOL ?>";

            data['transportir'] = "<?php echo $a->TRANSPORTIR ?>";
            data['kapasitas'] = "<?php echo $a->KAPASITAS ?>";
            data['rit'] = "<?php echo $a->RITASE_MT ?>";

            data['km'] = "<?php echo $a->TOTAL_KM_MT ?>";
            data['kl'] = "<?php echo $a->TOTAL_KL_MT ?>";
            data['ou'] = "<?php echo $a->OWN_USE ?>";

            data['premium'] = "<?php echo $a->PREMIUM ?>";
            data['pertamax'] = "<?php echo $a->PERTAMAX ?>";
            data['pertamaxplus'] = "<?php echo $a->PERTAMAX_PLUS ?>";

            data['biosolar'] = "<?php echo $a->BIO_SOLAR ?>";
            data['solar'] = "<?php echo $a->SOLAR ?>";
            data['pertaminadex'] = "<?php echo $a->PERTAMINA_DEX ?>";

            mt.push(data);
<?php } ?>
<?php foreach ($kinerja_amt as $a) { ?>
            data = new Array();
            data['id_kinerja_amt'] = "<?php echo $a->ID_KINERJA_AMT ?>";
            data['nama'] = "<?php echo $a->NAMA_PEGAWAI ?>";
            data['nip'] = "<?php echo $a->NIP ?>";

            data['jabatan'] = "<?php echo $a->JABATAN ?>";
            data['klas'] = "<?php echo $a->KLASIFIKASI ?>";
            data['status_tugas'] = "<?php echo $a->STATUS_TUGAS ?>";

            data['km'] = "<?php echo $a->TOTAL_KM ?>";
            data['kl'] = "<?php echo $a->TOTAL_KL ?>";
            data['rit'] = "<?php echo $a->RITASE_AMT ?>";

            data['spbu'] = "<?php echo $a->SPBU ?>";
            data['pendapatan'] = "<?php echo $a->PENDAPATAN ?>";

            amt.push(data);
<?php } ?>


    });


    function setKinerjaAMT(index) {
        $("#id_kinerja_amt").val(amt[index]['id_kinerja_amt']);
        $("#nip_amt").val(amt[index]['nip']);

        $("#nama_amt").val(amt[index]['nama']);
        $("#klas_amt").val(amt[index]['klas']);
        $("#status_tugas_amt").val(amt[index]['status_tugas']);
        $("#km_amt").val(amt[index]['km']);
        $("#kl_amt").val(amt[index]['kl']);
        $("#rit_amt").val(amt[index]['rit']);
        $("#spbu_amt").val(amt[index]['spbu']);
    }
    
    function setKinerjaMT(index) {
        $("#id_kinerja_mt").val(mt[index]['id_kinerja_mt']);
        $("#nopol_mt").val(mt[index]['nopol']);
        $("#rit_mt").val(mt[index]['rit']);
        $("#km_mt").val(mt[index]['km']);
        $("#kl_mt").val(mt[index]['kl']);
        $("#ou_mt").val(mt[index]['ou']);
        $("#premium_mt").val(mt[index]['premium']);
        $("#pertamax_mt").val(mt[index]['pertamax']);
        $("#pertamaxplus_mt").val(mt[index]['pertamaxplus']);
        $("#biosolar_mt").val(mt[index]['biosolar']);
        $("#pertaminadex_mt").val(mt[index]['pertaminadex']);
        $("#solar_mt").val(mt[index]['solar']);
    }
</script>


<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>kinerja">Kinerja</a></li>
                    <li class="active">Cek</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Cek Kinerja               
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="<?php echo base_url() ?>kinerja/cek" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="date" required="required" id="tanggal_cek" class="form-control"  placeholder="Tanggal" name="tanggal_cek" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10 col-sm-6">
                            <input type="submit" style="float: right;" class="btn btn-warning" value="Cek" name="cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- page end-->

        <?php if ($edit_kinerja_amt == true) { ?>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil edit kinerja AMT.
            </div>
        <?php } ?>
        
        <?php if ($edit_kinerja_mt == true) { ?>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil edit kinerja MT.
            </div>
        <?php } ?>
        
        <?php if ($klik_hapus == true) { ?>
            <?php if ($status_hapus == true) { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil hapus semua kinerja.
                </div>    


            <?php } else { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data kinerja tidak ditemukan.
                </div>
            <?php } ?>
        <?php } else if ($klik_cek == true) { ?>
            <?php if ($status_hapus == false) { ?>                
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data kinerja tanggal <strong><?php echo $tanggal; ?></strong> tidak ditemukan.
                </div>
            <?php } else { ?>
                <section class="panel">
                    <header class="panel-heading">
                        Kinerja tanggal <strong><?php echo $tanggal; ?></strong>
                    </header>
                </section>

                <section class="panel">
                    <header class="panel-heading">
                        Jumlah SPBU : <strong><?php echo $alokasi_spbu; ?></strong>
                    </header>
                </section>


                <!-- MOBIL  -->
                <section class="panel">
                    <header class="panel-heading">
                        Kinerja Mobil Tangki
                    </header>

                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>Nopol</th>
                                        <th>Rit</th>
                                        <th>KM</th>
                                        <th>KL</th>
                                        <th>Ownuse</th>
                                        <th>Premium</th>
                                        <th>Pertamax</th>
                                        <th>Pertamax Plus</th>
                                        <th>Bio Solar</th>
                                        <th>Pertamina Dex</th>
                                        <th>Solar</th>
                                        <?php if($this->session->userdata('id_role')!=5){?><th>Aksi</th><?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kinerja_mt as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->NOPOL; ?></td>
                                            <td><?php echo $row->RITASE_MT; ?></td>
                                            <td><?php echo $row->TOTAL_KM_MT; ?></td>
                                            <td><?php echo $row->TOTAL_KL_MT; ?></td>
                                            <td><?php echo $row->OWN_USE; ?></td>
                                            <td><?php echo $row->PREMIUM; ?></td>
                                            <td><?php echo $row->PERTAMAX; ?></td>
                                            <td><?php echo $row->PERTAMAX_PLUS; ?></td>
                                            <td><?php echo $row->BIO_SOLAR; ?></td>
                                            <td><?php echo $row->PERTAMINA_DEX; ?></td>
                                            <td><?php echo $row->SOLAR; ?></td>
                                            <?php if($this->session->userdata('id_role')!=5){?>
                                            <td>
                                                <a data-placement="top" data-toggle="modal" href="#ModalEditKinerjaMT" onclick="setKinerjaMT('<?php echo ($no - 1) ?>')" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


                <!-- SUPIR  -->
                <section class="panel">
                    <header class="panel-heading">
                        Kinerja Crew Supir
                    </header>

                    <div class="panel-body" >
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                                <thead>
                                    <tr>
                                        <th style="display: none;">-</th>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Status Tugas</th>
                                        <th>Klas</th>
                                        <th>KM</th>
                                        <th>KL</th>
                                        <th>Rit</th>
                                        <th>SPBU</th>
                                        <th>Pendapatan</th>
                                        <?php if($this->session->userdata('id_role')!=5){?><th>Aksi</th><?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kinerja_amt as $row) {
                                        ?>
                                        <tr class="">
                                            <th style="display: none;"></th>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->NIP; ?></td>
                                            <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                            <td><?php echo $row->JABATAN; ?></td>
                                            <td><?php echo $row->STATUS_TUGAS; ?></td>
                                            <td><?php echo $row->KLASIFIKASI; ?></td>
                                            <td><?php echo $row->TOTAL_KM; ?></td>
                                            <td><?php echo $row->TOTAL_KL; ?></td>
                                            <td><?php echo $row->RITASE_AMT; ?></td>
                                            <td><?php echo $row->SPBU; ?></td>
                                            <td><?php echo $row->PENDAPATAN; ?></td>
                                            <?php if($this->session->userdata('id_role')!=5){?>
                                            <td>
                                                <a data-placement="top" data-toggle="modal" href="#ModalEditKinerjaAMT" onclick="setKinerjaAMT('<?php echo ($no - 1) ?>')" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            <?php if($this->session->userdata('id_role')!=5){?>
                <section class="panel">
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="signupForm2" action="#" method="POST">
                            <input type="hidden" required="required" id="tanggalSIOD" class="form-control" name="tanggalSIOD" value="<?php echo $tanggal_cek; ?>">
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-6">
                                   <input type="submit" style="float: right;" class="btn btn-danger" value="Hapus" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </section>
</section>


<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Konfirmasi hapus kinerja</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="commentForm1" method="post" action="<?php echo base_url() ?>kinerja/cek">
                <div class="modal-body">
                    <input type="hidden" name="tanggal_hapus" id="tanggal_hapus" value="">
                    Yakin hapus semua kinerja pada tanggal <strong><span id="tanggal"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-danger" type="submit" name="hapus" value="Hapus">
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalEditKinerjaAMT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>kinerja/cek">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Kinerja AMT</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">

                                <input type="text" required="required" name="tanggal_cek" value="<?php echo $tanggal_cek; ?>" class="form-control">
                                <input type="text" required="required" id="id_kinerja_amt" name="id_kinerja_amt" class="form-control">

                                <div class="form-group "> 
                                    <div class="col-lg-4">
                                        NIP <input class=" form-control input-sm m-bot15" id="nip_amt" name="nip_amt" readonly required/>
                                    </div>
                                    <div class="col-lg-8">
                                        Nama <input class=" form-control input-sm m-bot15" id="nama_amt" name="nama_amt" readonly required/>
                                    </div>
                                </div>
                                <div class="form-group ">                                    
                                    <div class="col-lg-4">
                                        Klas <input class=" form-control input-sm m-bot15" id="klas_amt" name="klas_amt" readonly required/>
                                    </div>
                                    <div class="col-lg-4">
                                        Status Tugas 
                                        <select class="form-control input-sm m-bot15" id="status_tugas_amt" name="status_tugas_amt">
                                            <option value="SUPIR">SUPIR</option>
                                            <option value="KERNET">KERNET</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        Kilometer <input class=" form-control input-sm m-bot15" id="km_amt" name="km_amt" min="0" type="number" value="" placeholder="Kilometer" required/>
                                    </div>
                                </div>
                                <div class="form-group "> 
                                    <div class="col-lg-4">
                                        Kiloliter <input class=" form-control input-sm m-bot15" id="kl_amt" name="kl_amt" min="0" type="number" value="" placeholder="Kiloliter" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        Ritase <input class=" form-control input-sm m-bot15" id="rit_amt" name="rit_amt" min="0" type="number" value="" placeholder="Ritase" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        SPBU <input class=" form-control input-sm m-bot15" id="spbu_amt" name="spbu_amt" min="0" type="number" value="" placeholder="SPBU" required/>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                    <input class="btn btn-success" type="submit" name="editKinerjaAMT" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="ModalEditKinerjaMT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>kinerja/cek">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Ubah Kinerja MT</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <input type="hidden" required="required" name="tanggal_cek" value="<?php echo $tanggal_cek; ?>" class="form-control">
                                <input type="hidden" required="required" id="id_kinerja_mt" name="id_kinerja_mt" class="form-control">

                                <div class="form-group "> 
                                    <div class="col-lg-6">
                                        Nopol <input class=" form-control input-sm m-bot15" id="nopol_mt" name="nopol_mt" placeholder="NOPOL" readonly required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Ritase <input class=" form-control input-sm m-bot15" id="rit_mt" type="number" min="0" name="rit_mt" placeholder="Ritase" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Kilometer <input class=" form-control input-sm m-bot15" id="km_mt" type="number" min="0" name="km_mt" placeholder="Kilometer" required/>
                                    </div>
                                </div>
                                
                                <div class="form-group "> 
                                    <div class="col-lg-3">
                                        Kiloliter <input class=" form-control input-sm m-bot15" id="kl_mt" type="number" min="0" name="kl_mt" placeholder="Kiloliter" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Ownuse <input class=" form-control input-sm m-bot15" id="ou_mt" type="number" min="0" name="ou_mt" placeholder="Ownuse" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Premium <input class=" form-control input-sm m-bot15" id="premium_mt" type="number" min="0" name="premium_mt" placeholder="Premium" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Pertamax <input class=" form-control input-sm m-bot15" id="pertamax_mt" type="number" min="0" name="pertamax_mt" placeholder="Pertamax" required/>
                                    </div>
                                </div>
                                
                                <div class="form-group ">                                     
                                    <div class="col-lg-3">
                                        Pertamax Plus <input class=" form-control input-sm m-bot15" id="pertamaxplus_mt" type="number" min="0" name="pertamaxplus_mt" placeholder="Pertamax Plus" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Bio Solar <input class=" form-control input-sm m-bot15" id="biosolar_mt" type="number" min="0" name="biosolar_mt" placeholder="Bio Solar" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Pertamina Dex <input class=" form-control input-sm m-bot15" id="pertaminadex_mt" type="number" min="0" name="pertaminadex_mt" placeholder="Pertamina Dex" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        Solar <input class=" form-control input-sm m-bot15" id="solar_mt" type="number" min="0" name="solar_mt" placeholder="Solar" required/>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                    <input class="btn btn-success" type="submit" name="editKinerjaMT" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>

                                        jQuery(document).ready(function() {
                                            EditableTable.init();
                                        });

</script>