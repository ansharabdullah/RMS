
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel"> 
            <header class="panel-heading">
                KPI Internal OAM
                <a href="<?php echo base_url()?>kpi/internal_input" type="button" style="float: right;" class="btn btn-xs btn-success" ><i class="icon-plus"></i> Tambah KPI Internal</a>
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" name="tahun" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="cek" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>
                </form>
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
