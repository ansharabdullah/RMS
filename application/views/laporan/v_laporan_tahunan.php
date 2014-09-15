<script type="text/javascript">
    $( document ).ready(function() {        
        $("#commentForm").submit(function(e){
            if($("#commentForm").valid()){
                
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
                    <li class="active">Laporan Tahunan</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Laporan Tahunan
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" method="post" action="#" role="form" id="commentForm">
                    <div class="form-group" id="tanggal">
                        <label for="tahun" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="number" min="2010" maxlength="4" name="tahun" required="required" id="tahunLaporan"  class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="submit" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>                    
                </form>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
