<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="<?php echo base_url() ?>">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-user"></i>
                    <span>Awak Mobil Tangki</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo base_url()?>amt/data_amt">Data AMT</a></li>
                    <li class="sub-menu">
                        <a  href="javascript:;">Kinerja</a>
                        <ul class="sub">
                            <li><a  href="<?php echo base_url()?>amt/kinerja">Input Manual</a></li>
                            <li><a  href="<?php echo base_url()?>amt/kinerja_siod">Import SIOD</a></li>
                        </ul>
                    </li>
                    <li><a  href="<?php echo base_url()?>amt/grafik">Grafik</a></li>
                    <li><a  href="<?php echo base_url()?>amt/presensi">Presensi</a></li>
                    <li><a  href="<?php echo base_url()?>amt/laporan">Laporan</a></li>
                    <li><a  href="#">Rencana</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-truck"></i>
                    <span>Mobil Tangki</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo base_url()?>index.php/mt/data_mt">Data MT</a></li>
                    <li class="sub-menu">
                        <a  href="javascript:;">Kinerja</a>
                        <ul class="sub">
                            <li><a  href="<?php echo base_url()?>mt/kinerja_manual">Input Manual</a></li>
                            <li><a  href="<?php echo base_url()?>mt/kinerja_siod">Import SIOD</a></li>
                        </ul>
                    </li>
                    <li><a  href="#">Grafik</a></li>
                    <li><a  href="#">Presensi</a></li>
                    <li><a  href="<?php echo base_url()?>mt/laporan">Laporan</a></li>
                    <li><a  href="<?php echo base_url()?>mt/pengingat">Reminder</a></li>
                    <li><a  href="#">Rencana</a></li>
                </ul>
            </li>
            <li>
                <a href="#" >
                    <i class="icon-calendar"></i>
                    <span>Penjadwalan</span>
                </a>
            </li>
            <li>
                <a href="#" >
                    <i class="icon-check"></i>
                    <span>BA dan KPI</span>
                </a>
            </li>
            <li>
                <a href="#" >
                    <i class="icon-group"></i>
                    <span>Pengaturan User</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
