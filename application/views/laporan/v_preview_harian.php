
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>laporan/harian">Laporan Harian</a></li>
                    <li class="active">Preview</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>

        <!-- page start-->
        <?php if ($laporan_ada == true) { ?>
            <section class="panel">    
                
                <iframe src="http://view.officeapps.live.com/op/view.aspx?src=<?php echo $nama_file; ?>" width="100%" height="600" style="border: none;"></iframe>
                
                <?php // echo $nama_file; ?>
            </section>
        <?php } else { ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Error!</strong> Laporan gagal dibuat karena data input kinerja tidak ditemukan.
            </div>
        <?php } ?>


        <!-- page end-->
    </section>
</section>

