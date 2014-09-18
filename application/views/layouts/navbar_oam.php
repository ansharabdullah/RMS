<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li >
                <a href="<?php echo base_url() ?>home/home_oam"  <?php if ($lv1 == 1) echo "class='active'" ?>>
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
            $level = 2;
            for ($i = 0; $i < sizeof($depot); $i++) {
                ?>
                <li class="sub-menu">
                    <a  href="javascript:;" <?php if ($lv1 == $level) echo "class='active'" ?>>
                        <i class="icon-building"></i>
                        <span>Depot <?php echo $depot[$i]->NAMA_DEPOT ?></span>
                    </a>
                    <ul class="sub">
                        <li <?php if ($lv2 == 1 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>depot/amt_depot/<?php echo $depot[$i]->ID_DEPOT ?>/<?php echo $depot[$i]->NAMA_DEPOT?>/<?php echo date("Y")?>">AMT</a></li>
                        <li <?php if ($lv2 == 2 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>depot/mt_depot/<?php echo $depot[$i]->ID_DEPOT ?>/<?php echo $depot[$i]->NAMA_DEPOT?>/<?php echo date("Y")?>">MT</a></li>
                        <li <?php if ($lv2 == 3 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>depot/grafik_bulan/<?php echo $depot[$i]->ID_DEPOT ?>/<?php echo date('Y')?>" >KPI Operasional</a></li>
                        <li <?php if ($lv2 == 4 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>depot/kpi_internal/<?php echo $depot[$i]->ID_DEPOT ?>">KPI Internal</a></li>
                        <li <?php if ($lv2 == 5 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>depot/apms_depot/<?php echo $depot[$i]->ID_DEPOT ?>/<?php echo $depot[$i]->NAMA_DEPOT?>/<?php echo date("Y")?>" >APMS</a></li>
                    </ul>
                </li>
                <?php
                $level++;
            }
            ?>
            <li class="sub-menu">
                <a  href="javascript:;" <?php if ($lv1 == $level) echo "class='active'" ?>>
                    <i class="icon-check"></i><span>KPI OAM</span>
                </a>
                <ul class="sub">
                    <li <?php if ($lv2 == 1 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>kpi/operasional"  >Operasional</a></li>
                    <li <?php if ($lv2 == 2 && $lv1 == $level) echo "class='active'" ?>><a  href="<?php echo base_url() ?>#">Internal</a></li>
                </ul>
            </li>
            <?php $level++; ?>
            <li class="sub-menu">
                <a  href="<?php echo base_url()?>presentasi" <?php if ($lv1 == $level) echo "class='active'" ?>>
                    <i class="icon-bar-chart"></i><span>Presentasi Triwulan</span>
                </a>
            </li>
            <?php $level++; ?>
            <li class="sub-menu">
                <a href="<?php echo base_url() ?>pengaturan"  <?php if ($lv1 == 9) echo "class='active'" ?>>
                    <i class="icon-user"></i><span>Pengaturan user</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>