
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel"> 
            <header class="panel-heading">
                KPI Internal OAM
                <a href="<?php echo base_url() ?>kpi/internal_input" type="button" style="float: right;" class="btn btn-xs btn-success" ><i class="icon-plus"></i> Tambah KPI Internal</a>
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url() ?>kpi/gantiTahunKpi/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" name="tahun" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bulanLaporan" class="col-lg-2 col-sm-2 control-label">Jenis</label>
                        <div class="col-lg-10 col-sm-6">
                            <select name="triwulan" id="select_triwulan" class="form-control"> 
                                <option value="1"> Triwulan I </option>
                                <option value="2"> Triwulan II </option>
                                <option value="3"> Triwulan III </option>
                                <option value="4"> Triwulan IV </option>
                                <option value="5"> Total </option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="cek" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="panel"> 
            <header class="panel-heading">
                KPI Internal OAM Tahun <?php echo $tahun ?>

            </header>
            <div class="panel-body">
                <center>
                    <?php
                    if (sizeof($kpi) > 0) {
                        if($triwulan == 1 || $triwulan == 5) {
                            
                        ?>
                        
                        <b>KPI TRIWULAN I</b>
                        <span onclick="editKpi(1)" class="btn btn-warning btn-mini tooltips" data-original-title="Edit KPI" style="float:right;"><i class="icon-pencil"></i></span><br/><br/><br/> 
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td rowspan="2">Indikator Kinerja</td>
                                    <td rowspan="2">Satuan</td>
                                    <td rowspan="2">Frekuensi Monitoring</td>
                                    <td rowspan="2">Bobot %</td>
                                    <td colspan="2"><span id="triwulan">Triwulan I</span></td>
                                    <td colspan="3">Realisasi</td>
                                    <td rowspan="2">RKAP OAM</td>
                                </tr>
                                <tr>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td><span id="bulan_1">Januari</span></td>
                                    <td><span id="bulan_2">Februari</span></td>
                                    <td><span id="bulan_3">Maret</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9"><b>1. Revenue</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW1 ?></td>
                                </tr>
                                <tr>
                                    <td>Revenue Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[0]->BOBOT ?></td>
                                    <td><?php echo $kpi[0]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[0]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][0][0]?></td>
                                    <td><?php echo $realisasi[0][0][1]?></td>
                                    <td><?php echo $realisasi[0][0][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[1]->BOBOT ?></td>
                                    <td><?php echo $kpi[1]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[1]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][1][0]?></td>
                                    <td><?php echo $realisasi[0][1][1]?></td>
                                    <td><?php echo $realisasi[0][1][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>2. Laba Usaha</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW1 ?></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[2]->BOBOT ?></td>
                                    <td><?php echo $kpi[2]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[2]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][2][0]?></td>
                                    <td><?php echo $realisasi[0][2][1]?></td>
                                    <td><?php echo $realisasi[0][2][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Terminal Storage</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[3]->BOBOT ?></td>
                                    <td><?php echo $kpi[3]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[3]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][3][0]?></td>
                                    <td><?php echo $realisasi[0][3][1]?></td>
                                    <td><?php echo $realisasi[0][3][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW1 ?></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Fleet Management</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[4]->BOBOT ?></td>
                                    <td><?php echo $kpi[4]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[4]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][4][0]?></td>
                                    <td><?php echo $realisasi[0][4][1]?></td>
                                    <td><?php echo $realisasi[0][4][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Terminal Storage</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[5]->BOBOT ?></td>
                                    <td><?php echo $kpi[5]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[5]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][5][0]?></td>
                                    <td><?php echo $realisasi[0][5][1]?></td>
                                    <td><?php echo $realisasi[0][5][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>4. Collection Period</b></td> 
                                    <td>by date</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[6]->BOBOT ?></td>
                                    <td><?php echo $kpi[6]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[6]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][6][0]?></td>
                                    <td><?php echo $realisasi[0][6][1]?></td>
                                    <td><?php echo $realisasi[0][6][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>5. Terminal Losses</b></td>
                                </tr>
                                <tr>
                                    <td>Total Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[7]->BOBOT ?></td>
                                    <td><?php echo $kpi[7]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[7]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][7][0]?></td>
                                    <td><?php echo $realisasi[0][7][1]?></td>
                                    <td><?php echo $realisasi[0][7][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Discharge Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[8]->BOBOT ?></td>
                                    <td><?php echo $kpi[8]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[8]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][8][0]?></td>
                                    <td><?php echo $realisasi[0][8][1]?></td>
                                    <td><?php echo $realisasi[0][8][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Working Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[9]->BOBOT ?></td>
                                    <td><?php echo $kpi[9]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[9]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][9][0]?></td>
                                    <td><?php echo $realisasi[0][9][1]?></td>
                                    <td><?php echo $realisasi[0][9][2]?></td>
                                    <td></td>
                                </tr> <tr>
                                    <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 1]->RKAP_OAM_TW1 ?></td>
                                </tr>
                                <tr>
                                    <td>Fleet Management (BBM/BBK)</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[10]->BOBOT ?></td>
                                    <td><?php echo $kpi[10]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[10]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][10][0]?></td>
                                    <td><?php echo $realisasi[0][10][1]?></td>
                                    <td><?php echo $realisasi[0][10][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[11]->BOBOT ?></td>
                                    <td><?php echo $kpi[11]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[11]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][11][0]?></td>
                                    <td><?php echo $realisasi[0][11][1]?></td>
                                    <td><?php echo $realisasi[0][11][2]?></td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <td colspan="10"><b>7. Service Level Agreement</b></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[12]->BOBOT ?></td>
                                    <td><?php echo $kpi[12]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[12]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][12][0]?></td>
                                    <td><?php echo $realisasi[0][12][1]?></td>
                                    <td><?php echo $realisasi[0][12][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (APMS)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[13]->BOBOT ?></td>
                                    <td><?php echo $kpi[13]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[13]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][13][0]?></td>
                                    <td><?php echo $realisasi[0][13][1]?></td>
                                    <td><?php echo $realisasi[0][13][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Gas & Aviation</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[14]->BOBOT ?></td>
                                    <td><?php echo $kpi[14]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[14]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][14][0]?></td>
                                    <td><?php echo $realisasi[0][14][1]?></td>
                                    <td><?php echo $realisasi[0][14][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="10">a. Breakdown Occurences</td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Kelola</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[15]->BOBOT ?></td>
                                    <td><?php echo $kpi[15]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[15]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][15][0]?></td>
                                    <td><?php echo $realisasi[0][15][1]?></td>
                                    <td><?php echo $realisasi[0][15][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Milik</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[16]->BOBOT ?></td>
                                    <td><?php echo $kpi[16]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[16]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][16][0]?></td>
                                    <td><?php echo $realisasi[0][16][1]?></td>
                                    <td><?php echo $realisasi[0][16][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>b. Terminal Storage (BBM/Depot)</td> 
                                    <td>kasus</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[17]->BOBOT ?></td>
                                    <td><?php echo $kpi[17]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[17]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][17][0]?></td>
                                    <td><?php echo $realisasi[0][17][1]?></td>
                                    <td><?php echo $realisasi[0][17][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[18]->BOBOT ?></td>
                                    <td><?php echo $kpi[18]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[18]->TW1_STRETCH ?></td>
                                    <td><?php echo $realisasi[0][18][0]?></td>
                                    <td><?php echo $realisasi[0][18][1]?></td>
                                    <td><?php echo $realisasi[0][18][2]?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Boundary KPIs</b></td>
                                </tr>
                               <tr>
                                    <td>1. TRIR Patra Niaga</td>
                                    <td>Ratio</td>
                                    <td></td>
                                    <td><?php echo $kpi[19]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[19]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. NOA Patra Niaga</td>
                                    <td>Cases</td>
                                    <td></td>
                                    <td><?php echo $kpi[20]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[20]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. GCG compliance</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[21]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[21]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. External Audit Option</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[22]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[22]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Other Operational Metrics</b></td>
                                </tr>
                                <tr>
                                    <td>1. Proper PPN</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[23]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[23]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Learning Index</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[24]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[24]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Follow up audit findings</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[25]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[25]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[26]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[26]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5. Utilisasi ERP (MySAP)</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[27]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[27]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6. Knowledge & Innovation Program</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[28]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[28]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7. Penyelesaian OFI to AFIPQA</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[29]->TW1_BASE ?></td>
                                    <td><?php echo $kpi[29]->TW1_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <?php  }
                            if($triwulan == 2 || $triwulan == 5) {
                            
                        ?>
                        <b>KPI TRIWULAN II</b>
                        <span onclick="editKpi(2)" class="btn btn-warning btn-mini tooltips" data-original-title="Edit KPI" style="float:right;"><i class="icon-pencil"></i></span><br/><br/><br/> 
                        

                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td rowspan="2">Indikator Kinerja</td>
                                    <td rowspan="2">Satuan</td>
                                    <td rowspan="2">Frekuensi Monitoring</td>
                                    <td rowspan="2">Bobot %</td>
                                    <td colspan="2"><span id="triwulan">Triwulan II</span></td>
                                    <td colspan="3">Realisasi</td>
                                    <td rowspan="2">RKAP OAM</td>
                                </tr>
                                <tr>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td><span id="bulan_1">Januari</span></td>
                                    <td><span id="bulan_2">Februari</span></td>
                                    <td><span id="bulan_3">Maret</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9"><b>1. Revenue</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW2 ?></td>
                                </tr>
                                <tr>
                                    <td>Revenue Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[0]->BOBOT ?></td>
                                    <td><?php echo $kpi[0]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[0]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][0][0] ?></td>
                                    <td><?php echo $realisasi[1][0][1] ?></td>
                                    <td><?php echo $realisasi[1][0][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[1]->BOBOT ?></td>
                                    <td><?php echo $kpi[1]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[1]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][1][0] ?></td>
                                    <td><?php echo $realisasi[1][1][1] ?></td>
                                    <td><?php echo $realisasi[1][1][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>2. Laba Usaha</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW2 ?></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[2]->BOBOT ?></td>
                                    <td><?php echo $kpi[2]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[2]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][2][0] ?></td>
                                    <td><?php echo $realisasi[1][2][1] ?></td>
                                    <td><?php echo $realisasi[1][2][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Terminal Storage</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[3]->BOBOT ?></td>
                                    <td><?php echo $kpi[3]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[3]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][3][0] ?></td>
                                    <td><?php echo $realisasi[1][3][1] ?></td>
                                    <td><?php echo $realisasi[1][3][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW2 ?></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Fleet Management</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[4]->BOBOT ?></td>
                                    <td><?php echo $kpi[4]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[4]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][4][0] ?></td>
                                    <td><?php echo $realisasi[1][4][1] ?></td>
                                    <td><?php echo $realisasi[1][4][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Terminal Storage</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[5]->BOBOT ?></td>
                                    <td><?php echo $kpi[5]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[5]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][5][0] ?></td>
                                    <td><?php echo $realisasi[1][5][1] ?></td>
                                    <td><?php echo $realisasi[1][5][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>4. Collection Period</b></td> 
                                    <td>by date</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[6]->BOBOT ?></td>
                                    <td><?php echo $kpi[6]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[6]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][6][0] ?></td>
                                    <td><?php echo $realisasi[1][6][1] ?></td>
                                    <td><?php echo $realisasi[1][6][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>5. Terminal Losses</b></td>
                                </tr>
                                <tr>
                                    <td>Total Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[7]->BOBOT ?></td>
                                    <td><?php echo $kpi[7]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[7]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][7][0] ?></td>
                                    <td><?php echo $realisasi[1][7][1] ?></td>
                                    <td><?php echo $realisasi[1][7][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Discharge Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[8]->BOBOT ?></td>
                                    <td><?php echo $kpi[8]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[8]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][8][0] ?></td>
                                    <td><?php echo $realisasi[1][8][1] ?></td>
                                    <td><?php echo $realisasi[1][8][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Working Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[9]->BOBOT ?></td>
                                    <td><?php echo $kpi[9]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[9]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][9][0] ?></td>
                                    <td><?php echo $realisasi[1][9][1] ?></td>
                                    <td><?php echo $realisasi[1][9][2] ?></td>
                                    <td></td>
                                </tr> <tr>
                                    <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 1]->RKAP_OAM_TW2 ?></td>
                                </tr>
                                <tr>
                                    <td>Fleet Management (BBM/BBK)</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[10]->BOBOT ?></td>
                                    <td><?php echo $kpi[10]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[10]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][10][0] ?></td>
                                    <td><?php echo $realisasi[1][10][1] ?></td>
                                    <td><?php echo $realisasi[1][10][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[11]->BOBOT ?></td>
                                    <td><?php echo $kpi[11]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[11]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][11][0] ?></td>
                                    <td><?php echo $realisasi[1][11][1] ?></td>
                                    <td><?php echo $realisasi[1][11][2] ?></td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <td colspan="10"><b>7. Service Level Agreement</b></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[12]->BOBOT ?></td>
                                    <td><?php echo $kpi[12]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[12]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][12][0] ?></td>
                                    <td><?php echo $realisasi[1][12][1] ?></td>
                                    <td><?php echo $realisasi[1][12][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (APMS)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[13]->BOBOT ?></td>
                                    <td><?php echo $kpi[13]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[13]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][13][0] ?></td>
                                    <td><?php echo $realisasi[1][13][1] ?></td>
                                    <td><?php echo $realisasi[1][13][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Gas & Aviation</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[14]->BOBOT ?></td>
                                    <td><?php echo $kpi[14]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[14]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][14][0] ?></td>
                                    <td><?php echo $realisasi[1][14][1] ?></td>
                                    <td><?php echo $realisasi[1][14][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="10">a. Breakdown Occurences</td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Kelola</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[15]->BOBOT ?></td>
                                    <td><?php echo $kpi[15]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[15]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][15][0] ?></td>
                                    <td><?php echo $realisasi[1][15][1] ?></td>
                                    <td><?php echo $realisasi[1][15][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Milik</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[16]->BOBOT ?></td>
                                    <td><?php echo $kpi[16]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[16]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][16][0] ?></td>
                                    <td><?php echo $realisasi[1][16][1] ?></td>
                                    <td><?php echo $realisasi[1][16][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>b. Terminal Storage (BBM/Depot)</td> 
                                    <td>kasus</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[17]->BOBOT ?></td>
                                    <td><?php echo $kpi[17]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[17]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][17][0] ?></td>
                                    <td><?php echo $realisasi[1][17][1] ?></td>
                                    <td><?php echo $realisasi[1][17][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[18]->BOBOT ?></td>
                                    <td><?php echo $kpi[18]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[18]->TW2_STRETCH ?></td>
                                    <td><?php echo $realisasi[1][18][0] ?></td>
                                    <td><?php echo $realisasi[1][18][1] ?></td>
                                    <td><?php echo $realisasi[1][18][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Boundary KPIs</b></td>
                                </tr>
                               <tr>
                                    <td>1. TRIR Patra Niaga</td>
                                    <td>Ratio</td>
                                    <td></td>
                                    <td><?php echo $kpi[19]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[19]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. NOA Patra Niaga</td>
                                    <td>Cases</td>
                                    <td></td>
                                    <td><?php echo $kpi[20]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[20]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. GCG compliance</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[21]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[21]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. External Audit Option</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[22]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[22]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Other Operational Metrics</b></td>
                                </tr>
                                <tr>
                                    <td>1. Proper PPN</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[23]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[23]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Learning Index</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[24]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[24]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Follow up audit findings</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[25]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[25]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[26]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[26]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5. Utilisasi ERP (MySAP)</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[27]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[27]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6. Knowledge & Innovation Program</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[28]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[28]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7. Penyelesaian OFI to AFIPQA</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[29]->TW2_BASE ?></td>
                                    <td><?php echo $kpi[29]->TW2_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <?php }
                            if($triwulan == 3 || $triwulan == 5){
                            
                        ?>
                        <b>KPI TRIWULAN III</b>
                        <span onclick="editKpi(3)" class="btn btn-warning btn-mini tooltips" data-original-title="Edit KPI" style="float:right;"><i class="icon-pencil"></i></span><br/><br/><br/> 
                        
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td rowspan="2">Indikator Kinerja</td>
                                    <td rowspan="2">Satuan</td>
                                    <td rowspan="2">Frekuensi Monitoring</td>
                                    <td rowspan="2">Bobot %</td>
                                    <td colspan="2"><span id="triwulan">Triwulan III</span></td>
                                    <td colspan="3">Realisasi</td>
                                    <td rowspan="2">RKAP OAM</td>
                                </tr>
                                <tr>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td><span id="bulan_1">Januari</span></td>
                                    <td><span id="bulan_2">Februari</span></td>
                                    <td><span id="bulan_3">Maret</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9"><b>1. Revenue</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW3 ?></td>
                                </tr>
                                <tr>
                                    <td>Revenue Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[0]->BOBOT ?></td>
                                    <td><?php echo $kpi[0]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[0]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][0][0] ?></td>
                                    <td><?php echo $realisasi[2][0][1] ?></td>
                                    <td><?php echo $realisasi[2][0][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[1]->BOBOT ?></td>
                                    <td><?php echo $kpi[1]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[1]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][1][0] ?></td>
                                    <td><?php echo $realisasi[2][1][1] ?></td>
                                    <td><?php echo $realisasi[2][1][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>2. Laba Usaha</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW3 ?></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[2]->BOBOT ?></td>
                                    <td><?php echo $kpi[2]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[2]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][2][0] ?></td>
                                    <td><?php echo $realisasi[2][2][1] ?></td>
                                    <td><?php echo $realisasi[2][2][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Terminal Storage</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[3]->BOBOT ?></td>
                                    <td><?php echo $kpi[3]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[3]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][3][0] ?></td>
                                    <td><?php echo $realisasi[2][3][1] ?></td>
                                    <td><?php echo $realisasi[2][3][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW3 ?></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Fleet Management</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[4]->BOBOT ?></td>
                                    <td><?php echo $kpi[4]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[4]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][4][0] ?></td>
                                    <td><?php echo $realisasi[2][4][1] ?></td>
                                    <td><?php echo $realisasi[2][4][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Terminal Storage</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[5]->BOBOT ?></td>
                                    <td><?php echo $kpi[5]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[5]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][5][0] ?></td>
                                    <td><?php echo $realisasi[2][5][1] ?></td>
                                    <td><?php echo $realisasi[2][5][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>4. Collection Period</b></td> 
                                    <td>by date</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[6]->BOBOT ?></td>
                                    <td><?php echo $kpi[6]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[6]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][6][0] ?></td>
                                    <td><?php echo $realisasi[2][6][1] ?></td>
                                    <td><?php echo $realisasi[2][6][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>5. Terminal Losses</b></td>
                                </tr>
                                <tr>
                                    <td>Total Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[7]->BOBOT ?></td>
                                    <td><?php echo $kpi[7]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[7]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][7][0] ?></td>
                                    <td><?php echo $realisasi[2][7][1] ?></td>
                                    <td><?php echo $realisasi[2][7][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Discharge Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[8]->BOBOT ?></td>
                                    <td><?php echo $kpi[8]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[8]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][8][0] ?></td>
                                    <td><?php echo $realisasi[2][8][1] ?></td>
                                    <td><?php echo $realisasi[2][8][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Working Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[9]->BOBOT ?></td>
                                    <td><?php echo $kpi[9]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[9]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][9][0] ?></td>
                                    <td><?php echo $realisasi[2][9][1] ?></td>
                                    <td><?php echo $realisasi[2][9][2] ?></td>
                                    <td></td>
                                </tr> <tr>
                                    <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 1]->RKAP_OAM_TW3 ?></td>
                                </tr>
                                <tr>
                                    <td>Fleet Management (BBM/BBK)</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[10]->BOBOT ?></td>
                                    <td><?php echo $kpi[10]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[10]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][10][0] ?></td>
                                    <td><?php echo $realisasi[2][10][1] ?></td>
                                    <td><?php echo $realisasi[2][10][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[11]->BOBOT ?></td>
                                    <td><?php echo $kpi[11]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[11]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][11][0] ?></td>
                                    <td><?php echo $realisasi[2][11][1] ?></td>
                                    <td><?php echo $realisasi[2][11][2] ?></td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <td colspan="10"><b>7. Service Level Agreement</b></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[12]->BOBOT ?></td>
                                    <td><?php echo $kpi[12]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[12]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][12][0] ?></td>
                                    <td><?php echo $realisasi[2][12][1] ?></td>
                                    <td><?php echo $realisasi[2][12][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (APMS)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[13]->BOBOT ?></td>
                                    <td><?php echo $kpi[13]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[13]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][13][0] ?></td>
                                    <td><?php echo $realisasi[2][13][1] ?></td>
                                    <td><?php echo $realisasi[2][13][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Gas & Aviation</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[14]->BOBOT ?></td>
                                    <td><?php echo $kpi[14]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[14]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][14][0] ?></td>
                                    <td><?php echo $realisasi[2][14][1] ?></td>
                                    <td><?php echo $realisasi[2][14][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="10">a. Breakdown Occurences</td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Kelola</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[15]->BOBOT ?></td>
                                    <td><?php echo $kpi[15]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[15]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][15][0] ?></td>
                                    <td><?php echo $realisasi[2][15][1] ?></td>
                                    <td><?php echo $realisasi[2][15][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Milik</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[16]->BOBOT ?></td>
                                    <td><?php echo $kpi[16]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[16]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][16][0] ?></td>
                                    <td><?php echo $realisasi[2][16][1] ?></td>
                                    <td><?php echo $realisasi[2][16][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>b. Terminal Storage (BBM/Depot)</td> 
                                    <td>kasus</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[17]->BOBOT ?></td>
                                    <td><?php echo $kpi[17]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[17]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][17][0] ?></td>
                                    <td><?php echo $realisasi[2][17][1] ?></td>
                                    <td><?php echo $realisasi[2][17][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[18]->BOBOT ?></td>
                                    <td><?php echo $kpi[18]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[18]->TW3_STRETCH ?></td>
                                    <td><?php echo $realisasi[2][18][0] ?></td>
                                    <td><?php echo $realisasi[2][18][1] ?></td>
                                    <td><?php echo $realisasi[2][18][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Boundary KPIs</b></td>
                                </tr>
                                <tr>
                                    <td>1. TRIR Patra Niaga</td>
                                    <td>Ratio</td>
                                    <td><?php echo $kpi[19]->BOBOT ?></td>
                                    <td><?php echo $kpi[19]->TW3_BASE ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. NOA Patra Niaga</td>
                                    <td>Cases</td>
                                    <td><?php echo $kpi[20]->BOBOT ?></td>
                                    <td><?php echo $kpi[20]->TW3_BASE ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. GCG compliance</td>
                                    <td>%</td>
                                    <td><?php echo $kpi[21]->BOBOT ?></td>
                                    <td><?php echo $kpi[21]->TW3_BASE ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. External Audit Option</td>
                                    <td>%</td>
                                    <td><?php echo $kpi[22]->BOBOT ?></td>
                                    <td><?php echo $kpi[22]->TW3_BASE ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Other Operational Metrics</b></td>
                                </tr>
                                <tr>
                                    <td>1. TRIR Patra Niaga</td>
                                    <td>Ratio</td>
                                    <td></td>
                                    <td><?php echo $kpi[19]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[19]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. NOA Patra Niaga</td>
                                    <td>Cases</td>
                                    <td></td>
                                    <td><?php echo $kpi[20]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[20]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. GCG compliance</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[21]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[21]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. External Audit Option</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[22]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[22]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Other Operational Metrics</b></td>
                                </tr>
                                <tr>
                                    <td>1. Proper PPN</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[23]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[23]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Learning Index</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[24]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[24]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Follow up audit findings</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[25]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[25]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[26]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[26]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5. Utilisasi ERP (MySAP)</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[27]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[27]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6. Knowledge & Innovation Program</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[28]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[28]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7. Penyelesaian OFI to AFIPQA</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[29]->TW3_BASE ?></td>
                                    <td><?php echo $kpi[29]->TW3_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <?php } 
                            if($triwulan == 4 || $triwulan == 5) {
                            
                        ?>
                        <b>KPI TRIWULAN IV</b>
                        <span onclick="editKpi(4)" class="btn btn-warning btn-mini tooltips" data-original-title="Edit KPI" style="float:right;"><i class="icon-pencil"></i></span><br/><br/><br/> 
                        
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td rowspan="2">Indikator Kinerja</td>
                                    <td rowspan="2">Satuan</td>
                                    <td rowspan="2">Frekuensi Monitoring</td>
                                    <td rowspan="2">Bobot %</td>
                                    <td colspan="2"><span id="triwulan">Triwulan IV</span></td>
                                    <td colspan="3">Realisasi</td>
                                    <td rowspan="2">RKAP OAM</td>
                                </tr>
                                <tr>
                                    <td>Base</td>
                                    <td>Stretch</td>
                                    <td><span id="bulan_1">Januari</span></td>
                                    <td><span id="bulan_2">Februari</span></td>
                                    <td><span id="bulan_3">Maret</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9"><b>1. Revenue</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW4 ?></td>
                                </tr>
                                  <tr>
                                    <td>Revenue Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[0]->BOBOT ?></td>
                                    <td><?php echo $kpi[0]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[0]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][0][0] ?></td>
                                    <td><?php echo $realisasi[3][0][1] ?></td>
                                    <td><?php echo $realisasi[3][0][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[1]->BOBOT ?></td>
                                    <td><?php echo $kpi[1]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[1]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][1][0] ?></td>
                                    <td><?php echo $realisasi[3][1][1] ?></td>
                                    <td><?php echo $realisasi[3][1][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>2. Laba Usaha</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW4 ?></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Fleet Management</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[2]->BOBOT ?></td>
                                    <td><?php echo $kpi[2]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[2]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][2][0] ?></td>
                                    <td><?php echo $realisasi[3][2][1] ?></td>
                                    <td><?php echo $realisasi[3][2][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Laba Usaha Terminal Storage</td> 
                                    <td>USD</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[3]->BOBOT ?></td>
                                    <td><?php echo $kpi[3]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[3]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][3][0] ?></td>
                                    <td><?php echo $realisasi[3][3][1] ?></td>
                                    <td><?php echo $realisasi[3][3][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW4 ?></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Fleet Management</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[4]->BOBOT ?></td>
                                    <td><?php echo $kpi[4]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[4]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][4][0] ?></td>
                                    <td><?php echo $realisasi[3][4][1] ?></td>
                                    <td><?php echo $realisasi[3][4][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Cost/liter Terminal Storage</td> 
                                    <td>USD/KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[5]->BOBOT ?></td>
                                    <td><?php echo $kpi[5]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[5]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][5][0] ?></td>
                                    <td><?php echo $realisasi[3][5][1] ?></td>
                                    <td><?php echo $realisasi[3][5][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>4. Collection Period</b></td> 
                                    <td>by date</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[6]->BOBOT ?></td>
                                    <td><?php echo $kpi[6]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[6]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][6][0] ?></td>
                                    <td><?php echo $realisasi[3][6][1] ?></td>
                                    <td><?php echo $realisasi[3][6][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>5. Terminal Losses</b></td>
                                </tr>
                                <tr>
                                    <td>Total Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[7]->BOBOT ?></td>
                                    <td><?php echo $kpi[7]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[7]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][7][0] ?></td>
                                    <td><?php echo $realisasi[3][7][1] ?></td>
                                    <td><?php echo $realisasi[3][7][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Discharge Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[8]->BOBOT ?></td>
                                    <td><?php echo $kpi[8]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[8]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][8][0] ?></td>
                                    <td><?php echo $realisasi[3][8][1] ?></td>
                                    <td><?php echo $realisasi[3][8][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Working Loss</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[9]->BOBOT ?></td>
                                    <td><?php echo $kpi[9]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[9]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][9][0] ?></td>
                                    <td><?php echo $realisasi[3][9][1] ?></td>
                                    <td><?php echo $realisasi[3][9][2] ?></td>
                                    <td></td>
                                </tr> <tr>
                                    <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                    <td><?php echo $kpi[sizeof($kpi) - 1]->RKAP_OAM_TW4 ?></td>
                                </tr>
                                <tr>
                                    <td>Fleet Management (BBM/BBK)</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[10]->BOBOT ?></td>
                                    <td><?php echo $kpi[10]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[10]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][10][0] ?></td>
                                    <td><?php echo $realisasi[3][10][1] ?></td>
                                    <td><?php echo $realisasi[3][10][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Terminal Storage</td> 
                                    <td>KL</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[11]->BOBOT ?></td>
                                    <td><?php echo $kpi[11]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[11]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][11][0] ?></td>
                                    <td><?php echo $realisasi[3][11][1] ?></td>
                                    <td><?php echo $realisasi[3][11][2] ?></td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <td colspan="10"><b>7. Service Level Agreement</b></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[12]->BOBOT ?></td>
                                    <td><?php echo $kpi[12]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[12]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][12][0] ?></td>
                                    <td><?php echo $realisasi[3][12][1] ?></td>
                                    <td><?php echo $realisasi[3][12][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fuel Retail Fleet Management (APMS)</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[13]->BOBOT ?></td>
                                    <td><?php echo $kpi[13]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[13]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][13][0] ?></td>
                                    <td><?php echo $realisasi[3][13][1] ?></td>
                                    <td><?php echo $realisasi[3][13][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Gas & Aviation</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[14]->BOBOT ?></td>
                                    <td><?php echo $kpi[14]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[14]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][14][0] ?></td>
                                    <td><?php echo $realisasi[3][14][1] ?></td>
                                    <td><?php echo $realisasi[3][14][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="10">a. Breakdown Occurences</td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Kelola</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[15]->BOBOT ?></td>
                                    <td><?php echo $kpi[15]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[15]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][15][0] ?></td>
                                    <td><?php echo $realisasi[3][15][1] ?></td>
                                    <td><?php echo $realisasi[3][15][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>- Mobil Tangki Milik</td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[16]->BOBOT ?></td>
                                    <td><?php echo $kpi[16]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[16]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][16][0] ?></td>
                                    <td><?php echo $realisasi[3][16][1] ?></td>
                                    <td><?php echo $realisasi[3][16][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>b. Terminal Storage (BBM/Depot)</td> 
                                    <td>kasus</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[17]->BOBOT ?></td>
                                    <td><?php echo $kpi[17]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[17]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][17][0] ?></td>
                                    <td><?php echo $realisasi[3][17][1] ?></td>
                                    <td><?php echo $realisasi[3][17][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                    <td>%</td>
                                    <td>Monthly</td>
                                    <td><?php echo $kpi[18]->BOBOT ?></td>
                                    <td><?php echo $kpi[18]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[18]->TW4_STRETCH ?></td>
                                    <td><?php echo $realisasi[3][18][0] ?></td>
                                    <td><?php echo $realisasi[3][18][1] ?></td>
                                    <td><?php echo $realisasi[3][18][2] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Boundary KPIs</b></td>
                                </tr>
                                <tr>
                                    <td>1. TRIR Patra Niaga</td>
                                    <td>Ratio</td>
                                    <td></td>
                                    <td><?php echo $kpi[19]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[19]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. NOA Patra Niaga</td>
                                    <td>Cases</td>
                                    <td></td>
                                    <td><?php echo $kpi[20]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[20]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. GCG compliance</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[21]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[21]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. External Audit Option</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[22]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[22]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><b>Other Operational Metrics</b></td>
                                </tr>
                                <tr>
                                    <td>1. Proper PPN</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[23]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[23]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Learning Index</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[24]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[24]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Follow up audit findings</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[25]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[25]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[26]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[26]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5. Utilisasi ERP (MySAP)</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[27]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[27]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6. Knowledge & Innovation Program</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[28]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[28]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7. Penyelesaian OFI to AFIPQA</td>
                                    <td>%</td>
                                    <td></td>
                                    <td><?php echo $kpi[29]->TW4_BASE ?></td>
                                    <td><?php echo $kpi[29]->TW4_STRETCH ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <?php
                            }
                    } else {
                        if($triwulan == 1 || $triwulan == 5){
                            
                             echo " <b>KPI TRIWULAN I</b><br/><br/> ";
                        }
                        if($triwulan == 2 || $triwulan == 5){
                            
                            echo " <b>KPI TRIWULAN II</b><br/><br/> ";
                        }
                        if($triwulan == 3 || $triwulan == 5){
                            
                             echo " <b>KPI TRIWULAN III</b><br/><br/> ";
                        }
                        if($triwulan == 4 || $triwulan == 5){
                           
                              echo " <b>KPI TRIWULAN IV</b><br/><br/> "; 
                        }
                        ?>

    <?php
}
?>
                </center>
            </div>

        </section>

        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>
<script type="text/javascript">
    function editKpi(triwulan)
    {
        window.location.href = "<?php echo base_url();?>kpi/internal_edit/<?php echo $tahun?>/"+triwulan;
    }
</script>