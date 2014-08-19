
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <div class="panel-body" style="height: 500px">
                <div style="margin-top: 150px;" >
                  <center>  <h3> PRESENTASI TRIWULAN OAM </h3><hr/></center>
                        <form class="cmxform form-horizontal tasi-form" style="margin-left:25%;" action="<?php echo base_url() ?>presentasi/slide/1" role="form" id="commentForm" method="post">

                            <div class="form-group" id="bulan">
                                <label for="bulanLaporan" class="col-lg-2 col-sm-2 control-label">Pilih Bulan</label>
                                <div class="col-lg-4">
                                    <input type="month" name="bulan" value="<?php echo date('Y-m')?>" required="required" id="bulanLaporan"  class="form-control"/>
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
