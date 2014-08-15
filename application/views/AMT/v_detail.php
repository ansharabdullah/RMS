<script type="text/javascript">
    $( document ).ready(function() {
        $("#EditProfile").hide();
    });
    
    function ShowProfile(){
        $("#ShowProfile").slideDown("slow");
        $("#EditProfile").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
    }
    
    function EditProfile(){
        $("#ShowProfile").hide();
        $("#EditProfile").slideDown("slow");
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
    }
    
    
    
    
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
                    name: 'SPBU',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8,12,14,15,16,13,14,15,11,6,7,9,8,5,4,2,4,7,15,17]
                }]
        });
    });
</script>

<section id="main-content">
    <section class="wrapper">


        <section class="panel">
            <header class="panel-heading">
                Detail Awak Mobil Tangki
            </header>
            <div class="panel-body">
                <a class="btn btn-warning" data-toggle="modal" href="#ModalPeringatan"><i class="icon-warning-sign"></i> Peringatan</a>

                <a class="btn btn-danger" data-toggle="modal" href="#ModalHapus"><i class="icon-eraser"></i> Hapus</a>


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
                        <h1>Profile Awak Mobil Tangki</h1>
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

                            <h1>Edit Profile Awak Mobil Tangki</h1>

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
                                        <span class="help-block">Pilih tanggal</span>
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
                                        <span class="help-block">Pilih tanggal</span>
                                    </div>
                                </div>

                                <div class="bio-row">
                                    <label for="calamat" class="control-label col-lg-4">Alamat</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control input-sm m-bot15" id="calamat" name="alamat" minlength="2" type="text" required />
                                    </div>
                                </div>

                                <div class="bio-row">
                                    <label class="control-label col-md-4">Unggah Foto</label>
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


        <section class="panel">
            <div class="panel-body">
                <div class="col-lg-12">
                    <div id="grafik"></div>
                </div>
            </div>
        </section>



        <section class="panel">
            <header class="panel-heading">
                Tabel Kinerja
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">

                            <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahKinerja">
                                Tambah Kinerja <i class="icon-plus"></i>
                            </a>

                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                <li><a href="javascript:FilterData('hadir');">Hadir</a></li>
                                <li><a href="javascript:FilterData('absen');">Absen</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>KM</th>
                                <th>KL</th>
                                <th>Rit</th>
                                <th>SPBU</th>
                                <th>Kehadiran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>1</td>
                                <td>07/08/2014</td>
                                <td>30</td>
                                <td>10</td>
                                <td>8</td>
                                <td>24</td>
                                <td><span class="label label-success">Hadir</span></td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>
                               
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td>08/08/2014</td>
                                <td>20</td>
                                <td>10</td>
                                <td>3</td>
                                <td>4</td>
                                <td><span class="label label-success">Hadir</span></td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>
                               
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td>09/08/2014</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><span class="label label-warning">Absen</span></td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>
                               
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td>10/08/2014</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><span class="label label-warning">Absen</span></td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>
                               
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>5</td>
                                <td>11/08/2014</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><span class="label label-warning">Absen</span></td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>
                               
                            </tr>

                            <tr class="">

                                <td style="display:none;"></td>
                                <td>6</td>
                                <td>12/08/2014</td>                                
                                <td>55</td>
                                <td>32</td>
                                <td>2</td>
                                <td>1</td>
                                <td><span class="label label-success">Hadir</span></td>
                                <td>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                    <a data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                </td>
                               

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>



    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalPeringatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Peringatan</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">

                                <div class="form-group ">
                                    <label for="cjenis" class="control-label col-lg-4">Jenis</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="cjenis" name="jenis">
                                            <option>Teguran 1</option>
                                            <option>Teguran 2</option>
                                            <option>Teguran 3</option>
                                            <option>Surat Peringatan 1</option>
                                            <option>Surat Peringatan 2</option>
                                            <option>Surat Peringatan 3</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="form-group ">                                            
                                    <label for="ctglberlaku" class="control-label col-lg-4">Tanggal Berlaku</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="ctglberlaku" name="tglbelaku" size="16" type="date" value="" required/>
                                        <span class="help-block">Pilih Tanggal</span>
                                    </div>
                                </div>

                                <div class="form-group ">                                            
                                    <label for="ctglhangus" class="control-label col-lg-4">Tanggal Hangus</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="ctglhangus" name="tglhangus" size="16" type="date" value="" required/>
                                        <span class="help-block">Pilih Tanggal</span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="calasan" class="control-label col-lg-4">Alasan</label>
                                    <div class="col-lg-8">
                                        <textarea class=" form-control input-sm m-bot15" id="calasan" name="alasan" minlength="2" type="text" required ></textarea>
                                    </div>


                                </div>


                            </div>
                        </section>
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

<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Awak Mobil Tangki?</h4>
            </div>
            <div class="modal-body">

                Apakah Anda yakin?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success" type="button">OK</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="ModalTambahKinerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Kinerja</h4>
            </div>

            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">



                                <div class="form-group ">                                            
                                    <label for="ctglkinerja" class="control-label col-lg-4">Tanggal Kinerja</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="ctglkinerja" name="tglkinerja" size="16" type="date" value="" required/>
                                        <span class="help-block">Pilih Tanggal</span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="ckm" class="control-label col-lg-2">Kilometer</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="ckm" name="km" minlength="2" type="text" required />
                                    </div>

                                    <label for="ckl" class="control-label col-lg-2">Kiloliter</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="ckl" name="kl" minlength="2" type="text" required />
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="crit" class="control-label col-lg-2">Ritase</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="crit" name="rit" minlength="2" type="text" required />
                                    </div>

                                    <label for="cspbu" class="control-label col-lg-2">Jumlah SPBU</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cspbu" name="spbu" minlength="2" type="text" required />
                                    </div>
                                </div>
                            </div>
                        </section>
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