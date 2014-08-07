<script type="text/javascript">
    $( document ).ready(function() {
        $("#filePreview").hide();
        $("#formSiod").submit(function(e){
            var ext = $("#fileName").val().split('.').pop();
            if(ext=="csv"){
                $("#filePreview").hide();
                $("#filePreview").show("slow");
            }
            else
            {
                alert("Tipe file yang diupload tidak sesuai (csv)")   
            }
            e.preventDefault();
        });
    });
    
    function importTable()
    {
        alert("Berhasil disimpan !");
    }
    
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Import Data AMT Dari CSV
            </header>
            <div class="panel-body" >
                <form class="form-horizontal" action="#" role="form" id="formSiod">
                    
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">File CSV</label>
                        <div class="col-lg-10">
                            <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File SIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-danger">Upload</button>
                        </div>
                    </div>
                </form>
                <hr/>
                <div id="filePreview">
                    <header class="panel-heading">
                        Data dari CSV
                    </header>
                    <div class="adv-table editable-table ">
                        <div class="clearfix">

                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>No.</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Klasifikasi</th>
                                    <th>Status</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No. KTP</th>
                                    <th>No. SIM</th>
                                    <th>No. Telp</th>
                                    <th>Transportir Asal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>2</td>
                                    <td>3205190200</td>
                                    <td>Suryahadikusumah</td>
                                    <td>Supir</td>
                                    <td>16</td>
                                    <td>Aktif</td>
                                    <td>Bandung</td>
                                    <td>13/12/2014</td>
                                    <td>234567890</td>
                                    <td>234567890</td>
                                    <td>08567543212</td>
                                    <td>Masoem</td>
                                </tr>
                                
                                
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>1</td>
                                    <td>3205190100</td>
                                    <td>Renisa</td>
                                    <td>Supir</td>
                                    <td>16</td>
                                    <td>Aktif</td>
                                    <td>Bandung</td>
                                    <td>13/12/2014</td>
                                    <td>234567890</td>
                                    <td>234567890</td>
                                    <td>08567543212</td>
                                    <td>Masoem</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    <button style="float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>

