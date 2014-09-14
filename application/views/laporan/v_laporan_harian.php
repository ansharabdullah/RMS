<script type="text/javascript">
    $(document).ready(function() {
        var d = new Date();
        var j;
        if (d.getMonth() < 10) {
            j = d.getFullYear() + "-0" + (d.getMonth() + 1);
        } else {
            j = d.getFullYear() + "-" + (d.getMonth() + 1);
        }
        $("#blnPilih").val(j);
        settingBulan();

        $("#commentForm").submit(function(e) {
            if ($("#commentForm").valid())
            {
                $("#laporan_harian").modal('show');
            }
            e.preventDefault();
        });
    });

    function settingBulan() {
        var data = $("#blnPilih").val();
        var tahun = data[0] + data[1] + data[2] + data[3];
        var bulan = data[5] + data[6];
        var judul = "error";
        var tgl_akhir = 0;
        if (bulan == 1) {
            judul = "Januari " + tahun;
            tgl_akhir = 31;
        } else if (bulan == 2) {
            judul = "Februari " + tahun;
            if (tahun % 4 == 0) {
                tgl_akhir = 29;
            } else {
                tgl_akhir = 28;
            }
        } else if (bulan == 3) {
            judul = "Maret " + tahun;
            tgl_akhir = 31;
        } else if (bulan == 4) {
            judul = "April " + tahun;
            tgl_akhir = 30;
        } else if (bulan == 5) {
            judul = "Mei " + tahun;
            tgl_akhir = 31;
        } else if (bulan == 6) {
            judul = "Juni " + tahun;
            tgl_akhir = 30;
        } else if (bulan == 7) {
            judul = "Juli " + tahun;
            tgl_akhir = 31;
        } else if (bulan == 8) {
            judul = "Agustus " + tahun;
            tgl_akhir = 31;
        } else if (bulan == 9) {
            judul = "September " + tahun;
            tgl_akhir = 30;
        } else if (bulan == 10) {
            judul = "Oktober " + tahun;
            tgl_akhir = 31;
        } else if (bulan == 11) {
            judul = "November " + tahun;
            tgl_akhir = 30;
        } else if (bulan == 12) {
            judul = "Desember " + tahun;
            tgl_akhir = 31;
        }

        $("#titleBulan").html(judul);
        for (var i = 0; i < tgl_akhir; i++) {
            $("#bln" + (i+1)).html((i+1)+ " " +judul);
            $("#cekbln" + (i+1)).show();
        }
        for (var i = tgl_akhir; i <= 31; i++) {
            $("#bln" + (i+1)).html("");
            $("#cekbln" + (i+1)).hide();
        }

    }

</script>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Laporan Harian
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" action="#" role="form" id="commentForm" method="post">
                    <div class="form-group" id="tanggal">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" name="tanggal" required="required" id="blnPilih" onchange="settingBulan()" class="form-control"/>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Ceklis</th>
                                <th>Tanggal</th>
                                <th>Ceklis</th>
                                <th>Tanggal</th>
                                <th>Ceklis</th>
                                <th>Tanggal</th>
                                <th>Ceklis</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="bln1" id="cekbln1"></td>
                                <td><span id="bln1"></span></td>
                                <td><input type="checkbox" name="bln11" id="cekbln11"></td>
                                <td><span id="bln11"></span></td>
                                <td><input type="checkbox" name="bln21" id="cekbln21"></td>
                                <td><span id="bln21"></span></td>
                                <td><input type="checkbox" name="bln31" id="cekbln31"></td>
                                <td><span id="bln31"></span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln2" id="cekbln2"></td>
                                <td><span id="bln2"></span></td>
                                <td><input type="checkbox" name="bln12" id="cekbln12"></td>
                                <td><span id="bln12"></span></td>
                                <td><input type="checkbox" name="bln22" id="cekbln22"></td>
                                <td><span id="bln22"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln3" id="cekbln3"></td>
                                <td><span id="bln3"></span></td>
                                <td><input type="checkbox" name="bln13" id="cekbln13"></td>
                                <td><span id="bln13"></span></td>
                                <td><input type="checkbox" name="bln23" id="cekbln23"></td>
                                <td><span id="bln23"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln4" id="cekbln4"></td>
                                <td><span id="bln4"></span></td>
                                <td><input type="checkbox" name="bln14" id="cekbln14"></td>
                                <td><span id="bln14"></span></td>
                                <td><input type="checkbox" name="bln24" id="cekbln24"></td>
                                <td><span id="bln24"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln5" id="cekbln5"></td>
                                <td><span id="bln5"></span></td>
                                <td><input type="checkbox" name="bln15" id="cekbln15"></td>
                                <td><span id="bln15"></span></td>
                                <td><input type="checkbox" name="bln25" id="cekbln25"></td>
                                <td><span id="bln25"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln6" id="cekbln6"></td>
                                <td><span id="bln6"></span></td>
                                <td><input type="checkbox" name="bln16" id="cekbln16"></td>
                                <td><span id="bln16"></span></td>
                                <td><input type="checkbox" name="bln26" id="cekbln26"></td>
                                <td><span id="bln26"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln7" id="cekbln7"></td>
                                <td><span id="bln7"></span></td>
                                <td><input type="checkbox" name="bln17" id="cekbln17"></td>
                                <td><span id="bln17"></span></td>
                                <td><input type="checkbox" name="bln27" id="cekbln27"></td>
                                <td><span id="bln27"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln8" id="cekbln8"></td>
                                <td><span id="bln8"></span></td>
                                <td><input type="checkbox" name="bln18" id="cekbln18"></td>
                                <td><span id="bln18"></span></td>
                                <td><input type="checkbox" name="bln28" id="cekbln28"></td>
                                <td><span id="bln28"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln9" id="cekbln9"></td>
                                <td><span id="bln9"></span></td>
                                <td><input type="checkbox" name="bln19" id="cekbln19"></td>
                                <td><span id="bln19"></span></td>
                                <td><input type="checkbox" name="bln29" id="cekbln29"></td>
                                <td><span id="bln29"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bln10" id="cekbln10"></td>
                                <td><span id="bln10"></span></td>
                                <td><input type="checkbox" name="bln20" id="cekbln20"></td>
                                <td><span id="bln20"></span></td>
                                <td><input type="checkbox" name="bln30" id="cekbln30"></td>
                                <td><span id="bln30"></span></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>                    
                </form>
            </div>
        </section>


        <!-- page end-->
    </section>
</section>

<div class="modal fade" id="laporan_harian" role="modal" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:90%">
        <div class="modal-content">
            <iframe src="http://view.officeapps.live.com/op/view.aspx?src=oscrms.com/RMS/assets/file/Hasil Generate.xls" width="100%" height="600" style="border: none;"></iframe>
        </div>
    </div>
</div>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();

    });

</script>
