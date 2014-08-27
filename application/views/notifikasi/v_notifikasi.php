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
            for ($i = 0; $i < sizeof($logHarian); $i++) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <?php
                                echo "<b>&nbsp;&nbsp;".date_format(date_create($logHarian[$i]->tanggal),'d-M-y')."</b><hr/><br/>";
                                //cek jadwal
                                if ($logHarian[$i]->jadwal == 0) {
                                
                                echo"<a href='#'>
                                        <span class='label label-success'><i class='icon-calendar'></i></span>
                                       Data Penjadwalan belum ada.
                                        </a><br/><br/>";
                                }
                                //cek kinerja
                                if ($logHarian[$i]->input_kinerja == 0) {
                                
                                echo" <a href='#'>
                                        <span class='label label-warning'><i class='icon-briefcase'></i></span>
                                         Data kinerja belum ada.
                                        </a><br/><br/>";
                                }
                                //cek ms2
                                if ($logHarian[$i]->ms2 == 0) {
                                
                                echo" <a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                         MS2 belum diisi.
                                        </a><br/><br/>";
                                }
                                //cek kpi_operasional
                                if ($logHarian[$i]->kpi_operasional == 0) {
                                
                                echo"<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Operasional belum ada.
                                        </a><br/><br/>";
                                }
                                //cek kpi_internal
                                if ($logHarian[$i]->kpi_internal == 0) {
                                
                                echo"<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                        Data KPI Internal belum ada.
                                        </a><br/><br/>";
                                }

                                //cek interpolasi
                                if ($logHarian[$i]->interpolasi == 0) {
                                
                                echo"<a href='#'>
                                        <span class='label label-danger'><i class='icon-bolt'></i></span>
                                      Data Tarif Interpolasi belum ada.
                                        </a><br/><br/>";
                                }
                                //cek ba
                                if ($logHarian[$i]->ba == 0) {
                                
                                echo"<a href='#'>
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