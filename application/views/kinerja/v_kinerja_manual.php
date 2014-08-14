<script type="text/javascript">
    $( document ).ready(function() {
        $("#ShowMobil").show();
        $("#ShowAwak").hide();
        $("#mt").show();
        $("#amt").hide();
    });
    
    function changeJenis()
    {
        if($("#kinerja").val() == "Mobil Tangki" )
        {
            $("#ShowMobil").show();
            $("#ShowAwak").hide();
            $("#mt").show();
            $("#amt").hide();
        }
        else if($("#kinerja").val() == "Awak Mobil Tangki" )
        {
            $("#ShowAwak").show();
            $("#ShowMobil").hide();
            $("#amt").show();
            $("#mt").hide();
        }
    }
    
    
</script>

<script type="text/javascript">
         
    $( document ).ready(function() {
        $("#filePreview").hide();
        
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {
                alert("Berhasil disimpan! ");
                $("#myModal").modal('toggle');
            }
            
        });
        
    });
    
    function importTable()
    {
        alert("Berhasil disimpan !");
    }
    
</script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/css/datepicker.css" />
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading" id="mt">
                Input Kinerja Mobil Tangki
            </header>
            <header class="panel-heading" id="amt">
                Input Kinerja Awak Mobil Tangki
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="form">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Jenis Kinerja</label>
                        <div class="col-lg-2">
                            <select class="form-control input-sm m-bot15" id="kinerja" onchange="changeJenis()">
                                <option value="Mobil Tangki"> Mobil Tangki</option>
                                <option value="Awak Mobil Tangki"> Awak Mobil Tangki</option>
                            </select> 
                        </div>
                    </div>
                </form>
                <div class="adv-table editable-table" id="ShowMobil">
                    <div class="clearfix">
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>Transportir</th>
                                <th>Kapasitas</th>
                                <th>Produk</th>
                                <th>kategori</th>
                                <th>Status</th>
                                <th>Kinerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>1</td>
                                <td>D 6308 AD</td>
                                <td>PT MA'SOEM</td>
                                <td>8</td>
                                <td class="center">Bio Solar</td>
                                <td>1</td>
                                <td>Sewa</td>

                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>2</td>
                                <td>D 1725 AF</td>
                                <td>PT WANDISIRI</td>
                                <td>8</td>
                                <td class="center">Solar</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>3</td>
                                <td>D 2245 AF</td>
                                <td>PT PUSPITA CIPATA</td>
                                <td>24</td>
                                <td class="center">Pertamax</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>4</td>
                                <td>D 6066 AF</td>
                                <td>PT PATRA NIAGA</td>
                                <td>16</td>
                                <td class="center">Premium</td>
                                <td>2</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>5</td>
                                <td>D 3038 AD</td>
                                <td>PT INCOT</td>
                                <td>32</td>
                                <td class="center">Premium</td>
                                <td>2</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>6</td>
                                <td>D 8557 AD</td>
                                <td>PT JUJUR PARAMARTA</td>
                                <td>8</td>
                                <td class="center">Pertamax Dex</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>7</td>
                                <td>D 1346 AD</td>
                                <td>PT MA'SOEM</td>
                                <td>24</td>
                                <td class="center">Pertamax Plus</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>8</td>
                                <td>D 7152 AF</td>
                                <td>PT PATRA NIAGA</td>
                                <td>16</td>
                                <td class="center">Bio Solar</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>9</td>
                                <td>D 9487 AD</td>
                                <td>PT TIARA</td>
                                <td>24</td>
                                <td class="center">Solar</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>10</td>
                                <td>D 8827 AF</td>
                                <td>PT PATRA NIAGA</td>
                                <td>32</td>
                                <td class="center">Premium</td>
                                <td>2</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>11</td>
                                <td>D 8711 AD</td>
                                <td>PT PUSPITA CIPATA</td>
                                <td>16</td>
                                <td class="center">Pertamax</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>12</td>
                                <td>D 8277 AF</td>
                                <td>PT NAGAMAS JAYA</td>
                                <td>8</td>
                                <td class="center">Premium</td>
                                <td>1</td>
                                <td>Sewa</td>
                                <td><a data-toggle="modal" data-placement="left" href="#mtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="adv-table editable-table" id="ShowAwak">
                    <div class="clearfix">
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample2">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Klasifikasi</th>
                                <th>Transportir Asal</th>
                                <th>Kinerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>1</td>
                                <td>94112</td>
                                <td>Asep</td>
                                <td>Supir</td>
                                <td>PT. Masoem</td>
                                <td class="center">8</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>2</td>
                                <td>1294</td>
                                <td>Waringin</td>
                                <td>Supir</td>
                                <td>PT. Masoem</td>
                                <td class="center">8</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>3</td>
                                <td>1209312</td>
                                <td>Cipata</td>
                                <td>Supir</td>
                                <td>PT. Masoem</td>
                                <td class="center">24</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>4</td>
                                <td>123145</td>
                                <td>Niaga</td>
                                <td>Kernet</td>
                                <td>PT. Patra</td>
                                <td class="center">24</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>5</td>
                                <td>1241258</td>
                                <td>Incot</td>
                                <td>Kernet</td>
                                <td>PT. Patra</td>
                                <td class="center">24</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>6</td>
                                <td>92340</td>
                                <td>Rasya</td>
                                <td>Supir</td>
                                <td>PT. Patra</td>
                                <td class="center">8</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>7</td>
                                <td>92124</td>
                                <td>Rama</td>
                                <td>Supir</td>
                                <td>PT. Tiara</td>
                                <td class="center">24</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>8</td>
                                <td>127152</td>
                                <td>Akun</td>
                                <td>Supir</td>
                                <td>PT. Tiara</td>
                                <td class="center">16</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>9</td>
                                <td>123846</td>
                                <td>Firman</td>
                                <td>Supir</td>
                                <td>PT. Tiara</td>
                                <td class="center">32</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>10</td>
                                <td>1239174</td>
                                <td>Aga</td>
                                <td>Kernet</td>
                                <td>PT. Tiara</td>
                                <td class="center">32</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>11</td>
                                <td>928374</td>
                                <td>Maskum</td>
                                <td>Kernet</td>
                                <td>PT. Tiara</td>
                                <td class="center">16</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                            <tr class="">
                                <th style="display: none;"></th>
                                <td>12</td>
                                <td>1845142</td>
                                <td>Supir</td>
                                <td>Supir</td>
                                <td>PT. Tiara</td>
                                <td class="center">8</td>
                                <td><a data-toggle="modal" data-placement="left" href="#amtModal" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Kinerja"><i class="icon-plus"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="mtModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Atur Kinerja</h4>
                            </div>
                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="date" size="16" name="tgl" required/>
                                            <span class="help-block">Pilih Tanggal</span>
                                        </div>

                                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="nopol" name="nopol" placeholder="Nopol" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="km" class="col-lg-2 col-sm-2 control-label">Kilometer (km)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="km" placeholder="Kilometer (km)" name="km" required>
                                        </div>

                                        <label for="kl" class="col-lg-2 col-sm-2 control-label">Kiloliter (kl)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="kl" placeholder="Kiloliter (kl)" name="kl" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rit" class="col-lg-2 col-sm-2 control-label">Ritase (rit)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="rit" placeholder="Ritase (rit)" name="rit" required>
                                        </div>

                                        <label for="ou" class="col-lg-2 col-sm-2 control-label">Own Use</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="ou" placeholder="Own Use"  name="ou" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="premium" class="col-lg-2 col-sm-2 control-label">Premium</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="premium" placeholder="Premium" name="premium" required>
                                        </div>

                                        <label for="pertamax" class="col-lg-2 col-sm-2 control-label">Pertamax</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="pertamax" placeholder="Pertamax"  name="pertamax" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pertamaxplus" class="col-lg-2 col-sm-2 control-label">Pertamax Plus</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="pertamaxplus" placeholder="Pertamax Plus"  name="pertamaxplus" required>
                                        </div>

                                        <label for="pertamaxdex" class="col-lg-2 col-sm-2 control-label">Pertamax Dex</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="pertamaxdex" placeholder="Pertamax Dex" name="pertamaxdex" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="solar" class="col-lg-2 col-sm-2 control-label">Solar</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="solar" placeholder="Solar"  name="solar" required>
                                        </div>

                                        <label for="biosolar" class="col-lg-2 col-sm-2 control-label">Bio Solar</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="biosolar" placeholder="Bio Solar"  name="biosolar" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="submit">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="amtModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Atur Kinerja</h4>
                            </div>
                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="date" size="16" name="tgl" required/>
                                            <span class="help-block">Pilih Tanggal</span>
                                        </div>

                                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">SPBU</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="nopol" name="nopol" placeholder="Nopol" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="km" class="col-lg-2 col-sm-2 control-label">Kilometer (km)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="km" placeholder="Kilometer (km)" name="km" required>
                                        </div>

                                        <label for="kl" class="col-lg-2 col-sm-2 control-label">Kiloliter (kl)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="kl" placeholder="Kiloliter (kl)" name="kl" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rit" class="col-lg-2 col-sm-2 control-label">Ritase (rit)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="rit" placeholder="Ritase (rit)" name="rit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="submit">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </section>
        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();       
    });
    
    
    
</script>