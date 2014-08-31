
<script>
        var apar = new Array();
        var surat = new Array();
    $(document).ready(function(){
        $("#tabel-ban").hide();
        $("#tabel-surat").hide();
        $("#tabel-oli").hide();
        
        //masukin array apar ke javascript
        var ap;
        <?php
             foreach($apar as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_APAR?>";
                 ap['nopol'] = "<?php echo $a->NOPOL?>";
                 ap['tgl_store'] = "<?php echo $a->tgl_store?>";
                 ap['tgl_catridge'] = "<?php echo $a->tgl_catridge?>";
                 ap['tgl_co2'] = "<?php echo $a->tgl_co2?>";
                 ap['store_pressure'] = "<?php echo $a->store_pressure?>";
                 ap['catridge'] = "<?php echo $a->catridge?>";
                 ap['co2'] = "<?php echo $a->co2?>";
                 apar.push(ap);
                 <?php
             }
                        ?>
                                
        
    });
</script>
<script>
        var surat = new Array();
    $(document).ready(function(){
        $("#tabel-ban").hide();
        $("#tabel-surat").hide();
        $("#tabel-oli").hide();
        //masukin array apar ke javascript
        var ap;
       
        <?php
             foreach($surat as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_SURAT?>";
                 ap['suratnopol'] = "<?php echo $a->suratnopol?>";
                 ap['ID_JENIS_SURAT'] = "<?php echo $a->ID_JENIS_SURAT?>";
                 ap['tgl_akhir_surat'] = "<?php echo $a->tanggal_akhir_surat?>";
                 ap['tgl_surat'] = "<?php echo $a->tgl_surat?>";
                 ap['KETERANGAN_SURAT'] = "<?php echo $a->KETERANGAN_SURAT?>";
                 surat.push(ap);
                 <?php
             }
                        ?>
        
    });
</script>
<script>
        var ban = new Array();
    $(document).ready(function(){
        $("#tabel-ban").hide();
        $("#tabel-surat").hide();
        $("#tabel-oli").hide();
        //masukin array apar ke javascript
        var ap;
       
        <?php
             foreach($ban as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_BAN?>";
                 ap['nopol'] = "<?php echo $a->NOPOL?>";
                 ap['tgl_ban'] = "<?php echo $a->tgl_ban?>";
                 ap['TANGGAL_PASANG'] = "<?php echo $a->TANGGAL_PASANG?>";
                 ap['TANGGAL_GANTI_BAN'] = "<?php echo $a->TANGGAL_GANTI_BAN?>";
                 ap['MERK_BAN'] = "<?php echo $a->MERK_BAN?>";
                 ap['NO_SERI_BAN'] = "<?php echo $a->NO_SERI_BAN?>";
                 ap['JENIS_BAN'] = "<?php echo $a->JENIS_BAN?>";
                 ban.push(ap);
                 <?php
             }
                        ?>
        
    });
</script>
<script>
        var oli = new Array();
    $(document).ready(function(){
        $("#tabel-ban").hide();
        $("#tabel-surat").hide();
        $("#tabel-oli").hide();
        //masukin array apar ke javascript
        var ap;
       
        <?php
             foreach($oli as $a)
             {
                 ?>
                 ap = new Array();
                 ap['id'] = "<?php echo $a->ID_OLI?>";
                 ap['olinopol'] = "<?php echo $a->olinopol?>";
                 ap['tgl_oli'] = "<?php echo $a->tgl_oli?>";
                 ap['tanggal_ganti_oli'] = "<?php echo $a->tanggal_ganti_oli?>";
                 ap['MERK_OLI'] = "<?php echo $a->MERK_OLI?>";
                 ap['KM_AWAL'] = "<?php echo $a->KM_AWAL?>";
                 ap['TOTAL_VOLUME'] = "<?php echo $a->TOTAL_VOLUME?>";
                 oli.push(ap);
                 <?php
             }
                        ?>
        
    });
</script>


