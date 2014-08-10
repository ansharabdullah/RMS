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
            <header class="panel-heading summary-head">
                <h4>Detail Mobil Tangki</h4>

            </header>
            <div class="panel-body">
                <a href="<?php echo base_url() ?>index.php/mt/apar_mt" rel="stylesheet" class="btn btn-primary"><i class="icon-fire-extinguisher"></i> APAR</a>
                <a href="<?php echo base_url() ?>index.php/mt/ban_mt" rel="stylesheet" class="btn btn-primary"> <i class=" icon-truck"></i> Ban</a>
                <a href="<?php echo base_url() ?>index.php/mt/oli_mt" rel="stylesheet" class="btn btn-primary"> <i class=" icon-truck"></i> Oli</a>
                <button type="button" class="btn btn-warning" onclick="ShowEdit()"><i class="icon-pencil"></i> Edit</button>
                <a class="btn btn-danger" data-toggle="modal" href="#myModal2"> Hapus </a>


                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                
                            </div>
                            <div class="modal-body">

                                Apakah anda yakin akan menghapus Data Mobil Tangki?

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                <button class="btn btn-warning" type="button"> Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
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

                    <h1>Edit Data MT</h1>

                    <div class="row">
                        <div class="bio-row">
                            <label for="nip" class="control-label col-lg-4">Nopol</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="cnip" name="nopol" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="nama" class="control-label col-lg-4">No Rangka</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="cama" name="norangka" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="cjabatan" class="control-label col-lg-4">Kapasitas</label>
                            <div class="col-lg-6">
                                <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan">
                                    <option>8</option>
                                    <option>16</option>
                                    <option>24</option>
                                    <option>32</option>
                                    <option>40</option>
                                </select>
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="nama" class="control-label col-lg-4">No Mesin</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="cama" name="nomesin" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="cklas" class="control-label col-lg-4">Produk</label>
                            <div class="col-lg-6">
                                <select class="form-control input-sm m-bot15" id="cklas" name="produk">
                                    <option>Premium</option>
                                    <option>Pertamax</option>
                                    <option>Solar</option>
                                    <option>Multi</option>
                                </select>
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="nama" class="control-label col-lg-4">Jenis Kendaraan</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="cama" name="nomesin" minlength="2" type="JK" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="calamat" class="control-label col-lg-4">Transportir</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="calamat" name="transportir" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="cstatus" class="control-label col-lg-4">Jenis Tangki</label>
                            <div class="col-lg-6">
                                <select class="form-control input-sm m-bot15" id="cstatus" name="JK">
                                    <option>Alumunium Aweco</option>
                                    <option>Carbon Steel</option>
                                    <option>Steel</option>
                                </select>
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="ctelp" class="control-label col-lg-4">Kompartemen</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="ctelp" name="telp" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="cktp" class="control-label col-lg-4">Standar Volume</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="cktp" name="sv" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="csim" class="control-label col-lg-4">Sensor Overfill</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="csim" name="so" minlength="2" type="text" required />
                            </div>
                        </div>

                        <div class="bio-row">
                            <label for="ctempatlahir" class="control-label col-lg-4">Kategori</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="kategori" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="ctransportir" class="control-label col-lg-4">Status</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="ctransportir" name="status" minlength="2" type="text" required />
                            </div>
                        </div>
                        <div class="bio-row">
                            <label for="ctglmasuk" class="control-label col-lg-4">GPS</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="ctglmasuk" name="gps" type="text" size="16" type="text" value="" required/>
                            </div>
                        </div>

                        <div class="bio-row">
                            <label for="calamat" class="control-label col-lg-4">Rasio</label>
                            <div class="col-lg-6">
                                <input class=" form-control input-sm m-bot15" id="calamat" name="rasio" minlength="2" type="text" required />
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">

                            <script type="text/javascript">
                                $(function () {
                                    $('#grafik').highcharts({
                                        title: {
                                            text: 'Grafik Kinerja MT',
                                            x: 20 //center
                                        },
                                        subtitle: {
                                            text: 'Tahun 2014',
                                            x: 20
                                        },
                                        xAxis: {
                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Persentase Kinerja'
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
                                            layout: 'vertical',
                                            align: 'right',
                                            verticalAlign: 'middle',
                                            borderWidth: 0
                                        },
                                        series: [{
                                                name: 'KiloMeter',
                                                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                                            }, {
                                                name: 'KiloLiter',
                                                data: [2, 8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                                            }, {
                                                name: 'Ritase',
                                                data: [9, 6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                                            }, {
                                                name: 'Own Use',
                                                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                                            }]
                                    });
                                });
                            </script>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="grafik"></div>
                                </div>
                            </div>


                        </div>
                    </div>
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
                            <th style="display: none;">-</th>
                            <th>No.</th>
                            <th>Nopol</th>
                            <th>Kilometer (Km)</th>
                            <th>Kiloliter (Kl)</th>
                            <th>Ritase (Rit)</th>
                            <th>Own Use</th>
                            <th>Premium</th>
                            <th>Pertamax</th>
                            <th>Pertamax Plus</th>
                            <th>Pertamax Dex</th>
                            <th>Solar</th>
                            <th>Bio Solar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>1</td>
                            <td>D 6308 AD</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>2</td>
                            <td>D 1725 AF</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>


                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>3</td>
                            <td>D 2245 AF</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>4</td>
                            <td>D 6066 AF</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>5</td>
                            <td>D 3038 AD</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>6</td>
                            <td>D 8557 AD</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>7</td>
                            <td>D 1346 AD</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>8</td>
                            <td>D 7152 AF</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>9</td>
                            <td>D 9487 AD</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>10</td>
                            <td>D 8827 AF</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>11</td>
                            <td>D 8711 AD</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                        </tr>
                        <tr class="">
                            <th style="display: none;"></th>
                            <td>12</td>
                            <td>D 8277 AF</td>
                            <td><?php echo rand(300, 500) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(2, 5) ?></td>
                            <td><?php echo rand(40, 150) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>
                            <td><?php echo rand(30, 70) ?></td>

                        </tr>
                    </tbody>
                </table>
                <a href="<?php echo base_url() ?>index.php/mt/data_mt" rel="stylesheet" class="btn btn-warning" style="float:left;"><i class=" icon-circle-arrow-lef"></i> Kembali</a>
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