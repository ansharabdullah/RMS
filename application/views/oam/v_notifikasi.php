<section id="main-content">
    <section class="wrapper">
        <!-- page start-->


        <section class="panel">
            <header class="panel-heading">
                <i class="icon-warning-sign"></i> NOTIFIKASI PERINGATAN
            </header>
        </section>
        <?php
        if (isset($notifikasi)) {
            $id_depot = "";
            for ($i = 0; $i < sizeof($logHarian); $i++) {
                if ($logHarian[$i]['notifikasi'] == 1) {
                    if ($id_depot != $logHarian[$i]['id_depot']) {
                        ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                        <header class="panel-heading">
                                        <?php
                                                if( $logHarian[$i]['id_depot'] > 0) {
                                                    echo"<i class='icon-building'></i>&nbsp;DEPOT " . $logHarian[$i]['depot'] . "";
                                                }
                                                else
                                                {
                                                     echo"<i class='icon-building'></i>&nbsp;" . $logHarian[$i]['depot'] . "";
                                                }
                                                $id_depot = $logHarian[$i]['id_depot'];
                                                ?>
                                           </header>
                                    <div class="panel-body">
                                                <?php
                                            }
                                            echo "<br/><b>" .strftime('%d %B %Y',strtotime($logHarian[$i]['tanggal'])). "</b><br/><br/>";
                                            
                                            //cek kpi oam
                                            if($logHarian[$i]['id_depot'] < 0)
                                            { 
                                                if ($logHarian[$i]['kpi_oam'] == 0) 
                                                {
                                                 echo "<a href='".base_url()."kpi/internal/".$logHarian[$i]['tahun']."/5'><span class='label label-warning'><i class='icon-check'></i></span>
                                                   KPI OAM belum dibuat.</a><br/><br/>";
                                                }
                                            }
                                            else
                                            {
                                            
                                                //cek jadwal
                                                if ($logHarian[$i]['jadwal'] == 0) {

                                                    echo "<span class='label label-success'><i class='icon-calendar'></i></span>
                                                       Data Penjadwalan belum ada.
                                                        <br/><br/>";
                                                }
                                                 //cek presensi AMT
                                                if ($logHarian[$i]['presensi_amt'] == 0) {

                                                    echo "<span class='label label-primary'><i class='icon-user'></i></span>
                                                       Presensi AMT belum dilakukan.
                                                        <br/><br/>";
                                                }
                                                 //cek presensi MT
                                                if ($logHarian[$i]['presensi_mt'] == 0) {

                                                    echo "<span class='label label-primary'><i class='icon-truck'></i></span>
                                                       Presensi MT belum dilakukan.
                                                        <br/><br/>";
                                                }
                                                 //cek rencana
                                                if ($logHarian[$i]['rencana'] == 0) {

                                                    echo "<span class='label label-danger'><i class='icon-truck'></i></span>
                                                       Data Rencana MT belum ada.
                                                        <br/><br/>";
                                                }
                                                //cek kinerja
                                                if ($logHarian[$i]['input_kinerja'] == 0) {

                                                    echo " <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                                             Data kinerja belum ada.
                                                            <br/><br/>";
                                                }
                                                //cek ms2
                                                if ($logHarian[$i]['ms2'] == 0) {

                                                    echo " <span class='label label-danger'><i class='icon-bolt'></i></span>
                                                         MS2 belum diisi.
                                                        <br/><br/>";
                                                }
                                                //cek kpi_operasional
                                                if ($logHarian[$i]['kpi_operasional'] == 0) {

                                                    echo "<span class='label label-danger'><i class='icon-bolt'></i></span>
                                                        Data KPI Operasional belum ada.
                                                        <br/><br/>";
                                                }
                                                //cek kpi_internal
                                                if ($logHarian[$i]['kpi_internal'] == 0) {

                                                    echo "<span class='label label-danger'><i class='icon-bolt'></i></span>
                                                        Data KPI Internal belum ada.
                                                        <br/><br/>";
                                                }
                                                
                                                //cek koefisien
                                                if ($logHarian[$i]['koefisien'] == 0) {

                                                    echo "<span class='label label-danger'><i class='icon-bolt'></i></span>
                                                      Data Koefisien belum ada.
                                                        <br/><br/>";
                                                }

                                                //cek interpolasi
                                                if ($logHarian[$i]['interpolasi'] == 0) {

                                                    echo "<span class='label label-danger'><i class='icon-bolt'></i></span>
                                                      Data Tarif Interpolasi belum ada.
                                                        <br/><br/>";
                                                }
                                                //cek ba
//                                                if ($logHarian[$i]['ba'] == 0) {
//
//                                                    echo "<span class='label label-warning'><i class='icon-check'></i></span>
//                                                      Berita Acara belum dibuat.
//                                                        <br/><br/>";
//                                                }
                                                
                                                 //cek kuota apms
                                                if ($logHarian[$i]['kuota_apms'] == 0) {

                                                    echo "<span class='label label-warning'><i class='icon-check'></i></span>
                                                      Kuota APMS belum diisi.
                                                        <br/><br/>";
                                                }
                                                
                                                 //cek kpi apms ba
                                                if ($logHarian[$i]['kpi_apms'] == 0) {

                                                    echo "<span class='label label-warning'><i class='icon-check'></i></span>
                                                      KPI APMS belum diisi.
                                                        <br/><br/>";
                                                }
                                            }
                                            if ($i == sizeof($logHarian)-1 || $id_depot != $logHarian[$i + 1]['id_depot']) {
                                        ?>
                                    </div>
                                </section>
                            </div>
                        </div>
                            <?php
                        }
                    }
                }
            }
            ?>
    </section>
</section>