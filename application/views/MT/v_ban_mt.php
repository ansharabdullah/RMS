<?php
function DateToIndo($date) { 
        $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2); 
        $tgl   = substr($date, 8, 2); 
        
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
}

?>

<script>
    var ban = new Array();
    $(document).ready(function(){
        var ap;
<?php
foreach ($ban as $a) {
    ?>
                             ap = new Array();
                             ap['id'] = "<?php echo $a->ID_BAN ?>";
                             ap['MERK_BAN'] = "<?php echo $a->MERK_BAN ?>";
                             ap['NO_SERI_BAN'] = "<?php echo $a->NO_SERI_BAN ?>";
                             ap['JENIS_BAN'] = "<?php echo $a->JENIS_BAN ?>";
                             ap['POSISI_BAN'] = "<?php echo $a->POSISI_BAN ?>";
                             ap['TANGGAL_GANTI_BAN'] = "<?php echo $a->TANGGAL_GANTI_BAN ?>";
                     
                             ban.push(ap);
    <?php
}
?>
        
                            });
</script>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>mt/data_mt">Data Mobil</a></li>
                    <li><a href="<?php echo base_url() ?>mt/detail/<?php echo $dataMobil->id_mobil; ?>/<?php echo date("n")?>/<?php echo date("Y")?>">Detail Mobil</a></li>
                    <li class="active">Ban Mobil</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <section class="panel">
            
        <?php if ($pesan==1) {  ?>
            <div class="alert alert-block alert-success fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                <strong>Berhasil! </strong><?php echo $pesan_text;?>
            </div>
        <?php } ?>
            </section>
        <section class="panel">
            <header class="panel-heading">
                <i class="icon-circle"></i> Ban MT
            </header>

            <div class="panel-body">
                <div class="bio-desk">
                    <div class="bio-row" >
                        <p><span>Nopol </span>: <?php echo $dataMobil->NOPOL; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span></span></p>
                    </div>
                    <div class="bio-row">
                        <p><span>KAPASITAS </span>: <?php echo $dataMobil->KAPASITAS; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span></span></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Kapasitas </span>: <?php echo $dataMobil->PRODUK; ?></p>
                    </div>

                </div>
            </div>
            
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Ban MT
            </header>


            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-x: scroll">
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
                                <th>Tanggal Ganti</th>
                                <th>Merk Ban</th>
                                <th>No Seri</th>
                                <th>Jenis Ban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            $j = 0;
                            foreach ($ban as $row) {
                                ?>
                            <td style="display:none;"></td>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->POSISI_BAN; ?></td>
                            <td><?php echo(DateToIndo($row->TANGGAL_GANTI_BAN)); ?></td>
                            <td><?php echo $row->MERK_BAN; ?></td>
                            <td><?php echo $row->NO_SERI_BAN; ?></td>
                            <td><?php echo $row->JENIS_BAN; ?></td>
                            <td>
                                <?php if ($this->session->userdata('id_role') != 5) { ?> 
                                <a class="btn btn-warning btn-xs tooltips" data-original-title="Edit Ban" href="#ModalEditBan"  data-toggle="modal"  onclick="cekban('<?php echo $row->ID_BAN ?>','<?php echo $row->ID_MOBIL ?>','<?php echo $row->MERK_BAN ?>','<?php echo $row->NO_SERI_BAN ?>','<?php echo $row->JENIS_BAN ?>','<?php echo $row->POSISI_BAN ?>','<?php echo $row->TANGGAL_GANTI_BAN ?>')"><i class="icon-pencil"></i></a>
                                <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus" data-placement="top" onclick="setban('<?php echo $row->ID_BAN?>')" data-toggle="modal" href="#HapusBan"><i class="icon-remove"></i></a>
                                       <?php }?>
                            </td>
                            </tr>
                            <?php
                            $j++;
                            $i++;
                        }
                        ?>


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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>mt/ban_mt/<?php echo $id_mobil; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Tambah Ban</h4>
                </div>
                <div class="modal-body">                
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Posisi Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="POSISI_BAN" name="POSISI_BAN">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                

                            </select>
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
                            <input class=" form-control input-sm m-bot15" id="merk" placeholder="Merk Ban" name="MERK_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="seri" placeholder="No Seri" name="NO_SERI_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Ban</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="seri" placeholder="Jenis Ban" name="JENIS_BAN" minlength="2" type="text" required />

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" onclick="this.form.reset()">Batal</button>
                    <input class="btn btn-success" name="simpan" type="submit" value="Simpan"/>
                </div>
            </form> 
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ModalEditBan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" id="form-edit" method="POST" action="<?php echo base_url()?>mt/ban_mt/<?php echo $id_mobil; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Ban</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->
                    <input class=" form-control input-sm m-bot15" id="ID_BAN" name="ID_BAN"  type="hidden" required />
                       <input class=" form-control input-sm m-bot15" id="ID_MOBIL" name="ID_MOBIL"  type="hidden" required />
                       
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Posisi Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control input-sm m-bot15" id="POSISI_BAN" name="POSISI_BAN">
                                <option <?php if ($row->POSISI_BAN == "1")
                            echo "selected" ?> value="1">1</option>
                                <option <?php if ($row->POSISI_BAN == "2")
                            echo "selected" ?> value="2">2</option>
                                <option <?php if ($row->POSISI_BAN == "3")
                            echo "selected" ?> value="3">3</option>
                                <option <?php if ($row->POSISI_BAN == "4")
                            echo "selected" ?> value="4">4</option>
                                <option <?php if ($row->POSISI_BAN == "5")
                            echo "selected" ?> value="5">5</option>
                                <option <?php if ($row->POSISI_BAN == "6")
                            echo "selected" ?> value="6">6</option>
                                <option <?php if ($row->POSISI_BAN == "7")
                            echo "selected" ?> value="7">7</option>
                                <option <?php if ($row->POSISI_BAN == "8")
                            echo "selected" ?> value="8">8</option>
                                <option <?php if ($row->POSISI_BAN == "9")
                            echo "selected" ?> value="9">9</option>
                                <option <?php if ($row->POSISI_BAN == "10")
                            echo "selected" ?> value="10">10</option>
                                <option <?php if ($row->POSISI_BAN == "11")
                            echo "selected" ?> value="11">11</option>
                                <option <?php if ($row->POSISI_BAN == "12")
                            echo "selected" ?> value="12">12</option>
                                <option <?php if ($row->POSISI_BAN == "13")
                            echo "selected" ?> value="13">13</option>
                                <option <?php if ($row->POSISI_BAN == "14")
                            echo "selected" ?> value="14">14</option>
                                <option <?php if ($row->POSISI_BAN == "15")
                            echo "selected" ?> value="15">15</option>
                                <option <?php if ($row->POSISI_BAN == "16")
                            echo "selected" ?> value="16">16</option>
                                <option <?php if ($row->POSISI_BAN == "17")
                            echo "selected" ?> value="17">17</option>
                                <option <?php if ($row->POSISI_BAN == "18")
                            echo "selected" ?> value="18">18</option>

                            </select>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="TANGGAL_GANTI_BAN" name="TANGGAL_GANTI_BAN" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Merk Ban</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="MERK_BAN" name="MERK_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="NO_SERI_BAN" name="NO_SERI_BAN" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Ban</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="JENIS_BAN" name="JENIS_BAN" minlength="2" type="text" required />

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" name="editban" type="submit" value="Simpan"/>
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
                <form method="POST" action="<?php echo base_url() ?>mt/ban_mt/<?php echo $id_mobil?>">
                    Apakah anda yakin ?
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
						<input type="hidden" value="" name="ID_BAN2" id="ID_BAN2"></input>
						<input type="submit" value="Hapus" name="deleteban" class="btn btn-danger danger"></input>
					</div>
					</form>
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
    var globalIdMobil;
    $('#HapusBan').on('show', function() {

    });

    function hapus(id,id_mobil) {
        globalId = id;
        globalIdMobil = id_mobil;
        $('#HapusBan').data('id', id).modal('show');
 
    }

    function ok()
    {
        var url = "<?php echo base_url(); ?>" + "mt/delete_ban/" + globalId + "/" + globalIdMobil;
        window.location.href = url;
    }
    
      
      
    var index;
        
    function setDetail(index){
        var action = "<?php echo base_url() ?>mt/edit_ban/"+ban[index]['id']+"/"+<?php echo $id_mobil?>;
           
            
        $("#MERK_BAN").val(ban[index]['MERK_BAN']);
        $("#NO_SERI_BAN").val(ban[index]['NO_SERI_BAN']);
        $("#JENIS_BAN").val(ban[index]['JENIS_BAN']);
        $("#POSISI_BAN").val(ban[index]['POSISI_BAN']);
        $("#TANGGAL_GANTI_BAN").val(ban[index]['TANGGAL_GANTI_BAN']);
            
        $("#form-edit").attr("action",action ); 
           
    }
    
    function setban(id) {
        $('#ID_BAN2').val(id);
    }
    
    function cekban(id_ban, id_mobil, merk_ban, no_seri_ban, jenis_ban,posisi_ban,tanggal_ganti_ban) {
                                                                $("#ID_BAN").val(id_ban);
                                                                $("#ID_MOBIL").val(id_mobil);
                                                                $("#MERK_BAN").val(merk_ban);
                                                                $("#NO_SERI_BAN").val(no_seri_ban);
                                                                $("#JENIS_BAN").val(jenis_ban);
                                                                $("#POSISI_BAN").val(posisi_ban);
                                                                $("#TANGGAL_GANTI_BAN").val(tanggal_ganti_ban);
                                                            }
    
</script>
