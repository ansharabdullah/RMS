<script type="text/javascript">
    $(document).ready(function() {
        $("#filePreview").hide();
        $("#commentForm").submit(function(e) {
            var isvalidate = $("#commentForm").valid();
            if (isvalidate)
                $("#tgl").html($("#tglForm").val());
            document.getElementById("commentForm").submit();
            }
            e.preventDefault();
        });
    });



</script>



<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Presensi Awak Mobil Tangki
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>amt/presensi_perbulan/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" required="required" id="tglForm" class="form-control"  placeholder="Tanggal" name="tanggal">
                            <span class="help-block">Pilih tanggal</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-warning">Cek</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if ($presensi) { ?>
            <div id="filePreview">
                <section class="panel">
                    <header class="panel-heading">
                        Tabel Presensi (<span id="tgl"></span>)
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table " style="overflow-x: scroll">
                            <div class="clearfix">

                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:FilterData('');">Semua</a></li>
                                        <li><a href="javascript:FilterData('hadir');">Hadir</a></li>
                                        <li><a href="javascript:FilterData('absen');">Absen</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Klasifikasi</th>
                                        <th>Kehadiran</th>
                                        <th>Keterangan</th>
                                        <th>Alasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($presensi as $row) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->NIP; ?></td>
                                            <td><?php echo $row->NAMA_PEGAWAI; ?></td>
                                            <td><?php echo $row->JABATAN; ?></td>
                                            <td><?php echo $row->KLASIFIKASI; ?></td>
                                            <td><?php if ($row->STATUS_MASUK == "Hadir") {
                                    echo "<span class='label label-success'>";
                                } else {
                                    echo "<span class='label label-success'>";
                                }$row->STATUS_MASUK ?><span class="label label-success">Hadir</span></td>
                                            <td></td>
                                            <td></td>
                                            <td><a data-placement="top" data-toggle="modal" href="#ModalPresensi" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                        </tr>
        <?php $i++;
    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
<?php } ?>







    </section>
</section>
<!--main content end-->




<div class="modal fade" id="ModalPresensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Presensi Crew Awak Mobil Tangki</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">

                                <div class="form-group ">                                            
                                    <label for="ctglberlaku" class="control-label col-lg-4">Tanggal Berlaku</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control input-sm m-bot15" id="ctglberlaku" name="tglbelaku" size="16" type="date" value="" required/>
                                        <span class="help-block">Pilih tanggal</span>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cjenis" class="control-label col-lg-4">Keterangan</label>
                                    <div class="col-lg-8">
                                        <select class="form-control input-sm m-bot15" id="cjenis" name="jenis">
                                            <option>Hadir</option>
                                            <option>Sakit</option>
                                            <option>Ijin</option>
                                            <option>Alfa</option>
                                        </select>
                                    </div>


                                </div>


                                <div class="form-group ">
                                    <label for="calasan" class="control-label col-lg-4">Alasan</label>
                                    <div class="col-lg-8">
                                        <textarea class=" form-control input-sm m-bot15" id="calasan" name="alasan" minlength="2" type="text" required ></textarea>
                                    </div>


                                </div>


                            </div>
                        </section>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <input class="btn btn-success" type="submit" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>



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



</script>