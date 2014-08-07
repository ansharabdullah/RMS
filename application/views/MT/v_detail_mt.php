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

<section id="main-content">
    <section class="wrapper">


        <section class="panel">
            <header class="panel-heading">
                Detail Mobil Tangki
            </header>
            <div class="panel-body">
                <button type="button" class="btn btn-primary "><i class="icon-fire-extinguisher"></i> APAR</button>
                <button type="button" class="btn btn-primary "><i class=" icon-truck"></i> Ban</button>
                <button type="button" class="btn btn-warning" onclick="ShowEdit()"><i class="icon-pencil"></i> Edit</button>
                <button type="button" class="btn btn-danger "><i class="icon-eraser"></i> Hapus</button>

            </div>

            <!-- page start-->
            <div class="row">
                <div class="panel-body">
                    <div class="panel-body bio-graph-info" id="ShowProfile">
                        <aside class="profile-nav col-lg-12">
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Nopol </span>: D9808AD</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Nomor Rangka </span>: 912814KM</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Transportir </span>: PT Masoem</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Nomor Mesin </span>: KAIDU129314</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Kapasitas </span>: 16</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Jenis Kendaraan </span>: Hino 3.2</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Jenis Tangki</span>: Steel</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Kompartemen </span>: 200</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Standar Volume </span>: OK</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Sensor Overfill </span>: OK</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Kategori</span>: 1</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Status</span>: Pinjam</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>GPS </span>: OK</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Rasio </span>: 12</p>
                                </div>

                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            <div class="panel-body bio-graph-info" id="ShowEdit">
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
            <section class="panel">
                <header class="panel-heading">
                    Tabel Kinerja MT  
                </header>
                <div class="panel-body">
                   
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th>No.</th>
                                <th>Posisi Ban</th>
                                <th>Tanggal Pasang</th>
                                <th>Tanggal Ganti</th>
                                <th>Merk Ban</th>
                                <th>No Seri</th>
                                <th>Jenis Ban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>1</td>
                                <td>1</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>Aspal</td>
                                <td>129124KM</td>
                                <td>Original</td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>2</td>
                                <td>2</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>Aspal</td>
                                <td>129124KM</td>
                                <td>Original</td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>3</td>
                                <td>3</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>Aspal</td>
                                <td>129124KM</td>
                                <td>Original</td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>4</td>
                                <td>4</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>Aspal</td>
                                <td>129124KM</td>
                                <td>Original</td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>5</td>
                                <td>5</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>Aspal</td>
                                <td>129124KM</td>
                                <td>Original</td>
                            </tr>
                            <tr class="">
                                <th style="display:none;"></th>
                                <td>6</td>
                                <td>6</td>
                                <td>23/02/2009</td>
                                <td>23/02/2009</td>
                                <td>Aspal</td>
                                <td>129124KM</td>
                                <td>Original</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
            </section>
       
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

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