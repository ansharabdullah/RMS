<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Data MT   
            </header>
            <div class="panel-body">
                <a class="btn btn-info" data-toggle="modal" href="#myModal">
                    Tambah MT <i class="icon-plus"></i>
                </a>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Form Tambah MT</h4>
                            </div>
                            <div class="modal-body">
                                <!-- form tambah-->
                                <form class="form-horizontal" role="form">
                                    <div class="form-group ">
                                        <label for="nip" class="control-label col-lg-2">Nopol</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="nopol" minlength="2" type="text" required />
                                        </div>
                                        <label for="nip" class="control-label col-lg-2">No Mesin</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="nomesin" minlength="2" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label for="nip" class="control-label col-lg-2">Transportir</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="tranportir" minlength="2" type="text" required />
                                        </div>
                                        <label for="nip" class="control-label col-lg-2">No Rangka</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="norangka" minlength="2" type="text" required />
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Kapasitas</label>
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15">
                                                <option>8</option>
                                                <option>16</option>
                                                <option>24</option>
                                                <option>32</option>
                                                <option>40</option>                                                              
                                            </select>

                                        </div>
                                        <label for="nip" class="control-label col-lg-2">Jenis Kendaraan</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="jk" minlength="2" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Produk</label>
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15">
                                                <option>Premum</option>
                                                <option>Pertamax</option>
                                                <option>Pertamax Plus</option>
                                                <option>Pertamax Dex</option>
                                                <option>Solar</option>
                                                <option>Bio Solar</option>
                                            </select>

                                        </div>
                                        <label for="nip" class="control-label col-lg-2">Jenis Tangki</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="jk" minlength="2" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="nip" class="control-label col-lg-2">Tera</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="tera" minlength="2" type="date" required />
                                        </div>
                                        <label for="nip" class="control-label col-lg-2">SNTK Per Tahun</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="stnk" minlength="2" type="date" required />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="nip" class="control-label col-lg-2">SNTK 5 Tahun</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="stnk5" minlength="2" type="date" required />
                                        </div>
                                        <label for="nip" class="control-label col-lg-2">KIR LLD</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="kir" minlength="2" type="date" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nip" class="control-label col-lg-2">Kir Pertamina</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="kp" minlength="2" type="date" required />
                                        </div>
                                        <label for="status" class="col-lg-2 col-sm-2 control-label">Status</label>
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15">
                                                <option>Hak Milik</option>
                                                <option>Sewa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nip" class="control-label col-lg-2">GPS</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="kp" minlength="2" type="text" required />
                                        </div>
                                        <label for="nip" class="control-label col-lg-2">Rasio</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="kp" minlength="2" type="text" required />
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
                </div>

                <!-- modal -->
                <a href="<?php echo base_url() ?>mt/import_csv" rel="stylesheet" class="btn btn-success"> Import CSV <i class="icon-plus"></i></a>

            </div>



            <div class="space15"></div>
            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th >No.</th> 
                        <th>Nopol</th>
                        <th>Transpotir</th>
                        <th>Kapasitas</th>
                        <th>Produk</th>
                        <th>No Mesin</th>
                        <th>No Rangka</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>1</td>
                        <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left"> D9808AD</a></td>
                        <td>PT Masoem</td>
                        <td>16</td>
                        <td class="center">Pertamax</td>
                        <td>KHT124147KL</td>
                        <td>LKI0342349HG</td>
                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>2</td>
                        <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9870AD</a></td>
                        <td>PT Masoem</td>
                        <td>8</td>
                        <td class="center">Premium</td>
                        <td>UIB12417AOB</td>
                        <td>LKI0342349HG</td>
                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>3</td>
                        <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9880AF</a></td>
                        <td>PT Masoem</td>
                        <td>8</td>
                        <td class="center">Solar</td>
                        <td>LWQ8213124YT</td>
                        <td>MIT9831247GTR</td>

                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>4</td>
                        <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9800AD</td>
                        <td>PT Incot</td>
                        <td>8</td>
                        <td class="center">Premium</td>
                        <td>GTR21247PO</td>
                        <td>NBC0342349ERT</td>

                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>5</td>
                        <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9000AU</td>
                        <td>PT Patra</td>
                        <td>8</td>
                        <td class="center">Premium</td>
                        <td>OAT124147KL</td>
                        <td>QW0342349HG</td>

                    </tr>
                    <tr class="">
                        <th style="display:none;"></th>
                        <td>6</td>
                        <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" style ="text-decoration: underline" class ="tooltips" data-original-title="Detail MT" data-replacement="left">D9800AF</td>
                        <td>PT Patra</td>
                        <td>8</td>
                        <td class="center">Bio Solar</td>
                        <td>KHT12SDALO </td>
                        <td>PUI0349124JG</td>

                    </tr>


                </tbody>
            </table>

            </div>
            </div>

        </section>

        <!-- page end-->
    </section>
</section>



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

