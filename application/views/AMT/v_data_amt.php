
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
                                      <li><a href="javascript:FilterData('aktif');">Aktif</a></li>
                                      <li><a href="javascript:FilterData('peringatan');">Dalam Peringatan</a></li>
                                      <li><a href="javascript:FilterData('tidak aktif');">Tidak Aktif</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>NIP</th>
                                  <th>Nama</th>
                                  <th>Jabatan</th>
                                  <th>Klasifikasi</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <td>Jondi Rose</td>
                                  <td>Alfred Jondi Rose</td>
                                  <td>1234</td>
                                  <td class="center">super user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Dulal</td>
                                  <td>Jonathan Smith</td>
                                  <td>434</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Sumon</td>
                                  <td> Sumon Ahmed</td>
                                  <td>232</td>
                                  <td class="center">super user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>vectorlab</td>
                                  <td>dk mosa</td>
                                  <td>132</td>
                                  <td class="center">elite user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Admin</td>
                                  <td> Flat Lab</td>
                                  <td>462</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Rafiqul</td>
                                  <td>Rafiqul dulal</td>
                                  <td>62</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Jhon Doe</td>
                                  <td>Jhon Doe </td>
                                  <td>1234</td>
                                  <td class="center">super user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Dulal</td>
                                  <td>Jonathan Smith</td>
                                  <td>434</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Sumon</td>
                                  <td> Sumon Ahmed</td>
                                  <td>232</td>
                                  <td class="center">super user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>vectorlab</td>
                                  <td>dk mosa</td>
                                  <td>132</td>
                                  <td class="center">elite user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Admin</td>
                                  <td> Flat Lab</td>
                                  <td>462</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
                              </tr>
                              <tr class="">
                                  <td>Rafiqul</td>
                                  <td>Rafiqul dulal</td>
                                  <td>62</td>
                                  <td class="center">new user</td>
                                  <td><a class="edit" href="javascript:;">Edit</a></td>
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

                                              Body goes here...

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="button">Save changes</button>
                                          </div>
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
	  
	  