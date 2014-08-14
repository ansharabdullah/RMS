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
                    name: 'Own Use',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5,3,4,5,6,7,5,2,5,8,9,6,5,4,5,5,6,7,9,13]
                }, {
                    type: 'spline',
                    name: 'Premium',
                    data: [-0.11, 0.9, 3.9, 9.4, 12.5, 15.0, 13.6, 15.9, 11.3, 10.0, 2.4, 3.0,7,8,9,11,7,3,6,5,3,9,2,7,3,4,1,5,6,2,3]
                }, {
                    type: 'spline',
                    name: 'Pertamax',
                    data: [0.2, 0.1, 3.7, 6.3, 15.0, 5.0, 21.8, 20.1, 25.1, 12.1, 9.6, 2.9,3,5,5,8,8,8,8,9,8,12,13,14,12,16,17,10,7,9,10]
                }, {
                    type: 'spline',
                    name: 'pertamax Plus',
                    data: [0.9, 0.2, 3.7, 11.9, 10.0, 19.0, 20.8, 21.1, 10.1, 4.1, 8.2, 3.5,1,4,4,5,7,6,8,4,3,9,6.1,5.1,4.1,5.1,5.1,6,5,9,13]
                }, {
                    type: 'spline',
                    name: 'Pertamax Dex',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,3,5,6,8,3,1,8,5,3,4,8,7,3,4,2,1,9,4,5]
                }, {
                    type: 'spline',
                    name: 'Solar',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5,3,4,5,6,7,5,2,5,8,9,6,5,4,5,5,6,7,9,13]
                }, {
                    type: 'spline',
                    name: 'Bio Solar',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0,3,5,6,8,3,1,8,5,3,4,8,7,3,4,2,1,9,4,5]
                }]
        });
    });
</script>

