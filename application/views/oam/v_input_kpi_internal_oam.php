
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel"> 
            <header class="panel-heading">
                Tambah KPI Internal OAM
           </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="">
                     <table class="table table-striped table-hover table-bordered">
                        <thead>
                         <tr>
                            <td rowspan="2">Indikator Kinerja</td>
                            <td rowspan="2">Satuan</td>
                            <td rowspan="2">Frekuensi Monitoring</td>
                            <td rowspan="2">Bobot %</td>
                            <td colspan="2">Bulan 1</td>
                            <td colspan="2">Bulan 2</td>
                            <td colspan="2">Bulan 3</td>
                        </tr>
                        <tr>
                            <td>Base</td>
                            <td>Stretch</td>
                            <td>Base</td>
                            <td>Stretch</td>
                            <td>Base</td>
                            <td>Stretch</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="14"><b>Revenue</b></td>
                            </tr>
                            <tr>
                                <td>Revenue Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td>10</td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td>8</td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td colspan="14"><b>Laba Usaha</b></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td>10</td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Terminal Storage</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td>7</td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                                <td><input type="text" required="required" class="form-control"/></td>
                            </tr>
                        </tbody>
                    </table>
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
