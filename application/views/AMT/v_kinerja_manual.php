
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Input Kinerja Awak Mobil Tangki
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                <li><a href="javascript:FilterData('aktif.');">Aktif</a></li>
                                <li><a href="javascript:FilterData('peringatan');">Dalam Peringatan</a></li>
                                <li><a href="javascript:FilterData('tidak aktif');">Tidak Aktif</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th width="30">No</th>
                                <th width="200">NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th width="30">Klasifikasi</th>
                                <th width="30">Status</th>
                                <th width="30">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>1</td>
                                <td>3205190001</td>
                                <td>Firman</td>
                                <td>Supir</td>
                                <td>8</td>
                                <td><span class="label label-success">Aktif.</span></td>
                                <td> <a data-toggle="modal" href="#myModal"><span class="label label-success">Atur Kinerja</span></a></td>
                            
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>2</td>
                                <td>3205190002</td>
                                <td>Fiqri</td>
                                <td>Supir</td>
                                <td>16</td>
                                <td><span class="label label-success">Aktif.</span></td>
                                <td> <a data-toggle="modal" href="#myModal"><span class="label label-success">Atur Kinerja</span></a></td>
                            
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>3</td>
                                <td>3205190003</td>
                                <td>Firdaus</td>
                                <td>Kernet</td>
                                <td>24</td>
                                <td><span class="label label-default">Tidak Aktif</span></td>
                                <td> <a data-toggle="modal" href="#myModal"><span class="label label-success">Atur Kinerja</span></a></td>
                            
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>4</td>
                                <td>3205190004</td>
                                <td>Anshar</td>
                                <td>Supir</td>
                                <td>8</td>
                                <td><span class="label label-warning">Peringatan</span></td>
                                <td> <a data-toggle="modal" href="#myModal"><span class="label label-success">Atur Kinerja</span></a></td>
                            
                            </tr>

                            <tr class="">
                                <td style="display:none;"></td>
                                <td>5</td>
                                <td>3205190005</td>
                                <td>Abdullah</td>
                                <td>Kernet</td>
                                <td>24</td>
                                <td><span class="label label-warning">Peringatan</span></td>
                                <td> <a data-toggle="modal" href="#myModal"><span class="label label-success">Atur Kinerja</span></a></td>
                            
                            </tr>

                            <tr class="">

                                <td style="display:none;"></td>
                                <td>6</td>
                                <td>3205190006</td>
                                <td>Chepy</td>
                                <td>Kernet</td>
                                <td>40</td>
                                <td><span class="label label-success">Aktif.</span></td>
                                <td> <a data-toggle="modal" href="#myModal"><span class="label label-success">Atur Kinerja</span></a></td>
                            

                            </tr>
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
                <h4 class="modal-title">Atur Kinerja Awak Mobil Tangki</h4>
            </div>
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                    <div class="modal-body">


                        <div class="form-group">
                            <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="tanggal" type="date" size="16" required>
                                <span class="help-block">Pilih Tanggal</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="km" class="col-lg-2 col-sm-2 control-label">Kilometer (km)</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="km" name="km" placeholder="Kilometer (km)" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kl" class="col-lg-2 col-sm-2 control-label">Kiloliter (kl)</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="kl" name="kl" placeholder="Kiloliter (kl)" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="crit" class="col-lg-2 col-sm-2 control-label">Ritase (rit)</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="crit" name ="rit" placeholder="Ritase (rit)" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="cspbu" class="col-lg-2 col-sm-2 control-label">Jumlah SPBU</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="cspbu" name="spbu" placeholder="Jumlah SPBU" required>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Keluar</button>
                        <input class="btn btn-success" type="submit" value="Simpan">
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
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
    function FilterData(par) {
        jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
        jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
    }
    
       
</script>
