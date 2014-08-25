<!--header start-->
<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <!--logo start-->
    <a href="<?php echo base_url() ?>" class="logo">RMS <span>Patra Niaga</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">MT
                    <i class="icon-tasks"></i>
                    <span class="badge bg-success">6</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">Progess Bar MT</p>
                    </li>
                    <?php if(isset($kinerja_bulan)){?>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Premium</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->premium / $rencana_bulan[0]->r_premium) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->premium / $rencana_bulan[0]->r_premium) * 100)?>%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Pertamax</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->pertamax / $rencana_bulan[0]->r_pertamax) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax / $rencana_bulan[0]->r_pertamax) * 100)?>%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Pertamax Plus</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->pertamax_plus / $rencana_bulan[0]->r_pertamax_plus) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamax_plus / $rencana_bulan[0]->r_pertamax_plus) * 100)?>%">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Pertamax Dex</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->pertamina_dex / $rencana_bulan[0]->r_pertamina_dex) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->pertamina_dex / $rencana_bulan[0]->r_pertamina_dex) * 100)?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Solar</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->solar / $rencana_bulan[0]->r_solar) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->solar / $rencana_bulan[0]->r_solar) * 100)?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Bio Solar</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->bio_solar / $rencana_bulan[0]->r_bio_solar) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->bio_solar / $rencana_bulan[0]->r_bio_solar) * 100)?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Own Use</div>
                                <div class="percent"><?php echo ceil(($kinerja_bulan[0]->own_use / $rencana_bulan[0]->r_own_use) * 100)?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($kinerja_bulan[0]->own_use / $rencana_bulan[0]->r_own_use) * 100)?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">AMT
                    <i class="icon-envelope-alt"></i>
                    <span class="badge bg-important">5</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">Progress Bar AMT</p>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Meter</div>
                                <div class="percent">40%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter</div>
                                <div class="percent">60%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Ritase</div>
                                <div class="percent">87%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kehadiran</div>
                                <div class="percent">33%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">Lihat Semua Progress</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
            <li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    Peringatan
                    <i class="icon-warning-sign"></i>
                    <span class="badge bg-warning"><?php if (isset($total_notifikasi))
    echo $total_notifikasi ?></span>
                </a>
                <ul class="dropdown-menu extended notification" >
                    <div class="notify-arrow notify-arrow-yellow"></div>
                    <div style="width:auto;">
                    <li>
                        <p class="yellow">Peringatan</p>
                    </li>
                    </div>
                    <div style="height: 400px;width:auto;overflow-y: scroll;">
                    <?php
                    if (isset($notifikasi)) {
                        for ($i = 0; $i < sizeof($notifikasi); $i++) {
                    ?>
                            <li>
                                <?php echo $notifikasi[$i] ?>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    </div>
                </ul>
            </li>
            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img height="30"  width="30" alt="" src="<?php echo base_url() ?>/assets/img/photo/<?php echo $this->session->userdata('photo') ?>">
                    <span class="username"><?php echo $this->session->userdata('nama_pegawai') ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended">
                    <div class="log-arrow-up"></div>
                    <li><a href="<?php echo base_url() ?>user/"><i class=" icon-suitcase"></i> Profile</a></li>
                    <li><a href="<?php echo base_url() ?>login/logout"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>