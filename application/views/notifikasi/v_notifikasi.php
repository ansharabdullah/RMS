<section id="main-content">
    <section class="wrapper">
        <!-- page start-->


        <section class="panel">
            <header class="panel-heading">
                <i class="icon-warning-sign"></i> NOTIFIKASI PERINGATAN
            </header>
        </section>
        <?php
        for ($i = 0; $i < sizeof($logHarian); $i++) {
            if ($logHarian[$i]['notifikasi'] == 1) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <?php
                                echo "<b>&nbsp;&nbsp;" . date_format(date_create($logHarian[$i]['tanggal']), 'd-M-y') . "</b><hr/>";
                                //cek jadwal
                                if ($logHarian[$i]['jadwal'] == 0) {

                                    echo "<a href='".base_url()."jadwal'>
                                        <span class='label label-success'><i class='icon-calendar'></i></span>
                                       Data Penjadwalan belum ada.
                                        </a><br/><br/>";
                                }
                                
                                //cek presensi AMT
                                if ($logHarian[$i]['presensi_amt'] == 0) {

                                    echo "<a href='".base_url()."amt/presensi'><span class='label label-primary'><i class='icon-user'></i></span>
                                       Presensi AMT belum dilakukan.
                                        </a><br/><br/>";
                                }
                                 //cek presensi MT
                                if ($logHarian[$i]['presensi_mt'] == 0) {

                                    echo "<a href='".base_url()."mt/presensi'><span class='label label-primary'><i class='icon-truck'></i></span>
                                       Presensi MT belum dilakukan.
                                        </a><br/><br/>";
                                }
                                 //cek rencana
                                if ($logHarian[$i]['rencana'] == 0) {

                                    echo "<a href='".base_url()."mt/rencana'><span class='label label-danger'><i class='icon-truck'></i></span>
                                       Data Rencana MT belum ada.
                                        </a><br/><br/>";
                                }
                                                
                                //cek kinerja
                                if ($logHarian[$i]['input_kinerja'] == 0) {

                                    echo " <a href='".base_url()."kinerja'>
                                            <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                             Data kinerja belum ada.
                                            </a> <br/><br/>";
                                }
                                //cek ms2
                                if ($logHarian[$i]['ms2'] == 0) {

                                    echo " <a href='".base_url()."ba/ms2'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                         MS2 belum diisi.
                                        </a><br/><br/>";
                                }
                                //cek kpi_operasional
                                if ($logHarian[$i]['kpi_operasional'] == 0) {

                                    echo "<a href='".base_url()."kpi_operasional'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Operasional belum ada.
                                        </a><br/><br/>";
                                }
                                //cek kpi_internal
                                if ($logHarian[$i]['kpi_internal'] == 0) {

                                    echo "<a href='".base_url()."kpi_internal'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Internal belum ada.
                                        </a><br/><br/>";
                                }

                                //cek koefisien
                                if ($logHarian[$i]['koefisien'] == 0) {

                                    echo "<a href='".base_url()."kpi_internal'><span class='label label-danger'><i class='icon-bolt'></i></span>
                                      Data Koefisien belum ada.
                                        </a><br/><br/>";
                                }
                                //cek interpolasi
                                if ($logHarian[$i]['interpolasi'] == 0) {

                                    echo "<a href='".base_url()."frm'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                      Data Tarif Interpolasi belum ada.
                                        </a><br/><br/>";
                                }
                                //cek ba
                                if ($logHarian[$i]['ba'] == 0) {

                                    echo "<a href='".base_url()."ba/berita_acara'>
                                        <span class='label label-warning'><i class='icon-check'></i></span>
                                      Berita Acara belum dibuat.
                                        </a><br/><br/>";
                                }
                                ?>
                            </div>
                        </section>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </section>
</section>