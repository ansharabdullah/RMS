<script type="text/javascript">

    $(document).ready(function() {

        $("#signupForm").submit(function(e) {
            var isvalidate = $("#signupForm").valid();
            if (isvalidate)
            {
                var tanggal = new Date($("#tanggalSIOD").val());
                var hasil = tanggal.getDate() + "-" + (tanggal.getMonth() + 1) + "-" + tanggal.getFullYear();
                $("#tanggal").html(hasil);
                $("#tanggal_hapus").val($("#tanggalSIOD").val());
                $('#ModalHapus').modal('show')
                e.preventDefault();
            }
        });

    });

</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Hapus Semua Kinerja               
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="date" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tanggal" name="tanggalSIOD" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10 col-sm-6">
                            <input type="submit" style="float: right;" class="btn btn-danger" value="Hapus" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- page end-->

        <?php if ($klik_hapus == true) { ?>
            <?php if ($status_hapus == true) { ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Sukses!</strong> Berhasil hapus semua kinerja.
                </div>
            <?php } else { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Kinerja belum pernah di input.
                </div>
            <?php } ?>
        <?php } ?>
    </section>
</section>


<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Konfirmasi hapus kinerja</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url() ?>kinerja/hapus">
                <div class="modal-body">
                    <input type="hidden" name="tanggal_hapus" id="tanggal_hapus" value="">
                    Yakin hapus semua kinerja pada tanggal <strong><span id="tanggal"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-danger" type="submit" name="submit" value="Hapus">
                </div>
            </form>
        </div>
    </div>
</div>


