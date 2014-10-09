
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url();?>"><i class="icon-home"></i> Home</a></li>
                    <li class="active">Laporan Triwulan</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Laporan Triwulan
            </header>
            <div class="panel-body" >
                <div class="col-lg-12">
                    <a type="submit" class="btn btn-success" href="<?php echo base_url() ?>laporan/kpi_internal">KPI Internal</a>                    
                </div>
            </div>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url() ?>laporan/preview_triwulan" method="post" role="form" id="commentForm">
                    <div class="form-group">
                        <label for="tahun" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="number" name="tahun" required="required" class="form-control" placeholder="Tahun" max_lenght="4" min="2010" maxlength="4"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="jenis" class="col-lg-2 col-sm-2 control-label">Jenis</label>
                        <div class="col-lg-10 col-sm-6">
                            <select name="jenis" class="form-control">
                                <option value="Triwulan I"> Triwulan I </option>
                                <option value="Triwulan II"> Triwulan II </option>
                                <option value="Triwulan III"> Triwulan III </option>
                                <option value="Triwulan IV"> Triwulan IV </option>
                            </select>    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="submit" name="cek" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>                    
                </form>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>


