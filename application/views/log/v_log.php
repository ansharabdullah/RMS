<script type="text/javascript">
    $( document ).ready(function() {
        $("#EditProfile").hide();
        $("#EditPass").hide();
    });
    
    function ShowProfile(){
        $("#ShowProfile").fadeIn("slow");
        $("#EditProfile").hide();
        $("#EditPass").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
        $("#btnEditPass").removeClass("active");
    }
    
</script>

<section id="main-content">
    <section class="wrapper">

        <!-- page start-->
        <div class="row">
            <section class="panel">
                <header class="panel-heading">
                    Tabel Log
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">

                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:FilterData('');">Semua</a></li>
                                    <li><a href="javascript:FilterData('edit');">Edit</a></li>
                                    <li><a href="javascript:FilterData('tambah');">Tambah</a></li>
                                    <li><a href="javascript:FilterData('hapus');">Hapus</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>User</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                    <th>Kata Kunci</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>1</td>
                                    <td>07/08/2014</td>
                                    <td>ansharabdullah</td>
                                    <td>Pengawas Operasi</td>
                                    <td>Import kinerja awak mobil tangki untuk tanggal 3 Jan 2014</td>
                                    <td><span class="label label-success">Tambah</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>2</td>
                                    <td>08/08/2014</td>
                                    <td>renisas</td>
                                    <td>Pengawas Operasi</td>
                                    <td>Hapus data AMT NIP 234567897 Nama Jaja</td>
                                    <td><span class="label label-danger">Hapus</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>3</td>
                                    <td>09/08/2014</td>
                                    <td>cepi</td>
                                    <td>Supporting</td>
                                    <td>Edit data AMT NIP 345678 Nama Dadan</td>
                                    <td><span class="label label-warning">Edit</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>4</td>
                                    <td>10/08/2014</td>
                                    <td>cahyadi</td>
                                    <td>Site Supervisor</td>
                                    <td>Hapus kinerja AMT nip 7192497 nama Juju Tanggal 30/09/2012</td>
                                    <td><span class="label label-danger">Hapus</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>5</td>
                                    <td>11/08/2014</td>
                                    <td>dodi</td>
                                    <td>Staf OAM</td>
                                    <td>Insert MS2 Compliance</td>
                                    <td><span class="label label-success">Tambah</span></td>
                                </tr>

                                <tr class="">

                                    <td style="display:none;"></td>
                                    <td>6</td>
                                    <td>12/08/2014</td>                                
                                    <td>yana</td>
                                    <td>OAM</td>
                                    <td>Input Rencana</td>
                                    <td><span class="label label-success">Tambah</span></td>
                                </tr>
                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>7</td>
                                    <td>13/08/2014</td>
                                    <td>ansharabdullah</td>
                                    <td>Pengawas Operasi</td>
                                    <td>Import kinerja awak mobil tangki untuk tanggal 3 Jan 2014</td>
                                    <td><span class="label label-success">Tambah</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>8</td>
                                    <td>14/08/2014</td>
                                    <td>firman</td>
                                    <td>Pengawas Operasi</td>
                                    <td>Hapus data AMT NIP 234567897 Nama Jaja</td>
                                    <td><span class="label label-danger">Hapus</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>9</td>
                                    <td>15/08/2014</td>
                                    <td>cepi</td>
                                    <td>Supporting</td>
                                    <td>Edit data AMT NIP 345678 Nama Dadan</td>
                                    <td><span class="label label-warning">Edit</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>10</td>
                                    <td>10/08/2014</td>
                                    <td>cahyadi</td>
                                    <td>Site Supervisor</td>
                                    <td>Hapus kinerja AMT nip 7192497 nama Juju Tanggal 30/09/2012</td>
                                    <td><span class="label label-danger">Hapus</span></td>
                                </tr>

                                <tr class="">
                                    <td style="display:none;"></td>
                                    <td>11</td>
                                    <td>11/08/2014</td>
                                    <td>dodi</td>
                                    <td>Staf OAM</td>
                                    <td>Insert MS2 Compliance</td>
                                    <td><span class="label label-success">Tambah</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
<!--main content end-->



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