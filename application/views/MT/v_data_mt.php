<link rel="stylesheet" href="<?php echo base_url()?>assets/assets/data-tables/DT_bootstrap.css" />

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
                                                 <div class="form-group">
                                                      <label for="inputnopol" class="col-lg-2 col-sm-2 control-label">Nopol</label>
                                                      <div class="col-lg-10">
                                                          <input type="nopol" class="form-control" id="inputnopol" placeholder="Nopol">
                                                          <p>Tidak boleh kosong</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="inputTransportir" class="col-lg-2 col-sm-2 control-label">Transportir</label>
                                                      <div class="col-lg-10">
                                                          <input type="transportir" class="form-control" id="inputTransportir" placeholder="Tranportir">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Kapasitas</label>
                                                        <div class="col-lg-10">
                                                          <select class="form-control m-bot15">
                                                              <option>8</option>
                                                              <option>16</option>
                                                              <option>24</option>
                                                              <option>32</option>
                                                              <option>40</option>                                                              <option>32</option>
                                                          </select>
                                                         
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Produk</label>
                                                        <div class="col-lg-10">
                                                          <select class="form-control m-bot15">
                                                              <option>Premum</option>
                                                              <option>Pertamax</option>
                                                              <option>Solar</option>
                                                              <option>Multi</option>
                                                          </select>
                                                         
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="inputJK" class="col-lg-2 col-sm-2 control-label">Jenis Kendaraan</label>
                                                      <div class="col-lg-10">
                                                          <input type="jk" class="form-control" id="inputJK" placeholder="Jenis Kendaraan">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="nomesin" class="col-lg-2 col-sm-2 control-label">Nomor Mesin</label>
                                                      <div class="col-lg-10">
                                                          <input type="nomesin" class="form-control" id="nomesin" placeholder="No Mesin">
                                                          <p> Tidak boleh kosong </p>
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="norangka" class="col-lg-2 col-sm-2 control-label">No Rangka</label>
                                                      <div class="col-lg-10">
                                                          <input type="norangka" class="form-control" id="inputKompartemen4" placeholder="No Rangka">
                                                          <p> Tidak boleh kosong </p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Jenis Tangki</label>
                                                        <div class="col-lg-10">
                                                          <select class="form-control m-bot15">
                                                              <option>Alumunium Aweco</option>
                                                              <option>Carbon Steel</option>
                                                              <option>steel</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="inputKompartemen" class="col-lg-2 col-sm-2 control-label">Kompartemen</label>
                                                      <div class="col-lg-10">
                                                          <input type="kompartemenemail" class="form-control" id="inputKompartemen4" placeholder="Kompartemen">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="inputSV" class="col-lg-2 col-sm-2 control-label">Standar Volume</label>
                                                      <div class="col-lg-10">
                                                          <input type="standarvolume" class="form-control" id="inputSV" placeholder="Standar Volume">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="inputSO" class="col-lg-2 col-sm-2 control-label">Sensor Overfill</label>
                                                      <div class="col-lg-10">
                                                          <input type="so" class="form-control" id="inputSO" placeholder="Sensor Overfill">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="Kategori" class="col-lg-2 col-sm-2 control-label">Kategori</label>
                                                      <div class="col-lg-10">
                                                          <input type="kategori" class="form-control" id="inputKategori" placeholder="Kategori">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="status" class="col-lg-2 col-sm-2 control-label">Status</label>
                                                      <div class="col-lg-10">
                                                          <input type="status" class="form-control" id="status" placeholder="Status">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="inputGps" class="col-lg-2 col-sm-2 control-label">GPS</label>
                                                      <div class="col-lg-10">
                                                          <input type="gps" class="form-control" id="gps" placeholder="GPS">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="rasio" class="col-lg-2 col-sm-2 control-label">Rasio</label>
                                                      <div class="col-lg-10">
                                                          <input type="rasio" class="form-control" id="rasio" placeholder="Rasio">
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
                  
                                  <a href="<?php echo base_url() ?>index.php/mt/import_sv" rel="stylesheet" class="btn btn-success"> Import CSV <i class="icon-plus"></i></a>
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
                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <th style="display:none;"></th>
                                  <td>1</td>
                                  <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet">D9808AD</a></td>
                                  <td>PT Masoem</td>
                                  <td>16</td>
                                  <td class="center">Pertamax</td>
                              </tr>
                              <tr class="">
                                  <th style="display:none;"></th>
                                  <td>2</td>
                                  <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet">D9870AD</a></td>
                                  <td>PT Masoem</td>
                                  <td>8</td>
                                  <td class="center">Premium</td>
                              </tr>
                              <tr class="">
                                  <th style="display:none;"></th>
                                  <td>3</td>
                                  <td><a href="<?php echo base_url() ?>index.php/mt/detail_mt" rel="stylesheet">D9880AF</a></td>
                                  <td>PT Masoem</td>
                                  <td>8</td>
                                  <td class="center">Solar</td>
                              </tr>
                              <tr class="">
                                  <th style="display:none;"></th>
                                  <td>4</td>
                                  <td>D9800AD</td>
                                  <td>PT Incot</td>
                                  <td>8</td>
                                  <td class="center">Premium</td>
                              </tr>
                              <tr class="">
                                  <th style="display:none;"></th>
                                  <td>5</td>
                                  <td>D9000AU</td>
                                  <td>PT Patra</td>
                                  <td>8</td>
                                  <td class="center">Premium</td>
                              </tr>
                              <tr class="">
                                  <th style="display:none;"></th>
                                  <td>6</td>
                                  <td>D9800AF</td>
                                  <td>PT Patra</td>
                                  <td>8</td>
                                  <td class="center">Bio Solar</td>
                              </tr>
                             
                             
                              </tbody>
                          </table>
                           
                      </div>
                  </div>
                 
              </section>
              
              <!-- page end-->
          </section>
      </section>
      

  
     <script type="text/javascript" src="<?php echo base_url()?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/assets/data-tables/DT_bootstrap.js"></script>
  
    <!--script for this page only-->
      <script src="<?php echo base_url()?>assets/js/editable-table.js"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>

