
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
                 ap['tgl_apar'] = "<?php echo $a->tgl_apar?>";
                 ap['apar'] = "<?php echo $a->apar?>";
                 ap['KETERANGAN_APAR'] = "<?php echo $a->KETERANGAN_APAR?>";
                 ap['ID_JENIS_APAR'] = "<?php echo $a->ID_JENIS_APAR?>";
                 
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
                 ap['bannopol'] = "<?php echo $a->bannopol?>";
                 ap['tgl_ban'] = "<?php echo $a->tgl_ban?>";
                 ap['tgl_ganti'] = "<?php echo $a->tgl_ganti?>";
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
                <div class="adv-table editable-table " id="tabel-apar" style="overflow-x: scroll">
                    <div class="space10">
                        <h3><i class="icon-fire-extinguisher"></i> Pengingat Apar</h3>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>Jenis Apar</th>
                                <th>Keterangan</th>
                                <th>Tanggal Apar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                          
                            $i = 0;
                            foreach ($apar as $row) {
                                $color = "";
                                if ($row->STATUS_APAR== "0"){
                                    if($row->apar <= 7)
                                    {
                                        $color = "style='background-color: orange;'";
                                    }
                                    ?>
                                        <th style="display: none;"></th>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $i + 1; ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><span id="nopol<?php echo $i ?>"><?php echo $row->NOPOL ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php if($row->ID_JENIS_APAR == "1")echo 'Store Pressure'?>
                                        <?php if($row->ID_JENIS_APAR == "2")echo 'Catridge'?>
                                        <?php if($row->ID_JENIS_APAR == "3")echo 'CO2'?>
                                        </td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->KETERANGAN_APAR ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->apar; ?> hari</td>
                                        
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal" data-toggle="modal" class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" onclick="setDetail('<?php echo $i ?>')"><i class="icon-pencil"></i></a></td>
                                        </tr>
                                    <?php
                                $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="adv-table editable-table " id="tabel-ban" style="overflow-x: scroll">
                    <div class="space10">

                        <h3><i class="icon-compass"></i> Pengingat Ban</h3>

                    </div>
                    <table class="table table-hover table-bordered" id="editable-sample2">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            
                            foreach($mobil as $row2){
                                $color="";
                                foreach ($ban as $row){
                                  if($row->ID_MOBIL==$row2->ID_MOBIL){
                                    if($row->tanggal_ban <= 7 ) {
                                    $color = "orange";
                                } else {
                                    $color = "transparent";
                                }

                                }
                                
                                }
                                ?>
                                    <th style="display: none;"></th>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $i + 1; ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="bannopol<?php echo $i ?>"><?php echo $row2->nopol ?></td>
                                       
                                    <td style="background-color: <?php echo $color ?>;"><a data-toggle="modal" href="#modalBan" class="btn btn-success btn-xs" onClick="setBan('<?php echo $row2->nopol ?>')">Cek Ban</a></td>
                                </tr>
                                 <?php
                                $i++;
                                
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


                <div class="adv-table editable-table " id="tabel-surat" style="overflow-x: scroll">
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
                                <th>Aksi</th>
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
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->tanggal_akhir_surat; ?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->KETERANGAN_SURAT ?></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#modalSurat" data-toggle="modal" class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" onclick="setDetailSurat('<?php echo $i ?>')"><i class="icon-pencil"></i></a></td>
                                        
                                        
                                        </tr>
                                    <?php
                                $i++;
                                }
                                
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="adv-table editable-table " id="tabel-oli" style="overflow-x: scroll">
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
                                <th>Aksi</th>
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
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><?php echo $row->tanggal_ganti_oli; ?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#modalOli" data-toggle="modal" class="btn btn-warning btn-xs tooltips" data-original-title="Edit Apar" onclick="setDetailOli('<?php echo $i ?>')"><i class="icon-pencil"></i></a></td>
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
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">Jenis Apar</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" readonly="readonly" id="ID_JENIS_APAR" name="ID_JENIS_APAR">
                                <option value="1">Store Pressure</option>
                                <option value="2">Catridge</option>
                                <option value="3">CO2</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Tanggal Apar</label><hr/>
                    </div>
                    <div class="form-group">
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">Sisa waktu</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  id="hari_apar" readonly="readonly" name="hari_apar" placeholder="Jenis Apar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="date" value="" id="tgl_apar" size="16"  name="tgl_apar" required="required"/>
                            <span class="help-block">Pilih Tanggal</span>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"  id="KETERANGAN_APAR" readonly="readonly" name="KETERANGAN_APAR" placeholder="Jenis Apar">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
                    <button class="btn btn-success" type="submit">Simpan</button>

                    </div>
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
            
                <form class="form-horizontal" role="form" id="form-edit-ban" action="mt/edit_ban" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  id="bannopol" readonly="readonly" name="bannopol" placeholder="Nopol">
                        </div>
                    </div>
                
                <table class="table table-bordered" >
                    <tr>
                        <th>Ban</th>
                        <th>Sisa Waktu</th>
                        <th>Tanggal</th>
                        
                    </tr>
                    <?php
                    foreach ($ban as $row){
                  
                        $color = "";
                        if ($row->tanggal_ban < 8) {
                            $color = "style='background-color: orange;'";
                        }
                        ?>
                        <tr id="row-ban-<?php echo $row->POSISI_BAN?>" <?php echo $color ?>>
                            <td><?php echo $row->POSISI_BAN ?></td>
                            <td><?php echo $row->tanggal_ban ?></span> hari</td>
                            <td><input class="form-control" type="date" id="tgl_ganti" size="16" name="tgl_ganti" required="required"/></td>
                             </tr>
                        <?php
                    }
                    
                    ?>
                 </table>
                    <div class="modal-footer">
                            <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                            <button class="btn btn-success" name="submit"  type="submit" >Simpan</button>

                        </div>
                </form>
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
                            <select class="form-control input-sm m-bot15" readonly="readonly" id="ID_JENIS_SURAT" name="ID_JENIS_SURAT">
                                <option value="1">STNK</option>
                                <option value="2">Pajak</option>
                                <option value="3">KEUR</option>
                                <option value="4">Tera</option>
                            </select>
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
                                <input class="form-control" type="text" readonly="readonly" value="" id="KETERANGAN_SURAT" size="16"  name="KETERANGAN_SURAT" required="required"/>
                                
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
                                <input type="text" class="form-control" readonly="readonly"  id="KM_AWAL" name="KM_AWAL">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">MERK OLI</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" readonly="readonly"  id="MERK_OLI" name="MERK_OLI" placeholder="MERK OLI">
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
                                <input type="text" class="form-control" readonly="readonly"  id="TOTAL_VOLUME" name="TOTAL_VOLUME" placeholder="Total Volume">
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
            $("#tgl_apar").val(apar[index]['tgl_apar']);
            $("#KETERANGAN_APAR").val(apar[index]['KETERANGAN_APAR']);
            $("#ID_JENIS_APAR").val(apar[index]['ID_JENIS_APAR']);
            $("#hari_apar").val(apar[index]['apar'] + " hari");
            
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
        function setBan(index)
        {
            $("#bannopol").val(ban[index]['id']);
            $("#tgl_ban").val(ban[index]['tgl_ban']);            
            $("#tgl_ganti").val(ban[index]['tgl_ganti']);
            $("#POSISI_BAN").val(ban[index]['POSISI_BAN']);
            
        }
    
        function editSurat()
        {
            $("#modalSurat").modal('show');
        
        }
    
    
    </script>