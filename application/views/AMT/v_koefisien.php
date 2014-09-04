<script type="text/javascript">
    $(document).ready(function() {

        $("#commentForm").submit(function(e) {
            var isvalidate = $("#commentForm").valid();
            if (isvalidate)
            {
//                $("#PreviewTambahKoefisien").hide();
//                $("#PreviewTambahKoefisien").fadeIn("slow");
                document.getElementById("commentForm").submit();
            }
            e.preventDefault();
        });

        $("#signupForm").submit(function(e) {
            var isvalidate = $("#signupForm").valid();
            if (isvalidate)
            {
//                $("#PreviewCekKoefisien").hide();
//                $("#PreviewCekKoefisien").slideDown("slow");
//                $("#tgl").html($("#tglForm").val());
                document.getElementById("commentForm").submit();
            }
            e.preventDefault();
        });



    });


    function importTable()
    {
        alert("Berhasil disimpan !");
    }


    function showTambahKoefisien()
    {
        $("#cekkoefisien").hide();
        $("#tambahkoefisien").hide();
        $("#tambahkoefisien").fadeIn("slow");
        $("#PreviewCekKoefisien").hide();
        $("#PreviewTambahKoefisien").hide();
    }

    function showCekKoefisien()
    {
        $("#tambahkoefisien").hide();
        $("#cekkoefisien").hide();
        $("#cekkoefisien").fadeIn("slow");
        $("#PreviewCekKoefisien").hide();
        $("#PreviewTambahKoefisien").hide();
    }

</script>



<section id="main-content">
    <section class="wrapper">
        <section class="panel" id="cekkoefisien">
            <header class="panel-heading">
                Cek Koefisien Performansi   
                <div style="float:right;">
                   <a  data-placement="left" href="<?php echo base_url() ?>amt/import_koefisien/" class="btn btn-primary btn-xs tooltips" data-original-title="Import Koefisien"><i class="icon-plus"></i></a>
                </div></header>

            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="<?php echo base_url() ?>amt/cek_koefisien/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="number" required="required" id="tglForm" class="form-control" maxlength="4" min="2010" placeholder="Tahun" name="tahun">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <?php if ($koefisien) { ?>
            <section class="panel" id="PreviewCekKoefisien">
                <header class="panel-heading">
                    Tabel Koefisien Performansi Tahun <span id="tgl"></span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">

                        <div class="space15"></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Jabatan</th>
                                    <th>Koefisien KM</th>
                                    <th>Koefisien KL</th>
                                    <th>Koefisien Ritase</th>
                                    <th>Koefisien Jumlah SPBU</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php for ($i = 0; $i < count($koefisien) / 4; $i++) { ?>
                                    <tr class="">
                                        <td><?php echo ($i + 1) ?></td>
                                        <td><?php echo $koefisien[$i * 4]->KELOMPOK_PENILAIAN ?></td>
                                        <td><?php echo $koefisien[$i]->NILAI ?></td>
                                        <td><?php echo $koefisien[$i + 1]->NILAI ?></td>
                                        <td><?php echo $koefisien[$i + 2]->NILAI ?></td>
                                        <td><?php echo $koefisien[$i + 3]->NILAI ?></td>
                                        <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php } ?>
    </section>
</section>
<!--main content end-->


<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="get" action="">

                <div class="modal-body">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">

                                <div class="form-group ">
                                    <label for="cbulan" class="control-label col-lg-2">Jenis Jabatan</label>
                                    <div class="col-lg-10">
                                        <input type="text" required="required" id="jabatan" class="form-control"  placeholder="Jenis Jabatan">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cfrm1" class="control-label col-lg-2">Koefisien KM</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cfrm1" name="frm1" minlength="2" type="number" required />
                                    </div>

                                    <label for="cfrm2" class="control-label col-lg-2">Koefisien KL</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cfrm2" name="frm2" minlength="2" type="number" required />
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="cinterpolasi1" class="control-label col-lg-2">Koefisien Rit</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cinterpolasi1" name="interpolasi1" minlength="2" type="number" required />
                                    </div>

                                    <label for="cinterpolasi" class="control-label col-lg-2">Koefisien Jumlah SPBU</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control input-sm m-bot15" id="cinterpolasi2" name="interpolasi2" minlength="2" type="number" required />
                                    </div>
                                </div>


                            </div>
                        </section>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>
