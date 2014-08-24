
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="icon-circle"></i> Ban MT
            </header>

            <div class="panel-body">
                <div class="bio-desk">
                    
                    <p>Nopol : </p>
                    <p>Kapasitas : </p>
                    <p>Produk : </p>
                    
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Ban MT
            </header>


            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-y: scroll">
                    <div class="clearfix">
                        <a class="btn btn-primary" data-toggle="modal" href="#myModal">
                            Tambah Ban MT <i class="icon-plus"></i>
                        </a>
                    </div>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php $i = 1;
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->POSISI_BAN; ?></td>
                                    <td><?php echo $row->TANGGAL_PASANG; ?></td>
                                    <td><?php echo $row->TANGGAL_GANTI_BAN; ?></td>
                                    <td><?php echo $row->MERK_BAN; ?></td>
                                    <td><?php echo $row->NO_SERI_BAN; ?></td>
                                   <td><?php if($row->JENIS_BAN == "0")echo 'Original'?>
                                       <?php if($row->JENIS_BAN == "1")echo 'Vulkanisir'?></td>
                                   
                                   
                                   <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit ban" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus ban" href="javascript:hapus('<?php echo $row->ID_BAN ?>');"><i class="icon-remove"></i></a>
                                   </td>
                                </tr>
                                <?php $i++;
                            } ?>
                           
                               
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </section>

        <!-- page end-->
    </section>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url()?>mt/tambah_ban/">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Tambah Ban</h4>
                </div>
                <div class="modal-body">                
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Posisi Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status" name="POSISI_BAN">
                                <option <?php if($row->POSISI_BAN == "1")echo "selected"?> value="1">1</option>
                                <option <?php if($row->POSISI_BAN == "2")echo "selected"?> value="2">2</option>
                                <option <?php if($row->POSISI_BAN == "3")echo "selected"?> value="3">3</option>
                                <option <?php if($row->POSISI_BAN == "4")echo "selected"?> value="4">4</option>
                                <option <?php if($row->POSISI_BAN == "5")echo "selected"?> value="5">5</option>
                                <option <?php if($row->POSISI_BAN == "6")echo "selected"?> value="6">6</option>
                                <option <?php if($row->POSISI_BAN == "7")echo "selected"?> value="7">7</option>
                                <option <?php if($row->POSISI_BAN == "8")echo "selected"?> value="8">8</option>
                                <option <?php if($row->POSISI_BAN == "9")echo "selected"?> value="9">9</option>
                                <option <?php if($row->POSISI_BAN == "10")echo "selected"?> value="10">10</option>
                                <option <?php if($row->POSISI_BAN == "11")echo "selected"?> value="11">11</option>
                                <option <?php if($row->POSISI_BAN == "12")echo "selected"?> value="12">12</option>
                                <option <?php if($row->POSISI_BAN == "13")echo "selected"?> value="13">13</option>
                                <option <?php if($row->POSISI_BAN == "14")echo "selected"?> value="14">14</option>
                                <option <?php if($row->POSISI_BAN == "15")echo "selected"?> value="15">15</option>
                                <option <?php if($row->POSISI_BAN == "16")echo "selected"?> value="16">16</option>
                                <option <?php if($row->POSISI_BAN == "17")echo "selected"?> value="17">17</option>
                                <option <?php if($row->POSISI_BAN == "18")echo "selected"?> value="18">18</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Tanggal Pasang</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglpasang" name="TANGGAL_PASANG" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglganti" name="TANGGAL_GANTI_BAN" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Merk Ban</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="merk" name="MERK_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="seri" name="NO_SERI_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status" name="JENIS_BAN">
                                 <option <?php if($row->JENIS_BAN == "0")echo "selected"?> value="0">Original</option>
                                 <option <?php if($row->JENIS_BAN == "1")echo "selected"?> value="1">Vulkanisir</option>
                          
                            </select>
                        </div>
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


<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>mt/edit_mobil/<?php echo $row->ID_BAN ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Ban</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Posisi Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status" name="">
                                <option <?php if($row->POSISI_BAN == "1")echo "selected"?> value="1">1</option>
                                <option <?php if($row->POSISI_BAN == "2")echo "selected"?> value="2">2</option>
                                <option <?php if($row->POSISI_BAN == "3")echo "selected"?> value="3">3</option>
                                <option <?php if($row->POSISI_BAN == "4")echo "selected"?> value="4">4</option>
                                <option <?php if($row->POSISI_BAN == "5")echo "selected"?> value="5">5</option>
                                <option <?php if($row->POSISI_BAN == "6")echo "selected"?> value="6">6</option>
                                <option <?php if($row->POSISI_BAN == "7")echo "selected"?> value="7">7</option>
                                <option <?php if($row->POSISI_BAN == "8")echo "selected"?> value="8">8</option>
                                <option <?php if($row->POSISI_BAN == "9")echo "selected"?> value="9">9</option>
                                <option <?php if($row->POSISI_BAN == "10")echo "selected"?> value="10">10</option>
                                <option <?php if($row->POSISI_BAN == "11")echo "selected"?> value="11">11</option>
                                <option <?php if($row->POSISI_BAN == "12")echo "selected"?> value="12">12</option>
                                <option <?php if($row->POSISI_BAN == "13")echo "selected"?> value="13">13</option>
                                <option <?php if($row->POSISI_BAN == "14")echo "selected"?> value="14">14</option>
                                <option <?php if($row->POSISI_BAN == "15")echo "selected"?> value="15">15</option>
                                <option <?php if($row->POSISI_BAN == "16")echo "selected"?> value="16">16</option>
                                <option <?php if($row->POSISI_BAN == "17")echo "selected"?> value="17">17</option>
                                <option <?php if($row->POSISI_BAN == "18")echo "selected"?> value="18">18</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Tanggal Pasang</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15"  id="tglpasang" name="TANGGAL_PASANG" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglpasang" name="TANGGAL_GANTI_BAN" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Merk Ban</label>
                        <div class="col-lg-10">
                           <input class=" form-control input-sm m-bot15" id="tglpasang" name="MERK_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglpasang" name="NO_SERI_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="status" name="">
                                 <option <?php if($row->JENIS_BAN == "0")echo "selected"?> value="0">Original</option>
                                 <option <?php if($row->JENIS_BAN == "1")echo "selected"?> value="1">Vulkanisir</option>
                          
                            </select>
                        </div>
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
<!-- modal -->
<div class="modal fade" id="HapusBan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Ban</h4>
            </div>
            <div class="modal-body">

                Apakah anda yakin ?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                <a href="#" onclick="ok()" class="btn btn-danger danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

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
    
        var globalId;
    $('#HapusBan').on('show', function() {

    });

    function hapus(id) {
        globalId = id;
        $('#HapusBan').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_ban/" + globalId;
        window.location.href = url;
    }
</script>
