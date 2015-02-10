<!--header start-->
<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <!--logo start-->
    <a href="<?php echo base_url() ?>" class="logo">OSC<span>RMS</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">MT
                    <i class="icon-tasks"></i>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">Kinerja MT</p>
                    </li>
                    <?php if($rencana_bulan[0]->r_premium > 0){?>
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
                                <div class="percent"><?php
                                $pertamax_plus = 0;
                                if(sizeof($rencana_bulan) == 0 ){
                                	echo "0";
                                }else if($rencana_bulan[0]->r_pertamina_dex == 0){
                               	 echo "0";
                                }else{
                                echo ceil(($kinerja_bulan[0]->pertamax_plus / $rencana_bulan[0]->r_pertamax_plus) * 100);
                                $pertamax_plus = ceil(($kinerja_bulan[0]->pertamax_plus / $rencana_bulan[0]->r_pertamax_plus) * 100);
                                }
                                 ?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pertamax_plus;?>%">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Pertamax Dex</div>
                                <div class="percent"><?php 
                                
                                $pertamax_dex = 0;
                                if(sizeof($rencana_bulan) == 0 ){
                                	echo "0";
                                }else if($rencana_bulan[0]->r_pertamina_dex == 0){
                               	 echo "0";
                                }else{
                                echo ceil(($kinerja_bulan[0]->pertamina_dex / $rencana_bulan[0]->r_pertamina_dex) * 100);
                                $pertamax_dex = ceil(($kinerja_bulan[0]->pertamina_dex / $rencana_bulan[0]->r_pertamina_dex) * 100);
                                }
                                 ?> %</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pertamax_dex;?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Solar</div>
                                <div class="percent"><?php 
                                
                                $solar = 0;
                                if(sizeof($rencana_bulan) == 0 ){
                                	echo "0";
                                }else if($rencana_bulan[0]->r_solar== 0){
                               	 echo "0";
                                }else{
                                echo ceil(($kinerja_bulan[0]->solar / $rencana_bulan[0]->r_solar) * 100);
                                $solar = ceil(($kinerja_bulan[0]->solar / $rencana_bulan[0]->r_solar) * 100);
                                }
                                 ?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $solar;?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Bio Solar</div>
                                <div class="percent"><?php
                                $bio_solar = 0; 
                                if(sizeof($rencana_bulan) == 0 ){
                                	echo "0";
                                }else if($rencana_bulan[0]->r_bio_solar == 0){
                                echo "0";
                                }else{
                                echo ceil(($kinerja_bulan[0]->bio_solar / $rencana_bulan[0]->r_bio_solar) * 100);
                                $bio_solar = ceil(($kinerja_bulan[0]->bio_solar / $rencana_bulan[0]->r_bio_solar) * 100);
                                }
                                ?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $bio_solar;?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Kilo Liter Own Use</div>
                                <div class="percent"><?php
                                $own_use = 0;
                                if(sizeof($rencana_bulan) == 0 ){
                                	echo "0";
                                }else if($rencana_bulan[0]->r_own_use == 0){
                                echo "0";
                                }else{
                                 echo ceil(($kinerja_bulan[0]->own_use / $rencana_bulan[0]->r_own_use) * 100);
                                 $own_use = ceil(($kinerja_bulan[0]->own_use / $rencana_bulan[0]->r_own_use) * 100);
                                }
                                ?>%</div>
                            </div>
                            <div class="progress progress-striped progress-sm active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $own_use;?>%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php }
                    else
                    {
                        echo " <li><div class='task-info' style='padding:10px;'><span class='btn btn-danger' > <i class='icon-exclamation-sign'></i> Data rencana belum </br>tersedia</span> </div></li>";
                    }
                    ?>
                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">AMT
                    <i class="icon-envelope-alt"></i>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">Kinerja AMT</p>
                    </li>
                    
                    <?php if(isset($kinerja_amt_bulan)){?>
                        <li>
                            <a>
                                <div class="task-info">
                                    <div class="desc">Kilo Meter (<?php echo $kinerja_amt_bulan[0]->total_km?> KM)</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a>
                                <div class="task-info">
                                    <div class="desc">Kilo Liter (<?php echo $kinerja_amt_bulan[0]->total_kl?> KL)</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a>
                                <div class="task-info">
                                    <div class="desc">Ritase (<?php echo $kinerja_amt_bulan[0]->ritase?> Rit)</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a>
                                <div class="task-info">
                                    <div class="desc">SPBU (<?php echo $kinerja_amt_bulan[0]->spbu?>)</div>
                                </div>
                            </a>
                        </li>
                       <?php } ?>
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
                    
                    <li>
                        <a href="<?php echo base_url()?>notifikasi/"><b>Lihat Semua Peringatan </b></a>
                    </li>
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
					<?php if($this->session->userdata('id_role') == 1){?>
						<li><a href="<?php echo base_url() ?>../documentation_oam/"><i class=" icon-info-sign"></i> Panduan</a></li>
					<?php }else{?>
						<li><a href="<?php echo base_url() ?>../documentation/"><i class=" icon-info-sign"></i> Panduan</a></li>
					<?php }?>
                    <li><a href="<?php echo base_url() ?>login/logout"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>