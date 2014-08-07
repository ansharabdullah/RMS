<script type="text/javascript">
    $( document ).ready(function() {
        $("#ShowProfile").show();
        $("#EditProfile").hide();
    });
    
    function ShowProfile(){
        $("#ShowProfile").show();
        $("#EditProfile").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
}
    
    function EditProfile(){
        $("#ShowProfile").hide();
        $("#EditProfile").show();
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
    }
</script>

<section id="main-content">
    <section class="wrapper">


        <section class="panel">
            <header class="panel-heading">
                Detail Awak Mobil Tangki
            </header>
            <div class="panel-body">
                <button type="button" class="btn btn-warning"><i class="icon-warning-sign"></i> Peringatan</button>
                <button type="button" class="btn btn-danger "><i class="icon-eraser"></i> Hapus</button>

            </div>
        </section>



        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="<?php echo base_url() ?>assets/img/profile-avatar.jpg" alt="">
                        </a>
                        <h1>Jonathan Smith</h1>
                        <p>jsmith@flatlab.com</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li id="btnProf" class="active"><a href="javascript:ShowProfile();"> <i class="icon-user" ></i> Profile</a></li>
                        <li id="btnEdit"><a href="javascript:EditProfile();" > <i class="icon-edit"></i> Edit profile</a></li>
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">

                <section class="panel">

                    <div class="panel-body bio-graph-info" id="ShowProfile">
                        <h1>Bio Graph</h1>
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

                            <h1>Edit Bio Graph</h1>

                            <div class="row">
                                <div class="bio-row">
                                    <label for="nip" class="control-label col-lg-4">NIP</label><input type="checkbox"> On Call
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="cnip" name="nip" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="nama" class="control-label col-lg-4">Nama</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="cama" name="nama" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="bio-row">
                                    <label for="cjabatan" class="control-label col-lg-4">Jabatan</label>
                                    <div class="col-lg-6">
                                        <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan">
                                            <option>Supir</option>
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
                                            <option>32</option>
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
                </section>

            </aside>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->