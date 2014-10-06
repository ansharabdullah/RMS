<script type="text/javascript">
    $(document).ready(function () {
        $("#EditProfile").hide();
        $("#EditPass").hide();
    });

    function ShowProfile() {
        $("#ShowProfile").fadeIn("slow");
        $("#EditProfile").hide();
        $("#EditPass").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
        $("#btnEditPass").removeClass("active");
    }

    function EditProfile() {
        $("#ShowProfile").hide();
        $("#EditProfile").fadeIn("slow");
        $("#EditPass").hide();
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
        $("#btnEditPass").removeClass("active");
    }

    function EditPass() {
        $("#ShowProfile").hide();
        $("#EditProfile").hide();
        $("#EditPass").fadeIn("slow");
        $("#btnProf").removeClass("active");
        $("#btnEdit").removeClass("active");
        $("#btnEditPass").addClass("active");
    }

</script>

<section id="main-content">
    <section class="wrapper">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
            <li class="active">Profile</li>
        </ul>
        
        <?php if ($feedback) { ?>
            <?php if ($feedback == 1) { ?>
                <div class="alert alert-block alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Berhasil!</strong> <?php echo $pesan ?>
                </div>
            <?php } else if ($feedback == 2) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> <?php echo $pesan ?>
                </div>
            <?php } ?>
        <?php } ?>
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3 alt green-border">
                <?php foreach ($pegawai as $row) { ?>
                    <section class="panel">
                        <div class="user-heading alt green-bg">
                            <a href="#">
                                <?php if ($row->PHOTO != "") { ?>
                                    <img src="<?php echo base_url() ?>assets/img/photo/<?php echo $row->PHOTO; ?>" alt="<?php echo $row->NAMA_PEGAWAI ?>">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>assets/img/photo/default.png" alt="<?php echo $row->NAMA_PEGAWAI ?>">
                                <?php } ?>
                            </a>
                            <br>
                            <br><br></br><br>
                            <h1><?php echo $row->NAMA_PEGAWAI ?></h1>
                            <p><?php echo $row->EMAIL ?></p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li id="btnProf" class="active"><a href="javascript:ShowProfile();"> <i class="icon-user" ></i> Profile</a></li>
                            <li id="btnEdit"><a href="javascript:EditProfile();" > <i class="icon-edit"></i> Edit Profile</a></li>
                            <li id="btnEditPass"><a href="javascript:EditPass();" > <i class="icon-edit-sign"></i> Edit Password</a></li>
                        </ul>

                    </section>
                </aside>
                <aside class="profile-info col-lg-9">

                    <section class="panel">

                        <div class="panel-body bio-graph-info" id="ShowProfile">
                            <h1>Profile Pengguna</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>NIP </span>: <?php echo $row->NIP ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Nama </span>: <?php echo $row->NAMA_PEGAWAI ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Jabatan </span>: <?php echo $row->JABATAN ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Status </span>: <?php echo $row->STATUS ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>No. Telp </span>: <?php echo $row->NO_TELEPON ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>No. KTP </span>: <?php echo $row->NO_KTP ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Tempat Lahir </span>: <?php echo $row->TEMPAT_LAHIR ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Tanggal Lahir </span>: <?php echo date("d-M-Y", strtotime($row->TANGGAL_LAHIR)) ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Tanggal Masuk </span>: <?php echo date("d-M-Y", strtotime($row->TANGGAL_MASUK)) ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Alamat </span>: <?php echo $row->ALAMAT ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="panel-body bio-graph-info" id="EditProfile">
                            <form enctype="multipart/form-data" class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>user/index/">

                                <h1>Edit Profile Pengguna</h1>

                                <div class="row">
                                    <input name="id_pegawai" type="hidden" value="<?php echo $this->session->userdata('id_pegawai') ?>"/>
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">NIP</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="nip" minlength="2" type="text" value="<?php echo $row->NIP ?>" required />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nama" class="control-label col-lg-4">Nama</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="cama" name="nama_pegawai" minlength="2" type="text" value="<?php echo $row->NAMA_PEGAWAI ?>" required />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="cjabatan" class="control-label col-lg-4">Jabatan</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan" >
                                                <option value="OAM" <?php if ($row->ID_ROLE == 1) echo"selected"; ?>>OAM</option>
                                                <option value="STAF OAM" <?php if ($row->ID_ROLE == 2) echo"selected"; ?>>Staf OAM</option>
                                                <option value="SITE SUPPERVISSOR" <?php if ($row->ID_ROLE == 3) echo"selected"; ?>>Site Suppervisor</option>
                                                <option value="PENGAWAS OPERASI" <?php if ($row->ID_ROLE == 4) echo"selected"; ?>>Pengawas Operasi</option>
                                                <option value="SUPPORTING" <?php if ($row->ID_ROLE == 5) echo"selected"; ?>>Supporting</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="cstatus" class="control-label col-lg-4">Status</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15" id="cstatus" name="status">
                                                <option value="AKTIF" <?php if ($row->STATUS == "AKTIF") echo"selected"; ?>>Aktif</option>
                                                <option value="TIDAK AKTIF" <?php if ($row->STATUS == "TIDAK AKTIF") echo"selected"; ?>>Tidak Aktif</option>
                                                <option value="PERINGATAN" <?php if ($row->STATUS == "PERINGATAN") echo"selected"; ?>>Peringatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="ctelp" class="control-label col-lg-4">No. Telp</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctelp" name="no_telepon" minlength="2" type="text" value="<?php echo $row->NO_TELEPON ?>" required />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="cktp" class="control-label col-lg-4">No. KTP</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="cktp" name="no_ktp" minlength="2" type="text" value="<?php echo $row->NO_KTP ?>" required />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="csim" class="control-label col-lg-4">No. SIM</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="csim" name="no_sim" minlength="2" type="text" value="<?php echo $row->NO_SIM ?>" required />
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="ctempatlahir" class="control-label col-lg-4">Tempat Lahir</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="tempat_lahir" minlength="2" type="text" value="<?php echo $row->TEMPAT_LAHIR ?>" required />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="ctgllahir" class="control-label col-lg-4">Tanggal Lahir</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctgllahir" name="tanggal_lahir" size="16" type="date" value="<?php echo $row->TANGGAL_LAHIR ?>" required/>
                                            <span class="help-block">Select date</span>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="ctglmasuk" class="control-label col-lg-4">Tanggal Masuk</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctglmasuk" name="tanggal_masuk" type="date" size="16" type="text" value="<?php echo $row->TANGGAL_MASUK ?>" required/>
                                            <span class="help-block">Select date</span>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="calamat" class="control-label col-lg-4">Alamat</label>
                                        <div class="col-lg-6">
                                            <textarea class=" form-control input-sm m-bot15" id="calamat" name="alamat" rows="5" /><?php echo $row->ALAMAT ?></textarea>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label class="control-label col-md-4">Image Upload</label>
                                        <div class="col-md-6">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">

                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                        <input type="file" class="default" name="userfile"/>
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                            <span class="label label-danger">NOTE!</span>
                                            <span>
                                                Attached image thumbnail is
                                                supported in Latest Firefox, Chrome, Opera,
                                                Safari and Internet Explorer 10 only
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bio-row">


                                    </div>
                                    <div class="bio-row">
                                        <div class="col-lg-10">
                                            <input style="float:right;" name="edit_profile" class="btn btn-success" type="submit" value="Simpan"/>    
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>



                        <div class="panel-body bio-graph-info" id="EditPass">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>user/index/">

                                <h1>Edit Password</h1>

                                <div class="row">
                                    <div class="bio-row">

                                        <label for="passwordlama" class="control-label col-lg-4">Password Lama</label>
                                        <div class="col-lg-8">
                                            <input class=" form-control " id="cpasswodlama" name="password_lama" minlength="2" type="password" value="" required />
                                        </div>
                                    </div>
                                    <div class="row"></div>

                                    <input name="id_pegawai" type="hidden" value="<?php echo $this->session->userdata('id_pegawai') ?>"/>
                                    <div class="bio-row">
                                        <label for="password_baru" class="control-label col-lg-4">Password Baru</label>
                                        <div class="col-lg-8">
                                            <input class="form-control " id="password" name="password_baru" type="password" />
                                        </div>
                                    </div>
                                    <div class="row"></div>    
                                    <div class="bio-row">
                                        <label for="confirm_password" class="control-label col-lg-4">Confirm Password</label>
                                        <div class="col-lg-8">
                                            <input class="form-control " id="confirm_password" name="password_konfirm" type="password" />
                                        </div>
                                    </div>
                                    <div class="row"></div>   
                                    <div class="bio-row">
                                        <div class="col-lg-12">
                                            <input style="float:right;" name="ubah_password" class="btn btn-success" type="submit" value="Simpan"/>    
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </section>
                <?php } ?>
            </aside>
        </div>

        <!-- page end-->

        <section class="panel">
            <header class="panel-heading">
                Tabel Log Sitem
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                <li><a href="javascript:FilterData('edit');">Edit</a></li>
                                <li><a href="javascript:FilterData('tambah');">Tambah</a></li>
                                <li><a href="javascript:FilterData('hapus');">Hapus</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                                <th>Kata Kunci</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($log as $row) {
                                ?>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->TANGGAL_LOG ?></td>
                                    <td><?php echo $row->KETERANGAN ?></td>
                                    <td><span class="label label-success"><?php echo $row->KEYWORD ?></span></td>
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



    </section>
</section>
<!--main content end-->



<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function () {
        EditableTable.init();
    });

    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }



</script>