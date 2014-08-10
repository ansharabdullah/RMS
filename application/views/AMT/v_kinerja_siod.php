<script type="text/javascript">
    $( document ).ready(function() {
        $("#filePreview").hide();
        $("#formSiod").submit(function(e){
            var ext = $("#fileName").val().split('.').pop();
            if(ext=="xls" || ext=="xlsx"){
                $("#filePreview").hide();
                $("#filePreview").show("slow");
                $("#tgl").html($("#tglForm").val());
            }
            else
            {
                alert("Tipe file yang diupload tidak sesuai (file excel)")   
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
                Input Kinerja Awak Mobil Tangki dari SIOD
            </header>
            <div class="panel-body" >
                <form class="form-horizontal" action="#" role="form" id="formSiod">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="date" required="required" id="tglForm" class="form-control"  placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">File SIOD</label>
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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Kilometer (Km)</th>
                                    <th>Kiloliter (Kl)</th>
                                    <th>Ritase (Rit)</th>
                                    <th>Jumlah SPBU</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>1</td>
                                    <td>35749135</td>
                                    <td>Firman</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>2</td>
                                    <td>329762</td>
                                    <td>Renisa</td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>3</td>
                                    <td>93702405</td>
                                    <td>Gani</td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>4</td>
                                    <td>81730</td>
                                    <td>Dadan</td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>5</td>
                                    <td>924082</td>
                                    <td>Monika</td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>6</td>
                                    <td>826862</td>
                                    <td>Dadang</td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(30, 70) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>7</td>
                                    <td>DART999759</td>
                                    <td>Fadil</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>8</td>
                                    <td>D2956925F</td>
                                    <td>Dani</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>9</td>
                                    <td>205082506</td>
                                    <td>Gono</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>10</td>
                                    <td>80070664</td>
                                    <td>Sandi</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>11</td>
                                    <td>007205702</td>
                                    <td>Setiadi</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>12</td>
                                    <td>09164961</td>
                                    <td>Dodi</td>
                                    <td><?php echo rand(300, 500) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>
                                    <td><?php echo rand(2, 5) ?></td>
                                    <td><?php echo rand(40, 150) ?></td>

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
