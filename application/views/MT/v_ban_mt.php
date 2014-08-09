
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.css" />

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <div class="panel-body">
                <div class="bio-desk">
                    <p>Nopol : D8900AD</p>
                    <p>Kapasitas : 16</p>
                    <p>Produk : Pertamax</p>
                </div>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Ban MT   
            </header>
            <div class="panel-body">
                <a class="btn btn-info" data-toggle="modal" href="#myModal">
                    Ban MT <i class="icon-plus"></i>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Form Tambah Ban</h4>
                            </div>
                            <div class="modal-body">
                                <!-- form tambah-->
                                <form class="form-horizontal" role="form">
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
                                          </select>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                        <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Tanggal Pasang</label>
                                        <div class="col-lg-10">
                                            <input type="date" class="form-control" id="nomesin" placeholder="Catridge">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Tanggal Ganti</label>
                                        <div class="col-lg-10">
                                            <input type="date" class="form-control" id="inputKompartemen4" placeholder="C02">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">Merk Ban</label>
                                        <div class="col-lg-10">
                                            <input type="keterangan" class="form-control" id="inputKompartemen4" placeholder="Merk Ban">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Seri</label>
                                        <div class="col-lg-10">
                                            <input type="keterangan" class="form-control" id="inputKompartemen4" placeholder="No Seri">
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
                                </form> 
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                <button class="btn btn-success" type="button">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->

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
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>1</td>
                            <td>1</td>
                            <td>23/02/2009</td>
                            <td>24/02/2014</td>
                            <td>Aspal</td>
                            <td>129344KM</td>
                            <td>Original</td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>2</td>
                           <td>2</td>
                            <td>23/02/2009</td>
                            <td>25/02/2013</td>
                            <td>Aspal</td>
                            <td>129124KM</td>
                            <td>Vulkanisir</td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>3</td>
                           <td>3</td>
                            <td>23/02/2009</td>
                            <td>28/02/2013</td>
                            <td>Aspal</td>
                            <td>129124KM</td>
                            <td>Original</td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>4</td>
                            <td>4</td>
                            <td>23/02/2009</td>
                            <td>27/05/2015</td>
                            <td>Aspal</td>
                            <td>129124KM</td>
                            <td>Original</td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>5</td>
                            <td>5</td>
                            <td>23/02/2009</td>
                            <td>26/07/2014</td>
                            <td>Aspal</td>
                            <td>129124KM</td>
                            <td>Original</td>
                        </tr>
                        <tr class="">
                            <th style="display:none;"></th>
                            <td>6</td>
                           <td>6</td>
                            <td>23/02/2009</td>
                            <td>25/05/2014</td>
                            <td>Aspal</td>
                            <td>129124KM</td>
                            <td>Original</td>
                        </tr>
                    </tbody>
                </table>
<a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet" class="btn btn-warning" style="float:left;"><i class=" icon-circle-arrow-lef"></i> Kembali</a>
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
