
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
<?php foreach ($mt as $row){?>
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="icon-circle"></i> Ban MT
            </header>

            <div class="panel-body">
                <div class="bio-desk">
                    
                    <p>Nopol : <?php echo $row->nopol?></p>
                    <p>Kapasitas : <?php echo $row->kapasitas ?></p>
                    <p>Produk : <?php echo $row->produk ?></p>
                    
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                Tabel Ban MT
            </header>


            <div class="panel-body">
                <div class="adv-table editable-table ">
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
                            <tr class="">
                                <?php $i = 1;
                                foreach ($mt as $row) { ?>
                                    <td style="display:none;"></td>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->POSISI_BAN; ?></td>
                                    <td><?php echo $row->TANGGAL_PASANG; ?></td>
                                    <td><?php echo $row->TANGGAL_GANTI_BAN; ?></td>
                                    <td><?php echo $row->MERK_BAN; ?></td>
                                    <td><?php echo $row->NO_SERI_BAN; ?></td>
                                   <td><?php echo $row->JENIS_BAN; ?></td>
                                   <td><a class="btn btn-warning btn-xs tooltips" data-original-title="Edit ban" data-replacement="left" data-toggle="modal" href="#Modal"><i class="icon-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs tooltips" data-original-title="Hapus ban" data-replacement="left" data-toggle="modal" href="#Modal2"><i class="icon-remove"></i></a></td>
                            
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
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Tambah Ban</h4>
                </div>
                <div class="modal-body">                
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Posisi Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Tanggal Pasang</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglpasang" name="tglpasang" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglganti" name="tglganti" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Merk Ban</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="merk" name="merk" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="seri" name="seri" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15">
                                <option>Original</option>
                                <option>Vulkanisir</option>

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
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Edit Ban</h4>
                </div>
                <div class="modal-body">
                    <!-- form tambah-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Posisi Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Tanggal Pasang</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglpasang" name="tglpasang" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="tglganti" name="tglganti" minlength="2" type="date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Merk Ban</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="merk" name="merk" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                        <div class="col-lg-10">
                            <input class=" form-control input-sm m-bot15" id="seri" name="seri" minlength="2" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Ban</label>
                        <div class="col-lg-10">
                            <select class="form-control m-bot15">
                                <option>Original</option>
                                <option>Vulkanisir</option>

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
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button class="btn btn-danger" type="button"> Yes</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

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
