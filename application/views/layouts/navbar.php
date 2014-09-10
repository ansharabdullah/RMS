<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li >
                <a href="<?php echo base_url() ?>"  <?php if ($lv1 == 1) echo "class='active'" ?>>
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a  href="javascript:;" <?php if ($lv1 == 2) echo "class='active'" ?>>
                    <i class="icon-user"></i>
                    <span>Awak Mobil Tangki</span>
                </a>
                <ul class="sub">
                    <li <?php if ($lv2 == 1 && $lv1 == 2) echo "class='active'" ?>><a  href="<?php echo base_url() ?>amt/data_amt"  >Data AMT</a></li>
                    <li <?php if ($lv2 == 2 && $lv1 == 2) echo "class='active'" ?>><a  href="<?php echo base_url() ?>amt/grafik">Grafik</a></li>
                    <li <?php if ($lv2 == 3 && $lv1 == 2) echo "class='active'" ?>><a  href="<?php echo base_url() ?>amt/presensi" >Presensi</a></li>
                    <li <?php if ($lv2 == 4 && $lv1 == 2) echo "class='active'" ?>><a  href="<?php echo base_url() ?>amt/koefisien" >Koefisien</a></li>
                </ul>
            </li>
            

            <li class="sub-menu">
                <a href="javascript:;"  <?php if ($lv1 == 3) echo "class='active'" ?>>
                    <i class="icon-truck"></i>
                    <span>Mobil Tangki</span>
                </a>
                <ul class="sub">
                    <li <?php if ($lv2 == 1 && $lv1 == 3) echo "class='active'" ?>><a  href="<?php echo base_url() ?>mt/data_mt" >Data MT</a></li>
                    <li <?php if ($lv2 == 2 && $lv1 == 3) echo "class='active'" ?>><a  href="<?php echo base_url() ?>mt/grafik_mt/<?php echo $this->session->userdata("id_depot")?>/<?php echo date("Y")?>" >Grafik</a></li>
                    <li <?php if ($lv2 == 3 && $lv1 == 3) echo "class='active'" ?>><a  href="<?php echo base_url() ?>mt/presensi" >Presensi</a></li>
                    <li <?php if ($lv2 == 4 && $lv1 == 3) echo "class='active'" ?>><a  href="<?php echo base_url() ?>mt/reminder" >Reminder</a></li>
                    <li <?php if ($lv2 == 5 && $lv1 == 3) echo "class='active'" ?>><a  href="<?php echo base_url() ?>mt/rencana">Rencana</a></li>
                </ul>
            </li>
            
            <li class="sub-menu">
                <a href="javascript:;"  <?php if ($lv1 == 4) echo "class='active'" ?>>
                    <i class="icon-anchor"></i>
                    <span>APMS</span>
                </a>
                <ul class="sub">
                    <li <?php if ($lv2 == 1 && $lv1 == 4) echo "class='active'" ?>><a  href="#" >Data APMS</a></li>
                    <li <?php if ($lv2 == 2 && $lv1 == 4) echo "class='active'" ?>><a  href="#" >Grafik</a></li>
                    <li <?php if ($lv2 == 3 && $lv1 == 4) echo "class='active'" ?>><a  href="#" >Presensi</a></li>
                    <li <?php if ($lv2 == 4 && $lv1 == 4) echo "class='active'" ?>><a  href="#" >Reminder</a></li>
                    <li <?php if ($lv2 == 5 && $lv1 == 4) echo "class='active'" ?>><a  href="#">Rencana</a></li>
                </ul>
            </li>
            
            <li>
                <a  href="<?php echo base_url() ?>kinerja"  <?php if ($lv1 == 5) echo "class='active'" ?>>
                    <i class="icon-briefcase"></i>
                    <span>Kinerja</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>jadwal"  <?php if ($lv1 == 6) echo "class='active'" ?>>
                    <i class="icon-calendar"></i>
                    <span>Penjadwalan</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;"  <?php if ($lv1 == 7) echo "class='active'" ?>>
                    <i class="icon-tasks"></i>
                    <span>Laporan</span>
                </a>
                <ul class="sub">
                    <li <?php if ($lv2 == 1 && $lv1 == 7) echo "class='active'" ?>><a  href="#">Harian</a></li>
                    <li <?php if ($lv2 == 2 && $lv1 == 7) echo "class='active'" ?>><a  href="#">10 Hari</a></li>
                    <li <?php if ($lv2 == 3 && $lv1 == 7) echo "class='active'" ?>><a  href="#">Bulanan</a></li>
                    <li <?php if ($lv2 == 4 && $lv1 == 7) echo "class='active'" ?>><a  href="#">Triwulan</a></li>
                    <li <?php if ($lv2 == 5 && $lv1 == 7) echo "class='active'" ?>><a  href="#">Tahunan</a></li>
                </ul>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>log"  <?php if ($lv1 == 8) echo "class='active'" ?>>
                    <i class="icon-list-ul"></i>
                    <span>Log Sistem</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>pengaturan"  <?php if ($lv1 == 9) echo "class='active'" ?>>
                    <i class="icon-group"></i>
                    <span>Pengaturan User</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
