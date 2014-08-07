<script>
    $(document).ready(function(){
        $("#tabel-ban").hide();
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Pengingat Mobil Tangki
            </header>
            <div class="panel-body" >
                <div class="clearfix">
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Filter<i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#" onclick="filter('apar');">Apar</a></li>
                            <li><a href="#" onclick="filter('ban');">Ban</a></li>
                        </ul>
                    </div>
                </div>
                <div class="adv-table editable-table " id="tabel-apar">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>No.</th>
                                <th>Nopol</th>
                                <th>Apar 1</th>
                                <th>Apar 2</th>
                                <th>Apar 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = array('D 6308 AD', 'D 1725 AF', 'D 2245 AF', 'D 6066 AF', 'D 3038 AD', 'D 8557 AD', 'D 1346 AD', 'D 7152 AF', 'D 9487 AD', 'D 8827 AF', 'D 8711 AD', 'D 8277 AF');
                            $apar1 = array(6, 12, 11, 3);
                            $apar2 = array(22, 9, 10, 15);
                            $apar3 = array(15, 1, 6, 18);
                            for ($i = 0; $i < 12; $i++) {
                                if ($i >= 4) {
                                    ?>
                                    <tr>
                                        <th style="display: none;"></th>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><span id="nopol<?php echo $i ?>"><?php echo $data[$i] ?></td>
                                        <td><a href="#myModal"  data-toggle="modal"  onclick="setDetail('<?php echo $data[$i] ?>', '<?php echo "apar1-" . $i; ?>','1')")><div id="<?php echo 'apar1-' . $i; ?>"><?php echo rand(8, 20); ?> hari</div></a></td>
                                        <td><a href="#myModal"  data-toggle="modal" onclick="setDetail('<?php echo $data[$i] ?>', '<?php echo "apar2-" . $i; ?>','2')")><div id="<?php echo 'apar2-' . $i; ?>"><?php echo rand(10, 25); ?> hari</div></a></td>
                                        <td><a href="#myModal"  data-toggle="modal" onclick="setDetail('<?php echo $data[$i] ?>', '<?php echo "apar3-" . $i; ?>','3')")><div id="<?php echo 'apar3-' . $i; ?>"><?php echo rand(12, 30); ?> hari</div></a></td>
                                    </tr>
                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                        <th style="display: none;"></th>
                                        <td style="background-color: orange;" class="peringatan<?php echo $i ?>"><?php echo $i + 1; ?></td>
                                        <td style="background-color: orange;" class="peringatan<?php echo $i ?>"><span id="nopol<?php echo $i ?>"><?php echo $data[$i] ?></td>
                                        <td style="background-color: orange;" class="peringatan<?php echo $i ?>"><a href="#myModal"  data-toggle="modal"  onclick="setDetail('<?php echo $data[$i] ?>', '<?php echo "apar1-" . $i; ?>','1','<?php echo $i ?>')")><div id="<?php echo 'apar1-' . $i; ?>"><?php echo $apar1[$i]; ?> hari</div></a></td>
                                        <td style="background-color: orange;" class="peringatan<?php echo $i ?>"><a href="#myModal"  data-toggle="modal" onclick="setDetail('<?php echo $data[$i] ?>', '<?php echo "apar2-" . $i; ?>','2','<?php echo $i ?>')")><div id="<?php echo 'apar2-' . $i; ?>"><?php echo $apar2[$i]; ?> hari</div></a></td>
                                        <td style="background-color: orange;" class="peringatan<?php echo $i ?>"><a href="#myModal"  data-toggle="modal" onclick="setDetail('<?php echo $data[$i] ?>', '<?php echo "apar3-" . $i; ?>','3','<?php echo $i ?>')")><div id="<?php echo 'apar3-' . $i; ?>"><?php echo $apar3[$i]; ?> hari</div></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br/><br/>
                <table class="table table-striped table-hover table-bordered" id="tabel-ban">
                    <thead>
                        <tr>
                            <th style="display: none;"></th>
                            <th>No.</th>
                            <th>Nopol</th>
                            <th>Ban 1</th>
                            <th>Ban 2</th>
                            <th>Ban 3</th>
                            <th>Ban 4</th>
                            <th>Ban 5</th>
                            <th>Ban 6</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Apar</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal" role="form" id="form-edit" >
                                <div class="form-group">
                                    <label for="nopol" class="col-lg-2 col-sm-2 control-label">No. Polisi</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="nopol" readonly="readonly" name="nopol" placeholder="Nopol">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nopol" class="col-lg-2 col-sm-2 control-label">Jenis Apar</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="apar" readonly="readonly" name="nopol" placeholder="Jenis Apar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="date" value="" id="tgl" size="16" required="required"/>
                                        <span class="help-block">Pilih Tanggal</span>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button class="btn btn-success" type="submit" onclick="editApar()">Save changes</button>

                        </div>
                        </form>

                    </div>
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
<script type="text/javascript">
    var nopol;
    var apar;
    var jenis;
    var highlight;
    var index;
    function setDetail(np,apr,jenis,row){
        nopol = np;
        apar = apr;
        index = row;
        highlight = ".peringatan" + row;
        $("#tgl").val("");
        $("#nopol").val(np);
        $("#apar").val("Apar " + jenis);
    }
    
    function filter(jenis)
    {
        if(jenis == "apar")
        {
            $("#tabel-ban").hide();
            $("#tabel-apar").hide();
            $("#tabel-apar").show("slow");
        }
        else
        {
            $("#tabel-apar").hide();
            $("#tabel-ban").hide();
            $("#tabel-ban").show("slow");
        }
    }
    
    $("#form-edit").submit(function(e){
       
        var date1 = new Date($("#tgl").val());
        var date2 = new Date();
        var diffDays = date2.getDate() - date1.getDate(); 
        if(diffDays > 0)
        {
            alert("Tanggal harus lebih dari sekarang");   
        }
        else
        {
            diffDays = diffDays*(-1);
            apar = "#"+apar;
            $(apar).text(diffDays + " hari");
            var apar1 = "#apar1-"+index;
            var apar2 = "#apar2-"+index;
            var apar3 = "#apar3-"+index;
            var val1 =  $(apar1).text();
            var val2 =  $(apar2).text();
            var val3 =  $(apar3).text();
            val1 = val1.substr(0, val1.length - 5);
            val2 = val2.substr(0, val2.length - 5);
            val2 = val3.substr(0, val3.length - 5);
            if(parseInt(val1) > 7 && parseInt(val2) > 7 && parseInt(val3) > 7)
            {
                $(highlight).css({'background-color': 'transparent'});    
            }
            $("#myModal").modal('toggle');
        }
        e.preventDefault();
     
    });
    
</script>
