<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Depot 1
                    </header>
                    <div class="panel-body" >
                        <?php $attr = array("class"=>"cmxform form-horizontal tasi-form");
                            echo form_open("depot/changeGrafikBulan/",$attr);
                        ?>

                            <div class="form-group">
                                <div class="col-lg-2">
                                    <select class="form-control m-bot2"  id="depot" name="depot">

                                        <option value="">Depot 1</option>
                                        <option value="">Depot 2</option>
                                        <option value="">Depot 3</option>
                                        <option value="">Depot 4</option>
                                        <option value="">Depot 5</option>
                                       
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot2"  id="jenis" name="indikator">

                                        <option value="1">Rencana pengiriman vs realisasi (MS2 Compliance)</option>
                                        <option value="2">Rencana volume angkutan vs realisasi</option>
                                        <option value="3">Laporan tagihan ongkos angkut </option>
                                        <option value="4">Customer  Satisfaction (Lembaga Penyalur)</option>
                                        <option value="5">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</option>
                                        <option value="6">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</option>
                                        <option value="7">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</option>
                                        <option value="8">Number of Incidents</option>
                                        <option value="9">Waktu penyelesaian Incidents</option>
                                        <option value="10">Number of Accident</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="tahun" data-mask="9999" name="tahun" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
                        <!--<div class="btn-group pull-left">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter<i class="icon-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-left">
                                <li><a href="#" onclick="">Rencana pengiriman vs realisasi (MS2 Compliance)</a></li>
                                <li><a href="#" onclick="">Rencana volume angkutan vs realisasi</a></li>
                                <li><a href="#" onclick="">Laporan tagihan ongkos angkut </a></li>
                                <li><a href="#" onclick="">Customer  Satisfaction (Lembaga Penyalur)</a></li>
                                <li><a href="#" onclick="">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</a></li>
                                <li><a href="#" onclick="">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</a></li>
                                <li><a href="#" onclick="">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</a></li>
                                <li><a href="#" onclick="">Number of Incidents</a></li>
                                <li><a href="#" onclick="">Waktu penyelesaian Incidents</a></li>
                                <li><a href="#" onclick="">Number of Accident</a></li>
                            </ul>
                        </div>-->
                        <br/><br/>