
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <div class="panel-body" style="height: 500px">
                <div style="margin-top: 150px;" >
                    <center>  <h3> PRESENTASI TRIWULAN OAM </h3><hr/></center>
                    <form class="cmxform form-horizontal tasi-form" style="margin-left:25%;" action="<?php echo base_url() ?>presentasi/set_slide" role="form" id="commentForm" method="post">

                        <div class="form-group" id="bulan">
                            <label for="bulanLaporan" class="col-lg-1 col-sm-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="number" name="tahun" minlength="4" maxlength="4" min="2010" value="<?php echo date('Y') ?>" required="required" id="tahunLaporan"  class="form-control"/>
                            </div>
                            <label for="bulanLaporan" class="col-lg-1 col-sm-1 control-label">Triwulan</label>
                            <div class="col-lg-3">
                                <select name="bulan" id="select_triwulan" class="form-control" onchange="changeTriwulan()"> 
                                    <option value="1"> Triwulan I </option>
                                    <option value="4"> Triwulan II </option>
                                    <option value="7"> Triwulan III </option>
                                    <option value="10"> Triwulan IV </option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" style="float: right;" class="btn btn-danger" value="Mulai">
                            </div>

                        </div>
                    </form>
                    <!-- generate laporan-->

                </div>

            </div>


        </section>

        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>
