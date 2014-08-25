<script>
        var apar = new Array();
    $(document).ready(function(){
        $("#tabel-ban").hide();
        $("#tabel-surat").hide();
        
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
//                            $data = array('D 6308 AD', 'D 1725 AF', 'D 2245 AF', 'D 6066 AF', 'D 3038 AD', 'D 8557 AD', 'D 1346 AD', 'D 7152 AF', 'D 9487 AD', 'D 8827 AF', 'D 8711 AD', 'D 8277 AF');
//                            $apar1 = array(6, 12, 11, 3);
//                            $apar2 = array(22, 9, 10, 15);
//                            $apar3 = array(15, 1, 6, 18);
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
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal"  data-toggle="modal"  onclick="setDetail('<?php echo $i ?>')"><div id="<?php echo 'apar1-' . $i; ?>"><?php echo $row->store_pressure; ?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal"  data-toggle="modal" onclick="setDetail('<?php echo $i ?>')"><div id="<?php echo 'apar2-' . $i; ?>"><?php echo $row->catridge;?> hari</div></a></td>
                                        <td <?php echo $color?> class="peringatan<?php echo $i ?>"><a href="#myModal"  data-toggle="modal" onclick="setDetail('<?php echo $i ?>')"><div id="<?php echo 'apar3-' . $i; ?>"><?php echo $row->co2 ; ?> hari</div></a></td>
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
                                <th>Transportir</th>
                                <th>Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = array('D 6308 AD', 'D 1725 AF', 'D 2245 AF', 'D 6066 AF', 'D 3038 AD', 'D 8557 AD', 'D 1346 AD', 'D 7152 AF', 'D 9487 AD', 'D 8827 AF', 'D 8711 AD', 'D 8277 AF');
                            $transportir = array("PT MA'SOEM", "PT WANDISIRI", "PT PUSPITA CIPATA", "PT PATRA NIAGA", "PT INCOT", "PT JUJUR PARAMARTA", "PT MA'SOEM", "PT PATRA NIAGA", "PT TIARA", "PT PATRA NIAGA", "PT PUSPITA CIPATA", "PT NAGAMAS JAYA");
                            $produk = array('Premium', 'Solar', 'Pertamax', 'Pertamax Plus', 'Bio Solar', 'Pertamax Dex', 'Premium', 'Solar', 'Pertamax', 'Bio Solar', 'Pertamax Dex', 'Premium');
                            $apar1 = array(6, 12, 11, 3);
                            $apar2 = array(22, 9, 10, 15);
                            $apar3 = array(15, 1, 6, 18);
                            for ($i = 0; $i < 12; $i++) {
                                if ($i < 4) {
                                    $color = "orange";
                                } else {
                                    $color = "transparent";
                                }
                                ?>
                                <tr>
                                    <th style="display: none;"></th>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $i + 1 ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="nopol<?php echo $i ?>"><?php echo $data[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $transportir[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $produk[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><a data-toggle="modal" href="#modalBan" class="btn btn-success btn-xs" onClick="cekBan()">Cek Ban</a></td>
                                </tr>
                                <?php
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
                                <th>Jadwal Tera</th>
                                <th>Jadwal Stnk</th>
                                <th>STNK 5 Tahun</th>
                                <th>KIR LLD</th>
                                <th>KIR Pertamina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = array('D 6308 AD', 'D 1725 AF', 'D 2245 AF', 'D 6066 AF', 'D 3038 AD', 'D 8557 AD', 'D 1346 AD', 'D 7152 AF', 'D 9487 AD', 'D 8827 AF', 'D 8711 AD', 'D 8277 AF');
                            $tgl1 = array('25 Agustus 2014', '27 Agustus 2014', '15 Desember 2014', '13 Februari 2015', '11 November 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015');
                            $tgl2 = array('10 Agustus 2015', '16 Oktober 2014', '19 September 2014', '13 Februari 2015', '11 November 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015');
                            $tgl3 = array('6 September 2014', '19 Februari 2015', '26 Agustus 2014', '13 Februari 2015', '11 November 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015');
                            $tgl4 = array('30 Maret 2015', '23 Agustus 2014', '14 Oktober 2014', '13 Februari 2015', '11 November 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015');
                            $tgl5 = array('5 Desember 2014', '6 November 2014', '22 Desember 2014', '13 Februari 2015', '11 November 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015', '23 Januari 2015', '16 Maret 2015');
                            for ($i = 0; $i < 12; $i++) {
                                if ($i < 3) {
                                    $color = "orange";
                                    $action = "editSurat()";
                                } else {
                                    $color = "transparent";
                                    $action = "";
                                }
                                ?>
                                <tr onclick="<?php echo $action ?>" style="cursor: pointer">
                                    <th style="display: none;"></th>
                                    <td style="background-color: <?php echo $color ?>;"><?php echo $i + 1 ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="nopol<?php echo $i ?>"><?php echo $data[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="tgl1<?php echo $i ?>"><?php echo $tgl1[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="tgl2<?php echo $i ?>"><?php echo $tgl2[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="tgl3<?php echo $i ?>"><?php echo $tgl3[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="tgl4<?php echo $i ?>"><?php echo $tgl4[$i] ?></td>
                                    <td style="background-color: <?php echo $color ?>;"><span id="tgl5<?php echo $i ?>"><?php echo $tgl5[$i] ?></td>

                                </tr>
                                <?php
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
                    <div class="form-group">
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">Transportir</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="PT PATRA NIAGA" id="nopol" readonly="readonly" name="nopol" placeholder="Nopol">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="nopol" class="col-lg-2 col-sm-2 control-label">Produk</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Premium" id="nopol" readonly="readonly" name="nopol" placeholder="Nopol">
                        </div>
                    </div>

                </form>
                <hr/>
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
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pengingat Surat Mobil Tangki</h4>
                    </div>


                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                            <div class="col-lg-10">
                                <input type="text" required="required" value="D 6308 AD" class="form-control" id="nopol" name="nopol" placeholder="Nopol">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Jadwal Tera</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="tanggal" id="tanggal" value="2014-08-19" required="required" type="date" size="16" />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Jadwal Stnk</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="tanggal" id="tanggal" value="2014-08-19" required="required" type="date" size="16" />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">STNK 5 Tahun</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="tanggal" id="tanggal" value="2014-08-27" required="required" type="date" size="16" />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">KIR LLD</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="tanggal" id="tanggal" value="2014-09-12" required="required" type="date" size="16" />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">KIR Pertamina</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="tanggal" id="tanggal" value="2014-11-02" required="required" type="date" size="16" />
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal"  name="tutup" class="btn btn-default" type="button">Tutup</button>
                            <button class="btn btn-success" name="submit"  type="submit" >Simpan</button>

                        </div>

                    </div>
                </form>
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
    
        function filter(jenis)
        {
            $("#tabel-ban").hide();
            $("#tabel-surat").hide();
            $("#tabel-apar").hide();
            if(jenis == "apar")
            {
                $("#tabel-apar").slideDown("slow");
            }
            else if(jenis=="ban")
            {
                $("#tabel-ban").slideDown("slow");
            }
            else
            {
                $("#tabel-surat").slideDown("slow");
                
            }
            $(".dataTables_filter input").val("");
            $('#editable-sample').dataTable().fnFilter( '' );
            $('#editable-sample2').dataTable().fnFilter( '' );
            $('#editable-sample3').dataTable().fnFilter( '' );
        }
    
//        $("#form-edit").submit(function(e){
//       
//            var date1 = new Date($("#tgl").val());
//            var date2 = new Date();
//            var diffDays = date2.getDate() - date1.getDate(); 
//            if(diffDays > 0)
//            {
//                alert("Tanggal harus lebih dari sekarang");   
//            }
//            else
//            {
//                diffDays = diffDays*(-1);
//                apar = "#"+apar;
//                $(apar).text(diffDays + " hari");
//                var apar1 = "#apar1-"+index;
//                var apar2 = "#apar2-"+index;
//                var apar3 = "#apar3-"+index;
//                var val1 =  $(apar1).text();
//                var val2 =  $(apar2).text();
//                var val3 =  $(apar3).text();
//                val1 = val1.substr(0, val1.length - 5);
//                val2 = val2.substr(0, val2.length - 5);
//                val2 = val3.substr(0, val3.length - 5);
//                if(parseInt(val1) > 7 && parseInt(val2) > 7 && parseInt(val3) > 7)
//                {
//                    $(highlight).css({'background-color': 'transparent'});    
//                }
//                $("#myModal").modal('toggle');
//            }
//            e.preventDefault();
//     
//        });
    
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