<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <div class="panel-body">
                <a href="<?php echo base_url() ?>mt/surat_mt" rel="stylesheet" class="btn btn-primary"><i class="icon-envelope"></i> Surat</a>
                <a href="<?php echo base_url() ?>mt/apar_mt" rel="stylesheet" class="btn btn-primary"><i class="icon-fire-extinguisher"></i> APAR</a>
                <a href="<?php echo base_url() ?>mt/ban_mt" rel="stylesheet" class="btn btn-primary"> <i class=" icon-circle"></i> Ban</a>
                <a href="<?php echo base_url() ?>mt/oli_mt" rel="stylesheet" class="btn btn-primary"> <i class=" icon-beer"></i> Oli</a>

            </div>
        </section>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <button class="btn btn-danger" type="button"> Yes</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- page start-->

        <section class="panel">
            <div class="panel-body bio-graph-info" id="ShowProfile">
                <header class="panel-heading">
                    <div class="col-lg-10">Detail MT
                    </div>
                    <a class="btn btn-warning" onclick="ShowEdit()" ><i class="icon-pencil"></i> Edit</a>

                    <a class="btn btn-danger" data-toggle="modal" href="#myModal2" > <i class="icon-remove"></i> Hapus </a>

                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="panel-body">
                            <aside class="profile-nav col-lg-12">
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Nopol </span>: D9808AD</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Nomor Rangka </span>: 912814KM</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Kapasitas </span>: 16</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Nomor Mesin </span>: KAIDU129314</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Produk </span>: Pertamax</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Jenis Kendaraan </span>: Hino 3.2</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Transportir </span>: PT Masoem</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Jenis Tangki</span>: Steel</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Kompartemen</span>: </p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Status</span>: Pinjam</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>GPS </span>: OK</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Sensor Overfill </span>: OK</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Volume 1 </span>: OK</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Standar Volume </span>: OK</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Kategori </span>: 1</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Rasio </span>: 12</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Jumlah Segel </span>: 8</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="panel-body">
                            <aside class="profile-nav col-lg-12">
                                <header class="panel-heading">
                                    Ruang Kosong Tangki (t1)

                                </header>&nbsp
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Komp 1</span>: 12</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 2</span>: 13</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 3</span>: 14</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 4</span>: 15</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 5</span>: 16</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 6</span>: 17</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="panel-body">
                            <aside class="profile-nav col-lg-12">
                                <header class="panel-heading">
                                    Ruang Kosong Tangki (t2)

                                </header>&nbsp
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Komp 1</span>: 19</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 2</span>: 20</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 3</span>: 21</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 4</span>: 22</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 5</span>: 23</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 6</span>: 24</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="panel-body">
                            <aside class="profile-nav col-lg-12">
                                <header class="panel-heading">
                                    Kepekaan

                                </header>&nbsp
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Komp 1</span>: 25</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 2</span>: 26</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 3</span>: 27</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 4</span>: 28</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 5</span>: 29</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Komp 6</span>: 30</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body bio-graph-info" id="ShowEdit">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                    <header class="panel-heading">
                        Edit MT  
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Nopol</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="cnip" name="nopol"  type="text" required />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nama" class="control-label col-lg-4">No Rangka</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="cama" name="norangka"  type="text" required />
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
                                    <input class=" form-control input-sm m-bot15" id="cmesin" name="nomesin"  type="text" required />
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
                                    <input class=" form-control input-sm m-bot15" id="cjk" name="jk"  type="text" required />
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
                                    <input class=" form-control input-sm m-bot15" id="crasio" name="rasio" type="text" size="16" type="text" required/>
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="cjenistangki" class="control-label col-lg-4">Jenis Tangki</label>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="cjenistangki" name="jenistangki">
                                        <option>Alumunium Aweco</option>
                                        <option>Carbon Steel</option>
                                        <option>Steel</option>
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
                                <label for="kompartemen" class="control-label col-lg-4">Model Kendaraan</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="mk" name="mk" type="text" size="16" type="text" required/>
                                </div>
                            </div>

                            <div class="bio-row">
                                <label for="status" class="control-label col-lg-4">Status</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="cstatus" name="status"  type="text" required />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="gps" class="control-label col-lg-4">GPS</label>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="gps" name="gps">
                                        <option>OK</option>
                                        <option>NO</option>
                                    </select></div>
                            </div>
                            <div class="bio-row">
                                <label for="gps" class="control-label col-lg-4">Sensor Overfill</label>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="sensor" name="sensor">
                                        <option>OK</option>
                                        <option>NO</option>
                                    </select></div>
                            </div>
                            <div class="bio-row">
                                <label for="gps" class="control-label col-lg-4">Standar Volume</label>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="sensor" name="sensor">
                                        <option>OK</option>
                                        <option>NO</option>
                                    </select></div>
                            </div>
                            <div class="bio-row">
                                <label for="gps" class="control-label col-lg-4">Volume 1</label>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="sensor" name="sensor">
                                        <option>OK</option>
                                        <option>NO</option>
                                    </select></div>
                            </div>
                            <div class="bio-row">
                                <label for="gps" class="control-label col-lg-4">Jumlah Segel</label>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm m-bot15" id="segel" name="segel">
                                        <option>4</option>
                                        <option>6</option>                                        
                                        <option>8</option>
                                        <option>10</option>
                                        <option>12</option> 
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
                                    <input class=" form-control input-sm m-bot15" id="komp1" name="komp1"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp2</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="komp2" name="komp2"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp3</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="komp3" name="komp3"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp4</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="komp4" name="komp4"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp5</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="komp5" name="komp5"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp6</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="komp6" name="komp6"  type="number"  />
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
                                    <input class=" form-control input-sm m-bot15" id="k1" name="k1"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 2</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="k2" name="k2"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 3</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="k3" name="k3"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 4</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="k4" name="k4"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 5</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="k5" name="k5"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 6</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="k6" name="k6"  type="number"  />
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
                                    <input class=" form-control input-sm m-bot15" id="ke1" name="ke1"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 2</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="ke2" name="ke2"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 3</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="ke3" name="ke3"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 4</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="ke4" name="ke4"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 5</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="ke5" name="ke5"  type="number"  />
                                </div>
                            </div>
                            <div class="bio-row">
                                <label for="nip" class="control-label col-lg-4">Komp 6</label>
                                <div class="col-lg-6">
                                    <input class=" form-control input-sm m-bot15" id="ke6" name="ke6"  type="number"  />
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
                        <a class="btn btn-info" data-toggle="modal" href="#myModal">
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
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>1</td>

                                <td>23-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>

                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>2</td>

                                <td>24-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>

                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>3</td>
                                <td>25-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>4</td>
                                <td>26-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>5</td>
                                <td>27-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>6</td>
                                <td>28-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>7</td>
                                <td>29-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>8</td>
                                <td>30-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>9</td>
                                <td>30-08-2014</td>
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
                                <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit kinerja" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus kinerja" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>


        </section>

        
        <!-- page end-->
    </section>
</section>
<!--main content end-->





<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                Apakah anda yakin ?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                <button class="btn btn-danger" type="button"> Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Atur Kinerja</h4>
            </div>
            <div class="modal-body">

                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
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
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" type="submit" value="Simpan"/>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- modal -->
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Atur Kinerja</h4>
            </div>
            <div class="modal-body">

                <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="get" action="">
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
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" type="submit" value="Simpan"/>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- modal -->









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