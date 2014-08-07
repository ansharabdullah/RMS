<script type="text/javascript">
    $( document ).ready(function() {
        $("#EditProfile").hide();
        $("#EditPass").hide();
    });
    
    function ShowProfile(){
        $("#ShowProfile").slideDown("slow");
        $("#EditProfile").hide();
        $("#EditPass").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
        $("#btnEditPass").removeClass("active");
    }
    
    function EditProfile(){
        $("#ShowProfile").hide();
        $("#EditProfile").slideDown("slow");
        $("#EditPass").hide();
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
        $("#btnEditPass").removeClass("active");
    }
    
    function EditPass(){
        $("#ShowProfile").hide();
        $("#EditProfile").hide();
        $("#EditPass").slideDown("slow");
        $("#btnProf").removeClass("active");
        $("#btnEdit").removeClass("active");
        $("#btnEditPass").addClass("active");
    }
    
</script>

<section id="main-content">
    <section class="wrapper">

        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3 alt green-border">
                <section class="panel">
                    <div class="user-heading alt green-bg">
                        <a href="#">
                            <img src="<?php echo base_url() ?>assets/img/profile-avatar.jpg" alt="">
                        </a>
                        <h1>Jonathan Smith</h1>
                        <p>jsmith@flatlab.com</p>
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
                                <p><span>NIP </span>: 085247395</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Nama </span>: Jonathan Smith</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Jabatan </span>: Supir</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Klasifikasi</span>: 32</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Status </span>: Aktif</p>
                            </div>
                            <div class="bio-row">
                                <p><span>No. Telp </span>: 085222198675</p>
                            </div>
                            <div class="bio-row">
                                <p><span>No. KTP </span>: 0986386746</p>
                            </div>
                            <div class="bio-row">
                                <p><span>No. SIM </span>: 34569676853</p>
                            </div>

                            <div class="bio-row">
                                <p><span>Tempat Lahir </span>: Garut</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Tanggal Lahir </span>: 30-Sept-1993</p>
                            </div>

                            <div class="bio-row">
                                <p><span>Transportir Asal </span>: PT. Incot</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Tanggal Masuk </span>: 30-Sept-1993</p>
                            </div>

                            <div class="bio-row">
                                <p><span>Alamat </span>: Jl. Margonda Selatan No. 76B Bandung</p>
                            </div>
                        </div>
                    </div>


                    <div class="panel-body bio-graph-info" id="EditProfile">
                        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                            <h1>Edit Profile Pengguna</h1>

                            <div class="row">
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">NIP</label><input type="checkbox"> On Call
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="cnip" name="nip" minlength="2" type="text" value="085247395" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">Nama</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="cama" name="nama" minlength="2" type="text" value="Jonathan Smith" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cjabatan" class="control-label col-lg-4">Jabatan</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan" >
                                            <option selected>Supir</option>
                                            <option>Kernet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cklas" class="control-label col-lg-4">Klasifikasi</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="cklas" name="klas">
                                            <option>8</option>
                                            <option>16</option>
                                            <option>24</option>
                                            <option selected>32</option>
                                            <option>40</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cstatus" class="control-label col-lg-4">Status</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="cstatus" name="status">
                                            <option>Aktif</option>
                                            <option>Tidak Aktif</option>
                                            <option>Peringatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="ctelp" class="control-label col-lg-4">No. Telp</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="ctelp" name="telp" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cktp" class="control-label col-lg-4">No. KTP</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="cktp" name="ktp" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="csim" class="control-label col-lg-4">No. SIM</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="csim" name="sim" minlength="2" type="text" required />
                                    </div>
                                </div>

                                <div class="bio-row">
                                    <label for="ctempatlahir" class="control-label col-lg-4">Tempat Lahir</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="tempatlahir" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="ctgllahir" class="control-label col-lg-4">Tanggal Lahir</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="ctgllahir" name="tgllahir" size="16" type="date" value="" required/>
                                        <span class="help-block">Select date</span>
                                    </div>
                                </div>

                                <div class="bio-row">
                                    <label for="ctransportir" class="control-label col-lg-4">Transportir Asal</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="ctransportir" name="transportir" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="ctglmasuk" class="control-label col-lg-4">Tanggal Masuk</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="ctglmasuk" name="tglmasuk" type="date" size="16" type="text" value="" required/>
                                        <span class="help-block">Select date</span>
                                    </div>
                                </div>

                                <div class="bio-row">
                                    <label for="calamat" class="control-label col-lg-4">Alamat</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="calamat" name="alamat" minlength="2" type="text" required />
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
                                                    <input type="file" class="default"/>
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
                                        <input style="float:right;" class="btn btn-success" type="submit" value="Simpan"/>    
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>



                    <div class="panel-body bio-graph-info" id="EditPass">
                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                            <h1>Edit Password</h1>

                            <div class="row">
                                <div class="bio-row">

                                    <label for="passwordlama" class="control-label col-lg-4">Password Lama</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control " id="cpasswodlama" name="passwordlama" minlength="2" type="password" value="" required />
                                    </div>
                                </div>
                                <div class="row"></div>                                
                                <div class="bio-row">
                                    <label for="passwordbaru" class="control-label col-lg-4">Password Baru</label>
                                    <div class="col-lg-8">
                                        <input class="form-control " id="password" name="password" type="password" />
                                    </div>
                                </div>
                                <div class="row"></div>    
                                <div class="bio-row">
                                    <label for="confirm_password" class="control-label col-lg-4">Confirm Password</label>
                                    <div class="col-lg-8">
                                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                    </div>
                                </div>
                                <div class="row"></div>   
                                <div class="bio-row">
                                    <div class="col-lg-12">
                                        <input style="float:right;" class="btn btn-success" type="submit" value="Simpan"/>    
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>



                </section>

            </aside>
        </div>

        <!-- page end-->

        <section class="panel">
            <header class="panel-heading">
                Tabel Kinerja
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
                                <th>User</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                                <th>Kata Kunci</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>1</td>
                                <td>07/08/2014</td>
                                <td>ansharabdullah</td>
                                <td>Pengawas Operasi</td>
                                <td>Import kinerja awak mobil tangki untuk tanggal 3 Jan 2014</td>
                                <td><span class="label label-success">Tambah</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td>08/08/2014</td>
                                <td>renisas</td>
                                <td>Pengawas Operasi</td>
                                <td>Hapus data AMT NIP 234567897 Nama Jaja</td>
                                <td><span class="label label-danger">Hapus</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td>09/08/2014</td>
                                <td>cepi</td>
                                <td>Supporting</td>
                                <td>Edit data AMT NIP 345678 Nama Dadan</td>
                                <td><span class="label label-warning">Edit</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td>10/08/2014</td>
                                <td>cahyadi</td>
                                <td>Site Supervisor</td>
                                <td>Hapus kinerja AMT nip 7192497 nama Juju Tanggal 30/09/2012</td>
                                <td><span class="label label-danger">Hapus</span></td>
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>5</td>
                                <td>11/08/2014</td>
                                <td>dodi</td>
                                <td>Staf OAM</td>
                                <td>Insert MS2 Compliance</td>
                                <td><span class="label label-success">Tambah</span></td>
                            </tr>

                            <tr class="">

                                <td style="display:none;"></td>
                                <td>6</td>
                                <td>12/08/2014</td>                                
                                <td>yana</td>
                                <td>OAM</td>
                                <td>Input Rencana</td>
                                <td><span class="label label-success">Tambah</span></td>
                            </tr>
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
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
   
		  
</script>