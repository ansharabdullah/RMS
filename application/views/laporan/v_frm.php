<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Tarif Interpolasi dan FRM
                <a style="float:right;" data-placement="left" href="#ModalTambah" data-toggle="modal" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah"> Tambah Data <i class="icon-plus"></i></a>
            </header>

            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url(); ?>laporan/frm">
                    <div class="form-group">
                        <label for="bln_frm" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" class="form-control" name="bln_frm" placeholder="Bulan">
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-warning" name="cek" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if ($klik_edit == true) { ?>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil edit MS2.
            </div>
        <?php } else if ($klik_tambah == true) { ?>
            <?php if ($status_id == false) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> ID Log Harian tidak ditemukan.
                </div>
            <?php } else { ?>
                <?php if ($status_interpolasi != 0) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> Data Interpolasi dan FRM yang ditambahkan sudah ada.
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil tambah data Interpolasi dan FRM.
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>



        <?php if ($interpolasi['status'] == false) { ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Error!</strong> Data bulan <strong><?php echo $interpolasi['bulan_tahun']; ?></strong> tidak ditemukan.
            </div>
        <?php } else { ?>
            <section class="panel">
                <header class="panel-heading">
                    Tabel Tarif Interpolasi dan FRM bulan <strong><?php echo $interpolasi['bulan_tahun']; ?></strong>
                    <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i> Edit</a>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">

                        <div class="space15"></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Harga FRM</th>
                                    <th>Tarif Interpolasi (Rp./Ltr)</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="">
                                    <td>1</td>
                                    <td>1 - 14 <?php echo $interpolasi['bulan_tahun']; ?></td>
                                    <td><?php echo $interpolasi['nilai'][0]; ?></td>
                                    <td><?php echo $interpolasi['nilai'][2]; ?></td>
                                </tr>

                                <tr class="">
                                    <td>2</td>
                                    <td>15 - <?php echo $interpolasi['tanggal_akhir']; ?> <?php echo $interpolasi['bulan_tahun']; ?></td>
                                    <td><?php echo $interpolasi['nilai'][1]; ?></td>
                                    <td><?php echo $interpolasi['nilai'][3]; ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php } ?>


    </section>
</section>
<!--main content end-->


<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url(); ?>laporan/frm">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="cbulan" class="control-label col-lg-2">Bulan</label>
                                    <div class="col-lg-10">
                                        <input type="month" required="required" name="bln_frm" class="form-control" placeholder="bulan">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cfrm" class="control-label col-lg-12">Harga FRM</label></br>
                                    <label for="cfrm1" class="control-label col-lg-2">1-14</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" name="frm1" type="number" required />
                                    </div>

                                    <label for="cfrm2" class="control-label col-lg-2">15-akhir</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" name="frm2" type="number" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cinterpolasi" class="control-label col-lg-12">Tarif Interpolasi (Rp./Ltr)</label></br>
                                    <label for="cinterpolasi1" class="control-label col-lg-2">1-14</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" name="interpolasi1" type="number" required />
                                    </div>

                                    <label for="cinterpolasi2" class="control-label col-lg-2">15-akhir</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" name="interpolasi2" type="number" required />
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" value="Simpan" name="tambah"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if ($interpolasi['status'] == true) { ?>
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url(); ?>laporan/frm">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

                                    <div class="form-group ">
                                        <label for="bln_frm" class="control-label col-lg-2">Bulan</label>
                                        <div class="col-lg-10">
                                            <input type="month" required="required" id="bln_frm" name="bln_frm" class="form-control"  placeholder="bulan" value="<?php echo $interpolasi['bln_frm']; ?>" readonly >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cfrm" class="control-label col-lg-12">Harga FRM</label></br>
                                        <label for="cfrm1" class="control-label col-lg-2">1-14</label>
                                        <div class="col-lg-4">                                        
                                            <input type="hidden" name="id_frm1" id="id_frm1" value="<?php echo $interpolasi['id_nilai'][0]; ?>">
                                            <input class=" form-control input-sm m-bot15" id="frm1" name="frm1" type="number" value="<?php echo $interpolasi['nilai'][0]; ?>" required />
                                        </div>

                                        <label for="cfrm2" class="control-label col-lg-2">15-akhir</label>
                                        <div class="col-lg-4">
                                            <input type="hidden" name="id_frm2" id="id_frm2" value="<?php echo $interpolasi['id_nilai'][1]; ?>">                                        
                                            <input class=" form-control input-sm m-bot15" id="frm2" name="frm2" type="number" value="<?php echo $interpolasi['nilai'][1]; ?>" required />
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="cinterpolasi" class="control-label col-lg-12">Tarif Interpolasi (Rp./Ltr)</label></br>
                                        <label for="cinterpolasi1" class="control-label col-lg-2">1-14</label>
                                        <div class="col-lg-4">
                                            <input type="hidden" name="id_interpolasi1" id="id_interpolasi1" value="<?php echo $interpolasi['id_nilai'][2]; ?>">                                        
                                            <input class=" form-control input-sm m-bot15" id="interpolasi1" name="interpolasi1" type="number" value="<?php echo $interpolasi['nilai'][2]; ?>" required />
                                        </div>

                                        <label for="cinterpolasi2" class="control-label col-lg-2">15-akhir</label>
                                        <div class="col-lg-4">
                                            <input type="hidden" name="id_interpolasi2" id="id_interpolasi2" value="<?php echo $interpolasi['id_nilai'][3]; ?>">                                        
                                            <input class=" form-control input-sm m-bot15" id="interpolasi2" name="interpolasi2" type="number" value="<?php echo $interpolasi['nilai'][3]; ?>" required />
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input class="btn btn-success" type="submit" value="Simpan" name="edit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>
