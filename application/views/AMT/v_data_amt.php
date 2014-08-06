
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Data Crew AMT
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group">
                                  								  
								  <a class="btn btn-primary" data-toggle="modal" href="#ModalTambahManual">
                                  Tambah AMT <i class="icon-plus"></i>
									</a>
									
									<a class="btn btn-success" data-toggle="modal" href="#ModalImportCSV">
                                  Import CSV <i class="icon-plus"></i>
									</a>
																		
                              </div>
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
                                  <th>NIP</th>
                                  <th>Nama</th>
                                  <th>Jabatan</th>
                                  <th width="30">Klasifikasi</th>
								  <th width="30">Status</th>
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
                              </tr>
							  
							  <tr class="">
                                  <td style="display:none;"></td>
                                  <td>2</td>
                                  <td>3205190002</td>
                                  <td>Fiqri</td>
                                  <td>Supir</td>
                                  <td>16</td>
                                  <td><span class="label label-success">Aktif.</span></td>
                              </tr>
							  
							  <tr class="">
                                  <td style="display:none;"></td>
                                  <td>3</td>
                                  <td>3205190003</td>
                                  <td>Firdaus</td>
                                  <td>Kernet</td>
                                  <td>24</td>
                                  <td><span class="label label-default">Tidak Aktif</span></td>
                              </tr>
							  
							  <tr class="">
                                  <td style="display:none;"></td>
                                  <td>4</td>
                                  <td>3205190004</td>
                                  <td>Anshar</td>
                                  <td>Supir</td>
                                  <td>8</td>
                                  <td><span class="label label-warning">Peringatan</span></td>
                              </tr>
							  
							  <tr class="">
                                  <td style="display:none;"></td>
                                  <td>5</td>
                                  <td>3205190005</td>
                                  <td>Abdullah</td>
                                  <td>Kernet</td>
                                  <td>24</td>
                                  <td><span class="label label-warning">Peringatan</span></td>
                              </tr>
							  
							  <tr class="">
                                  <td style="display:none;"></td>
                                  <td>6</td>
                                  <td>3205190006</td>
                                  <td>Chepy</td>
                                  <td>Kernet</td>
                                  <td>40</td>
                                  <td><span class="label label-success">Aktif.</span></td>
                              </tr>
							  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
	  
	  <div class="modal fade" id="ModalTambahManual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Tambah AMT</h4>
                                          </div>
                                          <div class="modal-body">

                                              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          
                          <div class="panel-body">
						  
						  
							
						  
						  
						  
						  
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Name (required)</label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cname" name="name" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="cemail" type="email" name="email" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">URL (optional)</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="curl" type="url" name="url" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Your Comment (required)</label>
                                          <div class="col-lg-4">
                                              <textarea class="form-control " id="ccomment" name="comment" required></textarea>
                                          </div>
                                      </div>
                                      
                                  
                              </div>

                          </div>
                      </section>
                  </div>
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
	  
	  
	  <div class="modal fade" id="ModalImportCSV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Import CSV</h4>
                                          </div>
                                          <div class="modal-body">

                                              Body goes here...

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="button">Save changes</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
	  
	<!--script for this page only-->
      <script src="<?php echo base_url()?>assets/js/editable-table.js"></script>

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
	  
	  