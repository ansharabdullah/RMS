
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>pengaturan/pengaturan_depot/"> Pengaturan TBBM</a></li>
            <li class="active">Tambah TBBM</li>
        </ul>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Tambah TBBM
                    </header>
                    <div class="panel-body">
                        <div class="stepy-tab">
                            <ul id="default-titles" class="stepy-titles clearfix">
                                <li id="default-title-0" class="current-step">
                                    <div></div>
                                </li>
                                <li id="default-title-1" class="">
                                    <div></div>
                                </li>
                                <li id="default-title-2" class="">
                                    <div></div>
                                </li>
                            </ul>
                        </div>

                        <form class="cmxform form-horizontal tasi-form" id="default" method="POST" action="<?php echo base_url() ?>pengaturan/pengaturan_depot/">
                            <fieldset title="Data Depot" class="step" id="default-step-0">
                                <legend> </legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama TBBM</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_depot" placeholder="Nama Depot" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Alamat TBBM</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="alamat_depot" placeholder="Alamat Depot" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama OH</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_oh" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Status APMS</label>
                                    <div class="col-lg-10">
                                        <input name="status_apms" id="radio-01" value="1" type="radio" /> Ada &nbsp;&nbsp;&nbsp;
                                        <input name="status_apms" id="radio-02" value="0" type="radio" checked /> Tidak Ada
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset title="Data SS" class="step" id="default-step-1" >
                                <legend> </legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Nama SS" name="nama_pegawai" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">NIP</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="NIP" name="nip" required>
                                    </div>
                                </div>
                            </fieldset>

                            <input type="submit" class="finish btn btn-danger" value="Finish" name="add_depot"/>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<!-- js placed at the end of the document so the pages load faster 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>-->