<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Pengingat Mobil Tangki
            </header>
            <div class="panel-body" >
                <div class="clearfix">
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Filter<i class="icon-angle-down"></i></button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#" onclick="filter('apar');">Apar</a></li>
                            <li><a href="#" onclick="filter('ban');">Ban</a></li>
                            <li><a href="#" onclick="filter('oli');">Oli</a></li>
                            <li><a href="#" onclick="filter('surat');">Surat Mobil Tangki</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="adv-table editable-table " id="tabel-apar">
                    <div class="space10">
                        <h3><i class="icon-fire-extinguisher"></i> Pengingat Apar</h3>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>Store Pressure</th>
                                <th>Catridge</th>
                                <th>C02</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                          
                            $i = 0;
                            foreach ($apar as $row) {
                                $color = "";
                                if ($row->STATUS_APAR== "0"){
                                    if($row->store_pressure <= 7 || $row->catridge <=7 || $row->co2 <=7)
                                    {
                                        $color = "style='background-color: orange;'";
                                    }
                                    ?>
                                    <tr>
                                        <th style="display: none;"></th>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $i + 1; ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><span id="nopol<?php echo $i ?>"><?php echo $row->NOPOL ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal"  style ="text-decoration: underline" data-toggle="modal"  onclick="setDetail('<?php echo $i ?>')"><div id="<?php echo 'apar1-' . $i; ?>"><?php echo $row->store_pressure; ?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal"  style ="text-decoration: underline" data-toggle="modal" onclick="setDetail('<?php echo $i ?>')"><div id="<?php echo 'apar2-' . $i; ?>"><?php echo $row->catridge;?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal"  style ="text-decoration: underline" data-toggle="modal" onclick="setDetail('<?php echo $i ?>')"><div id="<?php echo 'apar3-' . $i; ?>"><?php echo $row->co2 ; ?> hari</div></a></td>
                                        </tr>
                                    <?php
                                $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="adv-table editable-table " id="tabel-ban">
                    <div class="space10">

                        <h3><i class="icon-compass"></i> Pengingat Ban</h3>

                    </div>
                    <table class="table table-hover table-bordered" id="editable-sample2">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>MERK BAN</th>
                                <th>NO SERI BAN</th>
                                <th>JENIS BAN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($ban as $row) {
                            
                            
                                if($row->tanggal_ban <= 7 ) {
                                    $color = "orange";
                                } else {
                                    $color = "transparent";
                                }
                                ?>
                                    <th style="display: none;"></th>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $i + 1; ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="nopol<?php echo $i ?>"><?php echo $row->NOPOL ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $row->MERK_BAN ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $row->NO_SERI_BAN ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $row->JENIS_BAN ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><a data-toggle="modal" href="#modalBan" class="btn btn-success btn-xs" onClick="cekBan()">Cek Ban</a></td>
                                </tr>
                                 <?php
                                $i++;
                                
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


                <div class="adv-table editable-table " id="tabel-surat">
                    <div class="space10">

                        <h3><i class="icon-envelope"></i> Pengingat Surat Mobil Tangki</h3>

                    </div>
                    <table class="table table-hover table-bordered" id="editable-sample3">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Berakhir</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
//                          
                            $i = 0;
                            foreach ($surat as $row) {
                                if ($row->KETERANGAN_SURAT== "Aktif"){
                                $color = "";
                                
                                    if($row->tanggal_akhir_surat <= 7 )
                                    {
                                        $color = "style='background-color: orange;'";
                                    }
                                    ?>
                                    
                                        <th style="display: none;"></th>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $i + 1; ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><span id="nopol<?php echo $i ?>"><?php echo $row->suratnopol; ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php if($row->ID_JENIS_SURAT == "1")echo 'STNK'?>
                                        <?php if($row->ID_JENIS_SURAT == "2")echo 'Pajak'?>
                                        <?php if($row->ID_JENIS_SURAT == "3")echo 'KEUR'?>
                                        <?php if($row->ID_JENIS_SURAT == "4")echo 'TERA'?>
                                    </td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#modalSurat" style ="text-decoration: underline" data-toggle="modal" onclick="setDetailSurat('<?php echo $i ?>')"><div id="<?php echo 'tgl_akhir-' . $i; ?>"><?php echo $row->tanggal_akhir_surat; ?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>">
                                        <?php echo $row->KETERANGAN_SURAT ?>
                                        </td>
                                        
                                        </tr>
                                    <?php
                                $i++;
                                }
                                
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="adv-table editable-table " id="tabel-oli">
                    <div class="space10">
                        <h3><i class="icon-fire-extinguisher"></i> Pengingat Oli</h3>
                    </div>
                    <table class="table table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>KM Awal</th>
                                <th>Merk Oli</th>
                                <th>Total Volume</th>
                                <th>Sisa Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                          
                            $i = 0;
                            foreach ($oli as $row) {
                                $color = "";
                               
                                    if($row->tanggal_ganti_oli <= 7)
                                    {
                                        $color = "style='background-color: orange;'";
                                    }
                                    ?>
                                    
                                        <th style="display: none;"></th>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $i + 1; ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><span id="nopolmobil<?php echo $i ?>"><?php echo $row->olinopol ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->KM_AWAL ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->MERK_OLI ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->TOTAL_VOLUME ?></td> 
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#modalOli" style ="text-decoration: underline" data-toggle="modal" onclick="setDetailOli('<?php echo $i ?>')"><div id="<?php echo 'tgl_akhir-' . $i; ?>"><?php echo $row->tanggal_ganti_oli; ?> hari</div></a></td>
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
        <!-- page end-->
    </section>
</section>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Apar</h4>
            </div>
            <form class="form-horizontal" role="form" id="form-edit" action="" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  id="nopol" readonly="readonly" name="nopol" placeholder="Nopol">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">STORE PRESSURE</label><hr/>
                    </div>
                    <div class="form-group">
                        <label for="nopol" class="col-lg-3 col-sm-2 control-label">Sisa waktu</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="hari_store" readonly="readonly" name="sisa" placeholder="Jenis Apar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl" class="col-lg-3 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="date" value="" id="tgl_store" size="16"  name="tgl_store" required="required"/>
                            <span class="help-block">Pilih Tanggal</span>
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-lg-3 col-sm-2 control-label">CATRIDGE</label><hr/>
                    </div>
                    <div class="form-group">
                        <label for="nopol" class="col-lg-3 col-sm-2 control-label">Sisa waktu</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="hari_catridge" readonly="readonly" name="sisa" placeholder="Jenis Apar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl" class="col-lg-3 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="date" value="" id="tgl_catridge" size="16"  name="tgl_catridge" required="required"/>
                            <span class="help-block">Pilih Tanggal</span>
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-lg-3 col-sm-2 control-label">CO2</label><hr/>
                    </div>
                    <div class="form-group">
                        <label for="nopol" class="col-lg-3 col-sm-2 control-label">Sisa waktu</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="hari_co2" readonly="readonly" name="sisa" placeholder="Jenis Apar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl" class="col-lg-3 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="date" value="" id="tgl_co2" size="16"  name="tgl_co2" required="required"/>
                            <span class="help-block">Pilih Tanggal</span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
                    <button class="btn btn-success" type="submit">Simpan</button>

                </div>
            </form>

        </div>
    </div>
</div>
<!---Modal Ban-->
<div class="modal fade" id="modalBan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Ban</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form-edit" >
                    <div class="form-group">
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="D 6308 AD" id="nopol" readonly="readonly" name="nopol" placeholder="Nopol">
                        </div>
                    </div>
                </form>
                <form class="form-inline" role="form" id="form-edit-ban" >
                    <div class="form-group">
                        <input type="text" class="form-control" id="ban" readonly="readonly" placeholder="Ban">

                    </div>  
                    <div class="form-group">
                        <input class="form-control" type="date" required="required" value="" id="tgl-ban" size="16" required="required"/>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" >Simpan</button>
                    </div>
                </form>
                <br/><br/>
                
                <table class="table table-bordered" >
                    <tr>
                        <th>Ban</th>
                        <th>Sisa Waktu</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    for ($i = 0; $i < 16; $i++) {
                        $sisa = rand(0, 15);
                        $color = "";
                        if ($sisa < 8) {
                            $color = "style='background-color: orange;'";
                        }
                        ?>
                        <tr id="row-ban-<?php echo $i + 1 ?>" <?php echo $color ?>>
                            <td><?php echo $i + 1 ?></td>
                            <td><span id="aturban<?php echo $i + 1 ?>"><?php echo $sisa ?></span> hari</td>
                            <td><button type="button" class="btn btn-success btn-xs" onclick="setBan('<?php echo $i + 1 ?>')">Atur</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</div>

<!---MODAL SURAT--->
<div class="modal fade" id="modalSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="Form-Surat" method="POST" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pengingat Surat Mobil Tangki</h4>
                    </div>


                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  value ="" id="suratnopol" readonly="readonly" name="suratnopol" placeholder="Nopol">
                             </div>
                        </div>
                         <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="id_jenis_surat">Jenis Surat</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  value ="" id="ID_JENIS_SURAT" readonly="readonly" name="ID_JENIS_SURAT" placeholder="Nopol">
                             
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-lg-12 col-sm-2 control-label">TANGGAL BERAKHIR SURAT</label><hr/>
                        </div>
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">Sisa waktu</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  id="hari_surat" readonly="readonly" name="sisa" placeholder="Jenis Apar">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="" id="tgl_surat" size="16"  name="tgl_surat" required="required"/>
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-sm-2 control-label col-lg-2" for="tera">Keterangan Surat</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" value="" id="KETERANGAN_SURAT" size="16"  name="KETERANGAN_SURAT" required="required"/>
                                
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                            <button class="btn btn-success" name="submit"  type="submit" >Simpan</button>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!---MODAL Oli--->
<div class="modal fade" id="modalOli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="Form-Oli" method="POST" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pengingat Oli Mobil Tangki</h4>
                    </div>


                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                            <div class="col-lg-10">
                               
                                <input type="text" class="form-control"  value ="" id="olinopol" readonly="readonly" name="olinopol" placeholder="Nopol">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">KM AWAL</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  id="KM_AWAL" name="KM_AWAL">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">MERK OLI</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  id="MERK_OLI" name="MERK_OLI" placeholder="MERK OLI">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12 col-sm-2 control-label">TANGGAL BERAKHIR Oli</label><hr/>
                        </div>
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">Sisa waktu</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  readonly="readonly" id="hari_ganti" name="sisa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="" id="tgl_oli" size="16"  name="tgl_oli" required="required"/>
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">Total Volume</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  id="TOTAL_VOLUME" name="TOTAL_VOLUME" placeholder="Total Volume">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                            <button class="btn btn-success" name="submit"  type="submit" >Simpan</button>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <!--script for this page only-->
    <script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- END JAVASCRIPTS -->
    <script>
        $(document).ready(function() {
            EditableTable.init();
        
        });
    
    </script>
    <script type="text/javascript">
        var nopol;
       // var apar;
        var jenis;
        var highlight;
        var index;
        var indexBan;
        function setDetail(index){
//            nopol = np;
//            apar = apr;
//            index = row;
//            highlight = ".peringatan" + row;
            var action = "<?php echo base_url()?>mt/edit_reminder_apar/"+apar[index]['id'];
            
            $("#tgl").val("");
            $("#nopol").val(apar[index]['nopol']);
            $("#tgl_store").val(apar[index]['tgl_store']);
            $("#hari_store").val(apar[index]['store_pressure'] + " hari");
            $("#tgl_catridge").val(apar[index]['tgl_catridge']);
            $("#hari_catridge").val(apar[index]['catridge'] + " hari");
            $("#tgl_co2").val(apar[index]['tgl_co2']);
            $("#hari_co2").val(apar[index]['co2'] + " hari");
            $("#form-edit").attr("action",action ); 
//            $("#apar").val(jenis);
//            $("#hari").val(hari+" hari");
           
        }
        
        function setDetailSurat(index){
            
            var action = "<?php echo base_url()?>mt/edit_reminder_surat/"+surat[index]['id'];
            $("#tgl").val("");
            $("#suratnopol").val(surat[index]['suratnopol']);
            $("#ID_JENIS_SURAT").val(surat[index]['ID_JENIS_SURAT']);
            $("#tgl_surat").val(surat[index]['tgl_surat']);
            $("#hari_surat").val(surat[index]['tgl_akhir_surat'] + " hari");
            $("#KETERANGAN_SURAT").val(surat[index]['KETERANGAN_SURAT']);
            $("#Form-Surat").attr("action",action ); 
           
        }
        
        function setDetailBan(index){
            
            var action = "<?php echo base_url()?>mt/edit_reminder_ban/"+ban[index]['id'];
            $("#tgl").val("");
            $("#nopol").val(ban[index]['nopol']);
            $("#ID_JENIS_ban").val(ban[index]['ID_JENIS_ban']);
            $("#tgl_surat").val(surat[index]['tgl_surat']);
            $("#hari_surat").val(surat[index]['tgl_akhir_surat'] + " hari");
            $("#KETERANGAN_SURAT").val(surat[index]['KETERANGAN_SURAT']);
            $("#Form-Surat").attr("action",action ); 
           
        }
        
        function setDetailOli(index){
            
            var action = "<?php echo base_url()?>mt/edit_reminder_oli/"+oli[index]['id'];
            $("#tgl").val("");
            $("#olinopol").val(oli[index]['olinopol']);
            $("#KM_AWAL").val(oli[index]['KM_AWAL']);
            $("#MERK_OLI").val(oli[index]['MERK_OLI']);
            $("#tgl_oli").val(oli[index]['tgl_oli']);
            $("#hari_ganti").val(oli[index]['tanggal_ganti_oli'] + " hari");
            $("#TOTAL_VOLUME").val(oli[index]['TOTAL_VOLUME']);
            $("#Form-Oli").attr("action",action ); 
           
        }
        
    
        function filter(jenis)
        {
            $("#tabel-ban").hide();
            $("#tabel-surat").hide();
            $("#tabel-apar").hide();
            $("#tabel-oli").hide();
             $("#tabel-baru").hide();
            if(jenis == "apar")
            {
                $("#tabel-apar").slideDown("slow");
            }
            else if(jenis=="ban")
            {
                $("#tabel-ban").slideDown("slow");
            }
            else if(jenis=="oli")
            {
                $("#tabel-oli").slideDown("slow");
            }
            else
            {
                $("#tabel-surat").slideDown("slow");
                
            }
            $(".dataTables_filter input").val("");
            $('#editable-sample').dataTable().fnFilter( '' );
            $('#editable-sample2').dataTable().fnFilter( '' );
            $('#editable-sample3').dataTable().fnFilter( '' );
            $('#editable-sample1').dataTable().fnFilter( '' );
        }
    
        $("#form-edit-ban").submit(function(e){
            var date1 = new Date($("#tgl-ban").val());
            var date2 = new Date();
            var diffDays = date2.getDate() - date1.getDate(); 
            var idBan = "#aturban"+indexBan;
            var rowBan = "#row-ban-"+indexBan;
            diffDays = diffDays*(-1);
            if(diffDays > 0)
            {
                alert("Tanggal harus lebih dari sekarang");   
            }
            else
            {
                if(diffDays > 7)
                {
                    $(rowBan).css({'background-color': 'transparent'});   
                }
                $(idBan).html(diffDays);
                $("#form-edit-ban").hide();
            }
            e.preventDefault();
        });
    
        function setBan(index)
        {
            indexBan = index;
            $("#form-edit-ban").hide();
            $("#form-edit-ban").show("slow");
            $("#ban").val("Ban " + index);
        }
    
        function cekBan()
        {
            $("#tgl-ban").val("");
            $("#form-edit-ban").hide();
        }
    
        function editSurat()
        {
            $("#modalSurat").modal('show');
        
        }
    
    
    </script>