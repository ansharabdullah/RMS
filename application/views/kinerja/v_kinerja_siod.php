<script type="text/javascript">
         
    $( document ).ready(function() {
        $("#filePreview").hide();
        
        $("#signupForm").submit(function(e){
            var isvalidate=$("#signupForm").valid();
            if(isvalidate)
            {
                var ext = $("#fileSIOD").val().split('.').pop();
                if(ext=="xls" || ext=="xlsx"){
                    $("#filePreview").hide();
                    $("#filePreview").slideDown("slow");
                    $("#tgl").html($("#tanggalSIOD").val());
                }else if(ext==""){
                
                }else{
                    alert("Tipe file yang diupload tidak sesuai (file excel)");
                }
                e.preventDefault();
            }
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
                Input Kinerja dari SIOD
                <a style="float:right;" data-placement="left" href="<?php echo base_url() ?>kinerja/manual" class="btn btn-success btn-xs tooltips" data-original-title="Tambah Manual"><i class="icon-plus"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" onsubmit="testing()">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tanggal" name="tanggalSIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File SIOD</label>
                        <div class="col-lg-10">
                            <input type="file"  id="fileSIOD" required="required" class="form-control"  placeholder="File SIOD" name="fileSIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Upload">
                        </div>
                    </div>
                </form>
                <hr/>
                <div id="filePreview">
                    <header class="panel-heading">
                        Data File SIOD (<span id="tgl"></span>)
                    </header>
                    <div class="adv-table editable-table ">
                        <div class="clearfix">

                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>Nopol</th>
                                    <th>Kilometer (Km)</th>
                                    <th>Kiloliter (Kl)</th>
                                    <th>Ritase (Rit)</th>
                                    <th>Own Use</th>
                                    <th>Premium</th>
                                    <th>Pertamax</th>
                                    <th>Pertamax Plus</th>
                                    <th>Pertamax Dex</th>
                                    <th>Solar</th>
                                    <th>Bio Solar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>1</td>
                                    <td>D 6308 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>2</td>
                                    <td>D 1725 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>


                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>3</td>
                                    <td>D 2245 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>4</td>
                                    <td>D 6066 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>5</td>
                                    <td>D 3038 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>6</td>
                                    <td>D 8557 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>7</td>
                                    <td>D 1346 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>8</td>
                                    <td>D 7152 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>9</td>
                                    <td>D 9487 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>10</td>
                                    <td>D 8827 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>11</td>
                                    <td>D 8711 AD</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>12</td>
                                    <td>D 8277 AF</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>

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

<!-- END JAVASCRIPTS -->
<script>
    
    jQuery(document).ready(function() {
        EditableTable.init();
    });    
    
</script>
