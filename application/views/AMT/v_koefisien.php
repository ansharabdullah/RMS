<script type="text/javascript">
    $( document ).ready(function() {
        $("#tambahkoefisien").hide();
        $("#PreviewTambahKoefisien").hide();
        $("#PreviewCekKoefisien").hide();
        
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {    
                $("#PreviewTambahKoefisien").hide();
                $("#PreviewTambahKoefisien").fadeIn("slow");
            }
            e.preventDefault();
        });
        
        $("#signupForm").submit(function(e){
            var isvalidate=$("#signupForm").valid();
            if(isvalidate)
            {    
                $("#PreviewCekKoefisien").hide();
                $("#PreviewCekKoefisien").slideDown("slow");
                $("#tgl").html($("#tglForm").val());
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

        <section class="panel">
            <header class="panel-heading">
                Koefisien Performansi Awak Mobil Tangki
            </header>
            <div class="panel-body">
                <a class="btn btn-primary" onclick="showTambahKoefisien()">
                    Tambah Koefisien <i class="icon-plus"></i>
                </a>

                <a class="btn btn-warning" onclick="showCekKoefisien()">
                    Lihat Koefisien <i class="icon-check"></i>
                </a>
            </div>
        </section>


        <section class="panel" id="tambahkoefisien">
            <header class="panel-heading">
                Tambah Koefisien Performansi
                <a style="float:right;" data-placement="left" class="btn btn-success btn-xs tooltips" data-original-title="Download Format" onclick="downloadCsv()"><i class="icon-download-alt"></i></a>
            </header>
            <div class="panel-body" id="tambahJadwal">
                <div class="clearfix" >

                    <form class="cmxform form-horizontal tasi-form" id="commentForm">
                        <div class="form-group">
                            <label for="tanggalSIOD" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                            <div class="col-lg-10">
                                <input type="number" min="2000" maxlength="4" required="required" id="tanggalSIOD" class="form-control"  placeholder="Tahun" name="tanggalSIOD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fileSIOD" class="col-lg-2 col-sm-2 control-label">File Jadwal</label>
                            <div class="col-lg-10">
                                <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File SIOD" name="fileSIOD">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" style="float: right;" class="btn btn-danger" value="Upload">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="panel" id="PreviewTambahKoefisien">
            <header class="panel-heading">
                Data Koefisien Performansi
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table " style="overflow-x: scroll">

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
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td>1</td>
                                <td>Supir 8 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>

                            </tr>

                            <tr class="">
                                <td>2</td>
                                <td>Supir 16 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>
                            <tr class="">
                                <td>3</td>
                                <td>Supir 24 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>
                            <tr class="">
                                <td>4</td>
                                <td>Supir 32 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>

                            <tr class="">
                                <td>5</td>
                                <td>Supir 40 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>

                            <tr class="">
                                <td>6</td>
                                <td>Kernet 8 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>

                            <tr class="">
                                <td>7</td>
                                <td>Kernet 16 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>
                            <tr class="">
                                <td>8</td>
                                <td>Kernet 24 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>
                            <tr class="">
                                <td>9</td>
                                <td>Kernet 32 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>

                            <tr class="">
                                <td>10</td>
                                <td>Kernet 40 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <button style="float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan</button>
            </div>            
        </section>

        <section class="panel" id="cekkoefisien">
            <header class="panel-heading">
                Cek Koefisien Performansi
            </header>

            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="number" required="required" id="tglForm" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-warning">Cek</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>


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

                            <tr class="">
                                <td>1</td>
                                <td>Supir 8 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>

                            </tr>

                            <tr class="">
                                <td>2</td>
                                <td>Supir 16 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>
                            <tr class="">
                                <td>3</td>
                                <td>Supir 24 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>
                            <tr class="">
                                <td>4</td>
                                <td>Supir 32 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>

                            <tr class="">
                                <td>5</td>
                                <td>Supir 40 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>

                            <tr class="">
                                <td>6</td>
                                <td>Kernet 8 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>

                            <tr class="">
                                <td>7</td>
                                <td>Kernet 16 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>
                            <tr class="">
                                <td>8</td>
                                <td>Kernet 24 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>
                            <tr class="">
                                <td>9</td>
                                <td>Kernet 32 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>

                            <tr class="">
                                <td>10</td>
                                <td>Kernet 40 KL</td>
                                <td>287.338328122519</td>
                                <td>59.9079634056085</td>
                                <td>56.6036240949695</td>
                                <td>41.7288794993981</td>
                                <td><a data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

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
