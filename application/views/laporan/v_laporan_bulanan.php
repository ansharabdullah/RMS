<script type="text/javascript">
    $(document).ready(function() {
        $("#commentForm").submit(function(e) {
            if ($("#commentForm").valid()){

            }
            e.preventDefault();
        });
    });
</script>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li class="active">Laporan Bulanan</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Laporan Bulanan
            </header>
            <div class="panel-body" >
                <div class="col-lg-12">                    
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>laporan/ms2">MS2 Complience</a>
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>laporan/frm">Tarif Interpolasi dan FRM</a>
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>laporan/kpi_operasional">KPI Operasional</a>                    
                </div>
            </div>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm">
                    <div class="form-group" id="tanggal">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" name="tanggal" required="required" id="tglLaporan"  class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <input style="float:right;" type="submit" class="btn btn-warning" value="Cek">
                        </div>
                    </div>

                </form>
            </div> 
        </section>
        <!-- page end-->
    </section>
</section>

